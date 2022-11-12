<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCustomMadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_custom_mades', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->text('custom_made_description');
            $table->string('description_image');
            $table->text('fabric_options');
            $table->string('fabric_image')->nullable();
            $table->text('embroidery_options');
            $table->string('embroidery_image')->nullable();
            $table->text('accessories_options')->nullable();
            $table->string('accessories_image')->nullable();
            $table->string('implementation_period');
            $table->integer('custom_made_size_id');
            $table->string('custom_made_other_size')->nullable();
            $table->text('other_size_instructions')->nullable();
            $table->string('custom_made_other_size_image')->nullable();
            $table->text('other_size_notes')->nullable();
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
        Schema::dropIfExists('product_custom_mades');
    }
}
