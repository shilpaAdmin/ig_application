<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Model\BusinessModel;
use App\Http\Model\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class CategoryController extends Controller
{
    public function viewCategoryBusinessList(Request $request,$id){

        // find category page redirect (direction)
        $category=CategoryModel::find($id);
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
        $total = BusinessModel::where('category_id','=',$id)->get()->count();
        $html='';
        if ($request->ajax()) {

            $businessDatas = BusinessModel::where('category_id','=',$id)->paginate(6);

            foreach ($businessDatas as $key => $business) {

                $name= $business->name ? $business->name :'-';
                $address= $business->address ? $business->address :'-';
                $description= $business->description ? $business->description :'-';
                $date=$business->created_at->diffForHumans();

                $images=json_decode($business->media_file_json, true);
                if(count($images)){
                    $imageUrl= URL::to('/images/business').'/'.$images[0]['Media1'] ;
                } else {
                    $imageUrl=URL::asset('assets/frontend/images/img/gridimglisthouse.png');
                }

                if($categoryPageRedirect=="0"){

                    $detailsPageUrl= route('housing.details',['id'=>$id,'bid'=>$business->id]);
                    if( $request->viewData !=0){
                        $html.='<div class="col-xl-4 col-md-6 col-sm-12">'.
                            '<div class="listings_three-page_single wow fadeInUp animated" data-wow-delay="0ms" data-wow-duration="1200ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 0ms; animation-name: fadeInUp;">'.
                                '<div class="listings_three-page_image">'.
                                    '<img src="'.$imageUrl.'" alt="">'.

                                    '<div class="heart_icon">'.
                                        '<i class="icon-heart"></i>'.
                                    '</div>'.

                                    '<div class="shopping_circle">'.
                                        '<i class="fas fa-home"></i>'.
                                    '</div>'.
                                '</div>'.
                                '<div class="listings_three-page_content">'.
                                    '<div class="title">'.
                                        '<h3><a href="'.$detailsPageUrl.'">'.$name.'<span class="fa fa-check"></span></a></h3>'.
                                        '<p>'.$address.', '.$description.'</p>'.
                                    '</div>'.
                                    '<ul class="list-unstyled listings_three-page_contact_info">'.
                                        '<li><i class="fas fa-map-marker-alt"></i>4.5 km Away from you</li>'.
                                        '<li><a href="#"><i class="fab fa-xing-square"></i>785.1 - 812.05 sq.ft. onwards</a>'.
                                        '</li>'.
                                    '</ul>'.
                                    '<div class="listings_three-page_content_bottom">'.
                                        '<div class="left">'.
                                            '<h6>'.$date.'</h6>'.
                                        '</div>'.
                                        '<div>'.
                                            '<a href="#" class="enqurebtnbox hvr-shutter-in-vertical">Enquire Now</a>'.
                                            '<a href="#"><i class="fas fa-phone-alt callbtnbox"></i></a>'.
                                        '</div>'.
                                    '</div>'.
                                '</div>'.
                            '</div>'.
                        '</div>';
                    } else {
                    
                        $html.='<div class="col-xl-6 col-md-12 col-sm-12">'.
                            '<div class="listings_two_page_content">'.
                            
                                '<div class="listings_two_page_single">'.
                                    '<div class="listings_two_page_img">'.
                                        '<img src="'.$imageUrl.'" alt="">'.

                                    '<div class="heart_icon">'.
                                            '<i class="icon-heart"></i>'.
                                        '</div>'.
                                    '</div>'.
                                    '<div class="listings_three-page_contentt">'.
                                        '<div class="title">'.
                                            '<h3><a href="'.$detailsPageUrl.'">'.$name.'<span class="fa fa-check"></span></a></h3>'.
                                            '<p>'.$address.', '.$description.'</p>'.
                                        '</div>'.
                                        '<ul class="list-unstyled listings_three-page_contact_info">'.
                                            '<li><i class="fas fa-map-marker-alt"></i>4.5 km Away from you</li>'.
                                            '<li><a href="#"><i class="fab fa-xing-square"></i>785.1 - 812.05 sq.ft. onwards</a></li>'.
                                        '</ul>'.
                                        '<div class="listings_three-page_content_bottom">'.
                                            '<div class="left">'.
                                                '<h6>'.$date.'</h6>'.
                                            '</div>'.
                                            '<div>'.
                                            ' <a href="#" class="enqurebtnbox hvr-shutter-in-vertical">Enquire Now</a>'.
                                                '<a href="#"><i class="fas fa-phone-alt callbtnbox"></i></a>'.
                                            '</div>'.
                                        '</div>'.
                                    '</div>'.
                                '</div>'.
                            '</div>'.
                        '</div>';
                    }
                } else if($categoryPageRedirect="1"){
                    if( $request->viewData !=0){

                        $html.='<div class="col-xl-4 col-md-6 col-sm-12">'.
                                    '<div class="listings_three-page_single wow fadeInUp animated" data-wow-delay="0ms" data-wow-duration="1200ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 0ms; animation-name: fadeInUp;">'.
                                        '<div class="listings_three-page_image">'.
                                            '<img src="'.$imageUrl.'" alt="">'.

                                            '<div class="heart_icon">'.
                                                '<i class="icon-heart"></i>'.
                                            '</div>'.

                                            '<div class="shopping_circle">'.
                                                '<i class="fas fa-user-tie"></i>'.
                                            '</div>'.
                                        '</div>'.
                                        '<div class="listings_three-page_content">'.
                                            '<div class="title">'.
                                                '<h3><a href="job-details.html">'.$name.'<span class="fa fa-check"></span></a></h3>'.
                                                '<p class="mb-0">Hir infotech Pvt Ltd</p>'.
                                                '<p class="mb-0">'.$address.', '.$description.'</p>'.
                                            '</div>'.
                                            '<ul class="list-unstyled listings_three-page_contact_info">'.
                                                '<li class="d-inline-block"><a class="job_list_pill" href="#"> Part-time </a></li>'.
                                                '<li class="d-inline-block"><a class="job_list_pill" href="#"> Private </a></li>'.
                                            '</ul>'.
                                            '<div class="listings_three-page_content_bottom">'.
                                                '<div class="left">'.
                                                    '<h6> </h6>'.
                                                '</div>'.
                                                '<div>'.
                                                    '<a href="#" class="enqurebtnbox hvr-shutter-in-vertical">View Detail</a>'.
                                                    '<a href="#"><i class="fas fa-phone-alt callbtnbox"></i></a>'.
                                                '</div>'.
                                            '</div>'.
                                        '</div>'.
                                    '</div>'.
                                '</div>';
                    } else {
                        $html.='<div class="col-xl-6 col-md-12 col-sm-12">'.
                                    '<div class="listings_two_page_content joblist_shadow">'.
                                    
                                        '<div class="listings_two_page_single overflow-y__hidden">'.
                                            '<div class="listings_two_page_img">'.
                                            '<img src="'.$imageUrl.'" alt="">'.

                                                '<div class="heart_icon">'.
                                                    '<i class="icon-heart"></i>'.
                                                '</div>'.
                                            '</div>'.
                                            '<div class="listings_three-page_content pt-3">'.
                                                '<div class="title">'.
                                                    '<h3><a href="#"> '.$name.'<span class="fa fa-check"></span></a></h3>'.
                                                    '<p class="mb-0">Hir infotech Pvt Ltd</p>'.
                                                    '<p class="mb-0">'.$address.', '.$description.'</p>'.
                                                '</div>'.
                                                '<ul class="list-unstyled listings_three-page_contact_info">'.
                                                    '<li class="d-inline-block"><a class="job_list_pill" href="#"> Full-time</a>'.
                                                    '</li>'.
                                                    '<li class="d-inline-block"><a class="job_list_pill" href="#"> Private</a>'.
                                                    '</li>'.
                                                '</ul>'.
                                                '<div class="listings_three-page_content_bottom">'.
                                                    '<div class="left">'.

                                                    '</div>'.
                                                    '<div>'.
                                                        '<a href="#" class="enqurebtnbox hvr-shutter-in-vertical">View Detail</a>'.
                                                        '<a href="#"><i class="fas fa-phone-alt callbtnbox"></i></a>'.
                                                    '</div>'.
                                                '</div>'.
                                            '</div>'.
                                        '</div>'.
                                    '</div>'.
                                '</div>';
                    }
                }
            }
            return $html;
        }

        return view('frontend.category.category-business-list',compact('id','total'));
    }
}
