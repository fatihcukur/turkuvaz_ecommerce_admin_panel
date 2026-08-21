<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'user_title' => 'Admin_Administrator',
            'username' => 'admin',
            'password' => Hash::make('admin123'),   
        ]);

        foreach (range(1, 10) as $i) {
            User::create([
                'user_title' => "User $i",
                'username' => "user$i",
                'password' => Hash::make('user123'),
            ]);
        }
    }
}
