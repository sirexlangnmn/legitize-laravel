<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'John Lorenz Ruizo',
            'email' => 'imlorenzruizo@gmail.com',
            'password' => Hash::make('thequickbrownfox'),
            'status' => 'inactive'
        ])->assignRole('super-admin');

        User::create([
            'name' => 'Federex Potolin',
            'email' => 'potolin.federex@gmail.com',
            'password' => Hash::make('federexpotolin'),
            'status' => 'inactive'
        ])->assignRole('super-admin');
    }
}