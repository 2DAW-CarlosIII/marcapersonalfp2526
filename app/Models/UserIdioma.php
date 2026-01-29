<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserIdioma extends Model
{
   protected $table='users_idiomas';
   protected $fillable = ['user_id','idioma_id'];
}
