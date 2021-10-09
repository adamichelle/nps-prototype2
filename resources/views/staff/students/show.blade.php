@extends('layouts.staff')

@section('header-title')

{{ $student->first_name.' '.$student->last_name }}

@endsection


@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<div class="row">
    <p class="ml-auto"><a class="btn btn-primary" href="{{ route('staff.placements.create', $student) }}">Assign to Placement</a></p>
</div>

<div>
    <p>{{ $student->first_name }}</p>
    <p>{{ $student->last_name }}</p>
    <p>{{ $student->student_id }}</p>
    <p>{{ $student->year }}</p>
    <p>{{ $student->email }}</p>
    <p>{{ $student->school }}</p>
</div>

@endsection