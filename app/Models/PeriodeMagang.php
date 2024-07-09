<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodeMagang extends Model
{
    protected $table = 'periode_magang';
    protected $fillable = [
        'nama_periode',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
        'kuota',
    ];

    public function pendaftaran()
    {
        return $this->hasMany(PendaftarMahasiswa::class);
    }
}
