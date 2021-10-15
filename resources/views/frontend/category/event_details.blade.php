@extends('frontend.layouts.master')
@section('title') Event - Details @endsection
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
                                    <span> <i class="fas fa-glass-cheers"></i></span>
                                </div>
                            </div>
                            <div class="main_bottom_left_title">
                                <h4>{{ ucwords($businessData['name']) }}<i class="fa fa-check"></i></h4>
                            </div>

                            @php
                                $timestamp = strtotime( $businessData['created_at'] );
                                $createdDate = date('M d,Y', $timestamp );
                                // dd($businessData);
                                $hoursData=null;
                                $timeStr='10 AM - 7 PM';
                                if(isset($businessData->hours_json) && !empty($businessData->hours_json) ){
                                    $hoursData = json_decode($businessData->hours_json, true);
                                    if(isset($hoursData) && count($hoursData)){
                                        $date= date("l");
                                        if($date=="Sunday"){
                                            $timeStr=isset($hoursData['DisplaySun']) ? $hoursData['DisplaySun'] : '';
                                        } else if($date=="Monday"){
                                            $timeStr=isset($hoursData['DisplayMon']) ? $hoursData['DisplayMon'] : '';
                                        } else if($date=="Tuesday"){
                                            $timeStr=isset($hoursData['DisplayTue']) ? $hoursData['DisplayTue'] : '';
                                        } else if($date=="Wednesday"){
                                            $timeStr=isset($hoursData['DisplayWed']) ? $hoursData['DisplayWed'] : '';
                                        } else if($date=="Thursday"){
                                            $timeStr=isset($hoursData['DisplayThur']) ? $hoursData['DisplayThur'] : '';
                                        } else if($date=="Friday"){
                                            $timeStr=isset($hoursData['DisplayFri']) ? $hoursData['DisplayFri'] : '';
                                        } else if($date=="Saturday"){
                                            $timeStr=isset($hoursData['DisplaySat']) ? $hoursData['DisplaySat'] : '';
                                        } else {
                                            $timeStr='10 AM - 7 PM ';
                                        }
                                    }
                                }
                            @endphp
                            <small> <i class="fas fa-calendar-week"></i> {{$createdDate}}</small> <br>
                            {{-- <small> <i class="far fa-clock"></i> Monday : 10AM to 7PM </small> --}}
                            <small class="open-hour-popup"> <i class="far fa-clock"></i> {{$timeStr}}</small>

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
                                {{-- <div class="badge-pill badge-cast d-inline-block mb-3 mr-3"> $ 5000 - Inclusive of all
                                    taxes </div> --}}

                                <p class="first_text mb-0">{{ ucfirst($businessData['about']) }} </p>

                              

                            </div>



                            <div class="listings_details_features my-5 pb-5">
                                <div class="listings_details_features_title ">
                                    <h3 class="mb-3">Terms & Conditions</h3>
                                </div>
                                <div class="row">
                                @php
                                    //term and conditions
                                    $termsConditions=null;
                                    if(isset($businessData->sub_description_1) && !empty($businessData->sub_description_1)){
                                        $termsConditions=explode (".", isset($businessData->sub_description_1) ? $businessData->sub_description_1 : ''); 
                                    }
                                @endphp
                                    <div class="col-lg-12">
                                        @if (isset($termsConditions))
                                        <ul class="listings_details_features_list">
                                            @foreach ($termsConditions as $item)
                                                <li class="job_li_icon">{{ ucfirst($item) }}</li>
                                            @endforeach
{{--                                             
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
                                            </li> --}}
                                        </ul>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="listings_details_sidebar">

                            @php
                                $artists=null;
                                if(isset($businessData['realated_person_detail_json']) && !empty($businessData['realated_person_detail_json'])){
                                    $artists=json_decode($businessData['realated_person_detail_json'], true);
                                }
                            @endphp
                            <div class="listings_details_sidebar__single additional_info">
                                <h3 class="listings_details_sidebar__title">Artist Details</h3>
                                <div class="additional_info_details">
                                    @if (isset($artists) && count($artists))
                                        @foreach ($artists as $key=>$artist)
                                            <div class="additional_info_single">
                                                <div class="left">
                                                    <p><i class="fas fa-dot-circle"></i>{{ ucwords($artist['RelatedPersonDetail'.($key+1)]) }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif

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
                            <h4>Similar&nbsp;Events</h4>
                        </div>
                        <div class="col-6 text-right"> 
                            <a href="{{$listPageUrl}}" class="link-simple"> View All </a> 
                        </div>
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
                                    $imageUrl= URL::asset('assets/frontend/images/listings/event-list2.jpg');
                                }

                                if (isset($similarDatas->category) && isset($similarDatas->category->slug)) {
                                    $detailPageUrl = route('housing.details',['slug'=>$similarDatas->category->slug,'business_slug'=>$similarDatas['slug'] ]);
                                } else {
                                    $detailPageUrl = "javascript:void(0);";
                                }
                                $units=null;
                                if(isset($similarDatas->unit_option) && !empty($similarDatas->unit_option)){
                                    $units=explode (",", isset($similarDatas->unit_option) ? $similarDatas->unit_option : ''); 
                                }
                            @endphp

                            <div class="col-xl-6 col-md-12 col-sm-12">
                                <div class="listings_two_page_content joblist_shadow">
                                    <div class="listings_two_page_single overflow-y__hidden">
                                        <div class="listings_two_page_img">
                                            <img src="{{ $imageUrl }}" alt="">
                                            <div class="tag__promoted"> Promoted </div>
                                            <div class="heart_icon">
                                                <i class="icon-heart"></i>
                                            </div>
                                        </div>
                                        <div class="listings_three-page_content pt-3">
                                            <div class="title">
                                                <h3><a href="{{$detailPageUrl}}"> {{ ucwords($similarDatas['name']) }}<span
                                                            class="fa fa-check"></span></a></h3>
    
                                                <p class="mb-0">{{ ucwords($similarDatas['address']) }}</p>
                                            </div>
                                            @if (isset($units))
                                                <ul class="list-unstyled listings_three-page_contact_info">
                                                    @foreach ($units as $unit)
                                                        <li class="d-inline-block"><a class="job_list_pill" href="#"> {{ucwords($unit)}}</a></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                            <div class="listings_three-page_content_bottom">
                                                <div class="left">
                                                    <?php
                                                        $timestamp = strtotime( $similarDatas['created_at'] );
                                                        $date = date('M d,Y', $timestamp );
                                                    ?>
                                                    <h6>{{$date}}</h6>
                                                </div>
                                                <div>
                                                    <a href="#" class="enqurebtnbox hvr-shutter-in-vertical">Register Now</a>
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
