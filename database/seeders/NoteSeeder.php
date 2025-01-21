<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('notes')->insert([
            [
            'id' => Str::uuid(), // Generate a UUID for the id
            'user_id' => 1, // Replace with an actual user ID
            'title' => 'First Note',
            'body' => 'This is the body of the first note.',
            'send_date' => now()->addDays(1), // Send date as tomorrow
            'is_published' => true,
            'heart_count' => 10,
            'created_at' => now(),
            'updated_at' => now(),
            
        ],
        [
            'id' => Str::uuid(),
            'user_id' => 1, 
            'title' => 'Second Note',
            'body' => 'This is the body of the second note.',
            'send_date' => now()->addDays(5),
            'is_published' => false,
            'heart_count' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        ]);
    }
}
