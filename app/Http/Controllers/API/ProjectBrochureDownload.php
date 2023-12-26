<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectBrochureDownload extends Controller
{
    public function store(Request $request){
        return ["Result"=> "Testing complete"];
    }

}
