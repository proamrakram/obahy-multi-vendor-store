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
        'default_products_num',
        'default_services_num',
        'default_orders_num',
        'default_customers_num',
        'default_copons_num',
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
