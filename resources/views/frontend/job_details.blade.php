@extends('frontend.layouts.master')
@section('title') Job Details @endsection
@section('content')
<!DOCTYPE html>
<html lang="en">
<body>

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

                    <form action="">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Contact Number</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Profile / Skill set</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1"
                                        rows="3"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="input-group my-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload Resume</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01"
                                    aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Cover Letter</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1"
                                        rows="3"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success">Submit</button>
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
            <div class="container-full-width">
                <div class="thm__owl-carousel owl-carousel owl-theme" data-options='{"margin":3, "loop": true, "smartSpeed": 700, "autoplay": true, "autoplayHoverPause": true, "autoplayTimeout": 5000, "items": 3,"responsive": {
                    "0": {
                        "items": 1
                    },
                    "480": {
                        "items": 2
                    },
                    "992": {
                        "items": 3
                    }
                }}'>
                    <div class="item">
                        <!--Listings Details Main Image Box Single-->
                        <div class="listings_details_main_image_box_single">
                            <div class="listings_details_main_image_box__img">
                                <img src="{{ URL::asset('assets/frontend/images/listings/job1.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <!--Listings Details Main Image Box Single-->
                        <div class="listings_details_main_image_box_single">
                            <div class="listings_details_main_image_box__img">
                                <img src="{{ URL::asset('assets/frontend/images/listings/job2.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <!--Listings Details Main Image Box Single-->
                        <div class="listings_details_main_image_box_single">
                            <div class="listings_details_main_image_box__img">
                                <img src="{{ URL::asset('assets/frontend/images/listings/job3.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                <h4>Software Engineer<i class="fa fa-check"></i></h4>
                                <small>Hir infotech Pvt Ltd </small> <small class="d-block"> Halvorson ,
                                    Adrienview 73379 </small>

                            </div>
                            <div class="main_bottom_rating_time">


                            </div>
                        </div>
                    </div>
                    <!--  <div class="col-xl-4 col-lg-4 seconboxlisd">
                        <div class="main_bottom_left_titlet">
                            <h4>Unit options</h4>
                        </div>
                        <button type="button" class="btn btnunit">2 BHK Appartment</button>
                        <button type="button" class="btn btnunit">3 BHK Appartment</button>
                        <button type="button" class="btn btnunit">4 BHK Appartment</button>
                        <button type="button" class="btn btnunit">5 BHK Appartment</button>
                    </div> -->
                    <div class="col-xl-6 col-lg-6">
                        <div class="main_bottom_right">

                            <div class="main_bottom_right_Buttons">
                                <a data-toggle="modal" data-target="#staticBackdrop" href="#">Apply Now</a>
                            </div>

                            <ul class="list-unstyled">
                                <li>Date Posted <span>May 3, 2021</span></li>
                                <li><a href="#">Add to Wishlist<i class="far fa-heart"></i></a></li>
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

                                <p class="first_text mb-0">Aliquam lorem ante, dapibus in, viverra quis, feugiat a,
                                    tellus.
                                    Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Etiam ultricies
                                    nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus.
                                    Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet
                                    adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar,
                                    hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien
                                    ut libero venenatis faucibus. </p>

                            </div>

                            <div class="listings_details_text">
                                <h3 class="mb-3">Job Overview</h3>


                                <div class="house_detaill_main clearfix">
                                    <div class="house_detaill">
                                        <div> <i class="far fa-calendar"></i> </div>
                                        <div class="house_desc">Date Posted</div>
                                        <p>May 3, 2021</p>
                                    </div>
                                    <div class="house_detaill">
                                        <div><i class="fas fa-user-graduate"></i> </div>
                                        <div class="house_desc">Qualifications</div>
                                        <p>Graduate</p>
                                    </div>

                                    <div class="house_detaill">
                                        <div> <i class="far fa-money-bill-alt"></i> </div>
                                        <div class="house_desc">Offered Salary</div>
                                        <p>$50,000 - $68000</p>
                                    </div>

                                    <div class="house_detaill">
                                        <div> <i class="fas fa-user-clock"></i> </div>
                                        <div class="house_desc">Experience</div>
                                        <p>2 years</p>
                                    </div>


                                </div>
                            </div>



                            <div class="listings_details_features my-5">
                                <div class="listings_details_features_title">
                                    <h3 class="mb-3">Key Responsibilities</h3>
                                </div>
                                <div class="row">

                                    <div class="col-lg-12">
                                        <ul class="listings_details_features_list">
                                            <li class="job_li_icon">Lorem ipsum dolor sit amet consectetur,
                                                adipisicing elit. Reiciendis, recusandae. adipisicing elit. Reiciendis,
                                                recusandae.
                                            </li>
                                            <li class="job_li_icon">Lorem, ipsum dolor sit amet consectetur
                                                adipisicing elit. Nostrum quasi harum voluptates, eveniet cupiditate sed
                                                sit nobis rerum et corrupti.
                                            </li>
                                            <li class="job_li_icon">Lorem ipsum dolor sit amet consectetur,
                                                adipisicing elit. Reiciendis, recusandae. adipisicing elit. Reiciendis,
                                                recusandae.
                                            </li>
                                            <li class="job_li_icon">Lorem, ipsum dolor sit amet consectetur
                                                adipisicing elit. Nostrum quasi harum voluptates, eveniet cupiditate sed
                                                sit nobis rerum et corrupti.
                                            </li>


                                        </ul>
                                    </div>


                                </div>
                            </div>


                            <div class="listings_details_features">
                                <div class="listings_details_features_title">
                                    <h3 class="mb-3">Skill & Experience</h3>
                                </div>
                                <div class="row">

                                    <div class="col-lg-12">
                                        <ul class="listings_details_features_list">
                                            <li class="job_li_icon">Lorem ipsum dolor sit amet consectetur,
                                                adipisicing elit. Reiciendis, recusandae. adipisicing elit. Reiciendis,
                                                recusandae.
                                            </li>
                                            <li class="job_li_icon">Lorem, ipsum dolor sit amet consectetur
                                                adipisicing elit. Nostrum quasi harum voluptates, eveniet cupiditate sed
                                                sit nobis rerum et corrupti.
                                            </li>
                                            <li class="job_li_icon">Lorem ipsum dolor sit amet consectetur,
                                                adipisicing elit. Reiciendis, recusandae. adipisicing elit. Reiciendis,
                                                recusandae.
                                            </li>
                                            <li class="job_li_icon">Lorem, ipsum dolor sit amet consectetur
                                                adipisicing elit. Nostrum quasi harum voluptates, eveniet cupiditate sed
                                                sit nobis rerum et corrupti.
                                            </li>


                                        </ul>
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
                                            <p><i class="fas fa-dot-circle"></i>It Company</p>
                                        </div>
                                    </div>
                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i>Founded in 1998</p>
                                        </div>
                                    </div>
                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i>Located in New York</p>
                                        </div>
                                    </div>
                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i>Mail us at <a
                                                    href="#">hir@gmail.com</a> </p>
                                        </div>
                                    </div>
                                    <!--Single_item-->
                                    <div class="additional_info_single">
                                        <div class="left">
                                            <p><i class="fas fa-dot-circle"></i>More info on <a href="#">
                                                    hirinfotech.com</a></p>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="mt-5 mb-5">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-6">
                        <h4>Similar&nbsp;Jobs</h4>
                    </div>
                    <div class="col-6 text-right"> <a href="#" class="link-simple"> View All </a> </div>
                </div>




                <div class="row">
                    <div class="col-xl-6 col-md-12 col-sm-12">
                        <div class="listings_two_page_content joblist_shadow">
                            <!--listings Two Page Single-->
                            <div class="listings_two_page_single overflow-y__hidden">
                                <div class="listings_two_page_img">
                                    <img src="{{ URL::asset('assets/frontend/images/listings/job-list.jpg')}}" alt="">

                                    <div class="heart_icon">
                                        <i class="icon-heart"></i>
                                    </div>
                                </div>
                                <div class="listings_three-page_content pt-3">
                                    <div class="title">
                                        <h3><a href="job-details.html"> Software Engineer<span
                                                    class="fa fa-check"></span></a></h3>
                                        <p class="mb-0">Hir infotech Pvt Ltd</p>
                                        <p class="mb-0">Halvorson , Adrienview 73379</p>
                                    </div>
                                    <ul class="list-unstyled listings_three-page_contact_info">
                                        <li class="d-inline-block"><a class="job_list_pill" href="#"> Full-time</a>
                                        </li>
                                        <li class="d-inline-block"><a class="job_list_pill" href="#"> Private</a>
                                        </li>
                                    </ul>
                                    <div class="listings_three-page_content_bottom">
                                        <div class="left">

                                        </div>
                                        <div>
                                            <a href="#" class="enqurebtnbox hvr-shutter-in-vertical">View Detail</a>
                                            <a href="#"><i class="fas fa-phone-alt callbtnbox"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-md-12 col-sm-12">
                        <div class="listings_two_page_content joblist_shadow">
                            <!--listings Two Page Single-->
                            <div class="listings_two_page_single overflow-y__hidden">
                                <div class="listings_two_page_img">
                                    <img src="{{ URL::asset('assets/frontend/images/listings/job-list.jpg')}}" alt="">

                                    <div class="heart_icon">
                                        <i class="icon-heart"></i>
                                    </div>
                                </div>
                                <div class="listings_three-page_content pt-3">
                                    <div class="title">
                                        <h3><a href="job-details.html"> Software Engineer<span
                                                    class="fa fa-check"></span></a></h3>
                                        <p class="mb-0">Hir infotech Pvt Ltd</p>
                                        <p class="mb-0">Halvorson , Adrienview 73379</p>
                                    </div>
                                    <ul class="list-unstyled listings_three-page_contact_info">
                                        <li class="d-inline-block"><a class="job_list_pill" href="#"> Full-time</a>
                                        </li>
                                        <li class="d-inline-block"><a class="job_list_pill" href="#"> Private</a>
                                        </li>
                                    </ul>
                                    <div class="listings_three-page_content_bottom">
                                        <div class="left">

                                        </div>
                                        <div>
                                            <a href="#" class="enqurebtnbox hvr-shutter-in-vertical">View Detail</a>
                                            <a href="#"><i class="fas fa-phone-alt callbtnbox"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>

    </div><!-- /.page-wrapper -->
</body>
</html>
@endsection
