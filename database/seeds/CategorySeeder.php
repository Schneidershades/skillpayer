<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Category::Create([
        	'name'                            => 'Automotive',
        	'slug'                            => str_slug('Automotive'),
        ]);

        \App\Category::Create([
        	'name'                            => 'Education',
        	'slug'                            => str_slug('Education'),
        ]);

        \App\Category::Create([
        	'name'                            => 'Electronics',
        	'slug'                            => str_slug('Electronics'),
        ]);

        \App\Category::Create([
        	'name'                            => 'Fashion',
        	'slug'                            => str_slug('Fashion'),
        ]);

        \App\Category::Create([
        	'name'                            => 'Jobs',
        	'slug'                            => str_slug('Jobs'),
        ]);

        \App\Category::Create([
        	'name'                            => 'Medicals',
        	'slug'                            => str_slug('Medicals'),
        ]);

        \App\Category::Create([
        	'name'                            => 'Networking',
        	'slug'                            => str_slug('Networking'),
        ]);

        \App\Category::Create([
        	'name'                            => 'Pets & Animals',
        	'slug'                            => str_slug('Pets & Animals'),
        ]);

        \App\Category::Create([
        	'name'                            => 'Real Estate',
        	'slug'                            => str_slug('Real Estate'),
        ]);

        \App\Category::Create([
        	'name'                            => 'Restaurants & Cafe',
        	'slug'                            => str_slug('Restaurants & Cafe'),
        ]);

        \App\Category::Create([
        	'name'                            => 'Services',
        	'slug'                            => str_slug('Services'),
        ]);

        \App\Category::Create([
        	'name'                            => 'Uncategorized',
        	'slug'                            => str_slug('Uncategorized'),
        ]);

    }
}
