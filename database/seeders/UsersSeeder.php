<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        User::insert([
            'name' => 'Erwin Erick Ureña Inarra',
            'email' => 'ericksapiens@gmail.com',
            'password' => bcrypt('12345678'),
            'rol' => 'user',
        ]);
        User::insert([
            'name' => 'Evans Balcazar Veizaga',
            'email' => 'evansbv@gmail.com',
            'password' => bcrypt('12345678'),
            'rol' => 'user',
        ]);
    }
}
