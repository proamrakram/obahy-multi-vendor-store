<?php

namespace App\Http\Livewire\Products;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Store;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use LivewireAlert;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $categories;
    public $category_id;
    public $product_id;
    public $products_ids = [];
    public $selectAll = false;
    public $search = '';
    public $sort_product_name = 'desc';
    public $sort_product_category = 'desc';
    public $sort_product_price = 'desc';
    public $sort_product_vat = 'desc';
    public $filed = 'product_name_ar';
    public $dir = 'desc';
    protected $listeners = [
        'confirmedDeletingProduct', 'deleteProducts'
    ];

    public function mount()
    {
        $this->categories = ProductCategory::where('is_delete', 0)->where('parent_id', null)->orderBy('created_at', 'desc')->get();
    }

    public function sortingTable($filed)
    {
        if ($filed == 'sort_product_name') {
            if ($this->sort_product_name == 'asc') {
                $this->filed = 'product_name_ar';
                $this->dir = 'desc';
                $this->sort_product_name = 'desc';
            } else {
                $this->filed = 'product_name_ar';
                $this->dir = 'asc';
                $this->sort_product_name = 'asc';
            }
        }
        if ($filed == 'sort_product_category') {
            if ($this->sort_product_category == 'asc') {
                $this->filed = 'product_category';
                $this->dir = 'desc';
                $this->sort_product_category = 'desc';
            } else {
                $this->filed = 'product_category';
                $this->dir = 'asc';
                $this->sort_product_category = 'asc';
            }
        }
        if ($filed == 'sort_product_price') {
            if ($this->sort_product_price == 'asc') {
                $this->filed = 'product_price';
                $this->dir = 'desc';
                $this->sort_product_price = 'desc';
            } else {
                $this->filed = 'product_price';
                $this->dir = 'asc';
                $this->sort_product_price = 'asc';
            }
        }
        if ($filed == 'sort_product_vat') {
            if ($this->sort_product_vat == 'asc') {
                $this->filed = 'product_vat';
                $this->dir = 'desc';
                $this->sort_product_vat = 'desc';
            } else {
                $this->filed = 'product_vat';
                $this->dir = 'asc';
                $this->sort_product_vat = 'asc';
            }
        }
    }

    public function getTransactionsProperty()
    {
        $store_admin = auth()->user();
        $filters = [];
        $filters['search'] = $this->search;
        $filters['category_id'] = $this->category_id;

        $store = Store::where('store_admin', $store_admin->id)->first();
        $products = Product::language()
            ->where('store_id', $store->id)
            ->where('is_delete', '0')
            ->orderBy($this->filed, $this->dir)
            ->nameFilter($filters);

        return $products;
    }

    public function render()
    {
        return view('livewire.products.index', [
            'products' =>  $this->transactions->paginate(10),
        ]);
    }

    public function updateProducts()
    {
        $this->emit('refreshComponent');
    }

    public function alertDeleteProduct($product_id)
    {
        $this->product_id = $product_id;

        $this->alert('question', 'هل انت متأكد من حذف المنتج!؟', [
            'position' => 'center',
            // 'toast' => true,
            'showConfirmButton' => true,
            'confirmButtonText' => 'نعم متأكد',
            'onConfirmed' => 'confirmedDeletingProduct',
            'showCancelButton' => true,
            'cancelButtonText' => 'إلغاء',
            'allowOutsideClick' => false,
            'timer' => null,
        ]);
    }

    public function alertDeleteProducts()
    {
        $this->alert('question', 'هل انت متأكد من حذف المنتجات!؟', [
            'position' => 'center',
            // 'toast' => true,
            'showConfirmButton' => true,
            'confirmButtonText' => 'نعم متأكد',
            'showCancelButton' => true,
            'cancelButtonText' => 'إلغاء',
            'onConfirmed' => 'deleteProducts',
            'allowOutsideClick' => true,
            'timer' => null,
        ]);
    }

    public function confirmedDeletingProduct()
    {
        $store_admin = auth()->user();
        $store = Store::where('store_admin', $store_admin->id)->first();
        $product = Product::where('id', $this->product_id)->where('store_id', $store->id)->first();

        $product->update(['is_delete' => 1]);

        $this->updateProducts();

        $this->alert('success', 'لقد تم حذف المنتج بنجاح', [
            'position' => 'center',
            'toast' => true,
            'timer' => 3000,
        ]);
    }

    public function changeProductStatus($product_id)
    {
        $store_admin = auth()->user();
        $store = Store::where('store_admin', $store_admin->id)->first();
        $product = Product::where('id', $product_id)->where('store_id', $store->id)->first();

        if ($product->product_status == 'active') {
            $product->update(['product_status' => 'inactive']);
            $this->alert('success', 'تم تعطيل المنتج بنجاح', [
                'position' => 'top-end',
                'toast' => true,
                'timer' => 3000,
            ]);
        } elseif ($product->product_status == 'inactive') {
            $product->update(['product_status' => 'active']);
            $this->alert('success',  'تم تفعيل المنتج بنجاح', [
                'position' => 'top-end',
                'toast' => true,
                'timer' => 3000,
            ]);
        } else {
            $this->alert('warning', 'لم يتم تغيير حالة المنتج', [
                'position' => 'top-start',
                'toast' => true,
                'timer' => 3000,
            ]);
        }
        $this->updateProducts();
    }

    public function changeProductsStatus()
    {
        $products = Product::findMany($this->products_ids);

        foreach ($products as $product) {
            if ($product->product_status == 'active') {
                $product->update(['product_status' => 'inactive']);
            } elseif ($product->product_status == 'inactive') {
                $product->update(['product_status' => 'active']);
            }
        }
        $this->alert('success',  'تم تعديل حالة المنتجات بنجاح', [
            'position' => 'top-end',
            'toast' => true,
            'timer' => 3000,
        ]);
        $this->updateProducts();
    }

    public function deleteProducts()
    {
        $products = Product::findMany($this->products_ids);

        foreach ($products as $product) {
            $product->update(['is_delete' => 1]);
        }

        $this->alert('success', 'لقد تم حذف المنتجات بنجاح', [
            'position' => 'center',
            'toast' => true,
            'timer' => 3000,
        ]);

        $this->updateProducts();
    }

    public function selectAll()
    {
        $products = $this->transactions;

        if (!$this->selectAll) {
            $products_ids = $products->pluck('id');
            $this->products_ids = $products_ids;
            $this->selectAll = true;
        } else {
            $this->products_ids = [];
            $this->selectAll = false;
        }
        $this->updateProducts();
    }
}
