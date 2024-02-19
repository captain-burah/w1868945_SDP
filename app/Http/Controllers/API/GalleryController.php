<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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

class GalleryController extends Controller
{
    public function index(){
        $resources = WebsiteGallery::with('website_gallery_medias')->select('id', 'title', 'title_ar', 'description', 'description_ar', 'slug_link', 'thumbnail', 'created_at')->where('status', '1')->get();
        return response()->json($resources,200);
    }

    public function show($slug){
        $resources = WebsiteGallery::with('website_gallery_medias')->where('status', '1')->where('slug_link', $slug)->get();
        return response()->json($resources,200);
    }
}
