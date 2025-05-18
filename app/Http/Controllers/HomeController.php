<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Gallery;
use App\Models\Contact;
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

    public function our_rooms(Request $request)
    {
        $query = Room::query();
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('room_title', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
            });
        }
        
        if ($request->filled('type')) {
            $roomType = $request->input('type');
            \Log::info('Filtering by room type:', ['type' => $roomType]);
            $query->where('room_type', $roomType);
        }

        $room = $query->paginate(6);
        
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
    public function history()
    {
        $bookings = Booking::where('user_id', Auth::id())->with('room')->get();
        return view('home.history', compact('bookings'));
    }
    public function contact(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to send a message.');
        }

        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        Contact::create([
            'user_id' => Auth::id(),
            'message' => $request->message,
        ]);

        return redirect()->back()->with('message', 'Message sent successfully.');
    }
}
