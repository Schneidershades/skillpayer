<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adverts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identifier');
            $table->integer('category_id')->unsigned()->index()->nullable();
            $table->integer('sub_category_id')->unsigned()->index()->nullable();
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->string('type')->nullable();
            $table->text('title')->nullable();
            $table->text('slug')->nullable();
            $table->text('description')->nullable();
            $table->decimal('sales_price', 40, 2)->default(0);
            $table->decimal('regular_price', 40, 2)->default(0);
            $table->string('contact')->nullable();
            $table->string('status')->nullable();
            $table->text('featured_sm')->nullable();
            $table->text('featured_bg')->nullable();
            $table->text('featured2')->nullable();
            $table->text('featured3')->nullable();
            $table->text('featured4')->nullable();
            $table->text('featured5')->nullable();
            $table->integer('country_id')->unsigned()->index()->nullable();
            $table->integer('state_id')->unsigned()->index()->nullable();
            $table->integer('city_id')->unsigned()->index()->nullable();
            $table->text('address')->nullable();
            $table->boolean('live')->default(true);
            $table->boolean('approved')->default(true);
            $table->boolean('finished')->default(false);
            $table->integer('views')->default(0);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adverts');
    }
}
