<!-- Fixed Bottom News Bar -->
<div x-data="{ open: true }" x-show="open" x-transition
    class=" inset-x-0 z-50 bg-gradient-to-r from-blue-700 via-indigo-600 to-blue-700 text-white">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row  items-center gap-4 px-4 py-3  ">
        <!-- Label -->
        <span class="shrink-0 bg-yellow-400 text-black text-sm font-semibold px-3 py-1 rounded">
            Latest News
        </span>
        <!-- Marquee -->
        <div class="overflow-hidden flex-1">
            <div class="flex gap-4 animate-marquee whitespace-nowrap text-sm md:text-base items-center">
                @foreach ($latestNews as $item)
                    @php
                        // Define "NEW" = within last 7 days
                        $isNew = $item->created_at->greaterThan(now()->subDays(7));
                    @endphp

                    <h2 class="text-yellow-400"> 📢 {{ $item->title }} @if ($isNew)
                            <span class="bg-red-600 text-white text-[10px] px-2 py-0.5 rounded-full animate-pulse">
                                NEW
                            </span>
                        @endif
                    </h2>

                    <i class="fa-regular fa-calendar-days"></i> {{ $item->created_at->format('d M Y') }}
                    <p class="text-white text-sm">
                        {{ Str::limit($item->description, 100) }}</p>
                    @if ($item->pdf)
                        <a href="{{ asset('storage/' . $item->pdf) }}" target="_blank"
                            class="flex items-center gap-1 bg-yellow-400 text-black text-[10px] px-2 py-0.5  animate-pulse rounded">
                            PDF <i class="fa-solid fa-download"></i>

                        </a>
                    @endif
                    <a href="{{ route('public.news') }}" class="text-yellow-300 text-sm hover:underline">
                        Read More →
                    </a>
                @endforeach
            </div>
        </div>
        <!-- Close Button -->
        {{-- <button @click="open = false" class="text-white hover:text-yellow-300 text-xl leading-none" aria-label="Close">
            &times;
        </button> --}}
    </div>
</div>