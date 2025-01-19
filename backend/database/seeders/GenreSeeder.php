<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            ["genre_name" => "Gore"],
            ["genre_name" => "Science fiction"],
            ["genre_name" => "Horror"],
            ["genre_name" => "War"],
            ["genre_name" => "Cartoon"],
            ["genre_name" => "Adult"],
            ["genre_name" => "Romance"],
        ];

        DB::table('genres')->insert($genres);
    }
}
