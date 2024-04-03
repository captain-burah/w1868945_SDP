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
use App\Models\UnitBrochireFile;
use App\Models\UnitFloorplanFile;
use App\Models\UnitImageFile;
use App\Models\Unit_image;
use App\Models\UnitPaymentPlanController;
use App\Models\UnitFloorPlanController;
use App\Models\Language;
use Carbon\Carbon;
use File;

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


    private $uploadPath = "uploads/units/images/";


    public function dashboard(){
        $units = Unit::select('id', 'status', 'state', 'project_id', 'slug_link', 'unit_price', 'unit_size_range', 'bedroom', 'name', 'project_id', 'unit_floorplan_id')->with('project')->where('status', '1')->orderBY('id', 'ASC');

        $this->data['count_draft'] = $count_draft = Unit::where('status', '2')->orderBY('id', 'ASC')->count();
        $this->data['count_active'] = $count_active = Unit::where('status', '1')->orderBY('id', 'ASC')->count();
        $this->data['count_booked'] = $count_booked = Unit::where('state', '2')->orderBY('id', 'ASC')->count();
        $this->data['count_sold'] = $count_sold = Unit::where('state', '4')->orderBY('id', 'ASC')->count();
        $this->data['count_listed'] = $count_listed = Unit::where('state', '1')->orderBY('id', 'ASC')->count();
        $this->data['count_trash'] = $count_trash = Unit::where('status', '3')->orderBY('id', 'ASC')->count();

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

        return view('dashboard', $this->data);
    }

    /**
     * OVERALL PROJECTS
     */

    public function index()
    { 
        $units = Unit::select('id', 'status', 'state', 'project_id', 'slug_link', 'unit_price', 'unit_size_range', 'bedroom', 'name', 'project_id', 'unit_floorplan_id', 'unit_secondary_floorplan_id')->with('project', 'unit_paymentplan')->where('status', '1')->orderBY('id', 'ASC');

        $this->data['count_draft'] = $count_draft = Unit::where('status', '2')->orderBY('id', 'ASC')->count();
        $this->data['count_active'] = $count_active = Unit::where('status', '1')->orderBY('id', 'ASC')->count();
        $this->data['count_booked'] = $count_booked = Unit::where('state', '2')->orderBY('id', 'ASC')->count();
        $this->data['count_sold'] = $count_sold = Unit::where('state', '4')->orderBY('id', 'ASC')->count();
        $this->data['count_listed'] = $count_listed = Unit::where('state', '1')->orderBY('id', 'ASC')->count();
        $this->data['count_trash'] = $count_trash = Unit::where('status', '3')->orderBY('id', 'ASC')->count();

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

        //Get all payment plans
        $units_paymentplans = [];

        foreach($units as $unit) {
            $new_date_array = [];
            $new_data_set = [];
            foreach($unit->unit_paymentplan->unit_paymentplan_files as $data_sets){
                $data_set_value = $data_sets->name;
                if($data_set_value != 'Down Payment On Booking') {
                    preg_match('/^\d+/', $data_set_value, $matches);
                    if (!empty($matches)) {
                        $new_data_set[] = $matches[0];
                    }
                }
            }
            $int_array = array_map('intval', $new_data_set);
            $selected_date = Carbon::now();
            try {
                $base_date = Carbon::parse($selected_date);
            } catch (Exception $e) {
                return back()->withErrors(['base_date' => 'Please enter a valid date in the format YYYY-MM-DD.']);
            }
            $new_date_array = [];
            $new_date_array[] = $unit->id;
            // $new_date_array[] = $selected_date;
            foreach ($int_array as $month_to_add) {
                $new_date = clone $base_date;  // Clone to avoid modifying the original object
                $new_date->modify("+$month_to_add month");  // Add the month value
                $new_date_array[] = $new_date->format('d/m/Y');  // Format the date string (YYYY-MM-DD)
            }
            $units_paymentplans[] = $new_date_array;
        }
        // dd($units_paymentplans);
        $this->data['units_paymentplans'] = $units_paymentplans;
        
        return view('unitsActive', $this->data);
    }



    public function booked_index(){
        $units = Unit::select('id', 'status', 'state', 'project_id', 'slug_link', 'unit_price', 'unit_size_range', 'bedroom', 'name', 'project_id', 'unit_floorplan_id', 'unit_secondary_floorplan_id')->with('project', 'unit_paymentplan')->where('status', '1')->where('state', '2')->orderBY('id', 'ASC');

        $this->data['count_draft'] = $count_draft = Unit::where('status', '2')->orderBY('id', 'ASC')->count();
        $this->data['count_active'] = $count_active = Unit::where('status', '1')->orderBY('id', 'ASC')->count();
        $this->data['count_trash'] = $count_trash = Unit::where('status', '3')->orderBY('id', 'ASC')->count();
        $this->data['count_booked'] = $count_booked = Unit::where('state', '2')->orderBY('id', 'ASC')->count();
        $this->data['count_sold'] = $count_sold = Unit::where('state', '4')->orderBY('id', 'ASC')->count();
        $this->data['count_listed'] = $count_listed = Unit::where('state', '1')->orderBY('id', 'ASC')->count();

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

        //Get all payment plans
        $units_paymentplans = [];

        foreach($units as $unit) {
            $new_date_array = [];
            $new_data_set = [];
            foreach($unit->unit_paymentplan->unit_paymentplan_files as $data_sets){
                $data_set_value = $data_sets->name;
                if($data_set_value != 'Down Payment On Booking') {
                    preg_match('/^\d+/', $data_set_value, $matches);
                    if (!empty($matches)) {
                        $new_data_set[] = $matches[0];
                    }
                }
            }
            $int_array = array_map('intval', $new_data_set);
            $selected_date = Carbon::now();
            try {
                $base_date = Carbon::parse($selected_date);
            } catch (Exception $e) {
                return back()->withErrors(['base_date' => 'Please enter a valid date in the format YYYY-MM-DD.']);
            }
            $new_date_array = [];
            $new_date_array[] = $unit->id;
            // $new_date_array[] = $selected_date;
            foreach ($int_array as $month_to_add) {
                $new_date = clone $base_date;  // Clone to avoid modifying the original object
                $new_date->modify("+$month_to_add month");  // Add the month value
                $new_date_array[] = $new_date->format('d/m/Y');  // Format the date string (YYYY-MM-DD)
            }
            $units_paymentplans[] = $new_date_array;
        }
        // dd($units_paymentplans);
        $this->data['units_paymentplans'] = $units_paymentplans;

        return view('unitsActive', $this->data);
    }


    public function active_index(){
        $units = Unit::select('id', 'status', 'state', 'project_id', 'slug_link', 'unit_price', 'unit_size_range', 'bedroom', 'name', 'project_id', 'unit_floorplan_id', 'unit_secondary_floorplan_id')->with('project', 'unit_paymentplan')->where('status', '1')->where('state', '1')->orderBY('id', 'ASC');

        $this->data['count_draft'] = $count_draft = Unit::where('status', '2')->orderBY('id', 'ASC')->count();
        $this->data['count_active'] = $count_active = Unit::where('status', '1')->orderBY('id', 'ASC')->count();
        $this->data['count_trash'] = $count_trash = Unit::where('status', '3')->orderBY('id', 'ASC')->count();
        $this->data['count_booked'] = $count_booked = Unit::where('state', '2')->orderBY('id', 'ASC')->count();
        $this->data['count_sold'] = $count_sold = Unit::where('state', '4')->orderBY('id', 'ASC')->count();
        $this->data['count_listed'] = $count_listed = Unit::where('state', '1')->orderBY('id', 'ASC')->count();

        $this->data['unit_translated'] = $unit_translated = Language::all();
        $this->data['language'] = $lang = Language::all();

        $check_availability = $units->get();

        if($check_availability->isEmpty()) {
            $this->data['count_status'] = 'No units found. You can launch a new unit above to start-off';
            $this->data['units'] = $units;
        } else {
            $this->data['units'] = $units =  $units->get();
        }

        $this->data['brochures'] = Unit_brochure::with('unit_brochure_files')->get();
        $this->data['images'] = Unit_image::with('unit_image_files')->get();
        $this->data['floorplans'] = Unit_floorplan::with('unit_floorplan_files')->get();
        $this->data['paymentplans'] = Unit_paymentplan::with('unit_paymentplan_files')->get();
        $this->data['project_unit'] = '0';



        //Get all payment plans
        $units_paymentplans = [];

        foreach($units as $unit) {
            $new_date_array = [];
            $new_data_set = [];
            foreach($unit->unit_paymentplan->unit_paymentplan_files as $data_sets){
                $data_set_value = $data_sets->name;
                if($data_set_value != 'Down Payment On Booking') {
                    preg_match('/^\d+/', $data_set_value, $matches);
                    if (!empty($matches)) {
                        $new_data_set[] = $matches[0];
                    }
                }
            }
            $int_array = array_map('intval', $new_data_set);
            $selected_date = Carbon::now();
            try {
                $base_date = Carbon::parse($selected_date);
            } catch (Exception $e) {
                return back()->withErrors(['base_date' => 'Please enter a valid date in the format YYYY-MM-DD.']);
            }
            $new_date_array = [];
            $new_date_array[] = $unit->id;
            // $new_date_array[] = $selected_date;
            foreach ($int_array as $month_to_add) {
                $new_date = clone $base_date;  // Clone to avoid modifying the original object
                $new_date->modify("+$month_to_add month");  // Add the month value
                $new_date_array[] = $new_date->format('d/m/Y');  // Format the date string (YYYY-MM-DD)
            }
            $units_paymentplans[] = $new_date_array;
        }
        // dd($units_paymentplans);
        $this->data['units_paymentplans'] = $units_paymentplans;


        return view('unitsActive', $this->data);
    }

    public function sold_index(){
        $units = Unit::select('id', 'status', 'state', 'project_id', 'slug_link', 'unit_price', 'unit_size_range', 'bedroom', 'name', 'project_id', 'unit_floorplan_id', 'unit_secondary_floorplan_id')->with('project', 'unit_paymentplan')->where('status', '1')->where('state', '4')->orderBY('id', 'ASC');

        $this->data['count_draft'] = $count_draft = Unit::where('status', '2')->orderBY('id', 'ASC')->count();
        $this->data['count_active'] = $count_active = Unit::where('status', '1')->orderBY('id', 'ASC')->count();
        $this->data['count_trash'] = $count_trash = Unit::where('status', '3')->orderBY('id', 'ASC')->count();
        $this->data['count_booked'] = $count_booked = Unit::where('state', '2')->orderBY('id', 'ASC')->count();
        $this->data['count_sold'] = $count_sold = Unit::where('state', '4')->orderBY('id', 'ASC')->count();
        $this->data['count_listed'] = $count_listed = Unit::where('state', '1')->orderBY('id', 'ASC')->count();

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

        //Get all payment plans
        $units_paymentplans = [];

        foreach($units as $unit) {
            $new_date_array = [];
            $new_data_set = [];
            foreach($unit->unit_paymentplan->unit_paymentplan_files as $data_sets){
                $data_set_value = $data_sets->name;
                if($data_set_value != 'Down Payment On Booking') {
                    preg_match('/^\d+/', $data_set_value, $matches);
                    if (!empty($matches)) {
                        $new_data_set[] = $matches[0];
                    }
                }
            }
            $int_array = array_map('intval', $new_data_set);
            $selected_date = Carbon::now();
            try {
                $base_date = Carbon::parse($selected_date);
            } catch (Exception $e) {
                return back()->withErrors(['base_date' => 'Please enter a valid date in the format YYYY-MM-DD.']);
            }
            $new_date_array = [];
            $new_date_array[] = $unit->id;
            // $new_date_array[] = $selected_date;
            foreach ($int_array as $month_to_add) {
                $new_date = clone $base_date;  // Clone to avoid modifying the original object
                $new_date->modify("+$month_to_add month");  // Add the month value
                $new_date_array[] = $new_date->format('d/m/Y');  // Format the date string (YYYY-MM-DD)
            }
            $units_paymentplans[] = $new_date_array;
        }
        // dd($units_paymentplans);
        $this->data['units_paymentplans'] = $units_paymentplans;

        return view('unitsActive', $this->data);
    }

    public function inactive_index(){
        $units = Unit::select('id', 'status', 'state', 'project_id', 'slug_link', 'unit_price', 'unit_size_range', 'bedroom', 'name', 'project_id', 'unit_floorplan_id', 'unit_secondary_floorplan_id')->with('project', 'unit_paymentplan')->where('status', '')->where('state', '4')->orderBY('id', 'ASC');

        $this->data['count_draft'] = $count_draft = Unit::where('status', '2')->orderBY('id', 'ASC')->count();
        $this->data['count_active'] = $count_active = Unit::where('status', '1')->orderBY('id', 'ASC')->count();
        $this->data['count_trash'] = $count_trash = Unit::where('status', '3')->orderBY('id', 'ASC')->count();
        $this->data['count_booked'] = $count_booked = Unit::where('state', '2')->orderBY('id', 'ASC')->count();
        $this->data['count_sold'] = $count_sold = Unit::where('state', '4')->orderBY('id', 'ASC')->count();
        $this->data['count_listed'] = $count_listed = Unit::where('state', '1')->orderBY('id', 'ASC')->count();

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

        //Get all payment plans
        $units_paymentplans = [];

        foreach($units as $unit) {
            $new_date_array = [];
            $new_data_set = [];
            foreach($unit->unit_paymentplan->unit_paymentplan_files as $data_sets){
                $data_set_value = $data_sets->name;
                if($data_set_value != 'Down Payment On Booking') {
                    preg_match('/^\d+/', $data_set_value, $matches);
                    if (!empty($matches)) {
                        $new_data_set[] = $matches[0];
                    }
                }
            }
            $int_array = array_map('intval', $new_data_set);
            $selected_date = Carbon::now();
            try {
                $base_date = Carbon::parse($selected_date);
            } catch (Exception $e) {
                return back()->withErrors(['base_date' => 'Please enter a valid date in the format YYYY-MM-DD.']);
            }
            $new_date_array = [];
            $new_date_array[] = $unit->id;
            // $new_date_array[] = $selected_date;
            foreach ($int_array as $month_to_add) {
                $new_date = clone $base_date;  // Clone to avoid modifying the original object
                $new_date->modify("+$month_to_add month");  // Add the month value
                $new_date_array[] = $new_date->format('d/m/Y');  // Format the date string (YYYY-MM-DD)
            }
            $units_paymentplans[] = $new_date_array;
        }
        // dd($units_paymentplans);
        $this->data['units_paymentplans'] = $units_paymentplans;

        return view('unitsActive', $this->data);
    }





    public function index_drafts()
    {
        $units = Unit::with('project')->where('status', '2')->orderBY('id', 'ASC');


        $this->data['count_draft'] = $count_draft = Unit::where('status', '2')->orderBY('id', 'ASC')->count();
        $this->data['count_active'] = $count_active = Unit::where('status', '1')->orderBY('id', 'ASC')->count();
        $this->data['count_trash'] = $count_trash = Unit::where('status', '3')->orderBY('id', 'ASC')->count();
        $this->data['count_booked'] = $count_booked = Unit::where('state', '2')->orderBY('id', 'ASC')->count();
        $this->data['count_sold'] = $count_sold = Unit::where('state', '4')->orderBY('id', 'ASC')->count();
        $this->data['count_listed'] = $count_listed = Unit::where('state', '1')->orderBY('id', 'ASC')->count();
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

        //Get all payment plans
        $units_paymentplans = [];

        foreach($units as $unit) {
            $new_date_array = [];
            $new_data_set = [];
            foreach($unit->unit_paymentplan->unit_paymentplan_files as $data_sets){
                $data_set_value = $data_sets->name;
                if($data_set_value != 'Down Payment On Booking') {
                    preg_match('/^\d+/', $data_set_value, $matches);
                    if (!empty($matches)) {
                        $new_data_set[] = $matches[0];
                    }
                }
            }
            $int_array = array_map('intval', $new_data_set);
            $selected_date = Carbon::now();
            try {
                $base_date = Carbon::parse($selected_date);
            } catch (Exception $e) {
                return back()->withErrors(['base_date' => 'Please enter a valid date in the format YYYY-MM-DD.']);
            }
            $new_date_array = [];
            $new_date_array[] = $unit->id;
            // $new_date_array[] = $selected_date;
            foreach ($int_array as $month_to_add) {
                $new_date = clone $base_date;  // Clone to avoid modifying the original object
                $new_date->modify("+$month_to_add month");  // Add the month value
                $new_date_array[] = $new_date->format('d/m/Y');  // Format the date string (YYYY-MM-DD)
            }
            $units_paymentplans[] = $new_date_array;
        }
        // dd($units_paymentplans);
        $this->data['units_paymentplans'] = $units_paymentplans;

        return view('unitsActive', $this->data);
    }




    public function index_trash()
    {
        $units = Unit::with('project')->where('status', '3')->orderBY('id', 'ASC');

        $this->data['count_draft'] = $count_draft = Unit::where('status', '2')->orderBY('id', 'ASC')->count();
        $this->data['count_active'] = $count_active = Unit::where('status', '1')->orderBY('id', 'ASC')->count();
        $this->data['count_trash'] = $count_trash = Unit::where('status', '3')->orderBY('id', 'ASC')->count();
        $this->data['count_booked'] = $count_booked = Unit::where('state', '2')->orderBY('id', 'ASC')->count();
        $this->data['count_sold'] = $count_sold = Unit::where('state', '4')->orderBY('id', 'ASC')->count();
        $this->data['count_listed'] = $count_listed = Unit::where('state', '1')->orderBY('id', 'ASC')->count();
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

        //Get all payment plans
        $units_paymentplans = [];

        foreach($units as $unit) {
            $new_date_array = [];
            $new_data_set = [];
            foreach($unit->unit_paymentplan->unit_paymentplan_files as $data_sets){
                $data_set_value = $data_sets->name;
                if($data_set_value != 'Down Payment On Booking') {
                    preg_match('/^\d+/', $data_set_value, $matches);
                    if (!empty($matches)) {
                        $new_data_set[] = $matches[0];
                    }
                }
            }
            $int_array = array_map('intval', $new_data_set);
            $selected_date = Carbon::now();
            try {
                $base_date = Carbon::parse($selected_date);
            } catch (Exception $e) {
                return back()->withErrors(['base_date' => 'Please enter a valid date in the format YYYY-MM-DD.']);
            }
            $new_date_array = [];
            $new_date_array[] = $unit->id;
            // $new_date_array[] = $selected_date;
            foreach ($int_array as $month_to_add) {
                $new_date = clone $base_date;  // Clone to avoid modifying the original object
                $new_date->modify("+$month_to_add month");  // Add the month value
                $new_date_array[] = $new_date->format('d/m/Y');  // Format the date string (YYYY-MM-DD)
            }
            $units_paymentplans[] = $new_date_array;
        }
        // dd($units_paymentplans);
        $this->data['units_paymentplans'] = $units_paymentplans;

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
            $unit->bathroom = null;
            $unit->floor = $request->floor;
            $unit->unit_size_range = $request->unit_size;
            $unit->outdoor_area = $request->outdoor_area_range;
            $unit->slug_link = '0';
            $unit->status = '1';
            $unit->save();

            $payment = new Unit_paymentplan();
            $payment->unit_id = $unit->id;
            $payment->name = $request->unit_name;
            $payment->save();

            $inputs = $request->all();

            if(!$inputs['group_a'])  return redirect()->back()->with('error', 'No Payment Plan');;

            foreach($inputs['group_a'] as $data){
                if($data['amount'] != null && $data['milestone'] != null && $data['percentage'] != null){
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
        $this->data['results'] = $results = Unit::with('project', 'unit_image', 'unit_paymentplan', 'unit_floorplan', 'unit_state', 'unit_status')->find($id);
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
        // if($unit->status == '1'){
        //     return Redirect::back()->withErrors('Sorry! You cannot edit Active units. Please transfer the unit into "Drafts" to proceed.');
        // }
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
        // $validatedData = $request->validate([

        //     'unit_name' => ['required'],

        //     'dld_fees' => ['required'],
            
        //     'admin_fees' => ['required'],

        //     'unit_size' => ['required'],

        //     'price' => ['required'],

        //     'bathrooms' => ['required'],

        //     'bedrooms' => ['required'],
        // ]);

        $bool=0;

        if($bool==0)
		{
            $unit = Unit::find($id);
            $unit->project_id = $request->project;
            $unit->name = $request->unit_name;
            $unit->unit_price = $request->price;
            $unit->oqood_amount = $request->admin_fees;
            $unit->dld_fees = $request->dld_fees;
            $unit->bedroom = $request->bedrooms;
            $unit->bathroom = null;
            $unit->floor = $request->floor;
            $unit->unit_size_range = $request->unit_size;
            $unit->outdoor_area = $request->outdoor_area_range;
            $unit->slug_link = '0';
            $unit->status = '1';
            $unit->save();
            
            $inputs = $request->all();
            // dd($request);
            $unit_id = $unit->id;
            $unit_paymentplan = Unit_paymentplan::where('unit_id', $unit_id)->get();
            if((!$request->group_a) && $unit_paymentplan == null){
                dd('fdsa');
                return redirect()->back()->with('error', 'No Payment Plan');
            } elseif( ($request->group_a)){
                $unit_paymentplan = Unit_paymentplan::where('unit_id', $unit_id)->get();

                if(!$unit_paymentplan->isEmpty()){
                    $old_milestones = UnitPaymentplanFile::where('unit_paymentplan_id', $unit_paymentplan[0]->id)->get();
                    foreach($old_milestones as $milestones){
                        $milestones->delete();
                    }
                    foreach($unit_paymentplan as $pay){
                        $pay->delete();
                    };
                }
                

                // dd($unit_paymentplan);
                $payment = new Unit_paymentplan();
                $payment->unit_id = $unit_id;
                $payment->name = $request->unit_name;
                $payment->save();
                $payment_id = $payment->id;

                foreach($inputs['group_a'] as $data){
                    if($data['amount'] != null && $data['milestone'] != null && $data['percentage'] != null){
                        $payment_milestone = new UnitPaymentplanFile();
                        $payment_milestone->unit_paymentplan_id = $payment_id;
                        $payment_milestone->name = $data['milestone'];
                        $payment_milestone->percentage = $data['percentage'];
                        $payment_milestone->amount = $data['amount'];
                        $payment_milestone->date = Carbon::now();
                        $payment_milestone->save();
                    }
                }
            } 
            // dd($request);
            
            $this->data['property_id'] = $unit->id;

            return $this->index();
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
            $units = Unit::findOrFail($id);
        } catch(ModelNotFoundException $e)
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

        } elseif($state == '0') {
            $projects->state = null;
            $projects->save();
            return Redirect::back()->with('message', 'Unit has been transferred to N/A');

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

        if($request->type == 'secondary'){
            $unit = Unit::select('id', 'project_id', 'unit_floorplan_id')->with('unit_floorplan')->find($request->project_id);
            $unit->unit_secondary_floorplan_id = $request->floorplan_id;
            $unit->save();
        } else {
            $unit = Unit::select('id', 'project_id', 'unit_floorplan_id')->with('unit_floorplan')->find($request->project_id);
            $unit->unit_floorplan_id = $request->floorplan_id;
            $unit->save();
        }
        

        
        // dd($unit);

        // if($project->unit_floorplan != null ){
        //     return Redirect::back()->withErrors(['The selected unit already contains a floorplan or the floorplan is assigned to another unit. Remove it first to reassign.' ]);
        // }

        // $brochure = Unit_floorplan::find($request->floorplan_id);
        // $brochure->unit_id = $request->project_id;
        // $brochure->save();

        return Redirect::back()->with(['msg' => 'Successfully connected']);
    }



    public function unit_floorplan_disconnect($id) {
        $unit = Unit::with('unit_floorplan')->find($id);
        $unit->unit_floorplan_id = null;
        $unit->save();
        
        return Redirect::back()->with(['msg' => 'Successfully connected']);
    }


    public function unit_secondary_floorplan_disconnect($id) {
        $unit = Unit::with('unit_floorplan')->find($id);
        $unit->unit_secondary_floorplan_id = null;
        $unit->save();
        
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



    public function sales_offer($id) {
        $this->data['unit'] = $unit = Unit::with('unit_floorplan', 'unit_image', 'unit_paymentplan', 'unit_floorplan', 'unit_status', 'unit_state', 'booking', 'project' )->find($id);

        $this->data['unit_paymentplan'] = $unit_paymentplan = Unit_paymentplan::with('unit_paymentplan_files', 'unit')->where('unit_id', $unit->id)->get();
        

        // $pdf = PDF::loadView('booking.reservationAgreement', $this->data);
        return view('unit.salesOffer.index', $this->data);
        // return $pdf->setPaper('a4', 'portrait')->download('reservation-agreement.pdf');
    }


    public function sales_offer_print(Request $request) {

        $this->data['unit'] =  $unit = Unit::with('unit_floorplan', 'unit_image', 'unit_paymentplan', 'unit_floorplan', 'unit_status', 'unit_state', 'booking', 'project' )->find($request->unit);
        // dd($unit->project->name);
        $new_data_set = [];
        foreach($unit->unit_paymentplan->unit_paymentplan_files as $data_sets){
            $data_set_value = $data_sets->name;
            if($data_set_value != 'Down Payment On Booking') {
                preg_match('/^\d+/', $data_set_value, $matches);
                if (!empty($matches)) {
                    $new_data_set[] = $matches[0];
                }
            }
        }
        $int_array = array_map('intval', $new_data_set);
        $new_date_array = [];
        $selected_date = $request->date;
        try {
            $base_date = Carbon::parse($selected_date);
        } catch (Exception $e) {
            return back()->withErrors(['base_date' => 'Please enter a valid date in the format YYYY-MM-DD.']);
        }
        $new_date_array = [];
        // $new_date_array[] = $selected_date;
        foreach ($int_array as $month_to_add) {
            $new_date = clone $base_date;  // Clone to avoid modifying the original object
            $new_date->modify("+$month_to_add month");  // Add the month value
            $new_date_array[] = $new_date->format('d/m/Y');  // Format the date string (YYYY-MM-DD)
        }

        // dd($new_date_array);
        $this->data['unit_paymentplan'] = $unit_paymentplan = Unit_paymentplan::with('unit_paymentplan_files', 'unit')->where('unit_id', $unit->id)->get();
        $this->data['new_date_array'] = $new_date_array;
        $this->data['date'] = $request->date;
        return view('unit.salesOffer.index', $this->data);

    }


    public function unit_duplicate($id){

        // REPLICATE UNIT RECORD
        $unitRecord = Unit::find($id);
        $newUnitRecord = $unitRecord->replicate();
        $newUnitRecord->created_at = Carbon::now();
        $newUnitRecord->updated_at = Null;
        $newUnitRecord->save();

        $newUnitId = $newUnitRecord->id;

        // REPLICATE PAYMENT PLAN RECORD
        $checkPayment = Unit_paymentplan::where('unit_id', $newUnitId)->first();
        if(!$checkPayment){
            $paymentRecord = Unit_paymentplan::where('unit_id', $id)->first();
            $newPaymentRecord = $paymentRecord->replicate();
            $newPaymentRecord->unit_id = $newUnitId;
            $newPaymentRecord->created_at = Carbon::now();
            $newPaymentRecord->updated_at = Null;
            $newPaymentRecord->save();

            $newPaymentRecordId = $newPaymentRecord->id;

            $checkPaymentFiles = UnitPaymentplanFile::where('unit_paymentplan_id', $paymentRecord->id)->get();
            if($checkPaymentFiles != null){
                foreach($checkPaymentFiles as $data){
                    $newPaymentRecordFile = $data->replicate();
                    $newPaymentRecordFile->unit_paymentplan_id = $newPaymentRecordId;
                    $newPaymentRecordFile->created_at = Carbon::now();
                    $newPaymentRecordFile->updated_at = Null;
                    $newPaymentRecordFile->save();
                }
            }
        }

        

        // REPLICATE BROCHURE
        $unit_brochure_update = Unit::find($newUnitId);
        $oldUnit_brochure = Unit::find($id);
        $old_brochure_id = $oldUnit_brochure->unit_brochure_id;
        
        if($oldUnit_brochure != null){
            $unit_brochure_update = Unit::find($newUnitId);
            $unit_brochure_update->unit_brochure_id = $oldUnit_brochure->unit_brochure_id;
            $unit_brochure_update->save();
        }
        // $checkBrochure = Unit_brochure::where('unit_id', $newUnitId)->first();
        // if($checkPayment === null){
        //     $brochureRecord = Unit_brochure::where('unit_id', $id)->first();
        //     if($brochureRecord != null){
        //         $newBrochureRecord = $brochureRecord->replicate();
        //         $newBrochureRecord->unit_id = $newUnitId;
        //         $newBrochureRecord->created_at = Carbon::now();
        //         $newBrochureRecord->updated_at = Null;
        //         $newBrochureRecord->save();

        //         $newBrochureRecordId = $newBrochureRecord->id;

        //         $checkBrochureFiles = UnitBrochureFile::where('unit_brochure_id', $brochureRecord->id)->get();
        //         if($checkBrochureFiles != null){
        //             foreach($checkBrochureFiles as $data){
        //                 $newBrochureRecordFile = $data->replicate();
        //                 $newBrochureRecordFile->unit_brochure_id = $newBrochureRecordId;
        //                 $newBrochureRecordFile->created_at = Carbon::now();
        //                 $newBrochureRecordFile->updated_at = Null;
        //                 $newBrochureRecordFile->save();
        //             }
        //         }
        //     }
            
        // }

        $unit_floorplan_update = Unit::find($newUnitId);
        $oldUnit_floorplan = Unit::find($id);
        if($oldUnit_floorplan != null){
            $unit_floorplan_update = Unit::find($newUnitId);
            $unit_floorplan_update->unit_floorplan_id = $oldUnit_floorplan->unit_floorplan_id;
            $unit_floorplan_update->save();
        }

        // $checkFloors = Unit_floorplan::where('unit_id', $newUnitId)->first();
        // if($checkFloors === null){
        //     $floorRecord = Unit_floorplan::where('unit_id', $id)->first();
        //     if($floorRecord != null){
        //         $newFloorRecord = $floorRecord->replicate();
        //         $newFloorRecord->unit_id = $newUnitId;
        //         $newFloorRecord->created_at = Carbon::now();
        //         $newFloorRecord->updated_at = Null;
        //         $newFloorRecord->save();

        //         $newFloorRecordId = $newFloorRecord->id;

        //         $checkFloorFiles = UnitFloorplanFile::where('unit_floorplan_id', $floorRecord->id)->get();
        //         if($checkFloorFiles != null){
        //             foreach($checkFloorFiles as $data){
        //                 $newFloorRecordFile = $data->replicate();
        //                 $newFloorRecordFile->unit_floorplan_id = $newFloorRecordId;
        //                 $newFloorRecordFile->created_at = Carbon::now();
        //                 $newFloorRecordFile->updated_at = Null;
        //                 $newFloorRecordFile->save();

        //                 $filename = $newFloorRecordFile->name;
        //                 $oldRecord = Unit_floorplan::where('unit_id', $id)->first();
        //                 // dd($oldRecord);
        //                 $newFilenameSegmentId = $newFloorRecordFile->unit_floorplan_id;
        //                 $oldFilenameSegmentId = $oldRecord->id;
        //                 File::makeDirectory(public_path('uploads/units/floorplans/'.$newFilenameSegmentId));
        //                 File::copy(public_path('uploads/units/floorplans/'.$oldFilenameSegmentId.'/'.$filename), public_path('uploads/units/floorplans/'.$newFilenameSegmentId.'/'.$filename));
        //             }
        //         }
        //     }
        // }

        $checkImages = Unit_image::where('unit_id', $newUnitId)->first();
        if($checkImages === null){
            $imageRecord = Unit_image::where('unit_id', $id)->first();
            if($imageRecord != null){
                $newImageRecord = $imageRecord->replicate();
                $newImageRecord->unit_id = $newUnitId;
                $newImageRecord->created_at = Carbon::now();
                $newImageRecord->updated_at = Null;
                $newImageRecord->save();

                $newImageRecordId = $newFloorRecord->id;

                $checkImageFiles = UnitFloorplanFile::where('unit_image_id', $imageRecord->id)->get();
                if($checkImageFiles != null){
                    foreach($checkImageFiles as $data){
                        $newImageRecordFile = $data->replicate();
                        $newImageRecordFile->unit_image_id = $newImageRecordId;
                        $newImageRecordFile->created_at = Carbon::now();
                        $newImageRecordFile->updated_at = Null;
                        $newImageRecordFile->save();

                        $filename = $newImageRecordFile->name;
                        $oldRecord = Unit_image::where('unit_id', $id)->first();
                        $newFilenameSegmentId = $newImageRecordFile->unit_floorplan_id;
                        $oldFilenameSegmentId = $oldRecord->id;
                        File::makeDirectory(public_path('uploads/units/images/'.$newFilenameSegmentId));
                        File::copy(public_path('uploads/units/images/'.$oldFilenameSegmentId.'/'.$filename), public_path('uploads/units/images/'.$newFilenameSegmentId.'/'.$filename));
                    }
                }
            }
        }

        return Redirect::back()->with('message', 'Unit has been Duplicated!');
    }

}
