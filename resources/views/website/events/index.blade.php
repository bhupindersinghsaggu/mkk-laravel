@extends('layouts.app')

@section('title', 'All Events & Achievements')

@section('content')

    <section class="max-w-7xl mx-auto px-4 py-10 md:px-12 lg:py-20">
        <h1 class="text-center text-4xl font-semibold mb-12">
            All Events & Achievements
        </h1>

        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($events as $event)
                <div class="bg-white shadow rounded overflow-hidden">
                    <img src="{{ asset('storage/' . $event->image) }}" class="h-48 w-full object-cover">

                    <div class="p-4">
                        <span
                            class="text-xs px-3 py-1 rounded-full {{ $event->type === 'achievement' ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700' }}">
                            {{ ucfirst($event->type) }}
                        </span>

                        <h3 class="font-semibold mt-2 mb-1">
                            {{ $event->title }}
                        </h3>

                        <p class="text-sm text-gray-500 mb-3">
                            {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}
                        </p>

                        <a href="{{ route('events.show', $event) }}"
                            class="inline-block text-sm text-blue-600 hover:underline">
                            View Details
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="mb-8">
            <a href="{{ route('home') }}"
                class="inline-block border border-blue-600 text-blue-600 px-6 py-2 rounded-lg hover:bg-blue-600 hover:text-white transition">
                ← Back to Home
            </a>
        </div>
        <!-- Pagination -->
        <div class="mt-10">
            {{ $events->links() }}
        </div>
    </section>
@endsection
