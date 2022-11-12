<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdcutCustomMadeSizeOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prodcut_custom_made_size_options', function (Blueprint $table) {
            $table->id();
            $table->string('size_name_en');
            $table->string('size_name_ar');
            $table->string('size_type');
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
        Schema::dropIfExists('prodcut_custom_made_size_options');
    }
}
