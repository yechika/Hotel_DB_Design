<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Gallery;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function room_details($id)
    {
        $room = Room::find($id);
        return view('home.room_details', compact('room'));
    }

    public function add_booking(Request $request, $id)
    {
        if (!Auth::check()) { 
            return redirect()->route('login')->with('error', 'Silakan login untuk melakukan pemesanan.');
        }

        $request->validate([
            'startDate' => 'required|date',
            'endDate' => 'required|date|after:startDate',
        ]);

        $startDate = $request->startDate;
        $endDate = $request->endDate;
        $userId = Auth::id(); 

        $isBooked = Booking::where('room_id', $id)
            ->where('start_date', '<=', $endDate)
            ->where('end_date', '>=', $startDate)
            ->exists();

        if ($isBooked) {
            return redirect()->back()->with('messageBooked', 'Room already booked, please try a different date.');
        } else {
            Booking::create([
                'room_id' => $id,
                'user_id' => $userId,
                'start_date' => $startDate,
                'end_date' => $endDate,
            ]);

            return redirect()->back()->with('message', 'Room booked successfully.');
        }
    }

    public function our_rooms()
    {
        $room = Room::all();
        return view('home.our_rooms', compact('room'));
    }

    public function hotel_gallery()
    {
        $gallery = Gallery::all();
        return view('home.hotel_gallery', compact('gallery'));
    }

    public function about_page()
    {
        return view('home.about_page');
    }
}
