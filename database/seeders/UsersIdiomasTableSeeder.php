<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersIdiomasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear datos de ejemplo para la tabla users_idiomas
        $usersIdiomas = [
            ['user_id' => 1, 'idioma_id' => 1],
            ['user_id' => 1, 'idioma_id' => 2],
            ['user_id' => 2, 'idioma_id' => 1],
            ['user_id' => 3, 'idioma_id' => 3],
            ['user_id' => 4, 'idioma_id' => 2],
            ['user_id' => 5, 'idioma_id' => 1],
            // Agrega más datos según sea necesario
        ];
    }
}
