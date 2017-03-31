<?php

use Illuminate\Database\Seeder;

use App\Group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::create([
            'name' => 'Guest',
            'weight' => 100,
            'is_default' => true,
        ]);

        Group::create([
            'name' => 'Admin',
            'inherits_from' => 1,
            'weight' => 2,
            'is_default' => true,
        ]);

        Group::create([
            'name' => 'Super Admin',
            'inherits_from' => 2,
            'weight' => 1,
            'is_default' => true,
        ]);

        Group::create([
            'name' => 'Owner',
            'inherits_from' => 3,
            'weight' => 0,
            'is_default' => true,
        ]);
    }
}
