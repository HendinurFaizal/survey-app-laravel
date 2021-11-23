<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Vote extends Model
{
    use HasFactory;

    protected $table = 'votes';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'user_id',
        'question',
    ];

    public function publicPath()
    {
        return url('/vote-response/' . $this->id . '-' . Str::slug($this->title));
    }
}
