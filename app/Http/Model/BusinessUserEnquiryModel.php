<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class BusinessUserEnquiryModel extends Model
{
    protected $table = 'business_user_enquiry';
    
    protected $fillable = [
		'user_id',
        'business_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id' );
    }

    public function business()
    {
        return $this->belongsTo('App\Http\Model\BusinessModel','business_id' );
    }
}