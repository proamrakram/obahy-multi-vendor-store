<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
});


Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);
Route::get('lang/{lang}', [App\Http\Controllers\LanguageController::class, 'switchLang'])->name('lang.switch');

Auth::routes();

Route::get('/search', [App\Http\Controllers\SearchController::class, 'search'])->name('search');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {

    Route::get('/home', [App\Http\Controllers\AdminPanel\HomeController::class, 'index'])->name('admin.home');

    /////////////////////////////////////////////
    Route::get('/roles', [App\Http\Controllers\AdminPanel\RolesController::class, 'index'])->name('admin.roles.index')->middleware('permission:roles-show');
    Route::get('/roles/create', [App\Http\Controllers\AdminPanel\RolesController::class, 'create'])->name('admin.roles.create')->middleware('permission:roles-create');
    Route::post('/roles/store', [App\Http\Controllers\AdminPanel\RolesController::class, 'store'])->name('admin.roles.store')->middleware('permission:roles-create');
    Route::get('/roles/edit/{id}', [App\Http\Controllers\AdminPanel\RolesController::class, 'edit'])->name('admin.roles.edit')->middleware('permission:roles-edit');
    Route::post('/roles/update/{id}', [App\Http\Controllers\AdminPanel\RolesController::class, 'update'])->name('admin.roles.update')->middleware('permission:roles-edit');
    Route::get('/roles/delete/{id}', [App\Http\Controllers\AdminPanel\RolesController::class, 'destroy'])->name('admin.roles.delete')->middleware('permission:roles-delete');

    ////////////////////////////////////////////////////////////////////////////////////////////////////

    Route::get('/settings/profile', [App\Http\Controllers\AdminPanel\ProfileController::class, 'profile'])->name('admin.profile');
    Route::post('/settings/profile', [App\Http\Controllers\AdminPanel\ProfileController::class, 'update_profile'])->name('admin.profile.update');

    ////////////////////////////////////////////////////////////////////////////////////////////////////
    Route::get('/settings', [App\Http\Controllers\AdminPanel\SettingsController::class, 'index'])->name('admin.settings.index');
    Route::get('/settings/privacy', [App\Http\Controllers\AdminPanel\SettingsController::class, 'privacy'])->name('admin.settings.privacy')->middleware('permission:privacy-edit');
    Route::post('/settings/privacy', [App\Http\Controllers\AdminPanel\SettingsController::class, 'update_privacy'])->name('admin.settings.update-privacy')->middleware('permission:privacy-edit');
    Route::get('/settings/about', [App\Http\Controllers\AdminPanel\SettingsController::class, 'about'])->name('admin.settings.about')->middleware('permission:about-us-edit');
    Route::post('/settings/about', [App\Http\Controllers\AdminPanel\SettingsController::class, 'update_about'])->name('admin.settings.update-about')->middleware('permission:about-us-edit');
    Route::get('/settings/faq', [App\Http\Controllers\AdminPanel\SettingsController::class, 'faq'])->name('admin.settings.faq')->middleware('permission:faq-edit');
    Route::post('/settings/faq', [App\Http\Controllers\AdminPanel\SettingsController::class, 'update_faq'])->name('admin.settings.update-faq')->middleware('permission:faq-edit');
    Route::get('/settings/global', [App\Http\Controllers\AdminPanel\SettingsController::class, 'global'])->name('admin.settings.global')->middleware('permission:basic-settings-edit');
    Route::post('/settings/global', [App\Http\Controllers\AdminPanel\SettingsController::class, 'update_global'])->name('admin.settings.update-global')->middleware('permission:basic-settings-edit');
    Route::get('/settings/social', [App\Http\Controllers\AdminPanel\SettingsController::class, 'social'])->name('admin.settings.social')->middleware('permission:social-media-settings-edit');
    Route::post('/settings/social', [App\Http\Controllers\AdminPanel\SettingsController::class, 'update_social'])->name('admin.settings.update-social')->middleware('permission:social-media-settings-edit');
    /////////////////////////////////////////////
    Route::get('/currencies', [App\Http\Controllers\AdminPanel\CurrenciesController::class, 'index'])->name('admin.currencies.index')->middleware('permission:currencies-show');
    Route::get('/currencies/create', [App\Http\Controllers\AdminPanel\CurrenciesController::class, 'create'])->name('admin.currencies.create')->middleware('permission:currencies-create');
    Route::post('/currencies/store', [App\Http\Controllers\AdminPanel\CurrenciesController::class, 'store'])->name('admin.currencies.store')->middleware('permission:currencies-create');
    Route::get('/currencies/edit/{id}', [App\Http\Controllers\AdminPanel\CurrenciesController::class, 'edit'])->name('admin.currencies.edit')->middleware('permission:currencies-edit');
    Route::post('/currencies/update/{id}', [App\Http\Controllers\AdminPanel\CurrenciesController::class, 'update'])->name('admin.currencies.update')->middleware('permission:currencies-edit');
    Route::get('/currencies/delete/{id}', [App\Http\Controllers\AdminPanel\CurrenciesController::class, 'destroy'])->name('admin.currencies.delete')->middleware('permission:currencies-delete');
    /////////////////////////////////////////////
    Route::get('/products-categories', [App\Http\Controllers\AdminPanel\ProductsCategoriesController::class, 'index'])->name('admin.products-categories.index')->middleware('permission:products-categories-show');
    Route::get('/products-categories/create', [App\Http\Controllers\AdminPanel\ProductsCategoriesController::class, 'create'])->name('admin.products-categories.create')->middleware('permission:products-categories-create');
    Route::post('/products-categories/store', [App\Http\Controllers\AdminPanel\ProductsCategoriesController::class, 'store'])->name('admin.products-categories.store')->middleware('permission:products-categories-create');
    Route::get('/products-categories/edit/{id}', [App\Http\Controllers\AdminPanel\ProductsCategoriesController::class, 'edit'])->name('admin.products-categories.edit')->middleware('permission:products-categories-edit');
    Route::post('/products-categories/update/{id}', [App\Http\Controllers\AdminPanel\ProductsCategoriesController::class, 'update'])->name('admin.products-categories.update')->middleware('permission:products-categories-edit');
    Route::get('/products-categories/delete/{id}', [App\Http\Controllers\AdminPanel\ProductsCategoriesController::class, 'destroy'])->name('admin.products-categories.delete')->middleware('permission:products-categories-delete');
    Route::get('/products-categories/change-status/{id}', [App\Http\Controllers\AdminPanel\ProductsCategoriesController::class, 'change_status'])->name('admin.products-categories.changeStatus')->middleware('permission:products-categories-show');

    /////////////////////////////////////////////
    /////////////////////////////////////////////
    Route::get('/stores-types', [App\Http\Controllers\AdminPanel\StoresTypesController::class, 'index'])->name('admin.stores-types.index')->middleware('permission:stores-types-show');
    Route::get('/stores-types/create', [App\Http\Controllers\AdminPanel\StoresTypesController::class, 'create'])->name('admin.stores-types.create')->middleware('permission:stores-types-create');
    Route::post('/stores-types/store', [App\Http\Controllers\AdminPanel\StoresTypesController::class, 'store'])->name('admin.stores-types.store')->middleware('permission:stores-types-create');
    Route::get('/stores-types/edit/{id}', [App\Http\Controllers\AdminPanel\StoresTypesController::class, 'edit'])->name('admin.stores-types.edit')->middleware('permission:stores-types-edit');
    Route::post('/stores-types/update/{id}', [App\Http\Controllers\AdminPanel\StoresTypesController::class, 'update'])->name('admin.stores-types.update')->middleware('permission:stores-types-edit');
    Route::get('/stores-types/delete/{id}', [App\Http\Controllers\AdminPanel\StoresTypesController::class, 'destroy'])->name('admin.stores-types.delete')->middleware('permission:stores-types-delete');
    Route::get('/stores-types/change-status/{id}', [App\Http\Controllers\AdminPanel\StoresTypesController::class, 'change_status'])->name('admin.stores-types.changeStatus')->middleware('permission:stores-types-show');

    /////////////////////////////////////////////
    Route::get('/packages', [App\Http\Controllers\AdminPanel\PackagesController::class, 'index'])->name('admin.packages.index')->middleware('permission:packages-show');
    Route::get('/packages/create', [App\Http\Controllers\AdminPanel\PackagesController::class, 'create'])->name('admin.packages.create')->middleware('permission:packages-create');
    Route::post('/packages/store', [App\Http\Controllers\AdminPanel\PackagesController::class, 'store'])->name('admin.packages.store')->middleware('permission:packages-create');
    Route::get('/packages/edit/{id}', [App\Http\Controllers\AdminPanel\PackagesController::class, 'edit'])->name('admin.packages.edit')->middleware('permission:packages-edit');
    Route::post('/packages/update/{id}', [App\Http\Controllers\AdminPanel\PackagesController::class, 'update'])->name('admin.packages.update')->middleware('permission:packages-edit');
    Route::get('/packages/delete/{id}', [App\Http\Controllers\AdminPanel\PackagesController::class, 'destroy'])->name('admin.packages.delete')->middleware('permission:packages-delete');
    Route::get('/packages/change-status/{id}', [App\Http\Controllers\AdminPanel\PackagesController::class, 'change_status'])->name('admin.packages.changeStatus')->middleware('permission:packages-show');
    /////////////////////////////////////////////
    Route::get('/countries', [App\Http\Controllers\AdminPanel\CountriesController::class, 'index'])->name('admin.countries.index')->middleware('permission:countries-show');
    Route::get('/countries/create', [App\Http\Controllers\AdminPanel\CountriesController::class, 'create'])->name('admin.countries.create')->middleware('permission:countries-create');
    Route::post('/countries/store', [App\Http\Controllers\AdminPanel\CountriesController::class, 'store'])->name('admin.countries.store')->middleware('permission:countries-create');
    Route::get('/countries/edit/{id}', [App\Http\Controllers\AdminPanel\CountriesController::class, 'edit'])->name('admin.countries.edit')->middleware('permission:countries-edit');
    Route::post('/countries/update/{id}', [App\Http\Controllers\AdminPanel\CountriesController::class, 'update'])->name('admin.countries.update')->middleware('permission:countries-edit');
    Route::get('/countries/delete/{id}', [App\Http\Controllers\AdminPanel\CountriesController::class, 'destroy'])->name('admin.countries.delete')->middleware('permission:countries-delete');
    Route::get('/countries/change-status/{id}', [App\Http\Controllers\AdminPanel\CountriesController::class, 'change_status'])->name('admin.countries.changeStatus')->middleware('permission:countries-show');
    /////////////////////////////////////////////
    Route::get('/cities/index', [App\Http\Controllers\AdminPanel\CitiesController::class, 'index'])->name('admin.cities.index')->middleware('permission:cities-show');
    Route::get('/cities/create', [App\Http\Controllers\AdminPanel\CitiesController::class, 'create'])->name('admin.cities.create')->middleware('permission:cities-create');
    Route::post('/cities/store', [App\Http\Controllers\AdminPanel\CitiesController::class, 'store'])->name('admin.cities.store')->middleware('permission:cities-create');
    Route::get('/cities/edit/{id}', [App\Http\Controllers\AdminPanel\CitiesController::class, 'edit'])->name('admin.cities.edit')->middleware('permission:cities-edit');
    Route::post('/cities/update/{id}', [App\Http\Controllers\AdminPanel\CitiesController::class, 'update'])->name('admin.cities.update')->middleware('permission:cities-edit');
    Route::get('/cities/delete/{id}', [App\Http\Controllers\AdminPanel\CitiesController::class, 'destroy'])->name('admin.cities.delete')->middleware('permission:cities-delete');
    Route::get('/cities/change-status/{id}', [App\Http\Controllers\AdminPanel\CitiesController::class, 'change_status'])->name('admin.cities.changeStatus')->middleware('permission:cities-show');

    /////////////////////////////////////////////
    Route::get('/advertisments', [App\Http\Controllers\AdminPanel\AdvertismentsController::class, 'index'])->name('admin.advertisments.index')->middleware('permission:advertisments-show');
    Route::get('/advertisments/create', [App\Http\Controllers\AdminPanel\AdvertismentsController::class, 'create'])->name('admin.advertisments.create')->middleware('permission:advertisments-create');
    Route::post('/advertisments/store', [App\Http\Controllers\AdminPanel\AdvertismentsController::class, 'store'])->name('admin.advertisments.store')->middleware('permission:advertisments-create');
    Route::get('/advertisments/edit/{id}', [App\Http\Controllers\AdminPanel\AdvertismentsController::class, 'edit'])->name('admin.advertisments.edit')->middleware('permission:advertisments-edit');
    Route::post('/advertisments/update/{id}', [App\Http\Controllers\AdminPanel\AdvertismentsController::class, 'update'])->name('admin.advertisments.update')->middleware('permission:advertisments-edit');
    Route::get('/advertisments/delete/{id}', [App\Http\Controllers\AdminPanel\AdvertismentsController::class, 'destroy'])->name('admin.advertisments.delete')->middleware('permission:advertisments-delete');
    Route::get('/advertisments/change-status/{id}', [App\Http\Controllers\AdminPanel\AdvertismentsController::class, 'change_status'])->name('admin.advertisments.changeStatus')->middleware('permission:advertisments-show');

    ////////////////////////////////////////////////////////////////////////////////////////////////////
    Route::get('/admins', [App\Http\Controllers\AdminPanel\AdminsController::class, 'index'])->name('admin.admins.index')->middleware('permission:admins-show');
    Route::post('/admins/store', [App\Http\Controllers\AdminPanel\AdminsController::class, 'store'])->name('admin.admins.store')->middleware('permission:admins-create');
    Route::get('/admins/edit', [App\Http\Controllers\AdminPanel\AdminsController::class, 'edit'])->name('admin.admins.edit')->middleware('permission:admins-edit');
    Route::post('/admins/update/{id}', [App\Http\Controllers\AdminPanel\AdminsController::class, 'update'])->name('admin.admins.update')->middleware('permission:admins-edit');
    Route::get('/admins/delete/{id}', [App\Http\Controllers\AdminPanel\AdminsController::class, 'destroy'])->name('admin.admins.delete')->middleware('permission:admins-delete');
    Route::get('/admins/change-status/{id}', [App\Http\Controllers\AdminPanel\AdminsController::class, 'change_status'])->name('admin.admins.changeStatus')->middleware('permission:admins-show');

    ////////////////////////////////////////////////////////////////////////////////////////////////////
    Route::get('/admins-store', [App\Http\Controllers\AdminPanel\AdminsStoreController::class, 'index'])->name('admin.admins-store.index')->middleware('permission:admins-store-show');
    Route::post('/admins-store/store', [App\Http\Controllers\AdminPanel\AdminsStoreController::class, 'store'])->name('admin.admins-store.store')->middleware('permission:admins-store-create');
    Route::get('/admins-store/edit', [App\Http\Controllers\AdminPanel\AdminsStoreController::class, 'edit'])->name('admin.admins-store.edit')->middleware('permission:admins-store-edit');
    Route::post('/admins-store/update/{id}', [App\Http\Controllers\AdminPanel\AdminsStoreController::class, 'update'])->name('admin.admins-store.update')->middleware('permission:admins-store-edit');
    Route::get('/admins-store/delete/{id}', [App\Http\Controllers\AdminPanel\AdminsStoreController::class, 'destroy'])->name('admin.admins-store.delete')->middleware('permission:admins-store-delete');
    Route::get('/admins-store/change-status/{id}', [App\Http\Controllers\AdminPanel\AdminsStoreController::class, 'change_status'])->name('admin.admins-store.changeStatus')->middleware('permission:admins-store-show');

    ////////////////////////////////////////////////////////////////////////////////////////////////////
    Route::get('/customers', [App\Http\Controllers\AdminPanel\CustomersController::class, 'index'])->name('admin.customers.index')->middleware('permission:customers-show');
    Route::post('/customers/store', [App\Http\Controllers\AdminPanel\CustomersController::class, 'store'])->name('admin.customers.store')->middleware('permission:customers-create');
    Route::get('/customers/edit', [App\Http\Controllers\AdminPanel\CustomersController::class, 'edit'])->name('admin.customers.edit')->middleware('permission:customers-edit');
    Route::post('/customers/update/{id}', [App\Http\Controllers\AdminPanel\CustomersController::class, 'update'])->name('admin.customers.update')->middleware('permission:customers-edit');
    Route::get('/customers/delete/{id}', [App\Http\Controllers\AdminPanel\CustomersController::class, 'destroy'])->name('admin.customers.delete')->middleware('permission:customers-delete');
    Route::get('/customers/change-status/{id}', [App\Http\Controllers\AdminPanel\CustomersController::class, 'change_status'])->name('admin.customers.changeStatus')->middleware('permission:customers-show');
    ////////////////////////////////////////////////////////////////////////////////////////////////////
    Route::get('/stores', [App\Http\Controllers\AdminPanel\StoresController::class, 'index'])->name('admin.stores.index')->middleware('permission:stores-show');
    Route::get('/stores/create', [App\Http\Controllers\AdminPanel\StoresController::class, 'create'])->name('admin.stores.create')->middleware('permission:stores-create');
    Route::post('/stores/store', [App\Http\Controllers\AdminPanel\StoresController::class, 'store'])->name('admin.stores.store')->middleware('permission:stores-create');
    Route::get('/stores/edit/{id}', [App\Http\Controllers\AdminPanel\StoresController::class, 'edit'])->name('admin.stores.edit')->middleware('permission:stores-edit');
    Route::post('/stores/update/{id}', [App\Http\Controllers\AdminPanel\StoresController::class, 'update'])->name('admin.stores.update')->middleware('permission:stores-edit');
    Route::get('/stores/delete/{id}', [App\Http\Controllers\AdminPanel\StoresController::class, 'destroy'])->name('admin.stores.delete')->middleware('permission:stores-delete');
    Route::get('/stores/change-status/{id}', [App\Http\Controllers\AdminPanel\StoresController::class, 'change_status'])->name('admin.stores.changeStatus')->middleware('permission:stores-show');

    Route::post('/get-cities-by-country', [App\Http\Controllers\AdminPanel\StoresController::class, 'getCity'])->name('get-cities-by-country')->withoutMiddleware(['auth', 'admin']);

    ////////////////////////////////////////////////////////////////////////////////////////////////////
    Route::get('/payment-types', [App\Http\Controllers\AdminPanel\PaymentTypesController::class, 'index'])->name('admin.payment-types.index')->middleware('permission:payments-type-show');
    Route::get('/payment-types/change-status/{id}', [App\Http\Controllers\AdminPanel\PaymentTypesController::class, 'change_status'])->name('admin.payment-types.changeStatus')->middleware('permission:payments-type-show');


    Route::post('/settings/currency', [App\Http\Controllers\AdminPanel\SettingsController::class, 'update_currency'])->name('admin.settings.update-currency')->middleware('permission:currencies-show');




    Route::get('/settings/package', [App\Http\Controllers\AdminPanel\SettingsController::class, 'package'])->name('admin.settings.package')->middleware('permission:default-package-edit');
    Route::post('/settings/package', [App\Http\Controllers\AdminPanel\SettingsController::class, 'update_package'])->name('admin.settings.update-package')->middleware('permission:default-package-edit');

    Route::get('/settings/package-settings', [App\Http\Controllers\AdminPanel\SettingsController::class, 'package_settings'])->name('admin.settings.package-settings')->middleware('permission:package-settings-edit');
    Route::post('/settings/package-settings', [App\Http\Controllers\AdminPanel\SettingsController::class, 'update_package_settings'])->name('admin.settings.update-package-settings')->middleware('permission:package-settings-edit');

    ////////////////////////////////////////////////////////////////////////////////////////////////////
    Route::get('/sales', [App\Http\Controllers\AdminPanel\SalesController::class, 'index'])->name('admin.sales.index')->middleware('permission:sales-show');
    Route::get('/best-sales', [App\Http\Controllers\AdminPanel\SalesController::class, 'best_sales'])->name('admin.sales.best-sales')->middleware('permission:sales-show');
    Route::get('/lowest-selling', [App\Http\Controllers\AdminPanel\SalesController::class, 'lowest_selling'])->name('admin.sales.lowest-selling')->middleware('permission:sales-show');
    Route::get('/orders', [App\Http\Controllers\AdminPanel\OrdersController::class, 'index'])->name('admin.orders.index')->middleware('permission:orders-show');
    Route::get('/return', [App\Http\Controllers\AdminPanel\ReturnController::class, 'index'])->name('admin.return.index')->middleware('permission:returns-show');
    Route::get('/sales/search', [App\Http\Controllers\AdminPanel\SalesController::class, 'search'])->name('admin.sales.search')->middleware('permission:sales-show');
    Route::get('/best-sales/search', [App\Http\Controllers\AdminPanel\SalesController::class, 'best_sales_search'])->name('admin.sales.best-sales-search')->middleware('permission:sales-show');
    Route::get('/lowest-selling/search', [App\Http\Controllers\AdminPanel\SalesController::class, 'lowest_selling_search'])->name('admin.sales.lowest-selling-search')->middleware('permission:sales-show');
    Route::get('/orders/search', [App\Http\Controllers\AdminPanel\OrdersController::class, 'search'])->name('admin.orders.search')->middleware('permission:orders-show');
    Route::get('/return/search', [App\Http\Controllers\AdminPanel\ReturnController::class, 'search'])->name('admin.return.search')->middleware('permission:returns-show');
    Route::get('/orders/delete/{id}', [App\Http\Controllers\AdminPanel\OrdersController::class, 'destroy'])->name('admin.orders.delete')->middleware('permission:orders-delete');
    Route::get('/orders/create', [App\Http\Controllers\AdminPanel\OrdersController::class, 'create'])->name('admin.orders.create')->middleware('permission:orders-create');
    Route::post('/orders/store', [App\Http\Controllers\AdminPanel\OrdersController::class, 'store'])->name('admin.orders.store')->middleware('permission:orders-create');
    Route::get('/orders/edit/{id}', [App\Http\Controllers\AdminPanel\OrdersController::class, 'edit'])->name('admin.orders.edit')->middleware('permission:orders-edit');
    Route::post('/orders/update/{id}', [App\Http\Controllers\AdminPanel\OrdersController::class, 'update'])->name('admin.orders.update')->middleware('permission:orders-edit');

    Route::get('/profits', [App\Http\Controllers\AdminPanel\ProfitsController::class, 'index'])->name('admin.profits.index')->middleware('permission:profits-show');
    Route::get('/profits/search', [App\Http\Controllers\AdminPanel\ProfitsController::class, 'search'])->name('admin.profits.search')->middleware('permission:profits-show');



    ////////////////////////////////////////////////////////////////////////////////////////////////////
    Route::get('/copons', [App\Http\Controllers\AdminPanel\CoponsController::class, 'index'])->name('admin.copons.index')->middleware('permission:admin-copons-show');
    Route::post('/copons/store', [App\Http\Controllers\AdminPanel\CoponsController::class, 'store'])->name('admin.copons.store')->middleware('permission:admin-copons-create');
    Route::get('/copons/edit', [App\Http\Controllers\AdminPanel\CoponsController::class, 'edit'])->name('admin.copons.edit')->middleware('permission:admin-copons-create');
    Route::post('/copons/update/{id}', [App\Http\Controllers\AdminPanel\CoponsController::class, 'update'])->name('admin.copons.update')->middleware('permission:admin-copons-edit');
    Route::get('/copons/delete/{id}', [App\Http\Controllers\AdminPanel\CoponsController::class, 'destroy'])->name('admin.copons.delete')->middleware('permission:admin-copons-edit');
    Route::get('/copons/change-status/{id}', [App\Http\Controllers\AdminPanel\CoponsController::class, 'change_status'])->name('admin.copons.changeStatus')->middleware('permission:admin-copons-delete');
    ////////////////////////////////////////////////////////////////////////////////////////////////////

    Route::get('/stores-types', [App\Http\Controllers\AdminPanel\StoreTypeController::class, 'index'])->name('admin.stores-types.index');
    Route::get('/stores-types/create', [App\Http\Controllers\AdminPanel\StoreTypeController::class, 'create'])->name('admin.stores-types.create');
    Route::post('/stores-types/store', [App\Http\Controllers\AdminPanel\StoreTypeController::class, 'store'])->name('admin.stores-types.store');
    Route::get('/stores-types/edit/{id}', [App\Http\Controllers\AdminPanel\StoreTypeController::class, 'edit'])->name('admin.stores-types.edit');
    Route::post('/stores-types/update/{id}', [App\Http\Controllers\AdminPanel\StoreTypeController::class, 'update'])->name('admin.stores-types.update');
    Route::get('/stores-types/delete/{id}', [App\Http\Controllers\AdminPanel\StoreTypeController::class, 'destroy'])->name('admin.stores-types.delete');
    Route::get('/stores-types/change-status/{id}', [App\Http\Controllers\AdminPanel\StoreTypeController::class, 'change_status'])->name('admin.stores-types.changeStatus');




    Route::group(['prefix' => 'product', 'middleware' => ['auth', 'admin']], function () {
        Route::get('/products', [App\Http\Controllers\AdminPanel\ProductController::class, 'index'])->name('admin.products.index')->middleware('permission:admin-products-show');
        Route::get('/get_products', [App\Http\Controllers\AdminPanel\ProductController::class, 'get_products'])->name('admin.products.get_products')->middleware('permission:admin-products-show');
        Route::get('/products/add_custom_made', [App\Http\Controllers\AdminPanel\ProductController::class, 'add_custom_made'])->name('admin.products.add.custom_made')->middleware('permission:admin-products-create');
        Route::get('/products/edit_custom_made/{id}', [App\Http\Controllers\AdminPanel\ProductController::class, 'edit_product'])->name('admin.products.edit.custom_made')->middleware('permission:admin-products-edit');
        Route::get('/products/add_ready_made', [App\Http\Controllers\AdminPanel\ProductController::class, 'add_ready_made'])->name('admin.products.add.ready_made')->middleware('permission:admin-products-create');
        Route::get('/products/add_service_made', [App\Http\Controllers\AdminPanel\ProductController::class, 'add_service_made'])->name('admin.products.add.service_made')->middleware('permission:admin-products-create');
        Route::get('/products/get_product_colors', [App\Http\Controllers\AdminPanel\ProductController::class, 'get_product_colors'])->name('admin.products.get.get_product_colors')->middleware('permission:admin-products-show');
        Route::POST('/products/add_category', [App\Http\Controllers\AdminPanel\ProductController::class, 'add_category'])->name('admin.products.add.category')->middleware('permission:admin-products-create');
        Route::POST('/products/get_product', [App\Http\Controllers\AdminPanel\ProductController::class, 'product_data'])->name('admin.products.get.get_product')->middleware('permission:admin-products-show');
        Route::post('/products/add_product_color', [App\Http\Controllers\AdminPanel\ProductController::class, 'add_product_color'])->name('admin.products.add.add_product_color')->middleware('permission:admin-products-create');
        Route::post('/products/store_product', [App\Http\Controllers\AdminPanel\ProductController::class, 'store_product'])->name('admin.products.add.add_product')->middleware('permission:admin-products-create');
        Route::post('/products/update_product/{id}', [App\Http\Controllers\AdminPanel\ProductController::class, 'update_product'])->name('admin.products.update.update_product')->middleware('permission:admin-products-edit');
        Route::post('/products/delete_product', [App\Http\Controllers\AdminPanel\ProductController::class, 'delete_product'])->name('admin.products.delete.delete_product')->middleware('permission:admin-products-delete');
        Route::post('/products/active_deactive_product', [App\Http\Controllers\AdminPanel\ProductController::class, 'active_deactive_product'])->name('admin.products.update.active_deactive_product')->middleware('permission:admin-products-show');
    });

 
Route::get('/abandoned-carts', [App\Http\Controllers\AdminPanel\AbandonedCartsController::class, 'index'])->name('admin.abandoned-carts.index')->middleware('permission:admin-abandoned-carts-show');
Route::get('/abandoned-carts/settings', [App\Http\Controllers\AdminPanel\AbandonedCartsController::class, 'settings'])->name('admin.abandoned-carts.settings')->middleware('permission:admin-abandoned-carts-settings-edit');
Route::post('/abandoned-carts/general/settings', [App\Http\Controllers\AdminPanel\AbandonedCartsController::class, 'general_settings_update'])->name('admin.abandoned-carts.general.settings.update')->middleware('permission:admin-abandoned-carts-settings-edit');
Route::post('/abandoned-carts/automail/settings', [App\Http\Controllers\AdminPanel\AbandonedCartsController::class, 'automail_settings_update'])->name('admin.abandoned-carts.automail.settings.update')->middleware('permission:admin-abandoned-carts-settings-edit');
Route::post('/abandoned-carts/remindermail/settings', [App\Http\Controllers\AdminPanel\AbandonedCartsController::class, 'remindermail_settings_update'])->name('admin.abandoned-carts.remindermail.settings.update')->middleware('permission:admin-abandoned-carts-settings-edit');


    /////////////////////////////////////////////
    Route::get('/products-comments', [App\Http\Controllers\AdminPanel\ProductsCommentsController::class, 'index'])->name('admin.products-comments.index')->middleware('permission:admin-products-comments-show');
    Route::get('/products-comments/create', [App\Http\Controllers\AdminPanel\ProductsCommentsController::class, 'create'])->name('admin.products-comments.create')->middleware('permission:admin-products-comments-create');
    Route::post('/products-comments/store', [App\Http\Controllers\AdminPanel\ProductsCommentsController::class, 'store'])->name('admin.products-comments.store')->middleware('permission:admin-products-comments-create');
    Route::get('/products-comments/edit/{id}', [App\Http\Controllers\AdminPanel\ProductsCommentsController::class, 'edit'])->name('admin.products-comments.edit')->middleware('permission:admin-products-comments-edit');
    Route::post('/products-comments/update/{id}', [App\Http\Controllers\AdminPanel\ProductsCommentsController::class, 'update'])->name('admin.products-comments.update')->middleware('permission:admin-products-comments-edit');
    Route::get('/products-comments/delete/{id}', [App\Http\Controllers\AdminPanel\ProductsCommentsController::class, 'destroy'])->name('admin.products-comments.delete')->middleware('permission:admin-products-comments-delete');
    Route::get('/products-comments/change-status/{id}', [App\Http\Controllers\AdminPanel\ProductsCommentsController::class, 'change_status'])->name('admin.products-comments.changeStatus')->middleware('permission:admin-products-comments-show');

    ////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////////
    Route::get('/visitor', [App\Http\Controllers\AdminPanel\VisitorController::class, 'index'])->name('admin.visitor.index')->middleware('permission:admin-visits-show');
    ////////////////////////////////////////////////////////////////////////////////////////////////////
    Route::get('/affiliates', [App\Http\Controllers\AdminPanel\AffiliateMarketingController::class, 'index'])->name('admin.affiliate.index');
    Route::get('/affiliates/add_affiliate', [App\Http\Controllers\AdminPanel\AffiliateMarketingController::class, 'add_affiliate'])->name('admin.affiliate.add_affiliate');
    Route::POST('/affiliates/store', [App\Http\Controllers\AdminPanel\AffiliateMarketingController::class, 'storeAffilate'])->name('admin.affiliate.store_affiliate');
    Route::get('/cities', [App\Http\Controllers\AdminPanel\AffiliateMarketingController::class, 'getCities'])->name('country.admin.cities');
    Route::get('/affiliates/edit/{id}', [App\Http\Controllers\AdminPanel\AffiliateMarketingController::class, 'edit_affiliate'])->name('admin.affiliate.edit');
    Route::post('/affiliates/update_product/{id}', [App\Http\Controllers\AdminPanel\AffiliateMarketingController::class, 'update_affiliate'])->name('admin.affiliate.update.update_affiliate');
    Route::post('/affiliates/delete_affiliate', [App\Http\Controllers\AdminPanel\AffiliateMarketingController::class, 'delete_affiliate'])->name('admin.affiliate.delete.delete_affiliate');
    Route::post('/affiliates/active_deactive_affiliate', [App\Http\Controllers\AdminPanel\AffiliateMarketingController::class, 'active_deactive_affiliate'])->name('admin.affiliate.update.active_deactive_affiliate');
});


