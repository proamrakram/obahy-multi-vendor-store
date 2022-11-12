<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Currency extends Model
{
    use HasFactory;
    protected $fillable = [
        'currency_name_en',
        'currency_name_ar',
        'currency_symbol',
        'currency_code',
        'exchange',
        'is_delete',
    ];


    public function getName()
    {
        if (App::getLocale() == 'ar')
            return $this->currency_name_ar;
        else
            return $this->currency_name_en;
    }

    public function getCurrencyNameAttribute()
    {
        $lang = session('lang');

        if ($lang == 'ar') {
            return $this->attributes['currency_name_ar'];
        } else {
            return $this->attributes['currency_name_en'];
        }
    }
}
