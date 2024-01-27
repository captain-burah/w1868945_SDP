<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Unit_paymentplan;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log; // send notifications via slack or any other means
use Illuminate\Support\Str;
use Cookie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Barryvdh\DomPDF\Facade\Pdf;
class UnitController extends Controller
{
    public function index()
    {
        $resources = Community::select('id', 'title', 'address', 'slug_link', 'thumbnail')->where('status', '1')->get();
        return response()->json($resources,200);
    }


    public function details(string $slug)
    {
        app('App\Http\Controllers\OtherController')->method();

        $resources = Unit::with('unit_brochure', 'unit_image', 'unit_paymentplan', 'unit_floorplan', 'project')->where('status', '1')->where('slug_link', $slug)->get();
        return response()->json($resources,200);
    }

    public function paymentplan_details(int $unit_id)
    {
        $resources = Unit_paymentplan::with('unit_paymentplan_files', 'unit')->where('unit_id', $unit_id)->get();

        return response()->json($resources,200);
    }
}
