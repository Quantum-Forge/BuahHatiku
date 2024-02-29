<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'questionaire';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'IdQuestionaire';

    public function jenis()
    {
        return $this->belongsTo(JenisQuestionaire::class, 'IdJenis', 'IdJenis');
    }

    public function parental_questionnaires()
    {
        return $this->belongsTo(ParentalQuestionnaire::class, 'IdQuestionaire', 'IdQuestionaire');
    }

    public function has_relation(): bool
    {
        if($this->parental_questionnaires()->count() > 0) return true;
        return false;
    }
}
