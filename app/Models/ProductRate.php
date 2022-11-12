<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRate extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'user_id', 'rate_value', 'status', 'is_delete',];

    public function product()
    {
        $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
