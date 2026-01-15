@extends('layouts.dashboard')

@section('title', 'Admission Enquiries')

@section('content')

    @php
        $isAdmin = auth()->user()->role === 'admin';
    @endphp

    <div class="max-w-7xl mx-auto px-4 py-8">

        <h1 class="text-3xl font-bold mb-6">
            Admission Enquiries
        </h1>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow rounded-lg overflow-x-auto">
            <table class="min-w-full border border-gray-200">
                <thead class="bg-gray-100 ">
                    <tr>
                        <th class="px-4 py-2 border">Sr. No</th>
                        <th class="px-4 py-2 border">Date</th>
                        <th class="px-4 py-2 border">Name</th>
                        <th class="px-4 py-2 border">Phone</th>
                        <th class="px-4 py-2 border">Class</th>
                        <th class="px-4 py-2 border">Source</th>
                        <th class="px-4 py-2 border hidden md:table-cell">Message</th>

                        <th class="px-4 py-2 border">Status</th>

                        @if ($isAdmin)
                            <th class="px-4 py-2 border">Action</th>
                        @endif
                    </tr>
                </thead>

                <tbody>
                    @forelse ($admissions as $admission)
                        <tr class="hover:bg-gray-50">

                            {{-- Serial number with pagination --}}
                            <td class="px-4 py-2 border">
                                {{ ($admissions->currentPage() - 1) * $admissions->perPage() + $loop->iteration }}
                            </td>
                            <td class="px-4 py-2 border">
                                {{ $admission->created_at->format('d M Y') }}
                            </td>
                            <td class="px-4 py-2 border">{{ $admission->name }}</td>
                            <td class="px-4 py-2 border">{{ $admission->phone }}</td>
                            <td class="px-4 py-2 border">{{ $admission->class }}</td>
                            <td class="px-4 py-2 border">{{ $admission->source ?? '-' }}</td>

                            <td class="px-4 py-2 border">
                                {{ \Illuminate\Support\Str::limit($admission->message, 40) }}
                            </td>



                            {{-- Status Badge --}}
                            <td class="px-4 py-2 border">
                                @php
                                    $colors = [
                                        'new' => 'bg-yellow-100 text-yellow-800',
                                        'contacted' => 'bg-blue-100 text-blue-800',
                                        'admitted' => 'bg-green-100 text-green-800',
                                    ];
                                @endphp

                                <span
                                    class="px-3 py-1 rounded-full text-sm {{ $colors[$admission->status] ?? 'bg-gray-100 text-gray-800' }}">
                                    {{ ucfirst($admission->status ?? 'new') }}
                                </span>
                            </td>

                            {{-- Admin Actions --}}
                            @if ($isAdmin)
                                <td class="px-4 py-2 border space-x-2">

                                    {{-- Update Status --}}
                                    <form action="{{ route('admissions.status', $admission) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" onchange="this.form.submit()"
                                            class="border rounded px-2 py-1 text-sm">
                                            <option value="new" @selected($admission->status === 'new')>New</option>
                                            <option value="contacted" @selected($admission->status === 'contacted')>Contacted</option>
                                            <option value="admitted" @selected($admission->status === 'admitted')>Admitted</option>
                                        </select>
                                    </form>

                                    {{-- Delete Enquiry --}}
                                    <form action="{{ route('admissions.destroy', $admission) }}" method="POST"
                                        class="inline"
                                        onsubmit="return confirm('Are you sure you want to delete this enquiry?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600 hover:underline text-sm">
                                            Delete
                                        </button>
                                    </form>

                                </td>
                            @endif

                        </tr>

                    @empty
                        <tr>
                            <td colspan="{{ $isAdmin ? 9 : 8 }}" class="text-center py-6 text-gray-500">
                                No enquiries found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-6">
            {{ $admissions->links() }}
        </div>

    </div>

@endsection
