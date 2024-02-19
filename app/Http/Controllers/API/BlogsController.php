<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebsiteBlog;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log; // send notifications via slack or any other means
use Illuminate\Support\Str;
use Cookie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Barryvdh\DomPDF\Facade\Pdf;
class BlogsController extends Controller
{
    public function index(){
        $resources = WebsiteBlog::select('id', 'title', 'title_ar', 'description', 'description_ar', 'slug_link', 'thumbnail', 'created_at')->where('status', '1')->get();
        return response()->json($resources,200);
    }

    public function show($id){
        $resources = WebsiteBlog::where('status', '1')->where('id', $id)->get();
        return response()->json($resources,200);
    }
}
