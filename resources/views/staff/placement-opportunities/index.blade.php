@extends('layouts.staff')

@section('header-title')

All Placement Opportunities

@endsection


@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif


<div class="row">
    <p class="ml-auto"><a class="btn btn-primary" href="{{ route('staff.placement-opportunities.create') }}">Add Placement Opportunity</a></p>
</div>

<div class="table-responsive-md">
  <table class="table">
    <thead class="thead-light">
        <tr>
            <th>Site</th>
            <th>Instructor</th>
            <th>Setting</th>
            <th>Unit</th>
            <th>Semester</th>
            <th>Number of Opportunities</th>
            <th>Action<th>
        </tr>
    </thead>
    <tbody>
        @foreach ($placement_opportunities as $placement_opportunity)
            <tr>
                <td>{{ $placement_opportunity->site->name }}</td>
                <td>{{ $placement_opportunity->instructor->first_name.' '. $placement_opportunity->instructor->last_name }}</td>
                <td>{{ $placement_opportunity->setting }}</td>
                <td>{{ $placement_opportunity->unit }}</td>
                <td>{{ $placement_opportunity->semester->name }}</td>
                <td>{{ $placement_opportunity->number_of_students }}</td>
                <td>
                    <a class="btn btn-outline-primary" href="{{ route('staff.placement-opportunities.show', $placement_opportunity) }}">View</a>
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot></tfoot>
  </table>
</div>


@endsection