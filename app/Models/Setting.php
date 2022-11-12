<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
    ];

    public function setLogoAttribute($logo)
    {
        if(gettype($logo) != 'string') {
            $i = $logo->store('images/setting', 'public');
            $this->attributes['image'] = $logo->hashName();
        } else {
            $this->attributes['image'] = $logo;
        }
    }

    public function getLogoAttribute($logo)
    {
        return asset('storage/images/setting') . '/' . $logo;
    }
}
