@extends('layouts.staff')

@section('header-title')

Add an semester

@endsection

@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<form action="{{ route('staff.semesters.store') }}" method='POST'>
    @csrf

  <div class="form-group">
    <label for="name">Name</label>
    <input 
        type="text" 
        class="form-control @error('name') is-invalid @enderror" 
        id="name" 
        name="name" 
        placeholder="Winter 2022" 
        value="{{ old('name') }}"
        required
    />
    @error('name')
        <div class="validation-message invalid-feedback">
            {{ $errors->first('name') }}
        </div>
    @enderror
  </div>
  
  <button type="submit" class="btn btn-primary mb-2">Add semester</button>
</form>


@endsection