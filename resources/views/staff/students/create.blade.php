@extends('layouts.staff')

@section('header-title')

Add a Student

@endsection

@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<form action="{{ route('staff.students.store') }}" method='POST'>
    @csrf

  <div class="form-group">
    <label for="firstName">First Name</label>
    <input 
        type="text" 
        class="form-control @error('first_name') is-invalid @enderror" 
        id="firstName" 
        name="first_name" 
        placeholder="Jane" 
        value="{{ old('first_name') }}"
        required
    />
    @error('first_name')
        <div class="validation-message invalid-feedback">
            {{ $errors->first('first_name') }}
        </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="lastName">Last Name</label>
    <input 
        type="text" 
        class="form-control @error('last_name') is-invalid @enderror" 
        id="lastName" 
        name="last_name" 
        placeholder="Doe" 
        value="{{ old('last_name') }}"
        required />

    @error('last_name')
        <div class="validation-message invalid-feedback">
            {{ $errors->first('last_name') }}
        </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="studentId">Student ID</label>
    <input 
        type="number" 
        class="form-control @error('student_id') is-invalid @enderror" 
        id="studentId" 
        name="student_id" 
        placeholder="110023456"
        value="{{ old('student_id') }}"
        required />

    @error('student_id')
        <div class="validation-message invalid-feedback">
            {{ $errors->first('student_id') }}
        </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input 
        type="email" 
        class="form-control @error('email') is-invalid @enderror" 
        id="email" 
        name="email" 
        placeholder="name@example.com"
        value="{{ old('email') }}"
        required />
    @error('email')
        <div class="validation-message invalid-feedback">
            {{ $errors->first('email') }}
        </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="year">Year</label>
    <select class="form-control @error('year') is-invalid @enderror" id="year" name="year" 
        value="{{ old('year') }}" 
        required
    >
      <option value="1">Year 1</option>
      <option value="2">Year 2</option>
      <option value="3">Year 3</option>
      <option value="4">Year 4</option>
    </select>
    @error('year')
        <div class="validation-message invalid-feedback">
            {{ $errors->first('year') }}
        </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="school">School</label>
    <select class="form-control @error('school') is-invalid @enderror" id="school" name="school" 
        value="{{ old('year') }}"
        required
    >
      <option value="University of Windsor">University of Windsor</option>
      <option value="Sinclair">Sinclair</option>
    </select>
    @error('school')
        <div class="validation-message invalid-feedback">
            {{ $errors->first('school') }}
        </div>
    @enderror
  </div>
  
  <button type="submit" class="btn btn-primary mb-2">Add Student</button>
</form>


@endsection