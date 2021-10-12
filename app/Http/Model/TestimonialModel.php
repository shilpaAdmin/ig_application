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
        'user_id',
        'status',
        'cityid_or_countryid',
        'type_city_or_country'
    ];
}
