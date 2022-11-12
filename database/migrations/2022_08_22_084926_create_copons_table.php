<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('copons', function (Blueprint $table) {
            $table->id();
            $table->string('copon_code');
            $table->integer('copon_amount');
            $table->enum('copon_type', ['fixed', 'percentage']);
            $table->boolean('is_free_shipping');
            $table->boolean('exclode_offers');
            $table->integer('copon_limit');
            $table->integer('use_count_all');
            $table->integer('user_use_count');
            $table->date('expire_date');
            $table->enum('status', ['active', 'inactive', 'expired']);
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
        Schema::dropIfExists('copons');
    }
}
