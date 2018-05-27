<?php

use Illuminate\Database\Seeder;

class ReferralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Referral::Create([
        	'user_id'                            => 1,
        	'referral_id'                            => NULL,
        ]);

        \App\Referral::Create([
        	'user_id'                            => 2,
        	'referral_id'                            => 1,
        ]);

        \App\Referral::Create([
        	'user_id'                            => 3,
        	'referral_id'                            => 2,
        ]);


        \App\Referral::Create([
        	'user_id'                            => 4,
        	'referral_id'                            => 3,
        ]);


        \App\Referral::Create([
        	'user_id'                            => 5,
        	'referral_id'                            => 4,
        ]);
    }
}
