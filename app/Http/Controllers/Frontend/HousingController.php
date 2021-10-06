<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Model\ForumCommentReplyLikesModel;
use App\Http\Model\ForumCommentReplyModel;
use App\Http\Model\BusinessModel;
use Illuminate\Http\Request;

class HousingController extends Controller
{

    public function housingDetails(Request $request,$id)
    {

        $businessData = BusinessModel::where('id', $id)->first();

        // dd($businessData);

        $similarData = BusinessModel::where('tag_id','=',$businessData->tag_id)->limit(2)->get();
        // dd($similarData);

        return view('frontend.housing_details', compact('businessData','similarData'));

    }
}
