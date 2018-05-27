<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = \App\User::Create([
        	'name'                            => 'Busayo Schneider',
        	'email'                            => 'buskoms@yahoo.com',
        	'password'                      => bcrypt('password'),
        	'package_id'                      => 1,


        ]);

        $profile1 = new App\Profile;
        $profile1->user_id =  $user1->id;

        $profile1->save();

        
        $user2 = \App\User::Create([
        	'name'                            => 'Genesis',
        	'email'                            => 'genesis@cosmo.com',
        	'password'                      => bcrypt('password'),
        	'package_id'                      => 1,
        ]);

        $profile2 = new App\Profile;
        $profile2->user_id =  $user2->id;

        $profile2->save();


        $user3 = \App\User::Create([
        	'name'                            => 'ichoc ken',
        	'email'                            => 'ikoc3333h@example.com',
        	'password'                      => bcrypt('password'),
        	'package_id'                      => 1,
        ]);

        $profile3 = new App\Profile;
        $profile3->user_id =  $user3->id;

        $profile3->save();



        $user4 = \App\User::Create([
        	'name'                            => 'Banny Throw Schneider',
        	'email'                            => 'btrantow5434@example.com',
        	'password'                      => bcrypt('password'),
        	'package_id'                      => 1,
        ]);

        $profile4 = new App\Profile;
        $profile4->user_id =  $user4->id;

        $profile4->save();


        $user5 = \App\User::Create([
        	'name'                            => 'sadiya Mustafa',
        	'email'                            => 'sadiya446@yahoo.com',
        	'password'                      => bcrypt('password'),
        	'package_id'                      => 1,
        ]);

        $profile5 = new App\Profile;
        $profile5->user_id =  $user5->id;

        $profile5->save();
    }
}
