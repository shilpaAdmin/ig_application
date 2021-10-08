@extends('layouts.master')

@section('title') Fourm @endsection

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
</style>
@endsection

@section('content')
@php 
   $totalData=count($commentReplyArray);
   $outer=ceil($totalData/$recordsPerPage);
   $count=0;
   if($totalData > 0)
   {
@endphp
        <table class="table table-bordered mb-0">
            <thead ><h1>Forum Detail</h1></thead>
            <tbody>
                <tr><th>Id</th><td>{{$forumDetail->id}}</td></tr>
                <tr><th>Question</th><td>{{!empty($forumDetail->question)?$forumDetail->question:'N/A'}}</td></tr>
                <tr><th>Description</th><td>{{!empty($forumDetail->description)?$forumDetail->description:'N/A'}}</td></tr>
                <tr><th>URL</th><td>{{!empty($forumDetail->url)?$forumDetail->url:'N/A'}}</td></tr>
                <tr><th>Approved Status</th><td>{{!empty($forumDetail->is_approve==0)?'Approved':'Not-Approved'}}</td></tr>
                <tr><th>Created User</th><td>{{!empty($forumDetail->user['name'])?$forumDetail->user['name']:'N/A'}}</td></tr>
                <tr><th>Created User</th><td>{{!empty($forumDetail->created_at)?date('d-m-Y',strtotime($forumDetail->created_at)):'N/A'}}</td></tr>
                <tr><th>Created User</th><td>{{!empty($forumDetail->created_at)?date('g:i A',strtotime($forumDetail->created_at)):'N/A'}}</td></tr>
            </tbody>
        </table>
        <br>
        @foreach($commentReplyArray as $comment)	
        
        
        <div class="bgforcoomreply">

        <div class="forum_box2">

            <div class="row">
                <div class="col-sm-1  for_profile2 ">
                    <img src="{{  URL::asset('images/user/'.$comment['userimage'])}}" class="f__img_lef" width="100%">
                </div>

                <div class="col-sm-11 likes-box">
                    <span> <a class="forum__profilee" href="#"> {{  ucwords($comment['username']) }}</a></span>
                </div>

                <div class="row">
                    <div class="col-sm-12 ml-3 mt-3 mb-3">
                        {{ ucwords($comment['comment']) }} <br>

                        <a href="#" class="forum__icon mr-3 replayall"> <i class="fas fa-reply"></i> Reply </a>
                        <a href="#" class="forum__icon comment-likes mt-3" data-id="{{$comment['id']}}" data-forumid="{{$comment['id']}}"> <i class="far fa-heart"></i> Like </a>
                        <a href='javascript:;' data-id="{{$comment['id']}}" class="deletecomment">Remove</a>
                    </div>
                </div>

            </div>
            
            @php 
                $totalReplys=isset($comment['reply'])?count($comment['reply']):0;
            @endphp

            {{-- comment reply --}}
            @if($totalReplys > 0)
            @for($i=0;$i<$totalReplys;$i++)
                <div class="row mt-5">
                    <div class="col-1"></div>
                    <div class="col-11 border-leftt pl-5">
                        <div class="row">
                            <div class="col-sm-1  for_profile2 ">
                                <img src="{{  URL::asset('images/user/'.$comment['reply'][$i]['userimage'])}}" class="f__img_lef" width="100%">
                            </div>

                            <div class="col-sm-11 likes-box">
                                <span> <a class="forum__profilee" href="#"> {{  ucwords($comment['reply'][$i]['username']) }}</a></span>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 ml-3 mt-3">
                                    {{$comment['reply'][$i]['comment']}}<br>

                                    <a href="#" class="forum__icon mr-3 replayall"> <i class="fas fa-reply"></i> Reply
                                    </a>
                                    <a href="#" class="forum__icon comment-likes" data-id="{{$comment['reply'][$i]['id']}}" data-forumid="{{$forumDetail->id}}"> <i class="far fa-heart"></i> Like </a>
                                    <a href='javascript:;' data-id="{{$comment['reply'][$i]['id']}}" class="deletereply">Remove</a>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            @endfor
            @endif
            </div><!--  forum_box2 -->

        </div>

            
        
            @endforeach
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

            $.ajax({
                url:'{{route("forum.deleteReply")}}',
                data:'ReplyId='+$(this).attr('data-id'),
                type:'post',
                success:function(html){
                    console.log(html);

                    if(html.status===true)
                    {
                        swal("Deleted!", "Your Reply has been deleted.", "success");
                        window.location.reload();
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
            $.ajax({
                url:'{{route("forum.deleteComment")}}',
                data:'CommentId='+$(this).attr('data-id'),
                type:'post',
                success:function(html){
                    console.log(html);
                    if(html.status===true)
                    {
                        swal("Deleted!", "Your Reply has been deleted.", "success");
                        window.location.reload();
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
    });
    </script>
@endsection
