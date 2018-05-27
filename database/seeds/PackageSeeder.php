<?php

use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	\App\Package::Create([
        	'name'                            => 'Dream',
          	'amount'                      => 0,
          'percentage'                      => 0,
        	'pv_bonus'                      => 0,
          	'description'                  => 'For Infinite Day Only',
        ]);

        \App\Package::Create([
        	'name'                            => 'Bronze',
          	'amount'                      => 5000,
        	'percentage'                      => 20,
          'pv_bonus'                      => 20,
          	'description'                  => 'For Infinite Day Only',
        ]);

        \App\Package::Create([
        	'name'                            => 'Silver',
          	'amount'                      => 10000,
        	'percentage'                      => 20,
          'pv_bonus'                      => 50,
          	'description'                  => 'For Infinite Day Only',
        ]);

        \App\Package::Create([
        	'name'                            => 'Gold',
          	'amount'                      => 30000,
        	'percentage'                      => 20,
          'pv_bonus'                      => 100,
          	'description'                  => 'For Infinite Day Only',
        ]);

        \App\Package::Create([
        	'name'                            => 'Ultimate',
          	'amount'                      => 50000,
        	'percentage'                      => 20,
          'pv_bonus'                      => 200,
          	'description'                  => 'For Infinite Day Only',
        ]);
    }
}