////////////////////////////////////////////////////////////////////////////////////////////////////

Route::group(['prefix' => 'store', 'middleware' => ['auth', 'store']], function () {
    Route::get('/home', [App\Http\Controllers\Store\HomeController::class, 'index'])->name('store.home');
    /////////////////////////////////////////////
    Route::get('/visitor', [App\Http\Controllers\Store\VisitorController::class, 'index'])->name('store.visitor.index')->middleware('permission:visits-show');


    Route::get('/roles', [App\Http\Controllers\Store\RolesController::class, 'index'])->name('store.roles.index')->middleware('permission:store-roles-show');
    Route::get('/roles/create', [App\Http\Controllers\Store\RolesController::class, 'create'])->name('store.roles.create')->middleware('permission:store-roles-create');
    Route::post('/roles/store', [App\Http\Controllers\Store\RolesController::class, 'store'])->name('store.roles.store')->middleware('permission:store-roles-create');
    Route::get('/roles/edit/{id}', [App\Http\Controllers\Store\RolesController::class, 'edit'])->name('store.roles.edit')->middleware('permission:store-roles-edit');
    Route::post('/roles/update/{id}', [App\Http\Controllers\Store\RolesController::class, 'update'])->name('store.roles.update')->middleware('permission:store-roles-edit');
    Route::get('/roles/delete/{id}', [App\Http\Controllers\Store\RolesController::class, 'destroy'])->name('store.roles.delete')->middleware('permission:store-roles-delete');
    ////////////////////////////////////////////////////////////////////////////////////////////////////

    Route::get('/settings/profile', [App\Http\Controllers\Store\ProfileController::class, 'profile'])->name('store.profile');
    Route::post('/settings/profile', [App\Http\Controllers\Store\ProfileController::class, 'update_profile'])->name('store.profile.update');
    /////////////////////////////////////////////
    Route::get('/advertisments', [App\Http\Controllers\Store\AdvertismentsController::class, 'index'])->name('store.advertisments.index')->middleware('permission:store-advertisments-show');
    Route::get('/advertisments/create', [App\Http\Controllers\Store\AdvertismentsController::class, 'create'])->name('store.advertisments.create')->middleware('permission:store-advertisments-create');
    Route::post('/advertisments/store', [App\Http\Controllers\Store\AdvertismentsController::class, 'store'])->name('store.advertisments.store')->middleware('permission:store-advertisments-create');
    Route::get('/advertisments/edit/{id}', [App\Http\Controllers\Store\AdvertismentsController::class, 'edit'])->name('store.advertisments.edit')->middleware('permission:store-advertisments-edit');
    Route::post('/advertisments/update/{id}', [App\Http\Controllers\Store\AdvertismentsController::class, 'update'])->name('store.advertisments.update')->middleware('permission:store-advertisments-edit');
    Route::get('/advertisments/delete/{id}', [App\Http\Controllers\Store\AdvertismentsController::class, 'destroy'])->name('store.advertisments.delete')->middleware('permission:store-advertisments-delete');
    Route::get('/advertisments/change-status/{id}', [App\Http\Controllers\Store\AdvertismentsController::class, 'change_status'])->name('store.advertisments.changeStatus')->middleware('permission:store-advertisments-show');

    //////////////////////////////////////////////////////////////////////////////////////////////////
    Route::get('/customers', [App\Http\Controllers\Store\CustomersController::class, 'index'])->name('store.customers.index')->middleware('permission:customers-show');
    Route::post('/customers/store', [App\Http\Controllers\Store\CustomersController::class, 'store'])->name('store.customers.store')->middleware('permission:customers-create');

    ////////////////////////////////////////////////////////////////////////////////////////////////////
    Route::get('/settings', [App\Http\Controllers\Store\SettingsController::class, 'index'])->name('store.settings.index');
    Route::get('/settings/general', [App\Http\Controllers\Store\SettingsController::class, 'general'])->name('store.settings.general')->middleware('permission:store-basic-settings-edit');
    Route::post('/settings/general', [App\Http\Controllers\Store\SettingsController::class, 'update_general'])->name('store.settings.update-general')->middleware('permission:store-basic-settings-edit');
    Route::get('/settings/seo', [App\Http\Controllers\Store\SettingsController::class, 'seo'])->name('store.settings.seo')->middleware('permission:store-seo-edit');
    Route::post('/settings/seo-ar', [App\Http\Controllers\Store\SettingsController::class, 'update_seo_ar'])->name('store.settings.seo-ar')->middleware('permission:store-seo-edit');
    Route::post('/settings/seo-en', [App\Http\Controllers\Store\SettingsController::class, 'update_seo_en'])->name('store.settings.seo-en')->middleware('permission:store-seo-edit');
    Route::get('/settings/currency', [App\Http\Controllers\Store\SettingsController::class, 'currency'])->name('store.settings.currency')->middleware('permission:store-default-currency-edit');
    Route::post('/settings/currency', [App\Http\Controllers\Store\SettingsController::class, 'update_currency'])->name('store.settings.update-currency')->middleware('permission:store-default-currency-edit');
    Route::get('/settings/domain', [App\Http\Controllers\Store\SettingsController::class, 'domain'])->name('store.settings.domain');
    Route::get('/settings/notification', [App\Http\Controllers\Store\SettingsController::class, 'notification'])->name('store.settings.notification');
    Route::post('/settings/notification', [App\Http\Controllers\Store\SettingsController::class, 'update_notification'])->name('store.settings.update-notification');

    ////////////////////////////////////////////////////////////////////////////////////////////////////
    Route::get('/admins', [App\Http\Controllers\Store\AdminsController::class, 'index'])->name('store.admins.index')->middleware('permission:store-employees-show');
    Route::post('/admins/store', [App\Http\Controllers\Store\AdminsController::class, 'store'])->name('store.admins.store')->middleware('permission:store-employees-create');
    Route::get('/admins/edit', [App\Http\Controllers\Store\AdminsController::class, 'edit'])->name('store.admins.edit')->middleware('permission:store-employees-edit');
    Route::post('/admins/update/{id}', [App\Http\Controllers\Store\AdminsController::class, 'update'])->name('store.admins.update')->middleware('permission:store-employees-edit');
    Route::get('/admins/delete/{id}', [App\Http\Controllers\Store\AdminsController::class, 'destroy'])->name('store.admins.delete')->middleware('permission:store-employees-delete');
    Route::get('/admins/change-status/{id}', [App\Http\Controllers\Store\AdminsController::class, 'change_status'])->name('store.admins.changeStatus')->middleware('permission:store-employees-show');
    ////////////////////////////////////////////////////////////////////////////////////////////////////
    Route::get('/copons', [App\Http\Controllers\Store\CoponsController::class, 'index'])->name('store.copons.index')->middleware('permission:copons-show');
    Route::post('/copons/store', [App\Http\Controllers\Store\CoponsController::class, 'store'])->name('store.copons.store')->middleware('permission:copons-create');
    Route::get('/copons/edit', [App\Http\Controllers\Store\CoponsController::class, 'edit'])->name('store.copons.edit')->middleware('permission:copons-edit');
    Route::post('/copons/update/{id}', [App\Http\Controllers\Store\CoponsController::class, 'update'])->name('store.copons.update')->middleware('permission:copons-edit');
    Route::get('/copons/delete/{id}', [App\Http\Controllers\Store\CoponsController::class, 'destroy'])->name('store.copons.delete')->middleware('permission:copons-delete');
    Route::get('/copons/change-status/{id}', [App\Http\Controllers\Store\CoponsController::class, 'change_status'])->name('store.copons.changeStatus')->middleware('permission:copons-show');

    ////////////////////////////////////////////////////////////////////////////////////////////////////
    Route::get('/sales', [App\Http\Controllers\Store\SalesController::class, 'index'])->name('store.sales.index')->middleware('permission:sales-show');
    Route::get('/best-sales', [App\Http\Controllers\Store\SalesController::class, 'best_sales'])->name('store.sales.best-sales')->middleware('permission:sales-show');
    Route::get('/lowest-selling', [App\Http\Controllers\Store\SalesController::class, 'lowest_selling'])->name('store.sales.lowest-selling')->middleware('permission:sales-show');
    Route::get('/orders', [App\Http\Controllers\Store\OrdersController::class, 'index'])->name('store.orders.index')->middleware('permission:store-orders-show');
    Route::get('/orders/create', [App\Http\Controllers\Store\OrdersController::class, 'create'])->name('store.orders.create')->middleware('permission:store-orders-create');
    Route::post('/orders/store', [App\Http\Controllers\Store\OrdersController::class, 'store'])->name('store.orders.store')->middleware('permission:store-orders-create');
    Route::get('/orders/edit/{id}', [App\Http\Controllers\Store\OrdersController::class, 'edit'])->name('store.orders.edit')->middleware('permission:store-orders-edit');
    Route::post('/orders/update/{id}', [App\Http\Controllers\Store\OrdersController::class, 'update'])->name('store.orders.update')->middleware('permission:store-orders-edit');
    Route::get('/orders/delete/{id}', [App\Http\Controllers\Store\OrdersController::class, 'destroy'])->name('store.orders.delete')->middleware('permission:store-orders-delete');
    Route::get('/orders/change-status/{id}', [App\Http\Controllers\Store\OrdersController::class, 'change_status'])->name('store.orders.changeStatus')->middleware('permission:store-orders-show');

    Route::get('/orders-services', [App\Http\Controllers\Store\OrdersController::class, 'services'])->name('store.orders.services')->middleware('permission:store-orders-show');
    Route::get('/return', [App\Http\Controllers\Store\ReturnController::class, 'index'])->name('store.return.index')->middleware('permission:returns-show');
    Route::get('/sales/search', [App\Http\Controllers\Store\SalesController::class, 'search'])->name('store.sales.search')->middleware('permission:sales-show');
    Route::get('/best-sales/search', [App\Http\Controllers\Store\SalesController::class, 'best_sales_search'])->name('store.sales.best-sales-search')->middleware('permission:sales-show');
    Route::get('/lowest-selling/search', [App\Http\Controllers\Store\SalesController::class, 'lowest_selling_search'])->name('store.sales.lowest-selling-search')->middleware('permission:sales-show');
    Route::get('/orders-details/{id}', [App\Http\Controllers\Store\OrdersController::class, 'details'])->name('store.orders.details')->middleware('permission:store-orders-show');
    Route::get('/return/search', [App\Http\Controllers\Store\ReturnController::class, 'search'])->name('store.return.search')->middleware('permission:returns-show');
    Route::get('/reports', [App\Http\Controllers\Store\ReportsController::class, 'index'])->name('store.reports.index')->middleware('permission:reports-show');


    Route::get('/abandoned-carts', [App\Http\Controllers\Store\AbandonedCartsController::class, 'index'])->name('store.abandoned-carts.index')->middleware('permission:store-abandoned-carts-show');



    /////////////////////////////////////////////
    Route::get('/products-comments', [App\Http\Controllers\Store\ProductsCommentsController::class, 'index'])->name('store.products-comments.index')->middleware('permission:store-products-comments-show');
    Route::get('/products-comments/create', [App\Http\Controllers\Store\ProductsCommentsController::class, 'create'])->name('store.products-comments.create')->middleware('permission:store-products-comments-create');
    Route::post('/products-comments/store', [App\Http\Controllers\Store\ProductsCommentsController::class, 'store'])->name('store.products-comments.store')->middleware('permission:store-products-comments-create');
    Route::get('/products-comments/edit/{id}', [App\Http\Controllers\Store\ProductsCommentsController::class, 'edit'])->name('store.products-comments.edit')->middleware('permission:store-products-comments-edit');
    Route::post('/products-comments/update/{id}', [App\Http\Controllers\Store\ProductsCommentsController::class, 'update'])->name('store.products-comments.update')->middleware('permission:store-products-comments-edit');
    Route::get('/products-comments/delete/{id}', [App\Http\Controllers\Store\ProductsCommentsController::class, 'destroy'])->name('store.products-comments.delete')->middleware('permission:store-products-comments-delete');
    Route::get('/products-comments/change-status/{id}', [App\Http\Controllers\Store\ProductsCommentsController::class, 'change_status'])->name('store.products-comments.changeStatus')->middleware('permission:store-products-comments-show');
});

