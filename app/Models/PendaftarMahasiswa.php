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
        'periode_magang_id',
        'sub_bagian_id',
        'universitas_id',
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
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function periodeMagang()
    {
        return $this->belongsTo(PeriodeMagang::class);
    }
    public function sub_bagian()
    {
        return $this->belongsTo(Sub_Bagian::class);
    }
    public function universitas()
    {
        return $this->belongsTo(Universitas::class);
    }

}
