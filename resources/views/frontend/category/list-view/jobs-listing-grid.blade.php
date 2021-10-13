@foreach ($businessDatas as  $key => $business)

    @php

        $name= $business->name ? ucwords($business->name) :'-';
        $address= $business->address ? ucwords($business->address) :'-';
        $description= $business->description ? ucwords($business->description) :'-';
        $date=$business->created_at->diffForHumans();
        $about= $business->about ? ucwords($business->about) :'-';

        $images=json_decode($business->media_file_json, true);
        if(count($images)){
            $imageUrl= URL::to('/images/business').'/'.$images[0]['Media1'] ;
        } else {
            $imageUrl=URL::asset('assets/frontend/images/listings/job-grid.jpg');
        }

        $units=null;
        if(isset($business->unit_option) && !empty($business->unit_option)){
            $units=explode (",", isset($business->unit_option) ? $business->unit_option : ''); 
        }
        $detailsPageUrl= route('housing.details',['slug'=>$slug,'business_slug'=>$business->slug]);
    @endphp
    <div class="col-xl-4 col-md-6 col-sm-12">
        <div class="listings_three-page_single wow fadeInUp animated" data-wow-delay="0ms"
            data-wow-duration="1200ms"
            style="visibility: visible; animation-duration: 1200ms; animation-delay: 0ms; animation-name: fadeInUp;">
            <div class="listings_three-page_image">
                <img src="{{ $imageUrl }}" alt="">

                <div class="heart_icon">
                    <i class="icon-heart"></i>
                </div>

                <div class="shopping_circle">
                    <i class="fas fa-user-tie"></i>
                </div>
            </div>
            <div class="listings_three-page_content">
                <div class="title">
                    <h3><a href="{{$detailsPageUrl}}">{{$name}}<span class="fa fa-check"></span></a></h3>
                    <p class="mb-0">{{$about}}</p>
                    <p class="mb-0">{{$address}}</p>
                </div>
                @if (isset($units) && count($units))
                    <ul class="list-unstyled listings_three-page_contact_info">
                        @foreach ($units as $unit)
                            <li class="d-inline-block"><a class="job_list_pill" href="javascript:void(0);"> {{$unit}}</a></li>
                        @endforeach
                    </ul>
                @endif
                <div class="listings_three-page_content_bottom">
                    <div class="left">
                        <h6> </h6>
                    </div>
                    <div>
                        <a href="{{ $detailsPageUrl }}" class="enqurebtnbox hvr-shutter-in-vertical">View Detail</a>
                        <a href="#"><i class="fas fa-phone-alt callbtnbox"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach