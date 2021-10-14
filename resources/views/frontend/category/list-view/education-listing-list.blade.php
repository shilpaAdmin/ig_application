@foreach ($businessDatas as  $key => $business)

    @php

        $name= $business->name ? ucwords($business->name) :'-';
        $address= $business->address ? ucwords($business->address) :'-';
        $about= $business->about ? ucwords($business->about) :'-';
        $description= $business->description ? ucwords($business->description) :'-';
        $date=$business->created_at->diffForHumans();

        $images=json_decode($business->media_file_json, true);
        if(count($images)){
            $imageUrl= URL::to('/images/business').'/'.$images[0]['Media1'] ;
        } else {
            $imageUrl=URL::asset('assets/frontend/images/listings/education1.jpg');
        }
        $detailsPageUrl= route('housing.details',['slug'=>$slug,'business_slug'=>$business->slug]);
        $units=null;
        if(isset($business->unit_option) && !empty($business->unit_option)){
            $units=explode (",", isset($business->unit_option) ? $business->unit_option : ''); 
        }
    @endphp

    <div class="col-xl-6 col-md-12 col-sm-12">
        <div class="listings_two_page_content joblist_shadow">
        
            <div class="listings_two_page_single overflow-y__hidden">
                <div class="listings_two_page_img">
                    <img src="{{$imageUrl}}" alt="">

                    <div class="heart_icon">
                        <i class="icon-heart"></i>
                    </div>
                </div>
                <div class="listings_three-page_content pt-3">
                    <div class="title">
                        <h3><a href="{{$detailsPageUrl}}">{{$name}}<span class="fa fa-check"></span></a></h3>

                        <p class="mb-0">{{$about}} </p>
                        <p class="mb-0"> <i class="fas fa-map-marker-alt"></i> {{$address}}</p>
                    </div>
                    <ul class="list-unstyled listings_three-page_contact_info">
                        <li class="d-inline-block">
                            <h6> 250+ Students enrolled this week </h6>
                        </li>
                    </ul>
                    <div class="listings_three-page_content_bottom">
                        @if (isset($units) && count($units))
                            <div class="left">
                                <a class="job_list_pill mb-0" href="#"> {{$units[0]}} </a>
                            </div>
                        @endif
                        <div>
                            <a href="{{ $detailsPageUrl }}" class="enqurebtnbox hvr-shutter-in-vertical">View Detail</a>
                            <a href="#"><i class="fas fa-phone-alt callbtnbox"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endforeach