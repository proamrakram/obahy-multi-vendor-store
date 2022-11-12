<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class PackageItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'package_item_ar',
        'package_item_en',
        'package_item_status',
        'is_delete',
        'package_item_type',
        'count',
    ];

    public function store_package_item()
    {
        return $this->belongsTo(StorePackageItem::class);
    }

    public function getName()
    {
        if (App::getLocale() == 'ar')
            return $this->package_item_ar;
        else
            return $this->package_item_en;
    }
}
