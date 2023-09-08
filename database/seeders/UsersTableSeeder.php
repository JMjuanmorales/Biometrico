<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $instructorRole = Role::firstOrCreate(['name' => 'instructor']);
        $studentRole = Role::firstOrCreate(['name' => 'aprendiz']);

        // Crear usuario administrador
        $adminUser = User::create([
            'name' => 'Admin',
            'last_name' => 'Perez',
            'email' => 'admin@example.com',
            'document_type' => 'CC',
            'document' => "999999999",
            'password' => Hash::make('123456789'),
        ]);
        $adminUser->roles()->attach($adminRole->id);

        
    }
}

