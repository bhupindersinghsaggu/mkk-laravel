<section class="max-w-7xl mx-auto px-4 py-8 md:px-12  lg:py-16">
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
</section>
