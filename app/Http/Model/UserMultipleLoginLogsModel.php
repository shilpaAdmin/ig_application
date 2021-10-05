<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class UserMultipleLoginLogsModel extends Model
{
    protected $table='user_multiple_login_logs';
    protected $fillable = [
        'user_id',
        'device_token'
    ];
}