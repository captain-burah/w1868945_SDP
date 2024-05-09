<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use App\Models\Project;
use App\Models\Project_brochure;
use App\Models\Project_type;
use App\Models\Emirate;
use App\Models\Project_image;
use App\Models\Project_factsheet;
use App\Models\Project_video;
use App\Models\Language;
use App\Models\Lead;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log; // send notifications via slack or any other means
use Illuminate\Support\Str;

class LeadController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:project-list|project-create|project-edit|project-delete', ['only' => ['index','show']]);
         $this->middleware('permission:project-create', ['only' => ['create','store']]);
         $this->middleware('permission:project-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:project-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    //     $projects = Project::with('project_brochure')->where('status', '1')->orderBY('id', 'Desc');

    //     $this->data['count_draft'] = $count_draft = Project::where('status', '2')->orderBY('id', 'Desc')->count();
    //     $this->data['count_active'] = $count_active = Project::where('status', '1')->orderBY('id', 'Desc')->count();
    //     $this->data['count_trash'] = $count_trash = Project::where('status', '3')->orderBY('id', 'Desc')->count();
    //     $this->data['project_translated'] = $project_translated = Language::all();
    //     $this->data['language'] = $lang = Language::all();

    //     $check_availability = $projects->get();

    //     if($check_availability->isEmpty()) {
    //         $this->data['count_status'] = 'No projects found. You can launch a new project above to start-off';
    //         $this->data['projects'] = $projects;
    //     } else {
    //         $this->data['projects'] = $projects->get();
    //     }

    //     $this->data['brochures'] = Project_brochure::with('project_brochure_files')->get();
    //     $this->data['images'] = Project_image::with('project_image_files')->get();
    //     $this->data['factsheets'] = Project_factsheet::with('project_factsheet_files')->get();
    //     $this->data['videos'] = Project_video::with('project_video_files')->get();

        return view('leads');
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



    public function leads_listings()
    {
        $result = Lead::orderby('created_at', 'asc')->get();

        $domain_list=Lead::whereNotNull('url')->select('url')->groupby('url')->get();

        $this->data['domain_lists'] =  $domain_list ;
        $this->data['leds'] =  $result ;
        return view('leads.leads_list', $this->data);
    }

    public function domain_filter(Request $request)
    {
        if($request->domain == 'All Domains')
        {
            $result = Lead::orderby('created_at', 'asc')->get();

        }
        else{
            $result = Lead::where('url', 'like', '%' . $request->domain . '%')
            ->orderBy('created_at', 'asc')
            ->get();
        }

        $domain_list=Lead::whereNotNull('url')->select('url')->groupby('url')->get();
        $this->data['domain_lists'] =  $domain_list ;
        $this->data['leds'] =  $result ;

        return view('leads.leads_list', $this->data);
    }
}
