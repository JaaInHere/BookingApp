<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminBookingController extends Controller
{

    public function ShowAdminDibooking(){
        return view('admin.dibooking');
    }

    public function store(Request $request)
    {

    Log::info('Request data:', $request->all());


    Log::info('Date before validation:', ['date' => $request->input('date')]);

        // Validasi data form
        $validatedData = $request->validate([
            'room_id' => 'required|integer|exists:rooms,id',
            'user_id' =>'required|integer|exists:users,id',
            'room_name' => 'required|string|exists:rooms,name',
            'name' => 'required|string',
            'date' => 'required|date_format:Y-m-d',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);
        
        $isAlreadyBooked = Booking::where('room_id', $request->room_id)
        ->whereDate('date', $request->date)
        ->exists();

        if($isAlreadyBooked){
            return response()->json(['message' => 'Ruangan Ini sudah diBooking Untuk tanggal tersebut'], 400);
        }

        Log::info('Request data:', $request->all());
        Log::info('Room Name:', ['room_name' => $validatedData['room_name']]);
        Log::info('Validated date:', ['date' => $validatedData['date']]);

        // Simpan data ke database
        Booking::create($validatedData);
        Log::info('Date to be inserted into database:', ['date' => $validatedData['date']]);
        
        // Kembalikan respons JSON
        return response()->json(['message' => 'Booking successful!']);

    }

    public function getBooking()
{

    // Ambil user yang sedang login
    $user = Auth::user();

    if (!$user) {
        // Tanggapi jika tidak ada user yang login, misalnya redirect atau throw exception
        return redirect()->route('login'); // Atau tampilkan pesan error
    }

    $user = User::find($user->id); 

    // Query untuk mendapatkan daftar booking milik user yang sedang login
    $bookings = $user->bookings()->get();
    Log::info('Bookings:', $bookings->toArray());
    
    // Kirim data booking ke view
    return view('admin.dibooking', compact('bookings'));

}

public function showBookedData()
{
    $bookeds = Booking::all();
    return view('admin.bookeddata', compact('bookeds'));
}

public function edit($id)
{
    $booked = Booking::find($id);

    if (!$booked) {
        return redirect()->route('admin.bookeddata')->with('error', 'Booking not found');
    }

    return view('admin.editdata', compact('booked')); // Pastikan ini
}


public function update(Request $request, $id)
{
    // Temukan data booking berdasarkan ID
    $booked = Booking::find($id);
    
    // Periksa apakah data booking ditemukan
    if ($booked) {
        // Update data booking
        $booked->update($request->only(['name', 'date', 'start_time', 'end_time']));
        
        // Redirect kembali dengan pesan sukses
        return redirect()->route('admin.bookeddata')->with('success', 'Data Booking Berhasil Diperbarui');
    }

    // Redirect dengan pesan error jika data tidak ditemukan
    return redirect()->route('admin.bookeddata')->with('error', 'Data Tidak Ditemukan');
}

public function destroy($id)
{
    $booking = Booking::find($id);
    if ($booking) {
        $booking->delete();
        return response()->json(['success' => true]);
    } else {
        return response()->json(['success' => false, 'message' => 'Booking tidak ditemukan']);
    }
}  

}
