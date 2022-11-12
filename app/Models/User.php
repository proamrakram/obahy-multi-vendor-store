<?php

namespace App\Models;

use Illuminate\Support\Str;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Crypt;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'country_id',
        'store_id',
        'city_id',
        'address_1',
        'address_2',
        'phone_number',
        'image',
        'social_login_provider',
        'user_type',
        'gender',
        'social_login_provider_code',
        'email_verified_at',
        'password',
        'birthdate',
        'postCode',

        #Edit this
        'active',
        'user_status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'social_login_provider_code',
        'social_login_provider',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected static function booted()
    {
        static::creating(function (User $item) {
            $item->slug = $item->name . "_" . Str::uuid();
        });
    }

    public function setProviderTokenAttribute($value)
    {
        $this->attributes['social_login_provider_code'] = Crypt::encrypt($value);
    }

    public function getProviderTokenAttribute($value)
    {
        return Crypt::decrypt($value);
    }

    public function setImageAttribute($image)
    {
        if (gettype($image) != 'string') {
            $i = $image->store('images/profile', 'public');
            $this->attributes['image'] = $image->hashName();
        } else {
            $this->attributes['image'] = $image;
        }
    }

    public function getImageAttribute($image)
    {
        $img = $image ?? 'male.jpg';
        return asset('storage/images/profile') . '/' . $img;
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function store()
    {
        return $this->belongsTo('App\Models\Store');
    }


    public function Permissions()
    {
        return $this->roles->first()->permissions()->get();
    }


    public function can($permission, $args = array())
    {
        if ($this->user_type == 'admin' || $this->user_type == 'admin_employee') {
            if (!empty($this->Permissions()->where('name', $permission)->where('type', 'admin')->first())) {
                return true;
            }
            return false;
        } elseif ($this->user_type == 'store_admin' || $this->user_type == 'store_employee') {
            if (!empty($this->Permissions()->where('name', $permission)->where('type', 'store')->first())) {
                return true;
            }
            return false;
        }
        return false;
    }
}
