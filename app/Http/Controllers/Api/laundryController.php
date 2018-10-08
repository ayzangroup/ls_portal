<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Api\Laundry;



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







class LaundryController extends Controller

{

    public function __construct(

        Laundry $laundry,

        Address $address

    )

    {

        $this->laundry = $laundry;

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

        $emailExists = $this->laundry->emailExists($request->email);

        

        if(count($emailExists) > 0)

        return response()->json(['code'=>200,'success'=> true, 'message'=> 'Email ID already exists']);

        else

        return response()->json(['code'=>500,'success'=> true, 'message'=> 'Email ID does not exist']);

    }



	public function laundryLogin(Request $request){

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

        

        $user =  Laundry::where('email', $email)->first();

        $check = Hash::check($password,$user->password);

        

        if(count($user) > 0)

        {

            if($check)

            {

                if($user->status == 0)

                return response()->json(['code'=>500,'success' => false, 'data'=> [],'message' => "You are not active Laundry Man."]);

                elseif($user->isAuthorized == 0)

                return response()->json(['code'=>500,'success' => false, 'data'=> [],'message' => "You are not authorized Laundry Man."]);

                else{

                    $token = $this->laundry->setLaundrySessionToken($user->laundryId);

                    return response()->json(['code'=>200,'success' => true, 'data'=> [ 'token' => $token]]);

                }

            } 

            else 

            {

                return response()->json(['code'=>500,'success' => false, 'error' => 'Password not matched.']);

            }

        }  

        else 

        {

            return response()->json(['code'=>500,'success' => false, 'error' => 'User does not exist.']);

        }

        

                     

    }



