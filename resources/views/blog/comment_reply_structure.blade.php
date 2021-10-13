@extends('layouts.master')

@section('title') Blog @endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('assets/frontend/css/style.css')}}">
<link rel="stylesheet" href="{{ URL::asset('assets/frontend/css/responsive.css')}}">

<style>
    .forum_box2 .for_profile2 img {

    display: inline-flex;
    justify-content: center;
    align-items: center;
    border-radius: 100%;
    object-fit: cover;
    width: 80px;
    object-position: top;
    height: 80px;
}
.bgforcoomreply {
    background-color: white;
    padding: 20px;
    border-radius: 5px;
}
a.forum__icon.mr-3.replayall {
    margin-top: 10px !important;
    display: inline-block;
}

i.far.fa-trash-alt.deleticonnew {
    color: red;
}
</style>
@endsection

@section('content')
@php
   $totalData=count($commentReplyArray);
   $outer=ceil($totalData/$recordsPerPage);
   $count=0;
   if($totalData > 0)
   {
       $img_file='';

       if(!empty($blogDetail['user_image']))
       {

            if(file_exists($img_path))
            {
                $img_file=URL::to('/images/user').'/'.$blogDetail->user['user_image'];
            }
            else
            {
                $img_file=URL::to('/images').'/img_avatar3.png';
            }
       }
       else
       {
            $img_file=URL::to('/images').'/img_avatar3.png';
       }

        function timeAgo($time_ago) {
            $time_ago =  strtotime($time_ago) ? strtotime($time_ago) : $time_ago;
            $time  = time() - $time_ago;

        switch($time):
        // seconds
        case $time <= 60;
        return 'lessthan a minute ago';
        // minutes
        case $time >= 60 && $time < 3600;
        return (round($time/60) == 1) ? 'a minute' : round($time/60).' minutes ago';
        // hours
        case $time >= 3600 && $time < 86400;
        return (round($time/3600) == 1) ? 'a hour ago' : round($time/3600).' hours ago';
        // days
        case $time >= 86400 && $time < 604800;
        return (round($time/86400) == 1) ? 'a day ago' : round($time/86400).' days ago';
        // weeks
        case $time >= 604800 && $time < 2600640;
        return (round($time/604800) == 1) ? 'a week ago' : round($time/604800).' weeks ago';
        // months
        case $time >= 2600640 && $time < 31207680;
        return (round($time/2600640) == 1) ? 'a month ago' : round($time/2600640).' months ago';
        // years
        case $time >= 31207680;
        return (round($time/31207680) == 1) ? 'a year ago' : round($time/31207680).' years ago' ;

        endswitch;
        }

        $timeBefore=timeAgo($blogDetail->created_at);
    @endphp

        <div class="bgforcoomreply">
            <div class="forum__box mb-5">
                <div class="row ">
                    <div class="col-lg-1  for_profile">
                        <img src="{{$img_file}}" class="f__img_left">
                    </div>

                    <div class="col-lg-11">
                        <span> <a class="forum__profilee" href="#">{{!empty($blogDetail->user['name'])?$blogDetail->user['name']:'N/A'}} </a></span>
                        <div class="for_hour"> <a class="" href=" #">{{$timeBefore }}</a></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12  forum_que">
                        <p class="forum_que">{{!empty($blogDetail->name)?$blogDetail->name:'N/A'}}</p>
                        <span class="forum_ans">{{!empty($blogDetail->description)?$blogDetail->description:'N/A'}}</span>
                    </div>
                </div>

               <!-- <div class="row mt-3">
                    <div class="col-lg-1  for_profile mb-3">
                        <img src="https://ig.testingbeta.in/assets/frontend/images/img/d2.jpg" class="f__img_left">
                    </div>

                    <div class="col-lg-11">
                        <form action="https://ig.testingbeta.in/save-comments" method="post" class="contact-one__form">
                            <input type="hidden" name="_token" value="LfFWFylLMmUipq6KsCMQWedNrniEFTssKSNHhXJu">                                <input type="hidden" name="forum_id" value="1">
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
                </div> -->

                <!--<div class="pt-5 forum_que"> 1 Replies</div>-->
            </div>
        @foreach($commentReplyArray as $comment)

        @php
            $commentBeforeTime=timeAgo($comment['created_at']);
        @endphp
        <div class="forum_box2">

            <div class="row">
                <div class="col-sm-1  for_profile2 ">
                    <img src="{{  URL::asset('images/user/'.$comment['userimage'])}}" class="f__img_lef" width="100%">
                </div>

                <div class="col-sm-10 likes-box">
                    <span> <a class="forum__profilee" href="#"> {{  ucwords($comment['username']) }}</a></span>
                    <div class="for_hour"> <a class=""  href="#"> {{$commentBeforeTime}}</a></div>
                </div>

                <div class="col-sm-1">

                <a href="javascript:;"><i class="far fa-trash-alt deleticonnew deletecomment"></i> </a>

                </div>
                <div class="row">
                    <div class="col-sm-12 ml-3 mt-3 mb-3">
                        {{ ucwords($comment['comment']) }} <br>
                        {{--
                        <a href="#" class="forum__icon mr-3 replayall"> <i class="fas fa-reply"></i> Reply </a>
                        <a href="#" class="forum__icon comment-likes mt-3" data-id="{{$comment['id']}}" data-forumid="{{$comment['id']}}"> <i class="far fa-heart"></i> Like </a>

                        --}}
                    </div>
                </div>

            </div>

            @php
                $totalReplys=isset($comment['reply'])?count($comment['reply']):0;
            @endphp

            {{-- comment reply --}}
            @if($totalReplys > 0)
            @for($i=0;$i<$totalReplys;$i++)
                @php
                    $replyBeforeTime=timeAgo($comment['created_at']);
                @endphp
                <div class="row mt-5">
                    <div class="col-1"></div>
                    <div class="col-11 border-leftt pl-5">
                        <div class="row">
                            <div class="col-sm-1  for_profile2 ">
                                <img src="{{  URL::asset('images/user/'.$comment['reply'][$i]['userimage'])}}" class="f__img_lef" width="100%">
                            </div>
                            <div class="col-sm-10 likes-box ml-3">
                                <span> <a class="forum__profilee" href="#"> {{  ucwords($comment['reply'][$i]['username']) }}</a></span>
                                <div class="for_hour"> <a class="" href=" #"> {{$replyBeforeTime}}</a></div>
                            </div>
                            <div class="col-sm-1s">
                            <a href="javascript:;"><i class="far fa-trash-alt deleticonnew deletereply"></i></a>
                            </div>

                            <div class="row">
                                <div class="col-sm-11 ml-3 mt-3">
                                    {{$comment['reply'][$i]['comment']}}<br>
                                    {{--
                                    <a href="#" class="forum__icon mr-3 replayall"> <i class="fas fa-reply"></i> Reply
                                    </a>
                                    <a href="#" class="forum__icon comment-likes" data-id="{{$comment['reply'][$i]['id']}}" data-forumid="{{$blogDetail->id}}"> <i class="far fa-heart"></i> Like </a>
                                    --}}
                                </div>

                                <div class="col-sm-1">


                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            @endfor
            @endif
            </div><!--  forum_box2 -->
            @endforeach

        </div>
@php
   }
   else
   {
@endphp
        <div class="nk-tb-item">
            <div class="nk-tb-col tb-col-mb">
                <span class="tb-lead-sub">No Records Found</span>
            </div>
        </div>
@php
   }
