<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class StoreType extends Model
{
    use HasFactory;

    use Sluggable;
    protected $fillable = [
        'store_type_ar',
        'store_type_en',
        'slug',
        'image',
        'banner_section',
        'filter_section',
        'service_section',
        'store_type_status',
        'is_delete'
    ];

    public function getStoreTypeNameAttribute()
    {
        $lang = session('lang');

        if ($lang == 'ar') {
            return $this->attributes['store_type_ar'];
        } else {
            return $this->attributes['store_type_en'];
        }
    }

    public function getImagePathAttribute()
    {
        return asset('storage/images') . '/' . $this->image;
    }

    public function setImageAttribute($image)
    {
        if(gettype($image) != 'NULL') {
            $i = $image->store('images/stores-types', 'public');
            $this->attributes['image'] = $image->hashName();
        }
    }

    public function getImageAttribute($image)
    {
        return asset('storage/images/stores-types') . '/' . $image;
    }



    public function scopeLanguage($query)
    {
        if (session('lang') == 'ar') {
            $lang = [
                'id',
                'store_type_ar',
                'slug',
                'banner_section',
                'filter_section',
                'service_section',
                'image',
                'store_type_status',
                'is_delete'
            ];
        } else {
            $lang =  [
                'id',
                'store_type_en',
                'slug',
                'banner_section',
                'filter_section',
                'service_section',
                'image',
                'store_type_status',
                'is_delete'
            ];
        }

        return $query->select($lang)->where('is_delete', '0');
    }


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'store_type_en'
            ]
        ];
    }
}
