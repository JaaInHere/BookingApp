<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function showRooms(){

        $rooms = Room::all();


        foreach ($rooms as $room){
            
            $room->is_booked = Booking::where('room_id', $room->id)->exists();
        }

        return view('daftar-booking', compact('rooms'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        if($query){
            $rooms = Room::where('name', 'like', '%' . $query . '%')
                            ->orWhere('description', 'like', '%' . $query . '%')
                            ->get();
        } else {
            $rooms = Room::all();
        }

        return view('daftar-booking', compact('rooms', 'query'));
    }
}
