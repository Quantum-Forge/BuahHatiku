<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalRolling extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'jadwal_rolling';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'IdJadwal';

    public function biodata()
    {
        return $this->belongsTo(Biodata::class, 'IdAnak', 'IdAnak');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'NoIdentitas', 'NoIdentitas');
    }

    public function absensi()
    {
        return $this->hasOne(Absensi::class, 'IdJadwal', 'IdJadwal');
    }
}
