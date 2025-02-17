<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Gallery;

class AdminController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        $usertype = Auth::user()->usertype;

        if ($usertype == 'user') {
            return view('home.index', [
                'room' => Room::all(),
                'gallery' => Gallery::all()
            ]);
        } elseif ($usertype == 'admin') {
            return view('admin.index');
        }

        return redirect()->back();
    }

    public function home()
    {
        return view('home.index', [
            'room' => Room::all(),
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
            'wifi' => 'required|boolean',
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
        Room::findOrFail($id)->delete();
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
        $booking->status = 'Approve';
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
}
