@extends('frontend.layouts.master')
@section('title') Matrimoney Details @endsection
@section('content')
<!DOCTYPE html>
<html lang="en">
<body>


    <div class="preloader">
        <img src="{{ URL::asset('assets/frontend/images/loader.png')}}" class="preloader__image" alt="">
    </div><!-- /.preloader -->

    <div class="page-wrapper">

        <!-- Listings Details Main Image Box Start-->
        <section class="listings_details_main_image_box">
            <div class="container-full-width">
                <div class="thm__owl-carousel owl-carousel owl-theme" data-options='{"margin":3, "loop": true, "smartSpeed": 700, "autoplay": true, "autoplayHoverPause": true, "autoplayTimeout": 5000, "items": 3,"responsive": {
                    "0": {
                        "items": 1
                    },
                    "480": {
                        "items": 2
                    },
                    "992": {
                        "items": 3
                    }
                }}'>
                    <div class="item">
                        <!--Listings Details Main Image Box Single-->
                        <div class="listings_details_main_image_box_single">
                            <div class="listings_details_main_image_box__img height_fixed_matrimoney_detail">
                                <img src="{{ URL::asset('assets/frontend/images/listings/mat-1.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <!--Listings Details Main Image Box Single-->
                        <div class="listings_details_main_image_box_single">
                            <div class="listings_details_main_image_box__img height_fixed_matrimoney_detail">
                                <img src="{{ URL::asset('assets/frontend/images/listings/mat-2.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <!--Listings Details Main Image Box Single-->
                        <div class="listings_details_main_image_box_single">
                            <div class="listings_details_main_image_box__img height_fixed_matrimoney_detail">
                                <img src="{{ URL::asset('assets/frontend/images/listings/mat-3.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--Main Bottom Start-->
        <section class="main_bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="main_bottom_left">
                            <div class="main_bottom_content">

                                <div class="icon">
                                    <span> <i class="fas fa-heartbeat"></i> </span>
                                </div>
                            </div>
                            <div class="main_bottom_left_title">
                                <h4>Macejkovic Eliane <small class="text_green">Online Now</small> <i
                                        class="fa fa-check"></i></h4>
                            </div>
                            <small> <i class="fas fa-map-marker-alt"></i> Charlie Ford New Connorborough 80088 </small>
                            <br>
                            <small> 23 years Old </small>

                            <div class="main_bottom_rating_time">


                            </div>
                        </div>
                    </div>
                    <!--  <div class="col-xl-4 col-lg-4 seconboxlisd">
                        <div class="main_bottom_left_titlet">
                            <h4>Unit options</h4>
                        </div>
                        <button type="button" class="btn btnunit">2 BHK Appartment</button>
                        <button type="button" class="btn btnunit">3 BHK Appartment</button>
                        <button type="button" class="btn btnunit">4 BHK Appartment</button>
                        <button type="button" class="btn btnunit">5 BHK Appartment</button>
                    </div> -->
                    <div class="col-xl-6 col-lg-6">
                        <div class="main_bottom_right">

                            <div class="main_bottom_right_Buttons">
                                <a href="#">Connect Now</a>
                            </div>

                            <ul class="list-unstyled">
                                <li>Highest Education: Master in Computer Science</li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Listings Details Start-->
        <section class="listings_details">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8">
                        <div class="listings_details_left">


                            <div class="listings_details_text">
                                <h3 class="mb-3">About</h3>



                                <p class="first_text mb-0">Aliquam lorem ante, dapibus in, viverra quis, feugiat a,
                                    tellus.
                                    Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Etiam ultricies
                                    nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus.
                                    Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet
                                    adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar,
                                    hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien
                                    ut libero venenatis faucibus. </p>
                            </div>

                            <div class="listings_details_text">
                                <h3 class="mb-3">Education</h3>


                                <div class="mat_eduDetails">
                                    <p class="first_text mb-0 pl-5"> <big>Master in computer Science</big> <br>
                                        Lorem ipsum dolor, sit, amet consectetur adipisicing elit. Doloribus, facilis?
                                    </p>

                                    <p class="first_text pl-5"><big>Bachlor in computer Science</big> <br> Nam quam
                                        nunc, blandit vel, luctus pulvinar,
                                        hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae
                                        sapien
                                        ut libero venenatis faucibus. </p>

                                </div>

                            </div>


                            <div class="listings_details_features my-5 pb-5">
                                <div class="listings_details_features_title">
                                    <h3 class="mb-3">What she is Looking for</h3>
                                </div>
                                <div class="row">

                                    <div class="col-lg-12">
                                        <ul class="listings_details_features_list">
                                            <li class="job_li_icon">Lorem ipsum dolor sit amet consectetur,
                                                adipisicing elit. Reiciendis, recusandae. adipisicing elit. Reiciendis,
                                                recusandae.
                                            </li>
                                            <li class="job_li_icon">Lorem, ipsum dolor sit amet consectetur
                                                adipisicing elit. Nostrum quasi harum voluptates, eveniet cupiditate sed
                                                sit nobis rerum et corrupti.
                                            </li>
                                            <li class="job_li_icon">Lorem ipsum dolor sit amet consectetur,
                                                adipisicing elit. Reiciendis, recusandae. adipisicing elit. Reiciendis,
                                                recusandae.
                                            </li>
                                            <li class="job_li_icon">Lorem, ipsum dolor sit amet consectetur
                                                adipisicing elit. Nostrum quasi harum voluptates, eveniet cupiditate sed
                                                sit nobis rerum et corrupti.
                                            </li>


                                        </ul>
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="listings_details_sidebar mb-5">

                            <div class="listings_details_sidebar__single additional_info">
                                <h3 class="listings_details_sidebar__title">More Details</h3>
                                <div class="additional_info_details">
                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i>23 year Old</p>
                                        </div>
                                    </div>
                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i> 5'5" Height </p>
                                        </div>
                                    </div>

                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i> Never Married </p>
                                        </div>
                                    </div>

                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i> From Hindu Community </p>
                                        </div>
                                    </div>

                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i> Mother toung Gujarati </p>
                                        </div>
                                    </div>

                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i> Living in USA </p>
                                        </div>
                                    </div>

                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i> Earns USD 60,000 annually </p>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="listings_details_sidebar">

                            <div class="listings_details_sidebar__single additional_info">
                                <h3 class="listings_details_sidebar__title">Contact Details</h3>
                                <div class="additional_info_details">
                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i>+91 9999985835</p>
                                        </div>
                                    </div>
                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i>johnston@gmail.com</p>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="mt-5 mb-5">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-6">
                        <h4>Similar&nbsp;Matches</h4>
                    </div>
                    <div class="col-6 text-right"> <a href="matrimoney-listing-list.html" class="link-simple"> View
                            All </a> </div>
                </div>

                <div class="row">
                    <div class="col-xl-6 col-md-12 col-sm-12">
                        <div class="listings_two_page_content joblist_shadow">
                            <!--listings Two Page Single-->
                            <div class="listings_two_page_single overflow-y__hidden">
                                <div class="listings_two_page_img">
                                    <img src="{{ URL::asset('assets/frontend/images/listings/mat1.jpg')}}" alt="">

                                    <div class="heart_icon">
                                        <i class="icon-heart"></i>
                                    </div>
                                </div>
                                <div class="listings_three-page_content pt-3">
                                    <div class="title">
                                        <h3><a href="matrimoney-details.html">Christopher Williams</a> </h3>
                                        <small>1 Day ago</small>
                                        <p class="mb-0"> <i class="fas fa-map-marker-alt"></i> New York </p>
                                    </div>
                                    <ul class="list-unstyled listings_three-page_contact_info">
                                        <li> <i class="fas fa-circle font_small10"></i> 26 year old, 5'7" height </li>
                                        <li> <i class="fas fa-circle font_small10"></i> Hindu Patel </li>
                                        <li> <i class="fas fa-circle font_small10"></i> Software Engineer </li>
                                    </ul>
                                    <div class="listings_three-page_content_bottom">
                                        <div class="left">

                                        </div>
                                        <div>
                                            <a href="#" class="enqurebtnbox hvr-shutter-in-vertical">View Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-md-12 col-sm-12">
                        <div class="listings_two_page_content joblist_shadow">
                            <!--listings Two Page Single-->
                            <div class="listings_two_page_single overflow-y__hidden">
                                <div class="listings_two_page_img">
                                    <img src="{{ URL::asset('assets/frontend/images/listings/mat1.jpg')}}" alt="">

                                    <div class="heart_icon">
                                        <i class="icon-heart"></i>
                                    </div>
                                </div>
                                <div class="listings_three-page_content pt-3">
                                    <div class="title">
                                        <h3><a href="matrimoney-details.html">Christopher Williams</a> </h3>
                                        <small>1 Day ago</small>
                                        <p class="mb-0"> <i class="fas fa-map-marker-alt"></i> New York </p>
                                    </div>
                                    <ul class="list-unstyled listings_three-page_contact_info">
                                        <li> <i class="fas fa-circle font_small10"></i> 26 year old, 5'7" height </li>
                                        <li> <i class="fas fa-circle font_small10"></i> Hindu Patel </li>
                                        <li> <i class="fas fa-circle font_small10"></i> Software Engineer </li>
                                    </ul>
                                    <div class="listings_three-page_content_bottom">
                                        <div class="left">

                                        </div>
                                        <div>
                                            <a href="#" class="enqurebtnbox hvr-shutter-in-vertical">View Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>    </div><!-- /.page-wrapper -->
</body>
</html>
@endsection
