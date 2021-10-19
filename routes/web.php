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

Route::group(['prefix' => 'admin'], function () {

    Route::middleware(['guest'])->group(function () {
        Route::get("/", 'Admin\LoginController@viewlogin')->name('admin.login');
        Route::post('/login', 'Admin\LoginController@authenticate')->name('admin.authenticate');
    });


    // Login Protected Routes
    Route::middleware(['auth','admin'])->group(function () {
        // Admin User Logout
        Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');
        Route::get('/dashboard', 'DashboardController@index')->name('home');
        Route::get('dashboard/forumList', 'DashboardController@forumList')->name('datatable.dashboardForumlist');
        Route::get('dashboard/forum/approve/{id}', 'DashboardController@forumapproveStatus')->name('forumDashboard.approve');
        Route::get('dashboard/testimonialList', 'DashboardController@testimonialList')->name('datatable.dashboardTestimoniallist');
        Route::get('dashboard/advertismentList', 'DashboardController@advertismentList')->name('datatable.dashboardadvertismentListlist');
        Route::get('dashboard/advertisement/approve/{id}', 'DashboardController@advertismentApproveStatus')->name('advertisementDashboard.approve');
        Route::get('dashboard/matrimonialList', 'DashboardController@matrimonialList')->name('datatable.dashboardmatrimoniallist');
        Route::get('dashboard/matrimonial/approve/{id}', 'DashboardController@matrimonialApproveStatus')->name('matrimonialListDashboard.approve');



        //category routes
        Route::get('category', 'CategoryController@index')->name('category');
        Route::get('category/create', 'CategoryController@create')->name('category.create');
        Route::post('category/store', 'CategoryController@store')->name('category.store');
        Route::post('category/autoComplete', 'CategoryController@categoryAutoComplete')->name('categoryAutoComplete');
        Route::get('category/categoryList', 'CategoryController@categoryList')->name('datatable.categoryList');
        Route::get('category/edit/{id}', 'CategoryController@edit')->name('category.edit');
        Route::get('category/delete/{id}', 'CategoryController@delete')->name('category.delete');
        Route::post('category/update/{id}', 'CategoryController@update')->name('category.update');
        Route::post('category/getSubCategories', 'CategoryController@getSubCategories')->name('category.getSubCategories');

        Route::get('subCategoryData/{id}', 'CategoryController@subCategoryData')->middleware('activity')->name('subCategoryList');
        Route::get('subCategoryList', 'CategoryController@subCategoryDataList')->name('subCategoryDataList');



        // Route::get('/{id}', 'CarrierController@deleteData')->name('jobapplydelete');

        Route::get('category/subCategoryList/{id}', 'CategoryController@subCategoryList')->name('category.subcategoryList');
        Route::get('business/datatableList_applicant', 'CategoryController@businessListapplicant')->name('businessListapplicant');



        //business routes
        Route::get('business', 'BusinessController@index')->name('business');
        Route::get('business/create', 'BusinessController@create')->name('business.create');
        Route::post('business/store', 'BusinessController@store')->name('business.store');
        Route::post('business/tagAutoComplete', 'BusinessController@tagAutoComplete')->name('tagAutoComplete');
        Route::post('business/category/autoComplete', 'BusinessController@BusinessCategoryAutoComplete')->name('BusinesscategoryAutoComplete');
        Route::get('business/businessList', 'BusinessController@businessList')->name('datatable.businessList');
        Route::get('business/edit/{id}', 'BusinessController@edit')->name('business.edit');
        Route::get('business/delete/{id}', 'BusinessController@delete')->name('business.delete');
        Route::post('business/update/{id}', 'BusinessController@update')->name('business.update');
        Route::get('business/detailview/{id}', 'BusinessController@detailview')->name('business.detailview');
        Route::get('business/detail/{id}', 'BusinessController@businessdetail')->name('businessdetail');
        Route::get('business/approve/{id}', 'BusinessController@approveStatus')->name('business.approve');
        // business job applicant
        Route::get('business/job/detail/{id}', 'BusinessController@jobDetail')->name('businessJob.detail');
        Route::get('business/job/datatableList/applicant', 'BusinessController@jobapplyListapplicant')->name('businessjobapplyListapplicant');
        Route::get('business/applicantdelete/{id}', 'BusinessController@deleteData')->name('businessJobapplydelete');




        //tags routes
        Route::get('tags', 'TagsController@index')->name('tags');
        Route::get('tags/create', 'TagsController@create')->name('tags.create');
        Route::post('tags/store', 'TagsController@store')->name('tags.store');
        Route::get('tags/tagsList', 'TagsController@tagsList')->name('datatable.tagsList');
        Route::get('tags/edit/{id}', 'TagsController@edit')->name('tags.edit');
        Route::get('tags/delete/{id}', 'TagsController@delete')->name('tags.delete');
        Route::post('tags/update/{id}', 'TagsController@update')->name('tags.update');
        Route::get('tags/approve/{id}', 'TagsController@approveStatus')->name('tags.approve');

        // Advertisement routes
        Route::get('advertisement', 'AdvertisementController@index')->name('advertisement');
        Route::get('advertisement/create', 'AdvertisementController@create')->name('advertisement.create');
        Route::post('advertisement/store', 'AdvertisementController@store')->name('advertisement.store');
        Route::get('advertisement/edit/{id}', 'AdvertisementController@edit')->name('advertisement.edit');
        Route::post('advertisement/update/{id}', 'AdvertisementController@update')->name('advertisement.update');
        Route::post('advertisement/category/autoComplete', 'AdvertisementController@advertiseCategoryAutoComplete')->name('AdcategoryAutoComplete');
        Route::get('advertisement/advertisementList', 'AdvertisementController@advertisementlist')->name('datatable.advertisementlist');
        Route::get('advertisement/delete/{id}', 'AdvertisementController@delete')->name('advertisement.delete');
        Route::get('advertisement/approve/{id}', 'AdvertisementController@approveStatus')->name('advertisement.approve');


        //matrimonial routes
        Route::get('matrimonial', 'MatrimonialController@index')->name('matrimonial');
        Route::get('matrimonial/create', 'MatrimonialController@create')->name('matrimonial.create');
        Route::post('matrimonial/store', 'MatrimonialController@store')->name('matrimonial.store');
        Route::get('matrimonial/edit/{id}', 'MatrimonialController@edit')->name('matrimonial.edit');
        Route::post('matrimonial/update/{id}', 'MatrimonialController@update')->name('matrimonial.update');
        Route::get('matrimonial/matrimonialList', 'MatrimonialController@matrimoniallist')->name('datatable.matrimoniallist');
        Route::get('matrimonial/delete/{id}', 'MatrimonialController@delete')->name('matrimonial.delete');
        Route::get('matrimonial-detail/{id}', 'MatrimonialController@matrimonialDetail')->name('matrimonialdetail');
        Route::get('matrimonial/approve/{id}', 'MatrimonialController@approveStatus')->name('matrimonialdetail.approve');

        // Fourm routes
        Route::get('forum', 'ForumController@index')->name('forum');
        Route::get('forum/create', 'ForumController@create')->name('forum.create');
        Route::post('forum/store', 'ForumController@store')->name('forum.store');
        Route::get('forum/edit/{id}', 'ForumController@edit')->name('forum.edit');
        Route::post('forum/update/{id}', 'ForumController@update')->name('forum.update');
        Route::get('forum/forumList', 'ForumController@forumList')->name('datatable.forumlist');
        Route::get('forum/delete/{id}', 'ForumController@delete')->name('forum.delete');
        Route::get('forum/approve/{id}', 'ForumController@approveStatus')->name('forum.approve');
        Route::get('forum/getcommentreplylist/{id}', 'ForumController@getCommentReplyList')->name('forum.getCommentReplyList');
        Route::post('forum/deleteReply', 'ForumController@deleteReply')->name('forum.deleteReply');
        Route::post('forum/deleteComment', 'ForumController@deleteComment')->name('forum.deleteComment');

        //faq routes
        Route::get('faq', 'FaqController@index')->name('faq');
        Route::get('faq/create', 'FaqController@create')->name('faq.create');
        Route::post('faq/store', 'FaqController@store')->name('faq.store');
        Route::get('faq/edit/{id}', 'FaqController@edit')->name('faq.edit');
        Route::post('faq/update/{id}', 'FaqController@update')->name('faq.update');
        Route::post('faq/tagAutoComplete', 'FaqController@tagAutoComplete')->name('faqtagAutoComplete');
        Route::get('faq/faqList', 'FaqController@faqlist')->name('datatable.faqlist');
        Route::get('faq/delete/{id}', 'FaqController@delete')->name('faq.delete');

        //blog routes
        Route::get('blog', 'BlogController@index')->name('blog');
        Route::get('blog/create', 'BlogController@create')->name('blog.create');
        Route::post('blog/store', 'BlogController@store')->name('blog.store');
        Route::post('blog/category/autoComplete', 'BlogController@blogCategoryAutoComplete')->name('BlogcategoryAutoComplete');
        Route::get('blog/edit/{id}', 'BlogController@edit')->name('blog.edit');
        Route::post('blog/update/{id}', 'BlogController@update')->name('blog.update');
        Route::get('blog/blogList', 'BlogController@bloglist')->name('datatable.bloglist');
        Route::get('blog/delete/{id}', 'BlogController@delete')->name('blog.delete');
        Route::get('blog/getcommentreplylist/{id}', 'BlogController@getCommentReplyList')->name('blog.getCommentReplyList');
        Route::post('blog/deleteReply', 'BlogController@deleteReply')->name('blog.deleteReply');
        Route::post('blog/deleteComment', 'BlogController@deleteComment')->name('blog.deleteComment');



        //carrier routes
        Route::get('carrier', 'CarrierController@index')->name('carrierDetail');
        Route::post('carrier/store', 'CarrierController@store')->name('carrierStore');
        Route::get('carrier/carrierList', 'CarrierController@carrierList')->name('datatableCarrierlisting');
        Route::get('carrier/edit/{id}', 'CarrierController@edit')->name('carrieEdit');
        Route::get('carrier/delete/{id}', 'CarrierController@delete')->name('carrierdelete');
        Route::get('carrier/applicantdelete/{id}', 'CarrierController@deleteData')->name('jobapplydelete');
        Route::get('carrier/detail/{id}', 'CarrierController@jobDetail')->name('job.detail');
        Route::get('job/datatableList_applicant', 'CarrierController@jobapplyListapplicant')->name('jobapplyListapplicant');


        //tags forum routes
        Route::get('tagsforum', 'TagsforumController@index')->name('tagsforum');
        Route::get('tagsforum/create', 'TagsforumController@create')->name('tagsforum.create');
        Route::post('tagsforum/store', 'TagsforumController@store')->name('tagsforum.store');
        Route::get('tagsforum/tagsforumList', 'TagsforumController@tagsforumList')->name('datatable.tagsforumList');
        Route::get('tagsforum/edit/{id}', 'TagsforumController@edit')->name('tagsforum.edit');
        Route::get('tagsforum/delete/{id}', 'TagsforumController@delete')->name('tagsforum.delete');
        Route::post('tagsforum/update/{id}', 'TagsforumController@update')->name('tagsforum.update');
        Route::get('tagsforum/approve/{id}', 'TagsforumController@approveStatus')->name('tagsforum.approve');


        //testmonial routes
        Route::get('testimonial', 'TestimonialController@index')->name('testimonial');
        Route::get('testimonial/create', 'TestimonialController@create')->name('testimonial.create');
        Route::post('testimonial/store', 'TestimonialController@store')->name('testimonial.store');
        Route::get('testimonial/edit/{id}', 'TestimonialController@edit')->name('testimonial.edit');
        Route::post('testimonial/update/{id}', 'TestimonialController@update')->name('testimonial.update');
        Route::get('testimonial/details/{id}', 'TestimonialController@testmonialdetails')->name('testimonial.details');
        Route::get('testimonial/testimonialList', 'TestimonialController@testmonialList')->name('datatable.testimoniallist');
        Route::get('testimonial/delete/{id}', 'TestimonialController@delete')->name('testimonial.delete');


        //Legel pages routes
        Route::get('legalpages', 'LegalPagesController@index')->name('legalpages');
        Route::get('legalpages/legalPagesList', 'LegalPagesController@getLegalPagesList')->name('datatable.legalPagesList');
        Route::get('legalpages/edit/{id}', 'LegalPagesController@edit')->name('legalpages.edit');
        Route::post('legalpages/update/{id}', 'LegalPagesController@update')->name('legalpages.update');


        //notifications routes
        Route::get('notifications', 'NotificationsController@index')->name('notifications');
        Route::get('notifications/create', 'NotificationsController@create')->name('notifications.create');
        Route::post('notifications/store', 'NotificationsController@store')->name('notifications.store');
        Route::get('notifications/notificationsList', 'NotificationsController@tagsList')->name('datatable.notificationsList');
        Route::get('notifications/edit/{id}', 'NotificationsController@edit')->name('notifications.edit');
        Route::get('notifications/delete/{id}', 'NotificationsController@delete')->name('notifications.delete');
        Route::post('notifications/update/{id}', 'NotificationsController@update')->name('notifications.update');

        //location routes
        Route::get('location', 'LocationController@index')->name('location');
        Route::get('location/create', 'LocationController@create')->name('location.create');
        Route::post('location/store', 'LocationController@store')->name('location.store');
        Route::get('location/locationList', 'LocationController@tagsList')->name('datatable.locationList');
        Route::get('location/edit/{id}', 'LocationController@edit')->name('location.edit');
        Route::get('location/delete/{id}', 'LocationController@delete')->name('location.delete');
        Route::post('location/update/{id}', 'LocationController@update')->name('location.update');

        //Country routes
        Route::get('country', 'CountryController@index')->name('country');
        Route::get('country/create', 'CountryController@create')->name('country.create');
        Route::post('country/store', 'CountryController@store')->name('country.store');
        Route::get('country/edit/{id}', 'CountryController@edit')->name('country.edit');
        //  Route::get('country/delete/{id}', 'CountryController@delete')->name('country.delete');
        Route::post('country/update/{id}', 'CountryController@update')->name('country.update');
        Route::get('country/countryList', 'CountryController@countryList')->name('datatable.countryList');

        //city Route
        Route::get('city', 'CityController@index')->name('city');
        Route::get('city/create', 'CityController@create')->name('city.create');
        Route::post('city/store', 'CityController@store')->name('city.store');
        Route::get('city/edit/{id}', 'CityController@edit')->name('city.edit');
        Route::get('city/delete/{id}', 'CityController@delete')->name('city.delete');
        Route::post('city/update/{id}', 'CityController@update')->name('city.update');
        Route::get('city/cityList', 'CityController@cityList')->name('datatable.countryList');
        //Route::get('city/delete/{id}', 'CityController@delete')->name('city.delete');


        //user list
        Route::get('user', 'UserController@index')->name('user');
        Route::get('user/userList', 'UserController@userlist')->name('datatable.userList');
        Route::get('user/userFilter', 'UserController@userfilter')->name('user.filter');
        Route::get('user/delete/{id}', 'UserController@delete')->name('user.delete');
    });
});



