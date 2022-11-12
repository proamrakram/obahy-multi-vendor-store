<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCoulmnsToStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stores', function (Blueprint $table) {
            
            $table->string('store_details_en')->nullable();
            $table->string('store_details_ar')->nullable();
            $table->string('store_address_en')->nullable();
            $table->string('store_address_ar')->nullable();
            $table->string('store_logo')->nullable(); // new wafaa
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stores', function (Blueprint $table) {
            //
        });
    }
}
