<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Community;
use App\Models\CommunityImage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log; // send notifications via slack or any other means
use Illuminate\Support\Str;
use Cookie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Barryvdh\DomPDF\Facade\Pdf;

class CommunityController extends Controller
{

    private $uploadPath = "uploads/communities/";


    public function index() {
        $this->data['resources'] = $resources = Community::select('id', 'title', 'address')->where('status', '1')->get();
        $this->data['county_status'] = $county_status = Community::select('id', 'title', 'address')->where('status', '1')->count();
        return view('community', $this->data);
    }




    public function store(Request $request)
    {

        // $validatedData = $request->validate([
        //     'thumbnail' => 'required | max: 1 | min: 1',
        //     'thumbnail.*' => 'max: 400',

        //     'header_images' => 'required | max: 1 | min: 1',
        //     'header_images.*' => 'max: 400',

        //     'files' => 'required | max: 10 | min: 1',
        //     'files.*' => 'max: 400',

        //     'longitude' => ['required'],

        //     'latitude' => ['required'],

        //     'title' => ['required'],

        //     'address' => ['required'],

        //     'heading' => ['required'],

        //     'description' => ['required'],

        //     'meta_title' => ['required'],

        //     'meta_description' => ['required'],

        //     'meta_keywords' => ['required'],

        //     'header_image' => ['required'],

        //     'thumbnail' => ['required'],

        // ]);

        $bool=0;


        if($bool==0)
        {
            $resource = new Community();
            $resource->status = '1';
            $resource->slug_link = Str::slug($request->title);
            $resource->title = $request->title;
            $resource->title_ar = $request->title_ar;

            $resource->address = $request->address;
            $resource->address_ar = $request->address_ar;

            $resource->heading = $request->heading;
            $resource->heading_ar = $request->heading_ar;

            $resource->description = $request->description;
            $resource->description_ar = $request->description_ar;

            $resource->meta_title = $request->meta_title;
            $resource->meta_title_ar = $request->meta_title_ar;

            $resource->meta_description = $request->meta_description;
            $resource->meta_description_ar = $request->meta_description_ar;

            $resource->meta_keywords = $request->meta_keywords;
            $resource->meta_keywords_ar = $request->meta_keywords_ar;

            $resource->longitude = $request->longitude;
            $resource->latitude = $request->latitude;

            $resource->map_image = $request->map_image;
            $resource->video_link = $request->video_link;
            $resource->save();

            $resource_id = $resource->id;

            if($request->hasfile('header_images'))
            {
                $files = [];

                foreach($request->file('header_images') as $key => $image)
                {
                    $image_name = $image->hashName();
                    $path = $this->uploadPath;
                    $image->move($path."$resource_id/header_image/", $image_name);

                    // $image_name = $image->hashName();
                    // $image->storeAs('communities/'.$resource_id.'/header_image/', $image_name, 'public'); //nonsecured storage - has public access
                    $resource_segment_file = Community::find($resource_id);
                    $resource_segment_file->header_image = $image_name;
                    $resource_segment_file->save();
                }
            }


            if($request->hasfile('thumbnails'))
            {
                $files = [];

                foreach($request->file('thumbnails') as $key => $image)
                {
                    $image_name = $image->hashName();
                    $path = $this->uploadPath;
                    $image->move($path."$resource_id/thumbnail/", $image_name);

                    // $image_name = $image->hashName();
                    // $image->storeAs('communities/'.$resource_id.'/thumbnail/', $image_name, 'public'); //nonsecured storage - has public access
                    $resource_segment_file = Community::find($resource_id);
                    $resource_segment_file->thumbnail = $image_name;
                    $resource_segment_file->save();

                }
            }


            if($request->hasfile('map_image'))
            {
                $files = [];

                foreach($request->file('map_image') as $key => $image)
                {
                    $image_name = $image->hashName();
                    $path = $this->uploadPath;
                    $image->move($path."$resource_id/map/", $image_name);

                    // $image_name = $image->hashName();
                    // $image->storeAs('communities/'.$resource_id.'/map/', $image_name, 'public'); //nonsecured storage - has public access
                    $resource_segment_file = Community::find($resource_id);
                    $resource_segment_file->thumbnail = $image_name;
                    $resource_segment_file->save();

                }
            }


            try {
                if($request->hasfile('files'))
                {
                    $files = [];

                    foreach($request->file('files') as $key => $image)
                    {
                        $image_name = $image->hashName();
                        $path = $this->uploadPath;
                        $image->move($path."$resource_id/images/", $image_name);
                        // $image_name = $image->hashName();
                        // $image->storeAs('communities/'.$resource_id.'/images/', $image_name, 'public'); //nonsecured storage - has public access
                        $resource_segment_file = new CommunityImage();
                        $resource_segment_file->community_id = $resource_id;
                        $resource_segment_file->name = $image_name;
                        $resource_segment_file->save();

                    }
                }
            } catch (\Exception $e) {
                return Redirect::back()->withErrors(['message', $e->getMessage() ]);
            }


            return $this->index();
        }
        else
        {   dd('fail');
            return Redirect::back()->withErrors('Record is already Exist');
        }

        dd('check');
    }







    public function create() {
        return view('website.community.create.index');
    }





    public function edit($id) {

        $this->data['resources'] = $resources = Community::with('community_images')->find($id);

        return view('website.community.update.index', $this->data);
    }






