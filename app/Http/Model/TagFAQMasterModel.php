<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class TagFAQMasterModel extends Model
{
    protected $table = 'tag_faq';
    protected $fillable = [
        'name',
        'created_by	',
        'last_updated_by',
        'status'


    ];

}
