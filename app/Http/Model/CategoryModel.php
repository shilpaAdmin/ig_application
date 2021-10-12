<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = 'category';
    protected $fillable = [
        'parent_category_id',
        'level',
        'name',
        'description',
        'media_file',
        'display_order',
        'created_by',
        'last_updated_by',
        'status',
        'slug',
        'created_at',
        'updated_at'
    ];

}
