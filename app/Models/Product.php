<?php

namespace App\Models;


use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
// use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\App;

class Product extends Model
{
    use HasFactory;
    // use Sluggable;
    protected $fillable = [
        'product_name_en',
        'product_name_ar',
        'product_description_en',
        'product_description_ar',
        'product_type',
        'product_category',
        'product_serial_number',
        'product_vat',
        'product_vat_value',
        'product_price',
        'product_price_after_vat',
        'wholesale_price',
        'is_affiliate',
        'affiliate_type',
        'affiliate_value',
        'product_status',
        'in_stock',
        'product_3d_image',
        'product_size',
        'store_id',
        'store_type_id',
        'product_main_image',
        'slug',
        'is_delete',
    ];
    protected $casts = ['product_size' => 'array'];

    protected static function booted()
    {
        static::creating(function (Product $item) {
            $item->slug = $item->product_name_en . "_" . Str::uuid();
        });
    }

    /**
     * The colors that belong to the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function colors(): BelongsToMany
    {
        return $this->belongsToMany(
            ProductColor::class,
            'colors_of_product',
            'product_id',
            'color_id',
            'id',
            'id'
        )->where('is_delete', 0);
    }
    /**
     * Get all of the color for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function color(): HasMany
    {
        return $this->hasMany('colors_of_product', 'product_id', 'id');
    }
    /**
     * Get the custom associated with the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function custom(): HasOne
    {
        return $this->hasOne(ProductCustomMade::class, 'product_id', 'id');
    }

    ///////////////// new wafaa
    public function setProduct3dImageAttribute($image)
    {
        if (gettype($image) != 'string') {
            $i = $image->store('images/products', 'public');
            $this->attributes['product_3d_image'] = $image->hashName();
        } else {
            $this->attributes['product_3d_image'] = $image;
        }
    }

    public function getProduct3dImageAttribute($image)
    {
        return asset('storage/images/products') . '/' . $image;
    }

    public function setProductMainImageAttribute($image)
    {
        if (gettype($image) != 'string') {
            $i = $image->store('images/products', 'public');
            $this->attributes['product_main_image'] = $image->hashName();
        } else {
            $this->attributes['product_main_image'] = $image;
        }
    }

    public function getProductMainImageAttribute($image)
    {
        $product_main_image = $this->images->where('is_main', '1')->first();
        if ($product_main_image) {
            return $product_main_image->image;
        }

        return null;
    }

    public function getName()
    {
        if (App::getLocale() == 'ar')
            return $this->product_name_ar;
        else
            return $this->product_name_en;
    }

    ///////////////////////////////////


    #New Amr Akram

    public function getProductDescriptionAttribute()
    {
        $lang = session('lang');

        if ($lang == 'ar') {
            return $this->attributes['product_description_ar'];
        } else {
            return $this->attributes['product_description_en'];
        }
    }

    public function getProductNameAttribute()
    {
        $lang = session('lang');

        if ($lang == 'ar') {
            return $this->attributes['product_name_ar'];
        } else {
            return $this->attributes['product_name_en'];
        }
    }

    #Scope
    public function scopeActive($query)
    {
        return $query->where('product_status', 'active')->where('is_delete', '0');
    }

    //Store Relationship
    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }
    //Images relation
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    //Comments relation
    public function comments()
    {
        return $this->hasMany(ProductComment::class, 'product_id', 'id');
    }

    //Rates relation
    public function rates()
    {
        return $this->hasMany(ProductRate::class, 'product_id', 'id');
    }

    //Category relation
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category', 'id');
    }

    //Related Products relation
    public function relatedProducts()
    {
        return $this->hasMany(Product::class, 'product_category', 'product_category')->active();
    }

    public function getRelatedModelProductsAttribute($type, $store_id)
    {
        $products = $this->relatedProducts->where('product_type', $type)->where('store_id', $store_id);
        if ($products->count() > 4) {
            return $products->random(4);
        } else {
            return $products->random($products->count());
        }
    }


    //Filters

    #Name Filter
    public function scopeNameFilter(Builder $builder, array $filters = [])
    {
        $filters = array_merge([], $filters);

        if (session('lang') == 'ar') {
            $builder->when($filters !== [], function ($query) use ($filters) {
                $query
                    ->where('product_name_ar', 'like', '%' . $filters['search'] . '%');
            });
        } else {

            $builder->when($filters !== [], function ($query) use ($filters) {
                $query->where('product_name_en', 'like', '%' . $filters['search'] . '%');
            });
        }
    }

    #Price Filter
    public function scopePriceFilter(Builder $builder, array $filters = [])
    {
        $filters = array_merge([], $filters);

        $builder->when($filters !== [], function ($query) use ($filters) {
            $query->whereBetween('product_price', [$filters['from'], $filters['to']]);
        });
    }

    #Product Categories Filter
    public function scopeMainCategoriesProducts($query, array $filters = [])
    {
        $query->whereIn('product_category', $filters);
    }


    //Setting Languages
    public function scopeLanguage($query)
    {
        if (session('lang') == 'ar') {
            $lang = [
                'id',
                'store_id',
                'store_type_id',
                'product_name_ar',
                'product_description_ar',
                'product_type',
                'product_category',
                'product_main_image',
                'product_size',
                'product_serial_number',
                'product_vat',
                'product_vat_value',
                'product_price',
                'product_price_after_vat',
                'wholesale_price',
                'is_affiliate',
                'affiliate_type',
                'affiliate_value',
                'slug',
                'in_stock',
                'product_3d_image',
                'product_status',
                'is_delete',
            ];
        } else {
            $lang =  [
                'id',
                'store_id',
                'product_name_en',
                'product_description_en',
                'product_type',
                'product_category',
                'product_main_image',
                'product_size',
                'product_serial_number',
                'product_vat',
                'product_vat_value',
                'product_price',
                'product_price_after_vat',
                'wholesale_price',
                'is_affiliate',
                'affiliate_type',
                'affiliate_value',
                'slug',
                'in_stock',
                'product_status',
                'is_delete',
            ];
        }

        return $query->select($lang);
    }


    public function scopeLang($query, $filters = [])
    {
        if (session('lang') == 'ar') {
            $lang = [
                'id',
                'store_id',
                'store_type_id',
                'product_name_ar',
                'product_description_ar',
                'product_type',
                'product_category',
                'product_main_image',
                'product_size',
                'product_serial_number',
                'product_vat',
                'product_vat_value',
                'product_price',
                'product_price_after_vat',
                'wholesale_price',
                'is_affiliate',
                'affiliate_type',
                'affiliate_value',
                'slug',
                'in_stock',
                'product_3d_image',
                'product_status',
                'is_delete',
            ];
        } else {
            $lang =  [
                'id',
                'store_id',
                'product_name_en',
                'product_description_en',
                'product_type',
                'product_category',
                'product_main_image',
                'product_size',
                'product_serial_number',
                'product_vat',
                'product_vat_value',
                'product_price',
                'product_price_after_vat',
                'wholesale_price',
                'is_affiliate',
                'affiliate_type',
                'affiliate_value',
                'slug',
                'in_stock',
                'product_status',
                'is_delete',
            ];
        }

        if ($filters['category_id'] == '0') {

            $main_categoies_ids = ProductCategory::all()->pluck('id')->toArray();
            return $query->select($lang)
                ->where('is_delete', '0')
                ->where('product_status', 'active')
                ->whereIn('product_category', $main_categoies_ids)
                ->priceFilter($filters);
        }

        return $query->select($lang)
            ->where('is_delete', '0')
            ->where('product_status', 'active')
            ->where('product_category', $filters['category_id'])
            ->priceFilter($filters);
    }


    // public function sluggable(): array
    // {
    //     return [
    //         'slug' => [
    //             'source' => 'product_name_en'
    //         ]
    //     ];
    // }
}
