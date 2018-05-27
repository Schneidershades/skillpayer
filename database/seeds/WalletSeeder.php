<?php

use Illuminate\Database\Seeder;

class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Wallet::Create([
        	'user_id'                            => 1,
        	'skill_coin_balance'                            => 4000,
            'pv_balance'                            => 10,
        ]);

        \App\Wallet::Create([
        	'user_id'                            => 2,
            'skill_coin_balance'                            => 4000,
        	'pv_balance'                            => 10,
        ]);

        \App\Wallet::Create([
        	'user_id'                            => 3,
        	'skill_coin_balance'                            => 200,
            'pv_balance'                            => 10,
        ]);


        \App\Wallet::Create([
        	'user_id'                            => 4,
        	'skill_coin_balance'                            => 300,
            'pv_balance'                            => 10,
        ]);


        \App\Wallet::Create([
        	'user_id'                            => 5,
        	'skill_coin_balance'                            => 40000,
            'pv_balance'                            => 10,
        ]);
    }
}
