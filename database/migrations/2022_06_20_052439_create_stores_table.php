<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();

            $table->string('store_name_ar');
            $table->string('store_name_en');
            $table->string('store_domain')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->integer('store_currency')->nullable();

            $table->integer('store_admin');
            //$table->enum('store_type', ['fabrics', 'clothes']);
            $table->integer('store_country');
            $table->integer('store_city');
           // $table->string('store_address');
            $table->string('subscription_start_date')->nullable();
            $table->string('subscription_end_date')->nullable();
            $table->integer('subscription_package_id')->nullable();
            $table->enum('store_status', ['active', 'inactive', 'blocked']);
            $table->enum('is_trail', ['0', '1']);
            $table->string('commercial_record')->nullable();


            $table->string('registration_number_in_trusted')->nullable();
            $table->string('id_number')->nullable();

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
        Schema::dropIfExists('stores');
    }
}
