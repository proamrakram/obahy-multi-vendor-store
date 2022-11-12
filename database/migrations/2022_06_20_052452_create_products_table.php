<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name_en');
            $table->string('product_name_ar');
            $table->text('product_description_en');
            $table->text('product_description_ar');
            $table->enum('product_type', ['ready_made', 'custom_made', 'service','template','model']);
            $table->integer('product_category');
            $table->string('product_serial_number')->unique();
            $table->string('product_vat');
            $table->float('product_vat_value');
            $table->float('product_price');
            $table->float('product_price_after_vat');
            $table->float('wholesale_price');


            $table->integer('store_type_id');
            $table->string('product_main_image', 500)->nullable();
            $table->integer('is_affiliate')->default(0);
            $table->enum('affiliate_type',['commission', 'ratio'])->nullable();
            $table->float('affiliate_value');
            $table->enum('product_status', ['active', 'inactive', 'blocked']);
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
        Schema::dropIfExists('products');
    }
}
