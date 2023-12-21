<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Biodata extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'biodata';
    protected $dates = ['TglLahir'];
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'IdAnak';

    public function getTglLahirAttribute()
    {
        return $this->attributes['TglLahir']? Carbon::parse($this->attributes['TglLahir'])->format('d/m/Y') : null;
    }

    public function getTglLahirOrtuAttribute()
    {
        return $this->attributes['TglLahirOrtu']? Carbon::parse($this->attributes['TglLahirOrtu'])->format('d/m/Y') : null;
    }

    public function getTglMasukAttribute()
    {
        return $this->attributes['TglMasuk']? Carbon::parse($this->attributes['TglMasuk'])->format('d/m/Y') : null;
    }

    public function Diagnosa(): string
    {
        $diagnosa = '';
        if($this->IdDiagnosa == 1) $diagnosa = 'Hiperaktif';
        elseif($this->IdDiagnosa == 2) $diagnosa = 'Autis';
        elseif($this->IdDiagnosa == 3) $diagnosa = 'Speech Delay';
        elseif($this->IdDiagnosa == 4) $diagnosa = 'ADHD';
        elseif($this->IdDiagnosa == 5) $diagnosa = 'Lainnya';
        return $diagnosa;
    }

    public function parental_questionnaires()
    {
        return $this->hasMany(ParentalQuestionnaire::class, 'IdAnak', 'IdAnak');
    }

    public function jadwal_rolling()
    {
        return $this->hasMany(JadwalRolling::class, 'IdAnak', 'IdAnak');
    }

    public function scopeHasJadwal($query, $month, $year)
    {
        return $query->whereHas('jadwal_rolling', function($query) use ($month, $year) {
            return $query->whereMonth('Tanggal', $month)
                        ->whereYear('Tanggal', $year);
        });
    }

    public function invoice()
    {
        return $this->hasMany(Invoice::class, 'IdAnak', 'IdAnak');
    }

    public function scopeDoesntHaveInvoice($query, $month, $year)
    {
        return $query->wheredoesntHave('invoice', function($query) use ($month, $year) {
            return $query->whereMonth('TglInvoice', $month)
                        ->whereYear('TglInvoice', $year);
        });
    }
}
