<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Auth::routes();


//Route::get('/', 'HomeController@root');

Route::get('setting', 'SettingController@root');
//Route::get('setting/{any}', 'SettingController@index');

// Route::post('setting/state', 'StateController@index')->name('setting.state');

//Route::get('setting/state', 'SettingController@index');
// Route::get('sales/{any}', 'SalesController@index');
//Route::get('newsroom/{any}', 'NewsroomController@index');
Route::get('hradmin/{any}', 'HradminController@index');
// Route::get('accountsvender/{any}', 'AccountsvenderController@index');
// /Route::get('marketingpromotion/{any}', 'MarketingpromotionController@index');
//Route::get('{any}', 'HomeController@index');
Route::get('{any}', 'HradminController@index');

Route::get('pages-404', 'HradminController@index');

Route::group(['prefix' => 'setting', 'middleware' => ['auth']], function () {

    //category routes
    Route::get('category', 'CategoryController@index')->name('category');
    Route::get('category/create', 'CategoryController@create')->name('category.create');
    Route::post('category/store', 'CategoryController@store')->name('category.store');
    Route::post('category/autoComplete','CategoryController@categoryAutoComplete')->name('categoryAutoComplete');
    Route::get('category/categoryList', 'CategoryController@categoryList')->name('datatable.categoryList');
    Route::get('category/edit/{id}', 'CategoryController@edit')->name('category.edit');
    Route::get('category/delete/{id}', 'CategoryController@delete')->name('category.delete');
    Route::post('category/update/{id}', 'CategoryController@update')->name('category.update');
    Route::post('category/getSubCategories', 'CategoryController@getSubCategories')->name('category.getSubCategories');

    //business routes
    Route::get('business', 'BusinessController@index')->name('business');
    Route::get('business/create', 'BusinessController@create')->name('business.create');
    Route::post('business/store', 'BusinessController@store')->name('business.store');
    Route::post('business/tagAutoComplete','BusinessController@tagAutoComplete')->name('tagAutoComplete');
    Route::get('business/businessList', 'BusinessController@businessList')->name('datatable.businessList');
    Route::get('business/edit/{id}', 'BusinessController@edit')->name('business.edit');
    Route::get('business/delete/{id}', 'BusinessController@delete')->name('business.delete');
    Route::post('business/update/{id}', 'BusinessController@update')->name('business.update');
    Route::get('business/detailview/{id}', 'BusinessController@detailview')->name('business.detailview');

    //tags routes
    Route::get('tags', 'TagsController@index')->name('tags');
    Route::get('tags/create', 'TagsController@create')->name('tags.create');
    Route::post('tags/store', 'TagsController@store')->name('tags.store');
    Route::get('tags/tagsList', 'TagsController@tagsList')->name('datatable.tagsList');
    Route::get('tags/edit/{id}', 'TagsController@edit')->name('tags.edit');
    Route::get('tags/delete/{id}', 'TagsController@delete')->name('tags.delete');
    Route::post('tags/update/{id}', 'TagsController@update')->name('tags.update');

    // Advertisement routes
    Route::get('advertisement', 'AdvertisementController@index')->name('advertisement');
    Route::get('advertisement/create', 'AdvertisementController@create')->name('advertisement.create');
    Route::post('advertisement/store', 'AdvertisementController@store')->name('advertisement.store');
    Route::get('advertisement/edit/{id}', 'AdvertisementController@edit')->name('advertisement.edit');
    Route::post('advertisement/update/{id}', 'AdvertisementController@update')->name('advertisement.update');
    Route::post('category/autoComplete','AdvertisementController@categoryAutoComplete')->name('categoryAutoComplete');
    Route::get('advertisement/advertisementList', 'AdvertisementController@advertisementlist')->name('datatable.advertisementlist');
    Route::get('advertisement/delete/{id}', 'AdvertisementController@delete')->name('advertisement.delete');

    // Fourm routes
    Route::get('forum', 'ForumController@index')->name('forum');
    Route::get('forum/create', 'ForumController@create')->name('forum.create');
    Route::post('forum/store', 'ForumController@store')->name('forum.store');
    Route::get('forum/edit/{id}', 'ForumController@edit')->name('forum.edit');
    Route::post('forum/update/{id}', 'ForumController@update')->name('forum.update');
    Route::get('forum/forumList', 'ForumController@advertisementlist')->name('datatable.forumlist');
    Route::get('forum/delete/{id}', 'ForumController@delete')->name('forum.delete');
});

Route::get('frontend/index','HomeController@index');
//Route::get('frontend/index','HomeController@index')->name('/');
Route::get('frontend/Faqs','HomeController@faqs')->name('Faqs');
Route::get('frontend/forumlist','HomeController@forumList')->name('ForumList');
Route::get('frontend/contact','HomeController@contact')->name('Contact');
Route::get('frontend/about','HomeController@about')->name('About');
Route::get('frontend/careers','HomeController@careers')->name('Careers');
Route::get('frontend/login','HomeController@login')->name('Login');
Route::get('frontend/add/service','HomeController@addservice')->name('Addservice');
Route::get('frontend/add/business','HomeController@addbusiness')->name('Addbusiness');
Route::get('frontend/add/advertisement','HomeController@addadvertisement')->name('Addadvertisement');
Route::get('frontend/blog/detail','HomeController@blogdetail')->name('Blogdetail');

