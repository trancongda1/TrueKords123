<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        // Inserts an initial admin user into the 'users' table
        DB::table('users')->insert([
            'name' => 'admin', // Admin username
            'email' => 'admin@gmail.com', // Admin email
            'password' => Hash::make('123123'), // Hashed password using Laravel's Hash facade
            'role' => 1 // Indicates the user is an admin (role 1, assuming roles are managed this way)
        ]);
    }
}
