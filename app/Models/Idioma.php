<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{

    protected $table='idiomas';
    protected $fillable = ["english_name","native_name","alpha2","alpha3t","alpha3b"];

    function users(){
        return $this->belongsToMany(User::class, 'users_idiomas', 'idioma_id', 'user_id');
    }
}
