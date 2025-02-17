<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

use App\Models\Room;
use App\Models\Booking;
use App\Models\Gallery;


class AdminController extends Controller
{
    //

    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth::user()->usertype;
            if ($usertype == 'user') {
                $room = Room::all();
                $gallery = Gallery::all();
                return view('home.index', compact('room', 'gallery'));
            } else if ($usertype == 'admin') {
                return view('admin.index');
            } else {
                return redirect()->back();
            }
        }
    }
    public function home()
    {
        $room = Room::all();
        $gallery = Gallery::all();
        return view('home.index', compact('room', 'gallery'));
    }
    public function create_room()
    {
        if (Auth::check() && Auth::user()->usertype == 'admin') {
            return view('admin.create_room');
        }
        return redirect('/')->with('error', 'Akses ditolak.');
    }
    public function add_room(Request $request)
    {
        if (Auth::check() && Auth::user()->usertype == 'admin') {
            $data = new Room();
            $data->room_title = $request->title;
            $data->description = $request->description;
            $data->price = $request->price;
            $data->wifi = $request->wifi;
            $data->room_type = $request->type;
            $image = $request->image;
            if ($image) {
                $imagename = time() . '.' . $image->getClientOriginalExtension();
                $request->image->move('room', $imagename);
                $data->image = $imagename;
            }
            $data->save();
            return redirect()->back();
        }
        return redirect('/')->with('error', 'Akses ditolak.');
    }
    public function view_room()
    {
        if (Auth::check() && Auth::user()->usertype == 'admin') {
            $data = Room::all();

            return view('admin.view_room', compact('data'));
        }
        return redirect('/')->with('error', 'Akses ditolak.');
    }
    public function room_delete($id)
    {
        $data = Room::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function room_update($id)
    {
        $data = Room::find($id);
        return view('admin.update_room', compact('data'));
    }
    public function edit_room(Request $request, $id)
    {
        $data = Room::find($id);
        $data->room_title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->wifi = $request->wifi;
        $data->room_type = $request->type;
        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('room', $imagename);
            $data->image = $imagename;
        }
        $data->save();
        return redirect()->back();
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
    if (Auth::check() && Auth::user()->usertype == 'admin') {
        $data = Booking::with('user', 'room')->get(); 
        return view('admin.booking', compact('data'));
    }
    return redirect('/')->with('error', 'Akses ditolak.');
}

    public function delete_booking($id)
    {
        $data = Booking::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function approve_book($id)
    {
        $booking = Booking::find($id);
        $booking->status = 'Approve';
        $booking->save();
        return redirect()->back();
    }
    public function reject_book($id)
    {
        $booking = Booking::find($id);
        $booking->status = 'Rejected';
        $booking->save();
        return redirect()->back();
    }
    public function view_gallery()
    {
        if (Auth::check() && Auth::user()->usertype == 'admin') {
            $gallery = Gallery::all();
            return view('admin.gallery', compact('gallery'));
        }
        return redirect('/')->with('error', 'Akses ditolak.');
    }
    public function upload_gallery(Request $request)
    {
        $data = new Gallery;
        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('gallery', $imagename);
            $data->image = $imagename;
            $data->save();
            return redirect()->back();
        }
    }
    public function delete_gallery($id)
    {
        $data = Gallery::find($id);
        $data->delete();
        return redirect()->back();
    }
}
