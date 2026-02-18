<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Dinas;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tugas>
 */
class TugasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dinas = Dinas::inRandomOrder()->first() ?? Dinas::factory()->create();

        return [
            'dinas_id' => $dinas->id,
            'user_id' => User::factory(),
            'tugas' => fake()->sentence(),
            'tgl_diberikan' => fake()->date(),
            'tgl_dikumpulkan' => fake()->date(),
            'lampiran' => 'lampiran.pdf',
            'status' => fake()->randomElement(['belum', 'selesai']),
        ];
    }
}