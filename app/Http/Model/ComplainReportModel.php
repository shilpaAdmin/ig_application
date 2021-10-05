<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class ComplainReportModel extends Model
{
    protected $table='complain_report';
    protected $fillable = [
        'user_id',
        'type',
        'faqid_or_blogid_or_forumid_or_businessid'
    ];
}