    public function update(Request $request, string $id) {
        // $validatedData = $request->validate([
        //     'thumbnail' => 'required | max: 1 | min: 1',
        //     'thumbnail.*' => 'max: 400',

        //     'header_images' => 'required | max: 1 | min: 1',
        //     'header_images.*' => 'max: 400',

        //     'files' => 'required | max: 10 | min: 1',
        //     'files.*' => 'max: 400',

        //     'longitude' => ['required'],

        //     'latitude' => ['required'],

        //     'title' => ['required'],

        //     'address' => ['required'],

        //     'heading' => ['required'],

        //     'description' => ['required'],

        //     'meta_title' => ['required'],

        //     'meta_description' => ['required'],

        //     'meta_keywords' => ['required'],

        //     'header_image' => ['required'],

        //     'thumbnail' => ['required'],

        // ]);

        $bool=0;


        if($bool==0)
        {
            $resource = Community::find($id);
            $resource->status = '1';
            $resource->slug_link = Str::slug($request->title);
            $resource->title = $request->title;
            $resource->title_ar = $request->title_ar;

            $resource->address = $request->address;
            $resource->address_ar = $request->address_ar;

            $resource->heading = $request->heading;
            $resource->heading_ar = $request->heading_ar;

            $resource->description = $request->description;
            $resource->description_ar = $request->description_ar;

            $resource->meta_title = $request->meta_title;
            $resource->meta_title_ar = $request->meta_title_ar;

            $resource->meta_description = $request->meta_description;
            $resource->meta_description_ar = $request->meta_description_ar;

            $resource->meta_keywords = $request->meta_keywords;
            $resource->meta_keywords_ar = $request->meta_keywords_ar;

            $resource->longitude = $request->longitude;
            $resource->latitude = $request->latitude;

            $resource->map_image = $request->map_image;
            $resource->video_link = $request->video_link;
            $resource->save();

            $resource_id = $resource->id;

            if($request->hasfile('header_images'))
            {
                $files = [];

                foreach($request->file('header_images') as $key => $image)
                {
                    $image_name = $image->hashName();
                    $path = $this->uploadPath;
                    $image->move($path."$resource_id/header_image/", $image_name);

                    // $image_name = $image->hashName();
                    // $image->storeAs('communities/'.$resource_id.'/header_image/', $image_name, 'public'); //nonsecured storage - has public access
                    $resource_segment_file = Community::find($resource_id);
                    $resource_segment_file->header_image = $image_name;
                    $resource_segment_file->save();
                }
            }


            if($request->hasfile('thumbnails'))
            {
                $files = [];

                foreach($request->file('thumbnails') as $key => $image)
                {
                    $image_name = $image->hashName();
                    $path = $this->uploadPath;
                    $image->move($path."$resource_id/thumbnail/", $image_name);

                    // $image_name = $image->hashName();
                    // $image->storeAs('communities/'.$resource_id.'/thumbnail/', $image_name, 'public'); //nonsecured storage - has public access
                    $resource_segment_file = Community::find($resource_id);
                    $resource_segment_file->thumbnail = $image_name;
                    $resource_segment_file->save();

                }
            }


            if($request->hasfile('map_image'))
            {
                $files = [];

                foreach($request->file('map_image') as $key => $image)
                {
                    $image_name = $image->hashName();
                    $path = $this->uploadPath;
                    $image->move($path."$resource_id/map/", $image_name);

                    // $image_name = $image->hashName();
                    // $image->storeAs('communities/'.$resource_id.'/map/', $image_name, 'public'); //nonsecured storage - has public access
                    $resource_segment_file = Community::find($resource_id);
                    $resource_segment_file->thumbnail = $image_name;
                    $resource_segment_file->save();

                }
            }


            try {
                if($request->hasfile('files'))
                {
                    $files = [];

                    foreach($request->file('files') as $key => $image)
                    {
                        $image_name = $image->hashName();
                        $path = $this->uploadPath;
                        $image->move($path."$resource_id/images/", $image_name);

                        // $image_name = $image->hashName();
                        // $image->storeAs('communities/'.$resource_id.'/images/', $image_name, 'public'); //nonsecured storage - has public access
                        $resource_segment_file = new CommunityImage();
                        $resource_segment_file->community_id = $resource_id;
                        $resource_segment_file->name = $image_name;
                        $resource_segment_file->save();

                    }
                }
            } catch (\Exception $e) {
                return Redirect::back()->withErrors(['message', $e->getMessage() ]);
            }


            return $this->index();
        }
        else
        {   dd('fail');
            return Redirect::back()->withErrors('Record is already Exist');
        }

        dd('check');
    }




    public function destroy_image($id) {
        try {
            CommunityImage::find($id);
        }
        catch(ModelNotFoundException $e)
        {
            return Redirect::back()->withErrors(['msg' => 'Could not find project. Please contact developer.']);
        }

        $segment_file = CommunityImage::with('community')->find($id);

        if(Storage::exists('communities/'.$segment_file->community->id.'/images/'.$segment_file->name)){

            CommunityImage::destroy($id);   //DELETE THE DATABASE RECORD

            try {
                Storage::delete('communities/'.$segment_file->community->id.'/images/'.$segment_file->name);  //DELETE THE ACTUAL FILE FROM STORAGE
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

}
