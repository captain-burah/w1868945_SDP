<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log; // send notifications via slack or any other means
use Illuminate\Support\Str;
use Cookie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Barryvdh\DomPDF\Facade\Pdf;


class DevelopmentController extends Controller
{
    public function index()
    {
        $resources = Community::select('id', 'title', 'address', 'slug_link', 'thumbnail')->where('status', '1')->get();
        return response()->json($resources,200);
    }


    public function details(string $slug)
    {
        $resources = Project::with('project_brochure', 'project_image', 'project_factsheet', 'project_video', 'project_translations', 'units')->where('status', '1')->where('slug_link', $slug)->get();
        return response()->json($resources,200);
    }
}
