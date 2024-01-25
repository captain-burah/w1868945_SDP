<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Project_brochure;
use App\Models\Project_brochure_file;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Redirect;
use App\Models\Project;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log; // send notifications via slack or any other means
use Illuminate\Support\Str;

class ProjectBrochureController extends Controller
{
    private $uploadPath = "uploads/projects/brochures/";
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brochures = Project_brochure::with('project_brochure_files')->get();

        $this->data['results'] = $brochures;
        $this->data['projects'] = Project::select(['id', 'name', 'status'])->where('status', '2')->get();
        $this->data['count_status'] = Project_brochure::count();

        return view('project.brochure.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project.brochure.create.index');
    }

    /**
     * Store a newly created resource in storage.
     */
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

                $project_brochure = new Project_brochure();
                $project_brochure->name = $request->segment_name;
                $project_brochure->save();
                $project_brochure_id = $project_brochure->id;

                foreach($request->file('files') as $key => $image)
                {
                    $image_name = $image->hashName();
                    $path = $this->uploadPath;
                    $image->move($path."$project_brochure_id/", $image_name);

                    // $image_name = $image->hashName();
                    // $image->storeAs('projects/brochures/'.$project_brochure_id, $image_name, 'public'); //nonsecured storage - has public access

                    $project_brochure_file = new Project_brochure_file();
                    $project_brochure_file->project_brochure_id = $project_brochure_id;
                    $project_brochure_file->name = $image_name;
                    $project_brochure_file->save();

                }
                // dd($files);
            }

        } catch (\Exception $e) {
            // dd($e->getMessage());
            return Redirect::back()->withErrors(['message', $e->getMessage() ]);
        }

        return redirect()->route('project-brochures.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brochures = Project_brochure::with('project_brochure_files')->where('id', $id)->get();

        $brochures_files = Project_brochure_file::with('project_brochure')->where('project_brochure_id', $id)->get();

        $this->data['brochures_files'] = $brochures_files;

        $this->data['brochures'] = $brochures[0];

        return view('project.brochure.update.index', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
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

                $project_brochure = Project_brochure::find($request->brochure_id);
                $project_brochure->name = $request->segment_name;
                $project_brochure->save();

                $project_brochure_id = $project_brochure->id;

                foreach($request->file('files') as $key => $image)
                {
                    $image_name = $image->hashName();
                    $path = $this->uploadPath;
                    $image->move($path."$project_brochure_id/", $image_name);

                    // $image_name = $image->hashName();
                    // $image->storeAs('projects/brochures/'.$project_brochure_id, $image_name, 'public'); //nonsecured storage - has public access

                    $project_brochure_file = new Project_brochure_file();
                    $project_brochure_file->project_brochure_id = $request->brochure_id;
                    $project_brochure_file->name = $image_name;
                    $project_brochure_file->save();
                }
            }
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return Redirect::back()->withErrors(['message', $e->getMessage() ]);
        }
        return redirect()->route('project-brochures.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        try {
            Project_brochure_file::find($id);
        }
        catch(ModelNotFoundException $e)
        {
            return Redirect::back()->withErrors(['msg' => 'Could not find project. Please contact developer.']);
        }

        $brochure_file = Project_brochure_file::with('project_brochure')->find($id);


        if(Storage::exists('projects/brochures/'.$brochure_file->project_brochure->id.'/'.$brochure_file->name)){
            Project_brochure_file::destroy($id); //DELETE THE DATABASE RECORD
            try {
                Storage::delete('projects/brochures/'.$brochure_file->project_brochure->id.'/'.$brochure_file->name);  //DELETE THE ACTUAL FILE FROM STORAGE
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


    public function project_connect_store(Request $request){

        $project = Project::with('project_brochure')->find($request->project_id);

        if($project->project_brochure != null ){
            return Redirect::back()->withErrors(['The selected project already contains a brochure. Remove it first to reassign.' ]);
        }

        $brochure = Project_brochure::find($request->brochure_id);
        $brochure->project_id = $request->project_id;
        $brochure->save();
        return Redirect::back()->with(['msg' => 'Successfully connected']);

    }

    public function project_disconnect($id){
        $brochure = Project_brochure::find($id);
        $brochure->project_id = null;
        $brochure->save();
        return redirect()->route('project-brochures.index')->with(['msg' => 'Successfully connected']);
    }

    public function destroy_segment($id) {

        $brochure = Project_brochure::with('project_brochure_files')->find($id);

        if($brochure->project_brochure_files->count() > 0) {
            try {
                foreach ($brochure->project_brochure_files as $child)
                {
                    Storage::deleteDirectory('projects/brochures/'.$brochure->id);
                    // Storage::delete('projects/brochures/'.$brochure->id.'/'.$child->name);  //DELETE THE ACTUAL FILE FROM STORAGE
                    $child->delete();
                }
            } catch (\Exception $e) {
                dd($e->getMessage());
                return Redirect::back()->withErrors(['message', $e->getMessage() ]);
            }
        }

        Project_brochure::destroy($id);

        return redirect()->route('project-brochures.index')->with(['msg' => 'Successfully connected']);
    }
}
