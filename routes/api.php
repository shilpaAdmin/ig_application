<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/





Route::post('Register', 'Api\APIAuthController@register');

Route::post('UserLogin', 'Api\APIAuthController@UserLogin');

//Route::middleware('auth:api')->get('CategoryData', 'Api\CategoryController@getAllCategoryData');

Route::post('Logout', 'Api\APIAuthController@logout')->middleware('CheckHashToken');

Route::post('UpdateLocation', 'Api\LocationController@updateLocation')->middleware('CheckHashToken');

Route::get('LocationData', 'Api\LocationController@getAllLocationData');

Route::get('CategoryData', 'Api\CategoryController@getAllCategoryData')->name('CategoryData');

Route::post('BusinessData', 'Api\BusinessController@storeAllBusinessData')->middleware('CheckHashToken');

Route::post('BusinessDataList', 'Api\BusinessController@listBusinessData')->middleware('CheckHashToken');
Route::post('categoryWiseBusinessData', 'Api\BusinessController@getBusinessesCategoryWise')->name('category.business');

Route::post('BusinessDetail', 'Api\BusinessController@businessDetailData')->middleware('CheckHashToken');

Route::post('Profile','Api\APIAuthController@Profile')->middleware('CheckHashToken');

Route::post('AddAds','Api\AdvertisementController@AddAds')->middleware('CheckHashToken');

Route::post('AddForum','Api\ForumController@storeForumData')->middleware('CheckHashToken');

Route::post('SendEmailWithOTP', 'Api\APIAuthController@SendEmailWithOTP')->middleware('CheckHashToken');

Route::post('ForumDetail', 'Api\ForumController@forumDetailData')->middleware('CheckHashToken');

Route::post('AddCommentOrReply', 'Api\ForumCommentReplyController@storeCommentReplyData')->middleware('CheckHashToken');

Route::post('MyListings', 'Api\BusinessController@MyListings')->middleware('CheckHashToken');

Route::post('AddFAQ', 'Api\FAQController@storeFAQData')->middleware('CheckHashToken');

Route::post('LikeUnlike', 'Api\ForumCommentReplyController@userLikeUnlike')->middleware('CheckHashToken');

Route::post('EnquireEnroll', 'Api\BusinessController@userEnquireEnroll')->middleware('CheckHashToken');

Route::post('Testimonials', 'Api\TestimonialController@getTestimonialData')->middleware('CheckHashToken');

Route::post('UpdateProfile', 'Api\APIAuthController@updateProfile')->middleware('CheckHashToken');

Route::post('BusinessEnquiryList', 'Api\BusinessController@getBusinessUserEnquiryList')->middleware('CheckHashToken');

Route::post('ContactIG', 'Api\APIAuthController@userContactMessages')->middleware('CheckHashToken');

Route::post('UserFavouriteBusiness', 'Api\BusinessController@addUserFavouriteBusiness')->middleware('CheckHashToken');

Route::post('BlogsDetail', 'Api\BlogController@blogDetailData')->middleware('CheckHashToken');

Route::post('Dashboard', 'Api\DashboardController@getAllDashboardData')->middleware('CheckHashToken');

Route::post('GlobalSearch', 'Api\DashboardController@searchGlobal')->middleware('CheckHashToken');

Route::post('AddTestimonial', 'Api\TestimonialController@storeTestimonialData')->middleware('CheckHashToken');

Route::post('ComplainReport', 'Api\APIAuthController@storeComplainReport')->middleware('CheckHashToken');

Route::post('LegalPages', 'Api\LegalPagesController@getLegalPages')->middleware('CheckHashToken');

Route::post('Notifications', 'Api\NotificationsController@getNotificationsList')->middleware('CheckHashToken');

Route::post('AddMatrimonial', 'Api\MatrimonialController@AddUpdateMatrimonial')->middleware('CheckHashToken');

Route::post('MatrimonialList', 'Api\MatrimonialController@getMatrimonialList')->middleware('CheckHashToken');

Route::post('MyAdvertisementList','Api\AdvertisementController@getUserAdvertisementList')->middleware('CheckHashToken');

Route::post('UpdateFAQ', 'Api\FAQController@updateFAQData')->middleware('CheckHashToken');

Route::post('ConnectNow', 'Api\MatrimonialController@connectNow')->middleware('CheckHashToken');

Route::post('FAQ', 'Api\FAQController@listFAQData')->middleware('CheckHashToken');

Route::post('BlogsCommentReply', 'Api\BlogCommentReplyController@storeCommentReplyData')->middleware('CheckHashToken');

Route::post('BlogsDataList', 'Api\BlogController@listBlogData')->middleware('CheckHashToken');

Route::post('ForgetPassword', 'Api\APIAuthController@sendMailForForgetPassword');

Route::post('ChangePassword', 'Api\APIAuthController@userChangePassword');

Route::post('ForumDataList', 'Api\ForumController@listForumData')->middleware('CheckHashToken');	

Route::post('MatrimonialDetail', 'Api\MatrimonialController@getMatrimonialDetail')->middleware('CheckHashToken');	