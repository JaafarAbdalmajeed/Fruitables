<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'Jaafar Alwahsh',
            'email' => 'jaafar@gmail.com',
            'password' => 'password',
            'role' => 'super admin'
        ]);
        User::create([
            'name' => 'Ahmad Alwahsh',
            'email' => 'ahmad@gmail.com',
            'password' => 'password',
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'Ammar Alwahsh',
            'email' => 'ammar@gmail.com',
            'password' => 'password',
            'role' => 'customer'
        ]);
    }
}
