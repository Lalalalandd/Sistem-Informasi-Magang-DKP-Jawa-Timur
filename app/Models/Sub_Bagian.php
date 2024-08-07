<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_Bagian extends Model
{
    use HasFactory;

    protected $table = 'sub_bagian';
    protected $fillable = [
        'sub_bagian'
    ];

    public function pendaftarMahasiswa()
    {
        return $this->hasOne(PendaftarMahasiswa::class, 'sub_bagian_id');
    }

}
