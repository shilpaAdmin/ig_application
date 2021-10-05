<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('frontend.index');
    }
}