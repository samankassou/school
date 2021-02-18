<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AcademicYearResource;
use App\Models\AcademicYear;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AcademicYearResource::collection(AcademicYear::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $academicYear = new AcademicYear;
        $academicYear->start_date = $request->start_date;
        $academicYear->end_date = $request->end_date;
        $start_year = Carbon::parse($request->start_date)->year;
        $end_year = Carbon::parse($request->end_date)->year;
        $academicYear->name = $start_year.'/'.$end_year;
        $academicYear->save();
        return response()->json([
            'message' => 'Academic year created successfuly!',
            'data' => $academicYear
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AcademicYear  $academicYear
     * @return \Illuminate\Http\Response
     */
    public function show(AcademicYear $academicYear)
    {
        return new AcademicYearResource($academicYear);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AcademicYear  $academicYear
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AcademicYear $academicYear)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AcademicYear  $academicYear
     * @return \Illuminate\Http\Response
     */
    public function destroy(AcademicYear $academicYear)
    {
        $academicYear->Classrooms()->delete();
        $academicYear->delete();
        return response()->json([
            'message' => 'Academic Year deleted!',
        ]);
    }
}
