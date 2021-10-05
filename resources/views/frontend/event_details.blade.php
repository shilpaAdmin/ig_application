@extends('frontend.layouts.master')
@section('title') Event - Details @endsection
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
                                <img src="{{ URL::asset('assets/frontend/images/listings/event-1.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <!--Listings Details Main Image Box Single-->
                        <div class="listings_details_main_image_box_single">
                            <div class="listings_details_main_image_box__img height_fixed_ent_detail">
                                <img src="{{ URL::asset('assets/frontend/images/listings/event-2.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <!--Listings Details Main Image Box Single-->
                        <div class="listings_details_main_image_box_single">
                            <div class="listings_details_main_image_box__img height_fixed_ent_detail">
                                <img src="{{ URL::asset('assets/frontend/images/listings/event-3.jpg')}}" alt="">
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
                                    <span> <i class="fas fa-glass-cheers"></i></span>
                                </div>
                            </div>
                            <div class="main_bottom_left_title">
                                <h4>CA After party<i class="fa fa-check"></i></h4>
                            </div>
                            <small> <i class="fas fa-calendar-week"></i> January 1 , 2022</small> <br>
                            <small> <i class="far fa-clock"></i> Monday : 10AM to 7PM </small>

                            <div class="main_bottom_rating_time">


                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6">
                        <div class="main_bottom_right">

                            <div class="main_bottom_right_Buttons">
                                <a href="#">Register Now</a>
                            </div>

                            <ul class="list-unstyled">
                                <li>Eligibility <span> 16 Years +</span></li>
                                <li><a href="#">Add to Wishlist<i class="far fa-heart"></i></a></li>
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


                                <div class="badge-pill badge-cast d-inline-block mb-3 mr-3"> $ 5000 - Inclusive of all
                                    taxes </div>



                                <p class="first_text mb-0">Aliquam lorem ante, dapibus in, viverra quis, feugiat a,
                                    tellus.
                                    Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Etiam ultricies
                                    nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus.
                                    Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet
                                    adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar,
                                    hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien
                                    ut libero venenatis faucibus. </p>

                                <p class="first_text mb-0">Aliquam lorem ante, dapibus in, viverra quis, feugiat a,
                                    tellus.
                                    Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Etiam ultricies
                                    nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus.
                                    Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet
                                    adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar,
                                    hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien
                                    ut libero venenatis faucibus. </p>

                            </div>



                            <div class="listings_details_features my-5 pb-5">
                                <div class="listings_details_features_title ">
                                    <h3 class="mb-3">Terms & Conditions</h3>
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
                        <div class="listings_details_sidebar">

                            <div class="listings_details_sidebar__single additional_info">
                                <h3 class="listings_details_sidebar__title">Artist Details</h3>
                                <div class="additional_info_details">
                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i>Artist Name</p>
                                        </div>
                                    </div>
                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i>Artist Name ywo</p>
                                        </div>
                                    </div>
                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i>Artist Name three</p>
                                        </div>
                                    </div>
                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i>Artist Name four </p>
                                        </div>
                                    </div>
                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i>Artist Name five</p>
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
                        <h4>Similar&nbsp;Events</h4>
                    </div>
                    <div class="col-6 text-right"> <a href="{{route('EventListingList')}}" class="link-simple"> View All
                        </a> </div>
                </div>


                <div class="row">
                    <div class="col-xl-6 col-md-12 col-sm-12">
                        <div class="listings_two_page_content joblist_shadow">
                            <!--listings Two Page Single-->
                            <div class="listings_two_page_single overflow-y__hidden">
                                <div class="listings_two_page_img">
                                    <img src="{{ URL::asset('assets/frontend/images/listings/event-list2.jpg')}}" alt="">
                                    <div class="tag__promoted"> Promoted </div>
                                    <div class="heart_icon">
                                        <i class="icon-heart"></i>
                                    </div>
                                </div>
                                <div class="listings_three-page_content pt-3">
                                    <div class="title">
                                        <h3><a href="{{route('Eventdetails')}}"> CA After Party<span
                                                    class="fa fa-check"></span></a></h3>

                                        <p class="mb-0">Halvorson , Adrienview 73379</p>
                                    </div>
                                    <ul class="list-unstyled listings_three-page_contact_info">
                                        <li class="d-inline-block"><a class="job_list_pill" href="#"> Music</a></li>
                                        <li class="d-inline-block"><a class="job_list_pill" href="#"> $5000
                                                Onwards</a></li>
                                        <li class="d-inline-block"><a class="job_list_pill" href="#"> Streaming
                                                Online</a></li>
                                    </ul>
                                    <div class="listings_three-page_content_bottom">
                                        <div class="left">
                                            <h6>Jan 1, 2022</h6>
                                        </div>
                                        <div>
                                            <a href="#" class="enqurebtnbox hvr-shutter-in-vertical">Register Now</a>
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
                                    <img src="{{ URL::asset('assets/frontend/images/listings/event-list2.jpg')}}" alt="">
                                    <div class="tag__promoted"> Promoted </div>
                                    <div class="heart_icon">
                                        <i class="icon-heart"></i>
                                    </div>
                                </div>
                                <div class="listings_three-page_content pt-3">
                                    <div class="title">
                                        <h3><a href="{{route('Eventdetails')}}"> CA After Party<span
                                                    class="fa fa-check"></span></a></h3>

                                        <p class="mb-0">Halvorson , Adrienview 73379</p>
                                    </div>
                                    <ul class="list-unstyled listings_three-page_contact_info">
                                        <li class="d-inline-block"><a class="job_list_pill" href="#"> Music</a></li>
                                        <li class="d-inline-block"><a class="job_list_pill" href="#"> $5000
                                                Onwards</a></li>
                                        <li class="d-inline-block"><a class="job_list_pill" href="#"> Streaming
                                                Online</a></li>
                                    </ul>
                                    <div class="listings_three-page_content_bottom">
                                        <div class="left">
                                            <h6>Jan 1, 2022</h6>
                                        </div>
                                        <div>
                                            <a href="#" class="enqurebtnbox hvr-shutter-in-vertical">Register Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>
    </div><!-- /.page-wrapper -->
</body>
</html>
@endsection
