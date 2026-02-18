<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\PeriodeMagang;
use App\Models\Sub_Bagian;
use App\Models\Universitas;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PendaftarMahasiswa>
 */
class PendaftarMahasiswaFactory extends Factory
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
            'periode_magang_id' => PeriodeMagang::factory(),
            'sub_bagian_id' => Sub_Bagian::factory(),
            'universitas_id' => Universitas::factory(),
            'nama_kelompok_1' => fake()->word(),
            'nama_kelompok_2' => fake()->word(),
            'fakultas' => fake()->word(),
            'prodi' => fake()->word(),
            'surat_pengantar' => 'surat_pengantar.pdf',
            'tgl_mulai' => fake()->date(),
            'tgl_selesai' => fake()->date(),
            'surat_balasan' => 'surat_balasan.pdf',
            'surat_keterangan' => 'surat_keterangan.pdf',
            'sertifkiat' => 'sertifikat.pdf', // Typo matches migration/model
            'penerimaan' => fake()->randomElement(['diproses', 'diterima', 'ditolak']),
        ];
    }
}