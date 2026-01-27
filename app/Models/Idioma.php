<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Idioma extends Model
{
    protected $table = 'idiomas';

    protected $fillable = ['id', 'alpha2', 'alpha3t', 'alpha3b', 'english_name', 'native_name'];

    // Metodo para relacionar con users
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
