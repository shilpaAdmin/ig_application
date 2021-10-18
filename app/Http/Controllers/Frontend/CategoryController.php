<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Model\BusinessModel;
use App\Http\Model\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Model\TagMasterModel;
use App\Http\Model\CountrysModel;
use App\Http\Model\CitysModel;

class CategoryController extends Controller
{
    public function viewCategoryBusinessList(Request $request,$slug){

        // find category page redirect (direction)
        $CatagoryId = isset($request->categoryId) ? $request->categoryId : '';
        if(isset($CatagoryId) && !empty($CatagoryId)) {
            $category=CategoryModel::find($CatagoryId);
        } else {
            $category=CategoryModel::where('slug','=',$slug)->first();
        }
       
        $tagMaster = TagMasterModel::where('status','=','active')->get();
        $allCategorys = CategoryModel::where('status','=','active')->where('parent_category_id','=',$category->parent_category_id)->get();
        $allLocations = CitysModel::where('type','=','city')->get();
       
        if(isset($category) && !empty($category)){

            //find  page redirect 
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
            // $total = BusinessModel::where('category_id','=',$category->id)->get()->count();

            $preQuery = BusinessModel::where('status','active');
            if(empty($CatagoryId)){
                $preQuery->where('category_id','=',$category->id);
            }
            $preQuery->where(function($query) use ($request)
            {
                $CatagoryId = isset($request->categoryId) ? $request->categoryId : '';
                $tagsId = isset($request->tagsId) ? $request->tagsId : '';
                $SearchName = isset($request->name) ? $request->name : '';
                $LocationId = isset($request->locationId) ? $request->locationId : '';
                $Type = isset($request->type) ? $request->type : '';
    
                if(!empty($locationId)) {
                    $query->where('cityid_or_countryid', $LocationId);
                }

                if(!empty($Type)) {
                    $query->where('type', $Type);
                }
    
                if(isset($CatagoryId) && !empty($CatagoryId)) {
                    $query->where('category_id', $CatagoryId);
                }

                if(isset($tagsId) && !empty($tagsId)) {
                    if( strpos($tagsId, ',') !== false ) {
                        $tagsIds = explode(',', $tagsId);
                        for($k =0; $k < count($tagsIds); $k++) {
                            if($k==0) {
                                $query->whereRaw("find_in_set($tagsIds[$k] ,tag_id)");
                            } else {
                                $query->orWhereRaw("find_in_set($tagsIds[$k],tag_id)");
                            }
                        }
                    } else {
                        $query->whereRaw("find_in_set($tagsId ,business.tag_id)");
                    }
                }

                if(isset($SearchName) && !empty($SearchName)) {
                    $query->where('name', 'like', '%'. $SearchName.'%');
                }
            });

            $total = $preQuery->count();
            $html='';
           
            if ($request->ajax()) {

                $orderBy = isset($request->orderBy) ? $request->orderBy : 'name';
                // $businessDatas = BusinessModel::where('category_id','=',$category->id)->paginate(6);
                $preQuery = BusinessModel::where('status','active');
                if( empty($CatagoryId) ){
                    $preQuery->where('category_id','=',$category->id);
                }
                $preQuery->where(function($query) use ($request)
                {
                    $CatagoryId = isset($request->categoryId) ? $request->categoryId : '';
                    $tagsId = isset($request->tagsId) ? $request->tagsId : '';
                    $SearchName = isset($request->name) ? $request->name : '';
                    $LocationId = isset($request->locationId) ? $request->locationId : '';
                    $Type = isset($request->type) ? $request->type : '';
        
                    if(!empty($locationId)) {
                        $query->where('cityid_or_countryid', $LocationId);
                    }
    
                    if(!empty($Type)) {
                        $query->where('type', $Type);
                    }
        
                    if(isset($CatagoryId) && !empty($CatagoryId)) {
                        $query->where('category_id', $CatagoryId);
                    }
    
                    if(isset($tagsId) && !empty($tagsId)) {
                        if( strpos($tagsId, ',') !== false ) {
                            $tagsIds = explode(',', $tagsId);
                            for($k =0; $k < count($tagsIds); $k++) {
                                if($k==0) {
                                    $query->whereRaw("find_in_set($tagsIds[$k] ,tag_id)");
                                } else {
                                    $query->orWhereRaw("find_in_set($tagsIds[$k],tag_id)");
                                }
                            }
                        } else {
                            $query->whereRaw("find_in_set($tagsId ,business.tag_id)");
                        }
                    }
    
                    if(isset($SearchName) && !empty($SearchName)) {
                        $query->where('name', 'like', '%'. $SearchName.'%');
                    }
                });
                $preQuery->orderBy($orderBy, 'desc');
                $total = $preQuery->count();
                $businessDatas=$preQuery->paginate(6);

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
                } else if($categoryPageRedirect=="3"){
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
                return response()->json(['html'=>$view,'total'=>$total]);
            }
        }
        return view('frontend.category.category-business-list',compact('slug','total','tagMaster','allCategorys','allLocations'));
    }
}
