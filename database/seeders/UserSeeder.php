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
        User::insert([
            [
                'name' => 'Daniel',
                'email' => 'daniel@daniel',
                'password' => Hash::make('12345678'),
                'created_at' => now()
            ],
            [
                'name' => 'Ruth',
                'email' => 'ruth@ruth',
                'password' => Hash::make('12345678'),
                'created_at' => now()
            ],
            [
                'name' => 'Lucas',
                'email' => 'lucas@lucas',
                'password' => Hash::make('12345678'),
                'created_at' => now()
            ],
            [
                'name' => 'Paulo',
                'email' => 'paulo@paulo',
                'password' => Hash::make('12345678'),
                'created_at' => now()
            ],
        ]);
    }
}
