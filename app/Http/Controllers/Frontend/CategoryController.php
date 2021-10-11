<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Model\BusinessModel;
use App\Http\Model\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class CategoryController extends Controller
{
    public function viewCategoryBusinessList(Request $request,$slug){

        // find category page redirect (direction)
        $category=CategoryModel::where('slug','=',$slug)->first();
       
        \Log::info($slug);
       
        if(isset($category) && !empty($category)){
           
            if(isset($category) && $category->parent_category_id!=0){
                while(true){
                    $category=CategoryModel::find($category->parent_category_id);
                    if($category->parent_category_id==0){
                        break;
                    }
                }
            }
        
            $categoryPageRedirect= isset($category) ? $category->category_page_redirect: 0;

            // business data
            // $total = BusinessModel::where('category_id','=',$id)->get()->count();
            $total = BusinessModel::where('category_id','=',$category->id)->get()->count();
            $html='';
            if ($request->ajax()) {

                $businessDatas = BusinessModel::where('category_id','=',$category->id)->paginate(6);

                if($categoryPageRedirect=="0"){
                    if( $request->viewData !=0){
                        $view = view("frontend.category.list-view.housing-listing-grid",compact('businessDatas','slug'))->render();
                    } else {
                        $view = view("frontend.category.list-view.housing-listing-list",compact('businessDatas','slug'))->render();
                    }
                } else if($categoryPageRedirect=="1"){
                    if( $request->viewData !=0){
                        $view = view("frontend.category.list-view.jobs-listing-grid",compact('businessDatas','slug'))->render();
                    } else {
                        $view = view("frontend.category.list-view.jobs-listing-list",compact('businessDatas','slug'))->render();
                    }
                }
                else if($categoryPageRedirect=="2"){
                    if( $request->viewData !=0){
                        $view = view("frontend.category.list-view.education-listing-grid",compact('businessDatas','slug'))->render();
                    } else {
                        $view = view("frontend.category.list-view.education-listing-list",compact('businessDatas','slug'))->render();
                    }
                }
                else if($categoryPageRedirect=="3"){
                    if( $request->viewData !=0){
                        $view = view("frontend.category.list-view.taxation-listing-grid",compact('businessDatas','slug'))->render();
                    } else {
                        $view = view("frontend.category.list-view.taxation-listing-list",compact('businessDatas','slug'))->render();
                    }
                } else if($categoryPageRedirect=="4"){
                    if( $request->viewData !=0){
                        $view = view("frontend.category.list-view.tourtravel-listing-grid",compact('businessDatas','slug'))->render();
                    } else {
                        $view = view("frontend.category.list-view.tourtravel-listing-list",compact('businessDatas','slug'))->render();
                    }
                } else if($categoryPageRedirect=="8"){
                    if( $request->viewData !=0){
                        $view = view("frontend.category.list-view.entertainment-listing-grid",compact('businessDatas','slug'))->render();
                    } else {
                        $view = view("frontend.category.list-view.entertainment-listing-list",compact('businessDatas','slug'))->render();
                    }
                } else if($categoryPageRedirect=="9"){
                    if( $request->viewData !=0){
                        $view = view("frontend.category.list-view.event-listing-grid",compact('businessDatas','slug'))->render();
                    } else {
                        $view = view("frontend.category.list-view.event-listing-list",compact('businessDatas','slug'))->render();
                    }
                }
                return response()->json(['html'=>$view]);
            }
        }
        return view('frontend.category.category-business-list',compact('slug','total'));
    }
}
