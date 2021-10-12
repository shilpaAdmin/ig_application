<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class BusinessModel extends Model
{
    protected $table = 'business';
    protected $fillable = [
		'user_id',
        'tag_id',
        'category_id',
        'type',
        'name',
        'about',
        'address',
        'description',
        'sub_descrition',
        'sub_description_1',
        'multiple_subcategory_id',
        'actual_price',
        'actual_price_unit',
        'selling_price',
        'selling_price_unit',
        'display_hours',
        'hours_json',
        'payment_mode',
        'contact_person_name',
        'mobile_number',
        'email_id',
        'website',
        'media_file_json',
        'unit_option',
        'job_detail_json',
        'reference_url',
        'syllabus',
        'realated_person_detail_json',
        'is_approve',
        'approved_by_user_id',
        'declined_by_user_id',
        'created_by	',
        'last_updated_by',
        'status',
        'slug',
        'cityid_or_countryid',
        'type_city_or_country'
    ];

    public function categories()
    {
        return $this->belongsTo('App\Http\Model\CategoryModel','category_id');
    }
    public function category()
    {
        return $this->belongsTo(CategoryModel::class );
    }

}
