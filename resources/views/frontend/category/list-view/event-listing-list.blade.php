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
            $imageUrl=  URL::asset('assets/frontend/images/listings/event-list2.jpg');
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
                    <img src="{{ $imageUrl }}" alt="">
                    <div class="tag__promoted"> Promoted </div>
                    <div class="heart_icon">
                        <i class="icon-heart"></i>
                    </div>
                </div>
                <div class="listings_three-page_content pt-3">
                    <div class="title">
                        <h3><a href="{{$detailsPageUrl}}"> {{$name}}<span
                                    class="fa fa-check"></span></a></h3>

                        <p class="mb-0">{{$address}}</p>
                    </div>
                    @if (isset($units))
                        <ul class="list-unstyled listings_three-page_contact_info">
                            @foreach ($units as $item)
                                <li class="d-inline-block"><a class="job_list_pill" href="#"> {{ucwords($item)}} </a></li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="listings_three-page_content_bottom">
                        <div class="left">
                            <?php
                                $timestamp = strtotime( $business['created_at'] );
                                $date = date('M d,Y', $timestamp );
                            ?>
                            <h6> {{$date}} </h6>
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