<?php

namespace App\Http\Livewire\Stores;

use App\Models\Country;
use App\Models\Product;
use App\Models\Store;
use App\Models\StoreType;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $store_type_slug;
    public $store_type_title;

    public $products_check = false;
    public $store_name_slug;
    public $store_name;

    public $search = '';
    public $store_type_id = 0;
    public $country = 0;
    public $product_category = 1;

    public $product_type = 'model';
    public $time = 'desc';

    public function mount($store_type_slug, $products, $store_name_slug)
    {
        if (!$products) {
            $store_type = StoreType::where('slug', $store_type_slug)->first();
            $this->store_type_id = $store_type->id;
            $this->store_type_title = $store_type->store_type_name;
            $this->store_type_slug = $store_type_slug;
            $this->products_check = $products;
        } else {
            $this->products_check = $products;
            $this->store_name_slug = $store_name_slug;
        }
    }

    public function getTransactionsProperty()
    {
        $filters['search'] = $this->search;

        $store_type = StoreType::language()->where('id', $this->store_type_id)->first();

        if ($store_type) {
            $this->store_type_title = $store_type->store_type_name;
        }

        //All Stores
        if ($this->country == 0 && $this->store_type_id == 0) {
            $this->store_type_title = 'All Stores';
            $stores = Store::language()
                ->nameFilter($filters)
                ->where('is_delete', '0')
                ->where('store_status', 'active')
                ->orderBy('id', $this->time);
            return $stores;
        }


        if ($this->country != 0 && $this->store_type_id != 0) {
            $stores = Store::language()
                ->nameFilter($filters)
                ->where('is_delete', '0')
                ->where('store_status', 'active')
                ->where('store_type_id', $this->store_type_id)
                ->where('store_country', $this->country)
                ->orderBy('id', $this->time);

            return $stores;
        }

        if ($this->country != 0 && $this->store_type_id == 0) {

            $stores = Store::language()
                ->nameFilter($filters)
                ->where('is_delete', '0')
                ->where('store_status', 'active')
                ->where('store_country', $this->country)
                ->orderBy('id', $this->time);

            return $stores;
        }

        if ($this->country == 0 && $this->store_type_id != 0) {
            $stores = Store::language()
                ->nameFilter($filters)
                ->where('is_delete', '0')
                ->where('store_status', 'active')
                ->where('store_type_id', $this->store_type_id)
                ->orderBy('id', $this->time);

            return $stores;
        }
    }

    public function render()
    {
        $stores_types = StoreType::language()->get();
        $countries = Country::all();

        if ($this->products_check) {
            $store_type = StoreType::language()->where('slug', $this->store_type_slug)->first();
            $filters = [];
            $filters['search'] = $this->search;
            $this->banner_section = $store_type->banner_section;
            $this->service_section = $store_type->service_section;
            $this->filter_section = $store_type->filter_section;
            $this->store_category = $store_type->store_type_name;


            $store = Store::language()->where('store_type_slug', $this->store_type_slug)
                ->where('is_delete', '0')
                ->where('store_status', 'active')
                ->where('slug', $this->store_name_slug)
                ->first();

            $this->store_name = $store->store_name;

            $store_admin = User::where('id', $store->store_admin)->first();


            $products = Product::language()->where('is_delete', '0')
                ->nameFilter($filters)
                ->where('product_status', 'active')
                ->where('product_type', $this->product_type)
                ->orderBy('id', $this->time)
                ->where('store_id', $store->id);

            $stores = $this->transactions;
            if ($stores->count() < 10) {
                $this->resetPage();
            }
            $this->store_type_title = 'Fabric Products';

            return view('livewire.stores.index', [
                'stores' => $products->paginate(12),
                'store_type_title' => 'Fabrics',
                'stores_types' => $stores_types,
                'countries' => $countries
            ]);
        }


        $stores = $this->transactions;
        if ($stores->count() < 10) {
            $this->resetPage();
        }



        return view('livewire.stores.index', [
            'stores' => $stores->paginate(9),
            'store_type_title' => $this->store_type_title,
            'stores_types' => $stores_types,
            'countries' => $countries
        ]);
    }
}
