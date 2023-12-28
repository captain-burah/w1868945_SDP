<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Unit;
use App\Models\Unit_brochure;
use App\Models\Unit_floorplan;
use App\Models\Unit_paymentplan;
use App\Models\UnitPaymentplanFile;
use App\Models\Unit_image;
use App\Models\UnitPaymentPlanController;
use App\Models\UnitFloorPlanController;
use App\Models\Language;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log; // send notifications via slack or any other means
use Illuminate\Support\Str;

class UnitController extends Controller
{
    // function __construct()
    // {
    //      $this->middleware('permission:listing-list|project-create|project-edit|project-delete', ['only' => ['index','show']]);
    //      $this->middleware('permission:listing-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:listing-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:listing-delete', ['only' => ['destroy']]);
    // }



    /**
     * OVERALL PROJECTS
     */

    public function index()
    {
        $units = Unit::with('project')->with('unit_brochure')->where('status', '1')->orderBY('id', 'Desc');

        $this->data['count_draft'] = $count_draft = Unit::where('status', '2')->orderBY('id', 'Desc')->count();
        $this->data['count_active'] = $count_active = Unit::where('status', '1')->orderBY('id', 'Desc')->count();
        $this->data['count_trash'] = $count_trash = Unit::where('status', '3')->orderBY('id', 'Desc')->count();
        $this->data['unit_translated'] = $unit_translated = Language::all();
        $this->data['language'] = $lang = Language::all();

        $check_availability = $units->get();

        if($check_availability->isEmpty()) {
            $this->data['count_status'] = 'No units found. You can launch a new unit above to start-off';
            $this->data['units'] = $units;
        } else {
            $this->data['units'] = $units->get();
        }

        $this->data['brochures'] = Unit_brochure::with('unit_brochure_files')->get();
        $this->data['images'] = Unit_image::with('unit_image_files')->get();
        $this->data['floorplans'] = Unit_floorplan::with('unit_floorplan_files')->get();
        $this->data['paymentplans'] = Unit_paymentplan::with('unit_paymentplan_files')->get();
        $this->data['project_unit'] = '0';

        return view('unitsActive', $this->data);
    }





    public function index_drafts()
    {
        $units = Unit::with('project')->where('status', '2')->orderBY('id', 'Desc');


        $this->data['count_draft'] = $count_draft = Unit::where('status', '2')->orderBY('id', 'Desc')->count();
        $this->data['count_active'] = $count_active = Unit::where('status', '1')->orderBY('id', 'Desc')->count();
        $this->data['count_trash'] = $count_trash = Unit::where('status', '3')->orderBY('id', 'Desc')->count();
        $this->data['language'] = $lang = Language::all();

        $check_availability = $units->get();

        if($check_availability->isEmpty()) {

            $this->data['count_status'] = 'No units found. You can launch a new unit above to start-off';

            $this->data['units'] = $units;

        } else {

            $this->data['units'] = $units->paginate(30);

        }

        $projects = Project::where('status', '1')->orWhere('status', '2')->get();
        $this->data['projects'] = $projects;
        $this->data['brochures'] = Unit_brochure::with('unit_brochure_files')->get();
        $this->data['images'] = Unit_image::with('unit_image_files')->get();
        $this->data['floorplans'] = Unit_floorplan::with('unit_floorplan_files')->get();
        $this->data['paymentplans'] = Unit_paymentplan::with('unit_paymentplan_files')->get();
        $this->data['project_unit'] = '0';

        return view('unitsActive', $this->data);
    }




    public function index_trash()
    {
        $units = Unit::with('project    ')->where('status', '3')->orderBY('id', 'Desc');

        $this->data['count_draft'] = $count_draft = Unit::where('status', '2')->orderBY('id', 'Desc')->count();
        $this->data['count_active'] = $count_active = Unit::where('status', '1')->orderBY('id', 'Desc')->count();
        $this->data['count_trash'] = $count_trash = Unit::where('status', '3')->orderBY('id', 'Desc')->count();
        $this->data['language'] = $lang = Language::all();

        $check_availability = $units->get();

        if($check_availability->isEmpty()) {
            $this->data['count_status'] = 'No units found. You can launch a new unit above to start-off';
            $this->data['projects'] = $units;
        } else {
            $this->data['units'] = $units->paginate(30);
        }
        $projects = Project::where('status', '1')->orWhere('status', '2')->get();
        $this->data['projects'] = $projects;
        $this->data['brochures'] = Unit_brochure::with('unit_brochure_files')->get();
        $this->data['images'] = Unit_image::with('unit_image_files')->get();
        $this->data['floorplans'] = Unit_floorplan::with('unit_floorplan_files')->get();
        $this->data['paymentplans'] = Unit_paymentplan::with('unit_paymentplan_files')->get();
        $this->data['project_unit'] = '0';

        return view('unitsActive', $this->data);
    }





