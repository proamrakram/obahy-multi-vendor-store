<nav id="sidebar" class="sidebar-wrapper sidebar-dark">
    <div class="sidebar-content" data-simplebar style="height: calc(100% - 60px);">
        <div class="sidebar-brand">
            <a href="index.php">
                <span class="sidebar-colored d-block p-2">
                    <img src="{{ asset('assets/images/Logo.png') }}" height="50" class='m-auto d-block ' alt="">
                </span>
            </a>
        </div>

        <div class="data-user-sidebar text-center mt-3">
            <div class="img">
                <img src="{{ auth()->user()->image }}" class="rounded-circle shadow avatar " alt="">
            </div>
            <h5 class="mt-1 mb-0 h6 text-white">{{ auth()->user()->name }}</h5>
            <span class='main-color '>
                <i class="circle"></i>
                مدير
            </span>
        </div>

        <ul class="sidebar-menu">
            @if (auth()->user()->user_type == 'store_admin' || auth()->user()->user_type == 'store_employee')
                <li class=" @if (Request::segment(2) == 'home') active @endif">
                    <a href="{{ route('store.home') }}">
                        <img src="{{ asset('assets/images/icon-dashboard.svg') }}" width='20' class='me-3'
                            alt="">
                        @lang('adminPanel.home')
                    </a>
                </li>
                @if (auth()->user()->can('products-show') ||
                    auth()->user()->can('products-create'))
                    <li class="sidebar-dropdown @if (Request::segment(1) == 'products') active @endif">
                        <a href="javascript:void(0)">
                            <img src="{{ asset('assets/images/icon/icon-product.svg') }}" width='20' class='me-3'
                                alt="">
                            @lang('adminPanel.products')
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                @if (auth()->user()->can('products-show'))
                                    <li><a href="{{ route('products.index') }}"> @lang('adminPanel.all-products') </a></li>
                                @endif
                                @if (auth()->user()->can('products-create'))
                                    <li><a href="{{ route('products.add.ready_made') }}"> @lang('adminPanel.add-ready-made') </a></li>
                                    <li><a href="{{ route('products.add.custom_made') }}"> @lang('adminPanel.add-custom-made') </a></li>
                                    <li><a href="{{ route('products.add.service_made') }}"> @lang('adminPanel.add-service-made') </a></li>
                                @endif
                            </ul>
                        </div>
                    </li>
                @endif
                @if (auth()->user()->can('sales-show'))
                    <li class=" @if (Request::segment(2) == 'sales') active @endif">
                        <a href="{{ route('store.sales.index') }}">
                            <img src="{{ asset('assets/images/icon/icon-sale.svg') }}" width='20' class='me-3'
                                alt="">
                            @lang('adminPanel.sales')
                        </a>
                    </li>
                @endif
                @if (auth()->user()->can('store-orders-show'))
                    <li class=" @if (Request::segment(2) == 'orders') active @endif">
                        <a href="{{ route('store.orders.index') }}">
                            <img src="{{ asset('assets/images/icon/icon-3d-design.svg') }}" width='20'
                                class='me-3' alt="">
                            @lang('adminPanel.orders')
                        </a>
                    </li>
                @endif
                @if (auth()->user()->can('reports-show'))
                    <li class=" @if (Request::segment(2) == 'reports') active @endif">
                        <a href="{{ route('store.reports.index') }}">
                            <i class="uil uil-analytics me-3 fs-4"></i>
                            @lang('adminPanel.reports')
                        </a>
                    </li>
                @endif
                @if (auth()->user()->can('visits-show'))
                    <li class=" @if (Request::segment(2) == 'visits') active @endif">
                        <a href="{{ route('store.visitor.index') }}">
                            <i class="uil uil-eye me-3 fs-4"></i>
                            @lang('adminPanel.visits')
                        </a>
                    </li>
                @endif
                @if (auth()->user()->can('customers-show'))
                    <li class=" @if (Request::segment(2) == 'customers') active @endif">
                        <a href="{{ route('store.customers.index') }}">
                            <img src="{{ asset('assets/images/icon/icon-clients.svg') }}" width='20' class='me-3'
                                alt="">
                            @lang('adminPanel.customers')
                        </a>
                    </li>
                @endif
                @if (auth()->user()->can('affiliates-show') ||
                    auth()->user()->can('affiliates-create'))
                    <li class="sidebar-dropdown  @if (Request::segment(1) == 'affiliate') active @endif">
                        <a href="javascript:void(0)">
                            <img src="{{ asset('assets/images/icon/icon-marketing.svg') }}" width='20'
                                class='me-3' alt="">
                            @lang('adminPanel.marketing')
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                @if (auth()->user()->can('affiliates-show'))
                                    <li><a href="{{ route('affiliate.index') }}"> @lang('adminPanel.all') </a></li>
                                @endif
                                @if (auth()->user()->can('affiliates-create'))
                                    <li><a href="{{ route('affiliate.add_affiliate') }}"> @lang('adminPanel.add-new-affiliate') </a></li>
                                @endif
                            </ul>
                        </div>
                    </li>
                @endif
                @if (auth()->user()->can('copons-show'))
                    <li class=" @if (Request::segment(2) == 'copons') active @endif">
                        <a href="{{ route('store.copons.index') }}">
                            <img src="{{ asset('assets/images/icon/icon-coupon.svg') }}" width='18' class='me-3'
                                alt="">
                            @lang('adminPanel.copons')
                        </a>
                    </li>
                @endif
                @if (auth()->user()->can('returns-show'))
                    <li class=" @if (Request::segment(2) == 'return') active @endif">
                        <a href="{{ route('store.return.index') }}">
                            <img src="{{ asset('assets/images/icon/icon-returns.svg') }}" width='18' class='me-3'
                                alt="">
                            @lang('adminPanel.returns')
                        </a>
                    </li>
                @endif
                <li class=" @if (Request::segment(2) == 'packages') active @endif">
                    <a href="packages.php">
                        <img src="{{ asset('assets/images/icon/icon-packages.svg') }}" width='18' class='me-3'
                            alt="">
                        @lang('adminPanel.packages')
                    </a>
                </li>



                @if (auth()->user()->can('store-products-comments-show'))
                    <li class=" @if (Request::segment(2) == 'products-comments') active @endif">
                        <a href="{{ route('store.products-comments.index') }}">
                            <img src="{{ asset('assets/images/icon/icon-3d-design.svg') }}" width="20"
                                class="me-3" alt="">
                            @lang('adminPanel.products-comments')
                        </a>
                    </li>
                @endif

                @if (auth()->user()->can('store-abandoned-carts-show'))
                    <li class=" @if (Request::segment(2) == 'abandoned-carts') active @endif">
                        <a href="{{ route('store.abandoned-carts.index') }}">
                            <i class="uil uil-wrench" class='me-3'></i>
                            @lang('adminPanel.abandoned-carts')
                        </a>
                    </li>
                @endif

                @if (auth()->user()->can('store-roles-show'))
                    <li class=" @if (Request::segment(2) == 'roles') active @endif">
                        <a href="{{ route('store.roles.index') }}">
                            <i class="uil uil-wrench" class='me-3'></i>
                            @lang('adminPanel.roles')
                        </a>
                    </li>
                @endif

                @if (auth()->user()->can('store-basic-settings-edit') ||
                    auth()->user()->can('store-seo-edit') ||
                    auth()->user()->can('store-default-currency-edit') ||
                    auth()->user()->can('store-employees-show') ||
                    auth()->user()->can('store-employees-create') ||
                    auth()->user()->can('store-employees-edit') ||
                    auth()->user()->can('store-employees-delete') ||
                    auth()->user()->can('store-advertisments-show') ||
                    auth()->user()->can('store-advertisments-create') ||
                    auth()->user()->can('store-advertisments-edit') ||
                    auth()->user()->can('store-advertisments-delete'))
                    <li class=" @if (Request::segment(2) == 'settings') active @endif">
                        <a href="{{ route('store.settings.index') }}">
                            <i class="uil uil-setting me-3"></i>
                            @lang('adminPanel.setting')
                        </a>
                    </li>
                @endif
            @endif

            <!-- From Here Start Plathform Admin //// Remove This  (platfrom dashboard) this is to explain -->
            @if (auth()->user()->user_type == 'admin_employee' || auth()->user()->user_type == 'admin')
                <li class=" @if (Request::segment(2) == 'home') active @endif">
                    <a href="{{ route('admin.home') }}">
                        <img src="{{ asset('assets/images/icon-dashboard.svg') }}" width="20" class="me-3"
                            alt="">
                        @lang('adminPanel.home')
                    </a>
                </li>

                @if (auth()->user()->can('stores-show'))
                    <li class=" @if (Request::segment(2) == 'stores') active @endif">
                        <a href="{{ route('admin.stores.index') }}">
                            <img src="{{ asset('assets/images/icon-user.svg') }}" width="20" class="me-3"
                                alt="">
                            @lang('adminPanel.stores')
                        </a>
                    </li>
                @endif
                @if (auth()->user()->can('customers-show'))
                    <li class=" @if (Request::segment(2) == 'customers') active @endif">
                        <a href="{{ route('admin.customers.index') }}">
                            <img src="{{ asset('assets/images/icon/icon-clients.svg') }}" width='20'
                                class='me-3' alt="">
                            @lang('adminPanel.customers')
                        </a>
                    </li>
                @endif
                @if (auth()->user()->can('admins-store-show'))
                    <li class=" @if (Request::segment(2) == 'admins-store') active @endif">
                        <a href="{{ route('admin.admins-store.index') }}">
                            <img src="{{ asset('assets/images/icon/icon-clients.svg') }}" width='20'
                                class='me-3' alt="">
                            @lang('adminPanel.admins-store')
                        </a>
                    </li>
                @endif


                @if (auth()->user()->can('admin-visits-show'))
                    <li class=" @if (Request::segment(2) == 'visits') active @endif">
                        <a href="{{ route('admin.visitor.index') }}">
                            <i class="uil uil-eye me-3 fs-4"></i>
                            @lang('adminPanel.visits')
                        </a>
                    </li>
                @endif


                @if (auth()->user()->can('admin-products-show') ||
                    auth()->user()->can('admin-products-create'))
                    <li class="sidebar-dropdown @if (Request::segment(2) == 'products') active @endif">
                        <a href="javascript:void(0)">
                            <img src="{{ asset('assets/images/icon/icon-product.svg') }}" width='20'
                                class='me-3' alt="">
                            @lang('adminPanel.products')
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                @if (auth()->user()->can('admin-products-show'))
                                    <li><a href="{{ route('admin.products.index') }}"> @lang('adminPanel.all-products') </a></li>
                                @endif
                                @if (auth()->user()->can('admin-products-create'))
                                    <li><a href="{{ route('admin.products.add.ready_made') }}"> @lang('adminPanel.add-ready-made')
                                        </a></li>
                                    <li><a href="{{ route('admin.products.add.custom_made') }}"> @lang('adminPanel.add-custom-made')
                                        </a></li>
                                    <li><a href="{{ route('admin.products.add.service_made') }}"> @lang('adminPanel.add-service-made')
                                        </a></li>
                                @endif

                            </ul>
                        </div>
                    </li>
                @endif

                @if (auth()->user()->can('admin-affiliates-show') ||
                    auth()->user()->can('admin-affiliates-create'))
                    <li class="sidebar-dropdown  @if (Request::segment(1) == 'affiliate') active @endif">
                        <a href="javascript:void(0)">
                            <img src="{{ asset('assets/images/icon/icon-marketing.svg') }}" width='20'
                                class='me-3' alt="">
                            @lang('adminPanel.marketing')
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                @if (auth()->user()->can('admin-affiliates-show'))
                                    <li><a href="{{ route('admin.affiliate.index') }}"> @lang('adminPanel.all') </a></li>
                                @endif
                                @if (auth()->user()->can('admin-affiliates-create'))
                                    <li><a href="{{ route('admin.affiliate.add_affiliate') }}"> @lang('adminPanel.add-new-affiliate')
                                        </a></li>
                                @endif
                            </ul>
                        </div>
                    </li>
                @endif

                @if (auth()->user()->can('admin-copons-show'))
                    <li class=" @if (Request::segment(2) == 'copons') active @endif">
                        <a href="{{ route('admin.copons.index') }}">
                            <img src="{{ asset('assets/images/icon/icon-coupon.svg') }}" width='18'
                                class='me-3' alt="">
                            @lang('adminPanel.copons')
                        </a>
                    </li>
                @endif

                @if (auth()->user()->can('sales-show'))
                    <li class=" @if (Request::segment(2) == 'sales') active @endif">
                        <a href="{{ route('admin.sales.index') }}">
                            <img src="{{ asset('assets/images/icon/icon-sale.svg') }}" width="20" class="me-3"
                                alt="">
                            @lang('adminPanel.sales')
                        </a>
                    </li>
                @endif
                @if (auth()->user()->can('orders-show'))
                    <li class=" @if (Request::segment(2) == 'orders') active @endif">
                        <a href="{{ route('admin.orders.index') }}">
                            <img src="{{ asset('assets/images/icon/icon-3d-design.svg') }}" width="20"
                                class="me-3" alt="">
                            @lang('adminPanel.orders')
                        </a>
                    </li>
                @endif
                @if (auth()->user()->can('profits-show'))
                    <li class=" @if (Request::segment(2) == 'profits') active @endif">
                        <a href="{{ route('admin.profits.index') }}">
                            <img src="{{ asset('assets/images/icon/icon-clients.svg') }}" width='18'
                                class='me-3' alt="">
                            @lang('adminPanel.profits')
                        </a>
                    </li>
                @endif
                @if (auth()->user()->can('returns-show'))
                    <li class=" @if (Request::segment(2) == 'return') active @endif">
                        <a href="{{ route('admin.return.index') }}">
                            <img src="{{ asset('assets/images/icon/icon-returns.svg') }}" width='18'
                                class='me-3' alt="">
                            @lang('adminPanel.returns')
                        </a>
                    </li>
                @endif
                @if (auth()->user()->can('products-categories-show'))
                    <li class=" @if (Request::segment(2) == 'products-categories') active @endif">
                        <a href="{{ route('admin.products-categories.index') }}">
                            <i class="uil uil-setting me-3"></i>
                            @lang('adminPanel.categories')
                        </a>
                    </li>
                @endif
                @if (auth()->user()->can('packages-show'))
                    <li class=" @if (Request::segment(2) == 'packages') active @endif">
                        <a href="{{ route('admin.packages.index') }}">
                            <img src="{{ asset('assets/images/icon/icon-packages.svg') }}" width='18'
                                class='me-3' alt="">
                            @lang('adminPanel.packages')
                        </a>
                    </li>
                @endif

                @if (auth()->user()->can('admin-products-comments-show'))
                    <li class=" @if (Request::segment(2) == 'products-comments') active @endif">
                        <a href="{{ route('admin.products-comments.index') }}">
                            <img src="{{ asset('assets/images/icon/icon-3d-design.svg') }}" width="20"
                                class="me-3" alt="">
                            @lang('adminPanel.products-comments')
                        </a>
                    </li>
                @endif


                @if (auth()->user()->can('admin-abandoned-carts-show') ||
                    auth()->user()->can('admin-abandoned-carts-settings-edit'))


                    <li class="sidebar-dropdown  @if (Request::segment(2) == 'abandoned-carts') show @endif">
                        <a href="javascript:void(0)">
                            <i class="uil uil-wrench" class='me-3'></i>
                            @lang('adminPanel.abandoned-carts')
                        </a>
                        <div class="sidebar-submenu  @if (Request::segment(2) == 'abandoned-carts') d-block @endif">
                            <ul>
                                @if (auth()->user()->can('admin-abandoned-carts-show'))
                                    <li class="@if (Request::segment(2) == 'abandoned-carts' && Request::segment(3) == '') active @endif"><a
                                            href="{{ route('admin.abandoned-carts.index') }}"> @lang('adminPanel.all') </a>
                                    </li>
                                @endif
                                @if (auth()->user()->can('admin-abandoned-carts-settings-edit'))
                                    <li class="@if (Request::segment(2) == 'abandoned-carts' && Request::segment(3) == 'settings') active @endif"><a
                                            href="{{ route('admin.abandoned-carts.settings') }}"> @lang('adminPanel.abandoned-carts-settings')
                                        </a></li>
                                @endif
                            </ul>
                        </div>
                    </li>

                @endif

                @if (auth()->user()->can('stores-types-show'))
                    <li class=" @if (Request::segment(2) == 'stores-types') active @endif">
                        <a href="{{ route('admin.stores-types.index') }}">
                            <i class="uil uil-wrench" class='me-3'></i>
                            @lang('adminPanel.stores-types')
                        </a>
                    </li>
                @endif

                @if (auth()->user()->can('roles-show'))
                    <li class=" @if (Request::segment(2) == 'roles') active @endif">
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="uil uil-wrench" class='me-3'></i>
                            @lang('adminPanel.roles')
                        </a>
                    </li>
                @endif

                @if (auth()->user()->can('basic-settings-edit') ||
                    auth()->user()->can('social-media-settings-edit') ||
                    auth()->user()->can('faq-edit') ||
                    auth()->user()->can('about-us-edit') ||
                    auth()->user()->can('privacy-edit') ||
                    auth()->user()->can('default-package-edit') ||
                    auth()->user()->can('package-settings-edit') ||
                    auth()->user()->can('default-currency-edit') ||
                    auth()->user()->can('currencies-show') ||
                    auth()->user()->can('currencies-create') ||
                    auth()->user()->can('currencies-edit') ||
                    auth()->user()->can('currencies-delete') ||
                    auth()->user()->can('countries-show') ||
                    auth()->user()->can('countries-create') ||
                    auth()->user()->can('countries-edit') ||
                    auth()->user()->can('countries-delete') ||
                    auth()->user()->can('cities-show') ||
                    auth()->user()->can('cities-create') ||
                    auth()->user()->can('cities-edit') ||
                    auth()->user()->can('cities-delete') ||
                    auth()->user()->can('admins-show') ||
                    auth()->user()->can('admins-create') ||
                    auth()->user()->can('admins-edit') ||
                    auth()->user()->can('admins-delete') ||
                    auth()->user()->can('advertisments-show') ||
                    auth()->user()->can('advertisments-create') ||
                    auth()->user()->can('advertisments-edit') ||
                    auth()->user()->can('advertisments-delete') ||
                    auth()->user()->can('payments-type-show'))
                    <li class=" @if (Request::segment(2) == 'settings') active @endif">
                        <a href="{{ route('admin.settings.index') }}">
                            <i class="uil uil-setting me-3"></i>
                            @lang('adminPanel.setting')
                        </a>
                    </li>
                @endif
            @endif



        </ul>
        <!-- sidebar-menu  -->
    </div>
    <!-- Sidebar Footer -->
    <ul class="sidebar-footer list-unstyled mb-4">
        <li class="d-flex justify-content-center mb-0 icon-help">
            <a href="" target="_blank" class="btn btn-icon btn-soft-light">
                <i class="uil uil-question-circle"></i>
                <small class="ms-1"> @lang('adminPanel.help') </small>
            </a>
        </li>
    </ul>
    <!-- Sidebar Footer -->
</nav>
<!-- sidebar-wrapper -->
