<?php

use Illuminate\Database\Seeder;

use App\Reply;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reply::create([
            'body' => 'Aaron is actually the worst person I\'ve ever met',
            'thread' => 1,
            'owner' => 1,
        ]);
    }
}
