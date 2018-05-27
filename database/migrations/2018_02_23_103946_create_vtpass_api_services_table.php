<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVtpassApiServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vtpass_api_services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('service_id')->nullable();
            $table->string('name')->nullable();
            $table->decimal('minimium_amount', 40, 2)->nullable();
            $table->decimal('maximum_amount', 40, 2)->nullable();
            $table->decimal('convinience_fee', 40, 2)->nullable();
            $table->string('product_type')->nullable();
            $table->text('image')->nullable();
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
        Schema::dropIfExists('vtpass_api_services');
    }
}
