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
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Dinas::create([
            'dinas' => 'Dinas Kelautan dan Perikanan Provinsi Jawa Timur',
            'alamat' => 'Jl. Ahmad Yani No.152 B, Gayungan, Kec. Gayungan, Surabaya, Jawa Timur 60235'
        ]);
        Dinas::create([
            'dinas' => 'CABDIN SITUBONDO',
            'alamat' => 'Situbondo, Jawa Timur'
        ]);
        Dinas::create([
            'dinas' => 'CABDIN MALANG',
            'alamat' => 'Malang, Jawa Timur'
        ]);
        Dinas::create([
            'dinas' => 'CABDIN TUBAN',
            'alamat' => 'Tuban, Jawa Timur'
        ]);
        Dinas::create([
            'dinas' => 'CABDIN BLITAR',
            'alamat' => 'Blitar, Jawa Timur'
        ]);
        Dinas::create([
            'dinas' => 'UPT PPP MUNCAR',
            'alamat' => 'Muncar, Jawa Timur'
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'dinas_id' => 1,
            'password' => bcrypt('admin'),
            'status' => 1,
        ]);
        User::create([
            'name' => 'Pegawai',
            'email' => 'pegawai@gmail.com',
            'role' => 'pegawai',
            'dinas_id' => 2,
            'password' => bcrypt('pegawai'),
            'status' => 1,
        ]);

        

        Sub_Bagian::create([
            'sub_bagian' => 'Kesekretariatan'
        ]);
        Sub_Bagian::create([
            'sub_bagian' => 'Keuangan'
        ]);
        Sub_Bagian::create([
            'sub_bagian' => 'Budidaya'
        ]);
        Sub_Bagian::create([
            'sub_bagian' => 'Tangkap'
        ]);
        Sub_Bagian::create([
            'sub_bagian' => 'Program'
        ]);
        Sub_Bagian::create([
            'sub_bagian' => 'Perpustakaan'
        ]);

    }
}