Route::group(['prefix' => 'product', 'middleware' => ['auth', 'store']], function () {
    Route::get('/products', [App\Http\Controllers\Store\ProductController::class, 'index'])->name('products.index')->middleware('permission:products-show');
    Route::get('/get_products', [App\Http\Controllers\Store\ProductController::class, 'get_products'])->name('products.get_products')->middleware('permission:products-show');
    Route::get('/products/add_custom_made', [App\Http\Controllers\Store\ProductController::class, 'add_custom_made'])->name('products.add.custom_made')->middleware('permission:products-create');
    Route::get('/products/edit_custom_made/{id}', [App\Http\Controllers\Store\ProductController::class, 'edit_product'])->name('products.edit.custom_made')->middleware('permission:products-edit');
    Route::get('/products/add_ready_made', [App\Http\Controllers\Store\ProductController::class, 'add_ready_made'])->name('products.add.ready_made')->middleware('permission:products-create');
    Route::get('/products/add_service_made', [App\Http\Controllers\Store\ProductController::class, 'add_service_made'])->name('products.add.service_made')->middleware('permission:products-create');
    Route::get('/products/get_product_colors', [App\Http\Controllers\Store\ProductController::class, 'get_product_colors'])->name('products.get.get_product_colors')->middleware('permission:products-show');
    Route::POST('/products/add_category', [App\Http\Controllers\Store\ProductController::class, 'add_category'])->name('products.add.category')->middleware('permission:products-create');
    Route::POST('/products/get_product', [App\Http\Controllers\Store\ProductController::class, 'product_data'])->name('products.get.get_product')->middleware('permission:products-show');
    Route::post('/products/add_product_color', [App\Http\Controllers\Store\ProductController::class, 'add_product_color'])->name('products.add.add_product_color')->middleware('permission:products-create');
    Route::post('/products/store_product', [App\Http\Controllers\Store\ProductController::class, 'store_product'])->name('products.add.add_product')->middleware('permission:products-create');
    Route::post('/products/update_product/{id}', [App\Http\Controllers\Store\ProductController::class, 'update_product'])->name('products.update.update_product')->middleware('permission:products-edit');
    Route::post('/products/delete_product', [App\Http\Controllers\Store\ProductController::class, 'delete_product'])->name('products.delete.delete_product')->middleware('permission:products-delete');
    Route::post('/products/active_deactive_product', [App\Http\Controllers\Store\ProductController::class, 'active_deactive_product'])->name('products.update.active_deactive_product')->middleware('permission:products-show');
});

