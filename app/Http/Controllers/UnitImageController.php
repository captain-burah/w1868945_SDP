<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Unit_image;
use App\Models\UnitImageFile;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Redirect;
use App\Models\Unit;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log; // send notifications via slack or any other means
use Illuminate\Support\Str;

class UnitImageController extends Controller
{

    private $uploadPath = "uploads/units/images/";


    public function index()
    {
        $brochures = Unit_image::with('unit_image_files')->get();

        $this->data['results'] = $brochures;
        $this->data['units'] = Unit::select(['id', 'name', 'status'])->where('status', '2')->get();
        $this->data['count_status'] = Unit_image::count();

        // dd(Unit::select(['id', 'name', 'status'])->where('status', '2')->get());

        return view('unit.image.index', $this->data);
    }


    public function create()
    {
        return view('unit.image.create.index');
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
            'files' => 'required | max: 10 | min: 1',
            'files.*' => 'max: 400'
        ]);

        try {
            if($request->hasfile('files'))
            {
                $files = [];

                $project_brochure = new Unit_image();
                $project_brochure->name = $request->segment_name;
                $project_brochure->save();
                $project_brochure_id = $project_brochure->id;

                foreach($request->file('files') as $key => $image)
                {
                    $image_name = $image->hashName();
                    $path = $this->uploadPath;
                    $image->move($path."$project_brochure_id/", $image_name);

                    // $image_name = $image->hashName();
                    // $image->storeAs('units/images/'.$project_brochure_id, $image_name, 'public'); //nonsecured storage - has public access

                    $project_brochure_file = new UnitImageFile();
                    $project_brochure_file->unit_image_id = $project_brochure_id;
                    $project_brochure_file->name = $image_name;
                    $project_brochure_file->save();
                }
            }

        } catch (\Exception $e) {
            return Redirect::back()->withErrors(['message', $e->getMessage() ]);
        }

        return redirect()->route('unit-images.index');
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
        $brochures = Unit_image::with('unit_image_files')->where('id', $id)->get();

        $brochures_files = UnitImageFile::with('unit_image')->where('unit_image_id', $id)->get();

        // dd($brochures_files);

        $this->data['segment_files'] = $brochures_files;

        $this->data['segments'] = $brochures[0];

        return view('unit.image.update.index', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'segment_name' => 'required',
            'files' => 'required | max: 5 | min: 1',
            'files.*' => 'max: 400'
        ]);


        try {
            if($request->hasfile('files'))
            {
                $files = [];

                $project_brochure = Unit_image::find($request->segment_id);
                $project_brochure->name = $request->segment_name;
                $project_brochure->save();

                $project_brochure_id = $project_brochure->id;

                foreach($request->file('files') as $key => $image)
                {
                    $image_name = $image->hashName();
                    $path = $this->uploadPath;
                    $image->move($path."$project_brochure_id/", $image_name);

                    // $image_name = $image->hashName();
                    // $image->storeAs('units/images/'.$project_brochure_id, $image_name, 'public'); //nonsecured storage - has public access

                    $project_brochure_file = new UnitImageFile();
                    $project_brochure_file->unit_image_id = $request->segment_id;
                    $project_brochure_file->name = $image_name;
                    $project_brochure_file->save();

                }
            }

        } catch (\Exception $e) {
            // dd($e->getMessage());
            return Redirect::back()->withErrors(['message', $e->getMessage() ]);
        }

        return redirect()->route('unit-images.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        try {
            UnitImageFile::find($id);
        }
        catch(ModelNotFoundException $e)
        {
            return Redirect::back()->withErrors(['msg' => 'Could not find project. Please contact developer.']);
        }

        $image_file = UnitImageFile::with('unit_image')->find($id);

        if(Storage::exists('units/images/'.$image_file->unit_image->id.'/'.$image_file->name)){
            UnitImageFile::destroy($id); //DELETE THE DATABASE RECORD
            try {
                Storage::delete('units/images/'.$image_file->unit_image->id.'/'.$image_file->name);  //DELETE THE ACTUAL FILE FROM STORAGE
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

        $project = Unit::with('unit_image')->find($request->unit_id);


        if($project->unit_image != null ){
            return Redirect::back()->withErrors(['The selected unit already contains a brochure. Remove it first to reassign.' ]);
        }

        $brochure = Unit_image::find($request->segment_id);
        $brochure->unit_id = $request->unit_id;
        $brochure->save();
        return Redirect::back()->with(['msg' => 'Successfully connected']);

    }

    public function unit_disconnect($id){
        $brochure = Unit_image::find($id);
        $brochure->unit_id = null;
        $brochure->save();
        return redirect()->route('unit-images.index')->with(['msg' => 'Successfully connected']);
    }

    public function destroy_segment($id) {

        $brochure = Unit_image::with('unit_image_files')->find($id);

        if($brochure->unit_image_files->count() > 0) {
            try {
                foreach ($brochure->unit_image_files as $child)
                {
                    Storage::deleteDirectory('units/images/'.$brochure->id);
                    $child->delete();
                }
            } catch (\Exception $e) {
                dd($e->getMessage());
                return Redirect::back()->withErrors(['message', $e->getMessage() ]);
            }
        }

        Project_brochure::destroy($id);

        return redirect()->route('units-images.index')->with(['msg' => 'Successfully connected']);
    }
}
