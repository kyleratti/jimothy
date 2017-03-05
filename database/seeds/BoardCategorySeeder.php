<?php

use Illuminate\Database\Seeder;
use App\BoardCategory;

class BoardCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BoardCategory::create([
            'name' => 'Staff Land',
            'icon' => 'key',
            'weight' => 1,
            'collapsible' => 1,
        ]);

        BoardCategory::create([
            'name' => 'General Stuff',
            'icon' => 'comments',
            'weight' => 2,
            'collapsible' => 1,
        ]);
    }
}
