<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffiliateMarketingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliate_marketings', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->text('link');
            $table->enum('link_type',['product','store']);
            $table->integer('link_reference');
            $table->string('issue_date');
            $table->enum('affiliate_type',['fixed','ratio']);
            $table->string('apply_affiliate');
            $table->string('affiliate_value');
            $table->string('affiliate_currency');
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
        Schema::dropIfExists('affiliate_marketings');
    }
}

