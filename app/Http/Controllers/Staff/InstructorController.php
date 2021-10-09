<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Instructor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instructors = Instructor::orderBy('last_name')->get();
        return View('staff.instructors.index', [
            'instructors' => $instructors,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('staff.instructors.create');
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
            'specialty' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()
                    ->route('staff.students.create')
                    ->withErrors($validator)
                    ->withInput();
        }

        $validated = $validator->valid();
        $instructor_user_data = [
            'name' => $validated['first_name'].' '.$validated['last_name'],
            'email' => $validated['email'],
        ];

        $user = $this->createUserAccount($instructor_user_data);

        if($user->id) {
            Instructor::create([
                'user_id' => $user->id,
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'specialty' => $validated['specialty'],
            ]);
    
            return redirect()->route('staff.instructors');
        } else {
            return redirect()
                ->route('staff.instructors.create')
                ->with('status', 'An error occured!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function show(Instructor $instructor)
    {
        $instructor = Instructor::find($instructor->id);
        return View('staff.instructors.show', [
            'instructor' => $instructor
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function edit(Instructor $instructor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instructor $instructor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instructor $instructor)
    {
        //
    }
    
    public function get_by_specialty(Request $request)
    {
        $specialty = $request->query('specialty');
        if (Instructor::where('specialty', $specialty)->exists()) {
            return Instructor::where('specialty', $specialty)->get();
        } else {
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
    }

    protected function createUserAccount($data) {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'user_type' => 'instructor',
            'password' => Hash::make('123456789'),
        ]);
    }
}