@endphp
        {{ $commentData->links() }}

@endsection

@section('script')
    <script src="{{ URL::asset('assets/libs/node-waves/node-waves.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- JAVASCRIPT -->
    <script>
    $(document).ready(function(){

    $.ajaxSetup({
        headers:{'X-CSRF-TOKEN': '{{ csrf_token() }}' }
    });

        $(document).on('click','.deletereply',function(){
            $this=$(this);

            $.ajax({
                url:'{{route("blog.deleteReply")}}',
                data:'ReplyId='+$(this).attr('data-id'),
                type:'post',
                success:function(html){
                    //console.log(html);
                    var obj=JSON.parse(html);

                    if(obj.status===true)
                    {
                        swal("Deleted!", "Your Reply has been deleted.", "success");
                        $this.parent().parent().parent().parent().remove();
                    }
                    else
                    {
                        swal("Deleted_Error", "Error while deleting reply. :)", "error");
                    }
                },
                error: function (data, status, xhr) {
                    console.log(data);
                }
            });
        });

        $(document).on('click','.deletecomment',function(){
            //alert('in delete comment'+$(this).attr('data-id'));
            $this=$(this);
            console.log($(this));
            $.ajax({
                url:'{{route("blog.deleteComment")}}',
                data:'CommentId='+$(this).attr('data-id'),
                type:'post',
                success:function(html){
                    console.log(html);
                    var obj=JSON.parse(html);

                    if(obj.status===true)
                    {
                        $this.parent().parent().parent().parent().remove();
                        swal("Deleted!", "Your Comment has been deleted.", "success");
                    }
                    else
                    {
                        swal("Deleted_Error", "Error while deleting Comment. :)", "error");
                    }
                },
                error: function (data, status, xhr) {
                    console.log(data);
                }
            });
        });
    });
    </script>
@endsection
