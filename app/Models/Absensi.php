<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'absensi';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'IdAbsensi';

    public function biodata()
    {
        return $this->belongsTo(Biodata::class, 'IdAnak', 'IdAnak');
    }

    public function tipe_absensi()
    {
        return $this->belongsTo(TipeAbsensi::class, 'IdTipe', 'IdTipe');
    }
}
