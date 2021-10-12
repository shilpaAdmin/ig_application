
@extends('frontend.layouts.master')
@section('title') Housing Details @endsection
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
                                    <span> <i class="fas fa-home"></i></span>
                                </div>
                            </div>
                            <div class="main_bottom_left_title">
                                <h4>{{ ucwords($businessData['name']) }}<i class="fa fa-check"></i></h4>
                                <small>{{ ucwords($businessData['about']) }}</small></br>
                                <small>{{ ucwords($businessData['address']) }}</small>


                            </div>
                            <div class="main_bottom_rating_time">

                                <div class="main_bottom_time">
                                    <p><span class="far fa-clock"></span>Posted {{ isset($businessData['created_at'])? $businessData['created_at']->diffForHumans() :'-'  }}</p>
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
                                <li>Selling Price<span>${{ $businessData['selling_price'] }}</span></li>
                                <li><a href="#">Add to Favourite<i class="far fa-heart"></i></a></li>
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
                                    <button type="button" class="btn btnunit">{{ ucwords($businessData['unit_option']) }} Appartment</button>
                                    {{-- <button type="button" class="btn btnunit">3 BHK Appartment</button>
                                    <button type="button" class="btn btnunit">4 BHK Appartment</button> --}}
                                </div>

                            </div>

                            <div class="listings_details_text">
                                <h3 class="mb-3">Description</h3>

                                <p class="first_text mb-0">{{ ucwords($businessData['description']) }}</p>

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
                                            <p><i class="fas fa-dot-circle"></i>{{ ucwords($businessData['sub_descrition']) }}</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="listings_details_sidebar__single contact_business">
                                <h3 class="listings_details_sidebar__title">Contact Business</h3>
                                <div class="contact_business_details">
                                    <input type="text" placeholder="Your name" name="name" value="{{ ucwords($businessData['contact_person_name']) }}" readonly>
                                    <input type="email" placeholder="Email address" name="email" value="{{ $businessData['mobile_number'] }}" readonly>
                                    <input type="text" placeholder="Contact Number" name="contact" value="{{ $businessData['email_id'] }}" readonly>
                                    {{-- <a href="#" class="thm-btn contact_business_btn">Send message</a> --}}
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
                            <h4>Similar&nbsp;Properties</h4>
                        </div>
                        <div class="col-6 text-right"> <a href="#" class="link-simple"> View All </a> </div>
                    </div>
                    <div class="row">
                        @foreach($similarData as $similarDatas)
                            <div class="col-xl-6 col-md-12 col-sm-12">
                                <div class="listings_two_page_content">
                                    <div class="listings_two_page_single">
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
                                                $imageUrl=URL::asset('assets/frontend/images/img/gridimglisthouse.png');
                                            }
                                            if (isset($similarDatas->category) && isset($similarDatas->category->slug)) {
                                                $detailPageUrl = route('housing.details',['slug'=>$similarDatas->category->slug,'business_slug'=>$similarDatas['slug'] ]);
                                            } else {
                                                $detailPageUrl = "javascript:void(0);";
                                            }
                                        @endphp

                                        <div class="listings_two_page_img">
                                            <img src="{{$imageUrl}}" alt="">
                                            <div class="heart_icon">
                                                <i class="icon-heart"></i>
                                            </div>
                                        </div>


                                        <div class="listings_three-page_contentt">
                                            <div class="title">
                                                <h3><a href="{{$detailPageUrl}}">{{ ucwords($similarDatas['name']) }}<span
                                                            class="fa fa-check"></span></a></h3>
                                                <p>{{ ucwords($similarDatas['address']) }} , {{ ucwords($similarDatas['description']) }}</p>
                                            </div>
                                            <ul class="list-unstyled listings_three-page_contact_info">
                                                <li><i class="fas fa-map-marker-alt"></i>4.5 km Away from you</li>
                                                <li><a href="#"><i class="fab fa-xing-square"></i>785.1 - 812.05 sq.ft.
                                                        onwards</a></li>
                                            </ul>
                                            <div class="listings_three-page_content_bottom">
                                                <div class="left">
                                                    <h6>{{ isset($similarDatas['created_at'])? $similarDatas['created_at']->diffForHumans() :'-' }}</h6>
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
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    </div><!-- /.page-wrapper -->

@endsection
