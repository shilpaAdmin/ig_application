<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class LegalPagesModel extends Model
{
    protected $table='legal_pages';
    protected $fillable = [
        'type',
        'html'
    ];
}