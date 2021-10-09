@extends('layouts.staff')

@section('header-title')

Add an site

@endsection

@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<form action="{{ route('staff.sites.store') }}" method='POST'>
    @csrf

  <div class="form-group">
    <label for="name">Name</label>
    <input 
        type="text" 
        class="form-control @error('name') is-invalid @enderror" 
        id="name" 
        name="name" 
        placeholder="Jane" 
        value="{{ old('name') }}"
        required
    />
    @error('name')
        <div class="validation-message invalid-feedback">
            {{ $errors->first('name') }}
        </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input 
        type="text" 
        class="form-control @error('address') is-invalid @enderror" 
        id="address" 
        name="address" 
        placeholder="Doe" 
        value="{{ old('address') }}"
        required />

    @error('address')
        <div class="validation-message invalid-feedback">
            {{ $errors->first('address') }}
        </div>
    @enderror
  </div>
  
  <button type="submit" class="btn btn-primary mb-2">Add site</button>
</form>


@endsection