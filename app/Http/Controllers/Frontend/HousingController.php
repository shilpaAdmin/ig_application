<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Model\ForumCommentReplyLikesModel;
use App\Http\Model\ForumCommentReplyModel;
use App\Http\Model\BusinessModel;
use Illuminate\Http\Request;
use App\Http\Model\CategoryModel;

class HousingController extends Controller
{

    public function housingDetails(Request $request,$categoryid,$businessid)
    {


        // find category details page redirect (direction)
        $category=CategoryModel::find($categoryid);
        if(isset($category) && $category->parent_category_id!=0){
            while(true){
                $category=CategoryModel::find($category->parent_category_id);
                if($category->parent_category_id==0){
                    break;
                }
            }
        }
        $categoryPageRedirect= isset($category) ? $category->category_page_redirect: 0;

        // get business details data
        $businessData = BusinessModel::where('id', $businessid)->first();
        $similarData=null;
        if(isset($businessData->tag_id)){
            $similarData = BusinessModel::where('tag_id','=',$businessData->tag_id)->limit(2)->get();
        }

        // redirect perticular business details page
        if($categoryPageRedirect=="0"){
            // housing details
            return view('frontend.housing_details', compact('businessData','similarData'));
        } else if($categoryPageRedirect=="1"){
            // job details
            return view('frontend.job_details',compact('businessData','similarData'));
        }else if($categoryPageRedirect=="2"){
            // educations
            return view('frontend.education_details',compact('businessData','similarData'));
        }else if($categoryPageRedirect=="3"){
            // taxation details
            return view('frontend.taxation_details',compact('businessData','similarData'));
        }else if($categoryPageRedirect=="4"){
            // tour & travel(transport) details
            return view('frontend.tourtravel_details',compact('businessData','similarData'));
        }else if($categoryPageRedirect=="8"){
            // entaintment details
            return view('frontend.entertainment_details',compact('businessData','similarData'));
        }else if($categoryPageRedirect=="9"){
            // event details
            return view('frontend.event_details',compact('businessData','similarData'));
        }

    }
}
