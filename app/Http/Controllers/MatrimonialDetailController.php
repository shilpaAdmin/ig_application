<?php

namespace App\Http\Controllers;

use App\Http\Model\BusinessModel;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use DataTables;
use App\Http\Model\MatrimonialModel;
use App\Http\Model\CountrysModel;
use Auth;

class MatrimonialDetailController extends Controller
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
    public function matrimonialDetail($id)
    {
        $row = MatrimonialModel::where('id', $id)->first()->toArray();
        $countryData = MatrimonialModel::where('matrimonial.id', $id)->leftJoin('country', function ($join)
        {
            $join->on('matrimonial.country_id', '=', 'country.id');
        })
        ->leftJoin('country as c1', function ($join)
        {
            $join->on('matrimonial.desired_country_id', '=', 'c1.id');
        })->select('matrimonial.*', 'country.name as country_name', 'c1.name as desired_country_name')->get()->toArray();


        return view('matrimonial-detail.create',compact('row','countryData'));
    }

}