    public function getLaundryData(){

        $param = array();

        $param["isAuthRequired"] = true;

        //$headers = getallheaders();

        $respData = $this->_checkHeaders($param);

        if($respData["success"]){

            $laundryMan = $respData["data"];

            $addr = ["objectId" => $laundryMan->laundryId,"objectType" => "laundry"];

            $address = $this->address->getAdresses($addr);

            $laundryDetails = array();

            $laundryDetails["laundryId"] = $laundryMan->laundryId;

            $laundryDetails["laundryName"] = $laundryMan->laundryName;

            $laundryDetails["address"] = $address;

            $laundryDetails["phone"] = $laundryMan->phone;

            $laundryDetails["status"] = $laundryMan->status;

            $laundryDetails["profileImage"] = $laundryMan->profileImage;

            $laundryDetails["licenseNumber"] = $laundryMan->licenseNumber;

            $laundryDetails["licenseImage"] = $laundryMan->licenseImage;

            $laundryDetails["nationalIdNumber"] = $laundryMan->licenseNumber;

            $laundryDetails["UIDImage"] = $laundryMan->UIDImage;

            $laundryDetails["panNumber"] = $laundryMan->panNumber;

            $laundryDetails["isAuthorized"] = $laundryMan->isAuthorized;



            return response()->json(["code" => 200,"success" => true, "laundry" => $laundryDetails]);

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

         $response = ["code" => 500,"success" => false, "message" => $headers["Laundry-Token"]];

        // return $response;

        if($isAuthRequired){

            if(isset($headers["Laundry-Token"]) && $headers["Laundry-Token"] != ""){   

                $sessionToken = $headers["Laundry-Token"];    

                $user = DB::table('ls_laundryman_master')->where('sessionToken', '=', $sessionToken)->first();

                if(!empty($user)){

                    $response = ["code" => 200,"success" => true, "data" => $user];

                } else {

                    $response = ["code" => 500,"success" => false, "message" => "User is not available for this session token","user" => $sessionToken];

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

        

        $user = $this->laundry->emailExists($email);

        if(count($user) > 0){

            $laundryId = $user->laundryId;

            $userType = "laundry";

            if($user->laundryName != "") $name = $user->laundryName; else $name = "";

        

            if($user->email != ""){

                //$regEmail = $user["email"];

                $verification_code = str_random(30); //Generate verification code

                $expireOn = time() + 1200;

                DB::table('user_verifications')->insert(['objectId'=>$laundryId,'objectType'=> $userType,'token'=>$verification_code,'expiredOn' => $expireOn]);



                $data = array('name'=>$name, "verification_code" => $verification_code,"regEmail" => $email,"userType" => $userType);

                Mail::send('email.driver-reset', $data, function($message) use ($data) {

                    $message->to($data['regEmail'], $data['regEmail'])

                            ->subject('Laundry Password reset Link');

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

            

            if($userType == "laundry")

            $userUpdate =$this->laundry->where('laundryId', $userId)->update([ 'password' => Hash::make($password), 'updatedOn' => time()]);

            if($userUpdate)

            return \View::make('show-message')->with(array('message' =>'Password reset successfully','status' => 1));

            else

            return \View::make('show-message')->with(array('message' =>'Some Issue in Password reset','status' => 0));

        } else {

            return \View::make('reset-password')->with(array('isShow' =>false,'message' => 'User Id and User Type is not set.'));

        }

    }



	public function editprofile(Request $request)

    {	

        $rules = [

            'user_type' => 'required'

        ];

        $input = $request->only(

            'fname',

            'mname',

            'lname',

			'profile_picture',

            'mobile_no',

            'email',

			'user_type'

        );

        $validator = Validator::make($input, $rules);

        if($validator->fails()) {

            $error = $validator->messages()->toJson();

            return response()->json(['code'=>400,'success'=> false, 'error'=> $error]);

        }

        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {

                return response()->json(['code'=>404,'success' => false, 'error' => 'User Not found']);

                //return response()->json(['user_not_found'], 404);

            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['code'=>500,'success' => false, 'error' => 'Token is expired or invalid user']);

            //return response()->json(['token_expired'], $e->getStatusCode());

    

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['code'=>500,'success' => false, 'error' => 'Token is invalid']);

            //return response()->json(['token_invalid'], $e->getStatusCode());

    

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['code'=>500,'success' => false, 'error' => 'Token is absent']);

            //return response()->json(['token_absent'], $e->getStatusCode());

        }



        $user = compact('user');

        $userDetail = $user['user'];

        $id = $userDetail['id'];

        $email = $userDetail['email'];

        $mbNumber = $userDetail['mobile_no'];

        $fName = $userDetail['fname'];

        $mName = $userDetail['mname'];

        $lName = $userDetail['lname'];

        $profilPic = $userDetail['profile_picture'];

        $thumbPic = $userDetail['thumb_profile_picture'];



        $mobile = $fname = $mname = $lname =  $flSaName = $thumbSimg = $emailId = "";

        if(!empty($request->mobile_no))

        $mobile = $request->mobile_no;

        else

        $mobile = $mbNumber;



        if(!empty($request->email))

        $emailId = $request->email;

        else

        $emailId = $email;



        if(!empty($request->fname))

        $fname = $request->fname;

        else

        $fname = $fName;

        

        if(!empty($request->mname))

        $mname = $request->mname;

        else

        $mname = $mName;



        if(!empty($request->lname))

        $lname = $request->lname;

        else

        $lname = $lName;

		

        $usertype = strtolower($request->user_type);

        

        if(!empty($request->profile_picture)){

                 // For upload image 0f base 64

            $desPath = public_path('/assets/user/original/');

            $img = $request->profile_picture;

            $img = str_replace('data:image/jpeg;base64,', '', $img);

            $img = str_replace(' ', '+', $img);

            $data = base64_decode($img);

            $fileName = uniqid() . '.jpeg';

            $flSaName = '/assets/user/original/'. $fileName;

            $file = $desPath . $fileName;   

            $success = file_put_contents($file, $data);



            //$file = $request->file('profile_picture');

            $destinationPath = public_path('/assets/user/thumbnail/');

            $thumbImage = 'thumb-'. $fileName;

            $thumbSimg = '/assets/user/thumbnail/'. $thumbImage;

            $imagename = $destinationPath .$thumbImage;

            $succThumb = file_put_contents($imagename, $data);

        } else {

            $flSaName = $profilPic;

            $thumbSimg = $thumbPic;

        }

       

        

        $userUpdate = User::where('id', $id)->update(['thumb_profile_picture' => $thumbSimg, 'profile_picture' => $flSaName,'email'=>$emailId,'mobile_no' => $mobile, 'fname' => $fname, 'mname' => $mname, 'lname' => $lname,'user_type' => $usertype, 'updated_at' => NOW()]);



        if($userUpdate)

        return response()->json(['code'=>201,'success' => true,'message' => "Profile data successfully updated"]);

         else

         return response()->json(['code'=>500,'success' => false,'message' => "some issue occur in updating Profile"]);



    }

    

	

	public function updateprofile(Request $request, $id)

    {	

        $User = User::with('users')->find($id);

        if(!$User) {

            return response('User not found', 404);

        }



        $UserInfo = $User->users;

        if(!$UserInfo) {

            $UserInfo = new UserInfo();

            $UserInfo->id = $id;

            $UserInfo->save();

            return response('User found', 200);

        }



        try {

            $values = Input::only($UserInfo->getFillable());

            $UserInfo->update($values);

        } catch(Exception $ex) {

            return response($ex->getMessage(), 400);

        }		  

    }

    public function logout(Request $request) {

        // $rules = [

        //     'token' => 'required'

        // ];

        // $input = $request->only(

        //     'token'

        // );

        // $validator = Validator::make($input, $rules);

        // if($validator->fails()) {

        //     $error = $validator->messages()->toJson();

        //     return response()->json(['code'=>401,'success'=> false, 'error'=> $error]);

        // }

        

        try {

            JWTAuth::invalidate($request->input('token'));

            return response()->json(['code' => 200,'success' => true, 'message'=> "You have successfully logged out."]);

        // } catch (JWTException $e) {

        //     // something went wrong whilst attempting to encode the token

        //     return response()->json(['code' => 500,'success' => false, 'error' => 'Failed to logout, please try again.']);

        // }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['code'=>500,'success' => false, 'error' => 'Token is expired or invalid user']);

            //return response()->json(['token_expired'], $e->getStatusCode());

    

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['code'=>500,'success' => false, 'error' => 'Token is invalid']);

            //return response()->json(['token_invalid'], $e->getStatusCode());

    

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['code'=>500,'success' => false, 'error' => 'Token is absent']);

            //return response()->json(['token_absent'], $e->getStatusCode());

        }

    }

    public function saveAddress(Request $request){

        $userExist = $this->getUserData();

        $resp = $userExist;

        //return response()->json(["user" => $userExist->original]);

        $userExist = $userExist->original;

        //return response()->json(['code'=>500,'success'=> false, 'message'=> "No Data Found","user" => gettype($userExist)]);

        if($userExist["code"] == 200){

            $rules = [

                'address' => 'required'

            ];

            $input = $request->only(

                'address'

            );

            $validator = Validator::make($input, $rules);

            if($validator->fails()) {

                $error = $validator->messages()->toJson();

                return response()->json(['code'=>401,'success'=> false, 'mesaage'=> $error]);

            } 

            

            $userData = $userExist["data"];

            $objectType = $userData->userType;



            if($objectType == "user")

            $objectId =  $userData->indvCustId;

            else if($objectType == "corp")

            $objectId =   $userData->corpCustId;



            $address = $request->address;     

            //$address = json_decode($address,true);

            

            if(!empty($address)){

                $compAddress1 = $compAddress2 = $state = $city = $pincode = $countryName = $latitude = $longitude = $buildingType = $buildingName = $buildingFloor = $buildingNumber = ""; 

                $addressType = "home";

                $isLift = 0;

                

                for($i = 0;$i < count($address);$i++){

                    

                    if(isset($address[$i]["addressType"]) && $address[$i]["addressType"] != "")

                    $addressType = $address[$i]["addressType"];

        

                    $addr = ["objectId" => $objectId,"objectType" => $objectType,"addressType" => $addressType];

                    $availaddress = $this->address->getAdresses($addr);

                    if(!empty($availaddress)){

                        $availaddress->delete();

                    }

                    if(isset($address[$i]["line1"]) && $address[$i]["line1"] != "")

                    $compAddress1 = $address[$i]["line1"];

                    if(isset($address[$i]["line2"]) && $address[$i]["line2"] != "")

                    $compAddress2 = $address[$i]["line2"];

                    if(isset($address[$i]["buildingType"]) && $address[$i]["buildingType"] != "")

                    $buildingType = $address[$i]["buildingType"];

                    if(isset($address[$i]["buildingName"]) && $address[$i]["buildingName"] != "")

                    $buildingName = $address[$i]["buildingName"];

                    if(isset($address[$i]["buildingFloor"]) && $address[$i]["buildingFloor"] != "")

                    $buildingFloor = $address[$i]["buildingFloor"];

                    if(isset($address[$i]["buildingNumber"]) && $address[$i]["buildingNumber"] != "")

                    $buildingNumber = $address[$i]["buildingNumber"];

                    if(isset($address[$i]["isLift"]) && $address[$i]["isLift"] != "")

                    $isLift = $address[$i]["isLift"];

                    if(isset($address[$i]["state"]) && $address[$i]["state"] != "")

                    $state = $address[$i]["state"];

                    if(isset($address[$i]["city"]) && $address[$i]["city"] != "")

                    $city = $address[$i]["city"];

                    if(isset($address[$i]["pincode"]) && $address[$i]["pincode"] != "")

                    $pincode = $address[$i]["pincode"];

                    if(isset($address[$i]["countyName"]) && $address[$i]["countyName"] != "")

                    $countryName = $address[$i]["countyName"];

                    if(isset($address[$i]["latitude"]) && $address[$i]["latitude"] != "")

                    $latitude = $address[$i]["latitude"];

                    if(isset($address[$i]["longitude"]) && $address[$i]["longitude"] != "")

                    $longitude = $address[$i]["longitude"];

                    $saveUserAdd = $this->address->create(['objectId' => $objectId,'objectType' => $objectType,'companyAddress1' => $compAddress1,'companyAddress2'=> $compAddress2,

                    'addressType' => $addressType,'buildingType' => $buildingType,'buildingName' => $buildingName,'buildingFloor' => $buildingFloor,'buildingNumber' => $buildingNumber,

                    'isLift' => $isLift,'state' => $state,'city' => $city,'pincode'=> $pincode,'countryName'=> $countryName,'latitude'=> $latitude,'longitude' => $longitude,'createdOn' => time()]);

                    

                }

            }

                if($saveUserAdd)

                return response()->json(['code'=>201,'success'=> true, 'message'=> 'Address details saved successfully.']);

                else 

                return response()->json(['code'=>500,'success'=> false, 'message'=> 'Some issue in saved address details']);

             

           

        } else {

            return $resp;

        }

    }

    public function getAddress(Request $request){

        $userExist = $this->getUserData();

        $resp = $userExist;

        //return response()->json(["user" => $userExist->original]);

        $userExist = $userExist->original;

        //return response()->json(['code'=>500,'success'=> false, 'message'=> "No Data Found","user" => gettype($userExist)]);

        if($userExist["code"] == 200){

           

            $userData = $userExist["data"];



            $objectType = $userData->userType;

            if($objectType == "user")

            $objectId =  $userData->indvCustId;

            else if($objectType == "corp")

            $objectId =   $userData->corpCustId;



            $addr = ["objectId" => $objectId,"objectType" => $objectType];

            $availAddress = $this->address->getAdresses($addr)->get();

            

            

            if(!empty($availAddress)){

                return response()->json(['code'=>200,'success'=> true, "address" => $availAddress]);

            } else {

                return response()->json(['code'=>500,'success'=> false, 'message'=> "No Data Found"]);

            }

        } else {

            return $resp;

        }

    }

}