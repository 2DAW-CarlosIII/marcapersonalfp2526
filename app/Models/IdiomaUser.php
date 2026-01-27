<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IdiomaUser extends Model
{
    protected $fillable = [
        'user_id',
        'idioma_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function idioma()
    {
        return $this->belongsTo(Idioma::class);
    }
}
