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
        $studentRole = Role::firstOrCreate(['name' => 'student']);

        // Crear usuario administrador
        $adminUser = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('123456789'),
        ]);
        $adminUser->roles()->attach($adminRole->id);

        // Crear usuario instructor
        $instructorUser = User::create([
            'name' => 'Instructor',
            'email' => 'instructor@example.com',
            'password' => Hash::make('123456789'),
        ]);
        $instructorUser->roles()->attach($instructorRole->id);

        // Crear usuario estudiante
        $studentUser = User::create([
            'name' => 'Student',
            'email' => 'student@example.com',
            'password' => Hash::make('123456789'),
        ]);
        $studentUser->roles()->attach($studentRole->id);
    }
}

