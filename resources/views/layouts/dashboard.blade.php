<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>@yield('title', 'Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Place the first <script>
    and < textarea > tags your HTML 's <body> --> 
   
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-gray-100" x-data="{ open: false, showLogoutModal: false }">
    <div class="flex min-h-screen">
        <!-- Mobile Overlay -->
    <div x-show="open" @click="open = false" class="fixed inset-0 bg-black/50 z-20 lg:hidden"></div>
    <!-- Sidebar -->
    <aside
        class="fixed lg:static z-30 w-64 bg-white shadow-lg
               transform transition-transform duration-300
               lg:translate-x-0 flex flex-col h-screen"
        :class="open ? 'translate-x-0' : '-translate-x-full'">

        <!-- Logo -->
        <div class="p-4 font-semibold text-sm border-b flex gap-4 items-center justify-start ">
            <img src="https://i.pravatar.cc/40" alt="User Avatar" class="w-9 h-9 rounded-full border" />
            <div class="text-left text-lg"> Admin Login</div>
        </div>

        <!-- Menu -->
        <nav class="flex-1 overflow-y-auto">
            <ul class="p-2 space-y-1">
                {{-- <span> Menu</span> --}}
                <li class="px-4 py-2 rounded hover:bg-gray-200">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
                        <i class="fa-solid fa-gauge"></i>
                        Dashboard
                    </a>
                </li>

                <!-- Admissions Dropdown -->
                <li x-data="{ openSub: false }" class="rounded">
                    <button @click="openSub = !openSub"
                        class="w-full flex items-center justify-between px-4 py-2 rounded hover:bg-gray-200">
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-arrows-down-to-people"></i>
                            Admissions
                        </div>
                        <i class="fa-solid fa-angle-down transition-transform" :class="openSub ? 'rotate-180' : ''"></i>
                    </button>

                    <ul x-show="openSub" x-transition class="ml-4 mt-1 space-y-1 overflow-hidden">
                        <li>
                            <a href="{{ route('admissions.index') }}"
                                class="block px-3 py-2 text-sm rounded hover:bg-gray-100">
                                <i class="fa-solid fa-caret-right"></i> View Admissions
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admissions.index') }}"
                                class="block px-3 py-2 text-sm rounded hover:bg-gray-100">
                                <i class="fa-solid fa-caret-right"></i> Add Admission
                            </a>
                        </li>
                    </ul>
                </li>
                <li x-data="{ openSub: false }" class="rounded">
                    <button @click="openSub = !openSub"
                        class="w-full flex items-center justify-between px-4 py-2 rounded hover:bg-gray-200">
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-arrows-down-to-people"></i>
                            News/Updates
                        </div>
                        <i class="fa-solid fa-angle-down transition-transform" :class="openSub ? 'rotate-180' : ''"></i>
                    </button>

                    <ul x-show="openSub" x-transition class="ml-4 mt-1 space-y-1 overflow-hidden">
                        <li>
                            <a href="{{ route('news.index') }}"
                                class="block px-3 py-2 text-sm rounded hover:bg-gray-100">
                                <i class="fa-solid fa-caret-right"></i> Add News/Update
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('events.index') }}"
                                class="block px-3 py-2 text-sm rounded hover:bg-gray-100">
                                <i class="fa-solid fa-caret-right"></i> Add Events/Achievements
                            </a>
                        </li>


                    </ul>
                </li>

            </ul>
        </nav>

        <!-- Logout Button (trigger only) -->
        <div class="p-4 border-t mt-auto">
            <button @click="showLogoutModal = true"
                class="w-full flex items-center justify-center gap-2
                       bg-blue-500 hover:bg-blue-600
                       text-white rounded-lg py-2 font-medium transition">
                <i class="fa-solid fa-right-from-bracket"></i>
                Logout
            </button>
        </div>
    </aside>

    <!-- Main Content -->

    <div class="flex-1 flex flex-col">
        <header class="bg-white shadow px-4 py-3 flex items-center justify-between">
            <button @click="open = true" class="text-gray-600 lg:text-white "><i class="fa-solid fa-bars"></i></button>
            <div x-data="{ open: false }" class="relative">
                <!-- Trigger -->
                <button @click="open = !open" class="flex items-center gap-2 rounded-full focus:outline-none">
                    <!-- Avatar -->
                    <img src="https://i.pravatar.cc/40" alt="User Avatar" class="w-9 h-9 rounded-full border" />

                    <!-- Name -->
                    <span class="hidden md:block font-medium text-gray-700">
                        {{ auth()->user()->name }}
                    </span>

                    <!-- Arrow -->
                    <i class="fa-solid fa-chevron-down text-xs transition-transform"
                        :class="open ? 'rotate-180' : ''"></i>
                </button>

                <!-- Dropdown -->
                <div x-show="open" x-cloak @click.outside="open = false"
                    x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                    class="absolute right-0 mt-3 w-64 bg-white rounded-xl shadow-lg border z-50">
                    <!-- User Info -->
                    <div class="px-4 py-3 border-b">
                        <p class="font-semibold text-gray-800">{{ auth()->user()->name }}</p>
                        <p class="text-sm text-gray-500"> {{ auth()->user()->email }}</p>
                    </div>

                    <!-- Menu -->
                    <ul class="py-2 text-sm">
                        <li>
                            <a href="#" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100">
                                <i class="fa-regular fa-user"></i>
                                Edit profile
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100">
                                <i class="fa-solid fa-gear"></i>
                                Account settings
                            </a>
                        </li>
                        <li>
                            <div @click="showLogoutModal = true"
                                class="flex items-center justify-center gap-2 m-3 px-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg py-2 font-medium transition">
                                <i class="fa-solid fa-power-off"></i>
                            </div>
                        </li>
                    </ul>
                </div>
        </header>
        <main class="flex-1 p-4 md:p-6">
            @yield('content')
        </main>
    </div>
    </div>

    <!-- ✅ GLOBAL LOGOUT MODAL (PAGE CENTER) -->
    <div x-show="showLogoutModal" x-cloak class="fixed inset-0 z-[9999] flex items-center justify-center">

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/50" @click="showLogoutModal = false"></div>

        <!-- Modal -->
        <div x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
            class="relative bg-white rounded-xl shadow-xl
               w-full max-w-sm p-6 z-10">

            <h2 class="text-lg font-semibold text-gray-800">
                Confirm Logout
            </h2>

            <p class="text-sm text-gray-600 mt-2">
                Are you sure you want to logout?
            </p>

            <div class="mt-6 flex justify-end gap-3">
                <button @click="showLogoutModal = false" class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-300">
                    Cancel
                </button>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="px-4 py-2 rounded-lg bg-red-500 hover:bg-red-600 text-white">
                        Yes, Logout
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script src="//unpkg.com/alpinejs" defer></script>

    </body>

</html>
