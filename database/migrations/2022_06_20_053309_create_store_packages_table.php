<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStorePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_packages', function (Blueprint $table) {
            $table->id();
            $table->string('package_name_en');
            $table->string('package_name_ar');
            $table->text('package_description_en');
            $table->text('package_description_ar');
            $table->float('package_price');
            $table->integer('package_currency');
            $table->enum('package_type', ['gold', 'silver', 'free', 'other'])->nullable();
            $table->enum('package_status', ['active', 'inactive', 'blocked']);
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
        Schema::dropIfExists('store_packages');
    }
}
