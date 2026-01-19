{{-- <section class="max-w-7xl mx-auto px-4 py-8 md:px-12  lg:py-16">
    <h2 class="text-center mb-10">
        <span class="px-4 py-2 inline-block text-3xl lg:text-5xl font-semibold">
            Events & Achievements
        </span>
    </h2>
    <div class="grid md:grid-cols-4 gap-6">
        @foreach ($events as $event)
            <div class="bg-white shadow rounded overflow-hidden">
                <img src="{{ asset('storage/' . $event->image) }}" class="h-120 w-full object-cover">

                <div class="p-4">
                    <span
                        class="text-xs px-3 py-1 rounded-full {{ $event->type === 'achievement' ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700' }}">
                        {{ ucfirst($event->type) }}
                    </span>
                    <h3 class="font-semibold mb-1">{{ $event->title }}</h3>
                    <p class="text-sm text-gray-500 mb-3">
                        {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}
                    </p>
                    <p class="text-sm text-gray-600 mb-3">
                        {{ Str::limit($event->description, 90) }}
                    </p>
                    @if ($event->button_link)
                        <a href="{{ route('events.show', $event) }}" target="_blank"
                            class="inline-block text-sm border border-blue-400 px-6 py-2 rounded-lg hover:bg-blue-600 hover:text-white transition ">
                            View More
                        </a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</section> --}}

<section class="max-w-7xl mx-auto px-4 py-8 md:px-12 lg:py-16">
    <h2 class="text-center mb-10">
        <span class="px-4 py-2 inline-block text-3xl lg:text-5xl font-semibold">
            Events & Achievements
        </span>
    </h2>

    <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-6">
        @foreach ($latestEvents as $event)
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

                    <p class="text-sm text-gray-600 mb-3">
                        {{ Str::limit($event->description, 90) }}
                    </p>

                    <a href="{{ route('events.show', $event) }}"
                        class="inline-block text-sm border border-blue-400 px-5 py-2 rounded-lg hover:bg-blue-600 hover:text-white transition">
                        View Details
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- VIEW ALL BUTTON -->
    <div class="text-center mt-10">
        <a href="{{ route('events.public') }}"
            class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition">
            View All Events
        </a>
    </div>
</section>
