<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('add_image');
            $table->enum('ads_type',['pop_up_window','side_window']);
            
            $table->enum('ads_place',['all-pages','home-page','inner-pages',
            'home-primary-main-banner','home-top-primary-side-banner',
            'home-bottom-primary-side-banner','home-first-secondary-banner',
            'home-second-secondary-banner','inner-banner-start-categories-page',
            'inner-banner-end-categories-page','inner-banner-start-product-details-page',
            'inner-banner-end-product-details-page','inner-banner-start-stores-types-page'
            ,'inner-banner-end-stores-types-page','inner-banner-end-payment-page',
            'inner-banner-start-cart-page','inner-banner-end-cart-page',
            'inner-banner-start-payment-page','inner-banner-start-continue-payment-page',
            'inner-banner-start-profile-page','inner-banner-end-continue-payment-page',
            'inner-banner-end-profile-page']);
            $table->integer('store_id')->nullable(); // null if for website
            $table->string('link');
            $table->enum('status', ['active', 'inactive', 'blocked']);
            $table->integer('is_delete')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertisements');
    }
}
