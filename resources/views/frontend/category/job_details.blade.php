



@extends('frontend.layouts.master')
@section('title') Job Details @endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@endsection
@section('content')

    <div class="preloader">
        <img src="{{ URL::asset('assets/frontend/images/loader.png')}}" class="preloader__image" alt="">
    </div><!-- /.preloader -->

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-target="#staticBackdrop" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Software Engineer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="" id="jobApplyForm">
                        <input type="hidden" id="userid" name="RegisterId" value="0">
                        <input type="hidden" id="JobId" name="JobId" value="{{ ucwords($businessData['id']) }}">
                        <input type="hidden" id="subject" name="subject" value="{{ ucwords($businessData['name']) }}">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        aria-describedby="emailHelp" required>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="number">Contact Number</label>
                                    <input type="text" class="form-control" id="number" name="number"
                                        aria-describedby="emailHelp" required>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        aria-describedby="emailHelp" required>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="skiell">Profile / Skill set</label>
                                    <textarea class="form-control" id="skill" name='skill'
                                        rows="3" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="input-group my-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload Resume</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="resume" name="Resume"
                                    aria-describedby="inputGroupFileAddon01" required>
                                <label class="custom-file-label" for="resume">Choose file</label>
                            </div>
                        </div>
                        <div class="input-group my-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon02">Upload Cover Letter</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="coverLetter" name="coverLetter"
                                    aria-describedby="inputGroupFileAddon02">
                                <label class="custom-file-label" for="coverLetter">Choose file</label>
                            </div>
                        </div>

                        {{-- <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Cover Letter</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1"
                                        rows="3"></textarea>
                                </div>
                            </div>
                        </div> --}}

                        <div class="row">
                            <div class="col-md-12">
                                <button id="submit" type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

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
                                <h4> {{ ucwords($businessData['name']) }}<i class="fa fa-check"></i></h4>
                                <small>{{ ucwords($businessData['about']) }} </small><br>
                                <small>{{ ucwords($businessData['address']) }} </small>

                            </div>
                            <div class="main_bottom_rating_time">


                            </div>
                        </div>
                    </div>
                   
                    <div class="col-xl-6 col-lg-6">
                        <div class="main_bottom_right">

                            <div class="main_bottom_right_Buttons">
                                <a data-toggle="modal" data-target="#staticBackdrop" href="#">Apply Now</a>
                            </div>

                            <ul class="list-unstyled">
                                <?php
                                    $timestamp = strtotime( $businessData['created_at'] );
                                    $date = date('M d,Y', $timestamp );
                                ?>
                                <li>Date Posted <span>{{ isset($date)? $date :'-'  }}</span></li>
                                <li><a href="#" class="add-to-favourite" data-businessid="{{$businessData->id}}">Add to Favourite<i class="far fa-heart"></i></a></li>
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
                                <h3 class="mb-3">Description</h3>

                                <p class="first_text mb-0">{{ ucfirst($businessData['description']) }} </p>

                            </div>

                            <div class="listings_details_text">
                                <h3 class="mb-3">Job Overview</h3>


                                <div class="house_detaill_main clearfix">
                                    <div class="house_detaill">
                                        <div> <i class="far fa-calendar"></i> </div>
                                        <?php
                                            $timestamp = strtotime( $businessData['created_at'] );
                                            $date = date('M d,Y', $timestamp );
                                        ?>
                                        <div class="house_desc">Date Posted</div>
                                        <p>{{ $date }}</p>
                                    </div>
                                    @php
                                    if (isset($businessData['job_detail_json']) && !empty($businessData['job_detail_json'])) {
                                        $attachmentArray = json_decode($businessData['job_detail_json'], true);
                                    } else {
                                        $attachmentArray = [];
                                    }
                                    $q = 1;
                                @endphp

                                    <div class="house_detaill">
                                        <div><i class="fas fa-user-graduate"></i> </div>
                                        <div class="house_desc">Qualifications</div>
                                        <p>{{ isset($attachmentArray['JobQualification']) ? $attachmentArray['JobQualification'] :'-' }}</p>
                                    </div>

                                    <div class="house_detaill">
                                        <div> <i class="far fa-money-bill-alt"></i> </div>
                                        <div class="house_desc">Offered Salary</div>
                                        <p>{{ isset($attachmentArray['JobSalary']) ? $attachmentArray['JobSalary']:'-' }}</p>
                                    </div>

                                    <div class="house_detaill">
                                        <div> <i class="fas fa-user-clock"></i> </div>
                                        <div class="house_desc">Experience</div>
                                        <p>{{ isset($attachmentArray['JobExperience']) ? $attachmentArray['JobExperience'] :'-'}}</p>
                                    </div>
                                </div>
                            </div>


                            @php
                                // Key Responsibilities
                                $responsibilities=null;
                                if(isset($businessData->sub_description_1) && !empty($businessData->sub_description_1)){
                                    $responsibilities=explode (".", isset($businessData->sub_description_1) ? $businessData->sub_description_1 : ''); 
                                }

                                // Skill & Experience
                                $skills=null;
                                if(isset($businessData->sub_descrition) && !empty($businessData->sub_descrition)){
                                    $skills=explode (".", isset($businessData->sub_descrition) ? $businessData->sub_descrition : ''); 
                                }
                            @endphp

                            <div class="listings_details_features my-5">
                                <div class="listings_details_features_title">
                                    <h3 class="mb-3">Key Responsibilities</h3>
                                </div>
                                <div class="row">

                                    <div class="col-lg-12">
                                        @if (isset($responsibilities))
                                           
                                            <ul class="listings_details_features_list">
                                                @foreach ($responsibilities as $item)
                                                    <li class="job_li_icon">{{ ucwords($item) }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <div class="listings_details_features">
                                <div class="listings_details_features_title">
                                    <h3 class="mb-3">Skill & Experience</h3>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        @if (isset($skills))
                                            <ul class="listings_details_features_list">
                                                @foreach ($skills as $item)
                                                    <li class="job_li_icon">{{ ucwords($item) }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="listings_details_sidebar">

                            <div class="listings_details_sidebar__single additional_info">
                                <h3 class="listings_details_sidebar__title">Company Details</h3>
                                <div class="additional_info_details">
                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            @if (isset($businessData['contact_person_name']))
                                                <p><i class="fas fa-dot-circle"></i>{{ ucwords($businessData['contact_person_name']) }}</p>
                                            @endif
                                            @if (isset($businessData['mobile_number']))
                                                <p><i class="fas fa-dot-circle"></i>{{ ucwords($businessData['mobile_number']) }}</p>
                                            @endif
                                            @if (isset($businessData['email_id']))
                                                <p><i class="fas fa-dot-circle"></i>{{ $businessData['email_id'] }}</p>
                                            @endif
                                            @if (isset($businessData['website']))
                                                <p><i class="fas fa-dot-circle"></i>{{ ucwords($businessData['website']) }}</p>
                                            @endif
                                        </div>
                                    </div>
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
                            <h4>Similar&nbsp;Jobs</h4>
                        </div>
                        <div class="col-6 text-right"> <a href="{{$listPageUrl}}" class="link-simple"> View All </a> </div>
                    </div>

                    <div class="row">
                        @foreach($similarData as $similarDatas)
                        <div class="col-xl-6 col-md-12 col-sm-12">
                            <div class="listings_two_page_content joblist_shadow">
                               
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
                                        $imageUrl=URL::asset('assets/frontend/images/img/gridimglisthouse.png');
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
                                <div class="listings_two_page_single overflow-y__hidden">
                                    <div class="listings_two_page_img">

                                        <img src="{{$imageUrl}}" alt="">

                                        <div class="heart_icon">
                                            <i class="icon-heart"></i>
                                        </div>
                                    </div>
                                    <div class="listings_three-page_content pt-3">
                                        <div class="title">
                                            <h3><a href="{{$detailPageUrl}}"> {{ ucwords($similarDatas['name']) }}<span
                                                        class="fa fa-check"></span></a></h3>
                                            <p class="mb-0">{{ ucwords($similarDatas['about']) }}</p>
                                            <p class="mb-0">{{ ucwords($similarDatas['address']) }}</p>
                                        </div>
                                        @if (isset($units) && count($units))
                                            <ul class="list-unstyled listings_three-page_contact_info">
                                                @foreach ($units as $unit)
                                                    <li class="d-inline-block"><a class="job_list_pill" href="javascript:void(0);"> {{ucwords($unit)}}</a></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                        <div class="listings_three-page_content_bottom">
                                            <div class="left">

                                            </div>
                                            <div>
                                                <a href="{{$detailPageUrl}}" class="enqurebtnbox hvr-shutter-in-vertical">View Detail</a>
                                                <a href="#"><i class="fas fa-phone-alt callbtnbox"></i></a>
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
    {{-- @php
        dd(auth()->user())
    @endphp --}}
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
@include('frontend.category.add_to_favourite')
<script>
    $(document).ready(function () {

        $('input[type="file"]').next().text("Choose file..");
        $('#jobApplyForm').on('submit',function(e){
            e.preventDefault();
            var formData = new FormData(this);
            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });

            $.ajax({
                url: "{{ route('ApplyForJob') }}",
                type:"POST",

                datatype:"json",
                cache:false,
                contentType: false,
                processData: false,
                data: formData,
                success:function(response){
                    if(response.Status){
                        swal("Done!","Job Apply succesfully..!!","success");
                    }else{
                        swal("Warning", "There is something wrong please try after some time", "error");
                    }
                    $("#jobApplyForm")[0].reset();
                    $('#staticBackdrop').modal('toggle');
                    $('input[type="file"]').next().text("Choose file..");
                },
                error: function(response) {
                    $('#nameErrorMsg').text(response.responseJSON.errors.name);
                    $('#emailErrorMsg').text(response.responseJSON.errors.email);
                    $('#mobileErrorMsg').text(response.responseJSON.errors.mobile);
                    $('#messageErrorMsg').text(response.responseJSON.errors.message);
                }
            });
        });

        $('input[type="file"]').change(function (e) {
            var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
            $(this).next().text(filename);
        });
    });
</script>

@endsection