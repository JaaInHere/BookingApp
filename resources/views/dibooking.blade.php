<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Booking Yang Telah Dibuat
        </h2>
    </x-slot>

<section class="px-8 py-6">
    <table class="min-w-full text-sm text-gray-900 bg-white border border-gray-600 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        <thead>
            <tr>
                <th class="px-4 py-2 border border-gray-600 dark:border-gray-600">Nama</th>
                <th class="px-4 py-2 border border-gray-600 dark:border-gray-600">Ruangan</th>
                <th class="px-4 py-2 border border-gray-600 dark:border-gray-600">Tanggal</th>
                <th class="px-4 py-2 border border-gray-600 dark:border-gray-600">Waktu</th>
                <th class="px-4 py-2 border border-gray-600 dark:border-gray-600">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
            <tr>
                <td class="px-4 py-2 border border-gray-600 dark:border-gray-600">{{ $booking->name }}</td>
                <td class="px-4 py-2 border border-gray-600 dark:border-gray-600">{{ $booking->room_name }}</td>
                <td class="px-4 py-2 border border-gray-600 dark:border-gray-600">{{ $booking->date }}</td>
                <td class="px-4 py-2 border border-gray-600 dark:border-gray-600">{{ $booking->start_time }} - {{ $booking->end_time }}</td>
                <td class="px-4 py-2 border border-gray-600 dark:border-gray-600">
                    <button class="bg-red-700 p-1 rounded-md text-white hover:bg-red-500"
                    onclick="BookingDelete({{ $booking->id }})">Hapus</button>
                    <button class="bg-green-400 p-1 rounded-md text-white hover:bg-green-200"
                        onclick="BookingDone({{ $booking->id }})">
                        Selesai
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>      
</section>
</x-app-layout>