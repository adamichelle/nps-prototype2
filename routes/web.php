<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', 'Student\HomeController@index')->middleware('user_type:student')->name('home');
Route::get('/admin', 'Admin\DashboardController@index')->middleware('user_type:admin')->name('admin.dashboard');

Route::get('/staff', 'Staff\DashboardController@index')->middleware('user_type:staff')->name('staff.dashboard');
Route::get('/staff/students', 'Staff\StudentController@index')->middleware('user_type:staff')->name('staff.students');
Route::get('/staff/students/create', 'Staff\StudentController@create')->middleware('user_type:staff')->name('staff.students.create');
Route::post('/staff/students/', 'Staff\StudentController@store')->middleware('user_type:staff')->name('staff.students.store');
Route::get('/staff/students/{student}', 'Staff\StudentController@show')->middleware('user_type:staff')->name('staff.students.show');


Route::get('/staff/instructors', 'Staff\InstructorController@index')->middleware('user_type:staff')->name('staff.instructors');
Route::get('/staff/instructors/get-by-specialty', 'Staff\InstructorController@get_by_specialty')->middleware('user_type:staff')->name('staff.instructors.get-by-specialty');
Route::get('/staff/instructors/create', 'Staff\InstructorController@create')->middleware('user_type:staff')->name('staff.instructors.create');
Route::post('/staff/instructors/', 'Staff\InstructorController@store')->middleware('user_type:staff')->name('staff.instructors.store');
Route::get('/staff/instructors/{instructor}', 'Staff\InstructorController@show')->middleware('user_type:staff')->name('staff.instructors.show');

Route::get('/staff/sites', 'Staff\SiteController@index')->middleware('user_type:staff')->name('staff.sites');
Route::get('/staff/sites/create', 'Staff\SiteController@create')->middleware('user_type:staff')->name('staff.sites.create');
Route::post('/staff/sites/', 'Staff\SiteController@store')->middleware('user_type:staff')->name('staff.sites.store');
Route::get('/staff/sites/{site}', 'Staff\SiteController@show')->middleware('user_type:staff')->name('staff.sites.show');


Route::get('/staff/semesters', 'Staff\SemesterController@index')->middleware('user_type:staff')->name('staff.semesters');
Route::get('/staff/semesters/create', 'Staff\SemesterController@create')->middleware('user_type:staff')->name('staff.semesters.create');
Route::post('/staff/semesters/', 'Staff\SemesterController@store')->middleware('user_type:staff')->name('staff.semesters.store');
Route::get('/staff/semesters/{semester}', 'Staff\SemesterController@show')->middleware('user_type:staff')->name('staff.semesters.show');


Route::get('/staff/placement-opportunities', 'Staff\PlacementOpportunityController@index')->middleware('user_type:staff')->name('staff.placement-opportunities');
Route::get('/staff/placement-opportunities/create', 'Staff\PlacementOpportunityController@create')->middleware('user_type:staff')->name('staff.placement-opportunities.create');
Route::post('/staff/placement-opportunities/', 'Staff\PlacementOpportunityController@store')->middleware('user_type:staff')->name('staff.placement-opportunities.store');
Route::get('/staff/placement-opportunities/{placement-opportunity}', 'Staff\PlacementOpportunityController@show')->middleware('user_type:staff')->name('staff.placement-opportunities.show');


Route::get('/staff/placements/create/{student}', 'Staff\PlacementController@create')->middleware('user_type:staff')->name('staff.placements.create');
Route::post('/staff/placements/', 'Staff\PlacementController@store')->middleware('user_type:staff')->name('staff.placements.store');

Route::get('/instructor', 'Instructor\DashboardController@index')->middleware('user_type:instructor')->name('instructor.dashboard');
