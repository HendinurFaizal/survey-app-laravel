<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Survey extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function publicPath()
    {
        return url('/survey-response/' . $this->id . '-' . Str::slug($this->title));
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function questions()
    {
        return $this->hasMany(SurveyQuestion::class);
    }
}
