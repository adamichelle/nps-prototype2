@extends('layouts.staff')

@section('header-title')

Assign {{ $student->first_name.' '.$student->last_name }} to placement

@endsection


@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<form action="{{ route('staff.placements.store') }}" method='POST'>
    @csrf
    
    <input type="hidden" name="student_id" value="{{ $student->id }}" />
    <div class="form-row">
        <div class="col">
            <label for="firstName">First Name</label>
            <input type="text" class="form-control" id="firstName" value="{{ $student->first_name }}" readonly />
        </div>
        <div class="col">
            <label for="lastName">Last Name</label>
            <input type="text" class="form-control" id="lastName" value="{{ $student->last_name }}" readonly />
        </div>
    </div>
    
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
        <select class="form-control" id="setting" 
            value="{{ old('setting') }}" 
            required
        >
        <option value="" >Select a setting</option>
        <option value="hospital">Hospital</option>
        <option value="community" disabled>Community</option>
        </select>
    </div>
    <div class="form-group">
        <label for="unit">Unit</label>
        <select class="form-control" id="unit"
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
    </div>
    <div class="form-group">
        <label for="placementOpportunity">Placement Location</label>
        <select class="form-control @error('placement_opportunity_id') is-invalid @enderror" id="placementOpportunity" name="placement_opportunity_id" 
            value="{{ old('placement_opportunity_id') }}" 
            required
        >
            <option value="" >Select an placement location</option>
        
        </select>
        @error('placement_opportunity_id')
            <div class="validation-message invalid-feedback">
                {{ $errors->first('placement_opportunity_id') }}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="days">Days</label>
        <div id="days">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="days1" name="days[]" value="Monday">
                <label class="form-check-label" for="days1">Monday</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="days2" name="days[]" value="Tuesday">
                <label class="form-check-label" for="days2">Tuesday</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="days3" name="days[]" value="Wednesday">
                <label class="form-check-label" for="days3">Wednesday</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="days4" name="days[]" value="Thursday">
                <label class="form-check-label" for="days4">Thursday</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="days5" name="days[]" value="Friday">
                <label class="form-check-label" for="days5">Friday</label>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <label for="setting">Shift</label>
        <select class="form-control @error('shift') is-invalid @enderror" id="setting" 
            value="{{ old('setting') }}" 
            required
        >
            <option value="" >Select a shift</option>
            <option value="day">Day</option>
            <option value="afternoon">Afternoon</option>
        </select>
        @error('shift')
            <div class="validation-message invalid-feedback">
                {{ $errors->first('shift') }}
            </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary mb-2">Assign Student</button>
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

      });
    })
  }
   
</script>

@endsection