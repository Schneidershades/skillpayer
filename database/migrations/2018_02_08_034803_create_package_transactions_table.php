<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackageTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identifier');
            $table->string('title')->nullable();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('package_id')->unsigned()->index()->nullable();
            $table->text('details')->nullable();
            $table->decimal('amount', 40, 2)->default(0);
            $table->string('category')->nullable();
            $table->string('remarks')->nullable();
            $table->string('transaction_type')->nullable();
            $table->string('status')->nullable();
            $table->string('finished')->default(0);
            $table->timestamps();
            $table->softDeletes();


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('package_transactions');
    }
}
