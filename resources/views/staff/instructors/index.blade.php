@extends('layouts.staff')

@section('header-title')

All Instructors

@endsection


@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif


<div class="row">
    <p class="ml-auto"><a class="btn btn-primary" href="{{ route('staff.instructors.create') }}">Add Instructor</a></p>
</div>

<div class="table-responsive-md">
  <table class="table">
    <thead class="thead-light">
        <tr>
            <th>First Name</td>
            <th>Last Name</td>
            <th>Email</td>
            <th>Specialty</td>
            <th>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($instructors as $instructor)
            <tr>
                <td>{{ $instructor->first_name }}</td>
                <td>{{ $instructor->last_name }}</td>
                <td>{{ $instructor->email }}</td>
                <td>{{ $instructor->specialty }}</td>
                <td>
                    <a class="btn btn-outline-primary" href="{{ route('staff.instructors.show', $instructor) }}">View</a>
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot></tfoot>
  </table>
</div>


@endsection