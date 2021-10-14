@extends('frontend.layouts.master')
@section('title') Entertainment - Details @endsection
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
                                    <span> <i class="fas fa-user-tie"></i> </span>
                                </div>
                            </div>
                            <div class="main_bottom_left_title">
                                <h4>{{ ucwords($businessData['name']) }}<i class="fa fa-check"></i></h4>
                            </div>
                            <small> <i class="fas fa-map-marker-alt"></i> {{ ucwords($businessData['address']) }} </small> <br>
                            <small class="d-inline-block"> {{ ucfirst($businessData['about']) }} </small>

                            <div class="main_bottom_rating_time">


                            </div>
                        </div>
                    </div>
                   
                    <div class="col-xl-6 col-lg-6">
                        <div class="main_bottom_right">

                            @php
                                $units=null;
                                if(isset($businessData->unit_option) && !empty($businessData->unit_option)){
                                    $units=explode (",", isset($businessData->unit_option) ? $businessData->unit_option : ''); 
                                }
                            @endphp

                            @if (isset($units))
                                <div class="main_bottom_right_Buttons">
                                    @foreach ($units as $item)
                                        <div class="badge-pill badge-success d-inline-block mb-3 mr-3"> {{$item}} </div>
                                    @endforeach
                                </div>
                            @endif
                            <?php
                                $timestamp = strtotime( $businessData['created_at'] );
                                $date = date('M d,Y', $timestamp );
                            ?>
                            <ul class="list-unstyled">
                                <li>In Cinemas <span> {{$date}}</span></li>
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
                                {{-- <div class="badge-pill badge-cast d-inline-block mb-3 mr-3"> English </div>
                                <div class="badge-pill badge-cast d-inline-block mb-3 mr-3"> Hindi </div>
                                <div class="badge-pill badge-cast d-inline-block mb-3 mr-3"> Telugu </div>
                                <div class="badge-pill badge-cast d-inline-block mb-3 mr-3"> Tamil </div> --}}
                                <p class="first_text mb-0"> {{ ucfirst($businessData['about']) }} </p>
                            </div>

                            @php
                                $casts=null;
                                if(isset($businessData['realated_person_detail_json']) && !empty($businessData['realated_person_detail_json'])){
                                    $casts=json_decode($businessData['realated_person_detail_json'], true);
                                }
                            @endphp

                            <div class="listings_details_text">
                                <h3 class="mb-3">Cast</h3>
                                <div class="house_detaill_main clearfix">
                                    @if (isset($casts))
                                        @foreach ($casts as $key=>$cast)
                                            @php
                                                if( $cast['RelatedPersonImage'.($key+1)]) {
                                                    $imageUrl= URL::to('/images/business_related_person').'/'.$cast['RelatedPersonImage'.($key+1)];
                                                } else {
                                                    $imageUrl=URL::asset('assets/frontend/images/listings/cast1.jpg');
                                                }
                                            @endphp
                                            <div class="house_detaill text-center mb-5">
                                                <div> 
                                                    <img src="{{ $imageUrl }}" class="cast_imgs" alt="" width="100" height="100">
                                                </div>
                                                <div class="house_desc">{{$cast['RelatedPersonDetail'.($key+1)]}}</div>
                                            </div>
                                        @endforeach
                                    @endif
                                    
                                    {{-- remove next block --}}
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
                                    {!! $businessData['sub_descrition'] !!}
                                    {{-- <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i>Lorem, ipsum dolor.</p>
                                        </div>
                                    </div>
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i>Lorem ipsum dolor sit, amet.</p>
                                        </div>
                                    </div>
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i>Lorem, ipsum dolor sit.</p>
                                        </div>
                                    </div>
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i>Lorem, ipsum, dolor. </p>
                                        </div>
                                    </div>
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i>Lorem ipsum dolor sit, amet.</p>
                                        </div>
                                    </div> --}}

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
                            <h4>Similar&nbsp;Movies</h4>
                        </div>
                        <div class="col-6 text-right"> <a href="{{ $listPageUrl }}" class="link-simple"> View All </a> </div>
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
                                    $imageUrl= URL::asset('assets/frontend/images/listings/ent3.jpg');
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
    
                                            <div class="heart_icon">
                                                <i class="icon-heart"></i>
                                            </div>
                                        </div>
                                        <div class="listings_three-page_content pt-3">
                                            <div class="title">
                                                <h3><a href="{{$detailPageUrl}}">{{ ucwords($similarDatas['name']) }}</a> </h3>
    
                                                <p class="mb-0"> <i class="fas fa-tags"></i> Romance , Comedy </p>
                                                {{-- <p class="mb-0"> <i class="far fa-thumbs-up"></i> 3.57k Likes </p> --}}
                                            </div>
                                            @if (isset($units) && count($units))
                                                <ul class="list-unstyled listings_three-page_contact_info">
                                                    <li> <a class="job_list_pill" href="#"> {{$units[0]}} </a> </li>
                                                </ul>
                                            @endif
                                           
                                            <div class="listings_three-page_content_bottom">
                                                <div class="left">
    
                                                </div>
                                                <div>
                                                    <a href="{{ $detailPageUrl }}" class="enqurebtnbox hvr-shutter-in-vertical">View Detail</a>
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
                        </div> --}}


                    </div>
                </div>
            </section>
        @endif

    </div><!-- /.page-wrapper -->
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    @include('frontend.category.add_to_favourite')
@endsection