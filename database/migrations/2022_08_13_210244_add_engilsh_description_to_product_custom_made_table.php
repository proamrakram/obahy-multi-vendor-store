<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEngilshDescriptionToProductCustomMadeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_custom_mades', function (Blueprint $table) {
            //
            $table->string('custom_made_description_en');
            $table->string('fabric_options_en');
            $table->string('embroidery_options_en');
            $table->string('accessories_options_en');
            $table->string('implementation_period_en');
            $table->string('other_size_instructions_en');
            $table->string('other_size_notes_en');
            $table->string('custom_made_other_size_en');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_custom_made', function (Blueprint $table) {
            //
        });
    }
}
