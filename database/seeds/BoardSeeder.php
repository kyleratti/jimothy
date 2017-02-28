<?php

use Illuminate\Database\Seeder;
use App\Board;

class BoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Board::create([
            'name' => 'Important Stuff',
            'description' => 'You should probably read these',
            'weight' => 1,
            'category' => 1
        ]);

        Board::create([
            'name' => 'Server Chat',
            'description' => 'Go online to talk about the online server',
            'weight' => 1,
            'category' => 2
        ]);
    }
}
