<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Logbook>
 */
class LogbookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'tanggal' => fake()->date(),
            'aktivitas' => fake()->paragraph(),
            'bukti' => 'bukti.jpg',
            'presensi' => fake()->time(),
            'status' => fake()->randomElement(['pending', 'approved', 'rejected']),
        ];
    }
}