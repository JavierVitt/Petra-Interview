<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID'); // Create Indonesian locale faker

        for ($i = 0; $i < 50; $i++) {
            User::create([
                'name' => $faker->name(),
                'email' => sprintf('c1421%04d@john.petra.ac.id', $i),
                'password' => Hash::make('password'),
                'role' => 0,
                'birth_date' => $faker->date('Y-m-d', '2000-01-01'),
                'profile_picture' => null,
                'email_verified_at' => now()
            ]);
        }
    }
}