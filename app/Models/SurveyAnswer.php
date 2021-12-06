<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyAnswer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function question()
    {
        return $this->belongsTo(SurveyQuestion::class);
    }

    public function responses()
    {
        return $this->hasMany(AnswerResponse::class);
    }
}
