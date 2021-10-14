@foreach ($businessDatas as  $key => $business)

    @php
        $name= $business->name ? ucwords($business->name) :'-';
        $address= $business->address ? ucwords($business->address) :'-';
        $description= $business->description ? ucwords($business->description) :'-';
        $date=$business->created_at->diffForHumans();

        $images=json_decode($business->media_file_json, true);
        if(count($images)){
            $imageUrl= URL::to('/images/business').'/'.$images[0]['Media1'] ;
        } else {
            $imageUrl= URL::asset('assets/frontend/images/listings/ent3.jpg');
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

                    <div class="heart_icon">
                        <i class="icon-heart"></i>
                    </div>
                </div>
                <div class="listings_three-page_content pt-3">
                    <div class="title">
                        <h3><a href="{{$detailsPageUrl}}">{{$name}}</a> </h3>

                        <p class="mb-0"> <i class="fas fa-tags"></i> Romance , Comedy
                        </p>
                        {{-- <p class="mb-0"> <i class="far fa-thumbs-up"></i> 3.57k Likes </p> --}}
                    </div>
                    @if (isset($units))
                        <ul class="list-unstyled listings_three-page_contact_info">
                            <li> <a class="job_list_pill" href="#"> {{$units[0]}} </a> </li>
                        </ul>
                    @endif
                    <div class="listings_three-page_content_bottom">
                        <div class="left">

                        </div>
                        <div>
                            <a href="{{ $detailsPageUrl }}" class="enqurebtnbox hvr-shutter-in-vertical">View Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach