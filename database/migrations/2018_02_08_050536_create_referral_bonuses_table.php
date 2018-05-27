<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferralBonusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referral_bonuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('level_one_bonus')->nullable();
            $table->string('level_two_bonus')->nullable();
            $table->string('level_three_bonus')->nullable();
            $table->string('level_four_bonus')->nullable();
            $table->string('level_five_bonus')->nullable();
            $table->string('level_six_bonus')->nullable();
            $table->string('level_seven_bonus')->nullable();
            $table->string('level_eight_bonus')->nullable();
            $table->string('level_nine_bonus')->nullable();
            $table->string('level_ten_bonus')->nullable();

            $table->string('level_one_pv_bonus')->nullable();
            $table->string('level_two_pv_bonus')->nullable();
            $table->string('level_three_pv_bonus')->nullable();
            $table->string('level_four_pv_bonus')->nullable();
            $table->string('level_five_pv_bonus')->nullable();
            $table->string('level_six_pv_bonus')->nullable();
            $table->string('level_seven_pv_bonus')->nullable();
            $table->string('level_eight_pv_bonus')->nullable();
            $table->string('level_nine_pv_bonus')->nullable();
            $table->string('level_ten_pv_bonus')->nullable();

            $table->string('wallet_bonus')->nullable();
            $table->string('wallet_pv_bonus')->nullable();
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
        Schema::dropIfExists('referral_bonuses');
    }
}
