<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Model\CarrierModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class CareerController extends Controller
{
    public function careerList(Request $request)
    {
        $careerData = CarrierModel::where('carrier.status', '!=', 'deleted')->limit(6)->get();
        // dd($careerData);

        return view('frontend.career',compact('careerData'));
    }

}

