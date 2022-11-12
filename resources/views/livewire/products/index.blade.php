<div>
    <style>
        h2.page-header {
            margin-top: 0px;
            padding-top: 0px;
            line-height: 15px;
            vertical-align: middle;
        }

        .table-sortable>thead>tr>th {
            cursor: pointer;
            position: relative;
        }

        .table-sortable>thead>tr>th:after,
        .table-sortable>thead>tr>th:after,
        .table-sortable>thead>tr>th:after {
            content: ' ';
            position: absolute;
            height: 0;
            width: 0;
            right: 10px;
            top: 16px;
        }

        .table-sortable>thead>tr>th:after {
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-top: 5px solid #ccc;
            border-bottom: 0px solid transparent;
        }

        .table-sortable>thead>tr>th:hover:after {
            border-top: 5px solid #888;
        }

        .table-sortable>thead>tr>th.asc:after {
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-top: 0px solid transparent;
            border-bottom: 5px solid #333;
        }

        .table-sortable>thead>tr>th.asc:hover:after {
            border-bottom: 5px solid #888;
        }

        .table-sortable>thead>tr>th.desc:after {
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-top: 5px solid #333;
            border-bottom: 5px solid transparent;
        }
    </style>


    <div class="filter-search">
        <div class="heading d-flex justify-content-between align-items-center pe-3">
            <h4 class="h5"> تصفية </h4>
            <i class="uil uil-filter"></i>
        </div>
        <div class="content p-4 border">
            <div class="row">

                <div class="col-md-4 col-6">
                    <div class="row align-items-center">

                        <div class="col-3"><label for="name">اسم المنتج</label></div>

                        <div class="col-8">
                            <input type="text" class="form-control" wire:model='search' />
                        </div>

                    </div>
                </div>

                {{-- <div class="col-md-4 col-6">
                    <div class="row align-items-center">

                        <div class="col-2"><label for="">التاريخ</label></div>

                        <div class="col-8">
                            <input type="date" class='form-control'>
                        </div>

                    </div>
                </div> --}}

                <div class="col-md-4 col-6">
                    <div class="row align-items-center">
                        <div class="col-2"><label for="">التصنيف </label></div>

                        <div class="col-8">

                            <select name="category" wire:change="updateProducts" wire:model='category_id'
                                id="categories" class="form-select form-control" aria-label="Default select example">

                                @if (isset($categories))
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }} </option>
                                    @endforeach
                                @endif

                            </select>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="bg-white mt-3">
        <div class="d-flex justify-content-between p-4  bg-white   rounded-top border-bottom heading-with-shape">
            <h6 class="fw-bold mb-0 h4"> المنتجات </h6>
            <div class="btns">
                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addCategory"
                    class="btn btn-outline-dark"> إضافة تصنيف </a>
                <a href="{{ route('products.add.ready_made') }}" class="btn btn-dark"> إضافة منتج </a>
            </div>
        </div>

        <!-- Modal Content Start -->
        <div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="LoginForm-title" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content rounded shadow border-0">
                    <div class="modal-header border-bottom bg-soft-dark">
                        <h5 class="modal-title" id="LoginForm-title">إضافة تصنيف جديد</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="bg-white p-3 rounded box-shadow">
                            <form method="POST" id="add_category">
                                @csrf
                                <input type="hidden" name="status" value="active" />
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-3">
                                                <label for="catName" class='font-sm'> القسم الفرعي</label>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-md-6"><input type="text" id="catName"
                                                            name="category_name_en" placeholder='اسم التصنيف بالعربية'
                                                            class='form-control'>
                                                    </div>
                                                    <div class="col-md-6"><input type="text" id="catName"
                                                            name="category_name_ar"
                                                            placeholder='اسم التصنيف بالانجليزية' class='form-control'>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row align-items-center">
                                            <div class="col-md-3"><label for="subCatName" class='font-sm'>قسم الاب
                                                </label></div>
                                            <div class="col-md-9">
                                                <select name="parent_id" id="categories_parent" class="form-select">
                                                    <option value="">اضف تصنيف الاب</option>
                                                    @if (isset($categories))
                                                        @foreach ($categories as $item)
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->category_name_ar }} </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="submit" onclick="addCategory()" class="btn btn-dark px-5">حفظ</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Content End -->





        <div class="p-4">

            <div class="btns-optons-table mb-3">
                <button class="btn btn-dark">Print</button>
                <button class="btn btn-dark">pdf</button>
                <button class="btn btn-dark">Excel</button>
                <button class="btn btn-dark">csv</button>
                <button class="btn btn-dark">copy</button>
                <button wire:click='alertDeleteProducts' class="btn btn-danger">Delete</button>
                <button wire:click='changeProductsStatus' class="btn btn-warning">Change Status</button>
            </div>



            <div class="table-responsive rounded-bottom mb-3">

                <table id="table_id" class="table table-bordered table-sortable text-center">
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox" class="form-check-input" wire:click='selectAll'>
                                <label class="form-check-label"></label>
                            </th>

                            <th>م</th>
                            <th wire:click="sortingTable('sort_product_name')" class="{{ $sort_product_name }}">اسم
                                المنتج</th>
                            <th wire:click="sortingTable('sort_product_category')"
                                class="{{ $sort_product_category }}">تصنيف المنتج</th>
                            <th wire:click="sortingTable('sort_product_price')" class="{{ $sort_product_price }}">
                                السعر</th>
                            <th wire:click="sortingTable('sort_product_vat')" class="{{ $sort_product_vat }}">الضريبة
                            </th>
                            <th>في المخزن</th>
                            <th>صورة المنتج</th>
                            <th>اعدادات</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($products as $product)

                            <tr>
                                <td>
                                    <input class="form-check-input" type="checkbox" value="{{ $product->id }}"
                                        wire:model='products_ids'>
                                    <label class="form-check-label"></label>
                                </td>
                                <td data-sortable="true">{{ $product->id }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->category->category_name }}</td>
                                <td>{{ $product->product_price }}</td>
                                <td>{{ $product->product_vat }}</td>
                                <td>{{ $product->in_stock ? 'Yes' : 'No' }}</td>
                                <td> <img src="{{ $product->product_main_image }}" class='img-small' alt="">
                                </td>
                                <td>


                                    <div class='tools-options d-flex justify-content-center'>
                                        <div class='form-check form-switch p-0 pt-1'>
                                            <input class='form-check-input'
                                                wire:change='changeProductStatus({{ $product->id }})'
                                                type='checkbox' @if ($product->product_status == 'active') checked @endif>
                                        </div>

                                        <a href="{{ route('products.update.update_product', $product->id) }}"> <i
                                                class='uil uil-edit'></i> </a>
                                        <i wire:click='alertDeleteProduct({{ $product->id }})'
                                            class='uil uil-trash-alt'></i>
                                    </div>

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

                {{ $products->links() }}

            </div>

        </div>
    </div>

</div>
