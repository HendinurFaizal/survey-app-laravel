<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoteAnswer extends Model
{
    use HasFactory;

    protected $table = 'vote_answers';

    protected $primaryKey = 'id';

    protected $fillable = [
        'vote_option_id',
        'user_id',
        'answer',
    ];
}
