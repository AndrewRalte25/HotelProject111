<?php

namespace App\Http\Controllers;
use App\Models\Hotels;
use App\Models\Room;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
     public function index()
        {
             $hotels = Hotels::get();
             return view('Userdis', compact('hotels'));
            
        }
        
       
        public function hotelDetails($id)
        {
            $Hot = Hotels::findOrFail($id);
            $Rooms = Room::where('hotel_id', $id)->get();
      
            return view('hotel-details', compact('Hot','Rooms'));
        }
        
 }

