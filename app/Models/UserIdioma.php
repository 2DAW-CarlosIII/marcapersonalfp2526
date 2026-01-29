<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserIdioma extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'idioma_id',
        'certificado'
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function idioma()
    {
        return $this->belongsToMany(Idioma::class);
    }
}
