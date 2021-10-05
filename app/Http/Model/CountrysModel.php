<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class CountrysModel extends Model
{
    protected $table = 'country';
    protected $fillable = [
        'name',
        'status',
        'contact_number',
        'created_at',
        'updated_at'
    ];

}
