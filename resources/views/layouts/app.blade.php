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
    <link rel="icon" href=".assets/images/favicons/favicon.ico" />

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

        /* latet News */

        #latest-news {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 300px;
            background: purple;
            border: 2px solid purple;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            z-index: 9999;
            font-family: Arial, sans-serif;
            opacity: 0;
            transform: translateX(100%);
            animation: slideInRight 0.5s ease-out forwards;
        }

        /* Header */
        #latest-news .news-header {
            background: var(--theme);
            ;
            color: #fff;
            padding: 10px;
            font-weight: bold;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 8px 8px 0 0;
        }

        #latest-news .news-header button {
            background: transparent;
            border: none;
            color: #fff;
            font-size: 18px;
            margin-left: 5px;
            cursor: pointer;
        }

        #latest-news .news-content {
            padding: 10px;
            max-height: 350px;
            overflow: hidden;
            transition: max-height 0.3s ease-in-out, opacity 0.3s ease-in-out;
        }

        /* Floating Toggle Button */
        #reopen-news {
            position: fixed;
            bottom: 120px;
            right: 20px;
            background: purple;
            color: #fff;
            border: none;
            border-radius: 30px;
            padding: 12px 20px;
            font-size: 16px;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            z-index: 10000;
            opacity: 0.9;
            transition: background 0.3s, transform 0.3s;
            display: none;
            /* hidden on desktop by default */
        }

        #reopen-news:hover {
            background: var(--theme);
            transform: scale(1.05);
        }

        /* 📱 Mobile Responsive */
        @media (max-width: 768px) {
            #latest-news {
                width: 90%;
                right: 5%;
                bottom: 50;
                top: auto;
                border-radius: 10px 10px 0 0;
                transform: translateY(100%);
                animation: none;
                /* start hidden */
                display: none;
                /* hidden by default */
            }

            #latest-news .news-content {
                max-height: 150px;
            }

            #reopen-news {
                display: block;
                /* show button only on mobile */
            }
        }

        /* Animations */
        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(100%);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideOutRight {
            from {
                opacity: 1;
                transform: translateX(0);
            }

            to {
                opacity: 0;
                transform: translateX(100%);
            }
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(100%);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideOutDown {
            from {
                opacity: 1;
                transform: translateY(0);
            }

            to {
                opacity: 0;
                transform: translateY(100%);
            }
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