//Frontend start here
// Route::get('/','HomeController@home')->name('/');
Route::get('/Faqs', 'HomeController@faqs')->name('Faqs');
Route::get('/contact', 'HomeController@contact')->name('Contact');
Route::get('/about', 'HomeController@about')->name('About');
// Route::get('/careers','HomeController@careers')->name('Careers');
Route::get('/add/service', 'HomeController@addservice')->name('Addservice');
Route::get('/add/business', 'HomeController@addbusiness')->name('Addbusiness');
Route::get('/add/advertisement', 'HomeController@addadvertisement')->name('Addadvertisement');
Route::get('/blog/detail', 'HomeController@blogdetail')->name('Blogdetail');
Route::get('/privacy/policy', 'HomeController@privacypolicy')->name('Privacypolicy');
Route::get('/terms/condition', 'HomeController@termscondition')->name('Termscondition');
Route::get('/disclaimer', 'HomeController@disclaimer')->name('Disclaimer');
Route::get('/gdrp/notice', 'HomeController@gdrpnotice')->name('Gdrpnotice');
Route::get('/impressum', 'HomeController@impressum')->name('impressum');
Route::get('/cookie', 'HomeController@cookie')->name('cookie');



// new developement
Route::namespace('Frontend')->group(function () {

    // forget password
    Route::get('forget-password', 'ForgetPasswordController@showForgetPasswordForm')->name('user.forget.password.get');
    Route::post('forget-password', 'ForgetPasswordController@submitForgetPasswordForm')->name('user.forget.password.post');
    Route::get('reset-password/{token}','ForgetPasswordController@showResetPasswordForm')->name('user.reset.password.get');
    Route::post('reset-password', 'ForgetPasswordController@submitResetPasswordForm')->name('user.reset.password.post');

    // home page
    Route::get('/', 'HomeController@index')->name('/');
    // login
    Route::middleware(['guest'])->group(function () {
        // login
        Route::get('/login', 'LoginController@viewLogin')->name('login');
        Route::post('/authenticate', 'LoginController@loginAuthentication')->name('user.authenticate');

        // register/signup
        Route::get('/register','RegisterController@viewSignUp')->name('user.register');
        Route::post('/register','RegisterController@userRegister')->name('user.register');
    });
    // Login Protected Routes
    Route::middleware(['auth'])->group(function () {
        Route::get('/logout', 'LoginController@logout')->name('user.logout');
    });
    // location set and get all location
    Route::get('getAllLocation','LocationController@getAllLocationData')->name('users.getalllocation');
    Route::post('updatelocation','LocationController@updateLocation')->name('users.updatelocation');

    // forum & comments - likes
    Route::get('/forum', 'ForumController@index')->name('ForumList');
    Route::get('/forum/{slug}', 'ForumController@forumDetails')->name('forumdetail');
    Route::post('/save-comments', 'ForumController@saveForumComment')->name('save.comments');
    Route::post('/like-dislike', 'ForumController@saveLikeDislike')->name('like-dislike');
    Route::post('/comment-replys', 'ForumController@saveCommentReplys')->name('comment.replys');

    // Matrimoney
    Route::group(['prefix' => 'matrimoney'], function () {
        Route::get('/', 'MatrimoneyController@viewMatrimoney')->name('matrimoney');
        Route::get('/{slug}', 'MatrimoneyController@matrimoneyDetails')->name('matrimoney.details');
    });

    // Cateogry list or Details page
    Route::group(['prefix' => 'category'], function () {
        Route::get('/{slug}', 'CategoryController@viewCategoryBusinessList')->name('category.business-list');
        Route::get('/{slug}/{business_slug}', 'HousingController@housingDetails')->name('housing.details');
    });

    //category career details
    Route::group(['prefix' => 'careers'], function () {
        Route::get('/', 'CareerController@careerList')->name('category.career-list');
    });

    // Faq
    Route::group(['prefix' => 'faq'], function () {
        Route::get('/', 'FaqController@faqDetails')->name('faq.details');
    });

    // blogs
    Route::group(['prefix' => 'blog'], function () {
        Route::get('/', 'BlogController@viewBlogList')->name('blog.list');
        Route::get('/{slug}', 'BlogController@viewBlogDetails')->name('blog.detail');
    });
    Route::post('save-blog-comments', 'BlogController@saveBlogComments')->name('save.blog.comments');
    Route::post('user-businessfevourite','HousingController@addUserFavouriteBusiness')->name('user.businessfevourite');

    //Advertisment
    Route::group(['prefix' => 'advertisment'], function () {
        Route::get('/', 'AdvertismentController@index')->name('advertisementsing');
        Route::post('save', 'AdvertismentController@store')->name('advertisements.save');
        Route::post('add/advertisment', 'AdvertismentController@verifyemail')->name('advertisement.verifyemail');

        Route::any('request_otp', 'AdvertismentController@requestOtp')->name('requestOtp');
        Route::post('verify_otp', 'AdvertismentController@verifyOtp')->name('otpverify');
    });
    Route::group(['prefix' => 'business'], function () {
        Route::get('/', 'BusinessController@index')->name('Business');
        Route::get('/sub/category/{id}', 'BusinessController@SubCategoryBusiness')->name('SubCategoryBusiness');
        Route::post('save', 'BusinessController@store')->name('business.save');
        Route::any('request/otp', 'BusinessController@requestOtp')->name('Business.requestOtp');
        Route::post('verify/otp', 'BusinessController@verifyOtp')->name('Business.otpverify');
    });
    Route::get('/service', 'BusinessController@Serviceindex')->name('service');


});
Route::post('getAllSubcategoryData', 'Api\CategoryController@getAllSubcategoryData')->name('getAllSubcategoryData');

