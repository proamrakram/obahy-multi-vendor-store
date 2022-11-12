<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('store_id');
            $table->integer('order_id');
            $table->integer('user_id');
            $table->integer('price');
            $table->enum('status', ['awaiting_payment', 'underway', 'done', 
            'delivery_in_progress', 'delivered', 'reference']);
            $table->date('reference_date')->nullable();
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
        Schema::dropIfExists('order_products');
    }
}
