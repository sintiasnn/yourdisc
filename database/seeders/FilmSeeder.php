<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Film;

class FilmSeeder extends Seeder
{
    public function run(): void
    {
        Film::factory(20)->create();
    }
}

