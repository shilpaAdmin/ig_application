<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class JobApplyModel extends Model
{
    protected $table = 'apply_for_job';
    protected $fillable = [
        'user_id',
        'full_name',
        'email',
        'mobile_number',
        'skill',
        'subject',
        'message',
        'cover_letter',
        'resume',
        'career_id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id' );
    }
}
