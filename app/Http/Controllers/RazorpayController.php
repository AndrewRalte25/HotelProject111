<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Hotels;
use App\Models\invoice;
use Razorpay\Api\Api;
use App\Models\Payment;
use Illuminate\Support\Facades\App;



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

    if(count($input) && !empty($input['razorpay_payment_id'])) {
        try {
            
            $Payment = new Payment();
            $Payment->name =$request->name;
            $Payment->email = $request->email;
            $Payment->hotel_id = $request->hotelid;
            $Payment->amount = $request->price/100 ;
            $Payment->room_number = $request->roomnumber;
            $Payment->payment_id = $input['razorpay_payment_id'];
           
            $Payment->save();

          
        } catch (\Exception $e) {
            return  $e->getMessage();
            Session::put('error',$e->getMessage());
            return redirect()->back();
        }
    }
    
    
    return redirect('/invoice/' . $Payment->id . '/' . $Payment->hotel_id);

}
public function invoice($id,$hotelid)
{   
    $hot = Hotels::findOrFail($hotelid);
    $order = Payment::where('id', $id)->first();
    $pdf = App::make('dompdf.wrapper');
    $pdf->loadView('invoice', compact('order','hot'))->setOptions(['defaultFont' => 'sans-serif']);
    $pdf->setPaper(array(0, 0, 396, 612));
    return $pdf->stream();
}


}