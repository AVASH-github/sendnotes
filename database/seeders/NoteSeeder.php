<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Note;
use App\Models\User;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    User::all()->each(function (User $user) {
        Note::factory()->count(10)->create([
            'user_id' => $user->id,
        ])->each(function ($note) {
            dump($note->recipient);
        });
    });
}

}
