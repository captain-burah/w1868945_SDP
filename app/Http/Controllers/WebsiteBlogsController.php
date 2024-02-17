<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\WebsiteBlog;
use App\Models\WebsiteBlogsImage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log; // send notifications via slack or any other means
use Illuminate\Support\Str;
use Cookie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Barryvdh\DomPDF\Facade\Pdf;
class WebsiteBlogsController extends Controller
{
    private $uploadPath = "uploads/blogs/";

    // function __construct()
    // {
    //      $this->middleware('permission:news-list|news-create|news-edit|news-delete', ['only' => ['index','show']]);
    //      $this->middleware('permission:news-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:news-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:news-delete', ['only' => ['destroy']]);
    // }


    public function index()
    {
        $this->data['resources'] = $resources = WebsiteBlog::where('status', '1')->get();
        return view('blogs', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('website.blogs.create.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bool=0;


        if($bool==0)
        {
            $resource = new WebsiteBlog();
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

            if($request->hasfile('header_images'))
            {
                $files = [];

                foreach($request->file('header_images') as $key => $image)
                {
                    $image_name = $image->hashName();
                    $path = $this->uploadPath;
                    $image->move($path."$resource_id/header_image/", $image_name);

                    // $image_name = $image->hashName();
                    // $image->storeAs('website-news/'.$resource_id.'/header_image/', $image_name, 'public'); //nonsecured storage - has public access
                    $resource_segment_file = WebsiteBlog::find($resource_id);
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
                    // $image->storeAs('website-news/'.$resource_id.'/thumbnail/', $image_name, 'public'); //nonsecured storage - has public access
                    $resource_segment_file = WebsiteBlog::find($resource_id);
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
                        // $image->storeAs('website-news/'.$resource_id.'/images/', $image_name, 'public'); //nonsecured storage - has public access
                        $resource_segment_file = new WebsiteBlogsImage();
                        $resource_segment_file->news_id = $resource_id;
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
        $this->data['resources'] = $resources = WebsiteBlog::find($id);
        $image = 0;
        if(count($resources->website_blogs_images) > 0) {
            $this->data['image'] = $image = 1;
        }

        return view('website.blogs.update.index', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bool=0;


        if($bool==0)
        {
            $resource = WebsiteBlog::find($id);
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

            if($request->hasfile('header_images'))
            {
                $files = [];

                foreach($request->file('header_images') as $key => $image)
                {
                    $image_name = $image->hashName();
                    $path = $this->uploadPath;
                    $image->move($path."$resource_id/header_image/", $image_name);

                    // $image_name = $image->hashName();
                    // $image->storeAs('news/'.$resource_id.'/header_image/', $image_name, 'public'); //nonsecured storage - has public access
                    $resource_segment_file = WebsiteBlog::find($resource_id);
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
                    // $image->storeAs('news/'.$resource_id.'/thumbnail/', $image_name, 'public'); //nonsecured storage - has public access
                    $resource_segment_file = WebsiteBlog::find($resource_id);
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
                        // $image->storeAs('news/'.$resource_id.'/images/', $image_name, 'public'); //nonsecured storage - has public access
                        $resource_segment_file = new WebsiteBlog();
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = WebsiteBLog::find($id);

        $post->delete();
        
        return $this->index();
    }
}
