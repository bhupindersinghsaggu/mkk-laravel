@extends('layouts.dashboard')

@section('content')
    <div class="max-w-5xl  px-4 py-6">

        <h1 class="text-2xl font-bold mb-6">Events / Achievements</h1>

        <!-- Add Event -->
        <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data"
            class="bg-white p-6 rounded shadow mb-6">
            @csrf

            <div class="grid md:grid-cols-2 gap-4">
                <input type="text" name="title" placeholder="Title" class="border p-2 rounded" required>
                <input type="date" name="event_date" class="border p-2 rounded" required>
                <input type="file" name="image" class="border p-2 rounded" required>
                <input type="url" name="button_link" placeholder="Button Link (optional)" class="border p-2 rounded">
                <textarea rows="5" name="description" placeholder="Enter Description" class="border p-2 rounded"></textarea>
            </div>
            <select name="type" class="border p-2 rounded">
                <option value="event">Event</option>
                <option value="achievement">Achievement</option>
            </select>

            <button class="mt-4 bg-blue-600 text-white px-6 py-2 rounded">
                Add Event
            </button>
        </form>

        <!-- Event List -->
        <div class="bg-white shadow rounded overflow-x-auto">
            <table class="w-full border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-2 border">Image</th>
                        <th class="p-2 border">Title</th>
                        <th class="p-2 border">Date</th>
                        <th class="p-2 border">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td class="p-2 border">
                                <img src="{{ asset('storage/' . $event->image) }}" class="w-20 rounded">
                            </td>
                            <td class="p-2 border">{{ $event->title }}</td>
                            <td class="p-2 border">{{ $event->event_date }}</td>
                            <td class="p-2 border"> <a href="{{ route('events.edit', $event) }}"
                                    class="text-blue-600 hover:underline">
                                    Edit
                                </a>

                            <td class="p-2 border">
                                <form method="POST" action="{{ route('events.destroy', $event) }}"
                                    onsubmit="return confirm('Delete this event?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 hover:underline">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
