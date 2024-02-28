<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeAbsensi extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tipe_absensi';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'IdTipe';

    public function jadwal_rolling()
    {
        return $this->hasMany(JadwalRolling::class, 'IdTipe', 'IdTipe');
    }

    public function user()
    {
        return $this->hasMany(User::class, 'IdTipe', 'IdTipe');
    }

    public function has_relation(): bool
    {
        if($this->jadwal_rolling()->count() > 0 || $this->user()->count() > 0) return true;
        return false;
    }
}
