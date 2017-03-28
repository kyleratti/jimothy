<?php

use Illuminate\Database\Seeder;

use App\Thread;

class ThreadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Thread::create([
            'title' => 'Aaron is the worst ever',
            'board' => 1,
            'owner' => 1
        ]);
    }
}
