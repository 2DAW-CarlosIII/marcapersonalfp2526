<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'alpha2',
        'alpha3t',
        'alpha3b',
        'english_name',
        'native_name'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'idioma_user' , 'idioma_id', 'user_id');
    }
}
