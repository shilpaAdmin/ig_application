<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class BlogsModel extends Model
{
    protected $table = 'blogs';
    protected $fillable = [
        'name',
        'description',
        'blog_created_by',
        'media_file_json',
        'category_id',
        'slug'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id' );
    }

    public function blogComments()
    {
        return $this->hasMany(BlogsCommentReplyModel::class,'blog_id','id');
    }

}