//forum
// Route::get('/forumlist','HomeController@forumList')->name('ForumList');
// Route::get('/forumdetail','HomeController@forumdetail')->name('forumdetail');

//Matrimoney List
Route::get('/matrimoney/list', 'HomeController@matrimoneyList')->name('MatrimoneyList');
Route::get('/matrimoney/list/grid', 'HomeController@matrimoneylistGrid')->name('MatrimoneyListgrid');
Route::get('/matrimoney/details', 'HomeController@matrimoneydetails')->name('Matrimoneydetails');

//Login
// Route::get('/login','HomeController@login')->name('Login');
Route::get('/forgot/password', 'HomeController@forgotpassword')->name('Forgotpassword');
Route::get('signup', 'HomeController@signup')->name('Signup');

// //housing
Route::get('housing/details', 'HomeController@housingdetails')->name('Housingdetails');
Route::get('housing/listing/list', 'HomeController@housinglistinglist')->name('HousingListingList');
Route::get('housing/listing/grid', 'HomeController@housinglistinggrid')->name('HousingListingGrid');

//taxation
Route::get('taxation/details', 'HomeController@taxationdetails')->name('Taxationdetails');
Route::get('taxation/listing/list', 'HomeController@taxationlistinglist')->name('TaxationListingList');
Route::get('taxation/listing/grid', 'HomeController@taxationlistinggrid')->name('TaxationListingGrid');

