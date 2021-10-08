<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class ForumCommentReplyModel extends Model
{
    protected $table = 'forum_comment_reply';
    protected $fillable = [
        'user_id',
        'forum_id',
        'type',
        'comment_id',
        'message',
        'is_deleted'
    ];

    public function forum()
    {
        return $this->belongsTo('App\Http\Model\ForumModel','forum_id' );
    }
    
    public function user()
    {
        return $this->belongsTo('App\User','user_id' );
    }

    public function likes()
    {
        return $this->hasMany(ForumCommentReplyLikesModel::class, 'comment_or_reply_id', 'id')->where('is_like','=',1);
    }
    public function replys()
    {
        return $this->hasMany(ForumCommentReplyModel::class, 'comment_id', 'id')->where('comment_id','!=',0);
    }
}