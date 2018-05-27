<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('code');
            $table->string('type');
            $table->decimal('service_charge', 40, 2)->default(0);
            $table->decimal('minimum_value', 40, 2)->default(0);
            $table->decimal('maximum_value', 40, 2)->default(0);
            $table->decimal('percentage_commission', 40, 2)->default(0);
            $table->string('api_provider')->nullable();
            $table->string('enable')->default('Yes');
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_settings');
    }
}
