<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    protected $fillable = [
        'alpha2',
        'alpha3t',
        'alpha3b',
        'english_name',
        'native_name',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_idiomas');
    }


}
