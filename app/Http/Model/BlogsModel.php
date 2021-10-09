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
        'category_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id' );
    }

}
