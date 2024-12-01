@extends('crm._layout')

@section('title', 'Dashboard')

@section('content')
    <h6 class="mb-4">
        Welcome, {{ auth()->user()->fullName }}
    </h6>

    <h2 class="mt-5 font-italic text-center opacity-5">
        Dashboard - Coming soon
    </h2>
@endsection
