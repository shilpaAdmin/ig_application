<?php

namespace App\Http\Controllers;

use App\Http\Model\BusinessModel;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use DataTables;
use App\Http\Model\UserModel;
use App\Http\Model\ForumModel;
use App\Http\Model\MatrimonialModel;
use App\Http\Model\CountrysModel;



use Auth;

class MatrimonialDataController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        return view('matrimonialdata.create');
    }

}