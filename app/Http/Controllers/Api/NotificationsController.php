<?php /** @noinspection PhpUndefinedClassInspection */

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\RefreshToken;
use Laravel\Passport\Token;
use App\Http\Controllers\Controller;

use App\Http\Model\NotificationsModel;
use App\Http\Model\CategoryModel;
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

        $notificationsData=NotificationsModel::with(['category'])->where('user_id',$input['RegisterId'])->orderBy('id','desc')->get()->toArray();
        $totalCount=count($notificationsData);

        $notificationsArray=array();

        for($i=0;$i<$totalCount;$i++)
        {
            $category_name='';
            if(isset($notificationsData[$i]['category']['name']))
            $category_name=$notificationsData[$i]['category']['name'];

            $notificationsArray[$i]['Id']=strval($notificationsData[$i]['id']);
            $notificationsArray[$i]['ListId']=$notificationsData[$i]['ids'];
            $notificationsArray[$i]['Type']=!empty($notificationsData[$i]['type'])?$notificationsData[$i]['type']:'';
            $notificationsArray[$i]['Category']=$category_name;
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

    public function sendNotification($receiverId='',$id='',$message='',$type='',$categoryid='',$title='')
    {
        /*$sender_userdata = User::select('email','username','full_name')->where('id',$senderId)->first();
        $sender_username = isset($sender_userdata->username) ? $sender_userdata->username : '';
        $sender_fullname = isset($sender_userdata->full_name) ? $sender_userdata->full_name : '';
        $Message = $sender_username.' has '.$orderStatus;*/
        
        $receiverId = isset($receiverId) ? $receiverId : '';
        $id = isset($id) ? $id :'';
        $message =  isset($message) ? $message :'';
        $type= isset($type) ? $type :'';
        $categoryid=!empty($categoryid)?$categoryid:'';

        if($title=='')
        $title='IGGroup App';

        $receiverInfo = User::select('device_token','device_type')->where('id',$receiverId)->first();

        if(!empty($categoryid))
        {
            $categoryObj=CategoryModel::where('name','like','%'.$categoryid.'%')->select('id')->first();

            if($categoryObj!==null)
            {
                $categoryid=$categoryObj->id;
            }
        }

        $notification['ids'] = $id;
        $notification['user_id']   = $receiverId;
        $notification['message']     = $message;
        $notification['title']     = $title;
        $notification['type']     = $type;

        if(!empty($categoryid))
        $notification['category_id']=$categoryid;

        NotificationsModel::create($notification);

        /// PUSH NOTIFICATION WORK ======================================================

            if(!empty($receiverInfo)) {

                $deviceType             = $receiverInfo->device_type;
                $deviceToken            = $receiverInfo->device_token;
                $result='';
               
                $date=date('d-m-Y');
                $time=date('H:i:s');

                if ((strtolower($deviceType) == 'android') && !empty($deviceToken)) {

                        $postArray = array('title' => $title,
                                'body' => $message,
                                'type'=>$type,
                                'category'=>$categoryid,
                                'id'=>$id,
                                'title'=>$title,
                                'date'=>$date,
                                'time'=>$time,
                                'sound' => 'default'
                            );

                        $result=$this->new_SendPushNotification($deviceToken, $postArray,'android');
                            // $this->SendPushNotificationAndroid($deviceToken, $postArray);
                }
                else if ((strtolower($deviceType) == 'ios') && !empty($deviceToken)){

                        $postArray = array(
                            'title' => $title,
                            'alert' => $message,
                            'type'=>$type,
                            'category'=>$categoryid,
                            'id'=>id,
                            'date'=>$date,
                            'time'=>$time,
                            'sound' => 'default');

                        $result=$this->new_SendPushNotification($deviceToken, $postArray,'ios');
                }

               // $responseArray=['type'=>$Type,'category'=>$CategoryId,'id'=>Id,'message'=>$Message,'title'=>$Title,'date'=>$Date,'time'=>$Time];

               // return response()->json(['Status'=>true,'StatusMessage'=>'Notification sent successfully !','Result'=>$responseArray]);
            }
            /*else
            {
                return response()->json(['Status'=>false,'StatusMessage'=>'Notification not sent !','Result'=>array()]);
            }*/

        return true;
    }

    function new_SendPushNotification($device, $postArray,$action)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        //$serverApiKey = "AAAAkykEV2s:APA91bHL37QEzfeVCWsKgyYuwKlDXsN2lV3UmaPzg0QFYbQvzQHmrAywLX46Uz-ANZ-L_ExjkjdKTqGz3jl_y2TMEZdp7P8jzOym6-ZBUxihSu8SeMybpCR_i4dQRS8j-hfp_mKj18lJ";
        $serverApiKey ="AAAAtmr4XoU:APA91bGXdcxzQHeq3MDgB-cyrUilvsreXgXi1LCjMzwOj7_Y92ObLnx_d8FQ8qupMujiK5r_4TSp2Q0mQdpdAZZVbKwmetC1X_JmcEPjvrNDAbglK8RJzVWa-B5-3vbBpsSgNIz-SD-Y";

        if($action == 'ios')
        {
            $data = array();
            $data ['content_available'] = true;
            $data ['mutable_content'] = true;
            $data ['priority'] = 'high';
            $data ['to'] = $device;
            $data ['notification'] = $postArray;
        }
        else
        {
            $data = array (
                'to' => $device,
                'priority'=> 'high',
                'data' => $postArray
            );
        } 
       
        $fields = json_encode( $data );
        $headers = array (
                'Authorization: key=' .$serverApiKey,
                'Content-Type: application/json'
        );

        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_POST, true );
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );
        $result = curl_exec ( $ch );
        curl_close ( $ch );
        
        //echo $result;
        
        return true;
    }
}