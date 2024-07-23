<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Universitas extends Model
{
    use HasFactory;
    protected $table = 'universitas';
    protected $fillable = ['universitas'];

    public function pendaftarMahasiswa()
    {
        return $this->hasOne(PendaftarMahasiswa::class, 'universitas_id');
    }
}
