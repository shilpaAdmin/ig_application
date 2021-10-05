<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class ConnectNowModel extends Model
{
    protected $table = 'connect_now';
    protected $fillable = [
        'user_id',
        'matrimonial_id',
        'connection_register_id',
        'connection_matrimonial_id',
        'status'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User','user_id' );
    }
    
    public function matrimonial()
    {
        return $this->belongsTo('App\Http\Model\MatrimonialModel','matrimonial_id' );
    }
    
    public function connection()
    {
        return $this->belongsTo('App\User','connection_register_id' );
    }
}