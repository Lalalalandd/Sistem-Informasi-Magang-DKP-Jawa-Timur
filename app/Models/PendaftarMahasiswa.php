<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PendaftarMahasiswa extends Model
{
    use HasFactory;
    protected $table = 'pendaftar_mahasiswa';
    protected $fillable = [
        'user_id',
        'nama_kelompok_1',
        'nama_kelompok_2',
        'universitas',
        'fakultas',
        'prodi',
        'surat_pengantar',
        'surat_balasan',
        'surat_keterangan',
        'sertifikat',
        'tgl_mulai',
        'tgl_selesai',
        'penerimaan',
        'sub_bagian',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
    
}
