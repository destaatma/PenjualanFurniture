<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::Create([
            'role' => 'user',
            'deskripsi' => 'ini untuk user',
        ]);

        Role::Create([
            'role' => 'admin',
            'deskripsi' => 'ini untuk admin',
        ]);

        Role::Create([
            'role' => 'operator',
            'deskripsi' => 'ini untuk operator',
        ]);
    }
}
