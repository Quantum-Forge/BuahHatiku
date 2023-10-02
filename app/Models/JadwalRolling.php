<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class JadwalRolling extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'jadwal_rolling';
    protected $dates = ['Tanggal'];
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'IdJadwal';

    public function getWaktuMulaiAttribute()
    {
        return Carbon::parse($this->attributes['WaktuMulai'])->format('H:i');
    }

    public function getWaktuSelesaiAttribute()
    {
        return Carbon::parse($this->attributes['WaktuSelesai'])->format('H:i');
    }

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

    public function scopeHasAbsensi($query, $hadir)
    {
        return $query->whereHas('absensi', function($query) use ($hadir) {
            return $query->where('Hadir', $hadir);
        });
    }

    public function tipe_absensi()
    {
        return $this->belongsTo(TipeAbsensi::class, 'IdTipe', 'IdTipe');
    }
}
