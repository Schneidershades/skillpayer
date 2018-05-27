<?php

use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Country::Create([
        	'name'                  => 'Nigeria',
            'slug'                  => str_slug('Nigeria'),
        ]);
    }
}
