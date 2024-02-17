<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\WebsiteGallery;
use App\Models\WebsiteGalleryMedia;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log; // send notifications via slack or any other means
use Illuminate\Support\Str;
use Cookie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File; 

class WebsiteGalleryController extends Controller
{
    private $uploadPath = "uploads/gallery/";

    // function __construct()
    // {
    //      $this->middleware('permission:news-list|news-create|news-edit|news-delete', ['only' => ['index','show']]);
    //      $this->middleware('permission:news-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:news-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:news-delete', ['only' => ['destroy']]);
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['resources'] = $resources = WebsiteGallery::where('status', '1')->get();
        return view('gallery', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('website.gallery.create.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bool=0;


        if($bool==0)
        {
            $resource = new WebsiteGallery();
            $resource->status = '1';
            $resource->slug_link = Str::slug($request->title);
            $resource->title = $request->title;
            $resource->title_ar = $request->title_ar;

            $resource->description = $request->description;
            $resource->description_ar = $request->description_ar;

            $resource->meta_title = $request->meta_title;
            $resource->meta_title_ar = $request->meta_title_ar;

            $resource->meta_description = $request->meta_description;
            $resource->meta_description_ar = $request->meta_description_ar;

            $resource->meta_keywords = $request->meta_keywords;
            $resource->meta_keywords_ar = $request->meta_keywords_ar;

            $resource->save();

            $resource_id = $resource->id;

            if($request->hasfile('thumbnails'))
            {
                $files = [];

                foreach($request->file('thumbnails') as $key => $image)
                {
                    $image_name = $image->hashName();
                    $path = $this->uploadPath;
                    $image->move($path."$resource_id/thumbnail/", $image_name);

                    // $image_name = $image->hashName();
                    // $image->storeAs('website-news/'.$resource_id.'/thumbnail/', $image_name, 'public'); //nonsecured storage - has public access
                    $resource_segment_file = WebsiteGallery::find($resource_id);
                    $resource_segment_file->thumbnail = $image_name;
                    $resource_segment_file->save();

                }
            }

            try {
                if($request->hasfile('image_files'))
                {
                    $files = [];

                    foreach($request->file('image_files') as $key => $image)
                    {
                        $image_name = $image->hashName();
                        $path = $this->uploadPath;
                        $image->move($path."$resource_id/images/", $image_name);
                        
                        // $image_name = $image->hashName();
                        // $image->storeAs('website-news/'.$resource_id.'/images/', $image_name, 'public'); //nonsecured storage - has public access
                        $resource_segment_file = new WebsiteGalleryMedia();
                        $resource_segment_file->gallery_id = $resource_id;
                        $resource_segment_file->type = 'image';
                        $resource_segment_file->name = $image_name;
                        $resource_segment_file->save();

                    }
                }
            } catch (\Exception $e) {
                return Redirect::back()->withErrors(['message', $e->getMessage() ]);
            }

            try {
                if($request->hasfile('video_files'))
                {
                    $files = [];

                    foreach($request->file('video_files') as $key => $image)
                    {
                        $image_name = $image->hashName();
                        $path = $this->uploadPath;
                        $image->move($path."$resource_id/videos/", $image_name);
                        
                        // $image_name = $image->hashName();
                        // $image->storeAs('website-news/'.$resource_id.'/images/', $image_name, 'public'); //nonsecured storage - has public access
                        $resource_segment_file = new WebsiteGalleryMedia();
                        $resource_segment_file->gallery_id = $resource_id;
                        $resource_segment_file->type = 'video';
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
        $this->data['resources'] = $resources = WebsiteGallery::with('website_gallery_medias')->find($id);
        $image = 0;
        if(count($resources->website_gallery_medias) > 0) {
            $this->data['image'] = $image = 1;
        }

        return view('website.gallery.update.index', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bool=0;


        if($bool==0)
        {
            $resource = WebsiteGallery::find($id);
            $resource->status = '1';
            $resource->slug_link = Str::slug($request->title);
            $resource->title = $request->title;
            $resource->title_ar = $request->title_ar;

            $resource->description = $request->description;
            $resource->description_ar = $request->description_ar;

            $resource->meta_title = $request->meta_title;
            $resource->meta_title_ar = $request->meta_title_ar;

            $resource->meta_description = $request->meta_description;
            $resource->meta_description_ar = $request->meta_description_ar;

            $resource->meta_keywords = $request->meta_keywords;
            $resource->meta_keywords_ar = $request->meta_keywords_ar;

            $resource->save();

            $resource_id = $resource->id;


            if($request->hasfile('thumbnails'))
            {
                $files = [];

                foreach($request->file('thumbnails') as $key => $image)
                {
                    $image_name = $image->hashName();
                    $path = $this->uploadPath;
                    $image->move($path."$resource_id/thumbnail/", $image_name);

                    // $image_name = $image->hashName();
                    // $image->storeAs('news/'.$resource_id.'/thumbnail/', $image_name, 'public'); //nonsecured storage - has public access
                    $resource_segment_file = WebsiteGallery::find($resource_id);
                    $resource_segment_file->thumbnail = $image_name;
                    $resource_segment_file->save();

                }
            }




            try {
                if($request->hasfile('image_files'))
                {
                    $files = [];

                    foreach($request->file('image_files') as $key => $image)
                    {
                        $image_name = $image->hashName();
                        $path = $this->uploadPath;
                        $image->move($path."$resource_id/images/", $image_name);
                        
                        // $image_name = $image->hashName();
                        // $image->storeAs('website-news/'.$resource_id.'/images/', $image_name, 'public'); //nonsecured storage - has public access
                        $resource_segment_file = new WebsiteGalleryMedia();
                        $resource_segment_file->gallery_id = $resource_id;
                        $resource_segment_file->type = 'image';
                        $resource_segment_file->name = $image_name;
                        $resource_segment_file->save();

                    }
                }
            } catch (\Exception $e) {
                return Redirect::back()->withErrors(['message', $e->getMessage() ]);
            }

            try {
                if($request->hasfile('video_files'))
                {
                    $files = [];

                    foreach($request->file('video_files') as $key => $image)
                    {
                        $image_name = $image->hashName();
                        $path = $this->uploadPath;
                        $image->move($path."$resource_id/videos/", $image_name);
                        
                        // $image_name = $image->hashName();
                        // $image->storeAs('website-news/'.$resource_id.'/images/', $image_name, 'public'); //nonsecured storage - has public access
                        $resource_segment_file = new WebsiteGalleryMedia();
                        $resource_segment_file->gallery_id = $resource_id;
                        $resource_segment_file->type = 'video';
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        WebsiteGallery::destroy($id);
        
        return $this->index();
    }

    public function website_gallery_media_destroy(string $id)
    {
        $segment = WebsiteGalleryMedia::with('website_gallery')->where('id', $id)->get();

        // try {
        //     foreach ($segment->website_gallery as $child)
        //     {
        //         Storage::deleteDirectory('projects/factsheets/'.$segment->id);
        //         // Storage::delete('projects/brochures/'.$brochure->id.'/'.$child->name);  //DELETE THE ACTUAL FILE FROM STORAGE
        //         $child->delete();

        //         $resource_id = $child->website_gallery;
        //         dd($resource_id);

        //         File::delete($path."$resource_id/videos/", $image_name);

        //     }
        // } catch (\Exception $e) {
        //     dd($e->getMessage());
        //     return Redirect::back()->withErrors(['message', $e->getMessage() ]);
        // }

        WebsiteGalleryMedia::destroy($id);

        return $this->index();
    }
}
