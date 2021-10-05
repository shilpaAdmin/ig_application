<?php
namespace App\Http\Traits;

use App\User;

trait UserLocationDetailTrait {

    public function getUserLocationDetail($id) {
        // Get location detail of user 

        $locationData=User::where('id',$id)
        ->leftjoin('city as city','user.location_id','=','city.id')
        ->select('user.location_id','user.location_type')->first();
        
        return $locationData;
    }
}