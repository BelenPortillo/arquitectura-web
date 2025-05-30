<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $admin = User::create([
            'name' => 'Belen Portillo',
            'email' => 'admin@task.com',
            'password' => bcrypt('password'),
        ]);

        $admin->assignRole('administrador');
    }
}
