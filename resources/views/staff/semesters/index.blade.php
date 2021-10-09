@extends('layouts.staff')

@section('header-title')

All Semesters

@endsection


@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif


<div class="row">
    <p class="ml-auto"><a class="btn btn-primary" href="{{ route('staff.semesters.create') }}">Add Semester</a></p>
</div>

<div class="table-responsive-md">
  <table class="table">
    <thead class="thead-light">
        <tr>
            <th>Name</td>
            <th>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($semesters as $semester)
            <tr>
                <td>{{ $semester->name }}</td>
                <td>
                    <a class="btn btn-outline-primary" href="{{ route('staff.semesters.show', $semester) }}">View</a>
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot></tfoot>
  </table>
</div>


@endsection