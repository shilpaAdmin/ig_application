
@foreach ($businessDatas as  $key => $business)

@php

    $name= $business->name ? $business->name :'-';
    $address= $business->address ? $business->address :'-';
    $description= $business->description ? $business->description :'-';
    $date=$business->created_at->diffForHumans();

    $images=json_decode($business->media_file_json, true);
    if(count($images)){
        $imageUrl= URL::to('/images/business').'/'.$images[0]['Media1'] ;
    } else {
        $imageUrl=URL::asset('assets/frontend/images/img/listimghousing.png');
    }

    $detailsPageUrl= route('housing.details',['id'=>$id,'bid'=>$business->id]);
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
                <div class="listings_three-page_contentt">
                    <div class="title">
                        <h3><a href="{{$detailsPageUrl}}">{{$name}}<span
                                    class="fa fa-check"></span></a></h3>
                        <p >{{$address}} , {{$description}}</p>
                    </div>
                    <ul class="list-unstyled listings_three-page_contact_info">
                        <li><i class="fas fa-map-marker-alt"></i>4.5 km Away from you</li>
                        <li><a href="#"><i class="fab fa-xing-square"></i>785.1 - 812.05 sq.ft.
                                onwards</a></li>
                    </ul>
                    <div class="listings_three-page_content_bottom">
                        <div class="left">
                            <h6>{{$date}}</h6>
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