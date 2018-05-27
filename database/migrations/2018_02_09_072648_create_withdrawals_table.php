<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWithdrawalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identifier');
            $table->string('title')->nullable();
            $table->integer('user_id')->unsigned()->index();
            $table->string('account_name')->nullable();
            $table->integer('account_number')->nullable();
            $table->string('bank')->nullable();
            $table->decimal('amount', 40, 2)->default(0);
            $table->string('status')->nullable('Not Available');
            $table->boolean('finished')->default(false);
            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('withdrawals');
    }
}
