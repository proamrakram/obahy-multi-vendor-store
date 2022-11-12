<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFavorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'favorites_type',
        'user_id',
        'favorites_ref_id',
        'status',
        'is_delete',
    ];
}
