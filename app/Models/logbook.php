<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Logbook extends Model
{
    use HasFactory;
    protected $table = 'logbook';
    protected $fillable = [
        'user_id',
        'tanggal',
        'aktivitas',
        'bukti',
        'presensi',
        'status'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
