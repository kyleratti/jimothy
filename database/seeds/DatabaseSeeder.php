<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategorySeeder::class);
        $this->call(BoardSeeder::class);
        $this->call(ThreadTableSeeder::class);
        $this->call(RepliesTableSeeder::class);

        $this->call(GroupSeeder::class);
        $this->call(ForumPermissionSeeder::class);
        $this->call(GamePermissionSeeder::class);
    }
}
