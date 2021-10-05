<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class NotificationsModel extends Model
{
    protected $table='notifications';

    protected $fillable = [
        'user_id',
        'business_id',
        'title',
        'message'
    ];
}