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
            'name' => 'Staff Discussion',
            'description' => 'Talk about crap here',
            'weight' => 1,
            'category' => 1
        ]);

        Board::create([
            'name' => 'Known Issues',
            'description' => 'Read about stuff I\'m not going to be fixing',
            'weight' => 2,
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
