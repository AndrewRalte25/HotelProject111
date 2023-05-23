<?php

namespace App\Http\Controllers;

use App\Models\Hotels;
use App\Models\Payment;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotels::get();
        return view('admin.dis', compact('hotels'));
    }
        
    public function create()
    {
        return view('admin.addhotel');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:png,jpg,jpeg,gif,svg'
        ]);    
        
        $data = new Hotels();
        $data->name = $request->name;
        $data->location = $request->location;
        $data->opening = $request->openinghours;
        $data->contactinfo = $request->contactinformation;
        $image_name = time().'.'.$request->image->extension();
        $request->image->move(public_path('hotelsimages'), $image_name);
        $path = "hotelsimages/".$image_name;
        $data->image = $path;
        $data->save();
        
        return redirect('/hotels')->with('success', 'Added Successfully');
    }
    
    public function edit($id)
    {
        $hotel = Hotels::find($id);
        return view('admin.edithotel', compact('hotel'));
    }
    
    public function update(Request $request, $id)
{
    $hotel = Hotels::findOrFail($id);
    $hotel->name = $request->name;
    $hotel->location = $request->location;
    $hotel->opening = $request->openinghours;
    $hotel->contactinfo = $request->contactinformation;
    
    // Handle image upload if provided
    if ($request->hasFile('image')) {
       

        $image_name = time().'.'.$request->image->extension();
        $request->image->move(public_path('hotelsimages'), $image_name);
        $path = "hotelsimages/".$image_name;
        $hotel->image = $path;
        $hotel->save();
    }

    $hotel->save();

    return redirect('/hotels')->with('success', 'Hotel updated successfully');
    }
    
    public function roomadd($id)
    {
        
    }
    
    public function destroy($id)
    {
        Hotels::destroy($id);
        
        return redirect('/hotels')->with('success', 'Deleted Successfully');
    }

    public function userlist()
    {
        $users = User::get();
        return view('admin.userlist', compact('users'));
    }
    public function userdelete($id)
    {
        User::destroy($id);
        return redirect('/userslist')->with('success', 'Deleted Successfully');
    }
    public function paymentlist()
    {
        $pays = Payment::get();
        return view('admin.paymentlist', compact('pays'));
    }
    public function destroyroom($id)
    {
        Room::destroy($id);
        return redirect('/hotels')->with('success', 'Deleted Successfully');
    }

}
