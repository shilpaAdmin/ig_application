<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Model\MatrimonialModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class MatrimoneyController extends Controller
{
    public function viewMatrimoney(Request $request){
    
        $totalMatrimonial=MatrimonialModel::get()->count();

        if ($request->ajax()) {
            $matrimonials  = MatrimonialModel::paginate(6);
            if( $request->viewData !=0){
                $view = view("frontend.category.list-view.matrimoney-listing-grid",compact('matrimonials'))->render();
            } else {
                $view = view("frontend.category.list-view.matrimoney-listing-list",compact('matrimonials'))->render();
            }
            return response()->json(['html'=>$view]);
        }
        return view('frontend.matrimoney.matrimoney_listing_grid',compact('totalMatrimonial'));
    }

    public function matrimoneyDetails(Request $request,$slug){

        $businessData=MatrimonialModel::where('slug','=',$slug)->first();
        // dd($request->all(),$slug,$matrimonial);
        $similarData=null;
        if(isset($businessData)){
            $similarData = MatrimonialModel::orderBy('created_at','desc')->limit(2)->get();
        }
        return view('frontend.matrimoney.matrimoney_details',compact('businessData','similarData'));
    }
}
