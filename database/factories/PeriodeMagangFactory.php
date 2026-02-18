<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PeriodeMagang>
 */
class PeriodeMagangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = fake()->dateTimeBetween('-1 year', 'now');
        $endDate = fake()->dateTimeBetween($startDate, '+1 year');

        return [
            'nama_periode' => 'Periode ' . fake()->monthName() . ' ' . fake()->year(),
            'tanggal_mulai' => $startDate,
            'tanggal_selesai' => $endDate,
            'status' => fake()->randomElement(['aktif', 'non-aktif']),
            'kuota' => fake()->numberBetween(10, 50),
        ];
    }
}