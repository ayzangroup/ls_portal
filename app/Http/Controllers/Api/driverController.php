<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Api\Drivers;

use App\Api\Address;

// use App\Availability;

use JWTAuth;

use Tymon\JWTAuth\Exceptions\JWTException;

use Validator;

use DB, Hash, Mail;

use Illuminate\Support\Facades\Password;

use Illuminate\Mail\Message;

use Illuminate\Mail\Mailer;

use Image;







class driverController extends Controller

{

    public function __construct(

        Drivers $drivers,

        Address $address

    )

    {

        $this->driver = $drivers;

        $this->address = $address;

    }

    



    public function isEmailExist(Request $request)

    {

        $rules = [

            'email' => 'required|email'

           // 'password' => 'required|confirmed|min:6',

        ];

        $input = $request->only(

            'email'

        );

        $validator = Validator::make($input, $rules);

        if($validator->fails()) {

            $error = $validator->messages()->toJson();

            return response()->json(['code'=>401,'success'=> false, 'error'=> $error]);

        }

        $emailExists = $this->driver->emailExists($request->email);

        

        if(count($emailExists) > 0)

        return response()->json(['code'=>200,'success'=> true, 'message'=> 'Email ID already exists']);

        else

        return response()->json(['code'=>500,'success'=> true, 'message'=> 'Email ID does not exist']);

    }



	public function driverlogin(Request $request){

        $rules = [

            'email' => 'required|email',

            'password' => 'required'

        ];

        $input = $request->only(

            'email','password'

        );

        $validator = Validator::make($input, $rules);

        if($validator->fails()) {

            $error = $validator->messages()->toJson();

            return response()->json(['code'=>401,'success'=> false, 'error'=> $error]);

        }

        

    

        $email = $request->email;

        $password = $request->password;	

        

        $user =  Drivers::where('email', $email)->first();

        $check = Hash::check($password,$user->password);

        

        if($check)

        {

            if($user->status == 0)

            return response()->json(['code'=>500,'success' => false, 'data'=> [],'message' => "You are not active drivers."]);

            elseif($user->isAuthorized == 0)

            return response()->json(['code'=>500,'success' => false, 'data'=> [],'message' => "You are not authorized drivers."]);

            else{

                $token = $this->driver->setDriverSessionToken($user->driverId);

                return response()->json(['code'=>200,'success' => true, 'data'=> [ 'token' => $token]]);

            }

        } 

        else 

       {

            return response()->json(['code'=>500,'success' => false, 'data'=>[],'message' => 'User does not exist.']);

        }

                     

    }

    public function getDriverData(){

        $param = array();

        $param["isAuthRequired"] = true;

        //$headers = getallheaders();

        $respData = $this->_checkHeaders($param);

        if($respData["success"]){

            $driver = $respData["data"];

            $addr = ["objectId" => $driver->driverId,"objectType" => "driver"];

            $address = $this->address->getAdresses($addr);

            $driverDetails = array();

            $driverDetails["driverId"] = $driver->driverId;

            $driverDetails["driverName"] = $driver->driverName;

            $driverDetails["address"] = $address;

            $driverDetails["phone"] = $driver->phone;

            $driverDetails["status"] = $driver->status;

            $driverDetails["profileImage"] = $driver->profileImage;

            $driverDetails["licenseNumber"] = $driver->licenseNumber;

            $driverDetails["licenseImage"] = $driver->licenseImage;

            $driverDetails["nationalIdNumber"] = $driver->licenseNumber;

            $driverDetails["UIDImage"] = $driver->UIDImage;

            $driverDetails["panNumber"] = $driver->panNumber;

            $driverDetails["isAuthorized"] = $driver->isAuthorized;



            return response()->json(["code" => 200,"success" => true, "driver" => $driverDetails]);

        } else

        return response()->json($respData);

        // $headers = getallheaders();

        // if(isset($headers["sessionToken"]) && )

    }



    // Check Headers

    public function _checkHeaders() {

        $args = func_get_args();

        $isAuthRequired = false;

        if(count($args) > 0){

            if(count($args[0]) > 0)

            extract($args[0]);

        }

        $response = array();

        

        $headers = getallheaders();



        if(!$isAuthRequired){

            if(isset($headers["isAuthRequired"])){

                if(filter_var($headers["isAuthRequired"], FILTER_VALIDATE_BOOLEAN) === true)

                $isAuthRequired = true;

            }

        }

        // $response = ["code" => 500,"success" => false, "message" => $headers["Token"]];

        // return $response;

        if($isAuthRequired){

            if(isset($headers["Session-Token"]) && $headers["Session-Token"] != ""){   

                $sessionToken = $headers["Session-Token"];    

                $user = DB::table('ls_driver_master')->where('sessionToken', '=', $sessionToken)->first();

                if(!empty($user)){

                    $response = ["code" => 200,"success" => true, "data" => $user];

                } else {

                    $response = ["code" => 500,"success" => false, "message" => "User is not available for this session token","user" => $user];

                } 

            } else {

                $response["code"] = 500;

                $response["success"] = false;

                $response["message"] = "Session Token is not set/empty.";  

            } 

           

        } else {

            $response = ["code" => 500,"success" => false, "message" => "Please set auth required with true value"];

        }

        return $response;

        

    }

