<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoteOption extends Model
{
    use HasFactory;

    protected $table = 'vote_options';

    protected $primaryKey = 'id';

    protected $fillable = [
        'vote_id',
        'option',
    ];
}
