<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class FAQModel extends Model
{
    protected $table='faq';
    protected $fillable = [
        'question',
        'answer',
        'tags'
    ];
}