Route::group(['prefix' => 'affiliate', 'middleware' => ['auth', 'store']], function () {
    Route::get('/affiliates', [App\Http\Controllers\Store\AffiliateMarketingController::class, 'index'])->name('affiliate.index')->middleware('permission:affiliates-show');
    Route::get('/affiliates/add_affiliate', [App\Http\Controllers\Store\AffiliateMarketingController::class, 'add_affiliate'])->name('affiliate.add_affiliate')->middleware('permission:affiliates-create');
    Route::POST('/affiliates/store', [App\Http\Controllers\Store\AffiliateMarketingController::class, 'storeAffilate'])->name('affiliate.store_affiliate')->middleware('permission:affiliates-create');
    Route::get('/cities', [App\Http\Controllers\Store\AffiliateMarketingController::class, 'getCities'])->name('country.cities');
    Route::get('/affiliates/edit/{id}', [App\Http\Controllers\Store\AffiliateMarketingController::class, 'edit_affiliate'])->name('affiliate.edit')->middleware('permission:affiliates-edit');
    Route::post('/affiliates/update_product/{id}', [App\Http\Controllers\Store\AffiliateMarketingController::class, 'update_affiliate'])->name('affiliates.update.update_affiliate')->middleware('permission:affiliates-edit');
    Route::post('/affiliates/delete_affiliate', [App\Http\Controllers\Store\AffiliateMarketingController::class, 'delete_affiliate'])->name('affiliates.delete.delete_affiliate')->middleware('permission:affiliates-delete');
    Route::post('/affiliates/active_deactive_affiliate', [App\Http\Controllers\Store\AffiliateMarketingController::class, 'active_deactive_affiliate'])->name('affiliates.update.active_deactive_affiliate')->middleware('permission:affiliates-show');
});



///////// new amro

require __DIR__ . '/website/website.php';

#Socail Media Login and Register ^_^
Route::get('auth/{provider}/redirect', [App\Http\Controllers\Auth\SocialiteLoginController::class, 'redirect'])->name('auth.socialite.redirect');
Route::get('auth/{provider}/callback', [App\Http\Controllers\Auth\SocialiteLoginController::class, 'callback'])->name('auth.socialite.callback');
