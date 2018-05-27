<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIrechargeDigitalTvServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('irecharge_digital_tv_services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('code')->nullable();
            $table->decimal('price', 40, 2)->default(0);
            $table->string('network')->nullable();
            $table->string('allowance')->nullable();
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
        Schema::dropIfExists('irecharge_digital_tv_services');
    }
}
