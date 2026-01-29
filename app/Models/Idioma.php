<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function Users():BelongsToMany{
        
        return $this->belongsToMany(User::class);
    }
}
