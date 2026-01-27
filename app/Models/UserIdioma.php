<?php

namespace App\Models;

use App\Models\Idioma;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserIdioma extends Model
{
    use HasFactory;
    protected $table = 'users_idiomas';
    protected $fillable = ['user_id', 'idioma_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function idioma()
    {
        return $this->belongsTo(Idioma::class);
    }
}
