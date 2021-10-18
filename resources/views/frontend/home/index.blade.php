@extends('frontend.layouts.master')
@section('title') Homepage @endsection
@section('content')

    <!-- Modal listing-->
    <div class="preloader">
        <img src="{{ URL::asset('assets/frontend/images/loader.png') }}" class="preloader__image" alt="">
    </div>
    <!--/.preloader -->

    <div class="page-wrapper">

        <!-- Banner Section One Start -->
        <section class="banner-one">
            <div class="banner-bg-slide"
                data-options='{ "delay": 5000, "slides": [ { "src": "{{ URL::asset('assets/frontend/images/main-slider/slide_v1_1.jpg') }}" }, { "src": "{{ URL::asset('assets/frontend/images/main-slider/slide_v1_2.jpg') }}" }, { "src": "{{ URL::asset('assets/frontend/images/main-slider/slide_v1_1.jpg') }}" } ], "transition": "fade", "timer": false, "align": "top" }'>
            </div><!-- /.banner-bg-slide -->

            <div class="container">
                <!-- <div class="content-box">
                               <div class="top-title">
                                  <div class="sub-title">Let�s Explore</div>
                                  <h1>your amazing city</h1>
                                  <p>Find great places to stay, eat, shop, or visit from local experts.</p>
                              </div> -->
                <!-- <form class="banner_one_form select_one">
                                  <ul class="input_box_inner list-unstyled">
                                      <li class="input_box">
                                          <input type="text" name="listing_name" placeholder="What are you looking for?">
                                      </li>
                                      <li class="input_box banner_one_select_one">
                                          <select class="selectpicker" data-width="100%">
                                              <option selected="selected">Location</option>
                                              <option>Default Sorting 1</option>
                                              <option>Default Sorting 2</option>
                                              <option>Default Sorting 3</option>
                                              <option>Default Sorting 4</option>
                                          </select>
                                      </li>
                                      <li class="input_box banner_one_select_two">
                                          <select class="selectpicker" data-width="100%">
                                              <option selected="selected">All catgories</option>
                                              <option>Default Sorting 1</option>
                                              <option>Default Sorting 2</option>
                                              <option>Default Sorting 3</option>
                                              <option>Default Sorting 4</option>
                                          </select>
                                      </li>
                                  </ul>
                                  <div class="banner_one_form_btn">
                                      <button class="thm-btn" type="submit"><span
                                              class="icon-magnifying-glass"></span>Search</button>
                                  </div>
                              </form>
                          </div>-->

                <div class="row">
                    <div class="col-xl-12 col-lg-12  wow zoomIn animated animated">
                        <div class="banner_three_top-title">
                            <h1>One stop solution<br> for all Indians in &nbsp; &nbsp;<span style="font-size:90px;">
                                    Germany.</span></h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                        <form class="banner_three_form">
                            <div class="row">
                                <div class="col-xl-3 col-lg-3">
                                    <div class="banner_three_input_box">
                                        <input type="text" name="listing_name" placeholder="What are you looking for?">
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-3">
                                    <div class="banner_three_input_box banner_three_select_one" style="z-index:9;">
                                        <select class="selectpicker" data-width="100%">
                                            <option selected="selected">Location</option>
                                            <option>Default Sorting 1</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3">
                                    <div class="banner_three_input_box banner_three_select_two" style="z-index:9;">
                                        <select class="selectpicker" data-width="100%">
                                            <option selected="selected">All Categories</option>
                                            <option>Default Sorting 1</option>



                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 banner_three_form_btn">
                                    <button class="thm-btn" type="submit"><span
                                            class="icon-magnifying-glass"></span>Search</button>
                                </div>
                            </div>
                        </form>

                        <div class="row">
                            <div class="col-xl-8 col-lg-8 color__white pt-3">
                                Popular tags:
                                <a href="#" class="pop__tags"> Housing </a> &nbsp;&nbsp;
                                <a href="#" class="pop__tags"> Jobs </a>&nbsp;&nbsp;
                                <a href="#" class="pop__tags"> Education </a>&nbsp;&nbsp;
                                <a href="#" class="pop__tags"> Travel </a>&nbsp;&nbsp;
                                <a href="#" class="pop__tags"> Services </a>&nbsp;&nbsp;
                                <a href="#" class="pop__tags"> Events </a>&nbsp;&nbsp;
                            </div>
                        </div>

                    </div>


                    <div class="col-xl-6 col-lg-6">

                    </div>
                </div>

                <!-- <div class="banner_one_bottom">
                              <div class="banner_one_bottom_bg"
                                  style="background-image: url({{ URL::asset('assets/frontend/images/shapes/banner-1-shape-1.png') }}">
                              </div>
                              <p>Or browse the selected categories</p>
                          </div> -->
            </div>
        </section>


        <!-- Categories One Start -->
        <section class="categories_one">
            <div class="categories_one_shape wow slideInLeft animated" data-wow-delay="600ms"
                style="background-image: url({{ URL::asset('assets/frontend/images/shapes/map-1.png') }})"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="categories_one_carousel owl-theme owl-carousel">
                            <!--Categories One Single-->
                            @foreach ($categories as $category)
                            <div class="categories_one_single">
                                <div class="categories_one_icon">
                                    <span><img src="{{ URL::asset('assets/frontend/images/img/housing111.png') }}"
                                            class="img-fluid"></span>
                                </div>
                                <h4>{{ $category->name }}</h4>
                            </div>
                            @endforeach
                            {{-- <!--Categories One Single-->
                            <div class="categories_one_single">
                                <div class="categories_one_icon">
                                    <span><img src="{{ URL::asset('assets/frontend/images/img/taxation1.png') }}"
                                            class="img-fluid"></span>
                                </div>
                                <h4>Taxation</h4>
                            </div>

                            <!--Categories One Single-->
                            <div class="categories_one_single">
                                <div class="categories_one_icon">
                                    <span><img src="{{ URL::asset('assets/frontend/images/img/forum1.png') }}"
                                            class="img-fluid"></span>
                                </div>
                                <h4>Forum</h4>
                            </div>

                            <!--Categories One Single-->
                            <div class="categories_one_single">
                                <div class="categories_one_icon">
                                    <span><img src="{{ URL::asset('assets/frontend/images/img/education1.png') }}"
                                            class="img-fluid"></span>
                                </div>
                                <h4>Education</h4>
                            </div>

                            <!--Categories One Single-->
                            <div class="categories_one_single">
                                <div class="categories_one_icon">
                                    <span><img src="{{ URL::asset('assets/frontend/images/img/matrimonial1.png') }}"
                                            class="img-fluid"></span>
                                </div>
                                <h4>Matrmonial</h4>
                            </div>

                            <!--Categories One Single-->
                            <div class="categories_one_single">
                                <div class="categories_one_icon">
                                    <span><img src="{{ URL::asset('assets/frontend/images/img/travel1.png') }}"
                                            class="img-fluid"></span>
                                </div>
                                <h4>Tours & Travel</h4>
                            </div>

                            <!--Categories One Single-->
                            <div class="categories_one_single">
                                <div class="categories_one_icon">
                                    <span><img src="{{ URL::asset('assets/frontend/images/img/faq1.png') }}"
                                            class="img-fluid"></span>
                                </div>
                                <h4>FAQ</h4>
                            </div>


                            <!--Categories One Single-->
                            <div class="categories_one_single">
                                <div class="categories_one_icon">
                                    <span><img src="{{ URL::asset('assets/frontend/images/img/events1.png') }}"
                                            class="img-fluid"></span>
                                </div>
                                <h4>Event</h4>
                            </div>

                            <!--Categories One Single-->
                            <div class="categories_one_single">
                                <div class="categories_one_icon">
                                    <span><img src="{{ URL::asset('assets/frontend/images/img/Entertainment1.png') }}"
                                            class="img-fluid"></span>
                                </div>
                                <h4>Entertainment</h4>
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>

        </section>


        <section class="explore_categories">
            <div class="container">
                <div class="food_lovers2">

                    <div class="food_lover_inner_shape-2"
                        style="background-image: url({{ URL::asset('assets/frontend/images/shapes/food-lovers-shape-small2.png') }})">
                    </div>

                    <div class="block-title text-center" style="position:relative;">
                        <h4>Explore Our categories</h4>
                        <h2>Our Services</h2>
                        <p>Lorem ipsum dolor sit amet, cibo mundi ea duo, vim exerci phaedrum</p>
                    </div>

                </div> <!-- food_lovers2 -->
            </div> <!-- container -->

            <div class="container-full-width">
                <div class="row catagorimain">

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">

                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Housing Categories</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="w-50 float-left"> <a class=" a_cat_color" href="housing-listing-grid.html"><i class="fas fa-angle-right"></i> House For Rent</a> </div>
                                <div class="w-50 float-left"> <a class=" a_cat_color" href="#"> <i class="fas fa-angle-right"></i> AC Service & Repair</a> </div>
                                <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Washing Machine Repairs</a> </div>
                                <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Air Cooler Dealers</a> </div>
                                <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Audio Visual Equipment Dealers</a> </div>
                                <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Industrial Voltage Stabilizers Dealers</a> </div>
                                <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Solar Water Heaters</a> </div>
                                <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Fire Fighting Equipment</a> </div>

                                <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Washing machine dealers</a> </div>
                                <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Microwave Oven Dealers</a> </div>
                                <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Firefighting Equipment Dealers</a> </div>
                                <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Water Dispenser Dealers</a> </div>
                                <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Modular Kitchen Dealers</a> </div>

                                <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Generators Dealers</a> </div>
                                <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Gas Water Heater Dealers</a> </div>
                                <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Sign Board Agencies</a> </div>
                                <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Mixer Grinder Dealers</a> </div>

                            </div> <!-- modal-body -->
                        </div> <!-- modal-content -->
                    </div> <!-- modal-dialog -->
                    {{-- <input type="hidden" id="hdnCategoryId" name="hdnCategoryId" value="{{ $categoryId->id }}"> --}}
                </div> <!-- modal -->
            </div> <!-- catagorimain -->
                </div> <!-- container-full-width -->

            <ul class="circles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </section>



        <section class="background__grey category__listing_sec">

            <div class="container">
                <div class="food_lovers2 ">
                    <div class="food_lover_inner_shape-2 "
                        style="background-image: url({{ URL::asset('assets/frontend/images/shapes/food-lovers-shape-small2.png') }})">
                    </div>

                    <div class="block-title text-center" style="position:relative;">
                        <h4>Lorem ipsum dolor sit amet</h4>
                        <h2>Category Listings</h2>
                        <p>Lorem ipsum dolor sit amet, cibo mundi ea duo, vim exerci phaedrum</p>
                    </div>
                </div>
            </div>

        </section>


        <div id="categoryWiseBusinessListingDivId"></div>
        <!--Weekly Start-->
<!--        <section class="weekly background__grey" style="position:relative;">
            <div class="bg_pattern_honeybee"></div>
            <div class="container-full-width px-5">
                <div class="row">
                    <div class="col-xl-12">
                        <h2 class="carousel__h2 pt-0">Housing</h2>
                        <div class="weekly_carousel owl-theme owl-carousel wow slideInLeft animated animated" id="housingDataDivId">
                            Weekly Single
                            <div class="weekly_single">
                                <div class="weekly_image">
                                    <div class="image_inner">
                                        <img src="{{ URL::asset('assets/frontend/images/img/h.jpg') }}" alt="">
                                    </div>
                                    <div class="weekly_content">
                                        <h3><a href="{{ route('HousingListingGrid') }}">Property for Rent</a></h3>
                                        <p>Lorem ipsum is not free dolor sit amet</p>
                                        <div class="shopping_rating">
                                            <div class="weekly_content_shopping">
                                                <div class="weekly_content_shopping_icon">
                                                    <span><i class="fas fa-home"></i></span>
                                                </div>
                                                <div class="weekly_content_shopping_text">
                                                    <h5>Housing</h5>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="weekly_hover_content">
                                        <h3><a href="{{ route('HousingListingGrid') }}">Lorem ipsum is not free dolor sit
                                                amet</a>
                                        </h3>
                                        <p>Lorem ipsum is not free dolor sit amet</p>

                                        <div class="weekly_hover_content_restuarant_rating">
                                            <div class="weekly_hover_content_restuarant">
                                                <div class="weekly_hover_content_restuarant_icon">
                                                    <span><i class="fas fa-home"></i></span>
                                                </div>
                                                <div class="weekly_hover_content_restuarant_text">
                                                    <h5>Housing</h5>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            Weekly Single
                            <div class="weekly_single">
                                <div class="weekly_image">
                                    <div class="image_inner">
                                        <img src="{{ URL::asset('assets/frontend/images/img/h2.jpg') }}" alt="">
                                    </div>
                                    <div class="weekly_content">
                                        <h3><a href="{{ route('HousingListingGrid') }}">Property for Sale</a></h3>
                                        <p>Lorem ipsum is not free dolor sit amet</p>
                                        <div class="shopping_rating">
                                            <div class="weekly_content_shopping">
                                                <div class="weekly_content_shopping_icon">
                                                    <span><i class="fas fa-home"></i></span>
                                                </div>
                                                <div class="weekly_content_shopping_text">
                                                    <h5>Housing</h5>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="weekly_hover_content">
                                        <h3><a href="{{ route('HousingListingGrid') }}">Lorem ipsum is not free dolor sit
                                                amet</a>
                                        </h3>
                                        <p>Lorem ipsum is not free dolor sit amet</p>

                                        <div class="weekly_hover_content_restuarant_rating">
                                            <div class="weekly_hover_content_restuarant">
                                                <div class="weekly_hover_content_restuarant_icon">
                                                    <span><i class="fas fa-home"></i></span>
                                                </div>
                                                <div class="weekly_hover_content_restuarant_text">
                                                    <h5>Housing</h5>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>-->





        <!--Weekly2 Start 2-->
<!--        <section class="weekly  background__grey mt__minus70">

            <div class="container-full-width px-5">
                <div class="row">
                    <div class="col-xl-12">


                        <h2 class="carousel__h2">Jobs</h2>


                        <div class="weekly_carousel2 owl-theme owl-carousel wow slideInRight animated animated" id="jobsDataDivId">
                            Weekly Single
                            <div class="weekly_single2">
                                <div class="weekly_image2">
                                    <div class="image_inner2">
                                        <img src="{{ URL::asset('assets/frontend/images/img/j4.jpg') }}" alt="">
                                    </div>
                                    <div class="weekly_content2">
                                        <h3><a href="job-listing-grid.html">Marketing</a></h3>
                                        <p>Lorem ipsum is not free dolor sit amet</p>
                                        <div class="shopping_rating2">
                                            <div class="weekly_content_shopping2">
                                                <div class="weekly_content_shopping_icon2">
                                                    <span><i class="fas fa-briefcase"></i></span>
                                                </div>
                                                <div class="weekly_content_shopping_text2">
                                                    <h5>Jobs</h5>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="weekly_hover_content2">
                                        <h3><a href="job-listing-grid.html">Lorem ipsum is not free dolor sit amet</a>
                                        </h3>
                                        <p>Lorem ipsum is not free dolor sit amet</p>

                                        <div class="weekly_hover_content_restuarant_rating2">
                                            <div class="weekly_hover_content_restuarant2">
                                                <div class="weekly_hover_content_restuarant_icon2">
                                                    <span><i class="fas fa-briefcase"></i></span>
                                                </div>
                                                <div class="weekly_hover_content_restuarant_text2">
                                                    <h5>Jobs</h5>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            Weekly Single
                            <div class="weekly_single2">
                                <div class="weekly_image2">
                                    <div class="image_inner2">
                                        <img src="{{ URL::asset('assets/frontend/images/img/j5.jpg') }}" alt="">
                                    </div>
                                    <div class="weekly_content2">
                                        <h3><a href="listings-details.html">Design</a></h3>
                                        <p>Lorem ipsum is not free dolor sit amet</p>
                                        <div class="shopping_rating2">
                                            <div class="weekly_content_shopping2">
                                                <div class="weekly_content_shopping_icon2">
                                                    <span><i class="fas fa-briefcase"></i></span>
                                                </div>
                                                <div class="weekly_content_shopping_text2">
                                                    <h5>Jobs</h5>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="weekly_hover_content2">
                                        <h3><a href="job-listing-grid.html">Lorem ipsum is not free dolor sit amet</a>
                                        </h3>
                                        <p>Lorem ipsum is not free dolor sit amet</p>

                                        <div class="weekly_hover_content_restuarant_rating2">
                                            <div class="weekly_hover_content_restuarant2">
                                                <div class="weekly_hover_content_restuarant_icon2">
                                                    <span><i class="fas fa-briefcase"></i></span>
                                                </div>
                                                <div class="weekly_hover_content_restuarant_text2">
                                                    <h5>Jobs</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>-->



        <!--Weekly3 Start 3-->
<!--        <section class="weekly  background__grey mt__minus70">

            <div class="container-full-width px-5">
                <div class="row">
                    <div class="col-xl-12">


                        <h2 class="carousel__h2">Education</h2>


                        <div class="weekly_carousel3 owl-theme owl-carousel wow slideInLeft animated animated" id="educationDataDivId">
                            Weekly Single
                            <div class="weekly_single3">
                                <div class="weekly_image3">
                                    <div class="image_inner3">
                                        <img src="{{ URL::asset('assets/frontend/images/img/e4.jpg') }}" alt="">
                                    </div>
                                    <div class="weekly_content3">
                                        <h3><a href="{{ route('EducationListingGrid') }}">Entrance Exam Coaching</a></h3>
                                        <p>Lorem ipsum is not free dolor sit amet</p>
                                        <div class="shopping_rating3">
                                            <div class="weekly_content_shopping3">
                                                <div class="weekly_content_shopping_icon3">
                                                    <span><i class="fas fa-user-graduate"></i></span>
                                                </div>
                                                <div class="weekly_content_shopping_text3">
                                                    <h5>Education</h5>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="weekly_hover_content3">
                                        <h3><a href="{{ route('EducationListingGrid') }}">Lorem ipsum is not free dolor
                                                sit
                                                amet</a>
                                        </h3>
                                        <p>Lorem ipsum is not free dolor sit amet</p>

                                        <div class="weekly_hover_content_restuarant_rating3">
                                            <div class="weekly_hover_content_restuarant3">
                                                <div class="weekly_hover_content_restuarant_icon3">
                                                    <span><i class="fas fa-user-graduate"></i></span>
                                                </div>
                                                <div class="weekly_hover_content_restuarant_text3">
                                                    <h5>Education</h5>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            Weekly Single
                            <div class="weekly_single3">
                                <div class="weekly_image3">
                                    <div class="image_inner3">
                                        <img src="{{ URL::asset('assets/frontend/images/img/e3.jpg') }}" alt="">
                                    </div>
                                    <div class="weekly_content3">
                                        <h3><a href="{{ route('EducationListingGrid') }}">Computer Training</a></h3>
                                        <p>Lorem ipsum is not free dolor sit amet</p>
                                        <div class="shopping_rating2">
                                            <div class="weekly_content_shopping3">
                                                <div class="weekly_content_shopping_icon3">
                                                    <span><i class="fas fa-user-graduate"></i></span>
                                                </div>
                                                <div class="weekly_content_shopping_text3">
                                                    <h5>Education</h5>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="weekly_hover_content3">
                                        <h3><a href="{{ route('EducationListingGrid') }}">Lorem ipsum is not free dolor
                                                sit amet</a>
                                        </h3>
                                        <p>Lorem ipsum is not free dolor sit amet</p>

                                        <div class="weekly_hover_content_restuarant_rating3">
                                            <div class="weekly_hover_content_restuarant3">
                                                <div class="weekly_hover_content_restuarant_icon3">
                                                    <span><i class="fas fa-user-graduate"></i></span>
                                                </div>
                                                <div class="weekly_hover_content_restuarant_text3">
                                                    <h5>Education</h5>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

            <div class="bg_pattern_honeybee2"></div>

        </section>-->


        <!--Two Boxes Start-->
        <section class="two_boxes">
            <div class="container adv_main owl-theme owl-carousel">
                @foreach ($advertisments as $key=>$advertisment)
                    @php
                        if(isset($advertisment['media']) ) {
                            $imageUrl= URL::to('/images/advertisement').'/'.$advertisment['media'] ;
                        } else {
                            $imageUrl='';
                        }
                    @endphp
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 {{ $key=0 ? 'wow slideInLeft animated animated' : '' }}">
                            <div class="box_one">
                                <div class="box_one_img">
                                    @php
                                        if( !isset($imageUrl) ){
                                            $imageUrl = URL::asset('assets/frontend/images/resources/two-boxes-img-1.jpg');
                                        }
                                    @endphp
                                    <img src="{{ $imageUrl }}"
                                        alt="">
                                    <div class="box_one_text">
                                    </div>
                                    <div class="box_one_btn">
                                        <a href="event.html">20 Listings</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8 {{ $key=0 ? 'wow slideInRight animated animated' : '' }}">
                            <div class="box_two">
                                <div class="box_two_img">
                                    @php
                                        if( !isset($imageUrl) ){
                                            $imageUrl = URL::asset('assets/frontend/images/resources/two-boxes-img-2.jpg');
                                        }
                                    @endphp
                                    <img src="{{ $imageUrl }}"
                                        alt="">
                                    <div class="box_two_text">
                                    </div>
                                    <div class="box_two_btn">
                                        {{-- <a href="#">20 Listings</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="row">
                    <div class="col-xl-4 col-lg-4">
                        <div class="box_one">
                            <div class="box_one_img">
                                <img src="{{ URL::asset('assets/frontend/images/resources/two-boxes-img-1.jpg') }}"
                                    alt="">
                                <div class="box_one_text">
                                    <!-- <p>Outstanding</p>
                                              <h2>Places in<br>London</h2> -->
                                </div>
                                <div class="box_one_btn">
                                    <a href="event.html">20 Listings</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8">
                        <div class="box_two">
                            <div class="box_two_img">
                                <img src="{{ URL::asset('assets/frontend/images/resources/two-boxes-img-2.jpg') }}"
                                    alt="">
                                <div class="box_two_text">
                                    <!-- <p>Inside Europe</p>
                                              <h2>Let�s have<br>dinner</h2> -->
                                </div>
                                <div class="box_two_btn">
                                    <a href="#">20 Listings</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="row">
                    <div class="col-xl-4 col-lg-4">
                        <div class="box_one">
                            <div class="box_one_img">
                                <img src="{{ URL::asset('assets/frontend/images/resources/two-boxes-img-1.jpg') }}"
                                    alt="">
                                <div class="box_one_text">
                                    <!-- <p>Outstanding</p>
                                              <h2>Places in<br>London</h2> -->
                                </div>
                                <div class="box_one_btn">
                                    <a href="event.html">20 Listings</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8">
                        <div class="box_two">
                            <div class="box_two_img">
                                <img src="{{ URL::asset('assets/frontend/images/resources/two-boxes-img-2.jpg') }}"
                                    alt="">
                                <div class="box_two_text">
                                    <!-- <p>Inside Europe</p>
                                              <h2>Let�s have<br>dinner</h2> -->
                                </div>
                                <div class="box_two_btn">
                                    <a href="#">20 Listings</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <ul class="circles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </section>




        <!--Food Lovers Start-->
        <section class="food_lovers"
            style="background-image: url({{ URL::asset('assets/frontend/images/backgrounds/food-lovers_bg.jpg') }})">
            <div class="food_lover_inner_shape-1"
                style="background-image: url({{ URL::asset('assets/frontend/images/shapes/food-lovers-shape-1.png') }})">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="food_lovers_inner">
                            <h2>THE IG GROUP</h2>
                            <p>Impacting Million Lives</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--Counter One Start-->
        <section class="counter_one">
            <div class="counter_one_shape wow slideInLeft animated" data-wow-delay="600ms"
                style="background-image: url({{ URL::asset('assets/frontend/images/shapes/counter_one_shape.png') }})">
            </div>
            <div class="container">
                <div class="counter_one_content">
                    <ul class="counter_one_box list-unstyled clearfix">
                        <li class="counter_one_single">
                            <h3><span class="counter">8705</span></h3>
                            <p>Happy Users</p>
                        </li>
                        <li class="counter_one_single">
                            <h3><span class="counter">480</span></h3>
                            <p>Lorem Ipsum</p>
                        </li>
                        <li class="counter_one_single">
                            <h3><span class="counter">6260</span></h3>
                            <p>Lorem ipsum</p>
                        </li>
                        <li class="counter_one_single">
                            <h3><span class="counter">9774</span></h3>
                            <p>Dolor sit amet</p>
                        </li>
                    </ul>
                </div>
            </div>
        </section>



        <!--FORUM Start-->
        <section class="forum_padding">
            <div class="container Forum">
                <div class="food_lovers2">
                    <div class="food_lover_inner_shape-2"
                        style="background-image: url({{ URL::asset('assets/frontend/images/shapes/food-lovers-shape-small2.png') }})">
                    </div>

                    <div class="block-title text-center" style="position:relative;">
                        <h4>Lorem ipsum dolor sit amet</h4>
                        <h2>Forum</h2>
                        <p>Lorem ipsum dolor sit amet, cibo mundi ea duo, vim exerci phaedrum</p>
                    </div>
                </div>
            </div>

            <div class="container wow slideInRight animated animated">
                @include('frontend.forum.forum-list')
            </div>
        </section>





        <!--FAQ One Start    style="background-image: url({{ URL::asset('assets/frontend/images/backgrounds/faq-one-bg.jpg') }})"-->
        <section class="faq_one background__grey faq__bg">

            <div class="container">
                <div class="food_lovers2">
                    <div class="food_lover_inner_shape-2"
                        style="background-image: url({{ URL::asset('assets/frontend/images/shapes/food-lovers-shape-small2.png') }})">
                    </div>

                    <div class="block-title text-center" style="position:relative;">
                        <h4>Frequently asked questions</h4>
                        <h2>Have Any Question?</h2>
                        <p>Lorem ipsum dolor sit amet, cibo mundi ea duo, vim exerci phaedrum</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6  wow slideInRight animated animated align-self-center">
                        <div class="faq_one_image">
                            <img src="{{ URL::asset('assets/frontend/images/resources/faq-1-img-1.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-xl-6 wow slideInLeft animated animated align-self-center">
                        <div class="faq_one_right">
                            <div class="accrodion-grp" data-grp-name="faq-one-accrodion">
                                @foreach ($faqs as $key=>$faq)
                                    <div class="accrodion {{$key==0 ? 'active' :''}}">
                                        <div class="accrodion-title">
                                            <h4>{{ ucwords($faq->question) }}</h4>
                                        </div>
                                        <div class="accrodion-content">
                                            <div class="inner">
                                                <p>{{ ucwords($faq->answer) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                {{-- <div class="accrodion active">
                                    <div class="accrodion-title">
                                        <h4>How to create a new listings on site</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>There are many variations of passages the majority have suffered
                                                alteration in some fo injected humour, randomised words believable.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>How to create a new listings on site</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>There are many variations of passages the majority have suffered
                                                alteration in some fo injected humour, randomised words believable.</p>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>








        <!--Blog Two Start-->
        <section class="blog_one two">
            <div class="container">
                <div class="food_lovers2">
                    <div class="food_lover_inner_shape-2"
                        style="background-image: url({{ URL::asset('assets/frontend/images/shapes/food-lovers-shape-small2.png') }})">
                    </div>

                    <div class="block-title text-center" style="position:relative;">
                        <h4>From the blog</h4>
                        <h2>News & Articles</h2>
                        <p>Lorem ipsum dolor sit amet, cibo mundi ea duo, vim exerci phaedrum</p>
                    </div>
                </div>
                <div class="row">
                    @foreach ($blogs as $blog)

                    @php
                        $images=json_decode($blog->media_file_json, true);
                        if(count($images)){
                            if(isset($images[0][0])){
                                $imageUrl= URL::to('/images/blogs').'/'.$images[0][0] ;
                            }else {
                                $imageUrl= URL::asset('assets/frontend/images/blog/blog-1-img-1.jpg');
                            }
                        } else {
                            $imageUrl= URL::asset('assets/frontend/images/blog/blog-1-img-1.jpg');
                        }

                        $slug = isset($blog->slug) ? $blog->slug : Str::slug($blog->name, '-');
                    @endphp

                        <div class="col-xl-4">
                            <!--Blog One single-->
                            <div class="blog_one_single wow fadeInUp" data-wow-delay="100ms">
                                <div class="blog_image">
                                    <img src="{{ $imageUrl }}"
                                        alt="Blog One Image">
                                </div>
                                <div class="blog-one__content">
                                    <ul class="list-unstyled blog-one__meta">
                                        <li><a href=""><i class="far fa-user-circle"></i>by {{ isset($blog->user) && isset($blog->user->name) ? ucwords($blog->user->name) : '-' }}</a></li>
                                        <li><a href=""><i class="far fa-comments"></i>{{$blog->blogComments->count()}} Comments</a></li>
                                    </ul>
                                    <div class="blog_one_title">
                                        <h3><a href="{{ route('blog.detail',['slug'=>$slug]) }}">{{ isset($blog->name) ? ucwords($blog->name) :'-'}}</a>
                                        </h3>
                                    </div>
                                    <div class="blog_one_text">
                                        <p>{{ isset($blog->description) ? ucwords($blog->description) : '-' }}</p>
                                    </div>
                                    <div class="blog_one_date">
                                        <p>{{ $blog->created_at->format('d') }}<br>{{ $blog->created_at->format('M') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="col-xl-4">
                        <!--Blog One single-->
                        <div class="blog_one_single wow fadeInDown" data-wow-delay="200ms">
                            <div class="blog_image">
                                <img src="{{ URL::asset('assets/frontend/images/blog/blog-1-img-2.jpg') }}"
                                    alt="Blog One Image">
                            </div>
                            <div class="blog-one__content">
                                <ul class="list-unstyled blog-one__meta">
                                    <li><a href=""><i class="far fa-user-circle"></i>by Admin</a></li>
                                    <li><a href=""><i class="far fa-comments"></i>2 Comments</a>
                                    </li>
                                </ul>
                                <div class="blog_one_title">
                                    <h3><a href="{{ route('Blogdetail') }}">Leverage agile frameworks to provide a
                                            robust</a>
                                    </h3>
                                </div>
                                <div class="blog_one_text">
                                    <p>Lorem ipsum dolor sit amet, cibo mundi ea duo, vim exerci phaedrum</p>
                                </div>
                                <div class="blog_one_date">
                                    <p>07<br>Aug</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <!--Blog One single-->
                        <div class="blog_one_single wow fadeInUp" data-wow-delay="300ms">
                            <div class="blog_image">
                                <img src="{{ URL::asset('assets/frontend/images/blog/blog-1-img-3.jpg') }}"
                                    alt="Blog One Image">
                            </div>
                            <div class="blog-one__content">
                                <ul class="list-unstyled blog-one__meta">
                                    <li><a href=""><i class="far fa-user-circle"></i>by Admin</a></li>
                                    <li><a href=""><i class="far fa-comments"></i>2 Comments</a>
                                    </li>
                                </ul>
                                <div class="blog_one_title">
                                    <h3><a href="{{ route('Blogdetail') }}">Bring to the table win-win survival
                                            strategies to</a>
                                    </h3>
                                </div>
                                <div class="blog_one_text">
                                    <p>Lorem ipsum dolor sit amet, cibo mundi ea duo, vim exerci phaedrum</p>
                                </div>
                                <div class="blog_one_date">
                                    <p>07<br>Aug</p>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <ul class="circles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </section>


        <!--CTA One Start-->
        <section class="cta_one wow slideInLeft animated animated">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="cta_one_inner">
                            <div class="cta_one_inner_bg"
                                style="background-image: url({{ URL::asset('assets/frontend/images/backgrounds/cta-2-bg.jpg') }})">
                            </div>
                            <div class="cta_one_img">
                                <img src="{{ URL::asset('assets/frontend/images/resources/cta-1-img-1.jpg') }}" alt="">
                            </div>
                            <div class="cta_one_content">
                                <div class="cta_one_text">
                                    <p>Premium Matrimonial Listing</p>
                                    <h2>Special Offers Every Day</h2>
                                </div>
                                <div class="cta_one_btn">
                                    <a href="#" class="thm-btn hvr-sweep-to-right">Show more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!--Testimonials One Start-->
        <section class="testimonials_one">
            <div class="" style=" background-image:
                url({{ URL::asset('assets/frontend/images/shapes/testimonial-one-map.png') }})">
            </div>
            <div class="container-box">
                <div class="bg_pattern_network"></div>
                <div class="food_lovers2">
                    <div class="food_lover_inner_shape-2"
                        style="background-image: url({{ URL::asset('assets/frontend/images/shapes/food-lovers-shape-small2.png') }})">
                    </div>

                    <div class="block-title text-center" style="position:relative;">
                        <h4>Our testimonials</h4>
                        <h2>What Users Say</h2>
                        <p>Lorem ipsum dolor sit amet, cibo mundi ea duo, vim exerci phaedrum</p>
                    </div>
                </div>


                <div class="owl-carousel owl-theme review_main">

                    <!-- review box -->
                    <div class="row review_box">
                        <div class="col-lg-6 col-xs-2 ">
                            <div class="video_one_imagee">

                                <img src="{{ URL::asset('assets/frontend/images/resources/video-1-img-12.jpg') }}"
                                    alt="">
                                <a href="https://youtu.be/gesEgZdCQ6M" class="video-one__btnn video-popupp"><i
                                        class="fa fa-play"></i></a>

                            </div>
                        </div>
                        <div class="col-lg-6 col-xs-2">
                            <div class="reviewbody">
                                <h3>Lorem ipsum dolor Name </h3>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam numquam facilis neque
                                    aliquam rem fugit, aut porro vero eligendi eveniet ea incidunt, quisquam provident,
                                    hic
                                    voluptatibus voluptatum! Expedita, corrupti nulla. Lorem, ipsum dolor sit amet
                                    consectetur adipisicing elit.</p>
                                <h5>- C.E.O</h5>
                            </div>
                        </div>
                    </div>

                    <!-- review box -->
                    <div class="row review_box">
                        <div class="col-lg-6 col-xs-2 ">
                            <div class="video_one_imagee">

                                <img src="{{ URL::asset('assets/frontend/images/resources/video-1-img-12.jpg') }}"
                                    alt="">
                                <a href="https://youtu.be/gesEgZdCQ6M" class="video-one__btnn video-popupp"><i
                                        class="fa fa-play"></i></a>

                            </div>
                        </div>
                        <div class="col-lg-6 col-xs-2">
                            <div class="reviewbody">
                                <h3>Lorem ipsum dolor Name </h3>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam numquam facilis neque
                                    aliquam rem fugit, aut porro vero eligendi eveniet ea incidunt, quisquam provident,
                                    hic
                                    voluptatibus voluptatum! Expedita, corrupti nulla. Lorem, ipsum dolor sit amet
                                    consectetur adipisicing elit.</p>
                                <h5>- C.E.O</h5>
                            </div>
                        </div>
                    </div>


                    <!-- review box -->
                    <div class="row review_box">

                        <div class="col-lg-12 col-xs-12">
                            <div class="reviewbody">
                                <h3>Lorem ipsum dolor Name </h3>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam numquam facilis neque
                                    aliquam rem fugit, aut porro vero eligendi eveniet ea incidunt, quisquam provident,
                                    hic
                                    voluptatibus voluptatum! Expedita, corrupti nulla. Lorem, ipsum dolor sit amet
                                    consectetur adipisicing elit. Totam numquam facilis neque
                                    aliquam rem fugit, aut porro vero eligendi eveniet ea incidunt, quisquam provident,
                                    hic
                                    voluptatibus voluptatum! Expedita, corrupti nulla. Lorem, ipsum dolor sit amet
                                    consectetur adipisicing elit.</p>
                                <h5>- C.E.O</h5>
                            </div>
                        </div>
                    </div>
                </div>
        </section>





        <!--Video One Start-->
        <section class="video-one"
            style="background-image: url({{ URL::asset('assets/frontend/images/backgrounds/video-one-bg.jpg') }})">
            <div class="container">
                <div class="food_lovers2">
                    <div class="food_lover_inner_shape-2"
                        style="background-image: url({{ URL::asset('assets/frontend/images/shapes/food-lovers-shape-small2.png') }})">
                    </div>

                    <div class="block-title text-center color__white" style="position:relative;">
                        <h4>Let's Find out</h4>
                        <h2>How It Works</h2>
                        <p>Lorem ipsum dolor sit amet, cibo mundi ea duo, vim exerci phaedrum</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="video_one_image ">
                            <div class="video_one_shape-1"
                                style="background-image: url({{ URL::asset('assets/frontend/images/shapes/video-1-shape-1.png') }})">
                            </div>
                            <div class="video_one_shape-2 rotate-me"
                                style="background-image: url({{ URL::asset('assets/frontend/images/shapes/video-1-shape-2.png') }})">
                            </div>
                            <img src="{{ URL::asset('assets/frontend/images/resources/video-1-img-1.jpg') }}" alt="">
                            <a href="https://www.youtube.com/watch?v=i9E_Blai8vk" class="video-one__btn video-popup"><i
                                    class="fa fa-play"></i></a>
                            <div class="video_one_left_text">
                                <p>Watch how</p>
                            </div>
                            <div class="video_one_right_text">
                                <p>listing works</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--Four Boxes-->
        <section class="four_boxes">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <!--Four Boxes Single-->
                        <div class="four_boxes_single   wow zoomIn animated animated">
                            <div class="four_boxes_icon">
                                <span class="icon-selection"></span>
                            </div>
                            <h3>Choose A Category</h3>
                            <p>There many variation of pasages of lorem sum available.</p>
                            <div class="four_boxes_shape"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 ">
                        <!--Four Boxes Single-->
                        <div class="four_boxes_single  wow zoomIn animated animated">
                            <div class="four_boxes_icon">
                                <span class="icon-focus"></span>
                            </div>
                            <h3>Find What You Want</h3>
                            <p>There many variation of pasages of lorem sum available.</p>
                            <div class="four_boxes_shape"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <!--Four Boxes Single-->
                        <div class="four_boxes_single  wow zoomIn animated animated">
                            <div class="four_boxes_icon">
                                <span class="icon-delete"></span>
                            </div>
                            <h3>Select the Best Place</h3>
                            <p>There many variation of pasages of lorem sum available.</p>
                            <div class="four_boxes_shape"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <!--Four Boxes Single-->
                        <div class="four_boxes_single  wow zoomIn animated animated">
                            <div class="four_boxes_icon">
                                <span class="icon-exploration"></span>
                            </div>
                            <h3>Go Out & Explore Now</h3>
                            <p>There many variation of pasages of lorem sum available.</p>
                            <div class="four_boxes_shape"></div>
                        </div>
                    </div>
                </div>
                <div class="four_boxes_bottom">
                    <p>Don't hesitate, contact us for better business. <a href="#" data-toggle="modal"
                            data-target="#exampleModallisting">Start a New Lisiting</a></p>
                </div>
            </div>
        </section>

        <section class="download"
            style="background-image: url({{ URL::asset('assets/frontend/images/backgrounds/download-bg.jpg') }})">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8">
                        <div class="download_textabout">
                            <h2 class="font-weight-bold mb-3">Download Our IG App</h2>
                            <h6>Our goal is to create a community to help you feel like home. So, download the app now and
                                get connected to the life of your dreams in Germany.</h6>
                            <div class="download_2-btn">
                                <div class="download_btn-1">
                                    <a href="#">
                                        <img src="{{ URL::asset('assets/frontend/images/img/googleplaystore.png') }}"
                                            width="30">
                                        <p>GET IT ON<br>Google Play</p>
                                    </a>
                                </div>
                                <div class="download_btn-1 two">
                                    <a href="#">
                                        <i class="fab fa-apple"></i>
                                        <p>Download on the<br>App store</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4">
                        <div class="download_screen wow slideInRight animated" data-wow-delay="100ms"
                            style="visibility: visible; animation-delay: 100ms; animation-name: slideInRight;">
                            <div class="download_screen_image">
                                <img src="{{ URL::asset('assets/frontend/images/resources/download-screen-img.png') }}"
                                    alt="">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    @include('frontend.models.CategoryBusinessListModel')


    @section('script')
        <script>

            $(document).ready(function(){


                // category list (when page load)
                $.ajax({
                    type:'GET',
                    url:'{{ route("CategoryData") }}',
                    dataType:'json',
                    async:true,
                    beforeSend : function()
                    {
                        $("#fullImageDivLoader img").show();	// Show loader
                    },
                    success:function(data)
                    {
                        setCategoryHtml(data);
                        $("#fullImageDivLoader img").hide();	// Show loader
                        var html='';
                        $.each(data.Result, function (i) {

                            var id=data.Result[i]['Id'];
                            var slug=data.Result[i]['slug'];
                            var name=data.Result[i]['Name'];
                            var icon=data.Result[i]['Icon'];
                            var redirectStatus=data.Result[i]['redirect_status'];
                            console.log("slug");
                            console.log(slug);
                            let model='';
                            let modelid='';
                            resultId=parseInt(data.Result[i]['Id']);

                            html+='<div class="col-xl-2 col-lg-4 col-md-6">'
                                    +'<div class="explore_categories_single wow fadeInUp animated" data-wow-delay="0ms"data-wow-duration="1200ms"style="visibility: visible; animation-duration: 1200ms; animation-delay: 0ms; animation-name: fadeInUp;">'
                                        +'<div class="explore_categories_image exp_cat_img">\
                                            <img src='+icon+' alt="">\
                                        </div>\
                                        <div class="explore_categories_content">\
                                            <h3>'+name+'</h3>';

                            // link generate
                            var url='#';
                            if(redirectStatus==2){ // forum list
                                url="{{ route('ForumList') }}";
                            } else if(redirectStatus==3){ //matrimonial
                                url="{{route('matrimoney')}}";
                            } else if(redirectStatus=='5'){ // entertainment
                                // url="{{route('EntertainmentListingGrid')}}";
                                url="/category/"+slug;
                            } else if(redirectStatus=='1'){ //faq
                                url="{{ route('faq.details') }}";
                            }

                            var btnLink='';
                            if(redirectStatus=='1' || redirectStatus=='2' || redirectStatus=='3' ||redirectStatus=='4' || redirectStatus=='5')
                            {
                                btnLink='<button class="explore_categories_arrow">\
                                            <a href="'+url+'"><span class="icon-right-arrow"></span></a>\
                                        </button>';
                            }
                            else
                            {
                                btnLink='<button class="explore_categories_arrow">\
                                                <span type="button" data-toggle="modal" class="icon-right-arrow business-category" data-target="'+modelid+'" data-id="'+id+'" data-name="'+name+'"></span>\
                                        </button>';
                            }

                            html+=btnLink+'</div></div></div>';

                        });

                        $('.catagorimain').html(html);

                    },
                    error:function(XMLHttpRequest, errorStatus, errorThrown)
                    {
                        console.log("XHR :: "+JSON.stringify(XMLHttpRequest));
                        console.log("Status :: "+errorStatus);
                        console.log("error :: "+errorThrown);
                        $("#fullImageDivError").text('There is something wrong. Please try again');
                        $("#fullImageDivError").show();
                    }
                });

                // category wise business data
                $(document).on('click','.business-category',function(e)
                {
                    $('#loader').show();
                    var categoryId = $(this).attr("data-id");
                    var categoryName = $(this).attr("data-name");
                    $('#businessTitle').text(categoryName);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': "{{csrf_token()}}"
                        }
                    });

                    $.ajax({
                        type: 'post',
                        data:"category_id=" + categoryId,
                        url: "{{ route('getAllSubcategoryData') }}",
                        dataType: 'json',
                        async: true,
                        beforeSend: function() {
                            $('#loader').show(); // Show loader
                        },
                        success: function(data)
                        {
                            $('#categoryBusinessModel').modal('show');
                            var htmlStr='';
                            if(data.Result.length)
                            {
                                $.each(data.Result, function(i)
                                {
                                    var name = data.Result[i]['Name'];
                                    var id = data.Result[i]['Id'];
                                    var slug = data.Result[i]['Slug'];
                                    htmlStr+='<div class="w-50 float-left"> <a class=" a_cat_color" href="/category/'+slug+'"><i class="fas fa-angle-right"></i> '+name+'</a> </div>';
                                });
                            }
                            else
                            {
                                htmlStr='<div class="w-50 float-left"> <p>Data Not Found...!!!</p></div>';
                            }
                            $("#businessLists").html(htmlStr);

                        },
                        error: function(XMLHttpRequest, errorStatus, errorThrown) {
                            console.log("XHR :: " + JSON.stringify(XMLHttpRequest));
                            console.log("Status :: " + errorStatus);
                            console.log("error :: " + errorThrown);
                            $("#fullImageDivError").text(
                                'There is something wrong. Please try again');
                            $("#fullImageDivError").show();
                        },
                        complete: function() {
                            setTimeout(() => {
                                $('#loader').hide();
                            }, 1000);
                        },
                    });
                });

                $(document).on('click','.logout',function(e){
                    e.preventDefault();
                    alert("helloo");
                    var url ="{{url('/')}}"+"/api/Logout";
                    $.ajax({
                        type:'POST',
                        url:url,
                        dataType:'json',
                        async:true,
                        headers: {
                            Authorization: 'Bearer '+$.cookie('token')
                        },
                        success:function(data)
                        {
                            var redirectUrl="{{route('/')}}";
                            location.assign(redirectUrl);
                        },
                        error:function(XMLHttpRequest, errorStatus, errorThrown)
                        {
                            console.log("XHR :: "+JSON.stringify(XMLHttpRequest));
                            console.log("Status :: "+errorStatus);
                            console.log("error :: "+errorThrown);
                            $("#fullImageDivError").text('There is something wrong. Please try again');
                            $("#fullImageDivError").show();
                            $(".preloader").hide();
                        }
                    });
                })


            });



            function setCategoryHtml(data)
            {
                var catSubcatHtml = '';
                var k = 0;
                var currentAnimationStatus = 'slideInRight';
                $.each(data.Result, function (i)
                {
                    var id = data.Result[i]['Id'];
                    var name = data.Result[i]['Name'];
                    var icon = data.Result[i]['Icon'];
                    var redirectStatus = data.Result[i]['redirect_status'];
                    var categoryPageRedirect = data.Result[i]['CategoryPageRedirect'];



                    if(data.Result[i].Subcategories != undefined)
                    {
                        console.log(id+"=>"+name);
                        catSubcatHtml += '<section class="weekly background__grey" style="position:relative;">';
                        if(k == 0)
                        {
                            catSubcatHtml += '<div class="bg_pattern_honeybee"></div>';
                        }
                        if(currentAnimationStatus == 'slideInRight')
                            currentAnimationStatus = 'slideInLeft';
                        else
                            currentAnimationStatus = 'slideInRight';
                        catSubcatHtml += '<div class="container-full-width px-5">';
                        catSubcatHtml += '<div class="row">';
                        catSubcatHtml += '<div class="col-xl-12">';
                        catSubcatHtml += '<h2 class="carousel__h2 pt-0">'+name+'</h2>';
                        catSubcatHtml += '<div class="weekly_carousel owl-theme owl-carousel wow '+currentAnimationStatus+' animated animated">';

                            $.each(data.Result[i].Subcategories, function (j)
                            {
                                var subcatId = data.Result[i].Subcategories[j]['Id'];
                                var subcatName = data.Result[i].Subcategories[j]['Name'];
                                var subcatIcon = data.Result[i].Subcategories[j]['Icon'];
                                var Description = data.Result[i].Subcategories[j]['Description'];
                                var slug = data.Result[i].Subcategories[j]['Slug'];
                                console.log(subcatName)
                                console.log(slug)
                               // console.log('sub cat name ::: '+subcatName+'sub cat id ::: '+subcatId);

                                catSubcatHtml += '<div class="weekly_single">';
                                    catSubcatHtml += '<div class="weekly_image">';
                                        catSubcatHtml += '<div class="image_inner">';

                                        catSubcatHtml += '<img src="'+icon+'" alt="">';
                                        catSubcatHtml += '</div>';
                                        catSubcatHtml += '<div class="weekly_content">';
                                            // catSubcatHtml += '<h3><a href="/category/'+subcatId+'">'+Description+'</a></h3>';
                                            catSubcatHtml += '<h3><a href="/category/'+slug+'">'+Description+'</a></h3>';
                                           // catSubcatHtml += '<p>'+Description+'</p>';
                                            catSubcatHtml += '<div class="shopping_rating">';
                                                catSubcatHtml += '<div class="weekly_content_shopping">';
                                                    catSubcatHtml += '<div class="weekly_content_shopping_icon">';
                                                    catSubcatHtml += '<span><i class="fas fa-home"></i></span>';
                                                    catSubcatHtml += '</div>';
                                                    catSubcatHtml += '<div class="weekly_content_shopping_text">';
                                                    catSubcatHtml += '<h5>'+subcatName+'</h5>';
                                                   catSubcatHtml += '</div>';
                                                catSubcatHtml += '</div>';
                                            catSubcatHtml += '</div>';
                                        catSubcatHtml += '</div>';
                                        catSubcatHtml += '<div class="weekly_hover_content">';
                                            // catSubcatHtml += '<h3><a href="/category/'+subcatId+'">'+Description+'</a></h3>';
                                            catSubcatHtml += '<h3><a href="/category/'+slug+'">'+Description+'</a></h3>';
                                            //catSubcatHtml += '<p>'+Description+'</p>';
                                            catSubcatHtml += '<div class="weekly_hover_content_restuarant_rating">';
                                                catSubcatHtml += '<div class="weekly_hover_content_restuarant">';
                                                    catSubcatHtml += '<div class="weekly_hover_content_restuarant_icon">';
                                                    catSubcatHtml += '<span><i class="fas fa-home"></i></span>';
                                                    catSubcatHtml += '</div>';
                                                    catSubcatHtml += '<div class="weekly_hover_content_restuarant_text">';
                                                    catSubcatHtml += '<h5>'+subcatName+'</h5>';
                                                    catSubcatHtml += '</div>';
                                                catSubcatHtml += '</div>';
                                            catSubcatHtml += '</div>';
                                        catSubcatHtml += '</div>';
                                    catSubcatHtml += '</div>';
                                catSubcatHtml += '</div>';
                            });
                        catSubcatHtml += '</div>';
                        catSubcatHtml += '</div>';
                        catSubcatHtml += '</div>';
                        catSubcatHtml += '</div>';
                        catSubcatHtml += '<div id="honeyBeeIdForCategoryList'+k+'" class="bg_pattern_honeybee2" style="display:none;"></div>';
                        catSubcatHtml += '</section>';
                        k++;
                    }
                });

                $("#categoryWiseBusinessListingDivId").html(catSubcatHtml);
                var finalLengthOfK = parseInt(k) - 1;
                if(finalLengthOfK > 0)
                {
                    if($("#honeyBeeIdForCategoryList"+finalLengthOfK).length > 0)
                    {
                        $("#honeyBeeIdForCategoryList"+finalLengthOfK).show();
                    }
                }
            }
        </script>
    @endsection
@endsection
