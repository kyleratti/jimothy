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
            'description' => 'Talk crap about players here',
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
            'description' => 'Talk crap about banana here',
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

        // Garbage section
        Board::create([
            'name' => 'Garbage Can',
            'description' => 'Aim for your thread to end up here',
            'weight' => 1,
            'category' => 3
        ]);

        Board::create([
            'name' => 'Recycling Plant',
            'description' => 'Tell us why you should be re-used, not recycled',
            'weight' => 2,
            'category' => 3
        ]);
    }
}
