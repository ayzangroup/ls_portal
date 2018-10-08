<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Api\User;

use App\Api\IndvUserDetails;

use App\Api\CorpUser;

use App\Api\CorpUserDetails;

use App\Api\Address;

// use App\Availability;

use App\Api\Socialauth;

use App\Api\APIToken;

use DB, Hash, Mail;
use Validator;

use JWTAuth;

use Tymon\JWTAuth\Exceptions\JWTException;

use App\Traits\GeneralApi;

use Illuminate\Support\Facades\Password;

use Illuminate\Mail\Message;

use Illuminate\Mail\Mailer;

use Image;

class AuthController extends Controller
{
    use GeneralApi;
    public function __construct(
        Socialauth $socialauth,
        User $user,
        IndvUserDetails $indvUser,
        Address $address,
        CorpUser $corp,
        CorpUserDetails $corpUser,
        APIToken $apiToken
    )
    {
        $this->socialauth = $socialauth;
        $this->user = $user;
        $this->indvUser = $indvUser;
        $this->corp = $corp;
        $this->corpUser = $corpUser;
        $this->address = $address;
        $this->apiToken = $apiToken;
        //parent::__construct();
    }

    /**

     * API Register

     *

     * @param Request $request

     * @return \Illuminate\Http\JsonResponse

     */

    public function register(Request $request)

