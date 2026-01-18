@extends('layouts.dashboard')

@section('title', 'News')

@section('content')

    <div class="max-w-8xl mx-auto">

        <div class="flex justify-between mb-4">
            <h2 class="text-2xl font-semibold">News</h2>
            <a href="{{ route('news.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">
                Add News
            </a>
        </div>

        @foreach ($news as $item)
            <div class=" max-w-5xl  bg-white p-4 mb-3 rounded shadow flex justify-between">
                <div>
                    <h3 class="font-semibold">{{ $item->title }}</h3>
                    <p class="text-sm text-gray-600">{{ $item->created_at->format('d M Y') }}</p>
                   
                    @if ($item->description)
                        <p class="text-gray-700 mb-4 mt-4">
                            {{ $item->description }}
                        </p>
                    @endif
                     <div class="flex items-center gap-4">
                    @if ($item->link)
                        <p>
                            <a href="{{ $item->link }}" target="_blank" class="text-black text-sm bg-yellow-400 px-2 py-2 rounded">
                              <i class="fa-solid fa-link"></i>  View Link
                            </a>
                        </p>
                    @endif

                    @if ($item->pdf)
                        <a href="{{ asset('storage/' . $item->pdf) }}" target="_blank"
                            class="text-white text-sm  bg-red-600 px-2 py-2 rounded">
                            <i class="fa-solid fa-download"></i> View PDF
                        </a>
                    @endif
                    </div>
                </div>

                <form method="POST" action="{{ route('news.destroy', $item) }}">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600">Delete</button>
                </form>
            </div>
        @endforeach

        {{ $news->links() }}

    </div>

@endsection
