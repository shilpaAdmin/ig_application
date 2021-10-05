<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class BusinessFavouriteModel extends Model
{
    protected $table = 'business_favourite';
    protected $fillable = [
		'user_id',
        'business_id',
        'created_by',
        'last_updated_by',
        'status'
    ];

}
