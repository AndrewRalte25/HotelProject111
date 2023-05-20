<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotels;
use App\Models\Room;

class RoomController extends Controller
{
    public function index($id)
    {
        $hotel = Hotels::findOrFail($id);
        $rooms = Room::where('hotel_id', $id)->get();
        return view('admin.addroom', compact('hotel','rooms'));
    }
    public function create($id)
{   
    $hotel = Hotels::findOrFail($id);
    $rooms = Room::where('hotel_id', $id)->get();
    return view('admin.roomadd',compact('hotel','rooms'));
}


    public function store(Request $request,$id)
    {
        $validated = $request->validate([
            'type' => 'required|string',
            'room_number' => 'required|string',
            'price' => 'required|string',
        ]);

        $room = new Room();
        $room->type = $validated['type'];
        $room->room_number = $validated['room_number'];
        $room->price = $validated['price'];
        $room->hotel_id = $id;
        $room->save();

        
        return redirect('/hotels/' . $id . '/addroom')->with('success', 'Added Successfully');

    
    }
}
