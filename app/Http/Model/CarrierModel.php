<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class CarrierModel extends Model
{
    protected $table='carrier';
    protected $fillable = [
        'type',
        'name',
        'description',
        'status'
    ];
}
