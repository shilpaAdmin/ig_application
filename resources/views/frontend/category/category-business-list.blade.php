@extends('frontend.layouts.master')
@section('title') Housing Grid @endsection
@section('content')

    <div class="preloader">
        <img src="{{ URL::asset('assets/frontend/images/loader.png')}}" class="preloader__image" alt="">
    </div><!-- /.preloader -->

    <div class="page-wrapper">

        <section class="listings_three_content">
            <div class="container">


                <div class="filter_by_tags">

                    <div class="row">
                        <div class="col-xl-2 col-md-4">
                            <h3 class="filter_by_tagstitile">Filters <i class="fas fa-chevron-down filtertagicon"></i>
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
                                <div class="listings_btn pb-2">
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
                                    {{-- <a href="listings1.html" class="icon-grid active"></a>
                                    <a href="{{ route('HousingListingList') }}" class="list-icon icon-list"></a> --}}
                                    <a href="#" class="icon-grid active data-view" data-view="1"></a>
                                    <a href="#" class="list-icon icon-list data-view" data-view="0"></a>
                                </div>
                                <div class="left_text">
                                    <h4>Showing {{$total ? $total: 0 }} Results </h4>
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


        <section class="listings_three-page mt-5 mb-5">
            <div class="container">
                <div class="row" id="results">

                    {{-- <div class="col-xl-4 col-md-6 col-sm-12">
                        <!--Latest Listings Single-->
                        <div class="listings_three-page_single wow fadeInUp animated" data-wow-delay="0ms"
                            data-wow-duration="1200ms"
                            style="visibility: visible; animation-duration: 1200ms; animation-delay: 0ms; animation-name: fadeInUp;">
                            <div class="listings_three-page_image">
                                <img src="{{ URL::asset('assets/frontend/images/img/gridimglisthouse.png')}}" alt="">

                                <div class="heart_icon">
                                    <i class="icon-heart"></i>
                                </div>

                                <div class="shopping_circle">
                                    <i class="fas fa-home"></i>
                                </div>
                            </div>
                            <div class="listings_three-page_content">
                                <div class="title">
                                    <h3><a href="{{route('Housingdetails')}}">Luxoise Apartments<span
                                                class="fa fa-check"></span></a></h3>
                                    <p>Halvorson , Adrienview 73379</p>
                                </div>
                                <ul class="list-unstyled listings_three-page_contact_info">
                                    <li><i class="fas fa-map-marker-alt"></i>4.5 km Away from you</li>
                                    <li><a href="#"><i class="fab fa-xing-square"></i>785.1 - 812.05 sq.ft. onwards</a>
                                    </li>
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
                    <div class="col-xl-4 col-md-6 col-sm-12">
                        <!--Latest Listings Single-->
                        <div class="listings_three-page_single wow fadeInUp animated" data-wow-delay="0ms"
                            data-wow-duration="1200ms"
                            style="visibility: visible; animation-duration: 1200ms; animation-delay: 0ms; animation-name: fadeInUp;">
                            <div class="listings_three-page_image">
                                <img src="{{ URL::asset('assets/frontend/images/img/gridimglisthouse.png')}}" alt="">

                                <div class="heart_icon">
                                    <i class="icon-heart"></i>
                                </div>

                                <div class="shopping_circle">
                                    <i class="fas fa-home"></i>
                                </div>
                            </div>
                            <div class="listings_three-page_content">
                                <div class="title">
                                    <h3><a href="{{route('Housingdetails')}}">Luxoise Apartments<span
                                                class="fa fa-check"></span></a></h3>
                                    <p>Halvorson , Adrienview 73379</p>
                                </div>
                                <ul class="list-unstyled listings_three-page_contact_info">
                                    <li><i class="fas fa-map-marker-alt"></i>4.5 km Away from you</li>
                                    <li><a href="#"><i class="fab fa-xing-square"></i>785.1 - 812.05 sq.ft. onwards</a>
                                    </li>
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
                    <div class="col-xl-4 col-md-6 col-sm-12">
                        <!--Latest Listings Single-->
                        <div class="listings_three-page_single wow fadeInUp" data-wow-delay="0ms"
                            data-wow-duration="1200ms"
                            style="visibility: hidden; animation-duration: 1200ms; animation-delay: 0ms; animation-name: none;">
                            <div class="listings_three-page_image">
                                <img src="{{ URL::asset('assets/frontend/images/img/gridimglisthouse.png')}}" alt="">

                                <div class="heart_icon">
                                    <i class="icon-heart"></i>
                                </div>

                                <div class="shopping_circle">
                                    <i class="fas fa-home"></i>
                                </div>
                            </div>
                            <div class="listings_three-page_content">
                                <div class="title">
                                    <h3><a href="{{route('Housingdetails')}}">Luxoise Apartments<span
                                                class="fa fa-check"></span></a></h3>
                                    <p>Halvorson , Adrienview 73379</p>
                                </div>
                                <ul class="list-unstyled listings_three-page_contact_info">
                                    <li><i class="fas fa-map-marker-alt"></i>4.5 km Away from you</li>
                                    <li><a href="#"><i class="fab fa-xing-square"></i>785.1 - 812.05 sq.ft. onwards</a>
                                    </li>
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
                    <div class="col-xl-4 col-md-6 col-sm-12">
                        <!--Latest Listings Single-->
                        <div class="listings_three-page_single wow fadeInUp" data-wow-delay="0ms"
                            data-wow-duration="1200ms"
                            style="visibility: hidden; animation-duration: 1200ms; animation-delay: 0ms; animation-name: none;">
                            <div class="listings_three-page_image">
                                <img src="{{ URL::asset('assets/frontend/images/img/gridimglisthouse.png')}}" alt="">

                                <div class="heart_icon">
                                    <i class="icon-heart"></i>
                                </div>

                                <div class="shopping_circle">
                                    <i class="fas fa-home"></i>
                                </div>
                            </div>
                            <div class="listings_three-page_content">
                                <div class="title">
                                    <h3><a href="{{route('Housingdetails')}}">Luxoise Apartments<span
                                                class="fa fa-check"></span></a></h3>
                                    <p>Halvorson , Adrienview 73379</p>
                                </div>
                                <ul class="list-unstyled listings_three-page_contact_info">
                                    <li><i class="fas fa-map-marker-alt"></i>4.5 km Away from you</li>
                                    <li><a href="#"><i class="fab fa-xing-square"></i>785.1 - 812.05 sq.ft. onwards</a>
                                    </li>
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
                    <div class="col-xl-4 col-md-6 col-sm-12">
                        <!--Latest Listings Single-->
                        <div class="listings_three-page_single wow fadeInUp" data-wow-delay="0ms"
                            data-wow-duration="1200ms"
                            style="visibility: hidden; animation-duration: 1200ms; animation-delay: 0ms; animation-name: none;">
                            <div class="listings_three-page_image">
                                <img src="{{ URL::asset('assets/frontend/images/img/gridimglisthouse.png')}}" alt="">

                                <div class="heart_icon">
                                    <i class="icon-heart"></i>
                                </div>

                                <div class="shopping_circle">
                                    <i class="fas fa-home"></i>
                                </div>
                            </div>
                            <div class="listings_three-page_content">
                                <div class="title">
                                    <h3><a href="{{route('Housingdetails')}}">Luxoise Apartments<span
                                                class="fa fa-check"></span></a></h3>
                                    <p>Halvorson , Adrienview 73379</p>
                                </div>
                                <ul class="list-unstyled listings_three-page_contact_info">
                                    <li><i class="fas fa-map-marker-alt"></i>4.5 km Away from you</li>
                                    <li><a href="#"><i class="fab fa-xing-square"></i>785.1 - 812.05 sq.ft. onwards</a>
                                    </li>
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
                    <div class="col-xl-4 col-md-6 col-sm-12">
                        <!--Latest Listings Single-->
                        <div class="listings_three-page_single wow fadeInUp" data-wow-delay="0ms"
                            data-wow-duration="1200ms"
                            style="visibility: hidden; animation-duration: 1200ms; animation-delay: 0ms; animation-name: none;">
                            <div class="listings_three-page_image">
                                <img src="{{ URL::asset('assets/frontend/images/img/gridimglisthouse.png')}}" alt="">

                                <div class="heart_icon">
                                    <i class="icon-heart"></i>
                                </div>

                                <div class="shopping_circle">
                                    <i class="fas fa-home"></i>
                                </div>
                            </div>
                            <div class="listings_three-page_content">
                                <div class="title">
                                    <h3><a href="{{route('Housingdetails')}}">Luxoise Apartments<span
                                                class="fa fa-check"></span></a></h3>
                                    <p>Halvorson , Adrienview 73379</p>
                                </div>
                                <ul class="list-unstyled listings_three-page_contact_info">
                                    <li><i class="fas fa-map-marker-alt"></i>4.5 km Away from you</li>
                                    <li><a href="#"><i class="fab fa-xing-square"></i>785.1 - 812.05 sq.ft. onwards</a>
                                    </li>
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
                    </div> --}}
                </div>
                <div class="ajax-loading" style="text-align:center;"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAATYAAACjCAMAAAA3vsLfAAAAz1BMVEX////6+vr89PT+/Pz87OL86Nr89vaxvIL4sXv8///l6NbM1c2istT4r3b2l3f9lamwwdft8OX+9/SYlcuwu9XV2uajtNLO1eS4xNfz8+z19fGxvIXM07utuXyyvIrEy6j98Ov66ur707n84c/f3sb3pmW2wZX5u4z3rob5wJb4q2/86OP5y6/71b398+z64uH219L3p4v1nYD6vK32kXH2tKH2oZP1zcP4s6r1w7T7sbj9i6L7nq7Y2tX4xsjh5eXh5+38v8mpq9Khnc61tNbzoKeKAAACnElEQVR4nO3Za1PaQBiG4d0EA4EECKBgkIq1Vm1toK2lrVCh6P//Td1NsuXUAn6KGe7LmRw2+bDzzLuHoBAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAgJyz7ax7kEe2ZZHbC5yexifHspz4gqrbR9jtnemzia1RKJDbbkGvGOdmKSJOrdDIuk85EL4pFnuBqTZbpUa17eO8WCyem9j6KrV+1j3KhUDF1rXTlZRi2+3i7aWO6F2v15XpCmpmtkZEeP9z5ftXdyqe8vsz0xT19XLaP1Iy7Njrdu2XSn5pc93UoR0VMuhQPlg3Orfb9eZCHBuDdIlcubOuP/j+jRW3S/PIjmstSU2uvn+w1mP4eHf7ab09KkRseFfpeGRaQ1K6riuEq+/1n36QPEpaFq8ffM3JZODpWFz3YjCwFvfpVXyyndBZff2wmTlMnYefq9Xql6+WaTe1JaQdlLWGMI0bY/vQpINPHaP7qnb/bdFuYktSK5eXUz5sS9U2SnL77qb3i9jCJLWAajMW4Qjn8sdo9LPvmrAWsckwCspBaEvmttTy0qgXUleYBXQpUHVQn/Zplqyk/+L0Nz4HpCMZllsNHsbjibPaJiuVyi/+HbPF47hWq03WPgl0bJXKNJse5cFQpzZ+XG+ekttWOrXaUF3M/o5TGapDGOeWXb9euYfa5Lcaoc68OTdNnXpb/9A7pdp2em42n9Reo9WSOrZ6J+v+5EO72dTVdux5x3FsdepsH3MVW1uIlue11CynYuuw+dht9qSKTQ3PE887UbOaLje2urvN1Mw2EyY2EarcZtn2KBfs1rPedIiO58WLQdhuZ9uhfGl7Hnm9nN1hKQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACA3PsD/R0hdMCZUboAAAAASUVORK5CYII=" /></div>
            </div>
        </section>
    </div><!-- /.page-wrapper -->


    @section('script')

    <script>
        $(document).ready(function(){
            
            var page = 1;
            var viewData=1;
            var hasLoadMore=true;
            loadMore(page,viewData);

            // scroll events
            $(window).scroll(function() { 
                if($(window).scrollTop() + $(window).height() >= ( $(document).height() - $('.site-footer').height() )) { 
                    page++; 
                    if(hasLoadMore){
                        loadMore(page,viewData); 
                    } 
                }
            });  

            // load more data
            function loadMore(page,viewData){
                // console.log("{!!$slug!!}");
                var url="{!!route('category.business-list',['slug'=>$slug])!!}";
                    url+='?page='+page+'&viewData='+viewData;

                $.ajax({
                        type: 'get',
                        url:url ,
                        dataType: 'json',
                        async: true,
                        beforeSend: function() {
                            $('.ajax-loading').show();
                        },
                        success: function(data) {
                          
                            if(data.html.length == 0){
                                // $('.ajax-loading').html("No more records!");
                                hasLoadMore=false;
                                return;
                            }
                            $("#results").append(data.html);          
                        },
                        error: function(XMLHttpRequest, errorStatus, errorThrown) {
                            console.log("XHR :: " + JSON.stringify(XMLHttpRequest));
                            console.log("Status :: " + errorStatus);
                            console.log("error :: " + errorThrown);
                        },
                        complete: function() {
                            $('.ajax-loading').hide(); 
                        },
                    });
            }

            //  show grid or list view 
            $(document).on('click','.data-view',function(e) {
                e.preventDefault();
                $('.ajax-loading').hide(); 
                viewData = $(this).attr("data-view");
                $('.data-view').removeClass('active');
                $(this).addClass('active');
                page = 1;
                hasLoadMore=true;
                $("#results").html('');
                loadMore(page,viewData);
            });
            
            // filter 
            $("body .filter_by_tagstitile").click(function() {
                $(".filter_by_tagsall").toggle();
            });
        });
    </script>
    @endsection


@endsection
