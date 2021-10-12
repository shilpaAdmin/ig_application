@extends('frontend.layouts.master')
@section('title') Matrimoney Details @endsection
@section('content')

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

                @php
                    // media
                    if (isset($businessData['media_json']) && !empty($businessData['media_json'])) {
                        $attachmentArray = json_decode($businessData['media_json'], true);
                    } else {
                        $attachmentArray = [];
                    }
                    $q = 1;

                    // Education
                    if (isset($businessData['education_json']) && !empty($businessData['education_json'])) {
                        $educationArray = json_decode($businessData['education_json'], true);
                    } else {
                        $educationArray = [];
                    }


                @endphp

                @if (count($attachmentArray) > 0)
                    @for ($k = 0; $k < count($attachmentArray); $k++)
                        <div class="item">
                            <div class="listings_details_main_image_box_single">
                                <div class="listings_details_main_image_box__img height_fixed_matrimoney_detail">
                                    <img src="{{ URL::asset('images/matrimonial/media/'.$attachmentArray[$k]['Media'.($k+1)]) }}" alt="">
                                </div>
                            </div>
                        </div>
                    @endfor
                @else 
                    @for ($k = 0; $k < 3; $k++) 
                        <div class="item">
                            <div class="listings_details_main_image_box_single">
                                <div class="listings_details_main_image_box__img height_fixed_matrimoney_detail">
                                    <img src="{{ URL::asset('assets/frontend/images/listings/mat-1.jpg')}}" alt="">
                                </div>
                            </div>
                        </div>
                    @endfor
                @endif
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
                                <h4>{{ ucwords($businessData->full_name) }} <small class="text_green">Online Now</small> <i
                                        class="fa fa-check"></i></h4>
                            </div>
                            <small> <i class="fas fa-map-marker-alt"></i> {{ucwords($businessData->address)}}</small>
                            <br>
                            <small> {{$businessData->age }} Years Old </small>

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
                           
                           @php
                                $hiegherEducationName='';
                                if ( count($educationArray) > 0){
                                    $hiegherEducationName = ucwords($educationArray[0]['Education1Title']);
                                }
                            @endphp

                            <ul class="list-unstyled">
                                <li>Highest Education: {{ $hiegherEducationName }}</li>

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
                                <p class="first_text mb-0">{{ucfirst($businessData->about)}}</p>
                            </div>

                            
                            <div class="listings_details_text">
                                <h3 class="mb-3">Education</h3>


                                <div class="mat_eduDetails">
                                    @if (count($educationArray) > 0)
                                        @foreach ($educationArray as $key => $education)
                                            <p class="first_text mb-0 pl-5"> 
                                                <big>{{ ucwords($education['Education'.($key+1).'Title']) }}</big> <br>
                                                {{ ucfirst($education['Education'.($key+1).'Description']) }}
                                            </p>
                                        @endforeach
                                    @endif
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
                                            <p><i class="fas fa-dot-circle"></i>{{$businessData->age }} Years Old</p>
                                        </div>
                                    </div>
                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i> {{$businessData->height}}" Height </p>
                                        </div>
                                    </div>

                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                           
                                            <p><i class="fas fa-dot-circle"></i> {{ $businessData->married? "Married":"Never Married"}} </p>
                                        </div>
                                    </div>

                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i> From {{$businessData->desired_religion ? ucwords($businessData->desired_religion) : '-'}} Community </p>
                                        </div>
                                    </div>

                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i> Mother Toung {{$businessData->desired_mother_tongue ? ucwords($businessData->desired_mother_tongue) : '-'}} </p>
                                        </div>
                                    </div>

                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i> Living in {{$businessData->city ? ucwords($businessData->city) : '-'}} </p>
                                        </div>
                                    </div>

                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i> Earns USD {{$businessData->annual_income ? $businessData->annual_income : '0.0000'	}} annually </p>
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
                    <div class="col-6 text-right"> <a href="{{route('matrimoney')}}" class="link-simple"> View All </a> </div>
                </div>

                <div class="row">

                    @if (count($similarData)> 0)
                        @foreach ($similarData as $busines)

                            @php
                            
                                if (isset($busines['media_json']) && !empty($similarDatas['media_json'])) {
                                    $attachmentArray = json_decode($similarDatas['media_json'], true);
                                } else {
                                    $attachmentArray = [];
                                }
                                $q = 1;

                                if(count($attachmentArray)){
                                    $imageUrl= URL::to('/images/matrimonial/media').'/'.$attachmentArray[0]['Media1'] ;
                                } else {
                                    $imageUrl=URL::asset('assets/frontend/images/listings/mat1.jpg');
                                }

                                if (isset($busines) && isset($busines->slug)) {
                                    $detailPageUrl = route('matrimoney.details',['slug'=>$busines->slug]);
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
                                                <h3><a href="{{$detailPageUrl}}">{{ ucwords($busines->full_name) }}</a> </h3>
                                                <small>{{$busines->created_at->diffForHumans()}}</small>
                                                <p class="mb-0"> <i class="fas fa-map-marker-alt"></i> {{ ucwords($busines->city) }} </p>
                                            </div>
                                            <ul class="list-unstyled listings_three-page_contact_info">
                                                <li> <i class="fas fa-circle font_small10"></i> {{ $busines->age }} year old, {{$busines->height}}" height </li>
                                                <li> <i class="fas fa-circle font_small10"></i>{{ ucwords($busines->caste) }} </li>
                                                <li> <i class="fas fa-circle font_small10"></i> {{ ucwords($busines->designation) }}</li>
                                            </ul>
                                            <div class="listings_three-page_content_bottom">
                                                <div class="left">

                                                </div>
                                                <div>
                                                    <a href="{{$detailPageUrl}}" class="enqurebtnbox hvr-shutter-in-vertical">View Detail</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </section>    </div><!-- /.page-wrapper -->

@endsection
