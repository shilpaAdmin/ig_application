<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class TagMasterModel extends Model
{
    protected $table = 'tag_master';
    protected $fillable = [
        'name',
        'created_by	',
        'last_updated_by',
        'status',
        'is_approve'


    ];

}
