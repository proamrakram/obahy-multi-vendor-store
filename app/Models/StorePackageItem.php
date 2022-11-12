<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorePackageItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_id',
        'package_item_id',
        'package_item_status',
        'is_delete',
        'count',
    ];

    public function package()
    {
        return $this->belongsTo('App\Models\StorePackage');
    }

    public function package_item()
    {
        return $this->hasOne(PackageItem::class, 'id', 'package_item_id');
    }
}
