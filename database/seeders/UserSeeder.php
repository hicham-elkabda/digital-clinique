<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'nom' => 'Elkabda',
            'prenom' => 'Hicham',
            'cin' => 'AB123456',
            'dateN' => '1990-01-01',
            'telephone' => '0612345678',
            'adresse' => '123 rue Exemple, Casablanca',
            'email' => 'hichamelkabda4@gmail.com',
            'role' => 'super-admin',
            'login' => 'hicham.elkabda',
            'password' => Hash::make('password'),
        ]);
    }
}
