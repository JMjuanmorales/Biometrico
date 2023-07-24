<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Program;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $groupNumbers = [1, 2, 3, 4, 5];

        $programs = Program::all();

        foreach ($programs as $program) {
            foreach ($groupNumbers as $groupNumber) {
                Group::create([
                    'program_id' => $program->id,
                    'number' => $groupNumber,
                ]);
            }
        }
    }
}
