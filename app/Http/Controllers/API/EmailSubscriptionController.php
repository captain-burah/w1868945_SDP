<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log; // send notifications via slack or any other means
use Illuminate\Support\Str;

use App\Models\EmailSubscription;
use Mail;

class EmailSubscriptionController extends Controller
{
    public function store(Request $request){
        return ["Result"=> "Testing complete"];
    }

    public function storev2(Request $request){
        return ["Result"=> "Testing complete"];
    }

    public function storev3(Request $request){
        return ["Result"=> "It loads on MIS.esnaad.com"];
    }
}
