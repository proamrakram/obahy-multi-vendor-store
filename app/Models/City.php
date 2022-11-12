<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
        'city_name_en',
        'city_name_ar',
        'country_id',
        'status',
        'is_delete',
    ];


    public function getName()
    {
        if (App::getLocale() == 'ar')
            return $this->city_name_ar;
        else
            return $this->city_name_en;
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    public function getCityNameAttribute()
    {
        $lang = session('lang');

        if ($lang == 'ar') {
            return $this->attributes['city_name_ar'];
        } else {
            return $this->attributes['city_name_en'];
        }
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active')->where('is_delete', '0');
    }
}
