<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    use HasFactory;
    
     protected $fillable = [
        'default_language',
        'default_currency',
        'default_package',
        'package_period',
    ];
    
    
    public function currency()
    {
        return $this->belongsTo('App\Models\Currency','default_currency');
    }
    
    
    public function package()
    {
        return $this->belongsTo('App\Models\StorePackage','default_package');
    }
}
