<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\User;
use Database\Factories\MovieFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // $this->call([
        //     CategorySeeder::class,
        // ]);

        //  User::factory(5)->create();

         Movie::factory(10)->create();


        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


    }
}
