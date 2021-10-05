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

// Auth::routes();

//Route::get('setting', 'SettingController@root');

//Route::get('hradmin/{any}', 'HradminController@index');

//Route::get('{any}', 'HomeController@index');

//Route::get('{any}', 'HradminController@index');

//Route::get('pages-404', 'HradminController@index');

Route::get("dm",function(){
    return view('frontend.index_old');
});

Route::group(['prefix' => 'admin'], function () {


    //category routes
    Route::get('category', 'CategoryController@index')->name('category');
    Route::get('category/create', 'categorycontroller@create')->name('category.create');
    Route::post('category/store', 'categorycontroller@store')->name('category.store');
    Route::post('category/autoComplete','CategoryController@categoryAutoComplete')->name('categoryAutoComplete');
    Route::get('category/categoryList', 'categorycontroller@categorylist')->name('datatable.categorylist');
    Route::get('category/edit/{id}', 'categorycontroller@edit')->name('category.edit');
    Route::get('category/delete/{id}', 'categorycontroller@delete')->name('category.delete');
    Route::post('category/update/{id}', 'categorycontroller@update')->name('category.update');
    Route::post('category/getSubCategories', 'categorycontroller@getsubcategories')->name('category.getsubcategories');

    //business routes
    Route::get('business', 'BusinessController@index')->name('business');
    Route::get('business/create', 'businesscontroller@create')->name('business.create');
    Route::post('business/store', 'businesscontroller@store')->name('business.store');
    Route::post('business/tagAutoComplete','BusinessController@tagAutoComplete')->name('tagAutoComplete');
    Route::get('business/businessList', 'businesscontroller@businesslist')->name('datatable.businesslist');
    Route::get('business/edit/{id}', 'businesscontroller@edit')->name('business.edit');
    Route::get('business/delete/{id}', 'businesscontroller@delete')->name('business.delete');
    Route::post('business/update/{id}', 'businesscontroller@update')->name('business.update');
    Route::get('business/detailview/{id}', 'businesscontroller@detailview')->name('business.detailview');


    Route::get('business/detail', 'BusinessDetailController@businessdetail')->name('businessdetail');


    Route::get('matrimonialData', 'MatrimonialDataController@index')->name('matrimonialdata');




    //tags routes
    Route::get('tags', 'TagsController@index')->name('tags');
    Route::get('tags/create', 'tagscontroller@create')->name('tags.create');
    Route::post('tags/store', 'tagscontroller@store')->name('tags.store');
    Route::get('tags/tagsList', 'tagscontroller@tagslist')->name('datatable.tagslist');
    Route::get('tags/edit/{id}', 'tagscontroller@edit')->name('tags.edit');
    Route::get('tags/delete/{id}', 'tagscontroller@delete')->name('tags.delete');
    Route::post('tags/update/{id}', 'tagscontroller@update')->name('tags.update');



    // Advertisement routes
    Route::get('advertisement', 'AdvertisementController@index')->name('advertisement');
    Route::get('advertisement/create', 'advertisementcontroller@create')->name('advertisement.create');
    Route::post('advertisement/store', 'advertisementcontroller@store')->name('advertisement.store');
    Route::get('advertisement/edit/{id}', 'advertisementcontroller@edit')->name('advertisement.edit');
    Route::post('advertisement/update/{id}', 'advertisementcontroller@update')->name('advertisement.update');
    Route::post('category/autoComplete','AdvertisementController@categoryAutoComplete')->name('categoryAutoComplete');
    Route::get('advertisement/advertisementList', 'advertisementcontroller@advertisementlist')->name('datatable.advertisementlist');
    Route::get('advertisement/delete/{id}', 'advertisementcontroller@delete')->name('advertisement.delete');

    //matrimonial routes
    Route::get('matrimonial', 'MatrimonialController@index')->name('matrimonial');
    Route::get('matrimonial/create', 'matrimonialcontroller@create')->name('matrimonial.create');
    Route::post('matrimonial/store', 'matrimonialcontroller@store')->name('matrimonial.store');
    Route::get('matrimonial/edit/{id}', 'matrimonialcontroller@edit')->name('matrimonial.edit');
    Route::post('matrimonial/update/{id}', 'matrimonialcontroller@update')->name('matrimonial.update');
    Route::get('matrimonial/matrimonialList', 'matrimonialcontroller@matrimoniallist')->name('datatable.matrimoniallist');
    Route::get('matrimonial/delete/{id}', 'matrimonialcontroller@delete')->name('matrimonial.delete');

    // Fourm routes
    Route::get('forum', 'ForumController@index')->name('forum');
    Route::get('forum/create', 'forumcontroller@create')->name('forum.create');
    Route::post('forum/store', 'forumcontroller@store')->name('forum.store');
    Route::get('forum/edit/{id}', 'forumcontroller@edit')->name('forum.edit');
    Route::post('forum/update/{id}', 'forumcontroller@update')->name('forum.update');
    Route::get('forum/forumList', 'forumcontroller@advertisementlist')->name('datatable.forumlist');
    Route::get('forum/delete/{id}', 'forumcontroller@delete')->name('forum.delete');

    //faq routes
    Route::get('faq', 'FaqController@index')->name('faq');
    Route::get('faq/create', 'faqcontroller@create')->name('faq.create');
    Route::post('faq/store', 'faqcontroller@store')->name('faq.store');
    Route::get('faq/edit/{id}', 'faqcontroller@edit')->name('faq.edit');
    Route::post('faq/update/{id}', 'faqcontroller@update')->name('faq.update');
    Route::post('faq/tagAutoComplete','FaqController@tagAutoComplete')->name('faqtagAutoComplete');
    Route::get('faq/faqList', 'faqcontroller@faqlist')->name('datatable.faqlist');
    Route::get('faq/delete/{id}', 'faqcontroller@delete')->name('faq.delete');

    //blog routes
    Route::get('blog', 'BlogController@index')->name('blog');
    Route::get('blog/create', 'blogcontroller@create')->name('blog.create');
    Route::post('blog/store', 'blogcontroller@store')->name('blog.store');
    Route::get('blog/edit/{id}', 'blogcontroller@edit')->name('blog.edit');
    Route::post('blog/update/{id}', 'blogcontroller@update')->name('blog.update');
    Route::get('blog/blogList', 'blogcontroller@bloglist')->name('datatable.bloglist');
    Route::get('blog/delete/{id}', 'blogcontroller@delete')->name('blog.delete');

    //carrier routes
    Route::get('carrier', 'CarrierController@index')->name('carrierDetail');
    Route::post('carrier/store', 'CarrierController@store')->name('carrierStore');
    Route::get('carrier/carrierList', 'CarrierController@carrierList')->name('datatableCarrierlisting');
    Route::get('carrier/edit/{id}', 'CarrierController@edit')->name('carrieEdit');
    Route::get('carrier/delete/{id}', 'CarrierController@delete')->name('carrierdelete');


    //tags forum routes
    Route::get('tagsforum', 'TagsforumController@index')->name('tagsforum');
    Route::get('tagsforum/create', 'tagsforumcontroller@create')->name('tagsforum.create');
    Route::post('tagsforum/store', 'tagsforumcontroller@store')->name('tagsforum.store');
    Route::get('tagsforum/tagsforumList', 'tagsforumcontroller@tagslist')->name('datatable.tagsforumlist');
    Route::get('tagsforum/edit/{id}', 'tagsforumcontroller@edit')->name('tagsforum.edit');
    Route::get('tagsforum/delete/{id}', 'tagsforumcontroller@delete')->name('tagsforum.delete');
    Route::post('tagsforum/update/{id}', 'tagsforumcontroller@update')->name('tagsforum.update');

    //testmonial routes
    Route::get('testmonial', 'TestmonialController@index')->name('testmonial');
    Route::get('testmonial/create', 'testmonialcontroller@create')->name('testmonial.create');
    Route::post('testmonial/store', 'testmonialcontroller@store')->name('testmonial.store');
    Route::get('testmonial/tagsforumList', 'testmonialcontroller@tagslist')->name('datatable.testmoniallist');
    Route::get('testmonial/edit/{id}', 'testmonialcontroller@edit')->name('testmonial.edit');
    Route::get('testmonial/delete/{id}', 'testmonialcontroller@delete')->name('testmonial.delete');
    Route::post('testmonial/update/{id}', 'testmonialcontroller@update')->name('testmonial.update');


    //Legel pages routes
    Route::get('legalpages', 'TestmonialController@index')->name('legalpages');
    Route::get('legalpages/create', 'testmonialcontroller@create')->name('legalpages.create');
    Route::post('legalpages/store', 'testmonialcontroller@store')->name('legalpages.store');
    Route::get('legalpages/tagsforumList', 'testmonialcontroller@tagslist')->name('datatable.legalpageslist');
    Route::get('legalpages/edit/{id}', 'testmonialcontroller@edit')->name('legalpages.edit');
    Route::get('legalpages/delete/{id}', 'testmonialcontroller@delete')->name('legalpages.delete');
    Route::post('legalpages/update/{id}', 'testmonialcontroller@update')->name('legalpages.update');


    //notifications routes
    Route::get('notifications', 'NotificationsController@index')->name('notifications');
    Route::get('notifications/create', 'notificationscontroller@create')->name('notifications.create');
    Route::post('notifications/store', 'notificationscontroller@store')->name('notifications.store');
    Route::get('notifications/notificationsList', 'notificationscontroller@tagslist')->name('datatable.notificationslist');
    Route::get('notifications/edit/{id}', 'notificationscontroller@edit')->name('notifications.edit');
    Route::get('notifications/delete/{id}', 'notificationscontroller@delete')->name('notifications.delete');
    Route::post('notifications/update/{id}', 'notificationscontroller@update')->name('notifications.update');

     //location routes
     Route::get('location', 'LocationController@index')->name('location');
     Route::get('location/create', 'locationcontroller@create')->name('location.create');
     Route::post('location/store', 'locationcontroller@store')->name('location.store');
     Route::get('location/locationList', 'locationcontroller@tagslist')->name('datatable.locationlist');
     Route::get('location/edit/{id}', 'locationcontroller@edit')->name('location.edit');
     Route::get('location/delete/{id}', 'locationcontroller@delete')->name('location.delete');
     Route::post('location/update/{id}', 'locationcontroller@update')->name('location.update');


     Route::get('user/edit/{id}', 'userupdatecontroller@edit')->name('userupdate.edit');
    //  Route::get('user/edit/{id}', 'userupdatecontroller@edit')->name('userupdate.edit');



});

// Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

//     //category routes
//     Route::get('category', 'CategoryController@index')->name('category');
//     Route::get('category/create', 'CategoryController@create')->name('category.create');
//     Route::post('category/store', 'CategoryController@store')->name('category.store');
//     Route::post('category/autoComplete','CategoryController@categoryAutoComplete')->name('categoryAutoComplete');
//     Route::get('category/categoryList', 'CategoryController@categoryList')->name('datatable.categoryList');
//     Route::get('category/edit/{id}', 'CategoryController@edit')->name('category.edit');
//     Route::get('category/delete/{id}', 'CategoryController@delete')->name('category.delete');
//     Route::post('category/update/{id}', 'CategoryController@update')->name('category.update');
//     Route::post('category/getSubCategories', 'CategoryController@getSubCategories')->name('category.getSubCategories');

//     //business routes
//     Route::get('business', 'BusinessController@index')->name('business');
//     Route::get('business/create', 'BusinessController@create')->name('business.create');
//     Route::post('business/store', 'BusinessController@store')->name('business.store');
//     Route::post('business/tagAutoComplete','BusinessController@tagAutoComplete')->name('tagAutoComplete');
//     Route::get('business/businessList', 'BusinessController@businessList')->name('datatable.businessList');
//     Route::get('business/edit/{id}', 'BusinessController@edit')->name('business.edit');
//     Route::get('business/delete/{id}', 'BusinessController@delete')->name('business.delete');
//     Route::post('business/update/{id}', 'BusinessController@update')->name('business.update');
//     Route::get('business/detailview/{id}', 'BusinessController@detailview')->name('business.detailview');

