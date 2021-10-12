<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class ForumModel extends Model
{
    protected $table = 'forum';
    protected $fillable = [
        'question',
        'description',
        'url',
        'telegram_link',
        'user_id',
        'status',
        'is_approve',
        'cityid_or_countryid',
        'type_city_or_country',
        'attachment'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id' );
    }

    public function forumComments()
    {
        return $this->hasMany(ForumCommentReplyModel::class, 'forum_id', 'id');
    }

}
