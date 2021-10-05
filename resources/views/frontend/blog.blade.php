@extends('frontend.layouts.master')
@section('title') blog @endsection
@section('content')
    <!DOCTYPE html>
    <html lang="en">
    <body>

        <div class="preloader">
            <img src="{{ URL::asset('assets/frontend/images/loader.png')}}" class="preloader__image" alt="">
        </div><!-- /.preloader -->

        <div class="page-wrapper">

            <section class="page-header backgroundimgconblog">
                <div class="overlayforcontactbg"></div>
                <div class="container">
                    <h2 class="h2_oth_pgs">Blog</h2>
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="index.html">Home</a></li>
                        <li><span>Blog</span></li>
                    </ul>
                </div>
            </section>

            <section class="blog_one two blog-page">
                <div class="container">

                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">

                            <div class="blog_one_single wow fadeInDown animated" data-wow-delay="600ms"
                                style="visibility: visible; animation-delay: 600ms; animation-name: fadeInDown;">
                                <div class="blog_image">
                                    <img src="{{ URL::asset('assets/frontend/images/img/j1.jpg')}}" alt="Blog One Image">
                                </div>
                                <div class="blog-one__content">
                                    <ul class="list-unstyled blog-one__meta">
                                        <li><a href=""><i class="far fa-user-circle"></i>by Admin</a></li>
                                        <li><a href=""><i class="far fa-comments"></i>2 Comments</a>
                                        </li>
                                    </ul>
                                    <div class="blog_one_title">
                                        <h3><a href="blog-details.html">Lorem ipsum dolor sit amet, cibo mundi ea duo</a>
                                        </h3>
                                    </div>
                                    <div class="blog_one_text">
                                        <p>Lorem ipsum dolor sit amet, cibo mundi ea duo, vim exerci phaedrum</p>
                                    </div>
                                    <div class="blog_one_date">
                                        <p>07<br>Aug</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">

                            <div class="blog_one_single wow fadeInDown animated" data-wow-delay="200ms"
                                style="visibility: visible; animation-delay: 200ms; animation-name: fadeInDown;">
                                <div class="blog_image">
                                    <img src="{{ URL::asset('assets/frontend/images/img/j1.jpg')}}" alt="Blog One Image">
                                </div>
                                <div class="blog-one__content">
                                    <ul class="list-unstyled blog-one__meta">
                                        <li><a href=""><i class="far fa-user-circle"></i>by Admin</a></li>
                                        <li><a href=""><i class="far fa-comments"></i>2 Comments</a>
                                        </li>
                                    </ul>
                                    <div class="blog_one_title">
                                        <h3><a href="blog-details.html">Lorem ipsum dolor sit amet, cibo mundi ea duo</a>
                                        </h3>
                                    </div>
                                    <div class="blog_one_text">
                                        <p>Lorem ipsum dolor sit amet, cibo mundi ea duo, vim exerci phaedrum</p>
                                    </div>
                                    <div class="blog_one_date">
                                        <p>07<br>Aug</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">

                            <div class="blog_one_single wow fadeInDown animated" data-wow-delay="600ms"
                                style="visibility: visible; animation-delay: 600ms; animation-name: fadeInDown;">
                                <div class="blog_image">
                                    <img src="{{ URL::asset('assets/frontend/images/img/j1.jpg')}}" alt="Blog One Image">
                                </div>
                                <div class="blog-one__content">
                                    <ul class="list-unstyled blog-one__meta">
                                        <li><a href=""><i class="far fa-user-circle"></i>by Admin</a></li>
                                        <li><a href=""><i class="far fa-comments"></i>2 Comments</a>
                                        </li>
                                    </ul>
                                    <div class="blog_one_title">
                                        <h3><a href="blog-details.html">Lorem ipsum dolor sit amet, cibo mundi ea duo</a>
                                        </h3>
                                    </div>
                                    <div class="blog_one_text">
                                        <p>Lorem ipsum dolor sit amet, cibo mundi ea duo, vim exerci phaedrum</p>
                                    </div>
                                    <div class="blog_one_date">
                                        <p>07<br>Aug</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">

                            <div class="blog_one_single wow fadeInDown animated" data-wow-delay="400ms"
                                style="visibility: visible; animation-delay: 400ms; animation-name: fadeInDown;">
                                <div class="blog_image">
                                    <img src="{{ URL::asset('assets/frontend/images/img/j1.jpg')}}" alt="Blog One Image">
                                </div>
                                <div class="blog-one__content">
                                    <ul class="list-unstyled blog-one__meta">
                                        <li><a href=""><i class="far fa-user-circle"></i>by Admin</a></li>
                                        <li><a href=""><i class="far fa-comments"></i>2 Comments</a>
                                        </li>
                                    </ul>
                                    <div class="blog_one_title">
                                        <h3><a href="blog-details.html">Lorem ipsum dolor sit amet, cibo mundi ea duo</a>
                                        </h3>
                                    </div>
                                    <div class="blog_one_text">
                                        <p>Lorem ipsum dolor sit amet, cibo mundi ea duo, vim exerci phaedrum</p>
                                    </div>
                                    <div class="blog_one_date">
                                        <p>07<br>Aug</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">

                            <div class="blog_one_single wow fadeInUp animated" data-wow-delay="500ms"
                                style="visibility: visible; animation-delay: 500ms; animation-name: fadeInUp;">
                                <div class="blog_image">
                                    <img src="{{ URL::asset('assets/frontend/images/img/j1.jpg')}}" alt="Blog One Image">
                                </div>
                                <div class="blog-one__content">
                                    <ul class="list-unstyled blog-one__meta">
                                        <li><a href=""><i class="far fa-user-circle"></i>by Admin</a></li>
                                        <li><a href=""><i class="far fa-comments"></i>2 Comments</a>
                                        </li>
                                    </ul>
                                    <div class="blog_one_title">
                                        <h3><a href="blog-details.html">Lorem ipsum dolor sit amet, cibo mundi ea duo</a>
                                        </h3>
                                    </div>
                                    <div class="blog_one_text">
                                        <p>Lorem ipsum dolor sit amet, cibo mundi ea duo, vim exerci phaedrum</p>
                                    </div>
                                    <div class="blog_one_date">
                                        <p>07<br>Aug</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">

                            <div class="blog_one_single wow fadeInDown animated" data-wow-delay="600ms"
                                style="visibility: visible; animation-delay: 600ms; animation-name: fadeInDown;">
                                <div class="blog_image">
                                    <img src="{{ URL::asset('assets/frontend/images/img/j1.jpg')}}" alt="Blog One Image">
                                </div>
                                <div class="blog-one__content">
                                    <ul class="list-unstyled blog-one__meta">
                                        <li><a href=""><i class="far fa-user-circle"></i>by Admin</a></li>
                                        <li><a href=""><i class="far fa-comments"></i>2 Comments</a>
                                        </li>
                                    </ul>
                                    <div class="blog_one_title">
                                        <h3><a href="blog-details.html">Lorem ipsum dolor sit amet, cibo mundi ea duo</a>
                                        </h3>
                                    </div>
                                    <div class="blog_one_text">
                                        <p>Lorem ipsum dolor sit amet, cibo mundi ea duo, vim exerci phaedrum</p>
                                    </div>
                                    <div class="blog_one_date">
                                        <p>07<br>Aug</p>
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
