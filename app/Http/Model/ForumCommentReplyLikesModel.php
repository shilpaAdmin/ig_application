<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class ForumCommentReplyLikesModel extends Model
{
    protected $table = 'forum_comment_reply_likes';
    protected $fillable = [
        'user_id',
        'forum_id',
        'is_like',
        'comment_or_reply_id'
    ];
}