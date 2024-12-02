<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminRoomController extends Controller
{


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'description' => 'required|string|max:255',
        ]);

        Room::create([
            'name' => $request->input('name'),
            'capacity' => $request->input('capacity'),
            'description' => $request->input('description'),
        ]);

        return redirect()->back()->with('success', 'Room berhasil dibuat');

    }

    public function showAdminBooking()
    {
        return view('admin.booking');
    }
    public function showRooms(){

        $rooms = Room::all();

        foreach ($rooms as $room){
            
            $room->is_booked = Booking::where('room_id', $room->id)->exists();
        }

        return view('admin.booking', compact('rooms'));
    }

    public function singleRoom($id) {
        $room = Room::findOrFail($id);

        $isBooked = Booking::where('room_id', $room->id)->exists();
        return view('admin.adminsingleroom', compact('room', 'isBooked'));
    }

    public function adminSearch(Request $request)
    {
        Log::info('Search query:', ['query' => $request->input('query')]);

        $query = $request->input('query');

        if($query){
            $rooms = Room::where('name', 'like', '%' . $query . '%')
                            ->orWhere('description', 'like', '%' . $query . '%')
                            ->get();
        } else {
            $rooms = Room::all();
        }

        return view('admin.booking', compact('rooms', 'query'));
    }
}
