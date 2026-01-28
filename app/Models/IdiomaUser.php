<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IdiomaUser extends Model
{
    protected $fillable = [
        'idioma_id',
        'user_id',
    ];


    function user()
    {
        return $this->belongsTo(User::class);
    }

    function idioma()
    {
        return $this->belongsTo(Idioma::class);
    }
}
