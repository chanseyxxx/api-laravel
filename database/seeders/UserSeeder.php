<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::where('email', 'brenda@gmail.com')->first()) {
            User::create([
                'name' => 'Brenda',
                'email' => 'brenda@gmail.com',
                'password' => Hash::make('123456a', ['rounds' => 12]),
            ]);
        }
        if (!User::where('email', 'ana@gmail.com')->first()) {
            User::create([
                'name' => 'Ana',
                'email' => 'ana@gmail.com',
                'password' => Hash::make('123456a', ['rounds' => 12]),
            ]);
        }
        if (!User::where('email', 'denner@gmail.com')->first()) {
            User::create([
                'name' => 'Denner',
                'email' => 'denner@gmail.com',
                'password' => Hash::make('123456a', ['rounds' => 12]),
            ]);
        }
    }
}
