<?php
namespace App\Http\Middleware;
use App\Http\Model\DeleteLogModel;
use Closure;
use Auth;
use Route;
use DB;
use Session;

class DeleteLog
{
    public function handle($request, Closure $next)
    {
        $routeName = Route::currentRouteName();
        $requestUri = $request->getRequestUri();
        //echo '$requestUri ::: '.$requestUri;
        if( strpos( $requestUri, '/' ) !== false )
        {
            $deleteIdData = explode('/',$requestUri);
            $finalKey = count($deleteIdData) - 1;
            $deleteId = $deleteIdData[$finalKey];
        }
        if( strpos( $routeName, '.' ) !== false )
        {
            $routeData = explode('.',$routeName);
            $moduleName = $routeData[0];
            $functionalityName = $routeData[1];
        }
        else
        {
            $moduleName = $routeName;
        }
        $redirectUrl = '';
        $authUserId = Auth::id();
        if(isset($deleteId) && !empty($deleteId) && isset($authUserId) && !empty($authUserId) && isset($routeName) && !empty($routeName) && isset($moduleName) && !empty($moduleName))
        {
            //  echo "$moduleName";
            //  exit;
            switch($moduleName)
            {
                case 'cube_justin':
                    $moduleName = 'cube';
                    $redirectUrl = '/newsroom-justIn/cube_justin/edit/'.$deleteId;
                    $tableName = 'cube_detail_justin';
                break;
                case 'country':
                    $redirectUrl = '/setting/country/edit/'.$deleteId;
                    $tableName = 'country';
                break;
                case 'company':
                    $redirectUrl = '/setting/company/edit/'.$deleteId;
                    $tableName = 'companys';
                break;
                case 'branch':
                    $redirectUrl = '/setting/branch/edit/'.$deleteId;
                    $tableName = 'bureaus';
                break;
                case 'document':
                    $redirectUrl = '/setting/document/edit/'.$deleteId;
                    $tableName = 'document_type';
                break;

                case 'document_library':
                    $redirectUrl = '/setting/documentsLibrary/'.$deleteId;
                    $tableName = 'document_library';
                break;
                case 'story_library':
                    $redirectUrl = '/setting/storyLibrary/'.$deleteId;
                    $tableName = 'story_library';
                break;
                case 'allowedfile':
                    $redirectUrl = '/setting/allowedfile/edit/'.$deleteId;
                    $tableName = 'allowed_file_type';
                break;
                case 'slotMaster':
                    $redirectUrl = '/setting/slotMaster/edit/'.$deleteId;
                    $tableName = 'slot_master';
                break;
                case 'advertisementPackage':
                    $redirectUrl = '/setting/advertisementPackage/edit/'.$deleteId;
                    $tableName = 'advertisement_package';
                break;
                case 'appBasicPages':
                    $redirectUrl = '/setting/appBasicPages/edit/'.$deleteId;
                    $tableName = 'app_basic_pages';
                break;
                case 'timeline':
                    $redirectUrl = '/setting/timeline/edit/'.$deleteId;
                    $tableName = 'timeline';
                break;
                case 'story_type':
                    $redirectUrl = '/setting/story_type/edit/'.$deleteId;
                    $tableName = 'story_type';
                break;
                case 'bankmaster':
                    $redirectUrl = '/setting/bankmaster/edit/'.$deleteId;
                    $tableName = 'bankmaster';
                break;
                case 'businesscategory':
                    $redirectUrl = '/setting/businesscategory/edit/'.$deleteId;
                    $tableName = 'businesscategory';
                break;
                case 'paymentmode':
                    $redirectUrl = '/setting/paymentmode/edit/'.$deleteId;
                    $tableName = 'paymentmode';
                break;
                case 'logoUploadDelete':
                    $redirectUrl = '/setting/logoupload/'.$deleteId;
                    $tableName = 'logo_upload';
                break;
                case 'mediaLibraryDelete':
                    $redirectUrl = '/setting/mediaLibrary/'.$deleteId;
                    $tableName = 'media_library_master';
                break;
                case 'justInTimeline_justin':
                    $redirectUrl = '/newsroom-justIn/justInTimeline_justin/edit/'.$deleteId;
                    $tableName = 'just_in_timeline_justin';
                break;

                case 'flashCardDeletePage':
                    $redirectUrl = '/newsroom-justIn/justInManageTimeline_justin/'.$deleteId;
                    $tableName = 'just_in_timeline_justin_manage';
                break;
                case 'logoMediaLibraryDelete':
                    $redirectUrl = '/setting/logoMediaLibrary/'.$deleteId;
                    $tableName = 'logo_media_library';
                break;
                case 'kycDelete':
                    $redirectUrl = '/newsroom-justIn/kyc/'.$deleteId;
                    $tableName = 'user_kyc_detail';
                break;
                case 'breaking_news_justin':
                    $redirectUrl = '/newsroom-justIn/breaking_news_justin/'.$deleteId;
                    $tableName = 'breaking_news_justin';
                break;
                case 'notificationfeed_justin':
                    $redirectUrl = '/newsroom-justIn/notificationfeed_justin/'.$deleteId;
                    $tableName = 'notification_feed_justin';
                break;
                case 'survey':
                    $redirectUrl = '/newsroom-justIn/survey/create/'.$deleteId;
                    $tableName = 'survey';
                break;
                case 'advertisementManage':
                    $redirectUrl = '/advertisement/advertisementManage/create/'.$deleteId;
                    $tableName = 'advertisement_manage_detail';
                break;
                case 'advtMediaLibraryDelete':
                    $redirectUrl = '/setting/advtMediaLibrary/'.$deleteId;
                    $tableName = 'advt_media_library';
                break;
                case 'poll':
                    $redirectUrl = '/newsroom-justIn/poll/'.$deleteId;
                    $tableName = 'poll';
                break;

            }



            $lastInsertedLogId = DeleteLogModel::create([
                'user_id' => Auth::id(),
                'primary_id' => $deleteId,
                'module_name' => $moduleName,
                'table_name' => $tableName,
                'status' => 'deleted',
                'redirect_url' => $redirectUrl,
            ])->id;
        }
        return $next($request);
    }
}
