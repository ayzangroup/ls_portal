<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Profile;

use JWTAuth;

use Tymon\JWTAuth\Exceptions\JWTException;

use Validator;

use DB, Hash, Mail;

use Illuminate\Support\Facades\Password;

use Illuminate\Mail\Message;

use Illuminate\Mail\Mailer;

use Image;





class ProfileController extends Controller

{

    

   public function userprofile(Request $request)

	{

		

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



	// the token is valid and we have found the user via the sub claim

		$user = compact('user');

        $userDetail = $user['user'];

        $data = array();

        $data['id'] = $userDetail['id'];

        $data['email'] = $userDetail['email'];

        $data['mobile_no'] = $userDetail['mobile_no'];

        $data['fname'] = $userDetail['fname'];

        if(isset($userDetail['mname']) && $userDetail['mname'] != "")

        $data['mname'] = $userDetail['mname'];

        else

        $data['mname'] = "";

        if(isset($userDetail['lname']) && $userDetail['lname'] != "")

        $data['lname'] = $userDetail['lname'];

        else

        $data['lname'] = "";

        if(isset($userDetail['profile_picture']) && $userDetail['profile_picture'] != ""){

            //$data['profile_picture'] = "http://muser.co.in/sandbox/medical/public".$userDetail['profile_picture'];

            $data['profile_picture'] = "http://localhost:8081/medical-test/public".$userDetail['profile_picture'];

        } else {

            if(isset($userDetail['socialImage']) && $userDetail['socialImage'] != "")

            $data['profile_picture'] = $userDetail['socialImage'];

            else

            $data['profile_picture'] = "";

        }



        $data['thumb_profile_picture'] = $userDetail['thumb_profile_picture'];

        $data['user_type'] = $userDetail['user_type'];

        $data['speciality'] = $userDetail['speciality'];

        $data['user_bio'] = $userDetail['user_bio'];

        $data['userName'] = $userDetail['userName'];

        $data['auth'] = $userDetail['auth'];

        $data['authId'] = $userDetail['authId'];

        $data['socialImage'] = $userDetail['socialImage'];

        $data['userId'] = $userDetail['userId'];

        $data['created_on'] = $userDetail['created_on'];

        $data['remember_token'] = $userDetail['remember_token'];

        $data['created_at'] = $userDetail['created_at'];

        $data['updated_at'] = $userDetail['updated_at'];

        $data['is_verified'] = $userDetail['is_verified'];



        return response()->json(['user' => $data,'code' => 200]);

	}



}