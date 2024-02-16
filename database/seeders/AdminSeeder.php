<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    private static $password;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     $User=  User::create([
        'name' => 'admin',
        'email' => 'admin@admin.gmail.com',
        'image'=>'public\userimages\Rd6BGi4RYWwdzFqV3WJtYcJeXMsHDrdhAiAMBfn1.png',
        'email_verified_at' => now(),

        'password' => static::$password ??= Hash::make('password'),
       ]);
       $User->assignRole('Admin');
    }
}
