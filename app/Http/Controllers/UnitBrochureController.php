<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit_brochure;
use App\Models\UnitBrochureFile;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Redirect;
use App\Models\Unit;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log; // send notifications via slack or any other means
use Illuminate\Support\Str;


class UnitBrochureController extends Controller
{
    private $uploadPath = "uploads/units/brochures/";

    public function index()
    {
        $brochures = Unit_brochure::with('unit_brochure_files')->get();

        $this->data['results'] = $brochures;
        $this->data['units'] = Unit::select(['id', 'name', 'status'])->where('status', '2')->get();
        $this->data['count_status'] = Unit_brochure::count();

        // dd(Unit::select(['id', 'name', 'status'])->where('status', '2')->get());

        return view('unit.brochure.index', $this->data);
    }


    public function create()
    {
        return view('unit.brochure.create.index');
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

                $project_brochure = new Unit_brochure();
                $project_brochure->name = $request->segment_name;
                $project_brochure->save();
                $project_brochure_id = $project_brochure->id;

                foreach($request->file('files') as $key => $image)
                {
                    $image_name = $image->hashName();
                    $path = $this->uploadPath;
                    $image->move($path."$project_brochure_id/", $image_name);

                    // $image_name = $image->hashName();
                    // $image->storeAs('units/brochures/'.$project_brochure_id, $image_name, 'public'); //nonsecured storage - has public access

                    $project_brochure_file = new UnitBrochureFile();
                    $project_brochure_file->unit_brochure_id = $project_brochure_id;
                    $project_brochure_file->name = $image_name;
                    $project_brochure_file->save();
                }
            }

        } catch (\Exception $e) {
            return Redirect::back()->withErrors(['message', $e->getMessage() ]);
        }

        return redirect()->route('unit-brochures.index');
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
        $brochures = Unit_brochure::with('unit_brochure_files')->where('id', $id)->get();

        $brochures_files = UnitBrochureFile::with('unit_brochure')->where('unit_brochure_id', $id)->get();

        // dd($brochures_files);

        $this->data['brochures_files'] = $brochures_files;

        $this->data['brochures'] = $brochures[0];

        return view('unit.brochure.update.index', $this->data);
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

                $project_brochure = Unit_brochure::find($request->brochure_id);
                $project_brochure->name = $request->segment_name;
                $project_brochure->save();

                $project_brochure_id = $project_brochure->id;

                foreach($request->file('files') as $key => $image)
                {
                    $image_name = $image->hashName();
                    $path = $this->uploadPath;
                    $image->move($path."$project_brochure_id/", $image_name);

                    // $image_name = $image->hashName();
                    // $image->storeAs('units/brochures/'.$project_brochure_id, $image_name, 'public'); //nonsecured storage - has public access

                    $project_brochure_file = new UnitBrochureFile();
                    $project_brochure_file->unit_brochure_id = $request->brochure_id;
                    $project_brochure_file->name = $image_name;
                    $project_brochure_file->save();

                }
            }

        } catch (\Exception $e) {
            // dd($e->getMessage());
            return Redirect::back()->withErrors(['message', $e->getMessage() ]);
        }

        return redirect()->route('unit-brochures.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        try {
            UnitBrochureFile::find($id);
        }
        catch(ModelNotFoundException $e)
        {
            return Redirect::back()->withErrors(['msg' => 'Could not find project. Please contact developer.']);
        }

        $brochure_file = UnitBrochureFile::with('unit_brochure')->find($id);


        if(Storage::exists('units/brochures/'.$brochure_file->unit_brochure->id.'/'.$brochure_file->name)){
            UnitBrochureFile::destroy($id); //DELETE THE DATABASE RECORD
            try {
                Storage::delete('units/brochures/'.$brochure_file->unit_brochure->id.'/'.$brochure_file->name);  //DELETE THE ACTUAL FILE FROM STORAGE
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


    public function unit_connect_store(Request $request){

        $project = Unit::with('unit_brochure')->find($request->unit_id);


        if($project->unit_brochure != null ){
            return Redirect::back()->withErrors(['The selected unit already contains a brochure. Remove it first to reassign.' ]);
        }

        $brochure = Unit_brochure::find($request->brochure_id);
        $brochure->unit_id = $request->unit_id;
        $brochure->save();
        return Redirect::back()->with(['msg' => 'Successfully connected']);

    }

    public function unit_disconnect($id){
        $brochure = Unit_brochure::find($id);
        $brochure->unit_id = null;
        $brochure->save();
        return redirect()->route('unit-brochures.index')->with(['msg' => 'Successfully connected']);
    }

    public function destroy_segment($id) {

        $brochure = Unit_brochure::with('unit_brochure_files')->find($id);

        if($brochure->unit_brochure_files->count() > 0) {
            try {
                foreach ($brochure->unit_brochure_files as $child)
                {
                    Storage::deleteDirectory('units/brochures/'.$brochure->id);
                    $child->delete();
                }
            } catch (\Exception $e) {
                dd($e->getMessage());
                return Redirect::back()->withErrors(['message', $e->getMessage() ]);
            }
        }

        Project_brochure::destroy($id);

        return redirect()->route('units-brochures.index')->with(['msg' => 'Successfully connected']);
    }
}
