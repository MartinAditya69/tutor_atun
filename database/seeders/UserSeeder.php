<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make(123456);
        User::insert([[
            'name' => 'Martin',
            'role' => 'admin',
            'password' => $password,
            'email' => 'martin@unika.ac.id'
        ],[
            'name' => 'Atun',
            'role' => 'user',
            'password' => $password,
            'email' => 'atun@unika.ac.id'
        ]]);
    }
}
