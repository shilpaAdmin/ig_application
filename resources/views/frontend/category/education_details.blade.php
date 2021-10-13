@extends('frontend.layouts.master')
@section('title') Education Details @endsection
@section('content')

    <div class="preloader">
        <img src="{{ URL::asset('assets/frontend/images/loader.png')}}" class="preloader__image" alt="">
    </div><!-- /.preloader -->

    <div class="page-wrapper">


        <!-- Listings Details Main Image Box Start-->
        <section class="listings_details_main_image_box">
            @include('frontend.category.details-page-image-list.image-list')
        </section>

        <!--Main Bottom Start-->
        <section class="main_bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="main_bottom_left">
                            <div class="main_bottom_content">

                                <div class="icon">
                                    <span><i class="fas fa-user-graduate"></i></span>
                                </div>
                            </div>
                            <div class="main_bottom_left_title">
                                <h4>{{ ucwords($businessData['name']) }}<i class="fa fa-check"></i></h4>
                                <small>{{ ucwords($businessData['address']) }}, {{ ucwords($businessData['description']) }} </small>

                            </div>
                            <div class="main_bottom_rating_time">

                                <div class="main_bottom_time">
                                    <p><i class="fas fa-bolt text_green"></i> 250+ Students enrolled this week</p>
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
                                <a href="#">Enroll Now</a>

                            </div>

                            <ul class="list-unstyled">
                                <li>Duration<span> 16 Jul - 31 Aug </span></li>
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
                                <p class="first_text mb-0">{{ ucfirst($businessData['about']) }}</p>
                            </div>


                            <div class="listings_details_text">
                                <h3 class="mb-3">More About</h3>

                                <div class="house_detaill_main clearfix">
                                    <div class="house_detaill">
                                        <div> <i class="fas fa-chalkboard-teacher"></i> </div>
                                        <div class="house_desc">200+ Lectures</div>
                                    </div>
                                    <div class="house_detaill">
                                        <div> <i class="far fa-file-pdf"></i> </div>
                                        <div class="house_desc">100+ PDFs</div>
                                    </div>
                                    <div class="house_detaill">
                                        <div><i class="fas fa-spell-check"></i> </div>
                                        <div class="house_desc">12+ Mock Test</div>
                                    </div>
                                </div>
                            </div>





                            <div class="listings_details_features border-bottom-0">
                                <div class="listings_details_features_title">
                                    <h3 class="mb-3">Syllabus</h3>
                                </div>
                                <div class="row">
                                    <div class="faq_one_right box-shadow-none">
                                        <div class="accrodion-grp" data-grp-name="faq-one-accrodion">
                                            <div class="accrodion">
                                                <div class="accrodion-title">
                                                    <h4>Relations and Functions</h4>
                                                </div>
                                                <div class="accrodion-content">
                                                    <div class="inner">
                                                        <p>There are many variations of passages the majority have
                                                            suffered
                                                            alteration in some fo injected humour, randomised words
                                                            believable. There are many variations of passages the
                                                            majority have suffered
                                                            alteration in some fo injected humour, randomised words
                                                            believable.</p>
                                                    </div><!-- /.inner -->
                                                </div>
                                            </div>
                                            <div class="accrodion active">
                                                <div class="accrodion-title">
                                                    <h4>Trigonometric Functions</h4>
                                                </div>
                                                <div class="accrodion-content">
                                                    <div class="inner">
                                                        <p>There are many variations of passages the majority have
                                                            suffered
                                                            alteration in some fo injected humour, randomised words
                                                            believable.</p>
                                                    </div><!-- /.inner -->
                                                </div>
                                            </div>
                                            <div class="accrodion">
                                                <div class="accrodion-title">
                                                    <h4>Principle of Mathematical Induction</h4>
                                                </div>
                                                <div class="accrodion-content">
                                                    <div class="inner">
                                                        <p>There are many variations of passages the majority have
                                                            suffered
                                                            alteration in some fo injected humour, randomised words
                                                            believable.</p>
                                                    </div><!-- /.inner -->
                                                </div>
                                            </div>
                                            <div class="accrodion">
                                                <div class="accrodion-title">
                                                    <h4>Permutation and Combination</h4>
                                                </div>
                                                <div class="accrodion-content">
                                                    <div class="inner">
                                                        <p>There are many variations of passages the majority have
                                                            suffered
                                                            alteration in some fo injected humour, randomised words
                                                            believable.</p>
                                                    </div><!-- /.inner -->
                                                </div>
                                            </div>
                                            <div class="accrodion">
                                                <div class="accrodion-title">
                                                    <h4>Co-ordinate Geometry</h4>
                                                </div>
                                                <div class="accrodion-content">
                                                    <div class="inner">
                                                        <p>There are many variations of passages the majority have
                                                            suffered
                                                            alteration in some fo injected humour, randomised words
                                                            believable.</p>
                                                    </div><!-- /.inner -->
                                                </div>
                                            </div>
                                            <div class="accrodion">
                                                <div class="accrodion-title">
                                                    <h4>Sequence and Series</h4>
                                                </div>
                                                <div class="accrodion-content">
                                                    <div class="inner">
                                                        <p>There are many variations of passages the majority have
                                                            suffered
                                                            alteration in some fo injected humour, randomised words
                                                            believable.</p>
                                                    </div><!-- /.inner -->
                                                </div>
                                            </div>





                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="listings_details_sidebar">

                            <div class="listings_details_sidebar__single additional_info">
                                <h3 class="listings_details_sidebar__title">Faculty Names</h3>
                                <div class="additional_info_details">
                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i>Joana Mark</p>
                                        </div>
                                    </div>

                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i>Kira Williams</p>
                                        </div>
                                    </div>

                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i>Sharon williams</p>
                                        </div>
                                    </div>

                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i>Markopolo Andrew</p>
                                        </div>
                                    </div>

                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i>Karl Semolind</p>
                                        </div>
                                    </div>

                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i>Justin Biber</p>
                                        </div>
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        @if (isset($similarData))
            <section class="mt-5 mb-5">
                <div class="container">
                    <div class="row mb-4">
                        <div class="col-6">
                            <h4>Similar&nbsp;Courses</h4>
                        </div>
                        <div class="col-6 text-right"> <a href="education-listing-list.html" class="link-simple"> View
                                All </a> </div>
                    </div>

                    <div class="row">

                        @foreach($similarData as $similarDatas)
                            @php
                           
                                if (isset($similarDatas['media_file_json']) && !empty($similarDatas['media_file_json'])) {
                                    $attachmentArray = json_decode($similarDatas['media_file_json'], true);
                                } else {
                                    $attachmentArray = [];
                                }
                                $q = 1;
                                if(count($attachmentArray)){
                                    $imageUrl= URL::to('/images/business').'/'.$attachmentArray[0]['Media1'] ;
                                } else {
                                    $imageUrl= URL::asset('assets/frontend/images/listings/education2.jpg');
                                }

                                if (isset($similarDatas->category) && isset($similarDatas->category->slug)) {
                                    $detailPageUrl = route('housing.details',['slug'=>$similarDatas->category->slug,'business_slug'=>$similarDatas['slug'] ]);
                                } else {
                                    $detailPageUrl = "javascript:void(0);";
                                }
                            @endphp

                            <div class="col-xl-6 col-md-12 col-sm-12">
                                <div class="listings_two_page_content joblist_shadow">
                                    <div class="listings_two_page_single overflow-y__hidden">
                                        <div class="listings_two_page_img">
                                            <img src="{{ $imageUrl }}" alt="">

                                            <div class="heart_icon">
                                                <i class="icon-heart"></i>
                                            </div>
                                        </div>
                                        <div class="listings_three-page_content pt-3">
                                            <div class="title">
                                                <h3><a href="{{$detailPageUrl}}">{{ ucwords($similarDatas['name']) }}<span
                                                            class="fa fa-check"></span></a></h3>

                                                <p class="mb-0">{{ $similarDatas['address'] }} , {{ ucwords($similarDatas['description']) }}</p>
                                                <p class="mb-0"> <i class="fas fa-map-marker-alt"></i> 4.5km Away
                                                    from you</p>
                                            </div>
                                            <ul class="list-unstyled listings_three-page_contact_info">
                                                <li class="d-inline-block">
                                                    <h6> 250+ Students enrolled this week </h6>
                                                </li>
                                            </ul>
                                            <div class="listings_three-page_content_bottom">
                                                <div class="left">
                                                    <a class="job_list_pill mb-0" href="#"> DE / EN </a>
                                                </div>
                                                <div>
                                                    <a href="{{ $detailPageUrl }}" class="enqurebtnbox hvr-shutter-in-vertical">View Detail</a>
                                                    <a href="#"><i class="fas fa-phone-alt callbtnbox"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- <div class="col-xl-6 col-md-12 col-sm-12">
                            <div class="listings_two_page_content joblist_shadow">
                                <div class="listings_two_page_single overflow-y__hidden">
                                    <div class="listings_two_page_img">
                                        <img src="{{ URL::asset('assets/frontend/images/listings/education2.jpg')}}" alt="">

                                        <div class="heart_icon">
                                            <i class="icon-heart"></i>
                                        </div>
                                    </div>
                                    <div class="listings_three-page_content pt-3">
                                        <div class="title">
                                            <h3><a href="education-details.html">Carl Duisberg Centren<span
                                                        class="fa fa-check"></span></a></h3>

                                            <p class="mb-0">Halvorson , Adrienview 73379</p>
                                            <p class="mb-0"> <i class="fas fa-map-marker-alt"></i> 4.5km Away
                                                from you</p>
                                        </div>
                                        <ul class="list-unstyled listings_three-page_contact_info">
                                            <li class="d-inline-block">
                                                <h6> 250+ Students enrolled this week </h6>
                                            </li>
                                        </ul>
                                        <div class="listings_three-page_content_bottom">
                                            <div class="left">
                                                <a class="job_list_pill mb-0" href="#"> DE / EN </a>
                                            </div>
                                            <div>
                                                <a href="#" class="enqurebtnbox hvr-shutter-in-vertical">View Detail</a>
                                                <a href="#"><i class="fas fa-phone-alt callbtnbox"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </section>
        @endif
    </div><!-- /.page-wrapper -->
@endsection