<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWalletFundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet_funds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identifier');
            $table->decimal('amount', 40, 2)->default(0);
            $table->string('action')->nullable();
            $table->string('api_used')->nullable();
            $table->string('response_code')->nullable();
            $table->text('response_str')->nullable();
            $table->string('service_charge')->nullable();
            $table->string('amount_total')->nullable();
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->string('payment_ref')->nullable();
            $table->string('return_ref')->nullable();
            $table->string('status')->default('pending');
            $table->string('finished')->default(false);
            $table->softDeletes();
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
        Schema::dropIfExists('wallet_funds');
    }
}
