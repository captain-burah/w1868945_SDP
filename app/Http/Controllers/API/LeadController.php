<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log; // send notifications via slack or any other means
use Illuminate\Support\Str;
use Cookie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        if($request->auth_key == '$2y$10$nHZPrLt2gQMU0orcQfT3x.rwfIHuHAvgtuLs8O8BShK2WyPYFQcIe') {
            try {
                $resources = new Lead();
                $resources->name = $request->name;
                $resources->email = $request->email;
                $resources->phone = $request->phone;
                $resources->country_code = $request->country_code;
                $resources->url = $request->url;
                $resources->ip = $request->ip;
                $resources->bedrooms = $request->bedrooms;
                $resources->question1 = $request->question1;
                $resources->save();

                $resources = 'success';
                return response()->json($resources,200);               
            } catch (\Exception $e) {
                $resources = $e->getMessage();
                return response()->json($resources,200);           
            }
        } else {
            $resources = 'failed';
            return response()->json($resources,403);    
        }
        
    } 
}
