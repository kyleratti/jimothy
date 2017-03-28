<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Staff Land',
            'icon' => 'key',
            'weight' => 1,
            'collapsible' => true,
        ]);

        Category::create([
            'name' => 'General Stuff',
            'icon' => 'comments',
            'weight' => 2,
            'collapsible' => true,
        ]);

        Category::create([
            'name' => 'Waste Management',
            'icon' => 'trash',
            'weight' => 3,
            'collapsible' => true,
        ]);
    }
}
