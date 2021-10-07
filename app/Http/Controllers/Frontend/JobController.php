<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Model\ForumCommentReplyLikesModel;
use App\Http\Model\ForumCommentReplyModel;
use App\Http\Model\BusinessModel;
use Illuminate\Http\Request;

class jobController extends Controller
{

    public function jobDetails(Request $request,$categoryid)
    {

        $jobData = BusinessModel::where('id', $categoryid)->first();
        // dd($jobData);


        $similarData=null;
        if(isset($jobData->tag_id)){

            $similarData = BusinessModel::where('tag_id','=',$jobData->tag_id)->limit(2)->get();
            // dd($similarData);
        }
        return view('frontend.job_details', compact('jobData','similarData'));
    }
}
