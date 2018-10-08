<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use View;
use Redirect;

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

    public function forgot_form(Request $request)
    {

      return view::make('driver.forgotpassword');

    }


     public function forgot(Request $request)
    {

             $data1 = [
                        'email'=> $request->email,
                      ];


              $curl = curl_init();
              $headers = ['Content-Type: application/json'];
              $url =    url('/api/driver/sendLinkForgot');
              
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
                    $error=json_decode($response);
                    
                    if(!empty ($error->message))
                    {
                     $errors1=$error->message; 
                    }
                    else
                    {
                      $errors1=$error->error->email;
                    }
                    return redirect::route('driver.login')->with('errors1',$errors1);
                    
                }
                else
                {
                    echo "cURL Error #:" . $err;         
                }
                
                
    }
}
