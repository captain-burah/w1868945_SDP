<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebsiteNew;
use App\Models\WebsiteNewsImage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log; // send notifications via slack or any other means
use Illuminate\Support\Str;
use Cookie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Barryvdh\DomPDF\Facade\Pdf;

class NewsController extends Controller
{
    public function index(){
        $resources = WebsiteNew::with('website_news_images')->select('id', 'title', 'title_ar', 'description', 'description_ar', 'slug_link', 'thumbnail')->where('status', '1')->get();
        return response()->json($resources,200);
    }

    public function show($id){
        $resources = WebsiteNew::with('website_news_images')->where('status', '1')->where('id', $id)->get();
        return response()->json($resources,200);
    }
}
