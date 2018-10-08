<?php
namespace App\Traits;

use DB, Hash, Mail;
use App\Api\APIToken;
use App\Api\User;
use App\Api\CorpUser;
use Validator;

trait GeneralApi
{
    public function validations($request,$type){ 
        $errors = [];
        $error = false;
        if($type == "login"){
            $validator = Validator::make($request->all(),[
                'email' => 'required|email|max:255',
                'password' => 'required',
            ]);
            if($validator->fails()){
                $error = true;
                $errors = $validator->errors();
            }
        } elseif($type == "signup"){
            $validator = Validator::make($request->all(),[
                'email' => 'required|email',
                'name' => 'required',
                'password' => 'required',
                'companyName' => 'required',
                'companyType' => 'required',
            ]);
            if($validator->fails()){
                $error = true;
                $errors = $validator->errors();
            }
        } elseif($type == "forgetpassword"){
            $validator = Validator::make($request->all(),[
                'email' => 'required|email',
            ]);
            if($validator->fails()){
                $error = true;
                $errors = $validator->errors();
            }
        } elseif($type == "addteam"){
            $validator = Validator::make($request->all(),[
                'user' => 'required',
                'companyId' => 'required'
            ]);
            if($validator->fails()){
                $error = true;
                $errors = $validator->errors();
            }
        } elseif($type == "userdetails"){
            $validator = Validator::make($request->all(),[
                'userId' => 'required',
            ]);
            if($validator->fails()){
                $error = true;
                $errors = $validator->errors();
            }
        } elseif($type == "deleteuser"){
            $validator = Validator::make($request->all(),[
                'userId' => 'required',
            ]);
            if($validator->fails()){
                $error = true;
                $errors = $validator->errors();
            }
        } elseif($type == "addeditrole"){
            $validator = Validator::make($request->all(),[
                'roleName' => 'required',
                'companyId' => 'required'
            ]);
            if($validator->fails()){
                $error = true;
                $errors = $validator->errors();
            }
        } elseif($type == "setroleaction"){
            $validator = Validator::make($request->all(),[
                'roleId' => 'required',
                'permission' => 'required'
            ]);
            if($validator->fails()){
                $error = true;
                $errors = $validator->errors();
            }
        } elseif($type == "resetpassword"){
            $validator = Validator::make($request->all(),[
                'userId' => 'required',
                'password' => 'required'
            ]);
            if($validator->fails()){
                $error = true;
                $errors = $validator->errors();
            }
        }
        return ["error" => $error,"errors"=>$errors];
    }
 
    public function generateRandomString($length = 20) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function _checkHeaders() {
        
        $response = array();
        $headers = getallheaders();
        // $isAuthRequired = false;
        // if(!$isAuthRequired){
        //     if(isset($headers["isAuthRequired"])){
        //         if(filter_var($headers["isAuthRequired"], FILTER_VALIDATE_BOOLEAN) === true)
        //         $isAuthRequired = true;
        //     } 
        // }
        // if($isAuthRequired){
            if(!isset($headers["Session-Token"])){   
                $response["code"] = 1043;
                $response["success"] = false;    
                $response["message"] = "Please set Session token";
            } else if(isset($headers["Session-Token"]) && $headers["Session-Token"] == ""){   
                $response["code"] = 1044;
                $response["success"] = false;    
                $response["message"] = "Session token is empty";
            } else {
                $sessionToken = $headers["Session-Token"];
                
                $sessionVar = APIToken::where('apiToken', '=', $sessionToken)->first();
                if(count($sessionVar) > 0){
                    if($sessionVar->userType == "user")
                    $sessionUser = User::where('indvCustId', '=', $sessionVar->userId)->first();
                    if($sessionVar->userType == "corp")
                    $sessionUser = CorpUser::where('corpCustId', '=', $sessionVar->userId)->first();
                    //if (Hash::check($sessionVar->secretKey ,$sessionToken)) 
                    $response = ["code" => 1046,"success" => true, "user" => $sessionUser];
                    // else
                    // $response = ["code" => 1047,"success" => false, "message" => "Invalid token for the user","parentId" =>Hash::check($sessionVar->secretKey ,$sessionToken)];
                } else 
                $response = ["code" => 1045,"success" => false,"message" => "No token associate to user"];
            } 
        // } else {
        //     $response = ["code" => 1049,"success" => false,"message" => ""];
        // }
        return $response;
    }
}