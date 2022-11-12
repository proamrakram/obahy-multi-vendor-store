<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;
    protected $fillable = [
        'color_name_ar',
        'color_name_en',
        'color_code',
        'status',
        'is_delete',
    ];


    public static function getValue($name,$default = null)
    {
        $confiq = static::where('color_name_ar',$name)->first();
        if(!$confiq){
            return $default;

        }
        return $confiq ;
    }

    public function getColorNameAttribute()
    {
        $lang = session('lang');

        if ($lang == 'ar') {
            return $this->attributes['color_name_ar'];
        } else {
            return $this->attributes['color_name_en'];
        }
    }

}
