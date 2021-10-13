<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Model\ForumModel;
use App\Http\Model\AdvertisementModel;
use App\Http\Model\FAQModel;
use App\Http\Model\BlogsModel;

class HomeController extends Controller
{
   
    public function index(Request $request) {
        
        // forums 
        $forums=ForumModel::select('forum.*','user.name','user.user_image')
                        ->with(['forumComments'])
                        ->join('user','user.id','=','forum.user_id')
                        ->orderBy('forum.created_at','desc')
                        ->take(5)
                        ->get();

        // advertisments
        $advertisments= AdvertisementModel::where('status','=','active')
                                            ->orderBy('created_at','desc')
                                            ->take(5)
                                            ->get();

        // Question & answer(faq)
        $faqs = FAQModel:: where('status','=','active')
                        ->orderBy('created_at','desc')
                        ->take(3)
                        ->get();
    
        // Blogs (news & articals)
        $blogs = BlogsModel::with(['user','blogComments'])
                        ->where('status','=','active')
                        ->orderBy('created_at','desc')
                        ->take(3)
                        ->get();


        return view('frontend.home.index',compact('forums','advertisments','faqs','blogs'));

    }
}
