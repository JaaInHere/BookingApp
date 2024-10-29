<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboarController extends Controller
{
    public function showData()
    {
        $totalRooms = Room::count();

        $totalBookedRooms = Booking::distinct('room_id')->count('room_id');
        $availableRoomsCount = $totalRooms - $totalBookedRooms;

        $userBookedRooms = Booking::where('user_id', Auth::id())->distinct('room_id')->count();

        return view('dashboard', compact('totalRooms', 'totalBookedRooms', 'userBookedRooms', 'availableRoomsCount'));
    }
}
