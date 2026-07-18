<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'nama' => 'Administrator',
            'email' => 'admin@sttp.ac.id',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);
    }
}