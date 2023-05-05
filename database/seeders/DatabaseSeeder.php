<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            'full_name' => 'Aku User',
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
            'role' => 2,
            'is_active' => 1,
            'created_at' => now(),
        ]);
    }
}
