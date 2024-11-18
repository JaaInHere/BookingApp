<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script>
            var bookingUrl = '/dibooking';
        </script>        

    </head>
    <body class="font-sans antialiased">
            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <p class="text-2xl font-bold text-gray-700">{{ $room->name }}</p>
                </div>
            </header>

            <!-- Page Content -->
            <div class="py-2 px-4">
                <p class="text-gray-700 dark:text-gray-400">{{ $room->description }}</p>
                <p class="text-sm text-gray-500">Kapasitas: {{ $room->capacity }}</p>
            
                <!-- Notifikasi status booking -->
                @if ($isBooked)
                    <div class="mt-4 p-3 bg-red-100 text-red-700 border border-red-300 rounded">
                        Ruangan ini sedang dibooking! Silakan pilih ruangan lain.
                    </div>
                @else
                    <div class="mt-4 p-3 bg-green-100 text-green-700 border border-green-300 rounded">
                        Ruangan ini tersedia untuk booking.
                    </div>
                @endif
            
                <a href="/admin/booking" class="inline-block mt-6 mb-32 px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    Kembali ke Daftar Ruangan
                </a>
            </div>
            


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('/js/admin.js') }}"></script>
        <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
        <script src="https://kit.fontawesome.com/147ca5197e.js" crossorigin="anonymous"></script>
        

<footer class="bg-white rounded-lg shadow dark:bg-gray-900 m-4">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="https://flowbite.com/" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">BookingApp</span>
            </a>
            <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">About</a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
                </li>
                <li>
                    <a href="#" class="hover:underline">Contact</a>
                </li>
            </ul>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="https://flowbite.com/" class="hover:underline">Bagja Hadrinata™</a>. All Rights Reserved.</span>
    </div>
</footer>
    </body>
</html>
