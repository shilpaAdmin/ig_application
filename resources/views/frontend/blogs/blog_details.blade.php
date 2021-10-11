@extends('frontend.layouts.master')
@section('title') Blog Details @endsection
@section('content')
    
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
            if(isset($blog->media_file_json)){
                $images=json_decode($blog->media_file_json, true);
                if(count($images) && isset($images[0][0])){
                    $imageUrl= URL::to('/images/blogs').'/'.$images[0][0] ;
                } else {
                    $imageUrl= URL::asset('assets/frontend/images/img/blogdetails.jpg');
                }
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
                                    <li><a href="javascript:void(0)"><i class="far fa-comments"></i>{{ isset($blog->blogComments)  ?$blog->blogComments->count():0  }} Comments</a>
                                    </li>
                                </ul>
                                <div class="blog_detail_title">
                                    <h3><a href="javascript:void(0)">{{isset($blog->name) ? ucwords($blog->name): '-'}}</a></h3>
                                </div>
                                <div class="blog_detail_text">
                                    <p class="blog_detail_text_1">{{ isset($blog->description) ? ucwords($blog->description) : '-' }}</p>
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
                                <h3 class="comment-one__title">{{ isset($blog->blogComments) ? $blog->blogComments->count():0  }} Comments</h3>
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
                                                <h3>{{ isset($comment->name) ? ucwords($comment->name):'-'}}</h3>
                                                <p>{{ isset($comment->message) ? ucwords($comment->message) :'-'}}</p>
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
                                          if(isset($post->media_file_json)){

                                            $images=json_decode($post->media_file_json, true);
                                            if(count($images) && isset($images[0][0])){
                                                $imageUrl= URL::to('/images/blogs').'/'.$images[0][0] ;
                                            } else {
                                                $imageUrl= URL::asset('assets/frontend/images/img/br1.jpg');
                                            }

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
                                                    <a href="{{ route('blog.detail',['slug'=>$slug]) }}">{{ isset($post->name) ? ucwords($post->name) : '-' }}</a>
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
                                        <li><a href="{{route('blog.list',['id'=>$category->id])}}">{{ucwords($category->name)}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div><!-- /.page-wrapper -->
@endsection
