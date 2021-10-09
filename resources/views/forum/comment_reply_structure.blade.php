@extends('layouts.master')

@section('title') Fourm @endsection

@section('css')
<!-- Bootstrap Css -->
        <link href="https://themesbrand.com/skote/layouts/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="https://themesbrand.com/skote/layouts/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="https://themesbrand.com/skote/layouts/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/datatables/datatables.min.css') }}">
@endsection

@section('content')
@php 
   $totalData=count($commentReplyArray);
   $outer=ceil($totalData/$recordsPerPage);
   $count=0;
   if($totalData > 0)
   {
@endphp
        <div class="accordion" id="accordionExample">       
            @foreach($commentReplyArray as $comment)
                    
                @php 
                    $usercommentimage='';
                    if(!empty($comment['userimage']))
                    {
                        $user_image_path=public_path().'/images/user/'.$comment['userimage'];

                        if(file_exists($user_image_path))
                        {
                            $usercommentimage=URL::to('/images/user').'/'.$comment['userimage'];
                        }
                        else
                        {
                            $usercommentimage=URL::to('/images/').'/img_avatar3.png';
                        }
                    }
                    else
                    {
                        $usercommentimage=URL::to('/images/').'/img_avatar3.png';
                    }

                @endphp
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading_{{$comment['id']}}">
                        <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_{{$comment['id']}}" aria-expanded="false" aria-controls="collapse_{{$comment['id']}}">                        
                        <img src="{{$usercommentimage}}" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:40px;">
                         <h5>{{$comment['username']}}</h5>
                         <p>{{$comment['comment']}}</p>
                        </button>
                    </h2>
                    <div id="collapse_{{$comment['id']}}" class="accordion-collapse collapse" aria-labelledby="heading_{{$comment['id']}}" data-bs-parent="#accordionExample" style="">
                        <div class="accordion-body">

                            {{--<div class="text-muted">
                                <strong class="text-dark">This is the first item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>--}}
                            
                            @php 
                            $totalReplys=count($comment['reply']);
                            @endphp

                            @if($totalReplys > 0)
                                <ul type='ol'>
                                @for($i=0;$i<$totalReplys;$i++)
                                    <div class="media p-3">
                                        @php 
                                        $userimage='';
                                        if(!empty($comment['reply'][$i]['userimage']))
                                        {
                                            $user_image_path=public_path().'/images/user/'.$comment['reply'][$i]['userimage'];

                                            if(file_exists($user_image_path))
                                            {
                                                $userimage=URL::to('/images/user').'/'.$comment['reply'][$i]['userimage'];
                                            }
                                            else
                                            {
                                                $userimage=URL::to('/images/').'/img_avatar3.png';
                                            }
                                        }
                                        else
                                        {
                                            $userimage=URL::to('/images/').'/img_avatar3.png';
                                        }

                                        @endphp
                                        <img src="{{$userimage}}" alt="Jane Doe" class="mr-3 mt-3 rounded-circle" style="width:45px;">
                                        <div class="media-body">
                                            <!--<h4>Jane Doe <small><i>Posted on February 20 2016</i></small></h4>
                                                <p>Lorem ipsum...</p>-->
                                            <h4>{{$comment['reply'][$i]['username']}}</h4>
                                            <p>{{$comment['reply'][$i]['comment']}}</p>
                                        </div>
                                    </div> 
                                @endfor
                                </ul>
                            @endif

                        </div>
                    </div>
                </div>
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

@endsection

@section('script')
    <script src="{{ URL::asset('assets/libs/node-waves/node-waves.min.js')}}"></script>  
    <script src="{{ URL::asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>  
    <!-- JAVASCRIPT -->
@endsection
{{--@section('script')
<!-- JAVASCRIPT -->
<script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
@endsection--}}