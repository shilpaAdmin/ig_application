<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class TestimonialModel extends Model
{
    protected $table = 'testimonial';
    protected $fillable = [
        'name',
        'description',
        'designation',
        'image',
        'media',
        'user_id'
    ];
}