<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $programs = [
            'Tecnologo en analisis y desarrollo de software',
            'Electrónica',
            'Administración',
            // Agrega los programas que desees aquí
        ];

        foreach ($programs as $programName) {
            Program::create([
                'name' => $programName,
            ]);
        }
    }
}
