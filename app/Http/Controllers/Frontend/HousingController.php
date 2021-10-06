<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Model\ForumCommentReplyLikesModel;
use App\Http\Model\ForumCommentReplyModel;
use App\Http\Model\BusinessModel;
use Illuminate\Http\Request;

class HousingController extends Controller
{

    public function housingDetails(Request $request,$categoryid,$businessid)
    {

        $businessData = BusinessModel::where('id', $businessid)->first();
        
        $similarData=null;
        if(isset($businessData->tag_id)){

            $similarData = BusinessModel::where('tag_id','=',$businessData->tag_id)->limit(2)->get();
        }
        return view('frontend.housing_details', compact('businessData','similarData'));

    }
}
