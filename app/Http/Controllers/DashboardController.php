<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Model\UserModel;
use App\Http\Model\ForumModel;
use App\Http\Model\TestimonialModel;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Model\AdvertisementModel;

use Auth;
use App\Http\Model\CategoryModel;

class DashboardController extends Controller
{
    var $counter = 1;

    public function index(Request $request)
    {
        $totalUser = UserModel::all('*')->count();
        $activeUser = UserModel::where('status','=','active')->count();
        $inActiveUser = UserModel::where('status','=','inactive')->count();
        $deletedUser = UserModel::where('status','=','deleted')->count();
        $totalCategory = CategoryModel::with(['categories'])
                                    ->where('parent_category_id','=',0)
                                    ->get();
        $categoryCount = CategoryModel::all('*')->count();



        return view('dashboard.index',compact('totalUser','activeUser','inActiveUser','deletedUser','totalCategory','categoryCount'));
    }

    public function forumList(Request $request)
    {

        $result_obj = ForumModel::where('forum.status', '!=', 'deleted')->leftJoin('user',function ($join)
        {
            $join->on('forum.user_id', '=', 'user.id');

        })->select('forum.*','user.name as user_id')->orderBy('created_at','DESC')->limit(10)->get();

        return DataTables::of($result_obj)
        ->addColumn('DT_RowId', function ($result_obj)
        {
            return 'row_'.$result_obj->id;
        })
        ->addColumn('question_td',function($result_obj){
            $question_td = '';
            $question_td = ucwords($result_obj->question);
            return $question_td;
        })

        ->addColumn('description',function($result_obj){
            $description = '';
            $description = $result_obj->description;
            return $description;
        })
        ->addColumn('url',function($result_obj){
            $url = '';
            $url = $result_obj->url;
            return $url;
        })
        ->addColumn('user_id',function($result_obj){
            $user_id = '';
            $user_id = ucwords($result_obj->user_id);
            return $user_id;
        })
        ->addColumn('is_approve',function($result_obj)
        {
            $is_approve = '';
            if($result_obj->is_approve==1)
            $is_approve.='<span class="badge badge-pill badge-soft-success font-size-12">Approve</span>';
            else
            $is_approve.='<span class="badge badge-pill badge-soft-danger font-size-12">Disapprove</span>';
            return $is_approve;
            //$is_approve = $result_obj->is_approve;
            //return $is_approve;
        })
        ->rawColumns(['id','question_td','description','url','user_id','is_approve'])
        ->make(true);
    }

    public function forumapproveStatus(Request $request ,$id)
    {

        $multipleIdExplode = explode(',',$id);

        $approveData = ForumModel::whereIn('id',$multipleIdExplode)->get()->toArray();
        // dd($approveData);

        if(count($approveData) > 0)
        {
            foreach($approveData as $record)
            // dd($approveData);

            {
                $table_name = $record['is_approve'];


                if($table_name == 1)
                {

                    $update = ForumModel::where('id', '=', $record['id'])->update(['is_approve'=> 0]);


                }
                else{

                    $update = ForumModel::where('id', '=', $record['id'])->update(['is_approve'=> 1]);


                }
            }
        }
        return redirect()->back()->withSuccess('Data recovered successfully!');
    }


    public function testimonialList(Request $request)
    {

        $result_obj = TestimonialModel::where('testimonial.is_deleted', '=', 0)->leftJoin('user',function ($join)
        {
            $join->on('testimonial.user_id', '=', 'user.id');
        })->select('testimonial.*','user.name as user_id')->orderBy('created_at','DESC')->limit(10)->get();


        return DataTables::of($result_obj)

        ->addColumn('id', function ($result_obj) {
            $counters = $this->counter++;
            $id = '<div><span>' . $counters . '</span></div>';
            return $id;
        })
        ->addColumn('user_id',function($result_obj){
            $user_id = '';
            $user_id = $result_obj->user_id;
            return $user_id;

        })
        ->addColumn('name',function($result_obj){
            $name = '';
            $name = $result_obj->name;
            return $name;

        })
        ->addColumn('description',function($result_obj){
            $description = '';
            $description = $result_obj->description;
            return $description;

        })
        ->addColumn('image_src', function ($result_obj) {
            $image = '';
            if($result_obj->image != '' && file_exists(public_path().'/images/testimonials/user/'.$result_obj->image))
            {
                $url=asset("images/testimonials/user/$result_obj->image");

                $image .='<img src='.$url.' border="0" width="60" height="60" class="img-rounded loaded_image" style="object-fit: scale-down;" align="center">';

                return $image;
            }
            else
            {
                $url2=asset("images/image-placeholder.jpg");
                $image .= '<img src='.$url2.' border="0" width="60" height="60" class="img-rounded loaded_image" style="object-fit: scale-down;" align="center" />';
            }

            return $image;
        })
        ->addColumn('media_src', function ($result_obj) {
            $media = '';
            if($result_obj->media != '' && file_exists(public_path().'/images/testimonials/media/'.$result_obj->media))
            {
                $url=asset("images/testimonials/media/$result_obj->media");

                $media .='<img src='.$url.' border="0" width="60" height="60" class="img-rounded loaded_image" style="object-fit: scale-down;" align="center">';

                return $media;
            }
            else
            {
                $url2=asset("images/image-placeholder.jpg");
                $media .= '<img src='.$url2.' border="0" width="60" height="60" class="img-rounded loaded_image" style="object-fit: scale-down;" align="center" />';
            }

            return $media;
        })

        ->rawColumns(['id','user_id','image_src','media_src','detail'])
        ->make(true);
    }



