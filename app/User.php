<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
	use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	     protected $table = 'user';

    protected $fillable = [
        'name',
        'email',
        'mobile_number',
        'user_image',
        'cover_image',
        'bio',
        'address',
        'social_id',
        'social_type',
        'login_type',
        'device_id',
        'device_token',
        'device_type',
		'username',
        'is_rated',
        'user_type',
        'status',
        'password',
        'location_id',
        'location_type',
        'created_by',
        'last_updated_by',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
