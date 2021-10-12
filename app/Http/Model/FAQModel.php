<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class FAQModel extends Model
{
    protected $table='faq';
    protected $fillable = [
        'question',
        'answer',
        'tags',
        'cityid_or_countryid',
        'type_city_or_country'
    ];
}