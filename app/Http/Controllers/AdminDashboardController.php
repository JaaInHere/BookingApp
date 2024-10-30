<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function showAdminDashboard()
    {
        return view('admin.dashboard');
    }

    public function showData()
    {
        $totalRooms = Room::count();

        $totalBookedRooms = Booking::distinct('room_id')->count('room_id');
        $availableRoomsCount = $totalRooms - $totalBookedRooms;

        $userBookedRooms = Booking::where('user_id', Auth::id())->distinct('room_id')->count();

        return view('admin.dashboard', compact('totalRooms', 'totalBookedRooms', 'userBookedRooms', 'availableRoomsCount'));
    }
}
