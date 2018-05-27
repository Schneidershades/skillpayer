<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVtpassApiServiceVariationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vtpass_api_service_variations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('service_name')->nullable();
            $table->string('network')->nullable();
            $table->decimal('convinience_fee', 40, 2)->default(0);
            $table->decimal('minimum_amount', 40, 2)->default(0);
            $table->decimal('maximum_amount', 40, 2)->default(0);
            $table->string('code')->nullable();
            $table->string('title')->nullable();
            $table->decimal('price', 40, 2)->default(0);
            $table->string('fixed')->nullable();
            $table->string('available')->nullable();
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
        Schema::dropIfExists('vtpass_api_service_variations');
    }
}
