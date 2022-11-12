<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCustomMade extends Model
{
    use HasFactory;
     protected $fillable = [
        'id',
        'product_id',
        'custom_made_description',
        'description_image',
        'fabric_options',
        'fabric_image',
        'embroidery_options',
        'embroidery_image',
        'accessories_options',
        'accessories_image',
        'implementation_period',
        'custom_made_size_id',
        'custom_made_other_size',
        'other_size_instructions',
        'custom_made_other_size_image',
        'other_size_notes',
        'status',
        'is_delete',
        'custom_made_description_en',
        'fabric_options_en',
        'embroidery_options_en',
        'accessories_options_en',
        'implementation_period_en',
        'other_size_instructions_en',
        'other_size_notes_en',
        'custom_made_other_size_en',
    ];


     ///////////////// new wafaa
      public function setDescriptionImageAttribute($image)
    {
        if(gettype($image) != 'string') {
            $i = $image->store('images/products', 'public');
            $this->attributes['description_image'] = $image->hashName();
        } else {
            $this->attributes['description_image'] = $image;
        }
    }

    public function getDescriptionImageAttribute($image)
    {
        return asset('storage/images/products') . '/' . $image;
    }

    public function setFabricImageAttribute($image)
    {
        if(gettype($image) != 'string') {
            $i = $image->store('images/products', 'public');
            $this->attributes['fabric_image'] = $image->hashName();
        } else {
            $this->attributes['fabric_image'] = $image;
        }
    }

    public function getFabricImageAttribute($image)
    {
        return asset('storage/images/products') . '/' . $image;
    }


    public function setEmbroideryImageAttribute($image)
    {
        if(gettype($image) != 'string') {
            $i = $image->store('images/products', 'public');
            $this->attributes['embroidery_image'] = $image->hashName();
        } else {
            $this->attributes['embroidery_image'] = $image;
        }
    }

    public function getEmbroideryImageAttribute($image)
    {
        return asset('storage/images/products') . '/' . $image;
    }


    public function setAccessoriesImageAttribute($image)
    {
        if(gettype($image) != 'string') {
            $i = $image->store('images/products', 'public');
            $this->attributes['accessories_image'] = $image->hashName();
        } else {
            $this->attributes['accessories_image'] = $image;
        }
    }

    public function getAccessoriesImageAttribute($image)
    {
        return asset('storage/images/products') . '/' . $image;
    }


    public function setCustomMadeOtherSizeImageAttribute($image)
    {
        if(gettype($image) != 'string') {
            $i = $image->store('images/products', 'public');
            $this->attributes['custom_made_other_size_image'] = $image->hashName();
        } else {
            $this->attributes['custom_made_other_size_image'] = $image;
        }
    }

    public function getCustomMadeOtherSizeImageAttribute($image)
    {
        return asset('storage/images/products') . '/' . $image;
    }
    ///////////////////////////////////////////////

}
