<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Model\BlogsModel;
use App\Http\Model\CategoryModel;
use App\Http\Model\BlogsCommentReplyModel;

class BlogController extends Controller
{
    
    public function viewBlogList(Request $request) {
        
        if ($request->ajax()) {
            $blogs = BlogsModel::with(['user','blogComments'])
                              ->where('status','=','active');
                         
            if( isset($request->id) ) {
                // search category wise blog
                $blogs=$blogs->where('category_id','=',$request->id)->paginate(6);
            } else if( isset($request->search) ) {
                // search blog
                $blogs=$blogs->where('name', 'like', '%' . $request->search . '%')->paginate(6);
            } else {
                // all blogs
                $blogs =$blogs->paginate(6);
            }

          
            $view = view("frontend.blogs.list-view",compact('blogs'))->render();

            return response()->json(['html'=>$view]);
        }

        return view('frontend.blogs.blog');
    }


    public function viewBlogDetails(Request $request,$slug) {

        $blog=BlogsModel::with(['user','blogComments'=>function($q){
                            $q->select('blogs_comment_reply.*','user.name','user.user_image')
                            ->join('user','user.id','=','blogs_comment_reply.user_id');
                        }])
                        ->where('status','=','active')
                        ->where('name','=',str_replace('-', ' ', $slug))
                        ->first();

        $categories = CategoryModel::where('parent_category_id','=',0)->where('status','=','active')->get();
        $latestPost = BlogsModel::where('status','=','active')->orderBy('id','desc')->take(4)->get();

        return view('frontend.blogs.blog_details',compact('blog','categories','latestPost'));
    }

    public function saveBlogComments(Request $request) {
        $input=$request->all();
        $userId=auth()->user() ? auth()->user()->id : 1;
        $input['user_id']=$userId;
        $blogComment=BlogsCommentReplyModel::create($input);
        return redirect()->back();
    }
}
