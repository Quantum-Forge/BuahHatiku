<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'invoice';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'NoInvoice';

    public function biodata()
    {
        return $this->belongsTo(Biodata::class, 'IdAnak', 'IdAnak');
    }
}
