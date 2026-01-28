<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class UserIdioma extends Model
{

    protected $fillable = [
        'id',
        'user_id',
        'idioma_id',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'users_idiomas', 'user_id', 'idioma_id');
    }

}
