<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentalQuestionnaire extends Model
{
    use HasFactory;
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'parental_questionaire';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'IdParental';
}
