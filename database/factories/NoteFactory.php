<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid,
            'user_id' => User::factory(),
            'title' => $this->faker->sentence(4),
            'body' => $this->faker->paragraph,
            'recipient' => $this->faker->unique()->safeEmail,
            'send_date' => $this->faker->dateTimeBetween('now', '+10 days'),
            'is_published' => true,
            'heart_count' => $this->faker->numberBetween(0, 20),
        ];
    }
}
