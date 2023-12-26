<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log; // send notifications via slack or any other means
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

use App\Models\Project;
use App\Models\Language;
use App\Models\Project_translation;
use App\Models\Project_translation_file;

class ProjectTranslationController extends Controller
{
    public function index()
    {
        $segments = Project_translation::with('language')->get();

        $this->data['results'] = $segments;
        $this->data['projects'] = $projects = Project::with('project_translations')->select(['id', 'name', 'status'])->where('status', '2')->get();
        $this->data['count_status'] = Project_translation::count();

        return view('project.translation.index', $this->data);
    }





    public function create()
    {
        $this->data['languages'] = $languages = Language::select(['id', 'name'])->get();
        $this->data['projects'] = $projects = Project::select(['id', 'name', 'status'])->where('status', '2')->get();
        return view('project.translation.create.index', $this->data);
    }





    public function store(Request $request)
    {


        $request->validate([
            'language_id' => 'required',
            'project_id' => 'required',
            'name' => 'required',
            'ownership' => 'required',
            'description' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
        ]);


        $project_segment = new Project_translation();
        $project_segment->status = '2';
        $project_segment->slug_link = '0';
        $project_segment->language_id = $request->language_id;
        $project_segment->project_id = $request->project_id;
        $project_segment->name = $request->name;
        $project_segment->description = $request->description;
        $project_segment->ownership = $request->ownership;
        $project_segment->meta_title = $request->meta_title;
        $project_segment->meta_description = $request->meta_description;
        $project_segment->meta_keywords = $request->meta_keywords;
        $project_segment->save();

        return redirect()->route('project-translation.index');
    }






    public function show(string $id)
    {
        //
    }









    public function edit(string $id)
    {
        $segment = Project_translation::with('language')->where('id', $id)->get();
        $segment_parent = Project::with('project_translations')->where('id', $segment[0]->project_id)->get();

        $this->data['languages'] = $languages = Language::select(['id', 'name'])->get();

        $this->data['projects'] = $projects = Project::select(['id', 'name', 'status'])->where('status', '2')->get();

        $this->data['segment_parent'] = $segment_parent;

        $this->data['segments'] = $segment[0];

        return view('project.translation.update.index', $this->data);
    }









    public function update(Request $request, string $id)
    {
        $request->validate([
            'language_id' => 'required',
            'project_id' => 'required',
            'name' => 'required',
            'ownership' => 'required',
            'description' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
        ]);


        $project_segment = Project_translation::find($id);
        $project_segment->status = '2';
        $project_segment->slug_link = '0';
        $project_segment->language_id = $request->language_id;
        $project_segment->project_id = $request->project_id;
        $project_segment->name = $request->name;
        $project_segment->description = $request->description;
        $project_segment->ownership = $request->ownership;
        $project_segment->meta_title = $request->meta_title;
        $project_segment->meta_description = $request->meta_description;
        $project_segment->meta_keywords = $request->meta_keywords;
        $project_segment->save();


        return redirect()->route('project-translation.index');
    }








    public function destroy(string $id)
    {
        try {
            Project_video_file::find($id);
        }
        catch(ModelNotFoundException $e)
        {
            return Redirect::back()->withErrors(['msg' => 'Could not find project. Please contact developer.']);
        }

        $segment_file = Project_video_file::with('project_video')->find($id);

        if(Storage::exists('projects/videos/'.$segment_file->project_video->id.'/'.$segment_file->name)){

            Project_video_file::destroy($id);   //DELETE THE DATABASE RECORD

            try {
                Storage::delete('projects/videos/'.$segment_file->project_video->id.'/'.$segment_file->name);  //DELETE THE ACTUAL FILE FROM STORAGE
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

        $segment = Project_video::with('project_video_files')->find($id);


        if($segment->project_video_files->count() > 0) {
            try {
                foreach ($segment->project_video_files as $child)
                {
                    Storage::deleteDirectory('projects/videos/'.$segment->id);
                    // Storage::delete('projects/brochures/'.$brochure->id.'/'.$child->name);  //DELETE THE ACTUAL FILE FROM STORAGE
                    $child->delete();
                }
            } catch (\Exception $e) {
                dd($e->getMessage());
                return Redirect::back()->withErrors(['message', $e->getMessage() ]);
            }
        }

        Project_video::destroy($id);

        return redirect()->route('project-video.index')->with(['msg' => 'Successfully connected']);
    }








    public function project_translation_status($id){

        // GET THE TRANSLATION TUPLE
        $segment = Project_translation::with('project')->find($id);

        // GET THE PROJECT ID
        $project_id = $segment->project->id;

        // GET THE PROJECT TUPLE
        $project = Project::with('project_translations')->find($project_id);

        // CHECK IF TRANSLATION TUPPLE IS IN DRAFT
        if($segment->status == 2) {

            // LOOP THROUGH ALL TRANSLATIONS UNDER THE PROJECT TUPLE
            foreach($project->project_translations as $data){

                // PICK ONLY THE TUPLES WHO ARE IN ACTIVE STATUS
                if($data->status == 1) {

                    // CHECK THE LANGUAGE ID ARE THE SAME COMPARING THE CURRENT TUPLE WITH LOOPING TUPLE
                    if($segment->language_id == $data->language_id){

                        // IF SAME, RETURN AS AN ERROR
                        return Redirect::back()->withErrors(['msg' => 'The project already contains the language selected. Deactive that first to reasign.']);
                    }
                }
            }

            // CHANGE THE STATUS AND CREATE THE SLUG LINK FOR TRANSLATION
            $segment->status = '1';
            $segment->slug_link = Str::slug($segment->name);
            $segment->save();

        } elseif($segment->status == 1) {

            // CHANGE THE STATUS AND REMOVE THE SLUG LINK FOR TRANSLATION
            $segment->status = '2';
            $segment->slug_link = '0';
            $segment->save();
        }

        return Redirect::back()->with(['msg' => 'Successfully connected']);
    }







    public function project_disconnect($id){
        $segment = Project_video::find($id);
        $segment->project_id = null;
        $segment->save();
        return redirect()->route('project-video.index')->with(['msg' => 'Successfully connected']);
    }
}
