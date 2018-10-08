<?php



namespace App\Http\Controllers\Auth;



use App\User;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;

use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

use App\CorpUser;



class RegisterController extends Controller

{

    /*

    |--------------------------------------------------------------------------

    | Register Controller

    |--------------------------------------------------------------------------

    |

    | This controller handles the registration of new users as well as their

    | validation and creation. By default this controller uses a trait to

    | provide this functionality without requiring any additional code.

    |

    */



    use RegistersUsers;



    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    protected $redirectTo = '/home';



    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()

    {

        $this->middleware('guest');

    }



    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validator(array $data)

    {

        return Validator::make($data, [

            'name' => 'required|string|max:255',

            'password' => 'required|string|min:6|confirmed',

        ]);

    }



    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

   

    public function register(Request $request)

    {



    if($request->userType == 'user')

    {

        $userType=$request->userType;

        $email=$request->email;

        $mobile=$request->phone;

        $password=$request->password;

        $name=$request->name;

        $line1=$request->line1;

        $line2=$request->line2;

        $city=$request->city;

        $state=$request->state;

        $pincode=$request->pincode;
        $refer_by=$request->refer_code;

        $web_player_id=$request->web_player_id;

                        

        $address[]=array( "line1" => $line1,

                   "line2" => $line2,

                   "city" =>  $city,

                   "state" => $state,

                   "pincode" => $pincode,

                   "countyName" => 'India',

                   "addressType" => "home"

                    );





              $data1 = [

                        'userType'=> $userType,

                        'email'=> $email,

                        'mobileNumber'=>$mobile,

                        'password'=> $password,

                        'name' => $name,

                        'web_player_id' => $web_player_id,

                        'userAddress' => $address,

                        'refer_by' => $refer_by 

                        ];

       }



       

        elseif($request->userType == 'corp')

        {
        

            $userType=$request->userType;

            $email=$request->email1;

            $mobile=$request->mobile;

            $password=$request->password;    

            $concernPerson=$request->concernperson;            

            $companyName=$request->companyname;

            $concernEmail=$request->concernemail;

            $line1=$request->line1;

            $line2=$request->line2;

            $city=$request->city;

            $state=$request->state;

            $pincode=$request->pincode;

            $web_player_id=$request->web_player_id;

            $refer_by=$request->refer_code;


        $data[]=[

                   "line1" => $line1,

                   "line2" => $line2,

                   "city" =>  $city,

                   "state" => $state,

                   "pincode" => $pincode,

                   'web_player_id' => $web_player_id,

                   "countyName" => 'India',

                   "addressType" => "home",

                   
                    ];



             $data1 = ['userType'=> $userType,'email'=> $email,'mobileNumber'=>$mobile,'password'=> $password,'concernPerson'=> $concernPerson,'concernEmail'=>$concernEmail,'companyName'=>$companyName,'userAddress' => $data,'gcmId' => '','refer_by' => $refer_by];

        

        }



              $curl = curl_init();

              $headers = ['Content-Type: application/json'];

              $url = url('/api/register');



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

