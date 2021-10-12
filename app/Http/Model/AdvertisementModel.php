<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class AdvertisementModel extends Model
{
    protected $table='advertisement';
    protected $fillable = [
        'name',
        'user_id',
        'category_id',
        'description',
        'continously',
        'start_date',
        'end_date',
        'url',
        'media',
        'type',
        'status',
        'is_approve',
        'slug',
        'cityid_or_countryid',
        'type_city_or_country'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id' );
    }

    public function categories()
    {
        return $this->belongsTo('App\Http\Model\CategoryModel','category_id' );
    }

    public static function getEnumValues($table, $column) {
        $type = DB::select(DB::raw("SHOW COLUMNS FROM $table WHERE Field = '{$column}'"))[0]->Type ;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $enum = array();
        foreach( explode(',', $matches[1]) as $value )
        {
          $v = trim( $value, "'" );
          $enum = Arr::add($enum, $v, $v);
        }
        return $enum;
      }
}
