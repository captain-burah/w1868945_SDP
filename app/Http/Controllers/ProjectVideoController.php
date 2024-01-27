<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log; // send notifications via slack or any other means
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;


use App\Models\Project;
use App\Models\Project_video;
use App\Models\Project_video_file;

class ProjectVideoController extends Controller
{
    private $uploadPath = "uploads/projects/videos/";


    public function index()
    {
        $images = Project_video::with('project_video_files')->get();

        $this->data['results'] = $images;
        $this->data['projects'] = Project::select(['id', 'name', 'status'])->where('status', '2')->get();
        $this->data['count_status'] = Project_video::count();

        return view('project.video.index', $this->data);
    }





    public function create()
    {
        return view('project.video.create.index');
    }





    public function store(Request $request)
    {

        $request->validate([
            'segment_name' => 'required'
        ]);


        $project_segment = new Project_video();
        $project_segment->name = $request->segment_name;
        $project_segment->save();
        $project_segment_id = $project_segment->id;


        if($request->video1 != null){

            $project_segment_file = new Project_video_file();
            $project_segment_file->project_video_id = $project_segment_id;
            $project_segment_file->name = $request->video1;
            $project_segment_file->save();

        }
        if ($request->video2 != null){

            $project_segment_file = new Project_video_file();
            $project_segment_file->project_video_id = $project_segment_id;
            $project_segment_file->name = $request->video2;
            $project_segment_file->save();

        }
        if($request->video3 != null){

            $project_segment_file = new Project_video_file();
            $project_segment_file->project_video_id = $project_segment_id;
            $project_segment_file->name = $request->video3;
            $project_segment_file->save();

        }
        if($request->video4 != null){

            $project_segment_file = new Project_video_file();
            $project_segment_file->project_video_id = $project_segment_id;
            $project_segment_file->name = $request->video4;
            $project_segment_file->save();

        }
        if($request->video5 != null){

            $project_segment_file = new Project_video_file();
            $project_segment_file->project_video_id = $project_segment_id;
            $project_segment_file->name = $request->video5;
            $project_segment_file->save();

        }

        return redirect()->route('project-video.index');
    }






    public function show(string $id)
    {
        //
    }









    public function edit(string $id)
    {
        $segment = Project_video::with('project_video_files')->where('id', $id)->get();

        $segment_files = Project_video_file::with('project_video')->where('project_video_id', $id)->get();

        $this->data['segment_files'] = $segment_files;

        $this->data['segments'] = $segment[0];

        return view('project.video.update.index', $this->data);
    }









    public function update(Request $request, string $id)
    {
        $request->validate([
            'segment_name' => 'required'
        ]);


        $project_segment = Project_video::find($id);
        $project_segment->name = $request->segment_name;
        $project_segment->save();
        $project_segment_id = $project_segment->id;


        if($request->video1 != null){

            $project_segment_file = new Project_video_file();
            $project_segment_file->project_video_id = $project_segment_id;
            $project_segment_file->name = $request->video1;
            $project_segment_file->save();

        }
        if ($request->video2 != null){

            $project_segment_file = new Project_video_file();
            $project_segment_file->project_video_id = $project_segment_id;
            $project_segment_file->name = $request->video2;
            $project_segment_file->save();

        }
        if($request->video3 != null){

            $project_segment_file = new Project_video_file();
            $project_segment_file->project_video_id = $project_segment_id;
            $project_segment_file->name = $request->video3;
            $project_segment_file->save();

        }
        if($request->video4 != null){

            $project_segment_file = new Project_video_file();
            $project_segment_file->project_video_id = $project_segment_id;
            $project_segment_file->name = $request->video4;
            $project_segment_file->save();

        }
        if($request->video5 != null){

            $project_segment_file = new Project_video_file();
            $project_segment_file->project_video_id = $project_segment_id;
            $project_segment_file->name = $request->video5;
            $project_segment_file->save();

        }

        return redirect()->route('project-video.index');
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








    public function project_connect_store(Request $request){

        $project = Project::with('project_video')->find($request->project_id);

        if($project->project_video != null ){
            return Redirect::back()->withErrors(['The selected project already contains a video. Remove it first to reassign.' ]);
        }

        $segment = Project_video::find($request->segment_id);
        $segment->project_id = $request->project_id;
        $segment->save();
        return Redirect::back()->with(['msg' => 'Successfully connected']);
    }







    public function project_disconnect($id){
        $segment = Project_video::find($id);
        $segment->project_id = null;
        $segment->save();
        return redirect()->route('project-video.index')->with(['msg' => 'Successfully connected']);
    }
}
