<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use App\Models\Project;
use App\Models\Project_brochure;
use App\Models\Project_type;
use App\Models\Emirate;
use App\Models\Project_image;
use App\Models\Project_factsheet;
use App\Models\Project_video;
use App\Models\Language;
use App\Models\Community;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log; // send notifications via slack or any other means
use Illuminate\Support\Str;


class ProjectController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:project-list|project-create|project-edit|project-delete', ['only' => ['index','show']]);
         $this->middleware('permission:project-create', ['only' => ['create','store']]);
         $this->middleware('permission:project-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:project-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $projects = Project::with('project_brochure')->where('status', '1')->orderBY('id', 'Desc');

        $this->data['count_draft'] = $count_draft = Project::where('status', '2')->orderBY('id', 'Desc')->count();
        $this->data['count_active'] = $count_active = Project::where('status', '1')->orderBY('id', 'Desc')->count();
        $this->data['count_trash'] = $count_trash = Project::where('status', '3')->orderBY('id', 'Desc')->count();
        $this->data['project_translated'] = $project_translated = Language::all();
        $this->data['language'] = $lang = Language::all();

        $check_availability = $projects->get();

        if($check_availability->isEmpty()) {
            $this->data['count_status'] = 'No projects found. You can launch a new project above to start-off';
            $this->data['projects'] = $projects;
        } else {
            $this->data['projects'] = $projects->get();
        }

        $this->data['brochures'] = Project_brochure::with('project_brochure_files')->get();
        $this->data['images'] = Project_image::with('project_image_files')->get();
        $this->data['factsheets'] = Project_factsheet::with('project_factsheet_files')->get();
        $this->data['videos'] = Project_video::with('project_video_files')->get();

        return view('projectsActive', $this->data);
    }





    public function index_drafts()
    {
        $projects = Project::with('units')->where('status', '2')->orderBY('id', 'Desc');


        $this->data['count_draft'] = $count_draft = Project::where('status', '2')->orderBY('id', 'Desc')->count();
        $this->data['count_active'] = $count_active = Project::where('status', '1')->orderBY('id', 'Desc')->count();
        $this->data['count_trash'] = $count_trash = Project::where('status', '3')->orderBY('id', 'Desc')->count();
        $this->data['language'] = $lang = Language::all();

        $check_availability = $projects->get();

        if($check_availability->isEmpty()) {

            $this->data['count_status'] = 'No projects found. You can launch a new project above to start-off';

            $this->data['projects'] = $projects;

        } else {

            $this->data['projects'] = $projects->paginate(30);

        }


        $this->data['brochures'] = Project_brochure::with('project_brochure_files')->get();
        $this->data['images'] = Project_image::with('project_image_files')->get();
        $this->data['factsheets'] = Project_factsheet::with('project_factsheet_files')->get();
        $this->data['videos'] = Project_video::with('project_video_files')->get();

        return view('projectsActive', $this->data);
    }




    public function index_trash()
    {
        $projects = Project::where('status', '3')->orderBY('id', 'Desc');

        $this->data['count_draft'] = $count_draft = Project::where('status', '2')->orderBY('id', 'Desc')->count();
        $this->data['count_active'] = $count_active = Project::where('status', '1')->orderBY('id', 'Desc')->count();
        $this->data['count_trash'] = $count_trash = Project::where('status', '3')->orderBY('id', 'Desc')->count();
        $this->data['language'] = $lang = Language::all();

        $check_availability = $projects->get();

        if($check_availability->isEmpty()) {
            $this->data['count_status'] = 'No projects found. You can launch a new project above to start-off';
            $this->data['projects'] = $projects;
        } else {
            $this->data['projects'] = $projects->paginate(30);
        }

        $this->data['brochures'] = Project_brochure::with('project_brochure_files')->get();
        $this->data['images'] = Project_image::with('project_image_files')->get();
        $this->data['factsheets'] = Project_factsheet::with('project_factsheet_files')->get();
        $this->data['videos'] = Project_video::with('project_video_files')->get();

        return view('projectsActive', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['categories'] = $categories = Project_type::all();
        $this->data['communities'] = $communities = Community::all();
        $this->data['emirates'] = $emirates = Emirate::all();
        return view('project.create.index', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
        {

            // $validatedData = $request->validate([

            //     // 'property_release' => ['required'],

            //     // 'community' => ['required'],

            //     // 'category' => ['required'],

            //     // 'emirates' => ['required'],

            //     // 'location' => ['required'],

            //     'longitude' => ['required'],

            //     'latitude' => ['required'],

            //     'title_en' => ['required'],

            //     'ownership' => ['required'],

            //     'handover' => ['required'],

            //     'price' => ['required'],

            //     'units' => ['required'],

            //     'bedrooms' => ['required'],

            //     'bathrooms' => ['required'],

            //     'floors' => ['required'],

            //     'area_range' => ['required'],

            //     'outdoor_area_range' => ['required'],

            //     'terrace_area_range' => ['required'],

            //     'meta_title' => ['required'],

            //     'meta_description' => ['required'],

            //     'meta_keywords' => ['required']
            // ]);

            $bool=0;

            // dd($request);


            if($bool==0)
            {
                $project = new Project();
                $project->property_release_id = $request->property_release_id;
                $project->community = $request->community;
                $project->community_ar = $request->community_ar;
                $project->category_id = $request->category;
                $project->emirate_id = $request->emirates;
                // $project->location_id = $request->location;
                $project->longitude = $request->longitude;
                $project->latitude = $request->latitude;

                $project->name = $request->title_en;
                $project->name_ar = $request->title_ar;

                $project->description = $request->description;
                $project->description_ar = $request->description_ar;

                $project->secOne_title = $request->secOne_title;
                $project->secOne_title_ar = $request->secOne_title_ar;

                $project->secOne_description = $request->secOne_description;
                $project->secOne_description_ar = $request->secOne_description_ar;

                $project->secTwo_title = $request->secTwo_title;
                $project->secTwo_title_ar = $request->secTwo_title_ar;

                $project->secTwo_description = $request->secTwo_description;
                $project->secTwo_description_ar = $request->secTwo_description_ar;

                $project->secTwo_amenities = $request->secTwo_amenities;
                $project->secTwo_amenities_ar = $request->secTwo_amenities_ar;

                $project->secThree_title = $request->secThree_title;
                $project->secThree_title_ar = $request->secThree_title;

                $project->secThree_description = $request->secThree_description;
                $project->secThree_description_ar = $request->secThree_description_ar;

                $project->ownership = $request->ownership;
                $project->ownership_ar = $request->ownership_ar;

                $project->handover = $request->handover;
                $project->starting_price = $request->price;
                $project->no_of_units = $request->units;
                $project->bedrooms = $request->bedrooms;
                $project->bathrooms = $request->bathrooms;
                $project->floors = $request->floors;
                $project->unit_size_range = $request->area_range;
                $project->outdoor_area = $request->outdoor_area_range;
                $project->terrace_area = $request->terrace_area_range;


                $project->meta_title = $request->meta_title_en;
                $project->meta_description = $request->meta_description_en;
                $project->meta_keywords = $request->meta_keywords_en;

                $project->meta_title_ar = $request->meta_title_ar;
                $project->meta_description_ar = $request->meta_description_ar;
                $project->meta_keywords_ar = $request->meta_keywords_ar;

                $project->slug_link = '0';
                $project->status = '2';
                $project->save();

                $this->data['property_id'] = $project->id;

                return $this->index();
            }
            else
            {   
                return Redirect::back()->withErrors('Record is already Exist');
            }
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
        try
        {
            $projects = Project::findOrFail($id);

            if($projects->status == '1') {
                return Redirect::back()->withErrors(['msg' => 'Warning! You cannot edit a live project. Move the project to Draft and make further edits.']);
            }
        }
        catch(ModelNotFoundException $e)
        {
            // dd(get_class_methods($e));
            // dd($e);

            // SLACK UPDATE

                //API Url
                $url = 'https://hooks.slack.com/services/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';

                //Initiate cURL.
                $ch = curl_init($url);

                //The JSON data.
                $payload = array(
                    'text' => 'ESNAAD - MIS | Project Update - Read Failed - Project Not Found | Searching id: '.$id
                );

                //Encode the array into JSON.
                $jsonDataEncoded = json_encode($payload);

                //Tell cURL that we want to send a POST request.
                curl_setopt($ch, CURLOPT_POST, 1);

                //Attach our encoded JSON string to the POST fields.
                curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

                //Set the content type to application/json
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

                //Execute the request
                $result = curl_exec($ch);

            // SLACK UPDATE

            return Redirect::back()->withErrors(['msg' => 'Could not find project. Please contact developer.']);
        }

        $this->data['categories'] = $categories = Project_type::all();
        $this->data['communities'] = $communities = Community::all();
        $this->data['emirates'] = $emirates = Emirate::all();
        $this->data['project'] = $projects;
        return view('project.update.index', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $validatedData = $request->validate([

        //     // 'property_release' => ['required'],

        //     // 'community' => ['required'],

        //     // 'category' => ['required'],

        //     // 'emirates' => ['required'],

        //     // 'location' => ['required'],

        //     'longitude' => ['required'],

        //     'latitude' => ['required'],

        //     'title_en' => ['required'],


        //     'ownership' => ['required'],

        //     'handover' => ['required'],

        //     'price' => ['required'],

        //     'units' => ['required'],

        //     'bedrooms' => ['required'],

        //     'bathrooms' => ['required'],

        //     'floors' => ['required'],

        //     'area_range' => ['required'],

        //     'outdoor_area_range' => ['required'],

        //     'terrace_area_range' => ['required'],

        //     'meta_title' => ['required'],

        //     'meta_description' => ['required'],

        //     'meta_keywords' => ['required']
        // ]);

        $bool=0;

        // dd($request);


		if($bool==0)
		{
            try
            {
                $project = Project::find($id);
                $project->property_release_id = $request->property_release;
                $project->community = $request->community;
                $project->community_ar = $request->community_ar;
                $project->category_id = $request->category;
                $project->emirate_id = $request->emirates;
                $project->location_id = $request->location;
                $project->longitude = $request->longitude;
                $project->latitude = $request->latitude;
                
                $project->name = $request->title_en;
                $project->name_ar = $request->title_ar;

                $project->description = $request->description;
                $project->description_ar = $request->description_ar;

                $project->secOne_title = $request->secOne_title;
                $project->secOne_title_ar = $request->secOne_title_ar;

                $project->SecOne_description = $request->secOne_description;
                $project->SecOne_description_ar = $request->secOne_description_ar;

                $project->secTwo_title = $request->secTwo_title;
                $project->secTwo_title_ar = $request->secTwo_title_ar;

                $project->SecTwo_description = $request->secTwo_description;
                $project->SecTwo_description_ar = $request->secTwo_description_ar;

                $project->SecTwo_amenities = $request->secTwo_amenities;
                $project->SecTwo_amenities_ar = $request->secTwo_amenities_ar;

                $project->secThree_title = $request->secThree_title;
                $project->secThree_title_ar = $request->secThree_title_ar;

                $project->SecThree_description = $request->secThree_description;
                $project->SecThree_description_ar = $request->secThree_description_ar;

                $project->ownership = $request->ownership;
                $project->ownership_ar = $request->ownership_ar;

                $project->handover = $request->handover;
                $project->starting_price = $request->price;
                $project->no_of_units = $request->units;
                $project->bedrooms = $request->bedrooms;
                $project->bathrooms = $request->bathrooms;
                $project->floors = $request->floors;
                $project->unit_size_range = $request->area_range;
                $project->outdoor_area = $request->outdoor_area_range;
                $project->terrace_area = $request->terrace_area_range;


                $project->meta_title = $request->meta_title_en;
                $project->meta_description = $request->meta_description_en;
                $project->meta_keywords = $request->meta_keywords_en;

                $project->meta_title_ar = $request->meta_title_ar;
                $project->meta_description_ar = $request->meta_description_ar;
                $project->meta_keywords_ar = $request->meta_keywords_ar;

                $project->slug_link = '0';
                $project->status = '2';
                $project->save();

            }
            catch(ModelNotFoundException $e)
            {
                // dd(get_class_methods($e));
                // dd($e);

                // SLACK UPDATE

                    //API Url
                    $url = 'https://hooks.slack.com/services/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';

                    //Initiate cURL.
                    $ch = curl_init($url);

                    //The JSON data.
                    $payload = array(
                        'text' => 'ESNAAD MIS | Project Update - Failed | id: '.$id.' | Error : '.$e
                    );

                    //Encode the array into JSON.
                    $jsonDataEncoded = json_encode($payload);

                    //Tell cURL that we want to send a POST request.
                    curl_setopt($ch, CURLOPT_POST, 1);

                    //Attach our encoded JSON string to the POST fields.
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

                    //Set the content type to application/json
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

                    //Execute the request
                    $result = curl_exec($ch);

                // SLACK UPDATE

                return Redirect::back()->withErrors(['msg' => 'Could not find project. Please contact developer.']);
            }


            $this->data['property_id'] = $project->id;
            // return $this->index();
            return redirect()->route('projects.index')->with('success', 'Project information has been updated');
        }
        else
        {   dd('fail');
            return Redirect::back()->withErrors('Record is already Exist');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function status_change($id, $status)
    {
        try
        {
            $projects = Project::findOrFail($id);
        }
        catch(ModelNotFoundException $e)
        {
            // SLACK UPDATE

                //API Url
                $url = 'https://hooks.slack.com/services/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';

                //Initiate cURL.
                $ch = curl_init($url);

                //The JSON data.
                $payload = array(
                    'text' => 'ESNAAD - MIS | Project Update - Status Change - Project Not Found | Searching id: '.$id
                );

                //Encode the array into JSON.
                $jsonDataEncoded = json_encode($payload);

                //Tell cURL that we want to send a POST request.
                curl_setopt($ch, CURLOPT_POST, 1);

                //Attach our encoded JSON string to the POST fields.
                curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

                //Set the content type to application/json
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

                //Execute the request
                $result = curl_exec($ch);

            // SLACK UPDATE

            return Redirect::back()->withErrors(['msg' => 'Could not find project. Please contact developer.']);
        }

        $projects = Project::findOrFail($id);
        if($status == '1')
        {
            $projects->status = 1;
            $projects->slug_link = Str::slug($projects->name);
            $projects->save();
            return Redirect::back()->with('message', 'Project is now live!');


        } elseif ($status == '2') {
            $projects->status = 2;
            $projects->slug_link = '0';
            $projects->save();
            return Redirect::back()->with('message', 'Project has been drafted');

        } elseif($status == '3') {
            $projects->status = 3;
            $projects->slug_link = '0';
            $projects->save();
            return Redirect::back()->with('message', 'Project has been moved to trash');
        } else {
            return Redirect::back()->withErrors(['msg' => 'Invalid URL. Please contact developer.']);
        }

        $this->data['project'] = $projects;
        return Redirect::back()->with('message', 'Project status has been changed');
    }








    /**
     * BROCHURE SETTINGS
     */
    public function project_brochure_connect_store(Request $request) {

        // dd($request->project_id);

        $project = Project::with('project_brochure')->find($request->project_id);

        if($project->project_brochure != null ){
            return Redirect::back()->withErrors(['The selected project already contains a brochure. Remove it first to reassign.' ]);
        }

        $brochure = Project_brochure::find($request->brochure_id);
        $brochure->project_id = $request->project_id;
        $brochure->save();
        return Redirect::back()->with(['msg' => 'Successfully connected']);
    }



    public function project_brochure_disconnect($id) {
        $project = Project::with('project_brochure')->find($id);
        if($project->project_brochure != null) {
            $project->project_brochure->project_id = null;
            $project->project_brochure->save();
        }
        return Redirect::back()->with(['msg' => 'Successfully connected']);
    }





    /**
     * IMAGE SETTINGS
     */
    public function project_image_connect_store(Request $request) {

        $projects = Project::with('project_image')->where('id', $request->project_id)->get();
        // dd($projects[0]->project_image);

        if($projects[0]->project_image != null ){
            return Redirect::back()->withErrors(['The selected project already contains a image. Remove it first to reassign.' ]);
        }

        $segment = Project_image::find($request->image_id);
        $segment->project_id = $request->project_id;
        $segment->save();
        return $this->index();
    }



    public function project_image_disconnect($id) {
        $project = Project::with('project_image')->find($id);

        // dd($project);
        if($project->project_image != null) {
            $project->project_image->project_id = null;
            $project->project_image->save();
        }
        return Redirect::back()->with(['msg' => 'Successfully connected']);
    }






    /**
     * IMAGE SETTINGS
     */
    public function project_factsheet_connect_store(Request $request) {

        $projects = Project::with('project_factsheet')->where('id', $request->project_id)->get();
        // dd($projects[0]->project_image);

        if($projects[0]->project_factsheet != null ){
            return Redirect::back()->withErrors(['The selected project already contains a image. Remove it first to reassign.' ]);
        }

        $segment = Project_factsheet::find($request->factsheet_id);
        $segment->project_id = $request->project_id;
        $segment->save();
        return $this->index();
    }



    public function project_factsheet_disconnect($id) {
        $project = Project::with('project_factsheet')->find($id);

        // dd($project);
        if($project->project_factsheet != null) {
            $project->project_factsheet->project_id = null;
            $project->project_factsheet->save();
        }
        return Redirect::back()->with(['msg' => 'Successfully connected']);
    }







    /**
     * VIDEO SETTINGS
     */
    public function project_video_connect_store(Request $request) {

        $projects = Project::with('project_video')->where('id', $request->project_id)->get();
        // dd($projects[0]->project_image);

        if($projects[0]->project_video != null ){
            return Redirect::back()->withErrors(['The selected project already contains a video. Remove it first to reassign.' ]);
        }

        $segment = Project_video::find($request->video_id);
        $segment->project_id = $request->project_id;
        $segment->save();

        return Redirect::back()->with(['msg' => 'Successfully connected']);
    }



    public function project_video_disconnect($id) {
        $project = Project::with('project_video')->find($id);

        // dd($project);
        if($project->project_video != null) {
            $project->project_video->project_id = null;
            $project->project_video->save();
        }
        return Redirect::back()->with(['msg' => 'Successfully connected']);
    }








    /**
     * TRANSLATION SETTINGS
     */
    public function project_translation_connect_store(Request $request) {

        // $projects = Project::with('project_translation')->where('id', $request->project_id)->get();
        $result = Project_translation::with('project')->where('project_id', $request->project_id)->get();
        // dd($projects[0]->project_image);

        if($result[0]->project_id != null ){
            return Redirect::back()->withErrors(['The selected translation is already linked to a project. Remove it first to reassign.' ]);
        }

        $segment = Project_translation::where('project_id', $request->project_id)->get();
        $segment[0]->project_id = $request->project_id;
        $segment[0]->status = '1';
        $segment[0]->slug_link = Str::slug($segment[0]->name);
        $segment[0]->save();

        return Redirect::back()->with(['msg' => 'Successfully connected']);
    }



    public function project_translation_disconnect($id) {
        $result = Project_translation::with('project')->where('project_id', $id)->get();

        if($result->project_id != null) {
            $result->project_id = null;
            $result->status = '2';
            $result->slug_link = '0';
            $result->save();
        }
        return Redirect::back()->with(['msg' => 'Successfully connected']);
    }

}
