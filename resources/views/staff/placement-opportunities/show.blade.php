@extends('layouts.staff')

@section('header-title')

Opportunity at ...

@endsection


@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<div>
</div>

@endsection