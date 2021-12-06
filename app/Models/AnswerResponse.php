<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerResponse extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function answers()
    {
        return $this->belongsTo(Answer::class);
    }
}
