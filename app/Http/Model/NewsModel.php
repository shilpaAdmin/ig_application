<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class NewsModel extends Model
{
    protected $table='news';
    protected $fillable = [
        'news_from',
        'news_description'
    ];
}