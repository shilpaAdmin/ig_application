<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class TagForumMasterModel extends Model
{
    protected $table = 'tag_forum';
    protected $fillable = [
        'name',
        'created_by	',
        'last_updated_by',
        'status'
    ];

}
