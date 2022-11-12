<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_types', function (Blueprint $table) {
            $table->id();
            $table->string('store_type_ar')->unique();
            $table->string('store_type_en')->unique();
            $table->string('image')->nullable();
            $table->string('slug')->nullable();
            $table->enum('banner_section', ['active', 'inactive', 'blocked'])->default('active');
            $table->enum('filter_section', ['active', 'inactive', 'blocked'])->default('active');
            $table->enum('service_section', ['active', 'inactive', 'blocked'])->default('active');
            $table->enum('store_type_status', ['active', 'inactive', 'blocked'])->default('active');
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
        Schema::dropIfExists('store_types');
    }
}
