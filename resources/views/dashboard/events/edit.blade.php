@extends('layouts.dashboard')

@section('title', 'Edit Event')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">

    <h1 class="text-2xl font-bold mb-6">Edit Event</h1>

    <form action="{{ route('events.update', $event) }}"
          method="POST"
          enctype="multipart/form-data"
          class="space-y-5">

        @csrf
        @method('PUT')

        <!-- Title -->
        <input type="text" name="title"
               value="{{ old('title', $event->title) }}"
               class="w-full border rounded p-3"
               placeholder="Event Title" required>

        <!-- Type -->
        <select name="type" class="w-full border rounded p-3">
            <option value="event" @selected($event->type === 'event')>Event</option>
            <option value="achievement" @selected($event->type === 'achievement')>Achievement</option>
        </select>

        <!-- Date -->
        <input type="date" name="event_date"
               value="{{ old('event_date', $event->event_date) }}"
               class="w-full border rounded p-3" required>

        <!-- Description -->
        <textarea name="description"
                  rows="6"
                  class="w-full border rounded p-3"
                  required>{{ old('description', $event->description) }}</textarea>

        <!-- Current Image -->
        <div>
            <p class="mb-2 font-medium">Current Image</p>
            <img src="{{ asset('storage/'.$event->image) }}"
                 class="w-48 rounded shadow">
        </div>

        <!-- New Image -->
        <input type="file" name="image" class="w-full border p-2 rounded">

        <!-- Button Link -->
        <input type="url" name="button_link"
               value="{{ old('button_link', $event->button_link) }}"
               class="w-full border rounded p-3"
               placeholder="Button Link (optional)">

        <!-- Submit -->
        <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded font-semibold">
            Update Event
        </button>

    </form>
</div>
@endsection
