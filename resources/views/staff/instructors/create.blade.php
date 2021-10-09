@extends('layouts.staff')

@section('header-title')

Add an Instructor

@endsection

@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<form action="{{ route('staff.instructors.store') }}" method='POST'>
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
    <label for="year">Specialty</label>
    <select class="form-control @error('specialty') is-invalid @enderror" id="specialty" name="specialty" 
        value="{{ old('year') }}" 
        required
    >
      <option value="surgical">Surgical</option>
      <option value="pediatrics">Pediatrics</option>
      <option value="obstetrics">Obstetrics</option>
      <option value="telemetry">Telemetry</option>
    </select>
    @error('specialty')
        <div class="validation-message invalid-feedback">
            {{ $errors->first('specialty') }}
        </div>
    @enderror
  </div>
  
  <button type="submit" class="btn btn-primary mb-2">Add Instructor</button>
</form>


@endsection