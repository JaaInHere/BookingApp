<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;

class AdminRoomController extends Controller
{

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
}
