@extends('layouts.staff')

@section('header-title')

{{ $site->name }}

@endsection


@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<div>
    <p>{{ $site->name }}</p>
    <p>{{ $site->address }}</p>
</div>

@endsection