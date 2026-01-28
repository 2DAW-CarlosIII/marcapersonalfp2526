<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Idioma extends Model
{
    protected $table = 'idiomas';

    protected $fillable = ['alpha2', 'alpha3t', 'alpha3b', 'english_name', 'native_name'];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'users_idiomas');
    }
}
