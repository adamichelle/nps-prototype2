@extends('layouts.staff')

@section('header-title')

All Students

@endsection


@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif


<div class="row">
    <p class="ml-auto"><a class="btn btn-primary" href="{{ route('staff.students.create') }}">Add Student</a></p>
</div>

<div class="table-responsive-md">
  <table class="table">
    <thead class="thead-light">
        <tr>
            <th>First Name</td>
            <th>Last Name</td>
            <th>Student ID</td>
            <th>Year</td>
            <th>Email</td>
            <th>School</td>
            <th>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
            <tr>
                <td>{{ $student->first_name }}</td>
                <td>{{ $student->last_name }}</td>
                <td>{{ $student->student_id }}</td>
                <td>{{ $student->year }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->school }}</td>
                <td>
                    <a class="btn btn-outline-primary" href="{{ route('staff.students.show', $student) }}">View</a>
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot></tfoot>
  </table>
</div>


@endsection