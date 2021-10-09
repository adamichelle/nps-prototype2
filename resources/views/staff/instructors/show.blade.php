@extends('layouts.staff')

@section('header-title')

{{ $instructor->first_name.' '.$instructor->last_name }}

@endsection


@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<div>
    <p>{{ $instructor->first_name }}</p>
    <p>{{ $instructor->last_name }}</p>
    <p>{{ $instructor->email }}</p>
    <p>{{ $instructor->specialty }}</p>
</div>

@endsection