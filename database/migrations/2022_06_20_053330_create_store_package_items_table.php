<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStorePackageItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_package_items', function (Blueprint $table) {
            $table->id();
            $table->integer('package_id');
            $table->integer('package_item_id');
            //$table->string('package_item_string_en');
            //$table->string('package_item_string_ar');
            $table->enum('package_item_status', ['active', 'inactive', 'blocked']);
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
        Schema::dropIfExists('store_package_items');
    }
}
