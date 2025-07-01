<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'role_id' => 1,
            'nama' => 'Desta Atma Herdinnata',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('desta1234'),
            'telpon' => '',
        ]);
        User::create([
            'role_id' => 2,
            'nama' => 'Desta Atma',
            'email' => 'destaatma863@gmail.com',
            'password' => bcrypt('desta1234'),
            'telpon' => '087860352236',
        ]);
    }
}
