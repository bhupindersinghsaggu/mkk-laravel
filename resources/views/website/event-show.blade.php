@extends('layouts.app')

@section('title', $event->title)

@section('content')
<div class="max-w-5xl mx-auto px-4 py-10">

    <!-- Badge -->
    <span class="inline-block mb-3 px-4 py-1 text-sm font-semibold rounded-full
        {{ $event->type === 'achievement'
            ? 'bg-green-600 text-white'
            : 'bg-blue-600 text-white' }}">
        {{ ucfirst($event->type) }}
    </span>

    <!-- Title -->
    <h1 class="text-3xl md:text-4xl font-bold mb-3">
        {{ $event->title }}
    </h1>

    <!-- Date -->
    <p class="text-gray-500 mb-6">
        📅 {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}
    </p>

    <!-- Image -->
    <div class="mb-8">
        <img src="{{ asset('storage/' . $event->image) }}"
             alt="{{ $event->title }}"
             class="w-50 rounded-lg shadow">
    </div>

    <!-- Description -->
    <div class="prose max-w-none">
        {!! $event->description !!}
    </div>

    <!-- Button -->
    @if($event->button_link)
        <div class="mt-8">
            <a href="{{ $event->button_link }}"
               target="_blank"
               class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-semibold transition">
                View Photos →
            </a>
        </div>
    @endif

</div>
@endsection
