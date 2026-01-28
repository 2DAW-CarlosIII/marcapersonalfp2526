<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IdiomasUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('idiomas_users')->insert([
            ['user_id' => 1, 'idioma_id' => 1],
            ['user_id' => 1, 'idioma_id' => 2],
            ['user_id' => 2, 'idioma_id' => 1],
            ['user_id' => 2, 'idioma_id' => 3],
            ['user_id' => 3, 'idioma_id' => 2],
            ['user_id' => 3, 'idioma_id' => 3],
            ['user_id' => 4, 'idioma_id' => 1],
            ['user_id' => 4, 'idioma_id' => 2],
        ]);
    }
}
