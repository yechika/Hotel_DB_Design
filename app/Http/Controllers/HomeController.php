<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Gallery;

class HomeController extends Controller
{
    public function room_details($id)
    {
        $room = Room::find($id);
        return view('home.room_details', compact('room'));
    }
    public function add_booking(Request $request, $id)
    {
        $request->validate([
            'startDate' => 'required|date',
            'endDate' => 'required|date|after:startDate',
        ]);

        $data = new Booking();
        $data->room_id = $id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        $startDate = $request->startDate;
        $endDate = $request->endDate;

        $isBooked = Booking::where('room_id', $id)
            ->where('start_date', '<=', $endDate)
            ->where('end_date', '>=', $startDate)
            ->exists();

        if ($isBooked) {
            return redirect()->back()->with('messageBooked', 'Room already booked, please try different date');
        } else {
            $data->start_date = $request->startDate;
            $data->end_date = $request->endDate;
            $data->save();

            return redirect()->back()->with('message', 'Room Booked Successfully');
        }
    }
    public function our_rooms()
    {
        $room=Room::all();
        return view('home.our_rooms', compact('room'));
    }
    public function hotel_gallery()
    {
        $gallery=Gallery::all();
        return view('home.hotel_gallery', compact('gallery'));
    }
    public function about_page()
    {
        return view('home.about_page');
    }
}

