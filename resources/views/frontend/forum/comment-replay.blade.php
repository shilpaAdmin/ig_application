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

            
            <div class="col-sm-12 ml-3  comment-div">
                {{ ucwords($reply->message) }}<br>

                <a href="#" class="forum__icon mr-3 comment-replay"> <i class="fas fa-reply"></i> Reply
                </a>
                <a href="#" class="forum__icon comment-likes" data-id="{{$reply->id}}" data-forumid="{{$reply->forum_id}}"> <i class="far fa-heart"></i> Like </a>
                <form class="contact-one__form" >
                    <div class="input-group mb-4 replyComment" style="display: none;">
                        <textarea name="message" placeholder="Type something here......."></textarea>
                        <a href="javascript:void(0)" class="thm-btn comment-one__btn comments-reply-btn" data-id="{{$reply->id}}" data-forumid="{{$reply->forum_id}}">Reply</a>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>