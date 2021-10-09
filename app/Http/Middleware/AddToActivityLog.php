<?php
namespace App\Http\Middleware;
use App\Http\Model\ActivityLogModel;
use App\Http\Model\ActivityLogDetailModel;
use Closure;
use Auth;
use Route;
use DB;
use Session;
class AddToActivityLog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $routeName = Route::currentRouteName();
        // dd($routeName);
        $requestUri = $request->getRequestUri();

        $action = Route::currentRouteAction();
        $activityStatus = 'ideal';
        if( strpos( $routeName, '.' ) !== false )
        {
            $explodeRouteName = explode('.',$routeName);
            // dd();
            $finalPageName = $explodeRouteName[0];
            $functionalityName = $explodeRouteName[1];
            //  dd($functionalityName);

            if($functionalityName == 'pollList')
            {
                $functionalityName = 'listing';
            }
        }
        else
        {
            //  echo "abc";
            //  exit;
            $finalPageName = $routeName;
// dd($finalPageName);
            $functionalityName = 'Listing';
        }
        if($functionalityName == 'delete')
        {
            $activityStatus = 'working';
        }
        if($functionalityName == 'create')
            $functionalityName = 'add';
        if($functionalityName == 'index')
            $functionalityName = 'Listing';
        // if($functionalityName == 'advtBank')
        //     $functionalityName = 'Listing';
        if($functionalityName == 'update')

            $functionalityName = 'edit';

        //echo '$finalPageName ::: '.$finalPageName.' $functionalityName ::: '.$functionalityName;
        if($finalPageName == 'survey' || $finalPageName == 'advertisementManage')
        {
            $explodeRequestUri = explode('/',$requestUri);
            if($functionalityName == 'create')
            {
                if(count($explodeRequestUri) == 4)
                    $functionalityName = 'add';
                else if(count($explodeRequestUri) == 5)
                    $functionalityName = 'edit';
            }
        }

        else if($finalPageName == 'flashCardCreatePage')
        {
            $finalPageName = 'Flashcard';
        }
        else if($finalPageName == 'storyCountsList')
        {
            $finalPageName = 'story Counts';
        }
        else if($finalPageName == 'storyLibrary')
        {
            $finalPageName = 'story library';
        }
        else if($finalPageName == 'documentsLibrary')
        {
            $finalPageName = 'document library';
        }
        else if($finalPageName == 'logoMediaLibrary' || $finalPageName == 'logoMediaLibraryDelete')
        {
            $finalPageName = 'Logo Media Library';
        }
        else if($finalPageName == 'kycDelete' || $finalPageName == 'kycEdit' || $finalPageName == 'kycDetail' )
        {
            $finalPageName = 'kyc';
        }
        else if($finalPageName == 'advtBank')
        {
            $finalPageName = '	advertisementManage';
        }
        else if($finalPageName == 'advtTimelinePreviewList')
        {
            $finalPageName = '	AdvtTimeline Preview List';
        }
        else if($finalPageName == 'getAdvtCounts')
        {
            $finalPageName = 'ADVT Counts';
        }
        else if($finalPageName == 'advtMediaLibraryEdit')
        {
            $finalPageName = 'advtMediaLibrary';
            $functionalityName = 'edit';
        }
        else if($finalPageName == 'advtMediaLibraryDelete')
        {
            $finalPageName = 'advtMediaLibrary';
            $functionalityName = 'delete';
        }
        else if($finalPageName == 'advertisementPackage')
        {
            $finalPageName = 'advertisement Package';
        }
        else if($finalPageName == 'mediaLibraryDelete')
        {
            $finalPageName = 'Media Library';
            $functionalityName = 'delete';
        }
        else if($finalPageName == 'mediaLibraryEdit')
        {
            $finalPageName = 'Media Library';
            $functionalityName = 'edit';
        }
        else if($finalPageName == 'mediaLibrary')
        {
            $finalPageName = 'Media Library';
            $functionalityName = 'listing';
        }
        else if($finalPageName == 'logoUploadDelete')
        {
            $finalPageName = 'Logo Upload';
            $functionalityName = 'delete';
        }
        else if($finalPageName == 'logoEdit')
        {
            $finalPageName = 'Logo Upload';
            $functionalityName = 'edit';
        }
        else if($finalPageName == 'logoUpload')
        {
            $finalPageName = 'Logo Upload';
        }
        else if($finalPageName == 'cube_justin')
        {
            if($functionalityName == 'cubeInactiveChangeStatus')
            {
                $activityStatus = 'working';
                $functionalityName = 'change_status_to_inactive';
            }
            else if($functionalityName == 'cubeActiveChangeStatus')
            {
                $activityStatus = 'working';
                $functionalityName = 'change_status_to_active';
            }

            $finalPageName = 'cube';
        }


        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';

		$ipaddress = 'UNKNOWN';
        if($ipaddress != 'UNKNOWN')
        {
            $json = file_get_contents("http://ipinfo.io/{$ipaddress}");
            $details = json_decode($json);
            $userCity = $details->city;
            $userCountry = $details->country;


 }
        else
        {
            $userCity = '';
            $userCountry = '';
        }
        $userInfoArray = array('ipAddress'=>$ipaddress,'city'=>$userCity,'country'=>$userCountry,'action'=>$action);
        $userInfoJson = json_encode($userInfoArray, JSON_FORCE_OBJECT);
        if(auth()->user())
        {
            // if(isset($routeName) && !empty($routeName))
            // {
            //     $activityLogId = '';
            //     $activityLogData = DB::table('activity_log')->where('end_time', '=', '')->orWhereNull('end_time')->orderBy('id','DESC')->limit(1)->get()->toArray();
            //     //echo "<pre>"; print_r($activityLogData);
            //     if(count($activityLogData) > 0)
            //     {
            //         $startTime = $activityLogData[0]->start_time;
            //         $activityLogId = $activityLogData[0]->id;
            //     }
            //     if(isset($activityLogId) && !empty($activityLogId))
            //     {
            //         ActivityLogModel::where('id',$activityLogId)->update([
            //             'end_time' => date('H:i:s'),
            //         ]);
            //         $date1 = strtotime($startTime);
            //         $date2 = strtotime(date('H:i:s'));
            //         $diff = date('s', $date2-$date1);
            //     }

            //     $lastInsertedLogId = ActivityLogModel::create([
            //         'user_id' => Auth::id(),
            //         'page' => $finalPageName,
            //         'start_time' => date('H:i:s'),
            //         'date' => date('Y-m-d'),
            //         'user_info_json' => $userInfoJson,
            //     ])->id;

            //     ActivityLogDetailModel::create([
            //         'activity_log_id' => $lastInsertedLogId,
            //         'user_id' => Auth::id(),
            //         'page_name' => $finalPageName,
            //         'functionality' => $functionalityName,
            //         'activity_status' => $activityStatus,
            //     ]);
            //     Session::put('session_activity_log_id', $lastInsertedLogId);
            // }
        }
        return $next($request);
    }
}