    /**
     * UNITS SCOPED UNDER PROJECTS ID
     */

    public function project_units_active($id){
        $units = Unit::with('project')->where('project_id', $id)->where('status', '1')->orderBY('id', 'Desc');


        $this->data['count_draft'] = $count_draft = Unit::where('project_id', $id)->where('status', '2')->orderBY('id', 'Desc')->count();
        $this->data['count_active'] = $count_active = Unit::where('project_id', $id)->where('status', '1')->orderBY('id', 'Desc')->count();
        $this->data['count_trash'] = $count_trash = Unit::where('project_id', $id)->where('status', '3')->orderBY('id', 'Desc')->count();
        $this->data['unit_translated'] = $unit_translated = Language::all();
        $this->data['language'] = $lang = Language::all();

        $check_availability = $units->get();

        if($check_availability->isEmpty()) {
            $this->data['count_status'] = 'No units found. You can launch a new unit above to start-off';
            $this->data['units'] = $units;
        } else {
            $this->data['units'] = $units->get();
        }

        $projects = Project::where('status', '1')->orWhere('status', '2')->get();
        $project = Project::find($id);
        $this->data['projects'] = $projects;
        $this->data['brochures'] = Unit_brochure::with('unit_brochure_files')->get();
        $this->data['images'] = Unit_image::with('unit_image_files')->get();
        $this->data['floorplans'] = Unit_floorplan::with('unit_floorplan_files')->get();
        $this->data['project_unit'] = '1';
        $this->data['project_id'] = $id;
        $this->data['project'] = $project;


        return view('unitsActive', $this->data);
    }




    public function project_units_draft($id)
    {
        $units = Unit::with('project')->where('status', '2')->where('project_id', $id)->orderBY('id', 'Desc');

        $this->data['count_draft'] = $count_draft = Unit::where('project_id', $id)->where('status', '2')->orderBY('id', 'Desc')->count();
        $this->data['count_active'] = $count_active = Unit::where('project_id', $id)->where('status', '1')->orderBY('id', 'Desc')->count();
        $this->data['count_trash'] = $count_trash = Unit::where('project_id', $id)->where('status', '3')->orderBY('id', 'Desc')->count();
        $this->data['language'] = $lang = Language::all();

        $check_availability = $units->get();

        if($check_availability->isEmpty()) {

            $this->data['count_status'] = 'No units found. You can launch a new unit above to start-off';

            $this->data['units'] = $units;

        } else {

            $this->data['units'] = $units->paginate(30);

        }

        $projects = Project::where('status', '!=', '3')->get();
        // dd($projects[0]);
        $this->data['project'] = $projects[0];
        $this->data['brochures'] = Unit_brochure::with('unit_brochure_files')->get();
        $this->data['images'] = Unit_image::with('unit_image_files')->get();
        $this->data['floorplans'] = Unit_floorplan::with('unit_floorplan_files')->get();
        $this->data['paymentplans'] = Unit_paymentplan::with('unit_paymentplan_files')->get();
        $this->data['project_unit'] = '1';
        $this->data['project_id'] = $id;
        // dd($units);

        return view('unitsActive', $this->data);
    }




