<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class ForumModel extends Model
{
    protected $table = 'forum';
    protected $fillable = [
        'question',
        'description',
        'url',
        'user_id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id' );
    }

    public function forumComments()
    {
        return $this->hasMany(ForumCommentReplyModel::class, 'forum_id', 'id');
    }
   
}
