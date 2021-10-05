<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Model\CountrysModel;
use App\Http\Model\CitysModel;
use App\Http\Model\LocationModel;
use App\Http\Model\CategoryModel;


use Carbon\Carbon;
use DataTables;
use URL;
use Auth;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getAllCategoryData()
    {
        $category = CategoryModel::where('parent_category_id','=', '0')->OrderBy('display_order', 'ASC')->get()->toArray();
        $tempCategoryId = '';
        $categoryData = array();
        if(count($category) > 0)
        {
            $j = $k = 0;
            foreach($category as $data)
            {
                $parentCategoryId = $data['parent_category_id'];
                if($parentCategoryId == 0)
                {
                    $categoryData[$j]['Id']= (string)$data['id'];
                    // echo "<pre>";print_r($categoryData[$j]['id']);exit;
                    $categoryData[$j]['Name']= trim($data['name']);
                    $categoryData[$j]['paramLink']= trim($data['param_link']);
                    $categoryData[$j]['Icon']= URL::to('images/categories').'/'.$data['media_file'];

                    // $categoryData[$j]['parent_category_id'] = (string)$data['parent_category_id'];
                    $categoryData[$j]['Description'] = $data['description'];
                    $subCategoryId = $data['id'];

                    $subCategorycategory = CategoryModel::where('parent_category_id',  '=', $subCategoryId)->OrderBy('id', 'ASC')->get()->toArray();

                    if(count($category) > 0)
                    {
                        $k = 0;
                        foreach($subCategorycategory as $data)
                        {
                            $categoryData[$j]['Subcategories'][$k]['Id'] = (string)$data['id'];
                            // $categoryData[$j]['Subcategories'][$k]['parent_category_id'] = (string)$data['parent_category_id'];
                            $categoryData[$j]['Subcategories'][$k]['Name'] = trim($data['name']);
                            $categoryData[$j]['Subcategories'][$k]['Icon'] = URL::to('images/categories').'/'.$data['media_file'];

                            $categoryData[$j]['Subcategories'][$k]['Description'] = $data['description'];
                            $k++;
                        }
                    }
                    $j++;
                }
            }
        }

        //echo "<pre>"; print_r($categoryData);
       // exit;


        if(count($categoryData) > 0)
        {
            return response()->json(['Status'=>True,'StatusMessage'=>'Success Message','Result'=>$categoryData]);
        }
        else
        {
            return response()->json(['Status'=>False,'StatusMessage'=>'No Data Available','Result'=>array()]);
        }
    }
 }