//     //tags routes
//     Route::get('tags', 'TagsController@index')->name('tags');
//     Route::get('tags/create', 'TagsController@create')->name('tags.create');
//     Route::post('tags/store', 'TagsController@store')->name('tags.store');
//     Route::get('tags/tagsList', 'TagsController@tagsList')->name('datatable.tagsList');
//     Route::get('tags/edit/{id}', 'TagsController@edit')->name('tags.edit');
//     Route::get('tags/delete/{id}', 'TagsController@delete')->name('tags.delete');
//     Route::post('tags/update/{id}', 'TagsController@update')->name('tags.update');

//     // Advertisement routes
//     Route::get('advertisement', 'AdvertisementController@index')->name('advertisement');
//     Route::get('advertisement/create', 'AdvertisementController@create')->name('advertisement.create');
//     Route::post('advertisement/store', 'AdvertisementController@store')->name('advertisement.store');
//     Route::get('advertisement/edit/{id}', 'AdvertisementController@edit')->name('advertisement.edit');
//     Route::post('advertisement/update/{id}', 'AdvertisementController@update')->name('advertisement.update');
//     Route::post('category/autoComplete','AdvertisementController@categoryAutoComplete')->name('categoryAutoComplete');
//     Route::get('advertisement/advertisementList', 'AdvertisementController@advertisementlist')->name('datatable.advertisementlist');
//     Route::get('advertisement/delete/{id}', 'AdvertisementController@delete')->name('advertisement.delete');
	
//     // Fourm routes
//     Route::get('forum', 'ForumController@index')->name('forum');
//     Route::get('forum/create', 'forumcontroller@create')->name('forum.create');
//     Route::post('forum/store', 'forumcontroller@store')->name('forum.store');
//     Route::get('forum/edit/{id}', 'forumcontroller@edit')->name('forum.edit');
//     Route::post('forum/update/{id}', 'forumcontroller@update')->name('forum.update');
//     Route::get('forum/forumList', 'forumcontroller@advertisementlist')->name('datatable.forumlist');
//     Route::get('forum/delete/{id}', 'forumcontroller@delete')->name('forum.delete');

//     Route::get('faq', 'FaqController@index')->name('faq');
//     Route::get('faq/create', 'FaqController@create')->name('faq.create');
//     Route::post('faq/store', 'FaqController@store')->name('faq.store');
//     Route::get('faq/edit/{id}', 'FaqController@edit')->name('faq.edit');
//     Route::post('faq/update/{id}', 'FaqController@update')->name('faq.update');
//     Route::post('faq/tagAutoComplete','FaqController@tagAutoComplete')->name('faqtagAutoComplete');
//     Route::get('faq/faqList', 'FaqController@faqlist')->name('datatable.faqlist');
//     Route::get('faq/delete/{id}', 'FaqController@delete')->name('faq.delete');

//     Route::get('blog', 'BlogController@index')->name('blog');
//     Route::get('blog/create', 'BlogController@create')->name('blog.create');
//     Route::post('blog/store', 'BlogController@store')->name('blog.store');
//     Route::get('blog/edit/{id}', 'BlogController@edit')->name('blog.edit');
//     Route::post('blog/update/{id}', 'BlogController@update')->name('blog.update');
//     Route::get('blog/blogList', 'BlogController@bloglist')->name('datatable.bloglist');
//     Route::get('blog/delete/{id}', 'BlogController@delete')->name('blog.delete');

// 	Route::get('matrimonial', 'MatrimonialController@index')->name('matrimonial');
//     Route::get('matrimonial/create', 'MatrimonialController@create')->name('matrimonial.create');
//     Route::post('matrimonial/store', 'MatrimonialController@store')->name('matrimonial.store');
//     Route::get('matrimonial/edit/{id}', 'MatrimonialController@edit')->name('matrimonial.edit');
//     Route::post('matrimonial/update/{id}', 'MatrimonialController@update')->name('matrimonial.update');
//     Route::get('matrimonial/matrimonialList', 'MatrimonialController@matrimoniallist')->name('datatable.matrimoniallist');
//     Route::get('matrimonial/delete/{id}', 'MatrimonialController@delete')->name('matrimonial.delete');
	
// });

//Frontend start here

