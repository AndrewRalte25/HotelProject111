<?php

namespace App\Http\Controllers;
use App\Models\Hotels;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiController extends Controller
{
    
     public function index()
        {
          return Hotels::all();
            
        }
        
        public function room()
        {
          return Room::all();
        }

          public function user()
          {
            return User::all();
          }
       
       
      
    
      
        public function userregister(Request $request)
        {
          $request->validate([
              'name' => 'required',
              'email' => 'required|email|unique:users,email',
              'password' => 'required|min:6',
          ]);
  
          $user = User::create($request->all());
  
          return response()->json($user, Response::HTTP_CREATED);
      }
        public function update()
        {
            
        }
    
        public function destroy($id)
        {
            
        }
    
 }

