@extends('frontend.layouts.master')
@section('title') Tour Travel Details @endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@endsection
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
                                    <span><i class="far fa-map"></i></span>
                                </div>
                            </div>
                            <div class="main_bottom_left_title">
                                <h4>{{ ucwords($businessData['name']) }}<i class="fa fa-check"></i></h4>
                                <small>{{ ucwords($businessData['address']) }}, {{ ucwords($businessData['description']) }} </small>
                            </div>
                            <div class="main_bottom_rating_time">
                                <div class="mr-3">
                                    <i class="fas fa-tag "></i> Air Travel agents
                                </div>
                                {{-- <div class="main_bottom_rating">

                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#" class="clr-gray"><i class="fas fa-star"></i></a>
                                    <a href="#" class="clr-gray"><i class="fas fa-star"></i></a>
                                    <a href="#" class="clr-black">4.8</a>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6">
                        <div class="main_bottom_right">

                            <div class="main_bottom_right_Buttons">
                                <a href="#">Enquire Now</a>
                            </div>
                            @php
                                $hoursData=null;
                                $timeStr='10 AM - 7 PM';
                                if(isset($businessData->hours_json) && !empty($businessData->hours_json) ){
                                    $hoursData = json_decode($businessData->hours_json, true);
                                    if(isset($hoursData) && count($hoursData)){
                                        $date= date("l");
                                        if($date=="Sunday"){
                                            $timeStr=$hoursData['DisplaySun'];
                                        } else if($date=="Monday"){
                                            $timeStr=$hoursData['DisplayMon'];
                                        } else if($date=="Tuesday"){
                                            $timeStr=$hoursData['DisplayTue'];
                                        } else if($date=="Wednesday"){
                                            $timeStr=$hoursData['DisplayWed'];
                                        } else if($date=="Thursday"){
                                            $timeStr=$hoursData['DisplayThur'];
                                        } else if($date=="Friday"){
                                            $timeStr=$hoursData['DisplayFri'];
                                        } else if($date=="Saturday"){
                                            $timeStr=$hoursData['DisplaySat'];
                                        } else {
                                            $timeStr='10 AM - 7 PM ';
                                        }
                                    }
                                }
                            @endphp
                            <ul class="list-unstyled">
                                @if (isset($hoursData))
                                    <li ><a href="#" class="open-hour-popup" ><span> {{ $timeStr }}</span></a></li>
                                @endif
                                {{-- <li><a href="#">Add to Wishlist<i class="far fa-heart"></i></a></li> --}}
                                <li><a href="#"  class="add-to-favourite" data-businessid="{{$businessData->id}}">Add to Favourite<i class="far fa-heart"></i></a></li>
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
                                <p class="first_text mb-0"> {{ ucfirst($businessData['about']) }} </p>
                            </div>

                            <div class="listings_details_features border-bottom-0">
                                <div class="listings_details_features_title">
                                    <h3 class="mb-3">Contact Information</h3>
                                </div>
                                <div class="row tax_contact_main">
                                    <div class="col-sm-12">
                                        <span class="tax_contact text_green"> <i class="far fa-user"></i> </span>
                                        {{ isset($businessData['contact_person_name']) ? ucwords($businessData['contact_person_name']) :'-' }}
                                    </div>
                                    <div class="col-sm-12">
                                        <span class="tax_contact text_green"> <i class="fas fa-mobile-alt"></i>
                                        </span> {{isset($businessData['mobile_number']) ? $businessData['mobile_number'] : '-'}}
                                    </div>
                                    <div class="col-sm-12">
                                        <span class="tax_contact text_green"> <i class="far fa-envelope"></i> </span>
                                        {{ isset($businessData['email_id']) ? $businessData['email_id'] : '-'}}
                                    </div>
                                    <div class="col-sm-12">
                                        <span class="tax_contact text_green"> <i class="fas fa-map-marker-alt"></i>
                                        </span> {{isset($businessData['address']) ? ucwords($businessData['address']) : '-'}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="listings_details_sidebar">

                            <div class="listings_details_sidebar__single additional_info">
                                <h3 class="listings_details_sidebar__title mb-0"> Services Offered </h3>
                                <div class="additional_info_details">
                                    {!! $businessData['sub_descrition'] !!}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        @if (isset($similarData))
            @php
                $currentUrl = request()->segments();
                $slug= isset($currentUrl[1]) ? $currentUrl[1] : $currentUrl[0] ;
                $listPageUrl= route('category.business-list',['slug'=>$slug]);
            @endphp
            <section class="mt-5 mb-5">
                <div class="container">
                    <div class="row mb-4">
                        <div class="col-6">
                            <h4>Similar&nbsp;Providers</h4>
                        </div>
                        <div class="col-6 text-right"> <a href="{{$listPageUrl}}" class="link-simple"> View
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
                                    $imageUrl= URL::asset('assets/frontend/images/listings/tour1.jpg');
                                }

                                if (isset($similarDatas->category) && isset($similarDatas->category->slug)) {
                                    $detailPageUrl = route('housing.details',['slug'=>$similarDatas->category->slug,'business_slug'=>$similarDatas['slug'] ]);
                                } else {
                                    $detailPageUrl = "javascript:void(0);";
                                }
                            @endphp
                             <div class="col-xl-6 col-md-12 col-sm-12">
                                <div class="listings_two_page_content">
                                    <div class="listings_two_page_single">
                                        <div class="listings_two_page_img">
                                            <img src="{{ $imageUrl}}" alt="">
    
                                            <div class="heart_icon">
                                                <i class="icon-heart"></i>
                                            </div>
                                        </div>
                                        <div class="listings_three-page_contentt pt-3">
                                            <div class="title">
                                                <h3><a href="{{ $detailPageUrl }}">{{ ucwords($similarDatas['name']) }}<span
                                                            class="fa fa-check"></span></a></h3>
                                                <p>{{ $similarDatas['about'] }}</p>
                                            </div>
                                            <ul class="list-unstyled listings_three-page_contact_info">
                                                {{-- <li>
                                                    <a class="rating_listt" href="#">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <span class="gry_clr"><i class="fas fa-star"> </i></span>
                                                        <span class="clr_blackk">4.0</span> </a>
                                                </li> --}}
                                                <li><a href="#"><i class="fas fa-tags"></i>Air Travel Agents</a></li>
                                                <li><a href="#"><i class="fas fa-map-marker-alt"></i> {{ $similarDatas['address'] }}</a></li>
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
                        @endforeach

                    </div>
                </div>
            </section>
        @endif
    </div><!-- /.page-wrapper -->
    @include('frontend.models.hours-model')
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    @include('frontend.category.add_to_favourite')
@endsection
