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
            'title' => 'Everything here is a WIP',
            'board' => 1,
            'owner' => 1,
        ]);

        Thread::create([
            'title' => 'No, seriously',
            'board' => 1,
            'owner' => 1,
        ]);

        Thread::create([
            'title' => 'Very broken',
            'board' => 1,
            'owner' => 1,
        ]);
    }
}
