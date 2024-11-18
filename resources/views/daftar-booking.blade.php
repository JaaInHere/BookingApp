<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Selamat memilih
        </h2>
    </x-slot>
    <div class="max-w-md mx-auto py-5">
        <form action="{{ route('booking.search') }}" method="GET" class="mb-5">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" id="default-search" name="query" value="{{ request('query') }}" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Ruangan" required />
                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>
    </div>
    
<section class="grid grid-cols-3 gap-3 py-5"> 
    @forelse ($rooms as $room)
    <div class="room-card {{ $room->is_booked ? 'booked' : 'available' }}">
        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mx-5">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $room->name }}</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ Str::limit($room->description, 30) }}</p>
            <p class="bg-yellow-200 p-2 mb-2 inline-block rounded-md text-xs">Kapasitas: {{ $room->capacity }}</p>

            <div class="flex justify-between items-center mt-4">
                <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="openModal({{ $room->id }}, {{ auth()->user()->id }}, '{{ $room->name }}')">
                    Booking<i class="fa-solid fa-building-user px-2"></i>
                </button>                
                <a href="{{ route('singleRoom', $room->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-gray-400 rounded-lg hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    Selengkapnya
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
                @if ($room->is_booked)
                    <span class="badge bg-red-500 text-white p-1 rounded-md">Booked</span>
                @else
                    <span class="badge bg-green-500 text-white p-1 rounded-md">Available</span>
                @endif
            </div>
        </div>
    </div>
@empty
<p class="text-gray-600 col-span-3 ml-5">Tidak ada ruangan yang ditemukan.</p>
@endforelse
<div id="bookingModal" class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex justify-center items-center">
    <div class="bg-white rounded-lg p-6 w-1/2">
        <h2 class="text-xl mb-4">Form Booking</h2>
        <form id="bookingForm" action="{{ route('booking.store') }}" method="POST">
            @csrf
            <input type="hidden" name="room_id" id="room_id" value="{{ $room->id }}">
            <input type="hidden" name="room_name" id="room_name" value="{{ $room->name }}">
            <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">
            <div class="mb-4">
                <label for="date" class="block text-sm">Nama Lengkap</label>
                <input type="text" id="name" name="name" class="w-full p-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="date" class="block text-sm">Tanggal:</label>
                <input type="datetime-local" id="date" name="date" class="w-full p-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="waktu" class="block text-sm">Waktu Mulai</label>
                <input type="time" id="start_time" name="start_time" class="w-full p-2 border rounded">
                <label for="waktu" class="block text-sm">Waktu Selesai</label>
                <input type="time" id="end_time" name="end_time" class="w-full p-2 border rounded">
            </div>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Submit</button>
            <button type="button" class="bg-red-500 text-white px-4 py-2 rounded" onclick="closeModal()">Cancel</button>
        </form>
    </div>
    </div>
</section>
</x-app-layout>

