<?php


namespace App\Http\Controllers\CorpUser;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

use Validator;

use Redirect;

use Auth;

use Input;

use Session;

use App\FaqTitle;

use App\Faq;

use App\ContactUs;

use App\Services;

use App\Category;

use App\Price;

use App\Offer;

use View;

use App\Address;

use App\User;

use App\CorpUser;

use Hash;

use App\NotificationUser;

use Share;

use App\Orders;

use App\OrderDetails;

use App\PickUp;

use App\Deliver;

use DB;

use App\Feedback;

use Paytabs;



class PaymentController extends Controller

{

	public function payment_gateway(Request $request)
		{
			if($request->paymentmethod=='online')
		  {
			$order=Orders::where('orderId',$request->id)->first();

			$user=Auth::guard('corpuser')->user();
			
			$ch = curl_init();

        // For Live Payment
        // curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/');
        // For Test payment
        curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:test_4e7fe5d16e79fac0bf580488efb",
                "X-Auth-Token:test_2ee90580873f847bf5b036acf1d"));
        $payload = Array(
            'purpose' => 'launder services pay',
            'amount' => $order->netAmount,
            'phone' => '8607875212',
            'buyer_name' => 'jattin',
            'redirect_url' => url('/corpuser/returnurl'),
            'send_email' => false,
            'webhook' => 'http://instamojo.com/webhook/',
            'send_sms' => true,
            'email' => 'laracode101@gmail.com',
            'allow_repeated_payments' => false
        );
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch); 
        if ($err) {
                    \Session::put('error','Payment Failed, Try Again!!');
                    return redirect()->back();
                } else {
                    $data = json_decode($response);
                }
                
                
        
                if($data->success == true) 
                {
                    $order->status='4';
                    $order->transactionId=$data->payment_request->longurl;
                    $order->paymentDate=date('Y-m-d');
                    $order->paymentStatus='1';
                    $order->paymentMode='online';
                    $order->save();
                    return redirect($data->payment_request->longurl);
                } 
                else 
                {
                    Session::put('error','Payment Failed, Try Again!!');
                    return redirect()->back();
                }
		}
		else
		{
			
			$order=Orders::find($request->id);
			$order->paymentMode='cash';
			$order->couponDiscValue=$request->couponDiscValue;
			$order->paymentStatus='1';
			$order->paymentDate=date('Y-m-d');
			$order->coupoanid=$request->coupoanid;
			$order->status='4';
			$save=$order->save();
			return redirect::route('corpuser.dashboard');
		}
	    
	    	if($result->response_code == 4012){
		    return redirect($result->payment_url);
	        }
	        return $result->result;
	    }

	

   public function returnurl(Request $request)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payments/'.$request->get('payment_id'));
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:test_4e7fe5d16e79fac0bf580488efb",
                "X-Auth-Token:test_2ee90580873f847bf5b036acf1d"));

        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch); 
        

        if ($err) 
        {
            \Session::put('error','Payment Failed, Try Again!!');
            return redirect()->route('payment');
        } 
        else 
        {
            $data = json_decode($response);
        }
        
        if($data->success == true) 
        {
            if($data->payment->status == 'Credit') 
            {
                
                // Here Your Database Insert Login
                // dd($data);

                \Session::put('success','Your payment has been pay successfully, Enjoy!!');
                return redirect()->route('corpuser.booking');

            } 
            else 
            {
                \Session::put('error','Payment Failed, Try Again!!');
                return redirect()->route('corpuser.booking')->with('success','Your payment has been pay successfully, Enjoy!!');
            }
        } 
        else 
        {
            \Session::put('error','Payment Failed, Try Again!!');
            return redirect()->route('corpuser.booking')->with('error','Payment Failed, Try Again!!');
        }
    }
}