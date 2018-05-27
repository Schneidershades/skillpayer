<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWalletTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('identifier')->nullable();
            $table->integer('user_id')->unsigned()->index();
            $table->text('details');
            $table->decimal('amount', 40, 2)->default(0);
            $table->decimal('amount_paid', 40, 2)->default(0);
            $table->string('category');
            $table->string('remarks');
            $table->string('transaction_type');
            $table->decimal('balance', 40, 2)->default(0);
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
        Schema::dropIfExists('wallet_transactions');
    }
}
