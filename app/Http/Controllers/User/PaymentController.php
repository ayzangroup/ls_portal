<?php


namespace App\Http\Controllers\User;

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

use App\Driver;

use App\Offer;

use View;

use App\Address;

use App\User;

use App\CorpUser;

use Hash;

use App\NotificationUser;

use App\DriverNotification;

use Share;

use App\Orders;

use App\OrderDetails;

use App\PickUp;

use App\Deliver;

use DB;

use App\Feedback;

use Paytabs;

use App\Traits\SendNotification;


class PaymentController extends Controller

{

	use SendNotification;//trait for send notifications

	public function payment_gateway(Request $request)
		{

		  if($request->paymentmethod=='online')
		  {
			$order=Orders::where('orderId',$request->id)->first();
			$total=$request->payment;
			$user=Auth::guard('user')->user();
			
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
            'phone' => $user->indvCustMobile,
            'buyer_name' => $user->indvCustName,
            'redirect_url' => url('/user/returnurl'),
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

			$order->pickaddress=$order->pickId->pickaddress->companyAddress1;
	        $order->pickcity=$order->pickId->pickaddress->city;
	        $order->pickstate=$order->pickId->pickaddress->state;
	        $order->pickpincode=$order->pickId->pickaddress->pincode;

	        $order->deliveraddress=$order->deliverId->deliveraddress->companyAddress1;
	        $order->delivercity=$order->deliverId->deliveraddress->city;
	        $order->deliverstate=$order->deliverId->deliveraddress->state;
	        $order->deliverpincode=$order->deliverId->deliveraddress->pincode;


			if($save)
			{

       			$content1 = array(

           			"en" => "".'Item quantity:'.$order->itemCount.
           					',  Amount:'.$order->netAmount.
           					',  Address:'.$order->pickaddress.
           					',  City:'.$order->pickcity.
           					',  State:'.$order->pickstate."",

           		);

       			$title = array(

           			"en" => "".'New Order Booking'.""

           		);
           		$url='';
           		$image='';
           		
       			$users=Driver::all();

       			foreach($users as $user)

       			{

            		if($user->web_player_id!="")

            		{

                		$web_player_id[]=$user->web_player_id;
                		$insert=new DriverNotification($request->all());
					    $insert->orderid=$request->id;
					    $insert->driverid=$user->driverId;
					    $insert->status='0';
					    $insert->pickup_later='0';
					    $insert_data=$insert->save();

            		}

       			}


       				if($web_player_id!="")

       				{

            			$web_player_id=implode(',',$web_player_id);

            			$result1=$this->one_to_one($web_player_id,$content1,$url,$title,$image);

       				}
			}

			return redirect::route('user.dashboard');
		}
	    
	    	
	}

	

//   public function payment_completed(Request $request)
//   {
// 		$payment_reference=$request->payment_reference;
// 		$pt = Paytabs::getInstance("info@ayzangroup.com", "efELOXVUtZTyRwaobLUFfpvmk7Nfh0Ovftg4qbZUbSs2pDqAokfEKL05TNkaN9F3CW7386XjYqln3MYs7e6RZ6WSTg2HqIK2FR6N");
//     	$result = $pt->verify_payment($payment_reference);
//     	if($result->response_code == 100)
//     	{
        	
//     	}
//     	$orderId=(Session::get('orderId'));
//     	$update=Orders::where('orderId',$orderId[0])->update(['status'=>3]);
//     	return redirect::route('user.dashboard');

//   }

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
                return redirect()->route('user.booking');

            } 
            else 
            {
                \Session::put('error','Payment Failed, Try Again!!');
                return redirect()->route('user.booking')->with('success','Your payment has been pay successfully, Enjoy!!');
            }
        } 
        else 
        {
            \Session::put('error','Payment Failed, Try Again!!');
            return redirect()->route('user.booking')->with('error','Payment Failed, Try Again!!');
        }
    }


}