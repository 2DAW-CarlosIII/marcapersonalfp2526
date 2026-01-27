<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserIdioma;

class UsersIdiomasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserIdioma::truncate();
        UserIdioma::factory()->count(50)->create();
    }
}