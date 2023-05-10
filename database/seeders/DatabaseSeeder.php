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
            'full_name' => 'CV. INARA AGRONIAGA',
            'email' => 'example@mail.com',
            'password' => bcrypt('12345678'),
            'role_id' => 2,
            'is_active' => 'Y',
            'created_at' => now(),
        ]);
    }
}
