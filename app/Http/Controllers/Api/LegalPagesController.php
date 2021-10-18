<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Model\LegalPagesModel;
use App\User;

use URL;
use Illuminate\Http\Request;

class LegalPagesController extends Controller
{
    public function getLegalPages(Request $request)
    {
        $input=$request->all();

        if(!isset($input['Type']) || empty($input['Type']))
        {   
            $error[] = 'Type Must be Required!';
		}

        if(!empty($error))
        {
            return response()->json(['Status'=>False,'StatusMessage'=>implode(',',$error),'Result'=>array()]);
		}

        switch($input['Type'])
        {
            case 'Privacy':
                $type='privacy_policy';
            break;

            case 'TC':
                $type='terms_and_conditions';
            break;

            case 'About':
                $type='about_us';
            break;

            case 'Impressum':
                $type='impressum';
            break;
            
            default:
                return response()->json(['Status'=>False,'StatusMessage'=>'Type is not correct!','Result'=>array()]);
            break;
        }

        $legalArray=LegalPagesModel::where('type',$type)->select('html')->get()->toArray();
        if(isset($legalArray[0]['html']))
        {   
            return response()->json(['Status'=>true,'StatusMessage'=>'Get Legal Page successfully!','Result'=>array('HtmlData'=>$legalArray[0]['html'])]);
        }
        else
        {
            return response()->json(['Status'=>false,'StatusMessage'=>'Legal Page not found!','Result'=>array()]);
        }
    }
}