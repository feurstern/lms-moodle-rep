<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
                "name" => "Hatsune Miku ",
                "email" => "mikumiku.de@gmail.com",
                "password" => "miku123"
            ]
        );
    }
}
