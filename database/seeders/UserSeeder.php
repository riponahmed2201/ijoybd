<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'phone' => '1234567890',
                'address' => 'Admin Office, 123 Main St, City, Country',
                'role' => 'admin',
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane.smith@gmail.com',
                'password' => Hash::make('password'),
                'phone' => '5678901234',
                'address' => '456 Oak St, City, Country',
                'role' => 'customer',
            ],
            [
                'name' => 'John Doe',
                'email' => 'john.doe@gmail.com',
                'password' => Hash::make('password'),
                'phone' => '9876543210',
                'address' => '123 Elm St, Suburb, Country',
                'role' => 'customer',
            ]
        ];

        User::insert($users);
    }
}
