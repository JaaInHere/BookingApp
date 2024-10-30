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
        <div class="min-h-screen bg-gray-100">
            <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <a href="{{ route('admin.dashboard') }}">
                                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                                </a>
                            </div>
            
                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('dashboard')">
                                    {{ __('Dashboard') }}
                                </x-nav-link>
                            </div>
            
                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <x-nav-link :href="route('admin.booking')" :active="request()->routeIs('admin.booking')">
                                    {{ __('Booking Ruangan') }}
                                </x-nav-link>
                            </div>
            
                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <x-nav-link :href="route('admin.dibooking')" :active="request()->routeIs('admin.dibooking')">
                                    {{ __('Booking Selesai Dibuat') }}
                                </x-nav-link>
                            </div>

                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <x-nav-link :href="route('admin.adduser')" :active="request()->routeIs('admin.adduser')">
                                    {{ __('Tambah User') }}
                                </x-nav-link>
                            </div>

                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <x-nav-link :href="route('admin.addrooms')" :active="request()->routeIs('admin.rooms')">
                                    {{ __('Tambah Ruangan') }}
                                </x-nav-link>
                            </div>

                        </div>
            
                        <!-- Settings Dropdown -->
                        <div class="hidden sm:flex sm:items-center sm:ms-6">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                        <div>{{ Auth::user()->name }}</div>
            
                                        <div class="ms-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>
            
                                <x-slot name="content">
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
            
                                        <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
            
                        <!-- Hamburger -->
                        <div class="-me-2 flex items-center sm:hidden">
                            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            
                <!-- Responsive Navigation Menu -->
                <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-responsive-nav-link>
                    </div>
            
                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="px-4">
                            <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                        </div>
            
                        <div class="mt-3 space-y-1">
                            <x-responsive-nav-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-responsive-nav-link>
            
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
            
                                <x-responsive-nav-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>            

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <p class="text-2xl font-bold text-gray-700">Admin Dashboard</p>
                </div>
            </header>

            <!-- Page Content -->
                <section class="py-12 pl-32 grid grid-cols-3 drop-shadow-md ">
                    <a href="/daftar">
                    <div class=" bg-white h-52 max-w-60 rounded-md">
                        <span style="color: green">
                        <i class="fa-solid fa-building fa-2xl px-4 py-6 mt-6 mx-6 bg-green-300 rounded-md"></i> 
                        </span>
                        <p class="text-xl ml-5 mt-5 font-medium text-gray-500">Ruangan Tersedia</p>
                        <p class="text-4xl text-center mt-5 font-medium text-gray-500">{{ $availableRoomsCount }}</p>
                    </div>
                    </a>
            
                    <a href="/daftar">
                    <div class=" bg-white  h-52 max-w-60 rounded-md">
                        <span style="color: rgba(83,193,218,255)">
                            <i class="fa-solid fa-building-user fa-2xl px-4 py-6 mt-6 mx-6 bg-sky-200 rounded-md"></i> 
                            </span>
                            <p class="text-xl ml-5 mt-5 font-medium text-gray-500">Ruangan Terbooking</p>
                            <p class="text-4xl text-center mt-5 font-medium text-gray-500">{{ $totalBookedRooms }}</p>
                    </div>
                    </a>
            
                    <a href="/diBooking">
                    <div class=" bg-white  h-52 max-w-60 rounded-md">
                        <span style="color: #FBFF00">
                            <i class="fa-solid fa-building-circle-check fa-2xl px-4 py-6 mt-6 mx-6 bg-yellow-300 rounded-md"></i> 
                            </span>
                            <p class="text-xl ml-5 mt-5 font-medium text-gray-500">Booking Selesai Dibuat</p>
                            <p class="text-4xl text-center mt-5 font-medium text-gray-500">{{ $userBookedRooms }}</p>
                    </div>
                    </a>
                </section>
            
                <section class="py-7 px-4">
                    <div class="bg-white rounded-md shadow-md h-screen max-w-screen">
                        <p class="text-3xl ml-5 pt-8 font-medium text-gray-500">Booking Rooms App</p>
                        <p class="text-md mx-5 pt-2 text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis laborum adipisci iusto sint, minima possimus quidem doloribus earum eaque ea sequi quae, sit dignissimos alias at magnam voluptatum laudantium non! Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis dignissimos placeat est dolore repellat labore ullam ipsum esse adipisci accusamus animi commodi eos ducimus recusandae rerum, repellendus laudantium aspernatur eveniet?
                        Aspernatur voluptatum similique explicabo earum? Beatae quis ipsam dignissimos adipisci itaque ratione similique dolorem fuga consequatur nemo aliquam quia placeat, est magni accusantium quaerat inventore maiores dicta, quam aut laudantium.
                        Sequi pariatur illum beatae expedita, non laudantium quidem vero fuga eos! Doloribus sequi voluptatum a facere sapiente officia cupiditate, nam possimus quidem perspiciatis! Facilis corporis quibusdam, sed animi omnis praesentium.</p>
            
                        <p class="text-3xl ml-5 pt-8 font-medium text-gray-500">Ruang Tersedia</p>
                        <p class="text-md mx-5 pt-2 text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis laborum adipisci iusto sint, minima possimus quidem doloribus earum eaque ea sequi quae, sit dignissimos alias at magnam voluptatum laudantium non! Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis dignissimos placeat est dolore repellat labore ullam ipsum esse adipisci accusamus animi commodi eos ducimus recusandae rerum, repellendus laudantium aspernatur eveniet?
                       </p>
            
                        <p class="text-3xl ml-5 pt-8 font-medium text-gray-500">Booking Ruangan</p>
                        <p class="text-md mx-5 pt-2 text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis laborum adipisci iusto sint, minima possimus quidem doloribus earum eaque ea sequi quae, sit dignissimos alias at magnam volupt
                       </p>
            
                        <p class="text-3xl ml-5 pt-8 font-medium text-gray-500">Booking Selesai Dibuat</p>
                        <p class="text-md mx-5 pt-2 text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis laborum adipisci iusto sint, minima possimus quidem doloribus earum eaque ea sequi quae, sit 
                       </p>
                    </div>
                </section>
            </main>
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
