@extends('frontend.layouts.master')
@section('title') Forum Details @endsection
@section('content')
<!DOCTYPE html>
<html lang="en">

<body>

    <div class="preloader">
        <img src="{{ URL::asset('assets/frontend/images/loader.png')}}" class="preloader__image" alt="">
    </div><!-- /.preloader -->

    <div class="page-wrapper">

        <section class="page-header backgroundimgforum">
            <div class="overlayforcontactbg"></div>
            <div class="container">
                <h2 class="h2_oth_pgs">Forum Detail</h2>
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ route('ForumList')}}">Home</a></li>
                    <li><span>Forum Detail</span></li>
                </ul>
            </div>
        </section>



        <section class="forum_padding mb-20 mt-2 pt-2">


            <div class="container">

                <!-- forum box -->
                <div class="forum__box mb-5">
                    <div class="row ">
                        <div class="col-lg-1  for_profile">
                            <img src="{{ URL::asset('images/user/'.$forum->user_image)}}" class="f__img_left">
                        </div>

                        <div class="col-lg-11">
                            <span> <a class="forum__profilee" href="#"> {{ ucwords($forum->name) }}</a></span>
                            <div class="for_hour"> <a class="" href=" #"> {{ $forum->created_at->diffForHumans() }}</a></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12  forum_que">
                            <p class="forum_que">{{  ucwords($forum->question) }}</p>
                            <span class="forum_ans"> {{  ucwords($forum->description) }}</span>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-1  for_profile mb-3">
                            <img src="{{ URL::asset('assets/frontend/images/img/d2.jpg')}}" class="f__img_left">
                        </div>

                        <div class="col-lg-11">
                            <form action="{{route('save.comments')}}" method="post" class="contact-one__form">
                                @csrf
                                <input type="hidden" name="forum_id" value="{{$forum->id}}">
                                <input type="hidden" name="type" value="Comment">
                                <input type="hidden" name="comment_id" value="0">
                                <div class="input-group">
                                    <textarea name="message" placeholder="Type something here......."></textarea>
                                </div>
                                <div class="input-group contact__btn msg__btnforum">
                                    <button type="submit" class="thm-btn contact-one__btn"> Comment</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="pt-5 forum_que"> {{ $forum->forumComments->count() }} Replies</div>
                </div>
              
                @if ($forum->forumComments->count() > 0 )
                    @foreach ($forum->forumComments as $forumComment)
                        <div class="forum_box2">

                            <div class="row">
                                <div class="col-sm-1  for_profile2 ">
                                    <img src="{{  URL::asset('images/user/'.$forumComment->user_image)}}" class="f__img_lef">
                                </div>
        
                                <div class="col-sm-11 likes-box">
                                    <span> <a class="forum__profilee" href="#"> {{  ucwords($forumComment->name) }}</a></span>
                                    <div class="for_hour"> <a class="pr-3" href="#"> {{ $forumComment->created_at->diffForHumans() }}</a> | <a
                                            class="pl-3 totalLikes" href="#"> {{$forumComment->likes->count() }} Likes</a> </div>
                                </div>
        
                                 
                                    <div class="col-sm-12 ml-3">
                                        {{ ucwords($forumComment->message) }} <br>
        
                                        <a href="#" class="forum__icon mr-3"> <i class="fas fa-reply"></i> Reply </a>
                                        <a href="#" class="forum__icon comment-likes" data-id="{{$forumComment->id}}" data-forumid="{{$forum->id}}"> <i class="far fa-heart"></i> Like </a>

                                        <form class="contact-one__form">
                                        <div class="input-group mb-4">
                                    <textarea name="message" placeholder="Type something here......."></textarea>
                                </div>
                                </form>

                                    </div>
                                </div>
        
                             
        
                            {{-- comment reply --}}

                            @foreach ($forumComment->replys as $reply)
                                <div class="row mt-5">
                                    <div class="col-1"></div>
                                    <div class="col-11 border-leftt pl-5">
                                        <div class="row">
                                            <div class="col-sm-1  for_profile2 ">
                                                <img src="{{  URL::asset('images/user/'.$reply->user_image)}}" class="f__img_lef">
                                            </div>
            
                                            <div class="col-sm-11 likes-box">
                                                <span> <a class="forum__profilee" href="#"> {{  ucwords($reply->name) }}</a></span>
                                                <div class="for_hour"> <a class="pr-3" href="#"> {{ $reply->created_at->diffForHumans() }}</a> |
                                                    <a class="pl-3 totalLikes" href="#" > {{$reply->likes->count() }} Likes</a> </div>
                                            </div>
            
                                            
                                                <div class="col-sm-12 ml-3">
                                                    {{$reply->message}}<br>
            
                                                    <a href="#" class="forum__icon mr-3"> <i class="fas fa-reply"></i> Reply
                                                    </a>
                                                    <a href="#" class="forum__icon comment-likes" data-id="{{$reply->id}}" data-forumid="{{$forum->id}}"> <i class="far fa-heart"></i> Like </a>
                                                    <form class="contact-one__form">
                                                        <div class="input-group mb-4">
                                                            <textarea name="message" placeholder="Type something here......."></textarea>
                                                        </div>
                                                     </form>
                                                </div>
                                            
            
                                        </div>
            
                                    </div>
                                </div>
                            @endforeach
                            {{-- <div class="row mt-5">
                                <div class="col-1"></div>
                                <div class="col-11 border-leftt pl-5">
                                    <div class="row">
                                        <div class="col-sm-1  for_profile2 ">
                                            <img src="{{ URL::asset('assets/frontend/images/img/d3.jpg')}}" class="f__img_lef">
                                        </div>
        
                                        <div class="col-sm-11 ">
                                            <span> <a class="forum__profilee" href="#"> Stokes Molliedds</a></span>
                                            <div class="for_hour"> <a class="pr-3" href="#"> 3 hours ago</a> |
                                                <a class="pl-3" href="#"> 14 Likes</a> </div>
                                        </div>
        
                                        <div class="row">
                                            <div class="col-sm-12 ml-3">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat odio
                                                asperiores cumque deleniti, maxime nesciunt molestiae unde eaque sit culpa.
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat odio
                                                asperiores cumque deleniti, maxime nesciunt molestiae unde eaque sit culpa. <br>
        
                                                <a href="#" class="forum__icon mr-3"> <i class="fas fa-reply"></i> Reply
                                                </a>
                                                <a href="#" class="forum__icon "> <i class="far fa-heart"></i> Like </a>
                                            </div>
                                        </div>
        
                                    </div>
        
                                </div>
                            </div> --}}
        
                            {{-- <div class="row mt-5">
                                <div class="col-1"></div>
                                <div class="col-11 border-leftt pl-5">
                                    <div class="row">
                                        <div class="col-sm-1  for_profile2 ">
                                            <img src="{{ URL::asset('assets/frontend/images/img/d3.jpg')}}" class="f__img_lef">
                                        </div>
        
                                        <div class="col-sm-11 ">
                                            <span> <a class="forum__profilee" href="#"> Stokes Molliedd</a></span>
                                            <div class="for_hour"> <a class="pr-3" href="#"> 3 hours ago</a> |
                                                <a class="pl-3" href="#"> 14 Likes</a> </div>
                                        </div>
        
                                        <div class="row">
                                            <div class="col-sm-12 ml-3">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat odio
                                                asperiores cumque deleniti, maxime nesciunt molestiae unde eaque sit culpa.
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat odio
                                                asperiores cumque deleniti, maxime nesciunt molestiae unde eaque sit culpa. <br>
        
                                                <a href="#" class="forum__icon mr-3"> <i class="fas fa-reply"></i> Reply
                                                </a>
                                                <a href="#" class="forum__icon "> <i class="far fa-heart"></i> Like </a>
                                            </div>
                                        </div>
        
                                    </div>
        
                                </div>
                            </div> --}}

                        </div><!--  forum_box2 -->
                    @endforeach
                @endif

                


                {{-- <div class="forum_box2 mt-5">

                    <div class="row">
                        <div class="col-sm-1  for_profile2 ">
                            <img src="{{ URL::asset('assets/frontend/images/img/d1.jpg')}}" class="f__img_lef">
                        </div>

                        <div class="col-sm-11">
                            <span> <a class="forum__profilee" href="#"> Stokes Mollie hhh</a></span>
                            <div class="for_hour"> <a class="pr-3" href="#"> 3 hours ago</a> | <a
                                    class="pl-3" href="#"> 14 Likes</a> </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 ml-3">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat odio asperiores cumque
                                deleniti, maxime nesciunt molestiae unde eaque sit culpa. Lorem ipsum dolor sit amet
                                consectetur adipisicing elit. Repellat odio asperiores cumque deleniti, maxime nesciunt
                                molestiae unde eaque sit culpa. <br>

                                <a href="#" class="forum__icon mr-3"> <i class="fas fa-reply"></i> Reply </a>
                                <a href="#" class="forum__icon "> <i class="far fa-heart"></i> Like </a>
                            </div>
                        </div>

                    </div>


                    <div class="row mt-5">
                        <div class="col-1"></div>
                        <div class="col-11 border-leftt pl-5">
                            <div class="row">
                                <div class="col-sm-1  for_profile2 ">
                                    <img src="{{ URL::asset('assets/frontend/images/img/d3.jpg')}}" class="f__img_lef">
                                </div>

                                <div class="col-sm-11 ">
                                    <span> <a class="forum__profilee" href="#"> Stokes Mollie</a></span>
                                    <div class="for_hour"> <a class="pr-3" href="#"> 3 hours ago</a> |
                                        <a class="pl-3" href="#"> 14 Likes</a> </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 ml-3">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat odio
                                        asperiores cumque deleniti, maxime nesciunt molestiae unde eaque sit culpa.
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat odio
                                        asperiores cumque deleniti, maxime nesciunt molestiae unde eaque sit culpa. <br>

                                        <a href="#" class="forum__icon mr-3"> <i class="fas fa-reply"></i> Reply
                                        </a>
                                        <a href="#" class="forum__icon "> <i class="far fa-heart"></i> Like </a>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-1"></div>
                        <div class="col-11 border-leftt pl-5">
                            <div class="row">
                                <div class="col-sm-1  for_profile2 ">
                                    <img src="{{ URL::asset('assets/frontend/images/img/d3.jpg')}}" class="f__img_lef">
                                </div>

                                <div class="col-sm-11 ">
                                    <span> <a class="forum__profilee" href="#"> Stokes Mollie</a></span>
                                    <div class="for_hour"> <a class="pr-3" href="#"> 3 hours ago</a> |
                                        <a class="pl-3" href="#"> 14 Likes</a> </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 ml-3">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat odio
                                        asperiores cumque deleniti, maxime nesciunt molestiae unde eaque sit culpa.
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat odio
                                        asperiores cumque deleniti, maxime nesciunt molestiae unde eaque sit culpa. <br>

                                        <a href="#" class="forum__icon mr-3"> <i class="fas fa-reply"></i> Reply
                                        </a>
                                        <a href="#" class="forum__icon "> <i class="far fa-heart"></i> Like </a>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="forum_box2 mt-5">

                    <div class="row">
                        <div class="col-sm-1  for_profile2 ">
                            <img src="{{ URL::asset('assets/frontend/images/img/d1.jpg')}}" class="f__img_lef">
                        </div>

                        <div class="col-sm-11">
                            <span> <a class="forum__profilee" href="#"> Stokes Mollie</a></span>
                            <div class="for_hour"> <a class="pr-3" href="#"> 3 hours ago</a> | <a
                                    class="pl-3" href="#"> 14 Likes</a> </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 ml-3">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat odio asperiores cumque
                                deleniti, maxime nesciunt molestiae unde eaque sit culpa. Lorem ipsum dolor sit amet
                                consectetur adipisicing elit. Repellat odio asperiores cumque deleniti, maxime nesciunt
                                molestiae unde eaque sit culpa. <br>

                                <a href="#" class="forum__icon mr-3"> <i class="fas fa-reply"></i> Reply </a>
                                <a href="#" class="forum__icon "> <i class="far fa-heart"></i> Like </a>
                            </div>
                        </div>

                    </div>


                    <div class="row mt-5">
                        <div class="col-1"></div>
                        <div class="col-11 border-leftt pl-5">
                            <div class="row">
                                <div class="col-sm-1  for_profile2 ">
                                    <img src="{{ URL::asset('assets/frontend/images/img/d3.jpg')}}" class="f__img_lef">
                                </div>

                                <div class="col-sm-11 ">
                                    <span> <a class="forum__profilee" href="#"> Stokes Mollie</a></span>
                                    <div class="for_hour"> <a class="pr-3" href="#"> 3 hours ago</a> |
                                        <a class="pl-3" href="#"> 14 Likes</a> </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 ml-3">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat odio
                                        asperiores cumque deleniti, maxime nesciunt molestiae unde eaque sit culpa.
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat odio
                                        asperiores cumque deleniti, maxime nesciunt molestiae unde eaque sit culpa. <br>

                                        <a href="#" class="forum__icon mr-3"> <i class="fas fa-reply"></i> Reply
                                        </a>
                                        <a href="#" class="forum__icon "> <i class="far fa-heart"></i> Like </a>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-1"></div>
                        <div class="col-11 border-leftt pl-5">
                            <div class="row">
                                <div class="col-sm-1  for_profile2 ">
                                    <img src="{{ URL::asset('assets/frontend/images/img/d3.jpg')}}" class="f__img_lef">
                                </div>

                                <div class="col-sm-11 ">
                                    <span> <a class="forum__profilee" href="#"> Stokes Mollie</a></span>
                                    <div class="for_hour"> <a class="pr-3" href="#"> 3 hours ago</a> |
                                        <a class="pl-3" href="#"> 14 Likes</a> </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 ml-3">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat odio
                                        asperiores cumque deleniti, maxime nesciunt molestiae unde eaque sit culpa.
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat odio
                                        asperiores cumque deleniti, maxime nesciunt molestiae unde eaque sit culpa. <br>

                                        <a href="#" class="forum__icon mr-3"> <i class="fas fa-reply"></i> Reply
                                        </a>
                                        <a href="#" class="forum__icon "> <i class="far fa-heart"></i> Like </a>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div> --}}
            </div>
        </section>

    </div><!-- /.page-wrapper -->

    @section('script')
        <script>
            $(document).ready(function () {
                
                $(document).on('click','.comment-likes',function(e){
                    e.preventDefault();
                    var id = $(this).attr("data-id");
                    var forum_id = $(this).attr("data-forumid");
                    var $this =$(this);

                    $.ajax({
                        type: 'post',
                        data:{
                            'id':id,
                            'forum_id':forum_id,
                            '_token':$('input[name=_token]').val()
                            
                        },
                        url: "{{ route('like-dislike') }}",
                        dataType: 'json',
                        async: true,
                        beforeSend: function() {
                            
                        },
                        success: function(data) {
                            var totalLikes=data.totalLikes ? data.totalLikes : 0;
                            $this.parent().parent().parent().find('.totalLikes').text(totalLikes+" Likes");

                        },
                        error: function(XMLHttpRequest, errorStatus, errorThrown) {
                            console.log("XHR :: " + JSON.stringify(XMLHttpRequest));
                            console.log("Status :: " + errorStatus);
                            console.log("error :: " + errorThrown);
                        },
                        complete: function() {
                        },
                    });
                });
            });
        </script>
    @endsection
</body>
</html>
@endsection
