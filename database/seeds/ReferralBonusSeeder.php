<?php

use Illuminate\Database\Seeder;

class ReferralBonusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\ReferralBonus::Create([
        	'level_one_bonus'                               => 20,
        	'level_two_bonus'                               => 10,
        	'level_three_bonus'                             => 3,
        	'level_four_bonus'                              => 3,
        	'level_five_bonus'                              => 1,
        	'level_six_bonus'                               => 1,
        	'level_seven_bonus'                             => 1,
        	'level_eight_bonus'                             => 1,
        	'level_nine_bonus'                              => 1,
        	'level_ten_bonus'                               => 1,


        	'level_one_pv_bonus'                            => 20,
        	'level_two_pv_bonus'                            => 10,
        	'level_three_pv_bonus'                          => 3,
        	'level_four_pv_bonus'                           => 2,
        	'level_five_pv_bonus'                           => 1,
        	'level_six_pv_bonus'                            => 1,
        	'level_seven_pv_bonus'                          => 1,
        	'level_eight_pv_bonus'                          => 1,
        	'level_nine_pv_bonus'                           => 1,
        	'level_ten_pv_bonus'                            => 1,

        	'wallet_bonus'                                  => 0,
        	'wallet_pv_bonus'                               => 0,
        ]);
    }
}
