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
        // Staff section
        Board::create([
            'name' => 'Staff Discussion',
            'description' => 'Talk about crap here',
            'weight' => 1,
            'category' => 1
        ]);

        Board::create([
            'name' => 'Known Issues',
            'description' => 'Read about stuff I know is broken & won\'t fix',
            'weight' => 2,
            'category' => 1
        ]);

        // General section
        Board::create([
            'name' => 'General Discussion',
            'description' => 'Wow us with how deep you are bro',
            'weight' => 1,
            'category' => 2
        ]);

        Board::create([
            'name' => 'Server Chat',
            'description' => 'Go to the website to talk about the server',
            'weight' => 2,
            'category' => 2
        ]);

        Board::create([
            'name' => 'Tech Stuff',
            'description' => 'Rant and rave about technology here',
            'weight' => 3,
            'category' => 2
        ]);
    }
}
