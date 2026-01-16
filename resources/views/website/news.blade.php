@extends('layouts.app')

@section('title', 'Latest News & Notices')

@section('content')

<section class="max-w-7xl mx-auto px-4 py-10">

    <h1 class="text-3xl md:text-4xl font-bold mb-8 text-center">
        Latest News & Notices
    </h1>

    <div class="space-y-6">

        @forelse($news as $item)

            <div class="bg-white shadow rounded-lg p-6">

                <h2 class="text-xl font-semibold mb-2">
                    {{ $item->title }}
                </h2>

                <p class="text-sm text-gray-500 mb-3">
                    <i class="fa-regular fa-calendar-days"></i> {{ $item->created_at->format('d M Y') }}
                </p>

                @if($item->description)
                    <p class="text-gray-700 mb-4">
                        {{ $item->description }}
                    </p>
                @endif

                <div class="flex flex-wrap gap-4">

                    @if($item->link)
                        <a href="{{ $item->link }}"
                           target="_blank"
                           class="text-black text-sm bg-yellow-400 px-2 py-2 rounded">
                           <i class="fa-solid fa-link"></i>  Visit Link 
                        </a>
                    @endif

                    @if($item->pdf)
                        <a href="{{ asset('storage/'.$item->pdf) }}"
                           target="_blank"
                           class="text-white text-sm  bg-red-600 px-2 py-2 rounded">
                           <i class="fa-solid fa-download"></i> Download PDF
                        </a>
                    @endif
                </div>
            </div>
        @empty
            <p class="text-center text-gray-500">
                No news available at the moment.
            </p>
        @endforelse

    </div>

    <div class="mt-8">
        {{ $news->links() }}
    </div>

</section>

@endsection
