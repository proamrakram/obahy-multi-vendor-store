<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\ProdcutCustomMadeSizeOptions;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductCategory;
use App\Models\ProductColor;
use App\Models\ProductCustomMade;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class ProductController extends Controller
{
    protected $parent_id;

    public function __construct()
    {
        $this->middleware('auth');
        $this->parent_id = null;
    }
    public function index()
    {
        // $category = ProductCategory::where('is_delete', 0)->where('parent_id', $this->parent_id)->orderBy('created_at', 'desc')->get();
        // return view('Store.Product.index')->with('category', $category);
        return view('Store.Product.index');
    }
    public function product_data(Request $request)
    {
        # code...
        $columns = array(
            0 => 'chekbox',
            1 => 'colum',
            2 =>  'name',
            3 => 'category',
            4 => 'price',
            5 =>  'tax',
            6 =>  'stock',
            7 => 'product_image',
            8 => 'options'

        );

        // dd($columns);
        // $totalData =  User::where('is_delete' , 0)->whereIn('user_role', array(2, 3, 4))->count();
        $totalData = Product::where('is_delete', 0)->count();
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order =  $columns[$request->input('order.0.column')];
        $dir =  $request->input('order.0.dir');
        //var_dump($request->input('search.value')); die;
        if (empty($request->input('search.value')) && empty($request->input('name')) && empty($request->input('category'))) {
            // var_dump(55555); die;
            $products = Product::where('is_delete', 0)->offset($start)
                ->limit($limit)
                // ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');


            $products = Product::where(function ($q) use ($search) {
                $q->where('product_category', $search)
                    ->orWhere('product_name_en', 'LIKE', "%{$search}%")
                    ->orWhere('product_serial_number', 'LIKE', "%{$search}%")
                    ->orWhere('product_type', 'LIKE', "%{$search}%")
                    ->orWhere('product_name_ar', 'LIKE', "%{$search}%");
            })
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Product::where(function ($q) use ($search) {
                $q->where('product_category', $search)
                    ->orWhere('product_name_en', 'LIKE', "%{$search}%")
                    ->orWhere('product_serial_number', 'LIKE', "%{$search}%")
                    ->orWhere('product_type', 'LIKE', "%{$search}%")
                    ->orWhere('product_name_ar', 'LIKE', "%{$search}%");
            })
                ->count();
        }
        $data = array();

        if (!empty($products)) {
            foreach ($products as $product) {

                $nestedData['chekbox'] = "<div class='form-check'>
                    <input class='form-check-input' data-check-all='yes' type='checkbox'
                        value='' id='checkbox1'>
                    <label class='form-check-label' for='checkbox1'></label>
                </div>
            </td>";
                $nestedData['colum'] = $product->product_type;
                $nestedData['name'] = " <td class='text-center p-2'>" .
                    $product->product_name_ar .
                    "</td>";
                $nestedData['category'] = " <td class='text-center p-2'>" .
                    ProductCategory::find($product->product_category)->category_name_ar .
                    "</td>";;
                $nestedData['price'] = " <td class='text-center p-2'>" .
                    $product->wholesale_price .
                    "</td>";;
                $nestedData['tax'] = " <td class='text-center p-2'>" .
                    $product->product_vat .
                    "</td>";;
                $nestedData['stock'] = " <td class='text-center p-2'>" .
                    $product->in_stock .
                    "</td>";
                $nestedData['product_image'] = "<img src='" . $product->product_3d_image . "' class='img-small' alt=''>";
                if ($product->product_status == 'active') {
                    $nestedData['options'] = "<div class='tools-options d-flex justify-content-center'>
                    <div class='form-check form-switch p-0 pt-1'>
                        <input class='form-check-input' type='checkbox'
                            id='flexSwitchCheckChecked' onClick='active_deactive_product(" . $product->id . ")' checked>
                    </div>
                    <a href='" . route('products.edit.custom_made', $product->id) . "'> <i class='uil uil-edit'></i> </a>
                    <i class='uil uil-trash-alt'
                        onClick='confirmDelete(" . $product->id . ")'></i>
                </div>
            </td>";
                } else {
                    $nestedData['options'] = "<div class='tools-options d-flex justify-content-center'>
                    <div class='form-check form-switch p-0 pt-1'>
                        <input class='form-check-input' type='checkbox'
                            id='flexSwitchCheckChecked' onClick='active_deactive_product(" . $product->id . ")'
                            </div>
                            <a href='" . route('products.edit.custom_made', $product->id) . "'> <i class='uil uil-edit'></i> </a>
                            <i class='uil uil-trash-alt'
                                onClick='confirmDelete(" . $product->id . ")'></i>
                        </div>
            </td>";
                }



                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );
        echo  json_encode($json_data);
    }

    public function get_product_colors()
    {

        $product_color = ProductColor::where('is_delete', 0)->orderBy('created_at', 'desc')->get();
        echo json_encode($product_color);
    }
    public function add_service_made()
    {
        $category = ProductCategory::where('is_delete', 0)->where('parent_id', $this->parent_id)->orderBy('created_at', 'desc')->get();
        $sub_category = ProductCategory::where('is_delete', 0)->where('parent_id', '!=', $this->parent_id)->orderBy('created_at', 'desc')->get();
        $size_option = ProdcutCustomMadeSizeOptions::where('is_delete', 0)->orderBy('created_at', 'desc')->get();
        $product_color = ProductColor::where('is_delete', 0)->orderBy('created_at', 'desc')->get();
        // echo json_encode($product_color);die;
        return view('Store.Product.product_service_made')->with('category', $category)
            ->with('size_option', $size_option)
            ->with('sub_category', $sub_category)
            ->with('product_color', $product_color);
    }
    public function add_custom_made()
    {
        $category = ProductCategory::where('is_delete', 0)->where('parent_id', $this->parent_id)->orderBy('created_at', 'desc')->get();
        $sub_category = ProductCategory::where('is_delete', 0)->where('parent_id', '!=', $this->parent_id)->orderBy('created_at', 'desc')->get();

        $size_option = ProdcutCustomMadeSizeOptions::where('is_delete', 0)->orderBy('created_at', 'desc')->get();
        $product_color = ProductColor::where('is_delete', 0)->orderBy('created_at', 'desc')->get();
        // echo json_encode($product_color);die;
        return view('Store.Product.product_custom_made')->with('category', $category)
            ->with('size_option', $size_option)
            ->with('sub_category', $sub_category)
            ->with('product_color', $product_color);
    }

    public function add_ready_made()
    {
        $category = ProductCategory::where('is_delete', 0)->where('parent_id', $this->parent_id)->orderBy('created_at', 'desc')->get();
        $sub_category = ProductCategory::where('is_delete', 0)->where('parent_id', '!=', $this->parent_id)->orderBy('created_at', 'desc')->get();
        $size_option = ProdcutCustomMadeSizeOptions::where('is_delete', 0)->orderBy('created_at', 'desc')->get();
        $product_color = ProductColor::where('is_delete', 0)->orderBy('created_at', 'desc')->get();
        // echo json_encode($product_color);die;
        return view('Store.Product.product_ready_made')->with('category', $category)
            ->with('size_option', $size_option)
            ->with('sub_category', $sub_category)
            ->with('product_color', $product_color);
    }
    public function add_Category(Request $request)
    {
        $this->validate($request, [
            'status' => 'required|in:active,inactive,blocked',
            'category_name_en' => 'required|min:3|unique:product_categories,category_name_en',
            'category_name_ar' => 'required|min:3|unique:product_categories,category_name_ar',
            'parent_id' => 'nullable|exists:product_categories,id'
        ]);
        $request['parent_id'] ?? 0;
        ProductCategory::create([
            'category_name_en' => $request->get('category_name_en'),
            'status' => $request->get('status'),
            'category_name_ar' => $request->get('category_name_ar'),
            'parent_id' => $request->get('parent_id') ?? 0,
        ]);
        $result['status'] = true;
        $result['message'] = trans('product.add_category');
        return $result;
    }
    public function edit_product(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if ($product) {

            if ($product->product_type == 'custom_made') {
                $color = DB::table('colors_of_product')
                    ->where('product_id', $product->id)
                    ->select(['color_id'])
                    ->get();
                $arr = array();
                foreach ($color as $c) {


                    $arr[] = $c->color_id;
                }
                $product_color = ProductColor::where('is_delete', 0)->get()
                    ->map(function ($q) use ($arr) {
                        return [


                            'id' => $q->id,
                            'color_name_ar' => $q->color_name_ar,
                            'color_name_en' => $q->color_name_en,
                            'color_code' => $q->color_code,
                            'is_checked' => !empty($arr) ? in_array($q->id, $arr) : 'false'


                        ];
                    });
                $category = ProductCategory::where('is_delete', 0)->where('parent_id', $this->parent_id)->get();
                $sub_category = ProductCategory::where('is_delete', 0)->where('parent_id', '!=', $this->parent_id)->get();

                $custom = ProductCustomMade::where('product_id', $product->id)->first();
                return view('Store.Product.edit_custom_product')
                    ->with('product', $product)
                    ->with('product_color', $product_color)
                    ->with('category', $category)
                    ->with('sub_category', $sub_category)
                    ->with('custom', $custom);
            }
            if ($product->product_type == 'ready_made') {
                $color = DB::table('colors_of_product')
                    ->where('product_id', $product->id)
                    ->select(['color_id'])
                    ->get();
                $arr = array();
                foreach ($color as $c) {
                    $arr[] = $c->color_id;
                };

                $product_color = ProductColor::where('is_delete', 0)->get()
                    ->map(function ($q) use ($arr) {
                        return [


                            'id' => $q->id,
                            'color_name_ar' => $q->color_name_ar,
                            'color_name_en' => $q->color_name_en,
                            'color_code' => $q->color_code,
                            'is_checked' => !empty($arr) ? in_array($q->id, $arr) : 'false'

                        ];
                    });
                $category = ProductCategory::where('is_delete', 0)->where('parent_id', $this->parent_id)->get();
                $sub_category = ProductCategory::where('is_delete', 0)->where('parent_id', '!=', $this->parent_id)->get();

                return view('Store.Product.edit_ready_made_product')
                    ->with('product', $product)
                    ->with('product_color', $product_color)
                    ->with('category', $category)
                    ->with('sub_category', $sub_category);
            }
            if ($product->product_type == 'service') {
                // $color = DB::table('colors_of_product')
                //     ->where('product_id', $product->id)
                //     ->select(['color_id'])
                //     ->get();
                // $arr = array();
                // foreach ($color as $c) {
                //     $arr[] = $c->color_id;
                // };
                // $product_color = ProductColor::where('is_delete', 0)->get()
                //     ->map(function ($q) use ($arr) {
                //         return [


                //             'id' => $q->id,
                //             'color_name_ar' => $q->color_name_ar,
                //             'color_name_en' => $q->color_name_en,
                //             'color_code' => $q->color_code,
                //             'is_checked' => !empty($arr) ? array_search($q->id, $arr) == "false" ?? "true" : "false"


                //         ];
                //     });
                $category = ProductCategory::where('is_delete', 0)->where('parent_id', $this->parent_id)->get();
                $sub_category = ProductCategory::where('is_delete', 0)->where('parent_id', '!=', $this->parent_id)->get();

                return view('Store.Product.edit_service_made')
                    ->with('product', $product)
                    // ->with('product_color', $product_color)
                    ->with('category', $category)
                    ->with('sub_category', $sub_category);
            }
        }

        return view('home');
    }

    public function update_product(Request $request, $id)
    {
        $data = $request->all();
        $request['id'] = $id;


        $this->validate(
            $request,
            [
                'id' => 'required|exists:products,id',
                'product_name_en' => 'required|string|max:255',
                'product_name_ar' => 'required|string|max:255',
                'product_serial_number' => 'required|unique:products,product_serial_number,' . $id,
                // 'product_description_en' => 'required|string',
                // 'product_description_ar' => 'required|string',
                'is_affiliate' => 'nullable|in:0,1',
                'product_type' => 'required|in:ready_made,custom_made,service,template,model',
                'product_category' => 'required|exists:product_categories,id',
                'product_images' => 'nullable|array',

                'product_price' => 'required|regex:/^(\d+(,\d{1,2})?)?$/',
                'product_vat_value' => 'nullable|regex:/^(\d+(,\d{1,2})?)?$/',
                'product_vat' => 'required|regex:/^(\d+(,\d{1,2})?)?$/',
                'wholesale_price' => 'nullable|regex:/^(\d+(,\d{1,2})?)?$/',
            ],
            [
                'product_name_en.required' => trans('products.product_name_en_required'),
                'product_name_en.string' => trans('products.product_name_en_string'),
                'product_name_en.max' => trans('products.product_name_en_max'),

                'product_description_en.string' => trans('products.product_description_en_string'),
                'product_description_en.min' => trans('products.product_description_en_min'),

                'product_description_ar.required' => trans('products.product_description_ar_required'),
                'product_description_ar.string' => trans('products.product_description_ar_string'),
                'product_description_ar.min' => trans('products.product_description_ar_min'),

                'product_type.required' => trans('products.product.product_type_required'),
                'product_category.required' => trans('products.product.product_category_required'),

            ]
        );
        if ($data['product_type'] == 'custom_made') {

            $this->validate($request, [
                'custom_made_description' => 'nullable|string',
                'custom_made_description_en' => 'nullable|string',
                'fabric_options' => 'nullable|string',
                'implementation_period' => 'required|string',
                // 'implementation_period_en' => 'required|string',
                // 'product_description_ar' => 'required|string',
                'product_type' => 'required|in:ready_made,custom_made,service,template,model',
                'product_category' => 'required|exists:product_categories,id',
                'product_colors' => 'required|array',
                'product_3d_image' => 'nullable',

                // 'product_price' => 'required|regex:/^(\d+(,\d{1,2})?)?$/',
                // 'wholesale_price' => 'required|regex:/^(\d+(,\d{1,2})?)?$/',
            ]);
        }
        if ($data['product_type'] == 'ready_made') {
            $this->validate($request, [
                'size' => 'required|array',
                'product_colors' => 'required|array',
                'product_3d_image' => 'nullable',

            ]);
        }


        $product = Product::find($id)->update([
            'product_name_en' => $data['product_name_en'],
            'product_name_ar' => $data['product_name_ar'],
            'product_serial_number' => $data['product_serial_number'],
            'product_description_en' => $data['product_description_en'] ?? '',
            'product_description_ar' => $data['product_description_ar'] ?? '',
            'product_type' => $data['product_type'],
            'product_category' => $data['product_category'],
            'product_price' => $data['product_price'],
            'wholesale_price' => $data['wholesale_price'] ?? $data['product_price_after_vat'],
            'product_vat' => $data['product_vat'],
            'product_price_after_vat' => $data['product_price_after_vat'],
            'is_affiliate' => $data['is_affiliate'] ?? 0,
            'product_vat_value' => $data['product_vat_value'] ?? 0,
            // 'affiliate_type'=>$data['affiliate_type'],
            'affiliate_value' => $data['affiliate_value'] ?? 0,
            'product_status' => $data['product_status'] ?? 'active',
            'product_3d_image' => $data['product_3d_image'] ?? '0',
            'product_size' => $data['size'] ?? array(),
        ]);
        $product_color = $request->product_colors;
        $product = Product::find($id);
        if ($product_color) {
            // $product->colors->attach($product_color);
            // foreach ($product_color as $colors) {
            // $color = ProductColor::where('color_name_ar', $colors)->orWhere('color_name_en', $colors)->first();
            // if ($color) {
            $color_check = $product->colors()->sync($product_color);
            // if($color_check){
            //     $product->colors()->detach($color->id);
            // }else{
            //     $product->colors()->attach();
            // }
            // }
            // return $product->colors()->get();
        }
        // }

        $product_images = $request->product_images;
        $product = Product::find($id);

        if ($product_images) {
            foreach (ProductImage::where('product_id', $product->id)->get() as $images) {
                $images->delete();
            }
            foreach ($product_images as $image) {
                $productImage = ProductImage::create([
                    'product_id' => $product->id,
                    // 'is_main' => 0,
                    'image' => $image,
                    'status' => 'active',
                ]);
            }
        }


        if ($data['product_type'] == 'custom_made') {
            $custom_made_product = ProductCustomMade::where('product_id', $id)->update([
                'product_id' => $id,
                'custom_made_description' => $data['custom_made_description'] ?? "",
                'custom_made_description_en' => $data['custom_made_description_en'] ?? "",
                'description_image' => $data['description_image'] ?? '0',
                'fabric_options' => $data['fabric_options'],
                'fabric_image' => $data['fabric_image'] ?? '0',
                'other_size_instructions_en' => $data['other_size_instructions_en'],
                'other_size_notes_en' => $data['other_size_notes_en'],
                'custom_made_other_size_en' => $data['custom_made_other_size_en'],
                'embroidery_options' => $data['embroidery_options'],
                'embroidery_image' => $data['embroidery_image'] ?? '0',
                'accessories_options' => $data['accessories_options'],
                'fabric_options_en' => $data['fabric_options_en'],
                'embroidery_options_en' => $data['embroidery_options_en'],
                'accessories_options_en' => $data['accessories_options_en'],
                'implementation_period_en' => $data['implementation_period_en'] ?? "test",
                'accessories_image' => $data['accessories_image'] ?? '0',
                'implementation_period' => $data['implementation_period'],
                'custom_made_size_id' => $data['custom_made_size_id'],
                'custom_made_other_size' => $data['custom_made_other_size'],
                'other_size_instructions' => $data['other_size_instructions'],
                'custom_made_other_size_image' => $data['custom_made_other_size_image'] ?? '0',
                'other_size_notes' => $data['other_size_notes'],
            ]);
        }
        if (!$product) {
            $result['status'] = false;
            $result['message'] = trans('product.add_faild');
        } else {
            $result['status'] = true;
            $result['message'] = trans('product.add_successfully');
        }
        return $result;
    }
    public function store_product(Request $request)
    {
        $data = $request->all();
        // return    $product_color = $request->product_colors;

        $this->validate(
            $request,
            [
                'product_name_en' => 'required|string|max:255',
                'product_name_ar' => 'required|string|max:255',
                'product_serial_number' => 'required|unique:products,product_serial_number',
                'product_description_en' => 'nullable|string',
                'product_description_ar' => 'nullable|string',
                'is_affiliate' => 'nullable|in:0,1',
                'product_type' => 'required|in:ready_made,custom_made,service,template,model',
                'product_category' => 'required|exists:product_categories,id',
                'product_images' => 'required|array',

                'product_price' => 'required|regex:/^(\d+(,\d{1,2})?)?$/',
                'product_vat_value' => 'nullable|regex:/^(\d+(,\d{1,2})?)?$/',
                'product_vat' => 'required|regex:/^(\d+(,\d{1,2})?)?$/',
                'wholesale_price' => 'nullable|regex:/^(\d+(,\d{1,2})?)?$/',
            ],
            [
                'product_name_en.required' => trans('products.product_name_en_required'),
                'product_name_en.string' => trans('products.product_name_en_string'),
                'product_name_en.max' => trans('products.product_name_en_max'),

                'product_description_en.string' => trans('products.product_description_en_string'),
                'product_description_en.min' => trans('products.product_description_en_min'),

                'product_description_ar.required' => trans('products.product_description_ar_required'),
                'product_description_ar.string' => trans('products.product_description_ar_string'),
                'product_description_ar.min' => trans('products.product_description_ar_min'),

                'product_type.required' => trans('products.product.product_type_required'),
                'product_category.required' => trans('products.product.product_category_required'),

            ]
        );
        if ($data['product_type'] == 'custom_made') {

            $this->validate($request, [
                'custom_made_description' => 'nullable|string',
                'fabric_options' => 'nullable|string',
                'implementation_period' => 'required|integer',
                'custom_made_description' => 'required|string',
                'product_type' => 'required|in:ready_made,custom_made,service,template,model',
                'product_category' => 'required|exists:product_categories,id',
                'product_colors' => 'required|array',
                'product_3d_image' => 'required',
                'fabric_image' => 'required',
                'accessories_image' => 'required',
                'embroidery_image' => 'required',

                // 'product_price' => 'required|regex:/^(\d+(,\d{1,2})?)?$/',
                // 'wholesale_price' => 'required|regex:/^(\d+(,\d{1,2})?)?$/',
            ]);
        }
        if ($data['product_type'] == 'ready_made') {
            $this->validate($request, [
                'size' => 'required|array',
                'product_colors' => 'required|array',
                'product_3d_image' => 'required',

            ]);
        }


        $product = Product::create([
            'product_name_en' => $data['product_name_en'],
            'product_name_ar' => $data['product_name_ar'],
            'product_serial_number' => $data['product_serial_number'],
            'product_description_en' => $data['product_description_en'] ?? '',
            'product_description_ar' => $data['product_description_ar'] ?? '',
            'product_type' => $data['product_type'],
            'product_category' => $data['product_category'],
            'product_price' => $data['product_price'],
            'wholesale_price' => $data['wholesale_price'] ?? $data['product_price_after_vat'],
            'product_vat' => $data['product_vat'],
            'product_price_after_vat' => $data['product_price_after_vat'],
            'is_affiliate' => $data['is_affiliate'] ?? 0,
            'product_vat_value' => $data['product_vat_value'] ?? 0,
            // 'affiliate_type'=>$data['affiliate_type'],
            'affiliate_value' => $data['affiliate_value'] ?? 0,
            'product_status' => $data['product_status'] ?? 'active',
            'product_3d_image' => $data['product_3d_image'] ?? '0',
            'product_size' => $data['size'] ?? array(),
        ]);
        $product_color = $request->product_colors;
        if ($product_color) {
            //     foreach ($product_color as $colors) {
            //         $color = ProductColor::find($colors->id);
            //         if ($color) {

            $product->colors()->attach($product_color);
        }
        //     }
        // }

        $product_images = $request->product_images;
        $product_main_image = $request->description_image;

        if ($product_main_image) {
            $productImage = ProductImage::create([
                'product_id' => $product->id,
                // 'is_main' => 1,
                'image' => $product_main_image,
                'status' => 'active',
            ]);
        }

        $product_images = $request->product_images;
        if ($product_images) {
            foreach ($product_images as $image) {
                $productImage = ProductImage::create([
                    'product_id' => $product->id,
                    // 'is_main' => 0,
                    'image' => $image,
                    'status' => 'active',
                ]);
            }
        }


        if ($data['product_type'] == 'custom_made') {
            try {
                $custom_made_product = ProductCustomMade::create([
                    'product_id' => $product->id,
                    'custom_made_description' => $data['custom_made_description'] ?? "",
                    'custom_made_description_en' => $data['custom_made_description_en'] ?? "",
                    'description_image' => $data['description_image'] ?? '0',
                    'fabric_options' => $data['fabric_options'],
                    'fabric_image' => $data['fabric_image'],
                    'other_size_instructions_en' => $data['other_size_instructions_en'],
                    'other_size_notes_en' => $data['other_size_notes_en'],
                    'custom_made_other_size_en' => $data['custom_made_other_size_en'],
                    'embroidery_options' => $data['embroidery_options'],
                    'embroidery_image' => $data['embroidery_image'],
                    'accessories_options' => $data['accessories_options'],
                    'fabric_options_en' => $data['fabric_options_en'],
                    'embroidery_options_en' => $data['embroidery_options_en'],
                    'accessories_options_en' => $data['accessories_options_en'],
                    'implementation_period_en' => $data['implementation_period_en'] ?? "test",
                    'accessories_image' => $data['accessories_image'],
                    'implementation_period' => $data['implementation_period'],
                    'custom_made_size_id' => $data['custom_made_size_id'],
                    'custom_made_other_size' => $data['custom_made_other_size'],
                    'other_size_instructions' => $data['other_size_instructions'],
                    'custom_made_other_size_image' => $data['custom_made_other_size_image'],
                    'other_size_notes' => $data['other_size_notes'],
                ]);
            } catch (\Throwable $e) {
                $product->delete();
                return $e;
                $result['status'] = false;
                $result['message'] = trans('product.add_faild');
                return $result;
            }
        }
        if (!$product) {
            $result['status'] = false;
            $result['message'] = trans('product.add_faild');
        } else {
            $result['status'] = true;
            $result['message'] = trans('product.add_successfully');
        }

        return $result;
    }
    public function add_product_color(Request $request)
    {
        $data = $request->all();
        $this->validate(
            $request,
            [
                'color_name_ar' => 'required|string|max:255',
                'color_name_en' => 'required|string|max:255',
                'color_code' => 'required|unique:product_colors',
            ],
            [
                'color_name_ar.required' => trans('products.color_name_ar_required'),
                'color_name_ar.string' => trans('products.color_name_ar_string'),
                'color_name_ar.max' => trans('products.color_name_ar_max'),

                'color_name_en.required' => trans('products.color_name_en_required'),
                'color_name_en.string' => trans('products.color_name_en_string'),
                'color_name_en.max' => trans('products.color_name_en_max'),

                'color_code.required' => trans('products.color_code_required'),
                'color_code.string' => trans('products.color_code_string'),
                'color_code.unique' => trans('products.color_code_unique'),
            ]
        );
        $product_color = ProductColor::create([
            'color_name_ar' => $data['color_name_ar'],
            'color_name_en' => $data['color_name_en'],
            'color_code' => $data['color_code'],
        ]);
        if (!$product_color) {
            $result['status'] = false;
            $result['message'] = trans('product.add_faild');
        } else {
            $result['status'] = true;
            $result['message'] = trans('product.add_successfully');
        }
        echo json_encode($result);
    }
    public function delete_product(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:products,id',
        ]);
        $check = Product::find($request->id)->update(['is_delete' => 1]);
        if (!$check) {
            $result['status'] = false;
            $result['message'] = trans('product.delete_faild');
        } else {
            $result['status'] = true;
            $result['message'] = trans('product.delete_successfully');
        }
        echo json_encode($result);
    }
    public function active_deactive_product(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:products,id',
        ]);
        $check = Product::find($request->id);
        if ($check->product_status == 'active') {
            Product::find($request->id)->update(['product_status' => 'inactive']);
            $result['status'] = true;
            $result['message'] = trans('product.update_successfully');
        } elseif ($check->product_status == 'inactive') {
            Product::find($request->id)->update(['product_status' => 'active']);

            $result['status'] = true;
            $result['message'] = trans('product.update_successfully');
        } else {
            $result['status'] = false;
            $result['message'] = trans('product.update_faild');
        }
        echo json_encode($result);
    }
}