    public function project_units_trash($id)
    {
        $units = Unit::with('project')->where('id', $id)->where('status', '3')->where('project_id', $id)->orderBY('id', 'Desc');


        $this->data['count_draft'] = $count_draft = Unit::where('project_id', $id)->where('status', '2')->orderBY('id', 'Desc')->count();
        $this->data['count_active'] = $count_active = Unit::where('project_id', $id)->where('status', '1')->orderBY('id', 'Desc')->count();
        $this->data['count_trash'] = $count_trash = Unit::where('project_id', $id)->where('status', '3')->orderBY('id', 'Desc')->count();
        $this->data['language'] = $lang = Language::all();

        $check_availability = $units->get();

        if($check_availability->isEmpty()) {
            $this->data['count_status'] = 'No units found. You can launch a new unit above to start-off';
            $this->data['projects'] = $units;
        } else {
            $this->data['units'] = $units->paginate(30);
        }

        $projects = Project::where('status', '1')->orWhere('status', '2')->get();
        $this->data['projects'] = $projects;
        $this->data['brochures'] = Unit_brochure::with('unit_brochure_files')->get();
        $this->data['images'] = Unit_image::with('unit_image_files')->get();
        $this->data['floorplans'] = Unit_floorplan::with('unit_floorplan_files')->get();
        $this->data['paymentplans'] = Unit_paymentplan::with('unit_paymentplan_files')->get();
        $this->data['project_unit'] = '1';
        $this->data['project_id'] = $id;

        return view('unitsActive', $this->data);
    }





    public function create()
    {
        $this->data['projects'] = $projects = Project::select(['id', 'name'])->where('status', '2')->orWhere('status', '1')->get();
        // dd($projects);
        return view('unit.create.index', $this->data);
    }



