<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Hotels;
use Razorpay\Api\Api;
use App\Models\Payment;



class RazorpayController extends Controller
{
    public function razorpay()
    {        
        $Hotel = Hotels::get();
        return view('Userdis', compact('Hotel'));
    }

    public function payment(Request $request)
{        
    $input = $request->all();   
     
    $api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));
    $payment = $api->payment->fetch($input['razorpay_payment_id']);
    if (count($input) && !empty($input['razorpay_payment_id'])) {
        try {
            $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
        } 
        catch (\Exception $e) {
            Session::put('error', $e->getMessage());
            return redirect()->back();
        }
    }


    
    // Save payment details to the database
    // $hotel_id = $request->input('hotel_id');
    // $name = $request->input('name');
    // $email = $request->input('email');
    // $amount = $request->input('amount');
    // $payment = new Payment;
    // $payment->hotel_id = $hotel_id;
    // $payment->name = $name;
    // $payment->email = $email;
    // $payment->amount = $amount;
    // $payment->save();
    if(count($input) && !empty($input['razorpay_payment_id'])) {
        try {
            // rzp payment status neih ho = create, authorized, captured, failed
            $eventPayment = new Payment();
            $eventPayment->name = "Test Name";
            $eventPayment->email = "test@user.com";
            $eventPayment->phone_number = "9865756576";
            $eventPayment->address = "Test Address";
            $eventPayment->payable_type = EventItem::class;
            $eventPayment->sub_total = $payment['amount'] / 100;
            $eventPayment->tax = 0;
            $eventPayment->discount = 0;
            $eventPayment->total = $payment['amount'] / 100;
            $eventPayment->mode = "online";
            $eventPayment->rzp_payment_id = $input['razorpay_payment_id'];
            $eventPayment->payment_details = "Event booking";
            $eventPayment->status = $response['status'];
            dd($eventPayment);
            $eventPayment->save();

          
        } catch (\Exception $e) {
            return  $e->getMessage();
            Session::put('error',$e->getMessage());
            return redirect()->back();
        }
    }
    
  
    return redirect('/userhotels');
}

}