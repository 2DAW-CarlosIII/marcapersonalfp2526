<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IdiomaUser extends Model
{
    protected $fillable = [
        'user_id',
        'idioma_id',
    ];
}
