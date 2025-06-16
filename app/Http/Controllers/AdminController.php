<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Gallery;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        $usertype = Auth::user()->usertype;

        $room = collect([
            Room::where('room_type', 'Regular')->first(),
            Room::where('room_type', 'Deluxe')->first(),
            Room::where('room_type', 'Premium')->first()
        ])->filter();

        if ($usertype == 'user') {
            return view('home.index', [
                'room' => $room,
                'gallery' => Gallery::all()
            ]);
        } elseif ($usertype == 'admin') {
            $userCount = \App\Models\User::count();
            $roomCount = \App\Models\Room::count();
            $bookingCount = \App\Models\Booking::count();
            $messageCount = \App\Models\Contact::count();
            $users = \App\Models\User::all(); 

            $pendingBookingsCount = Booking::where('status', 'Waiting')->count();

            $roomBookings = Room::select('room_type', DB::raw('COUNT(bookings.id) as booking_count'))
            ->leftJoin('bookings', 'rooms.id', '=', 'bookings.room_id')
            ->groupBy('room_type')
            ->pluck('booking_count', 'room_type');

            $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            $monthlyBookings = [];
            for ($i = 1; $i <= 12; $i++) {
                $monthlyBookings[] = Booking::whereRaw('extract(month from start_date::date) = ?', [$i])->count();
            }
            return view('admin.dashboard', compact(
            'userCount',
            'roomCount',
            'bookingCount',
            'messageCount',
            'users',
            'pendingBookingsCount',
            'roomBookings',
            'months',
            'monthlyBookings'
        ));
        }

        return redirect()->back();
    }

    public function home()
    {
        $room = collect([
            Room::where('room_type', 'Regular')->first(),
            Room::where('room_type', 'Deluxe')->first(),
            Room::where('room_type', 'Premium')->first()
        ])->filter();
        return view('home.index', [
            'room' => $room,
            'gallery' => Gallery::all()
        ]);
    }

    public function create_room()
    {
        if (Auth::user()?->usertype !== 'admin') {
            return redirect('/')->with('error', 'Akses ditolak.');
        }
        return view('admin.create_room');
    }

    public function add_room(Request $request)
    {
        if (Auth::user()?->usertype !== 'admin') {
            return redirect('/')->with('error', 'Akses ditolak.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'wifi' => 'required|string',
            'type' => 'required|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $room = new Room();
        $room->room_title = $request->title;
        $room->description = $request->description;
        $room->price = $request->price;
        $room->wifi = $request->wifi;
        $room->room_type = $request->type;

        if ($request->hasFile('image')) {
            $imagename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('room'), $imagename);
            $room->image = $imagename;
        }

        $room->save();
        return redirect()->back()->with('success', 'Kamar berhasil ditambahkan.');
    }

    public function view_room()
    {
        if (Auth::user()?->usertype !== 'admin') {
            return redirect('/')->with('error', 'Akses ditolak.');
        }

        return view('admin.view_room', ['data' => Room::all()]);
    }

    public function room_delete($id)
    {
        $room = Room::findOrFail($id);
        $room->bookings()->delete(); 
        $room->delete();
        return redirect()->back()->with('success', 'Kamar berhasil dihapus.');
    }

    public function room_update($id)
    {
        return view('admin.update_room', [
            'data' => Room::findOrFail($id)
        ]);
    }

    public function edit_room(Request $request, $id)
    {
        $room = Room::findOrFail($id);
        $room->room_title = $request->title;
        $room->description = $request->description;
        $room->price = $request->price;
        $room->wifi = $request->wifi;
        $room->room_type = $request->type;

        if ($request->hasFile('image')) {
            $imagename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('room'), $imagename);
            $room->image = $imagename;
        }

        $room->save();
        return redirect()->back()->with('success', 'Kamar berhasil diperbarui.');
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function bookings()
    {
        if (Auth::user()?->usertype !== 'admin') {
            return redirect('/')->with('error', 'Akses ditolak.');
        }

        return view('admin.booking', [
            'data' => Booking::with('user', 'room')->get()
        ]);
    }

    public function delete_booking($id)
    {
        Booking::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Pemesanan berhasil dihapus.');
    }

    public function approve_book($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'Approved';
        $booking->save();

        return redirect()->back()->with('success', 'Pemesanan disetujui.');
    }

    public function reject_book($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'Rejected';
        $booking->save();

        return redirect()->back()->with('success', 'Pemesanan ditolak.');
    }

    public function view_gallery()
    {
        if (Auth::user()?->usertype !== 'admin') {
            return redirect('/')->with('error', 'Akses ditolak.');
        }

        return view('admin.gallery', [
            'gallery' => Gallery::with('user')->get()
        ]);
    }

    public function upload_gallery(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/')->with('error', 'Anda harus login.');
        }

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $gallery = new Gallery();
        $gallery->user_id = Auth::id(); 
        $imagename = time() . '.' . $request->image->extension();
        $request->image->move(public_path('gallery'), $imagename);
        $gallery->image = $imagename;
        $gallery->save();

        return redirect()->back()->with('success', 'Gambar berhasil diunggah.');
    }

    public function delete_gallery($id)
    {
        $gallery = Gallery::findOrFail($id);
        if ($gallery->user_id !== Auth::id() && Auth::user()->usertype !== 'admin') {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin.');
        }

        $gallery->delete();
        return redirect()->back()->with('success', 'Gambar berhasil dihapus.');
    }

    public function all_messages(){
        $data = Contact::all();
        return view('admin.all_message', compact('data'));
    }

    public function update_usertype(Request $request, $id)
    {
        if (Auth::user()->usertype !== 'admin') {
            return redirect()->back()->with('error', 'Unauthorized access.');
        }

        $user = User::findOrFail($id);
        
        // Prevent changing own usertype
        if ($user->id === Auth::id()) {
            return redirect()->back()->with('error', 'You cannot change your own user type.');
        }

        $user->usertype = $request->usertype;
        $user->save();

        return redirect()->back()->with('success', 'User type updated successfully.');
    }

    public function delete_user($id)
    {
        if (Auth::user()->usertype !== 'admin') {
            return redirect()->back()->with('error', 'Unauthorized access.');
        }

        $user = User::findOrFail($id);
        
        // Prevent deleting own account
        if ($user->id === Auth::id()) {
            return redirect()->back()->with('error', 'You cannot delete your own account.');
        }

        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully.');
    }
}