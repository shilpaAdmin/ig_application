<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class CitysModel extends Model
{
    protected $table="city";

    protected $fillable=[
        'type',
        'name',
        'continent',
        'country',
        'country_code',
        'postal_code',
        'capital',
        'population',
        'pop_date',
        'latitude',
        'longitude',
        'contact_number',
        'created_at',
        'updated_at'
    ];

}
