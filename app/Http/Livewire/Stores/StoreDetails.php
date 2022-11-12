<?php

namespace App\Http\Livewire\Stores;

use Livewire\Component;

use App\Models\Product;
use App\Models\Store;
use App\Models\StoreType;
use App\Models\User;
use Livewire\WithPagination;

class StoreDetails extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $banner_section = 'inactive';
    public $service_section = 'inactive';
    public $filter_section = 'inactive';

    public $store_type_slug;
    public $store_name_slug;

    public $store_category;
    public $store_name;

    public $search = '';
    public $product_type = 'model';
    public $time = 'desc';

    public function mount($store_type_slug, $store_name_slug)
    {
        $this->store_type_slug = $store_type_slug;
        $this->store_name_slug = $store_name_slug;
    }

    public function time($ordering)
    {
        $this->time = $ordering;
    }

    public function render()
    {
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
            ->where('store_id', $store->id)->paginate(9);

        $products_services = Product::language()->where('is_delete', '0')
            ->where('product_status', 'active')
            ->where('product_type', 'service')
            ->orderBy('id', $this->time);


        $this->resetPage();

        return view('livewire.stores.store-details', [
            'store_type' => $store_type,
            'store' => $store,
            'products_services' => $products_services,
            'store_admin' => $store_admin,
            'products' => $products
        ]);
    }
}
