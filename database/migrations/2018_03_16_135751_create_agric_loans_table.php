<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgricLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agric_loans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identifier')->nullable();
            $table->integer('user_id')->index()->unsigned()->nullable();
            $table->string('full_name')->nullable();
            $table->boolean('gender')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('dob')->nullable();
            $table->string('profession')->nullable();
            $table->string('home_address')->nullable();
            $table->string('address')->nullable();
            $table->string('business_name')->nullable();
            $table->string('employment_status')->nullable();
            $table->string('bvn')->nullable();
            $table->string('account_bank_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('guarantor_name')->nullable();
            $table->string('guarantor_phone_number')->nullable();
            $table->string('guarantor_address')->nullable();
            $table->string('identity')->nullable();
            $table->boolean('subscribe')->default(false)->nullable();
            $table->string('paid')->default('Pending')->nullable();
            $table->boolean('finished')->default(false)->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('agric_loans');
    }
}
