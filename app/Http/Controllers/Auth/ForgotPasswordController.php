<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


     public function forgot(Request $request)
    {

             $data1 = [
                        'userName'=> $request->email,
                      ];


              $curl = curl_init();
              $headers = ['Content-Type: application/json'];
              $url =    url('/api/sendLinkForgot');
              
                  curl_setopt_array($curl, array(
                  CURLOPT_URL => $url,
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => "",
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 30,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                   CURLOPT_HTTPHEADER => array(
                        // Set Here Your Requesred Headers
                        'Content-Type: application/json',
                    ),
                  CURLOPT_CUSTOMREQUEST => "POST",
                  CURLOPT_POSTFIELDS => json_encode($data1),
            ));

                    $response = curl_exec($curl);
                    $err = curl_error($curl);                   
                     curl_close($curl);

                if (!empty($response))
                {
                    $response_get=json_decode($response);
                    return redirect()->route('/')->with('error_code', 3)->with('message', $response_get->message)->with('status',$response_get->status);
                }
                else
                {
                    echo "cURL Error #:" . $err;         
                }
                // elseif($response_get->message)
                // {
                //   $message=$response_get->message;
                //   return redirect()->route('/')->with('error_code', 3)->with('message', $message)->with('status',$response_get->status);                  
                // }
                
    }
}
