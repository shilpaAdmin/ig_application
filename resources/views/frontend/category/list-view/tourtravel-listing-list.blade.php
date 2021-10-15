@foreach ($businessDatas as  $key => $business)

    @php
        $category=$business->category;
        $name= $business->name ? ucwords($business->name) :'-';
        $address= $business->address ? ucwords($business->address) :'-';
        $description= $business->description ? ucwords($business->description) :'-';
        $date=$business->created_at->diffForHumans();
        $about= $business->about ? ucwords($business->about) :'-';

        $images=json_decode($business->media_file_json, true);
        if(count($images)){
            $imageUrl= URL::to('/images/business').'/'.$images[0]['Media1'] ;
        } else {
            $imageUrl= URL::asset('assets/frontend/images/listings/tour1.jpg');
        }
        $detailsPageUrl= route('housing.details',['slug'=>$slug,'business_slug'=>$business->slug]);
    @endphp

    <div class="col-xl-6 col-md-12 col-sm-12">
        <div class="listings_two_page_content">
            <div class="listings_two_page_single">
                <div class="listings_two_page_img">
                    <img src="{{ $imageUrl }}" alt="">

                    <div class="heart_icon">
                        <i class="icon-heart"></i>
                    </div>
                </div>
                <div class="listings_three-page_contentt pt-3">
                    <div class="title">
                        <h3><a href="{{$detailsPageUrl}}">{{$name}}<span
                                    class="fa fa-check"></span></a></h3>
                        <p>{{$about}}</p>
                        {{-- <p>{{$address}}, {{$description}}</p> --}}
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
                        @if (isset($category) && isset($category->name))
                            <li><a href="#"><i class="fas fa-tags"></i>{{ ucwords($category->name) }}</a></li>
                        @endif
                        <li><a href="#"><i class="fas fa-map-marker-alt"></i> {{$address}}</a></li>
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