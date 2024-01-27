<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function listing_admin_login()
    {
        return view('dashboard');
    }

    public function financial_admin_login()
    {
        return view('dashboard');
    }
}
