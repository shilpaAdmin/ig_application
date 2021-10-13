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

    public function housingDetails(Request $request,$slug,$business_slug)
    {


        // find category details page redirect (direction)
        // $category=CategoryModel::find($categoryid);
        $category=CategoryModel::where('slug','=',$slug)->first();
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
        $businessData = BusinessModel::with(['category'])->where('slug','=', $business_slug)->first();
        $similarData=null;
        if(isset($businessData->tag_id)){
            $similarData = BusinessModel::with(['category'])->where('tag_id','=',$businessData->tag_id)->limit(2)->get();
        }
        // dd($category,$businessData,$similarData,$categoryPageRedirect);
        // redirect perticular business details page
        if($categoryPageRedirect=="0"){
            // housing details
            return view('frontend.category.housing_details', compact('businessData','similarData'));
        } else if($categoryPageRedirect=="1"){
            // job details
            return view('frontend.category.job_details',compact('businessData','similarData'));
        }else if($categoryPageRedirect=="2"){
            // educations
            return view('frontend.category.education_details',compact('businessData','similarData'));
        }else if($categoryPageRedirect=="3"){
            // taxation details
            return view('frontend.category.taxation_details',compact('businessData','similarData'));
        }else if($categoryPageRedirect=="4"){
            // tour & travel(transport) details
            return view('frontend.category.tourtravel_details',compact('businessData','similarData'));
        }else if($categoryPageRedirect=="8"){
            // entaintment details
            return view('frontend.category.entertainment_details',compact('businessData','similarData'));
        }else if($categoryPageRedirect=="9"){
            // event details
            return view('frontend.category.event_details',compact('businessData','similarData'));
        }

    }
}
