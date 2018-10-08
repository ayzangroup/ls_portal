<?php 
namespace App\Traits;
use Validator;
trait Validation
{

public function validations($request,$type){ 
        $errors = [ ];
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
        } elseif($type == "register"){
            $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed'
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
                'superId' => 'required',
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
        }
        return ["error" => $error,"errors"=>$errors];
    }

}