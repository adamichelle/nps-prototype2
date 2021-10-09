@extends('layouts.staff')

@section('header-title')

All Sites

@endsection


@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif


<div class="row">
    <p class="ml-auto"><a class="btn btn-primary" href="{{ route('staff.sites.create') }}">Add Site</a></p>
</div>

<div class="table-responsive-md">
  <table class="table">
    <thead class="thead-light">
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sites as $site)
            <tr>
                <td>{{ $site->name }}</td>
                <td>{{ $site->address }}</td>
                <td>
                    <a class="btn btn-outline-primary" href="{{ route('staff.sites.show', $site) }}">View</a>
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot></tfoot>
  </table>
</div>


@endsection