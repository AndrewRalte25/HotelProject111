<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotels;
use App\Models\Payment;
use App\Models\User;

class FilterController extends Controller
{
    public function payment(Request $request)
    {
        $filterName = $request->input('filter_name');
        $filterEmail = $request->input('filter_email');
        $filterHotelId = $request->input('filter_hotel_id');
        $filterRoomNumber = $request->input('filter_room_number');

        $query = Payment::query();

        if ($filterName) {
            $query->where('name', $filterName);
        }

        if ($filterEmail) {
            $query->where('email', $filterEmail);
        }

        if ($filterHotelId) {
            $query->where('hotel_id', $filterHotelId);
        }

        if ($filterRoomNumber) {
            $query->where('room_number', $filterRoomNumber);
        }

        $pays = $query->get();

        // You can pass the filtered results to the view or perform any other actions with it
        return view('admin.paymentlist', compact('pays'));
    }

    public function hotel(Request $request)
    {
        $filterLocation = $request->input('filter_location');
        $filterOpening = $request->input('filter_opening');

        $query = Hotels::query();

        if ($filterLocation) {
            $query->where('Location', $filterLocation);
        }

        if ($filterOpening) {
            $query->where('Opening', $filterOpening);
        }

        $hotels = $query->get();

        return view('admin.dis', compact('hotels'));
    }
    public function user(Request $request)
    {
        $filterName = $request->input('filter_name');
        $filterEmail = $request->input('filter_email');

        $query = User::query();

        if ($filterName) {
            $query->where('name', $filterName);
        }

        if ($filterEmail) {
            $query->where('email', $filterEmail);
        }

        $users = $query->get();

        return view('admid.userlist', compact('users'));
    }

    public function userhotel(Request $request)
    {
        $filterLocation = $request->input('filter_location');
        $filterOpening = $request->input('filter_opening');

        $query = Hotels::query();

        if ($filterLocation) {
            $query->where('Location', $filterLocation);
        }

        if ($filterOpening) {
            $query->where('Opening', $filterOpening);
        }

        $hotels = $query->get();

        return view('Userdis', compact('hotels'));
    }
}
