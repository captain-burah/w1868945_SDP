<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Landingpageseo;

class SEOController extends Controller
{
    
    public function index($id) {
        return Landingpageseo::select('page',  'title_en', 'keywords_en', 'description_en')->find($id);
    }
}