    public function advertismentList()
    {

        $result_obj = AdvertisementModel::where('advertisement.status', '!=', 'deleted')->leftJoin('user',function ($join)
        {
            $join->on('advertisement.user_id', '=', 'user.id');
        })->leftJoin('category', function ($join)
        {
            $join->on('advertisement.category_id', '=', 'category.id');
        })->select('advertisement.*','user.name as user_id','category.name as category_id')->orderBy('created_at','DESC')->limit(10)->get();


        return DataTables::of($result_obj)
        ->addColumn('DT_RowId', function ($result_obj)
        {
            return 'row_'.$result_obj->id;
        })
        ->addColumn('name', function ($result_obj)
        {
            $name = '';
            $name = ucwords($result_obj->name);
            return $name;
        })
        ->addColumn('user_id',function($result_obj){
            $user_id = '';
            $user_id = $result_obj->user_id;
            return $user_id;
        })
        ->addColumn('category_id',function($result_obj){
            $category_id = '';
            $category_id = $result_obj->category_id;
            return $category_id;
        })
        ->addColumn('description',function($result_obj){
            $description = '';
            $description = $result_obj->description;
            return $description;
        })
        ->addColumn('url',function($result_obj){
            $url = '';
            $url = $result_obj->url;
            return $url;
        })
        ->addColumn('is_approve',function($result_obj)
        {
            $is_approve = '';
            if($result_obj->is_approve==1)
            $is_approve.='<span class="badge badge-pill badge-soft-success font-size-12">Approve</span>';
            else
            $is_approve.='<span class="badge badge-pill badge-soft-danger font-size-12">Disapprove</span>';
            return $is_approve;
            //$is_approve = $result_obj->is_approve;
            //return $is_approve;
        })
        ->addColumn('image_src', function ($result_obj) {
            $media = '';
            if($result_obj->media != '' && file_exists(public_path().'/images/categories/'.$result_obj->media))
            {
                $url=asset("images/categories/$result_obj->media");
                $url2=asset("images/categories/image-placeholder.jpg");

                $media .='<img src='.$url.' border="0" width="60" height="60" class="img-rounded loaded_image" style="object-fit: scale-down;" align="center"
                onerror="this.onerror=null;this.src="'.$url2.'";" >';
                return $media;
            }
            else
            {
                $url2=asset("images/image-placeholder.jpg");
                $media .= '<img src='.$url2.' border="0" width="60" height="60" class="img-rounded loaded_image" style="object-fit: scale-down;" align="center" />';
            }

            return $media;
        })
        ->rawColumns(['DT_RowId','name','user_id','category_id','description','url','is_approve','image_src'])
        ->make(true);

    }


    public function advertismentApproveStatus(Request $request ,$id)
    {

        $multipleIdExplode = explode(',',$id);

        $approveData = AdvertisementModel::whereIn('id',$multipleIdExplode)->get()->toArray();
        // dd($approveData);

        if(count($approveData) > 0)
        {
            foreach($approveData as $record)
            // dd($approveData);

            {
                $table_name = $record['is_approve'];


                if($table_name == 1)
                {

                    $update = AdvertisementModel::where('id', '=', $record['id'])->update(['is_approve'=> 0]);


                }
                else{

                    $update = AdvertisementModel::where('id', '=', $record['id'])->update(['is_approve'=> 1]);


                }
            }
        }
        return redirect()->back()->withSuccess('Data recovered successfully!');
    }

}
