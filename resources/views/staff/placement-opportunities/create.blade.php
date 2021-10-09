@extends('layouts.staff')

@section('header-title')

Add a placement opportunity

@endsection

@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<form action="{{ route('staff.placement-opportunities.store') }}" method='POST'>
    @csrf

  <div class="form-group">
    <label for="semester">Semester</label>
    <select class="form-control @error('semester_id') is-invalid @enderror" id="semester" name="semester_id" 
        value="{{ old('semester_id') }}" 
        required
    >
      <option value="" >Select a semester</option>
      @foreach ($semesters as $semester)
        <option value="{{ $semester->id }}">{{ $semester->name }}</option>
      @endforeach
    </select>
    @error('semester_id')
        <div class="validation-message invalid-feedback">
            {{ $errors->first('semester_id') }}
        </div>
    @enderror
  </div>
  
  <div class="form-group">
    <label for="setting">Setting</label>
    <select class="form-control @error('setting') is-invalid @enderror" id="setting" name="setting" 
        value="{{ old('setting') }}" 
        required
    >
      <option value="" >Select a setting</option>
      <option value="hospital">Hospital</option>
      <option value="community" disabled>Community</option>
    </select>
    @error('setting')
        <div class="validation-message invalid-feedback">
            {{ $errors->first('setting') }}
        </div>
    @enderror
  </div>

  <div class="form-group">
    <label for="site">Site</label>
    <select class="form-control @error('site_id') is-invalid @enderror" id="site" name="site_id" 
        value="{{ old('site_id') }}" 
        required
    >
      <option value="" >Select a site</option>
      @foreach ($sites as $site)
        <option value="{{ $site->id }}">{{ $site->name }}</option>
      @endforeach
    </select>
    @error('site_id')
        <div class="validation-message invalid-feedback">
            {{ $errors->first('site_id') }}
        </div>
    @enderror
  </div>
  
  <div class="form-group">
    <label for="unit">Unit</label>
    <select class="form-control @error('unit') is-invalid @enderror" id="unit" name="unit" 
        value="{{ old('unit') }}" 
        required
    >
      <option value="">Choose a unit</option>
      <option value="surgical">Surgical</option>
      <option value="pediatrics">Pediatrics</option>
      <option value="obstetrics">Obstetrics</option>
      <option value="telemetry">Telemetry</option>
    </select>
    <div class="invalid-feedback" id="fetchError">
    </div>
    @error('unit')
        <div class="validation-message invalid-feedback">
            {{ $errors->first('unit') }}
        </div>
    @enderror
  </div>

  <div class="form-group">
    <label for="instructor">Instructor</label>
    <select class="form-control @error('instructor_id') is-invalid @enderror" id="instructor" name="instructor_id" 
        value="{{ old('instructor_id') }}" 
        required
    >
      <option value="" >Select an instructor</option>
      
    </select>
    @error('instructor_id')
        <div class="validation-message invalid-feedback">
            {{ $errors->first('instructor_id') }}
        </div>
    @enderror
  </div>

  <div class="form-group">
    <label for="numberOfStudents">Number of Students</label>
    <input 
        type="number" 
        class="form-control @error('number_of_students') is-invalid @enderror" 
        id="numberOfStudents" 
        name="number_of_students" 
        placeholder="5"
        value="{{ old('number_of_students') }}"
        required />

    @error('number_of_students')
        <div class="validation-message invalid-feedback">
            {{ $errors->first('number_of_students') }}
        </div>
    @enderror
  </div>

  <button type="submit" class="btn btn-primary mb-2">Add Placement Opportunity</button>
</form>


@endsection

@section('scripts')

<script type='text/javascript'>
  window.onload = function () {
    $(document).ready(function () {
      $('select[name="unit"]').on('change', function() {
        $('#fetchError').text('');
        $('#fetchError').css("display", "none");

        var unit = $(this).val();

        if(unit) {
          fetch('/staff/instructors/get-by-specialty?specialty=' + unit)
            .then((res) => {
              if(res.status === 200) {
                return res.json();
              } else {
                return res;
              }
            })
            .then((data) => {
              if(data.status) {
                $('#fetchError').css("display", "block");
                $('#fetchError').text('Unable to get the list of instructors. The following error occured: ' + data.statusText)
              } else {
                $('select[name="instructor_id"]').empty();
                $('select[name="instructor_id"]').append('<option value=""> Select an instructor </option>');
                data.forEach( function (instructor) {
                  $('select[name="instructor_id"]').append('<option value="'+ instructor.id +'">'+ instructor.first_name + ' ' + instructor.last_name +'</option>');
                })
              }
            })
            .catch((err) => {
                $('#fetchError').css("display", "block");
                $('#fetchError').text('Unable to get the list of instructors. The following error occured: ' + err.message)
            })
        } else {
          $('select[name="instructor"]').empty();
        }
      });
    })
  }
   
</script>

@endsection