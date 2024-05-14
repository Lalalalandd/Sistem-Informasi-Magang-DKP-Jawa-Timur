<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dinas extends Model
{
    use HasFactory;
    protected $fillable = [
        'dinas',
        'alamat',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'dinas_id', 'id');
    }
    
    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }
}
