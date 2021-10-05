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

Route::post('UpdateLocation', 'Api\LocationController@updateLocation');

Route::get('LocationData', 'Api\LocationController@getAllLocationData');

Route::get('CategoryData', 'Api\CategoryController@getAllCategoryData');

Route::post('BusinessData', 'Api\BusinessController@storeAllBusinessData');

Route::post('BusinessDataList', 'Api\BusinessController@listBusinessData');

Route::post('BusinessDetail', 'Api\BusinessController@businessDetailData');


