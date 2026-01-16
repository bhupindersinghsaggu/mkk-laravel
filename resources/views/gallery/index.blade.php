@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-12">

    <h1 class="text-3xl font-bold mb-8 text-center">Photo Gallery</h1>

    @foreach($albums as $album)
        <h2 class="text-xl font-semibold mb-4">{{ $album->title }}</h2>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-10">
            @foreach($album->photos as $photo)
                <a href="{{ asset('storage/'.$photo->image) }}" target="_blank">
                    <img 
                        src="{{ asset('storage/'.$photo->image) }}"
                        class="rounded-lg shadow hover:scale-105 transition"
                        loading="lazy"
                    >
                </a>
            @endforeach
        </div>
    @endforeach

</div>
@endsection
