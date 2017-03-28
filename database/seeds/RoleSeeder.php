<?php

use Illuminate\Database\Seeder;
use Kodeine\Acl\Models\Eloquent\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objBanned = Role::create([
            'name' => 'Banned',
            'slug' => 'banned',
            'description' => 'Recyclable'
        ]);

        $objGuest = Role::create([
            'name' => 'Guest',
            'slug' => 'guest',
            'description' => 'A guest'
        ]);

        $objAdmin = Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Global administrator'
        ]);

        $objSuperAdmin = Role::create([
            'name' => 'Super Admin',
            'slug' => 'superadmin',
            'description' => 'Global super administrator'
        ]);

        $objOwner = Role::create([
            'name' => 'Owner',
            'slug' => 'owner',
            'description' => 'Big cheese'
        ]);
    }
}
