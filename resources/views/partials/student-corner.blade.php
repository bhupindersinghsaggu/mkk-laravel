<div id="student-corner" class="flex flex-col gap-6  max-w-7xl mx-auto px-4 py-8 md:px-12  lg:py-16">
    <div class="">
        <h2 class="text-center font-semibold leading-tight py-8">
            <span class="inline-block  text-3xl md:text-5xl relative ">Student Corner
        </h2>
        <div class="grid grid-cols-1  gap-8 lg:grid-cols-4 md:grid-cols-2 py-4" id="product-card">
            <div id="product"
                class="rounded-lg border border-gray-200 bg-gradient-to-bl from-purple-700 via-indigo-600 to-blue-500 ">
                <div class="flex flex-col items-center py-8 px-8 lg:flex-col">
                    <div class="">
                        <div
                            class="text-center w-[108px] h-[108px] rounded-full bg-[#F3F6FF] mx-auto flex items-center justify-center">
                            <i class="fab fa-android icon-home text-5xl text-blue-600"></i>
                        </div>
                    </div>
                    <div>
                        <div class="py-4 px-4 text-center">
                            <h3 class="text-xl font text-white ">
                                School APP
                            </h3>
                        </div>
                        <div class="px-4 py-4 text-center">
                            <a href="#"
                                class="inline-flex items-center gap-2  border border-blue-400 text-white hover:bg-blue-500 hover:text-white transition  px-6 py-3 rounded font-medium ">
                                Click Here
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="product"
                class="rounded-lg border border-gray-200 bg-gradient-to-r from-emerald-600 via-teal-500 to-cyan-400">
                <div class="flex flex-col items-center py-8 px-8 lg:flex-col">
                    <div class="">
                        <div
                            class="text-center w-[108px] h-[108px] rounded-full bg-[#F3F6FF] mx-auto flex items-center justify-center">
                            <i class="fas fa-file-alt icon-home text-5xl text-blue-600"></i>
                        </div>
                    </div>
                    <div>
                        <div class="py-4 px-2 text-center">
                            <h3 class="text-xl font text-white ">
                                E-News Letter
                            </h3>
                        </div>
                        <div class="px-4 py-4 text-center">
                            <a href="e-news-letter.php"
                                class="inline-flex items-center gap-2 bg:white border border-white text-white hover:bg-emerald-400 hover:text-white transition  px-6 py-3 rounded font-medium ">
                                Click Here
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="product"
                class="rounded-lg border border-gray-200 bg-gradient-to-bl from-purple-700 via-indigo-600 to-blue-500 ">
                <div class="flex flex-col items-center py-8 px-8 lg:flex-col">
                    <div class="">
                        <div
                            class="text-center w-[108px] h-[108px] rounded-full bg-[#F3F6FF] mx-auto flex items-center justify-center">
                            <i class="fas fa-book icon-home text-5xl text-blue-600"></i>
                        </div>
                    </div>
                    <div>
                        <div class="py-4 px-4 text-center">
                            <h3 class="text-xl font text-white ">
                                Book List
                            </h3>
                        </div>
                        <div class="px-4 py-4 text-center">
                            <a href="#"
                                class="inline-flex items-center gap-2  border border-white text-white hover:bg-blue-500 hover:text-white transition  px-6 py-3 rounded font-medium ">
                                Click Here
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="product"
                class="rounded-lg border border-gray-200 bg-gradient-to-r from-emerald-600 via-teal-500 to-cyan-400">
                <div class="flex flex-col items-center py-8 px-8 lg:flex-col">
                    <div class="">
                        <div
                            class="text-center w-[108px] h-[108px] rounded-full bg-[#F3F6FF] mx-auto flex items-center justify-center">
                            <i class="fas fa-stream icon-home text-5xl text-blue-600"></i>
                        </div>
                    </div>
                    <div>
                        <div class="py-4 px-4 text-center">
                            <h3 class="text-xl font text-white ">
                                List of Holidays
                            </h3>
                        </div>
                        <div class="px-4 py-4 text-center">
                            <a href="list-of-holidays.php"
                                class="inline-flex items-center gap-2 bg:white border border-white text-white hover:bg-emerald-400 hover:text-white transition  px-6 py-3 rounded font-medium ">
                                Click Here
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="max-w-7xl mx-auto px-4 py-12">
    <h2 class="text-3xl font-bold mb-6 text-center">
        Events & Achievements
    </h2>

    <div class="grid md:grid-cols-4 gap-6">
        @foreach ($events as $event)
            <div class="bg-white shadow rounded overflow-hidden">
                <img src="{{ asset('storage/' . $event->image) }}" class="h-40 w-full object-cover">

                <div class="p-4">
                    <span
                        class="text-xs px-3 py-1 rounded-full
{{ $event->type === 'achievement' ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700' }}">
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
