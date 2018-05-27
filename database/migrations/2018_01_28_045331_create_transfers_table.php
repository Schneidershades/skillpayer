<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identifier');
            $table->decimal('amount', 40, 2)->default(0);
            $table->integer('sender_id')->unsigned()->index()->nullable();
            $table->integer('reciever_id')->unsigned()->index()->nullable();
            $table->string('purpose')->nullable();
            $table->date('schedule')->nullable();
            $table->string('status')->default('Pending');
            $table->string('finished')->default(false);
            $table->timestamps();

            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('reciever_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transfers');
    }
}
