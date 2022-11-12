<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
        'country_name_en',
        'country_name_ar',
        'country_flag',
        'country_code',
        'status',
        'is_delete',
    ];


    public function getName()
    {
        if (App::getLocale()=='ar')
        return $this->country_name_ar;
        else
        return $this->country_name_en;
    }

    public function cities()
    {
        return $this->hasMany('App\Models\City');
    }


    public function setCountryFlagAttribute($image)
    {
        if(gettype($image) != 'string') {
            $i = $image->store('images/flags', 'public');
            $this->attributes['country_flag'] = $image->hashName();
        } else {
            $this->attributes['country_flag'] = $image;
        }
    }

    public function getCountryFlagAttribute($image)
    {
        return asset('storage/images/flags') . '/' . $image;
    }


    public function getCountryNameAttribute()
    {
        $lang = session('lang');

        if ($lang == 'ar') {
            return $this->attributes['country_name_ar'];
        } else {
            return $this->attributes['country_name_en'];
        }
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active')->where('is_delete', '0');
    }
}
