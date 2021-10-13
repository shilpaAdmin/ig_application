@foreach ($forums as $forum)
    <div class="row forum__box">
    <div class="col-lg-1  for_profile">
        @if (isset($forum->user_image) && !empty($forum->user_image))
            <img src="{{ URL::asset('images/user/'.$forum->user_image)}}" class="f__img_left')}}">
        @else
            <img src="{{ URL::asset('assets/frontend/images/img/d1.jpg')}}" class="f__img_left')}}">
        @endif
    </div>

    <div class="col-lg-9 ">
        <a href="{{route('forumdetail',['slug'=>$forum->slug])}}" class="for__title">{{ ucwords($forum->question)}}</a>

        <p class="for_desc">
            <span> <a href="javascript:void(0);"> {{ucwords($forum->name)}}</a></span>
            <span> <a href="javascript:void(0);">  {{$forum->created_at->diffForHumans()}}</a></span>
            <span> <a href="javascript:void(0);">  {{$forum->forumComments->count()}} replies </a></span>
        </p>
    </div>

    <div class="col-lg-2 for__user">
        <img src="{{ URL::asset('assets/frontend/images/img/d2.jpg')}}" class="f__img_left">

        <img src="{{ URL::asset('assets/frontend/images /img/d3.jpg')}}" class="f__img_left margin_minus">

        <img src="{{ URL::asset('assets/frontend/images/img/d3.jpg')}}" class="f__img_left margin_minus">

    </div>
    </div>
@endforeach
