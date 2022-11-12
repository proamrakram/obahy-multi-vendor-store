<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreSubscription extends Model
{
    use HasFactory;


    protected $fillable = [
        'store_id',
        'package_id',
        'subscription_start_date',
        'subscription_end_date',
        'subscription_status',
        'is_delete'
    ];

    public function storePackage()
    {
        return $this->belongsTo(StorePackage::class, 'package_id', 'id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }
}
