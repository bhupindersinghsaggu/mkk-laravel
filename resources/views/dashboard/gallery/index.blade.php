@extends('layouts.dashboard')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">

    <h1 class="text-2xl font-bold mb-6">Gallery Albums</h1>

    <form method="POST" enctype="multipart/form-data">
        @csrf

        <input type="text" name="title" placeholder="Album Title"
            class="border rounded w-full mb-3 px-4 py-2" required>

        <textarea name="description" placeholder="Description"
            class="border rounded w-full mb-3 px-4 py-2"></textarea>

        <input type="file" name="images[]" multiple
            class="border rounded w-full mb-3 px-4 py-2" required>

        <button class="bg-blue-600 text-white px-6 py-2 rounded">
            Upload Album
        </button>
    </form>

</div>
@endsection
