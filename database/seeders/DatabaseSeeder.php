<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'Erhan ÜRGÜN',
            'email' => 'urgun.js@gmail.com',
            'email_verified_at' => now(),
            'type' => 'admin',
            'password' => Hash::make('071109014'),
            'remember_token' => Str::random(10)
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Jiyan CENGİZ',
            'email' => 'jiyooo@gmail.com',
            'email_verified_at' => now(),
            'type' => 'user',
            'password' => Hash::make('Demo1234'),
            'remember_token' => Str::random(10)
        ]);

        \App\Models\User::factory(5)->create();
    }
}
