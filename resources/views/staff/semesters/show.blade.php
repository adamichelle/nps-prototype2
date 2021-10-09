@extends('layouts.staff')

@section('header-title')

{{ $semester->name }}

@endsection


@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<div>
    <p>{{ $semester->name }}</p>
</div>

@endsection