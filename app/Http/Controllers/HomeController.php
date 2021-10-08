<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Model\ForumModel;
use App\Http\Model\AdvertisementModel;
use App\Http\Model\FAQModel;
use App\Http\Model\BlogsModel;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
       // $this->middleware('auth');
    }

    public function root(Request $request)
    {
        $arr=app('App\Http\Controllers\TaskController')->getTaskArrayAndUserData();

        $task_array=$arr[0];
        $user=$arr[1];

        return view('index',compact('task_array','user'));
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if (view()->exists($request->path())) {
            return view($request->path());
        }
        return view('pages-404');
    }
    public function home(Request $request)
    {
        // forums 
        $forums=ForumModel::select('forum.*','user.name','user.user_image')
                        ->with(['forumComments'])
                        ->join('user','user.id','=','forum.user_id')
                        ->get();

        // advertisments
        $advertisments= AdvertisementModel::where('status','=','active')->get();

        // Question & answer(faq)
        $faqs = FAQModel:: where('status','=','active')->orderBy('id','desc')->take(3)->get();
    
        // Blogs (news 7 articals)
        $blogs = BlogsModel::with(['user','blogComments'])->where('status','=','active')->orderBy('id','desc')->take(3)->get();
        return view('frontend.index',compact('forums','advertisments','faqs','blogs'));
    }

    public function faqs(Request $request)
    {
        return view('frontend.faq');
    }

    public function forumdetail(Request $request)
    {
        return view('frontend.forum_detail');
    }
    // public function forumList(Request $request)
    // {
    //     return view('frontend.forum_listing');
    // }
    public function contact(Request $request)
    {
        return view('frontend.contact');
    }
    public function about(Request $request)
    {
        return view('frontend.about');
    }
    public function careers(Request $request)
    {
        return view('frontend.career');
    }
    public function login(Request $request)
    {
        return view('frontend.login');
    }
    public function addservice(Request $request)
    {
        return view('frontend.add_service');
    }
    public function addbusiness(Request $request)
    {
        return view('frontend.add_business');
    }
    public function addadvertisement(Request $request)
    {
        return view('frontend.add_advertisement');
    }
    public function blogdetail(Request $request)
    {
        return view('frontend.blog_details');
    }
    public function privacypolicy(Request $request)
    {
        return view('frontend.privacy_policy');
    }
    public function termscondition(Request $request)
    {
        return view('frontend.terms_condition');
    }
    public function disclaimer(Request $request)
    {
        return view('frontend.disclaimer');
    }
    public function gdrpnotice(Request $request)
    {
        return view('frontend.gdpr_notice');
    }
    public function matrimoneyList(Request $request)
    {
        return view('frontend.matrimoney_listing_list');
    }

    public function matrimoneylistGrid(Request $request)
    {
        return view('frontend.matrimoney_listing_grid');
    }
    public function forgotpassword(Request $request)
    {
        return view('frontend.forgot_password');
    }
    public function signup(Request $request)
    {
        return view('frontend.signup');
    }
    public function matrimoneydetails(Request $request)
    {
        return view('frontend.matrimoney_details');
    }
////////
    public function housingdetails(Request $request)
    {
        return view('frontend.housing_details');
    }
    public function housinglistinglist(Request $request)
    {
        return view('frontend.housing_listing_list');
    }
    public function housinglistinggrid(Request $request)
    {
        return view('frontend.housing_listing_grid');
    }
/////////////
    public function taxationdetails(Request $request)
    {
        return view('frontend.taxation_details');
    }
    public function taxationlistinglist(Request $request)
    {
        return view('frontend.taxation_listing_list');
    }
    public function taxationlistinggrid(Request $request)
    {
        return view('frontend.taxation_listing_grid');
    }

    public function educationdetails(Request $request)
    {
        return view('frontend.education_details');
    }
    public function educationlistinglist(Request $request)
    {
        return view('frontend.education_listing_list');
    }
    public function educationlistinggrid(Request $request)
    {
        return view('frontend.education_listing_grid');
    }

    public function jobdetails(Request $request)
    {
        return view('frontend.job_details');
    }
    public function joblistinglist(Request $request)
    {
        return view('frontend.job_listing_list');
    }
    public function joblistinggrid(Request $request)
    {
        return view('frontend.job_listing_grid');
    }

    public function tourtraveldetails(Request $request)
    {
        return view('frontend.tourtravel_details');
    }
    public function tourtravellistinglist(Request $request)
    {
        return view('frontend.tourtravel_listing_list');
    }
    public function tourtravellistinggrid(Request $request)
    {
        return view('frontend.tourtravel_listing_grid');
    }

    public function eventdetails(Request $request)
    {
        return view('frontend.event_details');
    }
    public function eventlistinglist(Request $request)
    {
        return view('frontend.event_listing_list');
    }
    public function eventlistinggrid(Request $request)
    {
        return view('frontend.event_listing_grid');
    }

    public function entertainmentdetails(Request $request)
    {
        return view('frontend.entertainment_details');
    }
    public function entertainmentlistinglist(Request $request)
    {
        return view('frontend.entertainment_listing_list');
    }
    public function entertainmentlistinggrid(Request $request)
    {
        return view('frontend.entertainment_listing_grid');
    }

}
