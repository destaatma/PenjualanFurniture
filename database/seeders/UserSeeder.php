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
            'nama' => 'desta',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'telpon' => '1234566667',
            'alamat' => 'pacitan',
        ]);
        User::create([
            'role_id' => 2,
            'nama' => 'desta',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user'),
            'telpon' => '1234566667',
            'alamat' => 'pacitan',
        ]);
        User::create([
            'role_id' => 3,
            'nama' => 'desta',
            'email' => 'operator@gmail.com',
            'password' => bcrypt('admin'),
            'telpon' => '1234566667',
            'alamat' => 'pacitan',
        ]);
    }
}
