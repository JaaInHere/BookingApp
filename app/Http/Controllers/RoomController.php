<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function showRooms(){

        $rooms = Room::all();
        return view('daftar-booking', compact('rooms'));
    }
}
