@extends('frontend.layouts.master')
@section('title') Housing Details @endsection
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
                            <div class="listings_details_main_image_box__img">
                                <img src="{{ URL::asset('assets/frontend/images/img/h3.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <!--Listings Details Main Image Box Single-->
                        <div class="listings_details_main_image_box_single">
                            <div class="listings_details_main_image_box__img">
                                <img src="{{ URL::asset('assets/frontend/images/img/h4.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <!--Listings Details Main Image Box Single-->
                        <div class="listings_details_main_image_box_single">
                            <div class="listings_details_main_image_box__img">
                                <img src="{{ URL::asset('assets/frontend/images/img/h5.jpg')}}" alt="">
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
                                    <span> <i class="fas fa-home"></i></span>
                                </div>
                            </div>
                            <div class="main_bottom_left_title">
                                <h4>Shalind Empire Evok<i class="fa fa-check"></i></h4>
                                <small>Halvorson, Adrienview 73379 </small>

                            </div>
                            <div class="main_bottom_rating_time">

                                <div class="main_bottom_time">
                                    <p><span class="far fa-clock"></span>Posted 18 hours ago</p>
                                </div>
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
                                <a href="#">Enquire Now</a>

                            </div>

                            <ul class="list-unstyled">
                                <li>Starting Price<span>$30.05L</span></li>
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
                                <h3 class="mb-3">Unit Options</h3>
                                <div>
                                    <button type="button" class="btn btnunit">2 BHK Appartment</button>
                                    <button type="button" class="btn btnunit">3 BHK Appartment</button>
                                    <button type="button" class="btn btnunit">4 BHK Appartment</button>
                                </div>

                                <div class="house_detaill_main clearfix">
                                    <div class="house_detaill">
                                        <div> <i class="fas fa-home"></i> </div>
                                        <p> Starting Price </p>
                                        <div class="house_desc">$ 30.05 L</div>
                                        <p>Onward</p>
                                    </div>
                                    <div class="house_detaill">
                                        <div> <i class="fas fa-vector-square"></i> </div>
                                        <p> Carpet Area </p>
                                        <div class="house_desc">786.1 - 821.05 sq.ft</div>
                                        <p>(72.94 - 75.45 sq.m.)</p>
                                    </div>

                                </div>
                            </div>

                            <div class="listings_details_text">
                                <h3 class="mb-3">Description</h3>

                                <p class="first_text mb-0">Aliquam lorem ante, dapibus in, viverra quis, feugiat a,
                                    tellus.
                                    Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Etiam ultricies
                                    nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus.
                                    Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet
                                    adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar,
                                    hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien
                                    ut libero venenatis faucibus. </p>

                            </div>
                            <div class="listings_details_features border-bottom-0">
                                <div class="listings_details_features_title">
                                    <h3 class="mb-3">Facilities</h3>
                                </div>
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4">
                                        <ul class="listings_details_features_list list-unstyled">
                                            <li>
                                                <div class="listings_details_icon">
                                                    <span><i class="fas fa-utensils"></i></span>
                                                </div>
                                                <div class="listings_details_content">
                                                    <p>Kitchen</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="listings_details_icon">
                                                    <span><i class="fas fa-toilet"></i></span>
                                                </div>
                                                <div class="listings_details_content">
                                                    <p>Bathroom</p>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="col-xl-4 col-lg-4">
                                        <ul class="listings_details_features_list list-unstyled">
                                            <li>
                                                <div class="listings_details_icon">
                                                    <span><i class="fas fa-bed"></i></span>
                                                </div>
                                                <div class="listings_details_content">
                                                    <p>Bedroom</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="listings_details_icon">
                                                    <span><i class="fas fa-car"></i></span>
                                                </div>
                                                <div class="listings_details_content">
                                                    <p>Parking</p>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="col-xl-4 col-lg-4">
                                        <ul class="listings_details_features_list list-unstyled">
                                            <li>
                                                <div class="listings_details_icon">
                                                    <span class="icon-group"></span>
                                                </div>
                                                <div class="listings_details_content">
                                                    <p>Group Visits</p>
                                                </div>
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
                                <h3 class="listings_details_sidebar__title">Additional info</h3>
                                <div class="additional_info_details">
                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i>$100 Monthly Maintenance</p>
                                        </div>
                                    </div>
                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i>24/7 Power Backup</p>
                                        </div>
                                    </div>
                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i>Fully Furnished Appartments</p>
                                        </div>
                                    </div>
                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i>Covered car Parking</p>
                                        </div>
                                    </div>
                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i>Play Ground</p>
                                        </div>
                                    </div>
                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i>Wooden Flooring</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="listings_details_sidebar__single contact_business">
                                <h3 class="listings_details_sidebar__title">Contact Business</h3>
                                <div class="contact_business_details">
                                    <input type="text" placeholder="Your name" name="name">
                                    <input type="email" placeholder="Email address" name="email">
                                    <input type="text" placeholder="Contact Number" name="contact">
                                    <a href="#" class="thm-btn contact_business_btn">Send message</a>
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
                        <h4>Similar&nbsp;Properties</h4>
                    </div>
                    <div class="col-6 text-right"> <a href="#" class="link-simple"> View All </a> </div>
                </div>




                <div class="row">
                    <div class="col-xl-6 col-md-12 col-sm-12">
                        <div class="listings_two_page_content">
                            <!--listings Two Page Single-->
                            <div class="listings_two_page_single">
                                <div class="listings_two_page_img">
                                    <img src="{{ URL::asset('assets/frontend/images/img/listimghousing.png')}}" alt="">

                                    <div class="heart_icon">
                                        <i class="icon-heart"></i>
                                    </div>
                                </div>
                                <div class="listings_three-page_contentt">
                                    <div class="title">
                                        <h3><a href="housing-listing-grid.html">Luxoise Apartments<span
                                                    class="fa fa-check"></span></a></h3>
                                        <p>Halvorson , Adrienview 73379</p>
                                    </div>
                                    <ul class="list-unstyled listings_three-page_contact_info">
                                        <li><i class="fas fa-map-marker-alt"></i>4.5 km Away from you</li>
                                        <li><a href="#"><i class="fab fa-xing-square"></i>785.1 - 812.05 sq.ft.
                                                onwards</a></li>
                                    </ul>
                                    <div class="listings_three-page_content_bottom">
                                        <div class="left">
                                            <h6>2 months ago</h6>
                                        </div>
                                        <div>
                                            <a href="#" class="enqurebtnbox hvr-shutter-in-vertical">Enquire Now</a>
                                            <a href="#"><i class="fas fa-phone-alt callbtnbox"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-xl-6 col-md-12 col-sm-12">
                        <div class="listings_two_page_content">
                            <!--listings Two Page Single-->
                            <div class="listings_two_page_single">
                                <div class="listings_two_page_img">
                                    <img src="{{ URL::asset('assets/frontend/images/img/listimghousing.png')}}" alt="">

                                    <div class="heart_icon">
                                        <i class="icon-heart"></i>
                                    </div>
                                </div>
                                <div class="listings_three-page_contentt">
                                    <div class="title">
                                        <h3><a href="housing-listing-grid.html">Luxoise Apartments<span
                                                    class="fa fa-check"></span></a></h3>
                                        <p>Halvorson , Adrienview 73379</p>
                                    </div>
                                    <ul class="list-unstyled listings_three-page_contact_info">
                                        <li><i class="fas fa-map-marker-alt"></i>4.5 km Away from you</li>
                                        <li><a href="#"><i class="fab fa-xing-square"></i>785.1 - 812.05 sq.ft.
                                                onwards</a></li>
                                    </ul>
                                    <div class="listings_three-page_content_bottom">
                                        <div class="left">
                                            <h6>2 months ago</h6>
                                        </div>
                                        <div>
                                            <a href="#" class="enqurebtnbox hvr-shutter-in-vertical">Enquire Now</a>
                                            <a href="#"><i class="fas fa-phone-alt callbtnbox"></i></a>
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