    public function store(Request $request)
    {

        $validatedData = $request->validate([

            'unit_name' => ['required'],

            'unit_size' => ['required'],

            'price' => ['required'],

            'bathrooms' => ['required'],

            'bedrooms' => ['required'],
        ]);

        $bool=0;



		if($bool==0)
		{
            $unit = new Unit();
            $unit->project_id = $request->project;
            $unit->name = $request->unit_name;
            $unit->unit_price = $request->price;
            $unit->oqood_amount = $request->admin_fees;
            $unit->dld_fees = $request->dld_fees;
            $unit->bedroom = $request->bedrooms;
            $unit->bathroom = $request->bathrooms;
            $unit->floor = $request->floor;
            $unit->unit_size_range = $request->area_range;
            $unit->outdoor_area = $request->outdoor_area_range;
            $unit->slug_link = '0';
            $unit->status = '2';
            $unit->save();

            $payment = new Unit_paymentplan();
            $payment->unit_id = $unit->id;
            $payment->name = $request->unit_name;
            $payment->save();

            $inputs = $request->all();

            foreach($inputs['group_a'] as $data){
                if($data['milestone'] != null){
                    $payment_milestone = new UnitPaymentplanFile();
                    $payment_milestone->unit_paymentplan_id = $payment->id;
                    $payment_milestone->name = $data['milestone'];
                    $payment_milestone->percentage = $data['percentage'];
                    $payment_milestone->amount = $data['amount'];
                    $payment_milestone->date = Carbon::now();
                    $payment_milestone->save();
                }
            }

            $this->data['property_id'] = $unit->id;

            return $this->index();
        }
        else
        {   dd('fail');
            return Redirect::back()->withErrors('Record is already Exist');
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->data['results'] = $results = Unit::with('project', 'unit_brochure', 'unit_image', 'unit_paymentplan', 'unit_floorplan', 'unit_state', 'unit_status')->find($id);
        // $results = Unit::with("unit_state")->first();

        // dd($results);

        return view('unit.show.index', $this->data);
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->data['projects'] = $projects = Project::select(['id', 'name'])->where('status', '2')->orWhere('status', '1')->get();
        $this->data['unit'] = $unit = Unit::with('unit_paymentplan')->find($id);
        if($unit->status == '1'){
            return Redirect::back()->withErrors('Sorry! You cannot edit Active units. Please transfer the unit into "Drafts" to proceed.');
        }
        // dd($unit->unit_paymentplan->unit_paymentplan_files[0]->);

        // dd($unit);
        return view('unit.update.index', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $validatedData = $request->validate([

            'unit_name' => ['required'],

            'description' => ['required'],

            'unit_size' => ['required'],

            'price' => ['required'],

            'oqood' => ['required'],

            'dld_fees' => ['required'],

            'bathrooms' => ['required'],

            'bedrooms' => ['required'],

            'area_range' => ['required'],

            'floor' => ['required'],

            'outdoor_area_range' => ['required'],

            'terrace_area_range' => ['required'],

            'meta_title' => ['required'],

            'meta_description' => ['required'],

            'meta_keywords' => ['required']
        ]);

        $bool=0;

		if($bool==0)
		{
            /**
             * UPDATE THE UNIT
             */
            $unit = Unit::find($id);
            $unit->project_id = $request->project;
            $unit->name = $request->unit_name;
            $unit->building_name = $request->building_name;
            $unit->description = $request->description;
            $unit->unit_price = $request->price;
            $unit->land_reg_fee = $request->land_reg_fee;
            $unit->oqood_amount = $request->oqood;
            $unit->dld_fees = $request->dld_fees;
            $unit->bedroom = $request->bedrooms;
            $unit->bathroom = $request->bathrooms;
            $unit->floor = $request->floor;
            $unit->unit_size_range = $request->area_range;
            $unit->outdoor_area = $request->outdoor_area_range;
            $unit->terrace_area = $request->terrace_area_range;
            $unit->meta_title = $request->meta_title;
            $unit->meta_description = $request->meta_description;
            $unit->meta_keywords = $request->meta_keywords;
            $unit->slug_link = '0';
            $unit->status = '2';
            $unit->save();

            // dd($request->paymentplan_id);
            if($request->paymentplan_id == null) {
                $payment = new Unit_paymentplan();
                $payment->unit_id = $unit->id;
                $payment->name = $request->unit_name;
                $payment->save();    
            } else {
                /**FETCH THE EXISTING PAYMENT PLAN AND UPDATE IT*/
                $payment = Unit_paymentplan::with('unit_paymentplan_files')->find($request->paymentplan_id);
                $payment->unit_id = $id;
                $payment->name = $request->unit_name;
                $payment->save();
            }            


            /**GET ALL THE INPUTS INTO AN ARRAY
             * BCZ WE CANNOT LOOP THROUGH INPUT
             * NAMES WITH HYPHEN */
            $inputs = $request->all();


            /**
             * NOW, WE DELETE ALL THE PAYMENT
             * MILESTONES IN DATABASE SO WE
             * WE CAN REMOVE ANY DELETED MILESTONES
             * BY THE USER
             */
            foreach($payment->unit_paymentplan_files as $old_milestones) {
                $file = UnitPaymentplanFile::where('id', $old_milestones->id)->first();
                if($file) {
                    $file->delete();
                }
            }


            /**
             * NOW, WE ADD NEW PAYMENT MILESTONES
             * USING THE REQUEST ARRAY ABOVE
             */
            foreach($inputs['group-a'] as $data){
                $payment_milestone = new UnitPaymentplanFile();
                $payment_milestone->unit_paymentplan_id = $payment->id;
                $payment_milestone->name = $data['milestone'];
                $payment_milestone->date = $data['date'];
                $payment_milestone->percentage = $data['percentage'];
                $payment_milestone->amount = $data['amount'];
                $payment_milestone->save();
            }

            $this->data['property_id'] = $unit->id;

            return $this->index();
        }
        else
        {
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
            $units = Unit::findOrFail($id);
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
                    'text' => 'ESNAAD - MIS | Unit Update - Status Change - Unit Not Found | Searching id: '.$id
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

        $projects = Unit::findOrFail($id);
        if($status == '1')
        {
            $projects->status = 1;
            $projects->slug_link = Str::slug($projects->name);
            $projects->save();
            return Redirect::back()->with('message', 'Unit is now live!');

        } elseif ($status == '2') {
            $projects->status = 2;
            $projects->slug_link = '0';
            $projects->save();
            return Redirect::back()->with('message', 'Unit has been drafted');

        } elseif($status == '3') {
            $projects->status = 3;
            $projects->slug_link = '0';
            $projects->save();
            return Redirect::back()->with('message', 'Unit has been trashed');
        } else {
            return Redirect::back()->withErrors(['msg' => 'Invalid URL. Please contact developer.']);
        }

        $this->data['unit'] = $projects;
        return Redirect::back()->with('message', 'Project status has been changed');
    }







    public function state_change($id, $state)
    {
        try
        {
            $units = Unit::findOrFail($id);
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
                    'text' => 'ESNAAD - MIS | Unit Update - State Change - Unit Not Found | Searching id: '.$id
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

        $projects = Unit::findOrFail($id);
        if($state == '1')
        {
            $projects->state = '1';
            $projects->save();
            return Redirect::back()->with('message', 'Unit has been transferred to Listed!');

        } elseif ($state == '2') {
            $projects->state = 2;
            $projects->save();
            return Redirect::back()->with('message', 'Unit has been transferred to Booked');

        } elseif($state == '3') {
            $projects->state = 3;
            $projects->save();
            return Redirect::back()->with('message', 'Unit has been transferred to Amortizing');

        } elseif($state == '4') {
            $projects->state = 4;
            $projects->save();
            return Redirect::back()->with('message', 'Unit has been transferred to Sold');

        } elseif($state == '5') {
            $projects->state = 5;
            $projects->save();
            return Redirect::back()->with('message', 'Unit has been transferred to Resale');

        } else {
            return Redirect::back()->withErrors(['msg' => 'Invalid URL. Please contact developer.']);
        }

        $this->data['unit'] = $projects;

        return Redirect::back()->with('message', 'Project status has been changed');
    }













    /**
     * BROCHURE SETTINGS
     */
    public function unit_brochure_connect_store(Request $request) {

        // dd($request->project_id);

        $project = Unit::with('unit_brochure')->find($request->project_id);

        if($project->unit_brochure != null ){
            return Redirect::back()->withErrors(['The selected project already contains a brochure. Remove it first to reassign.' ]);
        }

        $brochure = Unit_brochure::find($request->brochure_id);
        $brochure->unit_id = $request->project_id;
        $brochure->save();
        return Redirect::back()->with(['msg' => 'Successfully connected']);
    }



    public function unit_brochure_disconnect($id) {
        $project = Unit::with('unit_brochure')->find($id);
        if($project->unit_brochure != null) {
            $project->unit_brochure->unit_id = null;
            $project->unit_brochure->save();
        }
        return Redirect::back()->with(['msg' => 'Successfully connected']);
    }








    /**
     * FLOORPLAN SETTINGS
     */
    public function unit_floorplan_connect_store(Request $request) {

        // dd($request->project_id);

        $project = Unit::with('unit_floorplan')->find($request->project_id);


        if($project->unit_floorplan != null ){
            return Redirect::back()->withErrors(['The selected unit already contains a floorplan or the floorplan is assigned to another unit. Remove it first to reassign.' ]);
        }

        $brochure = Unit_floorplan::find($request->floorplan_id);
        $brochure->unit_id = $request->project_id;
        $brochure->save();
        return Redirect::back()->with(['msg' => 'Successfully connected']);
    }



    public function unit_floorplan_disconnect($id) {
        $project = Unit::with('unit_floorplan')->find($id);
        if($project->unit_floorplan != null) {
            $project->unit_floorplan->unit_id = null;
            $project->unit_floorplan->save();
        }
        return Redirect::back()->with(['msg' => 'Successfully connected']);
    }






    /**
     * IMAGE SETTINGS
     */
    public function unit_image_connect_store(Request $request) {

        $project = Unit::with('unit_image')->find($request->project_id);

        if($project->unit_image != null ){
            return Redirect::back()->withErrors(['The selected unit already contains a image or the image is assigned to another unit. Remove it first to reassign.' ]);
        }

        $brochure = Unit_image::find($request->image_id);
        $brochure->unit_id = $request->project_id;
        $brochure->save();
        return Redirect::back()->with(['msg' => 'Successfully connected']);
    }



    public function unit_image_disconnect($id) {
        $project = Unit::with('unit_image')->find($id);
        if($project->unit_image != null) {
            $project->unit_image->unit_id = null;
            $project->unit_image->save();
        }
        return Redirect::back()->with(['msg' => 'Successfully connected']);
    }




    /**
     * PROJECT SETTINGS
     */
    public function unit_project_connect_store(Request $request) {

        $units = Unit::with('project')->find($request->unit_id);

        if($units->unit_project != null ){
            return Redirect::back()->withErrors(['The selected project already contains a unit or the unit is assigned to another project. Remove it first to reassign.' ]);
        }


        $brochure = Unit::with('project')->find($request->unit_id);
        $brochure->project_id = $request->project_id;
        $brochure->save();
        return Redirect::back()->with(['msg' => 'Successfully connected']);
    }



    public function unit_project_disconnect($id) {
        $unit = Unit::with('project')->find($id);

        if($unit != null) {
            $unit->project_id = null;
            $unit->save();
        }
        return Redirect::back()->with(['msg' => 'Successfully connected']);
    }

}
