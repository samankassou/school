<?php

namespace Database\Seeders;

use App\Models\AcademicYear;
use App\Models\Classroom;
use App\Models\Cycle;
use App\Models\Level;
use App\Models\Post;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Post::factory(30)->create();
        $academicYear = AcademicYear::create([
            'name' => '2021/2022',
            'start_date' => Carbon::today(),
            'end_date' => Carbon::today()->addYear()
        ]);
        $firstCycle = Cycle::create([
            'name' => '1er Cycle'
        ]);
        $secondCycle = Cycle::create([
            'name' => '2nd Cycle'
        ]);
        Level::create([
            'name' => '6e',
            'cycle_id' => $firstCycle->id
        ])->classrooms()->create([
            'name' => '6e 1',
            'academic_year_id' => $academicYear->id
        ]);
        Level::create([
            'name' => '5e',
            'cycle_id' => $firstCycle->id
        ])->classrooms()->create([
            'name' => '5e 1',
            'academic_year_id' => $academicYear->id
        ]);
        Level::create([
            'name' => '4e',
            'cycle_id' => $firstCycle->id
        ])->classrooms()->create([
            'name' => '4e 1',
            'academic_year_id' => $academicYear->id
        ]);
        Level::create([
            'name' => '3e',
            'cycle_id' => $firstCycle->id
        ])->classrooms()->create([
            'name' => '3e 1',
            'academic_year_id' => $academicYear->id
        ]);
        Level::create([
            'name' => '2nde',
            'cycle_id' => $secondCycle->id
        ])->classrooms()->create([
            'name' => '2nde 1',
            'academic_year_id' => $academicYear->id
        ]);
        Level::create([
            'name' => '1ere',
            'cycle_id' => $secondCycle->id
        ])->classrooms()->create([
            'name' => '1ere 1',
            'academic_year_id' => $academicYear->id
        ]);
        Level::create([
            'name' => 'Tle',
            'cycle_id' => $secondCycle->id
        ])->classrooms()->create([
            'name' => 'Tle 1',
            'academic_year_id' => $academicYear->id
        ]);
        Student::factory(30)->create()->each(function($student){
            $student->classrooms()
            ->attach(Classroom::all()->random(1)->first());
        });


    }
}
