<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Placement;
use App\Student;
use App\Semester;
use Illuminate\Http\Request;

class PlacementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Student $student)
    {
        $student = Student::findOrFail($student->id);
        $semesters = Semester::all();
        
        return View('staff.placements.create', [
            'student' => $student,
            'semesters' => $semesters
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Placement  $placement
     * @return \Illuminate\Http\Response
     */
    public function show(Placement $placement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Placement  $placement
     * @return \Illuminate\Http\Response
     */
    public function edit(Placement $placement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Placement  $placement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Placement $placement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Placement  $placement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Placement $placement)
    {
        //
    }
}