    public function getAllHeaders(){

        $headers = getallheaders();

        if(!empty($headers)){

            return response()->json(['code'=>200,'success' => true, 'data'=> ['headers' => $headers ]]);

        } else

            return response()->json(['code'=>500, 'success' => false, 'message'=> 'No Headers']);

    }

	

    public function verifyUser($verification_code)

    {

        $check = DB::table('user_verifications')->where('token',$verification_code)->first();

        if(!is_null($check)){

            $user = User::find($check->user_id);

            if($user->is_verified == 1){

                return response()->json([

                    'success'=> true,

                    'message'=> 'Account already verified..'

                ],200);

            }

            $user->update(['is_verified' => 1]);

            //DB::table('user_verifications')->where('token',$verification_code)->delete();

            return response()->json([

                'code'=>200,

                'success'=> true,

                'message'=> 'You have successfully verified your email address.'

            ]);

        }

        return response()->json(['code'=>500,'success'=> false, 'error'=> "Verification code is invalid."]);



    }

    

    public function sendLinkForgot(Request $request){

        $rules = [

            'email' => 'required|email'

        ];

        $input = $request->only(

            'email'

        );

        $validator = Validator::make($input, $rules);

        if($validator->fails()) {

            $error = $validator->messages()->toJson();

            return response()->json(['code'=>401,'success'=> false, 'error'=> $error]);

        }

            

        $email = $request->email;

        

        $user = $this->driver->emailExists($email);

        if(count($user) > 0){

            $driverId = $user->driverId;

            $userType = "driver";

            if($user->driverName != "") $name = $user->driverName; else $name = "";

        

            if($user->email != ""){

                //$regEmail = $user["email"];

                $verification_code = str_random(30); //Generate verification code

                $expireOn = time() + 1200;

                DB::table('user_verifications')->insert(['objectId'=>$driverId,'objectType'=> $userType,'token'=>$verification_code,'expiredOn' => $expireOn]);



                $data = array('name'=>$name, "verification_code" => $verification_code,"regEmail" => $email,"userType" => $userType);

                Mail::send('email.driver-reset', $data, function($message) use ($data) {

                    $message->to($data['regEmail'], $data['regEmail'])

                            ->subject('Driver Password reset Link');

                    $message->from('info@launderservices.com','Launder Services');

                });

                

                $errors = "";

                if(count(Mail::failures()) > 0){

                    $errors = 'Failed to send password reset email, please try again.';

                    return response()->json(['code'=>500,'success' => false,'message' => $errors]);

                } else

                return response()->json(['code'=>200,'success' => true, 'message' => 'A reset email has been sent! Please check your email.']);

            } else {

                return response()->json(['code'=>401,'success' => false,'message' => "User have no registerd email"]);

            }

        } else {

            $error_message = "User does not exist of this user name.";

            return response()->json(['code'=>401,'success' => false, 'error' => ['email'=> $error_message]]);

        }

                    

            

       

    }

    public function verifyLinkPassword(Request $request)

    {

        $verificationCode = $request->verification_code;

        $userType = $request->userType;

        $currTime = time(); 

        $check = DB::table('user_verifications')

                    ->where('token',$verificationCode)

                    ->where('objectType',$userType)

                    ->first();

        if(!is_null($check)){

            $expiredOn = $diff = 0;

            if(isset($check->expiredOn) && $check->expiredOn)

            $expiredOn = $check->expiredOn;

            if($expiredOn != 0)

            $diff = $expiredOn - $currTime;

            if($diff >= 0){

                DB::table('user_verifications')->where('token',$verificationCode)->delete();

                return \View::make('reset-password')->with(array('userId'=>$check->objectId,'userType' => $userType,'isShow' =>true));

                

                //DB::table('user_verifications')->where('token',$verification_code)->delete();

                // echo response()->json([

                //     'success'=> true,

                //     'message'=> 'You have successfully verified your email address.'

                // ]);

            } else {

                //echo response()->json(['success'=> false, 'error'=> "Validation Key is expired."]);

                return \View::make('reset-password')->with(array('isShow' =>false,'message' => 'Validation Key is expired.'));

            }     

        } else

        return \View::make('reset-password')->with(array('isShow' =>false,'message' => 'Verification code is invalid/used.'));

        //echo response()->json(['success'=> false, 'error'=> "Verification code is invalid."]);



    }

    public function setNewPassword(Request $request)

    {

        if($request->hdUserId != "" && $request->hdUserType != ""){

            $password = $request->txtPassword;

            $userId = $request->hdUserId;

            $userType = $request->hdUserType;

            if($userType == "driver")

            $userUpdate =$this->driver->where('driverId', $userId)->update([ 'password' => Hash::make($password), 'updatedOn' => time()]);

            else if($userType == "laundry")

            $userUpdate =$this->corp->where('laundryId', $userId)->update([ 'password' => Hash::make($password), 'updatedOn' => time()]);

            if($userUpdate)

            return \View::make('show-message')->with(array('message' =>'Password reset successfully','status' => 1));

            else

            return \View::make('show-message')->with(array('message' =>'Some Issue in Password reset','status' => 0));

        } else {

            return \View::make('reset-password')->with(array('isShow' =>false,'message' => 'User Id and User Type is not set.'));

        }

    }


}
	