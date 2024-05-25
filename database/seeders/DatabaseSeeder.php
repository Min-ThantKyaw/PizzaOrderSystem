<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'min553238@gmail.com',
            'phone' => '09969301467',
            'address' => 'Kanbalu',
            'role' => 'admin',
            'password' => Hash::make('admin1234'),
        ]);
    }
}
