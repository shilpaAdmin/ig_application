<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class MatrimonialModel extends Model
{
    protected $table = 'matrimonial';
    protected $fillable = [
        'full_name',
        'city',
        'birth_date',
        'address',
        'about',
        'age',
        'height',
        'caste',
        'subcaste',
        'married',
        'designation',
        'other',
        'annual_income',
        'country_id',
        'desired_age',
        'desired_height',
        'desired_marital_status',
        'desired_religion',
        'desired_mother_tongue',
        'desired_country',
        'desired_annual_income',
        'private',
        'user_id',
        'education_json',
        'media_json',
        'slug',
        'cityid_or_countryid',
        'type_city_or_country'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id' );
    }

    public function country()
    {
        return $this->belongsTo('App\Http\Model\CountrysModel','country_id' );
    }

    public function desiredcountry()
    {
        return $this->belongsTo('App\Http\Model\CountrysModel','desired_country_id' );
    }
}
