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
    @endphp
    
    <div class="col-xl-4 col-md-6 col-sm-12">
        
        <div class="listings_three-page_single wow fadeInUp animated" data-wow-delay="0ms"
            data-wow-duration="1200ms"
            style="visibility: visible; animation-duration: 1200ms; animation-delay: 0ms; animation-name: fadeInUp;">
            <div class="listings_three-page_image ent_image_grid">
                <img src="{{ $imageUrl }}" alt="">

                <div class="heart_icon">
                    <i class="icon-heart"></i>
                </div>

                <div class="shopping_circle">
                    <i class="fas fa-film"></i>
                </div>
            </div>
            <div class="listings_three-page_content">
                <div class="title">
                    <h3><a href="{{$detailsPageUrl}}">{{$name}}r</a> </h3>
                    <p class="mb-0"> <i class="fas fa-tags"></i> Romance , Comedy </p>
                    <p class="mb-0"> <i class="far fa-thumbs-up"></i> 3.57k Likes </p>

                </div>


                <ul class="list-unstyled listings_three-page_contact_info">
                    <li> <a class="job_list_pill mt-2" href="#"> EN / DE </a> </li>
                </ul>
                <div class="listings_three-page_content_bottom">
                    <div class="left">

                    </div>
                    <div class="left">
                        <a href="{{$detailsPageUrl}}" class="enqurebtnbox hvr-shutter-in-vertical">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endforeach