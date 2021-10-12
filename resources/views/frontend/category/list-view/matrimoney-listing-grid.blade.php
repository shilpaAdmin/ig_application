   
@foreach ($matrimonials as $key => $matrimonial) 
    @php 
        $imageName=json_decode($matrimonial->media_json, true)[0]['Media1'];
        if(isset($imageName)){
            $imageUrl= URL::to('/images/matrimonial/media').'/'.$imageName ;
        } else {
            $imageUrl=URL::asset('assets/frontend/images/listings/mat2.jpg');
        }

        $fullName=$matrimonial->full_name ? ucwords($matrimonial->full_name):'-';
        $city=$matrimonial->city ? ucwords($matrimonial->city):'-';
        $age = $matrimonial->age ? ucwords($matrimonial->age) : '-';
        $height = $matrimonial->height ? ucwords($matrimonial->height) : '-';
        $caste = $matrimonial->caste ? ucwords($matrimonial->caste) : '-';
        $designation = $matrimonial->designation ? ucwords($matrimonial->designation) : '-';
        $hieghtAge=$age.' year old, '.$height.'" height';
        
        $detailsPageUrl=route('matrimoney.details',['slug'=>$matrimonial->slug]);
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
                    <i class="fas fa-heartbeat"></i>
                </div>
            </div>
            <div class="listings_three-page_content">
                <div class="title">
                    <h3><a href="{{ $detailsPageUrl }}"> {{$fullName}} </a> <small
                            class="text_green">Online Now</small> </h3>
                    <p class="mb-0"> <i class="fas fa-map-marker-alt"></i> {{$city}}</p>
                </div>
                <ul class="list-unstyled listings_three-page_contact_info">
                    <li><i class="fas fa-circle font_small10"></i> {{$hieghtAge}} </li>
                    <li><i class="fas fa-circle font_small10"></i> {{$caste}} </li>
                    <li><i class="fas fa-circle font_small10"></i> {{$designation}} </li>
                </ul>
                <div class="listings_three-page_content_bottom">
                    <div class="left">

                    </div>
                    <div>
                        <a href="#" class="enqurebtnbox hvr-shutter-in-vertical">Connect Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endforeach