Route::get('/','HomeController@home')->name('/');
Route::get('/Faqs','HomeController@faqs')->name('Faqs');
Route::get('/contact','HomeController@contact')->name('Contact');
Route::get('/about','HomeController@about')->name('About');
Route::get('/careers','HomeController@careers')->name('Careers');
Route::get('/add/service','HomeController@addservice')->name('Addservice');
Route::get('/add/business','HomeController@addbusiness')->name('Addbusiness');
Route::get('/add/advertisement','HomeController@addadvertisement')->name('Addadvertisement');
Route::get('/blog/detail','HomeController@blogdetail')->name('Blogdetail');
Route::get('/privacy/policy','HomeController@privacypolicy')->name('Privacypolicy');
Route::get('/terms/condition','HomeController@termscondition')->name('Termscondition');
Route::get('/disclaimer','HomeController@disclaimer')->name('Disclaimer');
Route::get('/gdrp/notice','HomeController@gdrpnotice')->name('Gdrpnotice');


//forum
// Route::get('/forumlist','HomeController@forumList')->name('ForumList');
// Route::get('/forumdetail','HomeController@forumdetail')->name('forumdetail');
Route::get('/forumlist','Frontend\ForumController@index')->name('ForumList');
Route::get('/forumdetail','Frontend\ForumController@forumDetails')->name('forumdetail');
Route::post('/save-comments','Frontend\ForumController@saveForumComment')->name('save.comments');
Route::post('/like-dislike','Frontend\ForumController@saveLikeDislike')->name('like-dislike');

//Matrimoney List
Route::get('/matrimoney/list','HomeController@matrimoneyList')->name('MatrimoneyList');
Route::get('/matrimoney/list/grid','HomeController@matrimoneylistGrid')->name('MatrimoneyListgrid');
Route::get('/matrimoney/details','HomeController@matrimoneydetails')->name('Matrimoneydetails');

//Login
Route::get('/login','HomeController@login')->name('Login');
Route::get('/forgot/password','HomeController@forgotpassword')->name('Forgotpassword');
Route::get('signup','HomeController@signup')->name('Signup');

//housing
Route::get('housing/details','HomeController@housingdetails')->name('Housingdetails');
Route::get('housing/listing/list','HomeController@housinglistinglist')->name('HousingListingList');
Route::get('housing/listing/grid','HomeController@housinglistinggrid')->name('HousingListingGrid');

//taxation
Route::get('taxation/details','HomeController@taxationdetails')->name('Taxationdetails');
Route::get('taxation/listing/list','HomeController@taxationlistinglist')->name('TaxationListingList');
Route::get('taxation/listing/grid','HomeController@taxationlistinggrid')->name('TaxationListingGrid');

//education
Route::get('education/details','HomeController@educationdetails')->name('Educationdetails');
Route::get('education/listing/list','HomeController@educationlistinglist')->name('EducationListingList');
Route::get('education/listing/grid','HomeController@educationlistinggrid')->name('EducationListingGrid');

//job
Route::get('job/details','HomeController@jobdetails')->name('Jobdetails');
Route::get('job/listing/list','HomeController@joblistinglist')->name('JobListingList');
Route::get('job/listing/grid','HomeController@joblistinggrid')->name('JobListingGrid');


//transport And Travels
Route::get('tourtravel/details','HomeController@tourtraveldetails')->name('Tourtraveldetails');
Route::get('tourtravel/listing/list','HomeController@tourtravellistinglist')->name('TourtravelListingList');
Route::get('tourtravel/listing/grid','HomeController@tourtravellistinggrid')->name('TourtravelListingGrid');


//event
Route::get('event/details','HomeController@eventdetails')->name('Eventdetails');
Route::get('event/listing/list','HomeController@eventlistinglist')->name('EventListingList');
Route::get('event/listing/grid','HomeController@eventlistinggrid')->name('EventListingGrid');

//entertainment
Route::get('entertainment/details','HomeController@entertainmentdetails')->name('Entertainmentdetails');
Route::get('entertainment/listing/list','HomeController@entertainmentlistinglist')->name('EntertainmentListingList');
Route::get('entertainment/listing/grid','HomeController@entertainmentlistinggrid')->name('EntertainmentListingGrid');