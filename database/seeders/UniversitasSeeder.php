<?php

namespace Database\Seeders;

use App\Models\Universitas;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UniversitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $universities = [
            "Institut Pertanian Bogor", "Institut Seni Budaya Indonesia Aceh", "Institut Seni Budaya Indonesia Bandung",
            "Institut Seni Budaya Indonesia Tanah Papua", "Institut Seni Indonesia Denpasar", "Institut Seni Indonesia Padang Panjang",
            "Institut Seni Indonesia Surakarta", "Institut Seni Indonesia Yogyakarta", "Institut Teknologi Bandung",
            "Institut Teknologi Kalimantan", "Institut Teknologi Sepuluh Nopember", "Institut Teknologi Sumatera",
            "Politeknik Elektronika Negeri Surabaya", "Politeknik Manufaktur Bandung", "Politeknik Manufaktur Negeri Bangka Belitung",
            "Politeknik Maritim Negeri Indonesia", "Politeknik Negeri Ambon", "Politeknik Negeri Bali", "Politeknik Negeri Balikpapan",
            "Politeknik Negeri Bandung", "Politeknik Negeri Banjarmasin", "Politeknik Negeri Banyuwangi", "Politeknik Negeri Batam",
            "Politeknik Negeri Bengkalis", "Politeknik Negeri Cilacap", "Politeknik Negeri Fakfak", "Politeknik Negeri Indramayu",
            "Politeknik Negeri Jakarta", "Politeknik Negeri Jember", "Politeknik Negeri Ketapang", "Politeknik Negeri Kupang",
            "Politeknik Negeri Lampung", "Politeknik Negeri Lhokseumawe", "Politeknik Negeri Madiun", "Politeknik Negeri Madura",
            "Politeknik Negeri Malang", "Politeknik Negeri Manado", "Politeknik Negeri Medan", "Politeknik Negeri Media Kreatif",
            "Politeknik Negeri Nusa Utara", "Politeknik Negeri Padang", "Politeknik Negeri Pontianak", "Politeknik Negeri Samarinda",
            "Politeknik Negeri Sambas", "Politeknik Negeri Semarang", "Politeknik Negeri Sriwijaya", "Politeknik Negeri Subang",
            "Politeknik Negeri Tanah Laut", "Politeknik Negeri Ujung Pandang", "Politeknik Perikanan Negeri Tual",
            "Politeknik Perkapalan Negeri Surabaya", "Politeknik Pertanian Negeri Kupang", "Politeknik Pertanian Negeri Pangkajene Kepulauan",
            "Politeknik Pertanian Negeri Payakumbuh", "Politeknik Pertanian Negeri Samarinda", "Universitas Airlangga",
            "Universitas Andalas", "Universitas Bangka Belitung", "Universitas Bengkulu", "Universitas Borneo Tarakan",
            "Universitas Brawijaya", "Universitas Cenderawasih", "Universitas Diponegoro", "Universitas Gadjah Mada", "Universitas Halu Oleo",
            "Universitas Hasanuddin", "Universitas Indonesia", "Universitas Jambi", "Universitas Jember", "Universitas Jenderal Soedirman",
            "Universitas Khairun", "Universitas Lambung Mangkurat", "Universitas Lampung", "Universitas Malikussaleh",
            "Universitas Maritim Raja Ali Haji (UMRAH)", "Universitas Mataram", "Universitas Mulawarman", "Universitas Musamus Merauke",
            "Universitas Negeri Gorontalo", "Universitas Negeri Jakarta", "Universitas Negeri Makassar", "Universitas Negeri Malang",
            "Universitas Negeri Manado", "Universitas Negeri Medan", "Universitas Negeri Padang", "Universitas Negeri Semarang",
            "Universitas Negeri Surabaya", "Universitas Negeri Yogyakarta", "Universitas Nusa Cendana", "Universitas Padjadjaran",
            "Universitas Palangka Raya", "Universitas Papua", "Universitas Pattimura", "Universitas Pembangunan Nasional Veteran Jakarta",
            "Universitas Pembangunan Nasional Veteran Jawa Timur", "Universitas Pembangunan Nasional Veteran Yogyakarta",
            "Universitas Pendidikan Ganesha", "Universitas Pendidikan Indonesia", "Universitas Riau", "Universitas Sam Ratulangi",
            "Universitas Samudra", "Universitas Sebelas Maret", "Universitas Sembilanbelas November Kolaka", "Universitas Siliwangi",
            "Universitas Singaperbangsa Karawang", "Universitas Sriwijaya", "Universitas Sulawesi Barat", "Universitas Sultan Ageng Tirtayasa",
            "Universitas Sumatera Utara", "Universitas Syiah Kuala", "Universitas Tadulako", "Universitas Tanjungpura", "Universitas Terbuka",
            "Universitas Teuku Umar", "Universitas Tidar", "Universitas Timor", "Universitas Trunojoyo", "Universitas Udayana",
            "Universitas Telkom Surabaya", "Universitas Telkom", "Universitas Telkom Jakarta", "Politeknik Elektronika Negeri Surabaya",
            "Institut Teknologi Sepuluh Nopember", "Poltekkes Kemenkes Surabaya", "Universitas 17 Agustus 1945 Surabaya",
            "Universitas Widya Kartika", "Universitas Katolik Widya Mandala Surabaya", "Universitas Nahdlatul Ulama Surabaya",
            "Universitas Wijaya Kusuma Surabaya", "Universitas Teknologi Surabaya", "Universitas Hang Tuah", "Universitas Kartini",
            "Universitas W R Supratman", "Universitas PGRI Adi Buana", "Universitas Dr Soetomo", "Universitas Pelita Harapan Surabaya",
            "Universitas Merdeka Surabaya", "Universitas Muhammadiyah Surabaya", "Universitas 45 Surabaya", "Universitas Surabaya",
            "Universitas Madura", "Universitas Islam Madura"
        ];

        foreach ($universities as $universitas) {
            Universitas::create([
                'universitas' => $universitas
            ]);
        }
    }
}
