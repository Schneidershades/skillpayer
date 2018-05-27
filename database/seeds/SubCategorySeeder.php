<?php

use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\SubCategory::Create([
        	'name'                            => 'Auto Parts',
        	'category_id'                            => 1,
        	'slug'                            => str_slug('Auto Parts'),
        ]);

        \App\SubCategory::Create([
        	'name'                            => 'Mobile & Tablets',
        	'category_id'                            => 3,
        	'slug'                            => str_slug('Mobile & Tablets'),
        ]);

        \App\SubCategory::Create([
        	'name'                            => 'Technical Services',
        	'category_id'                            => 3,
        	'slug'                            => str_slug('Technical Services'),
        ]);
        
        \App\SubCategory::Create([
        	'name'                            => 'Cleaning & Washing',
        	'category_id'                            => 5,
        	'slug'                            => str_slug('Cleaning & Washing'),
        ]);

        \App\SubCategory::Create([
        	'name'                            => 'Data Entry',
        	'category_id'                            => 5,
        	'slug'                            => str_slug('Data Entry'),
        ]);

        \App\SubCategory::Create([
        	'name'                            => 'Design & Code',
        	'category_id'                            => 5,
        	'slug'                            => str_slug('Design & Code'),
        ]);

        \App\SubCategory::Create([
        	'name'                            => 'Finance Jobs',
        	'category_id'                            => 5,
        	'slug'                            => str_slug('Finance Jobs'),
        ]);

        // 

        \App\SubCategory::Create([
            'name'                            => 'Birds',
            'category_id'                            => 9,
            'slug'                            => str_slug('Birds'),
        ]);

        \App\SubCategory::Create([
            'name'                            => 'Cats',
            'category_id'                            => 9,
            'slug'                            => str_slug('Cats'),
        ]);
        
        \App\SubCategory::Create([
            'name'                            => 'Dogs',
            'category_id'                            => 9,
            'slug'                            => str_slug('Dogs'),
        ]);

        \App\SubCategory::Create([
            'name'                            => 'Fancy Hens',
            'category_id'                            => 9,
            'slug'                            => str_slug('Fancy Hens'),
        ]);

        \App\SubCategory::Create([
            'name'                            => 'Fishes',
            'category_id'                            => 9,
            'slug'                            => str_slug('Fishes'),
        ]);

        \App\SubCategory::Create([
            'name'                            => 'Grey Parrots',
            'category_id'                            => 9,
            'slug'                            => str_slug('Grey Parrots'),
        ]);
        

        \App\SubCategory::Create([
            'name'                            => 'Broasted Chicken',
            'category_id'                            => 11,
            'slug'                            => str_slug('Broasted Chicken'),
        ]);

        \App\SubCategory::Create([
            'name'                            => 'Burgers',
            'category_id'                            => 11,
            'slug'                            => str_slug('Burgers'),
        ]);
        
        \App\SubCategory::Create([
            'name'                            => 'Cafe or Bistro',
            'category_id'                            => 11,
            'slug'                            => str_slug('Cafe or Bistro'),
        ]);

        \App\SubCategory::Create([
            'name'                            => 'Fast Casual',
            'category_id'                            => 11,
            'slug'                            => str_slug('Fast Casual'),
        ]);

        \App\SubCategory::Create([
            'name'                            => 'Fast Food ',
            'category_id'                            => 11,
            'slug'                            => str_slug('Fast Food'),
        ]);

        \App\SubCategory::Create([
            'name'                            => 'Fine Dinning',
            'category_id'                            => 11,
            'slug'                            => str_slug('Fine Dinning'),
        ]);


        \App\SubCategory::Create([
            'name'                            => 'Cleaning Services ',
            'category_id'                            => 12,
            'slug'                            => str_slug('Cleaning Services'),
        ]);

        \App\SubCategory::Create([
            'name'                            => 'Educational',
            'category_id'                            => 12,
            'slug'                            => str_slug('Educational'),
        ]);
        
        \App\SubCategory::Create([
            'name'                            => 'Food Services',
            'category_id'                            => 12,
            'slug'                            => str_slug('Food Services'),
        ]);

        \App\SubCategory::Create([
            'name'                            => 'Home & Office Removals',
            'category_id'                            => 12,
            'slug'                            => str_slug('Home & Office Removals'),
        ]);

        \App\SubCategory::Create([
            'name'                            => 'Photography ',
            'category_id'                            => 12,
            'slug'                            => str_slug('Photography'),
        ]);
    }
}