//education
Route::get('education/details', 'HomeController@educationdetails')->name('Educationdetails');
Route::get('education/listing/list', 'HomeController@educationlistinglist')->name('EducationListingList');
Route::get('education/listing/grid', 'HomeController@educationlistinggrid')->name('EducationListingGrid');

//job
Route::get('job/details', 'HomeController@jobdetails')->name('Jobdetails');
Route::get('job/listing/list', 'HomeController@joblistinglist')->name('JobListingList');
Route::get('job/listing/grid', 'HomeController@joblistinggrid')->name('JobListingGrid');


//transport And Travels
Route::get('tourtravel/details', 'HomeController@tourtraveldetails')->name('Tourtraveldetails');
Route::get('tourtravel/listing/list', 'HomeController@tourtravellistinglist')->name('TourtravelListingList');
Route::get('tourtravel/listing/grid', 'HomeController@tourtravellistinggrid')->name('TourtravelListingGrid');


//event
Route::get('event/details', 'HomeController@eventdetails')->name('Eventdetails');
Route::get('event/listing/list', 'HomeController@eventlistinglist')->name('EventListingList');
Route::get('event/listing/grid', 'HomeController@eventlistinggrid')->name('EventListingGrid');

//entertainment
Route::get('entertainment/details', 'HomeController@entertainmentdetails')->name('Entertainmentdetails');
Route::get('entertainment/listing/list', 'HomeController@entertainmentlistinglist')->name('EntertainmentListingList');
Route::get('entertainment/listing/grid', 'HomeController@entertainmentlistinggrid')->name('EntertainmentListingGrid');




