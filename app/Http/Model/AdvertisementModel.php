<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class AdvertisementModel extends Model
{
    protected $table='advertisement';
    protected $fillable = [
        'name',
        'user_id',
        'category_id',
        'description',
        'continously',
        'start_date',
        'end_date',
        'url',
        'media',
        'type',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id' );
    }

    public function categories()
    {
        return $this->belongsTo('App\Http\Model\CategoryModel','category_id' );
    }
}