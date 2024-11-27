<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $role_user = Role::create([
            'name' => 'Пользователь',
            'code' => 'user',
        ]);
        $role_admin = Role::create([
            'name' => 'Администратор',
            'code' => 'admin',
        ]);
    }
}
