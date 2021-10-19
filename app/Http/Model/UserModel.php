<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'address',
        'user_image',
        'mobile_number',
        'otp',
        'social_id',
        'password',
        'login_type',
        'is_email_verify',
        'is_user_verify',
        'device_id',
        'device_token',
        'created_by',
        'last_updated_by',
        'status',
        'is_rated',
        'created_at',
        'updated_at',
        'is_admin'
    ];

}
