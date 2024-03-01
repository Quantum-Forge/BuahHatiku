<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'NoIdentitas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tipe_absensi()
    {
        return $this->belongsTo(TipeAbsensi::class, 'IdTipe', 'IdTipe');
    }

    public function jadwal_rolling()
    {
        return $this->hasMany(JadwalRolling::class, 'NoIdentitas', 'NoIdentitas');
    }

    public function has_relation(): bool
    {
        if($this->jadwal_rolling()->count() > 0) return true;
        return false;
    }
}
