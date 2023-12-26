<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Landingpageseo;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log; // send notifications via slack or any other means
use Illuminate\Support\Str;
use Cookie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Barryvdh\DomPDF\Facade\Pdf;

class SeoController extends Controller
{

    public function index()
    {
        $this->data['resources'] = Landingpageseo::all();


        return view('seo',$this->data);
    }

    public function showindex()
    {
        //
        $this->data['resources'] = Landingpageseo::all();


        return view('website.seo.create.index',$this->data);
    }

    public function create()
    {
        return view('website.seo.create.index');
    }


    public function store(Request $request)
    {

        $bool=0;

        if($bool==0)
        {
            $Landingpageseo = new Landingpageseo();

            $Landingpageseo->page = $request->page_name;
            $Landingpageseo->title_en = $request->title_en;
            $Landingpageseo->title_ar = $request->title_ar;
            $Landingpageseo->keywords_en = $request->keywords_en;
            $Landingpageseo->keywords_ar = $request->keywords_ar;
            $Landingpageseo->description_en = $request->description_en;
            $Landingpageseo->description_ar = $request->description_ar;
            $Landingpageseo->save();


            return redirect('landingpageseos')->withSuccess('message','Record has Been Uploaded.');
        }
        else
        {
            return redirect('landingpageseos')->withErrors(['message', 'Record is already Exist']);
        }



    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $resources = Landingpageseo::where('id', $id )->first();

        $this->data['resources'] = $resources;

        return view('website.seo.update.index',$this->data);

    }



    public function update(Request $request, $id)
    {
        $bool=0;

        if($bool==0)
        {
            $Landingpageseo = Landingpageseo::find($id);

            $Landingpageseo->page = $request->page;
            $Landingpageseo->title_en = $request->title_en;
            $Landingpageseo->title_ar = $request->title_ar;
            $Landingpageseo->keywords_en = $request->keywords_en;
            $Landingpageseo->keywords_ar = $request->keywords_ar;
            $Landingpageseo->description_en = $request->description_en;
            $Landingpageseo->description_ar = $request->description_ar;
            $Landingpageseo->save();


            return redirect('landingpageseos')->withSuccess('message','Record has Been Uploaded.');
        }
        else
        {
            return redirect('landingpageseos')->withErrors(['message', 'Record is already Exist']);
        }

    }



    public function destroy($id)
    {
        try {
            Landingpageseo::find($id);
        }
        catch(ModelNotFoundException $e)
        {
            return Redirect::back()->withErrors(['msg' => 'Could not find project. Please contact developer.']);
        }

        try {
            Landingpageseo::destroy($id);
        }
        catch(ModelNotFoundException $e)
        {
            return Redirect::back()->withErrors(['msg' => 'Could not find project. Please contact developer.']);
        }

        return redirect('landingpageseos')->withSuccess('message','Record has Been Deleted.');

    }
}
