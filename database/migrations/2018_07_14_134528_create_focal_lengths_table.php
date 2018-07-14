<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFocalLengthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('focal_lengths', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categorie_id')->nullable();
            $table->integer('manufacturer_id')->nullable();
            $table->integer('series_id')->nullable();
            $table->integer('focal_length')->nullable();
            $table->integer('focal_length_value')->nullable();
            $table->integer('focal_length_tshop_max')->nullable();
            $table->integer('focal_length_tshop_min')->nullable();
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
        Schema::dropIfExists('focal_lengths');
    }
}
