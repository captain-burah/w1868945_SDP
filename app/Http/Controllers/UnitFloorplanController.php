<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit_floorplan;
use App\Models\UnitFloorplanFile;
use Illuminate\Support\Facades\Storage;
use File;
use Illuminate\Support\Facades\Redirect;
use App\Models\Unit;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log; // send notifications via slack or any other means
use Illuminate\Support\Str;

class UnitFloorplanController extends Controller
{
    private $uploadPath = "uploads/units/floorplans/";
    

    public function index()
    {
        $brochures = Unit_floorplan::with('unit_floorplan_files')->get();

        $this->data['results'] = $brochures;
        
        $this->data['units'] = $unit = Unit::with('unit_floorplan')->select(['id', 'name', 'status', 'unit_floorplan_id'])->where('status', '1')->get();

        $floorplan = Unit_floorplan::with('units')->find(1);

        // dd($unit[0]);

        $this->data['count_status'] = Unit_floorplan::count();

        return view('unit.floorplan.index', $this->data);
    }


    public function create()
    {
        return view('unit.floorplan.create.index');
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
            'files.*' => 'max: 51200'
        ]);


        try {
            if($request->hasfile('files'))
            {
                $files = [];

                $project_brochure = new Unit_floorplan();
                $project_brochure->name = $request->segment_name;
                $project_brochure->save();

                $project_brochure_id = $project_brochure->id;

                foreach($request->file('files') as $key => $image)
                {
                    $image_name = $image->hashName();
                    /**
                     * STORAGE PATH  = uploads/units/floorplans/FLOORPLAN_ID/IMAGE_NAME
                     */
                    $path = $this->uploadPath;
                    $image->move($path."$project_brochure_id/", $image_name);

                    // $image_name = $image->hashName();
                    // $image->storeAs('units/floorplans/'.$project_brochure_id, $image_name, 'public'); //nonsecured storage - has public access

                    $project_brochure_file = new UnitFloorplanFile();
                    $project_brochure_file->unit_floorplan_id = $project_brochure_id;
                    $project_brochure_file->name = $image_name;
                    $project_brochure_file->save();
                }
            }

        } catch (\Exception $e) {
            return Redirect::back()->withErrors(['message', $e->getMessage() ]);
        }

        return redirect()->route('unit-floor-plan.index');
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
        $brochures = Unit_floorplan::with('unit_floorplan_files')->where('id', $id)->get();

        $brochures_files = UnitFloorplanFile::with('unit_floorplan')->where('unit_floorplan_id', $id)->get();

        // dd($brochures_files);

        $this->data['brochures_files'] = $brochures_files;

        $this->data['brochures'] = $brochures[0];

        return view('unit.floorplan.update.index', $this->data);
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

                $project_brochure = Unit_floorplan::find($request->floorplan_id);
                $project_brochure->name = $request->segment_name;
                $project_brochure->save();

                $project_brochure_id = $project_brochure->id;

                foreach($request->file('files') as $key => $image)
                {
                    $image_name = $image->hashName();
                    $path = $this->uploadPath;
                    $image->move($path."$project_brochure_id/", $image_name);

                    // $image_name = $image->hashName();
                    // $image->storeAs('units/floorplans/'.$project_brochure_id, $image_name, 'public'); //nonsecured storage - has public access

                    // dd($project_brochure_id);

                    $project_brochure_file = new UnitFloorplanFile();
                    $project_brochure_file->unit_floorplan_id = $request->floorplan_id;
                    $project_brochure_file->name = $image_name;
                    $project_brochure_file->save();

                }
            }

        } catch (\Exception $e) {
            // dd($e->getMessage());
            return Redirect::back()->withErrors(['message', $e->getMessage() ]);
        }

        return redirect()->route('unit-floor-plan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        try {
            UnitFloorplanFile::find($id);
        }
        catch(ModelNotFoundException $e)
        {
            return Redirect::back()->withErrors(['msg' => 'Could not find project. Please contact developer.']);
        }

        $brochure_file = UnitFloorplanFile::with('unit_floorplan')->find($id);

        // File::deleteDirectory(public_path('path/to/folder'));

        if(File::deleteDirectory(public_path('uploads/units/floorplans/'.$brochure_file->unit_floorplan->id.'/'.$brochure_file->name))){
            UnitFloorplanFile::destroy($id); //DELETE THE DATABASE RECORD
            try {
                File::deleteDirectory(public_path('uploads/units/floorplans/'.$brochure_file->unit_floorplan->id.'/'.$brochure_file->name));
                // Storage::delete('units/floorplans/'.$brochure_file->unit_floorplan->id.'/'.$brochure_file->name);  //DELETE THE ACTUAL FILE FROM STORAGE
            }
            catch (\Exception $e)
            {
                dd($e-> getMessage());
                return Redirect::back()->withErrors(['message', $e->getMessage() ]);
            }
        }else{
            dd('File does not exist.');
        }
        return Redirect::back()->with(['msg' => 'Successfully deleted']);
    }


    public function unit_connect_store(Request $request){

        $project = Unit::with('unit_floorplan')->find($request->unit_id);


        if($project->unit_floorplan != null ){
            return Redirect::back()->withErrors(['The selected unit already contains a brochure. Remove it first to reassign.' ]);
        }

        $brochure = Unit_floorplan::find($request->floorplan_id);
        $brochure->unit_id = $request->unit_id;
        $brochure->save();
        return Redirect::back()->with(['msg' => 'Successfully connected']);

    }

    public function unit_disconnect($id){
        $brochure = Unit_floorplan::find($id);
        $brochure->unit_id = null;
        $brochure->save();
        return redirect()->route('unit-floor-plan.index')->with(['msg' => 'Successfully connected']);
    }

    public function destroy_segment($id) {

        $brochure = Unit_floorplan::with('unit_floorplan_files')->find($id);

        if($brochure->unit_floorplan_files->count() > 0) {
            try {
                foreach ($brochure->unit_floorplan_files as $child)
                {
                    File::deleteDirectory(public_path('units/floorplans/'.$brochure->id));

                    // Storage::deleteDirectory('units/floorplans/'.$brochure->id);
                    $child->delete();
                }
            } catch (\Exception $e) {
                dd($e->getMessage());
                return Redirect::back()->withErrors(['message', $e->getMessage() ]);
            }
        }

        Unit_floorplan::destroy($id);

        return redirect()->route('unit-floor-plan.index')->with(['msg' => 'Successfully connected']);
    }
}
