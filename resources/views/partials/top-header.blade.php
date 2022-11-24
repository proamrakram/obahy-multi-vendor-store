<div class="top-header">
    <div class="header-bar d-flex justify-content-between">
        <div class="d-flex align-items-center">
            <a href="#" class="logo-icon me-3">
                <img src="{{ asset('assets/images/logo-icon.png') }}" height="30" class="small" alt="">
                <span class="big">
                    <img src="{{ asset('assets/images/logo-dark.png') }}" height="24" class="logo-light-mode"
                        alt="">
                    <img src="{{ asset('assets/images/logo-light.png') }}" height="24" class="logo-dark-mode"
                        alt="">
                </span>
            </a>
            <a id="close-sidebar" class="btn btn-icon border-0" href="javascript:void(0)">
                <img src="{{ asset('assets/images/icon/icon-setup-dots.svg') }}" width='25px'>
            </a>
            <div class="search-bar p-0 d-none d-md-block ms-2">
                <div id="search" class="menu-search mb-0">
                    <form role="search" method="get" id="searchform" class="searchform"
                        action="{{ route('search') }}" enctype="multipart/form-data">
                        @csrf

                        <div class='d-flex'>
                            <input type="text" class="form-control border rounded" name="search" id="s"
                                placeholder="@lang('adminPanel.search-top-header') ">
                            <select name="page" id="" class='form-control'>
                                <option value="orders"> @lang('adminPanel.orders') </option>
                                <!-- <option value="products"> @lang('adminPanel.products') </option> -->
                                <option value="customers"> @lang('adminPanel.customers') </option>
                            </select>
                            <input type="submit" id="searchsubmit" value="Search">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <ul class="list-unstyled mb-0">
            <li class="list-inline-item mb-0 ms-1">
                <div class="dropdown dropdown-primary">
                    <button type="button" class="btn btn-icon btn-soft-light dropdown-toggle p-0"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                            class="ti ti-bell"></i></button>
                    <span
                        class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
                        <span class="visually-hidden">New alerts</span>
                    </span>

                    <div class="dropdown-menu dd-menu bg-white shadow rounded border-0 mt-3 p-0" data-simplebar
                        style="height: 320px; width: 290px;">
                        <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
                            <h6 class="mb-0 text-dark">Notifications</h6>
                            <span class="badge bg-soft-danger rounded-pill">3</span>
                        </div>
                        <div class="p-3">
                            <a href="#!" class="dropdown-item features feature-primary key-feature p-0">
                                <div class="d-flex align-items-center">
                                    <div class="icon text-center rounded-circle me-2">
                                        <i class="ti ti-shopping-cart"></i>
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="mb-0 text-dark title">Order Complete</h6>
                                        <small class="text-muted">15 min ago</small>
                                    </div>
                                </div>
                            </a>

                            <a href="#!" class="dropdown-item features feature-primary key-feature p-0 mt-3">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('assets/images/client/04.jpg') }}"
                                        class="avatar avatar-md-sm rounded-circle border shadow me-2" alt="">
                                    <div class="flex-1">
                                        <h6 class="mb-0 text-dark title"><span class="fw-bold">Message</span> from Luis
                                        </h6>
                                        <small class="text-muted">1 hour ago</small>
                                    </div>
                                </div>
                            </a>

                            <a href="#!" class="dropdown-item features feature-primary key-feature p-0 mt-3">
                                <div class="d-flex align-items-center">
                                    <div class="icon text-center rounded-circle me-2">
                                        <i class="ti ti-currency-dollar"></i>
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="mb-0 text-dark title"><span class="fw-bold">One Refund Request</span>
                                        </h6>
                                        <small class="text-muted">2 hour ago</small>
                                    </div>
                                </div>
                            </a>

                            <a href="#!" class="dropdown-item features feature-primary key-feature p-0 mt-3">
                                <div class="d-flex align-items-center">
                                    <div class="icon text-center rounded-circle me-2">
                                        <i class="ti ti-truck-delivery"></i>
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="mb-0 text-dark title">Deliverd your Order</h6>
                                        <small class="text-muted">Yesterday</small>
                                    </div>
                                </div>
                            </a>

                            <a href="#!" class="dropdown-item features feature-primary key-feature p-0 mt-3">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('assets/images/client/15.jpg') }}"
                                        class="avatar avatar-md-sm rounded-circle border shadow me-2" alt="">
                                    <div class="flex-1">
                                        <h6 class="mb-0 text-dark title"><span class="fw-bold">Cally</span> started
                                            following you</h6>
                                        <small class="text-muted">2 days ago</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </li>

            <li class="list-inline-item mb-0 ms-1">
                <div class="dropdown dropdown-primary">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i
                            class="flag-icon @if (App::getLocale() == 'en') flag-icon-us @else flag-icon-sa @endif"></i>
                        {{ Config::get('languages')[App::getLocale()] }}
                    </a>
                    <div class="dropdown-menu menu-user dd-menu dropdown-menu-end bg-white shadow border-0 mt-3 py-3"
                        style="min-width: 200px;">
                        @foreach (Config::get('languages') as $lang => $language)
                            @if ($lang != App::getLocale())
                                <a class="dropdown-item preview-item px-3 py-0"
                                    href="{{ route('lang.switch', $lang) }}">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon">
                                            <i
                                                class="flag-icon @if (App::getLocale() == 'en') flag-icon-sa @else flag-icon-us @endif"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="font-weight-light mb-0 small-text">
                                            {{ $language }}
                                        </p>
                                    </div>
                                </a>
                            @endif
                        @endforeach


                    </div>
                </div>
            </li>

            <li class="list-inline-item mb-0 ms-1">
                <div class="dropdown dropdown-primary">
                    <button type="button" id="btnMenuUser" class="btn btn-soft-light dropdown-toggle p-0"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ auth()->user()->image }}" class="avatar avatar-ex-small rounded"
                            alt="">
                    </button>
                    <div class="dropdown-menu menu-user dd-menu dropdown-menu-end bg-white shadow border-0 mt-3 py-3"
                        style="min-width: 200px;">
                        <a class="dropdown-item d-flex align-items-center text-dark pb-3"
                            href="@if (auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'admin_employee') {{ route('admin.profile') }}
           @elseif (auth()->user()->user_type == 'store_admin' || auth()->user()->user_type == 'store_employee')
           {{ route('store.profile') }} @endif">
                            <img src="{{ auth()->user()->image }}"
                                class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                            <div class="flex-1 ms-2">
                                <span class="d-block"> {{ auth()->user()->name }} </span>
                                <!-- <small class="text-muted">UI / UX Designer</small> -->
                            </div>
                        </a>
                        <a class="dropdown-item text-dark"
                            href="
                        @if (auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'admin_employee') {{ route('admin.profile') }}
                        @elseif (auth()->user()->user_type == 'store_admin' || auth()->user()->user_type == 'store_employee')
                        {{ route('store.profile') }} @endif"><span
                                class="mb-0 d-inline-block me-1"><i class="ti ti-settings"></i></span>
                            @lang('adminPanel.profile') </a>
                        <a class="dropdown-item text-dark" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><span
                                class="mb-0 d-inline-block me-1"><i class="ti ti-logout"></i></span> @lang('adminPanel.logout')
                        </a>


                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
