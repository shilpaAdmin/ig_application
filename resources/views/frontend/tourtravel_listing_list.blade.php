@extends('frontend.layouts.master')
@section('title') Tour & Travel - List @endsection
@section('content')
<!DOCTYPE html>
<html lang="en">


<body>

    <div class="preloader">
        <img src="{{ URL::asset('assets/frontend/images/loader.png')}}" class="preloader__image" alt="">
    </div><!-- /.preloader -->

    <div class="page-wrapper">
        <section class="listings_three_content">
            <div class="container">


                <div class="filter_by_tags">

                    <div class="row">
                        <div class="col-xl-2 col-md-4">
                            <h3 class="filter_by_tagstitile">Filters<i class="fas fa-chevron-down filtertagicon"></i>
                            </h3>
                        </div>
                    </div>

                    <div class="filter_by_tagsall">

                        <div class="row">
                            <div class="col-xl-12">
                                <form class="listings_one_content_left_form">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="input_box">
                                                <input type="text" name="listing_name"
                                                    placeholder="What are you looking for?">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="input_box">
                                                <div class="dropdown bootstrap-select" style="width: 100%;"><select
                                                        class="selectpicker" data-width="100%" tabindex="-98">
                                                        <option selected="selected">All Categories</option>
                                                        <option>Default Sorting 1</option>
                                                        <option>Default Sorting 2</option>
                                                        <option>Default Sorting 3</option>
                                                        <option>Default Sorting 4</option>
                                                    </select>
                                                    <div class="dropdown-menu " role="combobox">
                                                        <div class="inner show" role="listbox"
                                                            aria-expanded="false" tabindex="-1">
                                                            <ul class="dropdown-menu inner show"></ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="input_box">
                                                <div class="dropdown bootstrap-select dropup" style="width: 100%;">
                                                    <select class="selectpicker" data-width="100%" tabindex="-98">
                                                        <option selected="selected">All Location</option>
                                                        <option>Default Sorting 1</option>
                                                        <option>Default Sorting 2</option>
                                                        <option>Default Sorting 3</option>
                                                        <option>Default Sorting 4</option>
                                                    </select>
                                                    <div class="dropdown-menu" role="combobox"
                                                        style="max-height: 286px; overflow: hidden; min-height: 129px; position: absolute; will-change: transform; min-width: 570px; top: 0px; left: 0px; transform: translate3d(0px, -2px, 0px);"
                                                        x-placement="top-start">
                                                        <div class="inner show" role="listbox"
                                                            aria-expanded="false" tabindex="-1"
                                                            style="max-height: 286px; overflow-y: auto; min-height: 129px;">
                                                            <ul class="dropdown-menu inner show">
                                                                <li class="selected active"><a role="option"
                                                                        class="dropdown-item selected active"
                                                                        aria-disabled="false" tabindex="0"
                                                                        aria-selected="true"><span
                                                                            class="text">All
                                                                            Location</span></a></li>
                                                                <li><a role="option" class="dropdown-item"
                                                                        aria-disabled="false" tabindex="0"
                                                                        aria-selected="false"><span
                                                                            class="text">Default
                                                                            Sorting 1</span></a></li>
                                                                <li><a role="option" class="dropdown-item"
                                                                        aria-disabled="false" tabindex="0"
                                                                        aria-selected="false"><span
                                                                            class="text">Default
                                                                            Sorting 2</span></a></li>
                                                                <li><a role="option" class="dropdown-item"
                                                                        aria-disabled="false" tabindex="0"
                                                                        aria-selected="false"><span
                                                                            class="text">Default
                                                                            Sorting 3</span></a></li>
                                                                <li><a role="option" class="dropdown-item"
                                                                        aria-disabled="false" tabindex="0"
                                                                        aria-selected="false"><span
                                                                            class="text">Default
                                                                            Sorting 4</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="input_box">
                                                <div class="dropdown bootstrap-select" style="width: 100%;"><select
                                                        class="selectpicker" data-width="100%" tabindex="-98">
                                                        <option selected="selected">All Price type</option>
                                                        <option>Default Sorting 1</option>
                                                        <option>Default Sorting 2</option>
                                                        <option>Default Sorting 3</option>
                                                        <option>Default Sorting 4</option>
                                                    </select>
                                                    <div class="dropdown-menu " role="combobox">
                                                        <div class="inner show" role="listbox"
                                                            aria-expanded="false" tabindex="-1">
                                                            <ul class="dropdown-menu inner show"></ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-xl-4 col-lg-4">
                                <div class="single_tags_check__box">
                                    <input type="checkbox" name="pets-friendly" id="tag_1">
                                    <label for="tag_1"><span></span>Pets Friendly</label>
                                </div>
                                <div class="single_tags_check__box">
                                    <input type="checkbox" name="plumbing" id="tag_2" checked="">
                                    <label for="tag_2"><span></span>Car Rent</label>
                                </div>
                                <div class="single_tags_check__box">
                                    <input type="checkbox" name="house-cleaning" id="tag_3">
                                    <label for="tag_3"><span></span>House Cleaning</label>
                                </div>
                                <div class="single_tags_check__box">
                                    <input type="checkbox" name="business-financing" id="tag_4">
                                    <label for="tag_4"><span></span>Business Financing</label>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4">
                                <div class="single_tags_check__box">
                                    <input type="checkbox" name="accepts-credit Cards" id="tag_5">
                                    <label for="tag_5"><span></span>Accepts Credit Cards</label>
                                </div>
                                <div class="single_tags_check__box">
                                    <input type="checkbox" name="bike-parking" id="tag_6">
                                    <label for="tag_6"><span></span>Bike Parking</label>
                                </div>
                                <div class="single_tags_check__box">
                                    <input type="checkbox" name="coupons" id="tag_7">
                                    <label for="tag_7"><span></span>Coupons</label>
                                </div>
                                <div class="single_tags_check__box">
                                    <input type="checkbox" name="parking-street" id="tag_8">
                                    <label for="tag_8"><span></span>Parking Street</label>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4">
                                <div class="single_tags_check__box">
                                    <input type="checkbox" name="wireless-internet" id="tag_9">
                                    <label for="tag_9"><span></span>Wireless Internet</label>
                                </div>
                                <div class="single_tags_check__box">
                                    <input type="checkbox" name="smoking-allowed" id="tag_10">
                                    <label for="tag_10"><span></span>Smoking Allowed</label>
                                </div>
                                <div class="single_tags_check__box">
                                    <input type="checkbox" name="bed-&amp;-breakfast" id="tag_11">
                                    <label for="tag_11"><span></span>Bed &amp; Breakfast</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="listings_btn">
                                    <a href="#" class="thm-btn px-3"><span
                                            class="icon-magnifying-glass"></span>Search</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>





        <section class="filter">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="filter_inner_content">
                            <div class="left">
                                <div class="left_icon">
                                    <a href="tourtravel-listing-grid.html" class="icon-grid"></a>
                                    <a href="#" class="list-icon icon-list active"></a>
                                </div>
                                <div class="left_text">
                                    <h4>Lorem ipsum dolor sit amet </h4>
                                </div>
                            </div>
                            <div class="right">
                                <div class="shorting">
                                    <div class="dropdown bootstrap-select" style="width: 100%;"><select
                                            class="selectpicker" data-width="100%" tabindex="-98">
                                            <option selected="selected">Default Sorting</option>
                                            <option>Default Sorting 1</option>
                                            <option>Default Sorting 2</option>
                                            <option>Default Sorting 3</option>
                                            <option>Default Sorting 4</option>
                                        </select>
                                        <div class="dropdown-menu " role="combobox">
                                            <div class="inner show" role="listbox" aria-expanded="false"
                                                tabindex="-1">
                                                <ul class="dropdown-menu inner show"></ul>
                                            </div>
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
                <div class="row">
                    <div class="col-xl-6 col-md-12 col-sm-12">
                        <div class="listings_two_page_content">
                            <!--listings Two Page Single-->
                            <div class="listings_two_page_single">
                                <div class="listings_two_page_img">
                                    <img src="{{ URL::asset('assets/frontend/images/listings/tour1.jpg')}}" alt="">

                                    <div class="heart_icon">
                                        <i class="icon-heart"></i>
                                    </div>
                                </div>
                                <div class="listings_three-page_contentt pt-3">
                                    <div class="title">
                                        <h3><a href="{{route('Tourtraveldetails')}}">Fly Services Pvt Ltd<span
                                                    class="fa fa-check"></span></a></h3>
                                        <p>Halvorson, Adrienview 73379</p>
                                    </div>
                                    <ul class="list-unstyled listings_three-page_contact_info">
                                        <li>
                                            <a class="rating_listt" href="#">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <span class="gry_clr"><i class="fas fa-star"> </i></span>
                                                <span class="clr_blackk">4.0</span> </a>
                                        </li>
                                        <li><a href="#"><i class="fas fa-tags"></i>Air Travel Agents</a></li>
                                        <li><a href="#"><i class="fas fa-map-marker-alt"></i> Get Direction</a></li>
                                    </ul>
                                    <div class="listings_three-page_content_bottom">
                                        <div class="left">

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
                                    <img src="{{ URL::asset('assets/frontend/images/listings/tour1.jpg')}}" alt="">

                                    <div class="heart_icon">
                                        <i class="icon-heart"></i>
                                    </div>
                                </div>
                                <div class="listings_three-page_contentt pt-3">
                                    <div class="title">
                                        <h3><a href="{{route('Tourtraveldetails')}}">Fly Services Pvt Ltd<span
                                                    class="fa fa-check"></span></a></h3>
                                        <p>Halvorson, Adrienview 73379</p>
                                    </div>
                                    <ul class="list-unstyled listings_three-page_contact_info">
                                        <li>
                                            <a class="rating_listt" href="#">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <span class="gry_clr"><i class="fas fa-star"> </i></span>
                                                <span class="clr_blackk">4.0</span> </a>
                                        </li>
                                        <li><a href="#"><i class="fas fa-tags"></i>Air Travel Agents</a></li>
                                        <li><a href="#"><i class="fas fa-map-marker-alt"></i> Get Direction</a></li>
                                    </ul>
                                    <div class="listings_three-page_content_bottom">
                                        <div class="left">

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
                                    <img src="{{ URL::asset('assets/frontend/images/listings/tour1.jpg')}}" alt="">

                                    <div class="heart_icon">
                                        <i class="icon-heart"></i>
                                    </div>
                                </div>
                                <div class="listings_three-page_contentt pt-3">
                                    <div class="title">
                                        <h3><a href="{{route('Tourtraveldetails')}}">Fly Services Pvt Ltd<span
                                                    class="fa fa-check"></span></a></h3>
                                        <p>Halvorson, Adrienview 73379</p>
                                    </div>
                                    <ul class="list-unstyled listings_three-page_contact_info">
                                        <li>
                                            <a class="rating_listt" href="#">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <span class="gry_clr"><i class="fas fa-star"> </i></span>
                                                <span class="clr_blackk">4.0</span> </a>
                                        </li>
                                        <li><a href="#"><i class="fas fa-tags"></i>Air Travel Agents</a></li>
                                        <li><a href="#"><i class="fas fa-map-marker-alt"></i> Get Direction</a></li>
                                    </ul>
                                    <div class="listings_three-page_content_bottom">
                                        <div class="left">

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
                                    <img src="{{ URL::asset('assets/frontend/images/listings/tour1.jpg')}}" alt="">

                                    <div class="heart_icon">
                                        <i class="icon-heart"></i>
                                    </div>
                                </div>
                                <div class="listings_three-page_contentt pt-3">
                                    <div class="title">
                                        <h3><a href="{{route('Tourtraveldetails')}}">Fly Services Pvt Ltd<span
                                                    class="fa fa-check"></span></a></h3>
                                        <p>Halvorson, Adrienview 73379</p>
                                    </div>
                                    <ul class="list-unstyled listings_three-page_contact_info">
                                        <li>
                                            <a class="rating_listt" href="#">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <span class="gry_clr"><i class="fas fa-star"> </i></span>
                                                <span class="clr_blackk">4.0</span> </a>
                                        </li>
                                        <li><a href="#"><i class="fas fa-tags"></i>Air Travel Agents</a></li>
                                        <li><a href="#"><i class="fas fa-map-marker-alt"></i> Get Direction</a></li>
                                    </ul>
                                    <div class="listings_three-page_content_bottom">
                                        <div class="left">

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
                                    <img src="{{ URL::asset('assets/frontend/images/listings/tour1.jpg')}}" alt="">

                                    <div class="heart_icon">
                                        <i class="icon-heart"></i>
                                    </div>
                                </div>
                                <div class="listings_three-page_contentt pt-3">
                                    <div class="title">
                                        <h3><a href="{{route('Tourtraveldetails')}}">Fly Services Pvt Ltd<span
                                                    class="fa fa-check"></span></a></h3>
                                        <p>Halvorson, Adrienview 73379</p>
                                    </div>
                                    <ul class="list-unstyled listings_three-page_contact_info">
                                        <li>
                                            <a class="rating_listt" href="#">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <span class="gry_clr"><i class="fas fa-star"> </i></span>
                                                <span class="clr_blackk">4.0</span> </a>
                                        </li>
                                        <li><a href="#"><i class="fas fa-tags"></i>Air Travel Agents</a></li>
                                        <li><a href="#"><i class="fas fa-map-marker-alt"></i> Get Direction</a></li>
                                    </ul>
                                    <div class="listings_three-page_content_bottom">
                                        <div class="left">

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
                                    <img src="{{ URL::asset('assets/frontend/images/listings/tour1.jpg')}}" alt="">

                                    <div class="heart_icon">
                                        <i class="icon-heart"></i>
                                    </div>
                                </div>
                                <div class="listings_three-page_contentt pt-3">
                                    <div class="title">
                                        <h3><a href="{{route('Tourtraveldetails')}}">Fly Services Pvt Ltd<span
                                                    class="fa fa-check"></span></a></h3>
                                        <p>Halvorson, Adrienview 73379</p>
                                    </div>
                                    <ul class="list-unstyled listings_three-page_contact_info">
                                        <li>
                                            <a class="rating_listt" href="#">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <span class="gry_clr"><i class="fas fa-star"> </i></span>
                                                <span class="clr_blackk">4.0</span> </a>
                                        </li>
                                        <li><a href="#"><i class="fas fa-tags"></i>Air Travel Agents</a></li>
                                        <li><a href="#"><i class="fas fa-map-marker-alt"></i> Get Direction</a></li>
                                    </ul>
                                    <div class="listings_three-page_content_bottom">
                                        <div class="left">

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

    <script>
        $(document).ready(function() {
            $(".filter_by_tagstitile").click(function() {
                $(".filter_by_tagsall").toggle();
            });
        });
    </script>


</body>

</html>
@endsection
