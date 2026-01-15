<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>MKK School of Excellence | Admissions Open 2026–27</title>
    <!-- SEO -->
    <meta name="description"
        content="MKK School of Excellence offers quality education, smart classrooms, experienced faculty & holistic development. Admissions Open 2026–27." />
    <meta name="keywords" content="MKK School, School of Excellence, Panipat School, CBSE School, Admissions Open" />
    <link rel="canonical" href="https://mkknew.netlify.app/" />
    <!-- FAVICON -->
    <link rel="icon" href="/assets/images/favicons/favicon.ico" />

    <!-- custom css -->
    <link rel="icon" href="/assets/custom.css" />

    <!-- TAILWIND (PRODUCTION BUILD ONLY) -->
    <link rel="stylesheet" href="/output.css" />

    <!-- SWIPER CSS -->
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" as="style"
        onload="this.onload=null;this.rel='stylesheet'">

    <noscript>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    </noscript>


    <!-- FONT AWESOME (ASYNC) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Google reCAPTCHA Keys -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>


    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-white text-gray-800 overflow-x-hidden">

    @include('partials.header')
    <main>
        @yield('content')
    </main>
    @include('partials.footer')
    </div>
    @if (session('success'))
        <div id="thankYouModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-60">
            <div class="bg-white rounded-xl shadow-2xl max-w-md w-full p-6 relative animate-fadeIn">
                <!-- Close Button -->
                <button onclick="closeModal()" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 text-xl">
                    &times;
                </button>
                <!-- Icon -->
                <div class="flex justify-center mb-4">
                    <div class="w-16 h-16 flex items-center justify-center rounded-full bg-green-100">
                        <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                </div>
                <!-- Message -->
                <h2 class="text-2xl font-semibold text-center text-gray-800">
                    Thank You!
                </h2>
                <p class="text-center text-gray-600 mt-2">
                    {{ session('success') }}
                </p>
                <!-- Button -->
                <div class="mt-6 text-center">
                    <button onclick="closeModal()"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg">
                        OK
                    </button>
                </div>
            </div>
        </div>
    @endif
    <script>
        function closeModal() {
            document.getElementById('thankYouModal').style.display = 'none';
        }
        setTimeout(() => {
            const modal = document.getElementById('thankYouModal');
            if (modal) modal.style.display = 'none';
        }, 5000);
    </script>



</body>

</html>
