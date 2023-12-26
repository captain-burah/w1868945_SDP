<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log; // send notifications via slack or any other means
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;


use App\Models\Project;
use App\Models\Project_factsheet;
use App\Models\Project_factsheet_file;
class ProjectFactsheetController extends Controller
{
    private $uploadPath = "uploads/projects/factsheets/";

    public function index()
    {
        $images = Project_factsheet::with('project_factsheet_files')->get();

        $this->data['results'] = $images;
        $this->data['projects'] = Project::select(['id', 'name', 'status'])->where('status', '2')->get();
        $this->data['count_status'] = Project_factsheet::count();

        return view('project.factsheet.index', $this->data);
    }







    public function create()
    {
        return view('project.factsheet.create.index');

    }







    public function store(Request $request)
    {
        /**
         * PUBLIC STORAGE
         * ALL FILES ARE BEING STORED IN THE PUBLIC FOLDER UNDER ROOT/STORAGE
         * THESE FILES ARE ACCESSSIBLE TO THE PUBLIC
         *
         * SECURED FILES WILL BE STORED USING THE BELOW SYNTAX WITHIN THE APP DIRECTORY
         *
         * Storage::disk('local')->put('image_name_goes_here', file_variable_should_be_placed_here);
         *
         */

        $request->validate([
            'segment_name' => 'required',
            'files' => 'required | max: 5 | min: 1',
            'files.*' => 'max: 51200|mimes:pdf'
        ]);


        try {
            if($request->hasfile('files'))
            {
                $files = [];

                $project_segment = new Project_factsheet();
                $project_segment->name = $request->segment_name;
                $project_segment->save();

                $project_segment_id = $project_segment->id;

                foreach($request->file('files') as $key => $image)
                {
                    $image_name = $image->hashName();
                    $path = $this->uploadPath;
                    $image->move($path."$project_segment_id/", $image_name);

                    // $image_name = $image->hashName();
                    // $image->storeAs('projects/factsheets/'.$project_segment_id, $image_name, 'public'); //nonsecured storage - has public access

                    $project_segment_file = new Project_factsheet_file();
                    $project_segment_file->project_factsheet_id = $project_segment_id;
                    $project_segment_file->name = $image_name;
                    $project_segment_file->save();

                }
            }
        } catch (\Exception $e) {
            return Redirect::back()->withErrors(['message', $e->getMessage() ]);
        }

        return redirect()->route('project-factsheet.index');
    }






    public function show(string $id)
    {
        //
    }









    public function edit(string $id)
    {
        $segment = Project_factsheet::with('project_factsheet_files')->where('id', $id)->get();

        $segment_files = Project_factsheet_file::with('project_factsheet')->where('project_factsheet_id', $id)->get();

        $this->data['segment_files'] = $segment_files;

        $this->data['segments'] = $segment[0];

        return view('project.factsheet.update.index', $this->data);
    }









    public function update(Request $request, string $id)
    {
        $request->validate([
            'segment_name' => 'required',
            'files' => 'required | max: 5 | min: 1',
            'files.*' => 'max: 51200|mimes:pdf'
        ]);


        try {
            if($request->hasfile('files'))
            {
                $files = [];

                $project_segment = Project_factsheet::find($request->segment_id);
                $project_segment->name = $request->segment_name;
                $project_segment->save();

                $project_segment_id = $project_segment->id;

                foreach($request->file('files') as $key => $image)
                {
                    $image_name = $image->hashName();
                    $path = $this->uploadPath;
                    $image->move($path."$project_segment_id/", $image_name);

                    // $image_name = $image->hashName();
                    // $image->storeAs('projects/factsheets/'.$project_segment_id, $image_name, 'public'); //nonsecured storage - has public access

                    $project_segment_file = new Project_factsheet_file();
                    $project_segment_file->project_factsheet_id = $project_segment_id;
                    $project_segment_file->name = $image_name;
                    $project_segment_file->save();

                }
            }

        } catch (\Exception $e) {
            // dd($e->getMessage());
            return Redirect::back()->withErrors(['message', $e->getMessage() ]);
        }

        return redirect()->route('project-factsheet.index');
    }








    public function destroy(string $id)
    {
        try {
            Project_factsheet_file::find($id);
        }
        catch(ModelNotFoundException $e)
        {
            return Redirect::back()->withErrors(['msg' => 'Could not find project. Please contact developer.']);
        }

        $segment_file = Project_factsheet_file::with('project_factsheet')->find($id);

        if(Storage::exists('projects/factsheets/'.$segment_file->project_factsheet->id.'/'.$segment_file->name)){

            Project_factsheet_file::destroy($id);   //DELETE THE DATABASE RECORD

            try {
                Storage::delete('projects/factsheets/'.$segment_file->project_factsheet->id.'/'.$segment_file->name);  //DELETE THE ACTUAL FILE FROM STORAGE
            }
            catch (\Exception $e)
            {
                dd($e->getMessage());
                return Redirect::back()->withErrors(['message', $e->getMessage() ]);
            }

        }else{
            dd('File does not exist.');
        }

        return Redirect::back()->with(['msg' => 'Successfully deleted']);
    }








    public function destroy_segment($id) {

        $segment = Project_factsheet::with('project_factsheet_files')->find($id);

        if($segment->project_factsheet_files->count() > 0) {
            try {
                foreach ($segment->project_factsheet_files as $child)
                {
                    Storage::deleteDirectory('projects/factsheets/'.$segment->id);
                    // Storage::delete('projects/brochures/'.$brochure->id.'/'.$child->name);  //DELETE THE ACTUAL FILE FROM STORAGE
                    $child->delete();
                }
            } catch (\Exception $e) {
                dd($e->getMessage());
                return Redirect::back()->withErrors(['message', $e->getMessage() ]);
            }
        }

        Project_factsheet::destroy($id);

        return redirect()->route('project-factsheet.index')->with(['msg' => 'Successfully connected']);
    }








    public function project_connect_store(Request $request){

        $project = Project::with('project_factsheet')->find($request->project_id);

        if($project->project_factsheet != null ){
            return Redirect::back()->withErrors(['The selected project already contains a brochure. Remove it first to reassign.' ]);
        }

        $segment = Project_factsheet::find($request->segment_id);
        $segment->project_id = $request->project_id;
        $segment->save();
        return Redirect::back()->with(['msg' => 'Successfully connected']);
    }







    public function project_disconnect($id){
        $segment = Project_factsheet::find($id);
        $segment->project_id = null;
        $segment->save();
        return redirect()->route('project-factsheet.index')->with(['msg' => 'Successfully connected']);
    }
}
