<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Request;
use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DefaultSeeder::class,
            UserSeeder::class,
        ]);

        // User::factory(15)->create();
        // Vacancy::factory(25)->create();
        // Request::factory(30)->create();
    }
}
