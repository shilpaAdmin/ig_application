@extends('frontend.layouts.master')
@section('title') Entertainment - Details @endsection
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
                            <div class="listings_details_main_image_box__img height_fixed_ent_detail">
                                <img src="{{ URL::asset('assets/frontend/images/listings/endD1.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <!--Listings Details Main Image Box Single-->
                        <div class="listings_details_main_image_box_single">
                            <div class="listings_details_main_image_box__img height_fixed_ent_detail">
                                <img src="{{ URL::asset('assets/frontend/images/listings/endD2.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <!--Listings Details Main Image Box Single-->
                        <div class="listings_details_main_image_box_single">
                            <div class="listings_details_main_image_box__img height_fixed_ent_detail">
                                <img src="{{ URL::asset('assets/frontend/images/listings/endD3.jpg')}}" alt="">
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
                                    <span> <i class="fas fa-user-tie"></i> </span>
                                </div>
                            </div>
                            <div class="main_bottom_left_title">
                                <h4>Inception<i class="fa fa-check"></i></h4>
                            </div>
                            <small> <i class="fas fa-map-marker-alt"></i> Friedrischat-palast Cinema </small> <br>
                            <small class="d-inline-block"> Action , Thriller </small> &nbsp; | &nbsp;<small
                                class="d-inline-block"> 1hr 54min </small>

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
                                <div class="badge-pill badge-success d-inline-block mb-3 mr-3"> 2D </div>
                                <div class="badge-pill badge-success d-inline-block mb-3 mr-3"> 3D </div>
                            </div>

                            <ul class="list-unstyled">
                                <li>In Cinemas <span> May 3, 2021</span></li>
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


                                <div class="badge-pill badge-cast d-inline-block mb-3 mr-3"> English </div>
                                <div class="badge-pill badge-cast d-inline-block mb-3 mr-3"> Hindi </div>
                                <div class="badge-pill badge-cast d-inline-block mb-3 mr-3"> Telugu </div>
                                <div class="badge-pill badge-cast d-inline-block mb-3 mr-3"> Tamil </div>


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

                            <div class="listings_details_text">
                                <h3 class="mb-3">Cast</h3>
                                <div class="house_detaill_main clearfix">
                                    <div class="house_detaill text-center mb-5">
                                        <div> <img src="{{ URL::asset('assets/frontend/images/listings/cast1.jpg')}}" class="cast_imgs" alt="">
                                        </div>
                                        <div class="house_desc">Turner donnell</div>
                                        <p>as Ed Warren</p>
                                    </div>
                                    <div class="house_detaill text-center mb-5">
                                        <div><img src="{{ URL::asset('assets/frontend/images/listings/cast2.jpg')}}" class="cast_imgs" alt="">
                                        </div>
                                        <div class="house_desc">Turner donnell</div>
                                        <p>as Ed Warren</p>
                                    </div>

                                    <div class="house_detaill text-center mb-5">
                                        <div> <img src="{{ URL::asset('assets/frontend/images/listings/cast3.jpg')}}" class="cast_imgs" alt="">
                                        </div>
                                        <div class="house_desc">Turner donnell</div>
                                        <p>as Ed Warren</p>
                                    </div>

                                    <div class="house_detaill text-center mb-5">
                                        <div> <img src="{{ URL::asset('assets/frontend/images/listings/cast4.jpg')}}" class="cast_imgs" alt="">
                                        </div>
                                        <div class="house_desc">Turner donnell</div>
                                        <p>as Ed Warren</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="listings_details_sidebar">

                            <div class="listings_details_sidebar__single additional_info">
                                <h3 class="listings_details_sidebar__title">More Details</h3>
                                <div class="additional_info_details">
                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i>Lorem, ipsum dolor.</p>
                                        </div>
                                    </div>
                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i>Lorem ipsum dolor sit, amet.</p>
                                        </div>
                                    </div>
                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i>Lorem, ipsum dolor sit.</p>
                                        </div>
                                    </div>
                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i>Lorem, ipsum, dolor. </p>
                                        </div>
                                    </div>
                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i>Lorem ipsum dolor sit, amet.</p>
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
                        <h4>Similar&nbsp;Movies</h4>
                    </div>
                    <div class="col-6 text-right"> <a href="#" class="link-simple"> View All </a> </div>
                </div>




                <div class="row">
                    <div class="col-xl-6 col-md-12 col-sm-12">
                        <div class="listings_two_page_content joblist_shadow">
                            <!--listings Two Page Single-->
                            <div class="listings_two_page_single overflow-y__hidden">
                                <div class="listings_two_page_img">
                                    <img src="{{ URL::asset('assets/frontend/images/listings/ent3.jpg')}}" alt="">

                                    <div class="heart_icon">
                                        <i class="icon-heart"></i>
                                    </div>
                                </div>
                                <div class="listings_three-page_content pt-3">
                                    <div class="title">
                                        <h3><a href="{{route('Entertainmentdetails')}}">Monster Hunter</a> </h3>

                                        <p class="mb-0"> <i class="fas fa-tags"></i> Romance , Comedy </p>
                                        <p class="mb-0"> <i class="far fa-thumbs-up"></i> 3.57k Likes </p>
                                    </div>
                                    <ul class="list-unstyled listings_three-page_contact_info">
                                        <li> <a class="job_list_pill" href="#"> EN / DE </a> </li>
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
                                    <img src="{{ URL::asset('assets/frontend/images/listings/ent3.jpg')}}" alt="">

                                    <div class="heart_icon">
                                        <i class="icon-heart"></i>
                                    </div>
                                </div>
                                <div class="listings_three-page_content pt-3">
                                    <div class="title">
                                        <h3><a href="{{route('Entertainmentdetails')}}">Monster Hunter</a> </h3>

                                        <p class="mb-0"> <i class="fas fa-tags"></i> Romance , Comedy </p>
                                        <p class="mb-0"> <i class="far fa-thumbs-up"></i> 3.57k Likes </p>
                                    </div>
                                    <ul class="list-unstyled listings_three-page_contact_info">
                                        <li> <a class="job_list_pill" href="#"> EN / DE </a> </li>
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
        </section>

    </div><!-- /.page-wrapper -->

</body>
</html>
@endsection
