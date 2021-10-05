<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class LocationModel extends Model
{
    protected $table = 'location';
    protected $fillable = [
        'country_id',
        'city_id',
        'name',
        'zip_code',
        'location_contact_number',
        'description',
        'created_by',
        'last_updated_by',
        'status',
        'created_at',
        'updated_at'
    ];

}
