@extends('layouts.dashboard')

@section('content')
<main class="flex-1 overflow-y-auto p-4 md:p-6">

    <h1 class="text-2xl  font-semibold mb-6">Dashboard</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @if (auth()->user()->role === 'admin')
            <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
                <div
                    class="flex h-12 w-12 items-center justify-center rounded-xl bg-red-100 text-red-700  hover:bg-red-300">
                    <i class="fa-solid fa-users"></i>
                </div>
                <div class="mt-5 flex items-center justify-between">
                    <div>
                        <span class="text-lg font-semibold text-gray-500 ">Total Enquiries</span>
                    </div>
                    <span class="flex items-center gap-1   py-0.5 pl-2 pr-2.5 text-2xl font-bold ">
                        <h3 class="text-title-sm font-bold  dark:text-white/90 bg-green-100 text-green-700 px-4 py-2 rounded-full h-12 w-12">
                            {{ \App\Models\Admission::count() }}
                        </h3>
                    </span>
                </div>
            </div>
        @endif
        @if (auth()->user()->role === 'admin')
            <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
                <div
                    class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-100 text-blue-700  hover:bg-blue-300">
                    <i class="fa-solid fa-users"></i>
                </div>
                <div class="mt-5 flex items-center justify-between ">
                    <div>
                        <span class="text-lg font-semibold text-gray-500 ">Total News</span>
                    </div>
                    <span class="flex items-center gap-1   py-0.5 pl-2 pr-2.5 text-2xl font-bold ">
                        <h3 class=" text-title-sm font-bold  dark:text-white/90 bg-green-100 text-green-700 px-4 py-2 rounded-full h-12 w-12">
                            {{ \App\Models\News::count() }}
                        </h3>
                    </span>
                </div>
            </div>
        @endif
        <div class="bg-white p-6 rounded shadow hidden ">
            <div class="rounded-2xl border border-gray-200 p-5 dark:border-gray-800 bg-slate-100 hover:bg-slate-200 md:p-6">
                <div
                    class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-200 dark:bg-gray-800 hover:bg-white">
                    <i class="fa-solid fa-power-off"></i>
                </div>
                <div class="mt-5 flex items-end justify-between">
                    <div>
                        <span class="text-lg font-semibold text-blue-500 dark:text-gray-400">Logged In As</span>
                    </div>
                    <span class="flex items-center gap-1 rounded-full bg-success-50 py-0.5 pl-2 pr-2.5 text-sm font-bold ">
                        <h3 class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90">
                            {{ auth()->user()->name }}
                        </h3>
                    </span>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
