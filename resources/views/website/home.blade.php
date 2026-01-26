@extends('layouts.app')

@section('title', 'Home')

@section('content')

@include('partials.hero')

@include('partials.latestnews')

@include('partials.about-home')

@include('partials.facilities')

@include('partials.admission-open')

@include('partials.school-achievements', [
    'latestEvents' => $latestEvents
])

@include('partials.student-corner')

@endsection
