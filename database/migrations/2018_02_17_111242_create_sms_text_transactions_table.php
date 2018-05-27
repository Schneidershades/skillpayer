<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmsTextTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_text_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identifier');
            $table->string('title');
            $table->string('receiver');
            $table->string('network')->nullable('SMS Network');
            $table->decimal('amount', 40, 2)->default(0);
            $table->decimal('amount_paid', 40, 2)->default(0);
            $table->decimal('commission_applied', 40, 2)->default(0);
            $table->integer('user_id')->unsigned()->index();
            $table->string('transaction_id')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('payment_method')->default('wallet');
            $table->string('remarks')->nullable();
            $table->string('vtu_type')->nullable();
            $table->string('vtu_code')->nullable();
            $table->string('device')->nullable();
            $table->integer('pin')->default(0);
            $table->string('api_used')->nullable();
            $table->string('api_reference')->nullable();
            $table->string('api_response')->nullable();
            $table->string('api_product_reference')->nullable();
            $table->integer('hits')->default(0);
            $table->string('status')->default('pending');
            $table->string('type')->default('SMS Transactions');
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
        Schema::dropIfExists('sms_text_transactions');
    }
}
