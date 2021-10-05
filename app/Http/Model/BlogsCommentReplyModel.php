<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class BlogsCommentReplyModel extends Model
{
    protected $table = 'blogs_comment_reply';
    protected $fillable = [
        'user_id',
        'blog_id',
        'type',
        'comment_id',
        'message',
        'name',
        'email'
    ];
    
    public function blog()
    {
        return $this->belongsTo('App\Http\Model\BlogsModel','blog_id' );
    }
    
    public function user()
    {
        return $this->belongsTo('App\User','user_id' );
    }
}