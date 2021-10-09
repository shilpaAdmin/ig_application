@extends('frontend.layouts.master')
@section('title') Blog Details @endsection
@section('content')
<!DOCTYPE html>
<html lang="en">
<body>
    <!-- Modal location-->
    <div class="modal fade" id="exampleModallocation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Select Location</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="select_location">
                                <div>Berlin <a href="#" class="float-right d-inline-block location_a"> Select
                                        Location</a></div>
                                <div> Hamburg <a href="#" class="float-right d-inline-block location_a"> Select
                                        Location</a></div>
                                <div> Munich <a href="#" class="float-right d-inline-block location_a"> Select
                                        Location</a></div>
                                <div> Cologne <a href="#" class="float-right d-inline-block location_a"> Select
                                        Location</a></div>
                                <div>Stuttgart <a href="#" class="float-right d-inline-block location_a"> Select
                                        Location</a></div>
                                <div> Dortmund <a href="#" class="float-right d-inline-block location_a"> Select
                                        Location</a></div>
                                <div> Essen <a href="#" class="float-right d-inline-block location_a"> Select
                                        Location</a></div>
                                <div>Leipzig <a href="#" class="float-right d-inline-block location_a"> Select
                                        Location</a></div>
                                <div> Bremen <a href="#" class="float-right d-inline-block location_a"> Select
                                        Location</a></div>
                                <div> Dresden <a href="#" class="float-right d-inline-block location_a"> Select
                                        Location</a></div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary background_green" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal location-->

    <!-- Modal housing-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Housing Categories</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="w-50 float-left"> <a class=" a_cat_color" href="housing-listing-grid.html"><i
                                class="fas fa-angle-right"></i> House For Rent</a> </div>
                    <div class="w-50 float-left"> <a class=" a_cat_color" href="#"> <i class="fas fa-angle-right"></i>
                            AC Service & Repair</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i>
                            Washing Machine Repairs</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i>
                            Air Cooler Dealers</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i>
                            Audio Visual Equipment Dealers</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i>
                            Industrial Voltage Stabilizers Dealers</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i>
                            Solar Water Heaters</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i>
                            Fire Fighting Equipment</a> </div>

                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i>
                            Washing machine dealers</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i>
                            Microwave Oven Dealers</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i>
                            Firefighting Equipment Dealers</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i>
                            Water Dispenser Dealers</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i>
                            Modular Kitchen Dealers</a> </div>

                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i>
                            Generators Dealers</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i>
                            Gas Water Heater Dealers</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i>
                            Sign Board Agencies</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i>
                            Mixer Grinder Dealers</a> </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Modal taxation-->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Taxation Categories</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="w-50 float-left"> <a class=" a_cat_color" href="taxation-listing-grid.html"><i
                                class="fas fa-angle-right"></i> Taxation</a> </div>
                    <div class="w-50 float-left"> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> CA Services</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Accounting Bookkeeping</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Auditors</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> GST Consultants</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Company Registration</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Tax Consultants</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Tax Return Filing</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> FSSAI License</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> ESI & PF</a> </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Education-->
    <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Education Categories</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="w-50 float-left"> <a class=" a_cat_color" href="education-listing-grid.html"><i
                                class="fas fa-angle-right"></i> Education</a> </div>
                    <div class="w-50 float-left"> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Entrance Exam Coaching</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Job Training</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Overseas Education</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Corporate Training</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Computer Training</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Design Training</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Financial Training</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Language Classes</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Entrance Coaching</a> </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Jobs-->
    <div class="modal fade" id="exampleModal7" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Job Categories</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="w-50 float-left"> <a class=" a_cat_color" href="job-listing-grid.html"><i
                                class="fas fa-angle-right"></i> Jobs</a> </div>
                    <div class="w-50 float-left"> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Marketing</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Design</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Project Management</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Automotive Jobs</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Human Resource</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> IT / Computer</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Customer Service</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Health & Care</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Accounting</a> </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal travel-->
    <div class="modal fade" id="exampleModal8" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Travel & Transport Categories
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="w-50 float-left"> <a class=" a_cat_color" href="tourtravel-listing-grid.html"><i
                                class="fas fa-angle-right"></i> Travel & Transport</a> </div>
                    <div class="w-50 float-left"> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Bus Travel Agents</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Train Travel Agents</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Tour Operators</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Hotels</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Vehicle Rentals</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Transport Services</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Travel Consultants</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Cargo & Shipping</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Travel Consultants</a> </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal event-->
    <div class="modal fade" id="exampleModal10" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Event Categories</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="w-50 float-left"> <a class=" a_cat_color" href="event-listing-grid.html"> <i
                                class="fas fa-angle-right"></i> Event</a> </div>
                    <div class="w-50 float-left"> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Seminars</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Conferences</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Trade shows</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Themed parties</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Webinars</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Interactive performances</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Music festivals</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Food festivals</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Street parties</a> </div>
                </div>
            </div>
        </div>
    </div>
    <div class="preloader">
        <img src="{{ URL::asset('assets/frontend/images/loader.png')}}" class="preloader__image" alt="">
    </div><!-- /.preloader -->

    <div class="page-wrapper">

        <section class="page-header backgroundimgconblog">
            <div class="overlayforcontactbg"></div>
            <div class="container">
                <h2 class="h2_oth_pgs">Blog Detail </h2>
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{route('blog.list')}}">Home</a></li>
                    <li><span>Blog Detail</span></li>
                </ul>
            </div>
        </section>

        @php
            $images=json_decode($blog->media_file_json, true);
            if(count($images)){
                $imageUrl= URL::to('/images/blogs').'/'.$images[0]['Media1'] ;
            } else {
                $imageUrl= URL::asset('assets/frontend/images/img/blogdetails.jpg');
            }
        @endphp

        <section class="blog_detail">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="blog_detail_left">
                            <div class="blog-detail_image_box">
                                <img src="{{ $imageUrl }}" alt="">
                            </div>
                            <div class="blog-detail__content">
                                <ul class="list-unstyled blog-detail__meta">
                                    <li><a href="javascript:void(0)"><i class="far fa-user-circle"></i>by {{ isset($blog->user) && isset($blog->user->name) ? $blog->user->name : '-' }}</a></li>
                                    <li><a href="javascript:void(0)"><i class="far fa-comments"></i>{{$blog->blogComments->count()}} Comments</a>
                                    </li>
                                </ul>
                                <div class="blog_detail_title">
                                    <h3><a href="javascript:void(0)">{{isset($blog->name) ? $blog->name : '-'}}</a></h3>
                                </div>
                                <div class="blog_detail_text">
                                    <p class="blog_detail_text_1">{{ isset($blog->description) ? $blog->description : '-' }}</p>
                                </div>
                                <div class="blog_detail_date">
                                    <p>{{ $blog->created_at->format('d') }}<br>{{ $blog->created_at->format('M') }}</p>
                                </div>
                            </div>
                            <div class="blog_detail__bottom">
                                <p class="blog_detail__tags">
                                    <span>Tags:</span>
                                    <a href="javascript:void(0)">{{isset($blog->tagged) ? $blog->tagged : ''}}</a>
                                </p>
                                <div class="blog_detail__social-list">
                                    <a href="javascript:void(0)"><i class="fab fa-facebook-square"></i>
                                    <a href="javascript:void(0)"><i class="fab fa-instagram"></i></a>
                                    <a href="javascript:void(0)"><i class="fab fa-pinterest-p"></i></a>
                                    <a href="javascript:void(0)"><i class="fab fa-linkedin"></i></a>
                                    <a href="javascript:void(0)"><i class="fab fa-twitter"></i></a>

                                </div>
                            </div>

                            <div class="comment-one" id="comment-data">
                                <h3 class="comment-one__title">{{ $blog->blogComments->count() }} Comments</h3>
                                @php
                                    $blogCommentsData= $blog->blogComments->sortByDesc('id')->take(5);
                                @endphp
                                @foreach ($blogCommentsData as $comment)
                                    @php
                                        if(isset($comment->user_image)) {
                                            $imageUrl= URL::to('/images/user').'/'.$comment->user_image ;
                                        } else {
                                            $imageUrl= URL::asset('assets/frontend/images/img/dd1.jpg');
                                        }
                                    @endphp
                                    <div class="row ">
                                        <div class="col-md-12 comment-one__single">
                                            <div class="comment-one__image">
                                                <img src="{{ $imageUrl }}" alt="" width="100">
                                            </div>
                                            <div class="comment-one__content">
                                                <h3>{{ isset($comment->name) ? $comment->name:'-'}}</h3>
                                                <p>{{ isset($comment->message) ? $comment->message :'-'}}</p>
                                                <a href="javascript:void(0)" class="thm-btn comment-one__btn">Reply</a>
                                            </div>
                                         </div>

                                         <div class="col-md-12 mb-5 border_bottom1">
                                            <form action="" class="contact-one__form">
                                                <div class="input-group">
                                                    <textarea name="message" placeholder="Type something here......."></textarea>
                                                </div>
                                            </form>
                                        </div> 


                                    </div>
                                     
                                  



                                @endforeach
                            </div>
                            <div class="comment-form">
                                <h3 class="comment-form__title">Leave a Comment</h3>
                                <form action="{{route('save.blog.comments')}}" class="comment-one__form" method="post">
                                    @csrf
                                    <input type="hidden" name="type" value="comment">
                                    <input type="hidden" name="blog_id" value="{{$blog->id}}">
                                    <input type="hidden" name="comment_id" value="0">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="comment_input_box">
                                                <input type="text" placeholder="Your name" name="name" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="comment_input_box">
                                                <input type="email" placeholder="Email address" name="email" required>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-xl-6">
                                            <div class="comment_input_box">
                                                <input type="text" placeholder="Phone number" name="phone">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="comment_input_box">
                                                <input type="email" placeholder="Subject" name="Subject">
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="comment_input_box">
                                                <textarea name="message" placeholder="Write message" required></textarea>
                                            </div>
                                            <button type="submit" class="thm-btn comment-form__btn px-3">Submit
                                                Comment</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="sidebar">
                            <div class="sidebar__single sidebar__search">
                                <h3 class="sidebar__title clr-white">Search</h3>
                                <form action="{{route('blog.list')}}" class="sidebar__search-form" method="get">
                                    <input type="search" name="search" placeholder="Search">
                                    <button type="submit"><i class="icon-magnifying-glass"></i></button>
                                </form>
                            </div>
                            <div class="sidebar__single sidebar__post">
                                <h3 class="sidebar__title">Latest Posts</h3>
                                <ul class="sidebar__post-list list-unstyled">
                                    @foreach ($latestPost as $post)
                                        @php
                                            $images=json_decode($post->media_file_json, true);
                                            if(count($images)){
                                                $imageUrl= URL::to('/images/blogs').'/'.$images[0]['Media1'] ;
                                            } else {
                                                $imageUrl= URL::asset('assets/frontend/images/img/br1.jpg');
                                            }
                                            $slug = Str::slug($post->name, '-');
                                        @endphp
                                        <li>
                                            <div class="sidebar__post-image">
                                                <img src="{{ $imageUrl }}" alt="">
                                            </div>
                                            <div class="sidebar__post-content">
                                                <h3>
                                                    <a href="{{ route('blog.detail',['slug'=>$slug]) }}">{{ isset($post->name) ? $post->name : '-' }}</a>
                                                </h3>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="sidebar__single sidebar__category">
                                <h3 class="sidebar__title">Categories</h3>
                                <ul class="sidebar__category-list list-unstyled">
                                    @foreach ($categories as $category)
                                        <li><a href="{{route('blog.list',['id'=>$category->id])}}">{{$category->name}}</a></li>
                                    @endforeach
                                </ul>
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
