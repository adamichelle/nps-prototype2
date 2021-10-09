<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::orderBy('last_name')->get();
        return View('staff.students.index', [
            'students' => $students,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('staff.students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'student_id' => 'required|digits:9|unique:students',
            'year' => 'required',
            'school' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()
                    ->route('staff.students.create')
                    ->withErrors($validator)
                    ->withInput();
        }

        $validated = $validator->valid();
        $student_user_data = [
            'name' => $validated['first_name'].' '.$validated['last_name'],
            'email' => $validated['email'],
        ];

        $user = $this->createUserAccount($student_user_data);

        if($user->id) {
            Student::create([
                'user_id' => $user->id,
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'student_id' => $validated['student_id'],
                'year' => $validated['year'],
                'school' => $validated['school'],
            ]);
    
            return redirect()->route('staff.students');
        } else {
            return redirect()
                ->route('staff.students.create')
                ->with('status', 'An error occured!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $student = Student::find($student->id);
        return View('staff.students.show', [
            'student' => $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }

    protected function createUserAccount($data) {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'user_type' => 3,
            'password' => Hash::make('123456789'),
        ]);
    }
}
