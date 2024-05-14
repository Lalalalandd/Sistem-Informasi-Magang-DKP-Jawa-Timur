<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;
    protected $table = 'tugas';
    protected $fillable = [
        'dinas_id',
        'user_id',
        'tugas',
        'sub_bagian',
        'status'
    ];

    public function dinas()
    {
        return $this->belongsTo(Dinas::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
