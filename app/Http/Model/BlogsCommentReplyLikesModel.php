<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class BlogsCommentReplyLikesModel extends Model
{
    protected $table = 'blog_comment_reply_likes';
    protected $fillable = [
        'user_id',
        'blog_id',
        'is_like',
        'comment_or_reply_id'
    ];
}