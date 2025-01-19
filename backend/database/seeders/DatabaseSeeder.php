<?php

namespace Database\Seeders;

use App\Models\Actor;
use App\Models\Blog;
use App\Models\Course;
use App\Models\Customer;
use App\Models\Director;
use App\Models\Movie;
use App\Models\Movies;
use App\Models\Product;
use App\Models\User;
use App\Models\UserProfile;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // Course::factory(10)->create();
        // Blog::factory(10)->create();
        // Product::factory(50)->create();

        // movies
        // Director::factory(30)->create();
        // Actor::factory(30)->create();
        // Movie::factory(40)->create();

        // $this->call([
        //     GenreSeeder::class
        // ]);
        // / end of movies

        Customer::factory(10)->create();
        
        // UserProfile::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $this->call(UserSeeder::class);
    }
}
