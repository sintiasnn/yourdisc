<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (app()->environment('testing')) {
            \App\Models\Film::query()->delete();
            \App\Models\Member::query()->delete();

            \App\Models\Film::insert([
                ['code' => 'DVD-001', 'title' => 'The Matrix', 'genre' => 'Sci-Fi', 'year' => 1999, 'stock' => 5],
                ['code' => 'DVD-002', 'title' => 'Inception', 'genre' => 'Sci-Fi', 'year' => 2010, 'stock' => 3],
                ['code' => 'DVD-003', 'title' => 'Spirited Away', 'genre' => 'Animation', 'year' => 2001, 'stock' => 4],
            ]);

            \App\Models\Member::insert([
                ['code' => 'MBR-ALICE', 'name' => 'Alice', 'phone' => '081234567890', 'address' => 'Wonderland'],
                ['code' => 'MBR-BOB', 'name' => 'Bob', 'phone' => '081298765432', 'address' => 'Builder Street'],
                ['code' => 'MBR-CHARL', 'name' => 'Charlie', 'phone' => '081211122233', 'address' => 'Chocolate Factory'],
            ]);
            return;
        }

        $this->call([
            FilmSeeder::class,
            MemberSeeder::class,
        ]);
    }

}
