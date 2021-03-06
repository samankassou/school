<?php

namespace App\Http\Controllers\Api;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Classroom;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return StudentResource::collection(Student::latest()->with(['classrooms'])->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        $student = new Student;
        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->dob = $request->dob;
        $student->place_of_birth = $request->place_of_birth;
        $student->gender = $request->gender;
        $student->mothers_name = $request->mothers_name;
        if($request->has('fathers_name')){
            $student->fathers_name = $request->fathers_name;
        }
        $classrooms = Classroom::find($request->classroom_id);
        $student->save();
        $student->classrooms()->save($classrooms);
        return $student;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return new  StudentResource($student->load('classrooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $student->update($request->all());
        if($request->has('classrooms')){
            $student->classrooms()->sync($request->classroms);
        }
        return response()->json([
            'message' => 'student updated successfully!',
            'data' => $student
        ]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->classrooms()->detach();
        $student->delete();
        return response()->json([
            'message' => 'student deleted successfully!'
        ]);
    }
}
