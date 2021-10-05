<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class UserContactMessagesModel extends Model
{
    protected $table='user_contact_messages';
    protected $fillable = [
        'name',
        'email',
        'number',
        'preferred',
        'message',
        'user_id'
    ];
}