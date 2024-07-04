<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Logbook;
use App\Models\PendaftarMahasiswa;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'image',
        'role',
        'password',
        'status',
        'dinas_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function detail()
    {
        return $this->hasOne(PendaftarMahasiswa::class, 'user_id', 'id');
    }

    public function logbook(): HasMany
    {
        return $this->hasMany(Logbook::class);
    }

    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }

    public function dinas()
    {
        return $this->belongsTo(Dinas::class);
    }
}
