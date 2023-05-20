<?php

namespace App\Http\Controllers;
use App\Models\Hotels;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
     public function index()
        {
             $Hotel = Hotels::get();
             return view('Userdis', compact('Hotel'));
            
        }
        
       
        public function hotelDetails($id)
        {
            $Hot = Hotels::findOrFail($id);
        
            return view('hotel-details', compact('Hot'));
        }
        
 }

