<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Dinas;
use App\Models\Sub_Bagian;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Static Data
        $dinasJatim = Dinas::create([
            'dinas' => 'Dinas Kelautan dan Perikanan Provinsi Jawa Timur',
            'alamat' => 'Jl. Ahmad Yani No.152 B, Gayungan, Kec. Gayungan, Surabaya, Jawa Timur 60235'
        ]);

        $dinasList = [$dinasJatim];

        $dinasList[] = Dinas::create([
            'dinas' => 'CABDIN SITUBONDO',
            'alamat' => 'Situbondo, Jawa Timur'
        ]);
        $dinasList[] = Dinas::create([
            'dinas' => 'CABDIN MALANG',
            'alamat' => 'Malang, Jawa Timur'
        ]);
        $dinasList[] = Dinas::create([
            'dinas' => 'CABDIN TUBAN',
            'alamat' => 'Tuban, Jawa Timur'
        ]);
        $dinasList[] = Dinas::create([
            'dinas' => 'CABDIN BLITAR',
            'alamat' => 'Blitar, Jawa Timur'
        ]);
        $dinasList[] = Dinas::create([
            'dinas' => 'UPT PPP MUNCAR',
            'alamat' => 'Muncar, Jawa Timur'
        ]);

        // Create Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'dinas_id' => $dinasJatim->id,
            'password' => bcrypt('admin'),
            'status' => 1,
        ]);

        // Create Pegawai for each Dinas
        foreach ($dinasList as $dinas) {
            User::factory()->create([
                'name' => 'Pegawai ' . $dinas->dinas,
                'email' => 'pegawai_' . str_replace(' ', '_', strtolower($dinas->dinas)) . '@gmail.com',
                'role' => 'pegawai',
                'dinas_id' => $dinas->id,
                'password' => bcrypt('pegawai'),
                'status' => 1,
            ]);
        }

        // Sub Bagian
        $subBagianNames = [
            'Kesekretariatan', 'Keuangan', 'Budidaya', 'Tangkap', 'Program', 'Perpustakaan'
        ];

        $subBagianList = [];
        foreach ($subBagianNames as $name) {
            $subBagianList[] = Sub_Bagian::create(['sub_bagian' => $name]);
        }

        // Dummy Data Generation

        // 1. More Dinas
        Dinas::factory(5)->create();

        // 2. Universitas
        $universitasList = \App\Models\Universitas::factory(5)->create();

        // 3. Periode Magang
        $periodeList = \App\Models\PeriodeMagang::factory(3)->create();

        // 4. Mahasiswa & Pendaftar
        $universitasList->each(function ($universitas) use ($periodeList, $subBagianList) {
            User::factory(5)->create([
                'role' => 'mahasiswa',
                'dinas_id' => 1, // Default to main dinas for registration? adjusting based on schema, user has dinas_id.
            ])->each(function ($user) use ($universitas, $periodeList, $subBagianList) {
                    \App\Models\PendaftarMahasiswa::factory()->create([
                        'user_id' => $user->id,
                        'universitas_id' => $universitas->id,
                        'periode_magang_id' => $periodeList->random()->id,
                        'sub_bagian_id' => collect($subBagianList)->random()->id,
                    ]);

                    // 5. Logbook for Mahasiswa
                    \App\Models\Logbook::factory(5)->create([
                        'user_id' => $user->id,
                    ]);
                }
                );
            });

        // 6. Tugas for Pegawai/Mahasiswa
        // Assign tasks to some users
        User::where('role', 'mahasiswa')->get()->each(function ($user) {
            \App\Models\Tugas::factory(2)->create([
                'user_id' => $user->id,
                'dinas_id' => $user->dinas_id,
            ]);
        });
    }
}