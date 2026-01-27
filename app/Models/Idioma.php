<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    protected $fillable = [
        'id',
        'alpha2',
        'alpha3t',
        'alpha3b',
        'english_name',
        'native_name'
    ];
}
