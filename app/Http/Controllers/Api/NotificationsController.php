<?php /** @noinspection PhpUndefinedClassInspection */

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\RefreshToken;
use Laravel\Passport\Token;
use App\Http\Controllers\Controller;

use App\Http\Model\NotificationsModel;
use App\User;
use Illuminate\Http\Request;
use HasApiTokens;
use Hash;
use URL;

class NotificationsController extends Controller
{
    public function getNotificationsList(Request $request)
    {
        $input=$request->all();

        if(!isset($input['RegisterId']) || empty($input['RegisterId']))
        {
            $error[] = 'RegisterId Must be Required!';
        }

        if(!empty($error))
        {
            return response()->json(['Status'=>False,'StatusMessage'=>implode(',',$error),'Result'=>array()]);
		}

        if(isset($input['RegisterId']) && !empty($input['RegisterId']))
        {
            
            $user=User::where('id',$input['RegisterId'])->first();
            
            if($user===null)
            {
                return response()->json(['Status'=>false,'StatusMessage'=>'User record not exist!'
                ,'Result'=>array()]);
            }
        }

        $notificationsData=NotificationsModel::where('user_id',$input['RegisterId'])->get()->toArray();
        $totalCount=count($notificationsData);

        $notificationsArray=array();

        for($i=0;$i<$totalCount;$i++)
        {
            $notificationsArray[$i]['Id']=$notificationsData[$i]['id'];
            $notificationsArray[$i]['ListId']=$notificationsData[$i]['business_id'];
            $notificationsArray[$i]['Title']=$notificationsData[$i]['title'];
            $notificationsArray[$i]['Message']=$notificationsData[$i]['message'];
            $notificationsArray[$i]['Date']=date('d-m-Y',strtotime($notificationsData[$i]['created_at']));
            $notificationsArray[$i]['Time']=date('H:i:s',strtotime($notificationsData[$i]['created_at']));
        }

        if($totalCount > 0)
        return response()->json(['Status'=>true,'StatusMessage'=>'Get Notification List successfully !','Result'=>$notificationsArray]);
        else
        return response()->json(['Status'=>false,'StatusMessage'=>'Notification List not found !','Result'=>array()]);
    }
}