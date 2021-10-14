<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class NotificationsModel extends Model
{
    protected $table='notifications';

    protected $fillable = [
        'user_id',
        'ids',
        'category_id',
        'title',
        'message',
        'type'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Http\Model\CategoryModel','category_id');
    }
}