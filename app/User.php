<?php



namespace App;



use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;

use DB, Hash, Mail;

use App\CorpUser;

use App\Address;



class User extends Authenticatable

{

    use Notifiable;



    protected $table = 'individual_user_master';

    protected $primaryKey = 'indvCustId';

    

    public $timestamps = false;



    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    protected $fillable = [

        'indvCustId','indvLsCustId', 'indvCustName', 'indvCustEmail','indvCustMobile','indvCustPassword','gender','indvCustStatus','authUserId','auth','authId','socialImage','createdOn','updatedOn','sessionToken'

    ];



    /**

     * The attributes that should be hidden for arrays.

     *

     * @var array

     */

    protected $hidden = [

        'indvCustPassword', 'remember_token','sessionToken',

    ];

    public function findByEmail($email)

    {

        return DB::table('individual_user_master')->where('indvCustEmail', '=', $email)->first();

        //return User::where('email', '=', $email)->first();

    }

    public function findByMobile($mobile)

    {

        return DB::table('individual_user_master')->where('indvCustMobile', '=', $mobile)->first();

        //return User::where('email', '=', $email)->first();

    }

    public function emailExists($email)

    {

        return $this->findByEmail($email);

        //return $email;

    }

    public function mobileExists($mobile)

    {

        return $this->findByMobile($mobile);

        //return $email;

    }

    public function userDescDetails() {

        return $this->hasMany('App\IndvUserDetails','indvCustId');

    }

    public function showAddress() {

        return $this->hasMany('App\Address','objectId');

    }

    public function userNotification()

    {

        return $this->hasMany('App\NotificationUser','objectId')->where('objectType','=','user' )->where('isViewed','=','0');

    }

    public function userSms()

    {

        return $this->hasMany('App\SmsUser','objectId')->where('objectType','=','user' )->where('isViewed','=','0')->orderBy('created_at','desc');;

    }

    public function userNotification_old()

    {

        return $this->hasMany('App\NotificationUser','objectId')->where('objectType','=','user' )->where('isViewed','=','1');

    }



    public function setIndvSessionToken($id){

        $sessionToken = $this->generateRandomString(40);

        $token = DB::table('individual_user_master')->where('indvCustId', '=', $id)->update(["sessionToken" => $sessionToken]);

        if($token)

        return $sessionToken;

        else

        return ""; 

    }

    public function getIndvFromSession($session){

        return DB::table('individual_user_master')->where('indvCustId', '=', $session)->first();

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

    public function getUserType($userName){

        

        $userType = "";

        $email = $userName;

        $user = $this->emailExists($email);

        

        if(!empty($user))

            return $user->userType;

        else {

             $corp = new CorpUser();

            $user = $corp->emailExists($email);

            if(!empty($user))

                return $user->userType;

            else 

            return $userType;

        }

    }

    public function login($credential)

    {

        $email = $credential["email"];

        $password = $credential["password"];

        $user =  DB::table('individual_user_master')->where('indvCustEmail', '=', $email)->first();

        $check = Hash::check($password, $user->indvCustPassword);

        if($check)

        return $user;

        else

        return "";

        

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



        if($isAuthRequired){

            if(!isset($headers["sessionToken"])){   

                $response["code"] = 500;

                $response["success"] = false;

                $response["message"] = "Set Session Token in headers.";     

            } else if(isset($headers["sessionToken"]) && $headers["sessionToken"] == ""){   

                $response["code"] = 500;

                $response["success"] = false;

                $response["message"] = "Session Token Not empty.";     

            } else if(!isset($headers["userType"])) {

                $response["code"] = 500;

                $response["success"] = false;

                $response["message"] = "Set User Type in headers.";

            } else if(isset($headers["userType"]) && $headers["userType"] == ""){   

                $response["code"] = 500;

                $response["success"] = false;

                $response["message"] = "User Type Not empty.";     

            } else {

                $userType = $headers["userType"];

                $sessionToken = $headers["sessionToken"];

                if($userType == "user"){

                    $user = DB::table('individual_user_master')->where('sessionToken', '=', $sessionToken)->first();

                    if(!empty($user)){

                        $response = ["code" => 200,"success" => true, "data" => $user];

                    } else {

                        $response = ["code" => 500,"success" => false, "message" => "User is not available for this session token"];

                    }

                } else if($userType == "corp") {

                    $user = DB::table('corporate_user_master')->where('sessionToken', '=', $sessionToken)->first();

                    if(!empty($user)){

                        $response = ["code" => 200,"success" => true, "data" => $user];

                    } else {

                        $response = ["code" => 500,"success" => false, "message" => "User is not available for this session token"];

                    }

                }

            } 

           

        } else {

            $response = ["code" => 500,"success" => false, "message" => "Please set auth required with true value"];

        }

        return $response;

        // } else {

        //     $response["status"] = 1;

        //     $response["message"] = "Valid headers";

        // }

        // return $response;

    }

    

    



}

