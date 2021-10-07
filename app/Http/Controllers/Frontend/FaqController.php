<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Model\ForumCommentReplyLikesModel;
use App\Http\Model\ForumCommentReplyModel;
use App\Http\Model\BusinessModel;
use App\Http\Model\FAQModel;
use App\Http\Model\TagFAQMasterModel;

use Illuminate\Http\Request;

class FaqController extends Controller
{

    public function faqDetails(Request $request)
    {

        $faqData = FAQModel::where('status','=','active')->get();

        $faqTagData = TagFAQMasterModel::where('status','=','active')->groupBy('name')->get();


        $arrayTag = array();
        foreach($faqData as $faqdata)
        {
            $tagId = explode(',',$faqData[0]['tags']);
            // dd($tagId);

            for($i = 0; $i < count($tagId); $i++)
            {
                if(!in_array($tagId,$arrayTag))
                {
                    array_push($arrayTag,$tagId);
                }
            }
        }
// echo "<pre>";
// print_r($arrayTag);
// exit;
        return view('frontend.faq', compact('faqTagData','faqData'));
    }
}