    {

        

        $rules = [

            'userType' => 'required',

            'email' => 'required|email'

           // 'password' => 'required|confirmed|min:6',

        ];

        $input = $request->only(

			'userType','email'

        );

        $validator = Validator::make($input, $rules);

        if($validator->fails()) 

        {

            $error = $validator->messages()->toJson();

            return response()->json(['code'=>401,'success'=> false, 'error'=> $error]);

        }

        if(isset($request->authType) && $request->authType == 'social')

        {

            

            $dataS = $this->socialauth->isAMember($request->auth,$request->authId,$request->userType);

            if(count($dataS) > 0)

            {

                $emailExists = $this->user->emailExists($request->email);

                $emailCorpExists = $this->corp->emailExists($request->email);

                if(!empty($emailExists))

                {

                    $token = $this->user->setIndvSessionToken($emailExists->indvCustId);

                    return response()->json(['code'=>200,'success' => true, 'data'=> [ 'token' => $token,'userType' => $request->userType, 'success'=>200]]);

                } 

                else if($emailCorpExists)

                {

                    $token = $this->corp->setIndvSessionToken($emailCorpExists->corpCustId);

                    return response()->json(['code'=>200,'success' => true, 'data'=> [ 'token' => $token,'userType' => $request->userType, 'success'=>200]]);

                }

                // if($request->userType == "user"){

                //     $emailExists = $this->user->emailExists($request->email);	

                //     $token = $this->user->setIndvSessionToken($emailExists->indvCustId);

                //     return response()->json(['code'=>200,'success' => true, 'data'=> [ 'token' => $token,'userType' => $request->userType]]);

                // } else if($request->userType == "corp"){	

                //     $emailCorpExists = $this->corp->emailExists($request->email);

                //     $token = $this->corp->setIndvSessionToken($emailCorpExists->corpCustId);

                //     return response()->json(['code'=>200,'success' => true, 'data'=> [ 'token' => $token,'userType' => $request->userType]]);

                // }           

            } 

            else 

            {

                $firstName = "Anonymous";

                $lastName = "Name";

                $mobile =  $userName = $thumbSimg = $email = $userName = $auth = $authId = $userId = $socialImage = $web_player_id = "";

                if(!empty($request->firstName))

                $firstName = $request->firstName;



                if(!empty($request->lastName))

                $lastName = $request->lastName;

                

                if(!empty($request->email))

                $email = $request->email;



                if(!empty($request->userName))

                $userName = $request->userName;



                if(!empty($request->auth))

                $auth = $request->auth;



                if(!empty($request->authId))

                $authId = $request->authId;



                if(!empty($request->mobile))

                $mobile = $request->mobile;



                if(!empty($request->socialImage))

                $socialImage = $request->socialImage;



                if(!empty($request->userId))

                $userId = $request->userId;

                if(!empty($request->web_player_id))
                $web_player_id = $request->web_player_id;

                $introducedUserPoint = 0; 
                if(isset($request->refer_by) && $request->refer_by != ''){
                    $pointsTable = DB::table('refercode_detail')->first();
                    $isPointUsed = $points = $introducedStatus = 0;
                    $isPointUsed = $pointsTable->pointsUsed;
                    $introducedStatus = $pointsTable->introducepointstatus;
                    
                    $points = $pointsTable->pointearned;
                    if($isPointUsed == 1){
                        $referCode = $request->refer_by;
                            $referUserType = $this->user->getUserTypeByRefer($referCode);
                            if($referUserType == "user"){
                                $referUser = $this->user->where('referralCode','=',$referCode)->first();
                                $referUserId = $referUser->indvCustId;
                                $points = $referUser->points + $points;
                                $referPointUpdate = $this->user->where('indvCustId', $referUserId)->update(['points' => $points]);
                            } else if($referUserType == "corp"){
                                $referUser = $this->corp->where('referralCode','=',$referCode)->first();
                                $referUserId = $referUser->corpCustId;
                                $points = $referUser->points + $points;
                                $referPointUpdate = $this->corp->where('corpCustId', $referUserId)->update(['points' => $points]);
                            }
                        if($introducedStatus == 1)
                        $introducedUserPoint = $pointsTable->introducepointearned;
                    }
                    
                }
               

                $emailExists = $this->user->emailExists($request->email);

                $emailCorpExists = $this->corp->emailExists($request->email);

                if(!empty($emailExists))

                {

                    $id = $emailExists->indvCustId;

                    $userUpdate = $this->user->where('indvCustId', $id)->update(['indvCustName' => $userName,'auth' => $auth,'authId' => $authId,'socialImage' =>  $socialImage,'web_player_id' => $web_player_id,'updatedOn' => time()]);

                    $token = $this->user->setIndvSessionToken($id);

                    return response()->json(['code'=>200,'success' => true, 'data'=> [ 'token' => $token,'userType' => 'user', 'success'=>200]]);

                } else if(!empty($emailCorpExists)){

                    $id = $emailCorpExists->corpCustId;

                    $userUpdate = $this->corp->where('corpCustId', $id)->update(['concernPerson' => $userName,'corporationName' =>  $userName,'auth' => $auth,'authId' => $authId,'socialImage' =>  $socialImage,'web_player_id' => $web_player_id,'updatedOn' => time()]);

                    $token = $this->corp->setIndvSessionToken($id);

                    return response()->json(['code'=>200,'success' => true, 'data'=> [ 'token' => $token,'userType' => 'corp', 'success'=>200]]);

                } else {
                    $seed = str_split('abcdefghijklmnopqrstuvwxyz'.'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.'0123456789!@#$%^&*'); // and any other characters
                   shuffle($seed); // probably optional since array_is randomized; this may be redundant
                   $rand = '';
                   foreach (array_rand($seed, 8) as $k) $rand .= $seed[$k];

                    if($request->userType == "corp"){

                        $corpLsId = "C".time();

                        $userVal =$this->corp->create(['corpLsCustId' => $corpLsId, 'concerPersonMobile' => $mobile, 'corpoarateEmail' => $email, 'corporationName' =>  $userName,'concernPerson' => $userName,'auth' => $auth,'authId' => $authId,'socialImage' =>  $socialImage,'web_player_id' => $web_player_id,'referralCode'=> $rand,'points' => $introducedUserPoint, 'createdOn' => time()]);

                        $token = $this->corp->setIndvSessionToken($userVal->corpCustId);

                        return response()->json(['code'=>200,'success' => true, 'data'=> [ 'token' => $token,'userType' => 'corp', 'success'=>200]]);

                    }

                    if($request->userType == "user"){

                        $indvLsId = "D".time();

                        $userVal =$this->user->create(['indvLsCustId' => $indvLsId, 'indvCustMobile' => $mobile, 'indvCustEmail' => $email,'indvCustName' => $userName,'auth' => $auth,'authId' => $authId,'socialImage' =>  $socialImage, 'web_player_id' => $web_player_id,'referralCode'=> $rand,'points' => $introducedUserPoint,'createdOn' => time()]);

                        $token = $this->user->setIndvSessionToken($userVal->indvCustId);

                        return response()->json(['code'=>200,'success' => true, 'data'=> [ 'token' => $token,'userType' => 'user', 'success'=>200]]);

                    }

                }

            }

         } else {	

            if(isset($request->userType) && $request->userType == 'user'){		 				

                $emailExists = $this->user->emailExists($request->email);	

                $emailCorpExists = $this->corp->emailExists($request->email);			

                if(count($emailExists) > 0){					

                    return response()->json(['code'=>200,'success'=> false, 'message'=> 'user already exists in individual', 'status'=> 'Signup Failed']);				

                } else if(count($emailCorpExists) > 0){

                    return response()->json(['code'=>200,'success'=> false, 'message'=> 'user already exists in corporate', 'status'=> 'Signup Failed']);

                } else {

                    $rules = [

                        'mobileNumber' => 'required',

                        'password' => 'required',

                        'name' => 'required'

                    ];

                    $input = $request->only(

                        'mobileNumber','password','name','userAddress','appVersion','gcmID','platform'

                    );

                    $validator = Validator::make($input, $rules);

                    if($validator->fails()) {

                        $error = $validator->messages()->toJson();

                        return response()->json(['code'=>401,'success'=> false, 'error'=> $error]);

                    }

                    $mobile = $request->mobileNumber;

                    $email = $request->email;

                    $password = $request->password;

                    $name = $request->name;

                    $address = $request->userAddress;



                    $appVersion = $gcmId = $platform = $deviceToken = $gcmUpdatedAt = $deviceTokenUpdatedAt = $web_player_id = " ";

                    if(isset($request->appVersion) && $request->appVersion !="")

                    $appVersion = $request->appVersion;

                    if(isset($request->gcmID) && $request->gcmID !=""){

                        $gcmId = $request->gcmID;

                        $gcmUpdatedAt = time();

                    }

                    if(isset($request->deviceToken) && $request->deviceToken !=""){

                        $deviceToken = $request->deviceToken;

                        $deviceTokenUpdatedAt = time();

                    }

                    $seed = str_split('abcdefghijklmnopqrstuvwxyz'
                    .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                    .'0123456789!@#$%^&*'); // and any other characters
                   shuffle($seed); // probably optional since array_is randomized; this may be redundant
                   $rand = '';
                   foreach (array_rand($seed, 8) as $k) $rand .= $seed[$k];

                    if(isset($request->platform) && $request->platform !="")

                    $platform = $request->platform;

                    if(!empty($request->web_player_id))

                    $web_player_id = $request->web_player_id;

                    $indvLsId = "D".time();

                    $introducedUserPoint = 0;
                    if(isset($request->refer_by) && $request->refer_by != ''){
                        $pointsTable = DB::table('refercode_detail')->first();
                        $isPointUsed = $points = $introducedStatus = 0;
                        $isPointUsed = $pointsTable->pointsUsed;
                        $introducedStatus = $pointsTable->introducepointstatus;
                        
                        $points = $pointsTable->pointearned;
                        if($isPointUsed == 1){
                            $referCode = $request->refer_by;
                            $referUserType = $this->user->getUserTypeByRefer($referCode);
                            if($referUserType == "user"){
                                $referUser = $this->user->where('referralCode','=',$referCode)->first();
                                $referUserId = $referUser->indvCustId;
                                $points = $referUser->points + $points;
                                $referPointUpdate = $this->user->where('indvCustId', $referUserId)->update(['points' => $points]);
                            } else if($referUserType == "corp"){
                                $referUser = $this->corp->where('referralCode','=',$referCode)->first();
                                $referUserId = $referUser->corpCustId;
                                $points = $referUser->points + $points;
                                $referPointUpdate = $this->corp->where('corpCustId', $referUserId)->update(['points' => $points]);
                            }
                            
                            if($introducedStatus == 1)
                            $introducedUserPoint = $pointsTable->introducepointearned;
                        }
                        
                    }

                    $userVal =$this->user->create(['indvLsCustId' => $indvLsId, 'indvCustMobile' => $mobile, 'indvCustEmail' => $email, 'indvCustPassword' => Hash::make($password),'indvCustName' =>  $name, 'web_player_id' => $web_player_id,'referralCode'=> $rand,'points' => $introducedUserPoint,'createdOn' => time()]);

                    if($userVal){

                        $userDetail = $this->indvUser->create(['indvCustId' => $userVal->indvCustId,'appVersion' => $appVersion,'gcmId' => $gcmId,'gcmUpdatedAt' =>$gcmUpdatedAt,'deviceToken'=>$deviceToken,'deviceTokenUpdatedAt'=> $deviceTokenUpdatedAt, 'platform' => $platform,'createdOn' => time()]);

                        //$address = json_decode($address,true);

                        if(count($address) > 0){

                            $compAddress1 = $compAddress2 = $state = $city = $pincode = $countryName = $latitude = $longitude = $buildingType = $buildingName = $buildingFloor = $buildingNumber = ""; 

                            $addressType = "home";

                            $isLift = 0;

                            

                            for($i = 0;$i < count($address);$i++){

                                $objectId = $userVal->indvCustId;

                                $objectType = $request->userType;

                                if(isset($address[$i]["addressType"]) && $address[$i]["addressType"] != "")

                                $addressType = $address[$i]["addressType"];

                    

                                $addr = ["objectId" => $objectId,"objectType" => $objectType,"addressType" => $addressType];

                                $availaddress = $this->address->getAdresses($addr);

                                

                                if(count($availaddress) > 0){

                                    DB::table('address_master')->where(["objectId" => $objectId,"objectType" => $objectType,"addressType" => $addressType])->delete();

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
                                return response()->json(['code'=>201,'success'=> true, 'message'=> 'Thanks for signing up','status'=> 'Signup Successfully','address' => $address]);
                            }

                        }

                        return response()->json(['code'=>201,'success'=> true, 'message'=> 'Thanks for signing up','status'=> 'Signup Successfully']);

                    } else {

                        return response()->json(['code'=>500,'success'=> false, 'message'=> 'Some issue in signup','status'=>'Signup Failed']);

                    }

                    

                }			

            } else if(isset($request->userType) && $request->userType == 'corp'){		 				

                $emailExists = $this->user->emailExists($request->email);	

                $emailCorpExists = $this->corp->emailExists($request->email);			

                if(count($emailExists) > 0){					

                    return response()->json(['code'=>200,'success'=> true, 'message'=> 'user already exists in individual', 'status'=> 'Signup Failed']);				

                } else if(count($emailCorpExists) > 0){

                    return response()->json(['code'=>200,'success'=> true, 'message'=> 'user already exists in corporate', 'status'=> 'Signup Failed']);

                } else {

                    $rules = [

                        'mobileNumber' => 'required',

                        'password' => 'required',

                        'companyName' => 'required'

                    ];

                    $input = $request->only(

                        'mobileNumber','password','companyName','concernPerson','concernEmail','userAddress','appVersion','gcmID','platform','deviceToken'

                    );

                    $validator = Validator::make($input, $rules);

                    if($validator->fails()) {

                        $error = $validator->messages()->toJson();

                        return response()->json(['code'=>401,'success'=> false, 'error'=> $error]);

                    }

                    $mobile = $request->mobileNumber;

                    $email = $request->email;

                    $password = $request->password;

                    $companyName = $request->companyName;

                    $address = $request->userAddress;

                    $concernPerson = $request->concernPerson;

                    $concernEmail = $request->concernEmail;



                    $appVersion = $gcmId = $platform = $deviceToken = $gcmUpdatedAt = $deviceTokenUpdatedAt = $web_player_id = "";

                    if(isset($request->appVersion) && $request->appVersion !="")

                    $appVersion = $request->appVersion;

                    if(isset($request->gcmID) && $request->gcmID !=""){

                        $gcmId = $request->gcmID;

                        $gcmUpdatedAt = time();

                    }    

                    if(isset($request->deviceToken) && $request->deviceToken !=""){

                        $deviceToken = $request->deviceToken;

                        $deviceTokenUpdatedAt = time();

                    }
                    if(!empty($request->web_player_id))

                    $web_player_id = $request->web_player_id;

                    
                    if(isset($request->platform) && $request->platform !="")

                    $platform = $request->platform;

                    $introducedUserPoint = 0;
                    
                       
                    if( $request->refer_by != ''){
                        $pointsTable = DB::table('refercode_detail')->first();
                        $isPointUsed = $points = $introducedStatus = 0;
                        $isPointUsed = $pointsTable->pointsUsed;
                        $introducedStatus = $pointsTable->introducepointstatus;
                        
                        $points = $pointsTable->pointearned;
                        if($isPointUsed == 1){
                            $referCode = $request->refer_by;
                            $referUserType = $this->user->getUserTypeByRefer($referCode);
                            
                            if($referUserType == "user"){
                                $referUser = $this->user->where('referralCode','=',$referCode)->first();
                                $referUserId = $referUser->indvCustId;
                                $points = $referUser->points + $points;
                                $referPointUpdate = $this->user->where('indvCustId', $referUserId)->update(['points' => $points]);
                            } else if($referUserType == "corp"){
                                $referUser = $this->corp->where('referralCode','=',$referCode)->first();
                                $referUserId = $referUser->corpCustId;
                                $points = $referUser->points + $points;
                                $referPointUpdate = $this->corp->where('corpCustId', $referUserId)->update(['points' => $points]);
                            }
                    
                            if($introducedStatus == 1)
                            $introducedUserPoint = $pointsTable->introducepointearned;
                        }
                        
                    }
                    
                    $corpLsId = "C".time();

                    $seed = str_split('abcdefghijklmnopqrstuvwxyz'
                    .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                    .'0123456789!@#$%^&*'); // and any other characters
                   shuffle($seed); // probably optional since array_is randomized; this may be redundant
                   $rand = '';
                   foreach (array_rand($seed, 8) as $k) $rand .= $seed[$k];

                    $userVal =$this->corp->create(['corpLsCustId' => $corpLsId, 'concerPersonMobile' => $mobile,'concernPerson'=>$concernPerson,'concernPersonEmail' => $concernEmail, 'corpoarateEmail' => $email, 'corpPassword' => Hash::make($password),'corporationName' =>  $companyName,'web_player_id' => $web_player_id, 'referralCode'=> $rand,'points' => $introducedUserPoint,'createdOn' => time()]);

                    if($userVal){

                        $userDetail = $this->corpUser->create(['corpCustId' => $userVal->corpCustId,'appVersion' => $appVersion,'gcmId' => $gcmId,'gcmUpdatedAt' =>$gcmUpdatedAt,'deviceToken'=>$deviceToken,'deviceTokenUpdatedAt'=> $deviceTokenUpdatedAt,'platform' => $platform,'createdOn' => time()]);

                        //$address = json_decode($address,true);

                        if(!empty($address)){

                            $compAddress1 = $compAddress2 = $state = $city = $pincode = $countryName = $latitude = $longitude = $buildingType = $buildingName = $buildingFloor = $buildingNumber = ""; 

                            $addressType = "home";

                            $isLift = 0;

                            

                            for($i = 0;$i < count($address);$i++){

                                $objectId = $userVal->corpCustId;

                                $objectType = $request->userType;

                                if(isset($address[$i]["addressType"]) && $address[$i]["addressType"] != "")

                                $addressType = $address[$i]["addressType"];

                    

                                $addr = ["objectId" => $objectId,"objectType" => $objectType,"addressType" => $addressType];

                                $availaddress = $this->address->getAdresses($addr);

                                //return response()->json(['code'=>201,'success'=> true, 'message'=> $availaddress]);

                                if(count($availaddress) > 0){

                                    DB::table('address_master')->where(["objectId" => $objectId,"objectType" => $objectType,"addressType" => $addressType])->delete();

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

                        return response()->json(['code'=>201,'success'=> true, 'message'=> 'Thanks for signing up.','status'=>'Signup Successfully']);

                    } else {

                        return response()->json(['code'=>500,'success'=> false, 'message'=> 'Some issue in signup','status'=>'Signup Failed']);

                    }
                }			
            }
        }

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

        $emailExists = $this->socialauth->emailExists($request->email);

        if(count($emailExists) > 0)
        return response()->json(['code'=>200,'success'=> true, 'message'=> 'Email ID already exists']);
        else
        return response()->json(['code'=>500,'success'=> true, 'message'=> 'Email ID does not exist']);

    }



	public function login(Request $request){
        $userType = $this->user->getUserType($request->userName);
        
        if(!empty($userType)){
            if($userType == "user"){
                $email = $request->userName;
                $password = $request->password;
                //$password = Hash::make($password);
               $emailExists = $this->user->emailExists($email);	
                $isAuth = 0;
                if((isset($emailExists->auth) && $emailExists->auth != "") && (isset($emailExists->authId) && $emailExists->authId != ""))
                $isAuth = 1;	
                $credentials = ['email' => $email,'password' => $password];
                $user = $this->user->login($credentials);
                if(count($user) > 0){
                    $deviceId = "";
                    if(isset($request->deviceId) && $request->deviceId != "")
                    $deviceId = $request->deviceId;
                    $secretKey = $this->generateRandomString(10);
                    $sessionToken = Hash::make($secretKey);
                    $date = date("Y-m-d H:i:s");
                    $token = $this->apiToken->create(['userId' => $user->indvCustId,'userType' => $user->userType,'secretKey' =>$secretKey,'apiToken' => $sessionToken,'deviceId'=> $deviceId,'createdDatetime' => $date]);
                    //$data = ['wallupToken' => $sessionToken,'userData' => $userData];
                    //$token = $this->user->setIndvSessionToken($user->indvCustId);
                    return response()->json(['code'=>200,'success' => true, 'data'=> [ 'token' => $sessionToken,'userType' => $user->userType]]);
                } else {
                    if($isAuth === 1)
                    return response()->json(['code'=>500,'success' => false, 'error' => 'This email exist via social login.Please reset your password on forget passwrd']);
                    else 
                    return response()->json(['code'=>500,'success' => false, 'error' => 'Invalid credential']);
                }  
            } else if($userType == "corp"){
                $email = $request->userName;
                $password = $request->password;
                //$password = Hash::make($password);
                $emailCorpExists = $this->corp->emailExists($email);
                $isAuth = 0;
                if((isset($emailCorpExists->auth) && $emailCorpExists->auth != "") && (isset($emailCorpExists->authId) && $emailCorpExists->authId != ""))
                $isAuth = 1;
                $credentials = ['email' => $email,'password' => $password];
                $user = $this->corp->login($credentials);
                if(count($user) > 0){
                    $deviceId = "";
                    if(isset($request->deviceId) && $request->deviceId != "")
                    $deviceId = $request->deviceId;
                    $secretKey = $this->generateRandomString(10);
                    $sessionToken = Hash::make($secretKey);
                    $date = date("Y-m-d H:i:s");
                    $token = $this->apiToken->create(['userId' => $user->corpCustId,'userType' => $user->userType,'secretKey' =>$secretKey,'apiToken' => $sessionToken,'deviceId'=> $deviceId,'createdDatetime' => $date]);
                    //$token = $this->corp->setIndvSessionToken($user->corpCustId);
                    return response()->json(['code'=>200,'success' => true, 'data'=> [ 'token' => $sessionToken,'userType' => $user->userType]]);
                } else {
                    if($isAuth == 1)
                    return response()->json(['code'=>500,'success' => false, 'error' => 'This email exist via social login.Please reset your password on forget passwrd']);
                    else 
                    return response()->json(['code'=>500,'success' => false, 'error' => 'Invalid credential']);
                }
            }
        } else {
            return response()->json(['code'=>500,'success' => false, 'error' => 'User does not exist.']);
        }    
    }



    public function getUserData($userDet = []){
        $param = array();
        $param["isAuthRequired"] = false;
        $respData = $this->user->_checkHeaders($param);
        if($respData["success"] == true)
        return response()->json($respData);

        else {
            
            $response = array();
            $userId = $userType = "";
            if(isset($userDet["userId"]) && $userDet["userId"] != "")
            $userId = $userDet["userId"];
            if(isset($userDet["userType"]) && $userDet["userType"] != "")
            $userType = $userDet["userType"];

            // $args = func_get_args();

            // if(count($args) > 0){

            //     if(count($args[0]) > 0)

            //     extract($args[0]);

            // }

            if((isset($userId) && $userId != "") && (isset($userType) && $userType != "")){

                if($userType == "user"){

                     $user =  DB::table('individual_user_master')->where('indvCustId', '=', $userId)->first();

                    if(!empty($user)){

                        $response = ["code" => 200,"success" => true, "data" => $user];

                    } else {

                        $response = ["code" => 500,"success" => false, "message" => "User is not available for this id"];

                    }

                } else if($userType == "corp") {

                    $user = DB::table('corporate_user_master')->where('corpCustId', '=', $userId)->first();;

                    if(!empty($user)){

                        $response = ["code" => 200,"success" => true, "data" => $user];

                    } else {

                        $response = ["code" => 500,"success" => false, "message" => "User is not available for this id"];

                    }

                }

            } else {

                $response = ["code" => 500,"success" => false, "message" => "Please set user id and user type","user" => $userDet];

            }

            return response()->json($response);

        }



        // $headers = getallheaders();

        // if(isset($headers["sessionToken"]) && )

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

        $userType = $this->user->getUserType($request->userName);

        if(!empty($userType)){

            if($userType == "user"){

                $email = $request->userName;

                

                $user = $this->user->emailExists($email);

                if(!empty($user)){

                    $userId = $user->indvCustId;

                    if($user->indvCustName != "") $name = $user->indvCustName; else $name = "";

                

                    if($user->indvCustEmail != ""){

                        //$regEmail = $user["email"];

                        $verification_code = str_random(30); //Generate verification code

                        $expireOn = time() + 1200;

                        DB::table('user_verifications')->insert(['objectId'=>$userId,'objectType'=> $userType,'token'=>$verification_code,'expiredOn' => $expireOn]);



                        $data = array('name'=>$name, "verification_code" => $verification_code,"regEmail" => $user->indvCustEmail,"userType" => $userType);

                        Mail::send('email.verify', $data, function($message) use ($data) {

                            $message->to($data['regEmail'], $data['regEmail'])

                                    ->subject('Password reset Link');

                            $message->from('test@muser.co.in','Launder Services');

                        });

                        $errors = "";

                        if(count(Mail::failures()) > 0){

                            $errors = 'Failed to send password reset email, please try again.';

                            return response()->json(['code'=>500,'success' => false,'message' => $errors]);

                        } else

                        return response()->json(['code'=>200,'success' => true, 'message' => 'A reset email has been sent! Please check your email.', 'status' => 'Forgot Password' ]);

                    } else {

                        return response()->json(['code'=>401,'success' => false,'message' => "User have no registerd email", 'status' => 'Forgot Password']);

                    }

                } else {

                    $error_message = "User does not exist of this user name.";

                    return response()->json(['code'=>401,'success' => false,'message' => "User have no registerd email", 'status' => 'Forgot Password','error' => ['email'=> $error_message]]);

                }

                    

            } else if($userType == "corp"){

                $email = $request->userName;

                

                $user = $this->corp->emailExists($email);

                if(!empty($user)){

                    $userId = $user->corpCustId;

                    if($user->corporationName != "") $name = $user->corporationName; else $name = "";

                

                    if($user->corpoarateEmail != ""){

                        //$regEmail = $user["email"];

                        $verification_code = str_random(30); //Generate verification code

                        $expireOn = time() + 1200;

                        DB::table('user_verifications')->insert(['objectId'=>$userId,'objectType'=> $userType,'token'=>$verification_code,'expiredOn' => $expireOn]);



                        $data = array('name'=>$name, "verification_code" => $verification_code,"regEmail" => $user->corpoarateEmail,"userType" => $userType);

                        Mail::send('email.verify', $data, function($message) use ($data) {

                            $message->to($data['regEmail'], $data['regEmail'])

                                    ->subject('Password reset Link');

                            $message->from('info@launderservices.com','Launder Services');

                        });

                        $errors = "";

                        if(count(Mail::failures()) > 0){

                            $errors = 'Failed to send password reset email, please try again.';

                            return response()->json(['code'=>500,'success' => false,'message' => $errors]);

                        } else

                        return response()->json(['code'=>200,'success' => true, 'message' => 'A reset email has been sent! Please check your email.','status' => 'Forgot Password']);

                    } else {

                        return response()->json(['code'=>401,'success' => false,'message' => "User have no registerd email",'status' => 'Forgot Password']);

                    }

                } else {

                    $error_message = "User does not exist of this user name.";

                    return response()->json(['code'=>401,'success' => false,  'message' => ['email'=> $error_message,'message' => "User have no registerd email", 'status' => 'Forgot Password']]);

                }

            }

        } else {

            return response()->json(['code'=>500,'success' => false, 'error' => 'User does not exist.','message' => "User have no registerd email", 'status' => 'Forgot Password']);

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

            if($userType == "user")

            $userUpdate =$this->user->where('indvCustId', $userId)->update([ 'indvCustPassword' => Hash::make($password), 'updatedOn' => time()]);

            else if($userType == "corp")

            $userUpdate =$this->corp->where('corpCustId', $userId)->update([ 'corpPassword' => Hash::make($password), 'updatedOn' => time()]);

            if($userUpdate)

            return \View::make('show-message')->with(array('message' =>'Password reset successfully','status' => 1));

            else

            return \View::make('show-message')->with(array('message' =>'Some Issue in Password reset','status' => 0));

        } else {

            return \View::make('reset-password')->with(array('isShow' =>false,'message' => 'User Id and User Type is not set.'));

        }

    }

    public function userProfileDetails(Request $request)
    {
        $respData = $this->_checkHeaders();
        return response()->json($respData);
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

    

    public function saveAddress(Request $request){

        $userData = [];

        if(isset($request->userId) && isset($request->userType)) 

        $userData = ["userId" => $request->userId, "userType" =>  $request->userType];

        $userExist = $this->getUserData($userData);

        $resp = $userExist;

        

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

                    //return response()->json(['code'=>201,'success'=> true, 'message'=> $availaddress]);

                    if(count($availaddress) > 0){

                        DB::table('address_master')->where(["objectId" => $objectId,"objectType" => $objectType,"addressType" => $addressType])->delete();

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

        $userData = [];

        

        if(isset($request->userId) && isset($request->userType)) 

        $userData = ["userId" => $request->userId, "userType" =>  $request->userType];

        $userExist = $this->getUserData($userData);

        

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

            $availAddress = $this->address->getAdresses($addr);

           

            

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