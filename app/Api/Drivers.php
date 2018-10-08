<?php

namespace App\Api;

use Illuminate\Database\Eloquent\Model;
use DB, Hash, Mail;
class Drivers extends Model
{
    //
    protected $table = 'ls_driver_master';
    protected $primaryKey = 'driverId';
    //protected $hidden = array('password');
    public $timestamps = false;
    protected $fillable = [
        'driverId','driverName', 'email','phone', 'password','status','profileImage','licenseNumber','licenseImage','licenseVerify','nationalIdNumber','nationalVerify','UIDImage','panNumber','sessionToken','createdOn','updatedOn'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','sessionToken',
    ];
    public function allDriver(){
        return $this->all();
    }

    public function countAllDriver(){
        return $this->allDriver()->count();
    }

    public function emailExists($email)
    {
         return DB::table('ls_driver_master')->where('email', '=', $email)->first();
        //return $email;
    }

    public function setDriverSessionToken($id){
        $sessionToken = $this->generateRandomString(40);
        $token = DB::table('ls_driver_master')->where('driverId', '=', $id)->update(["sessionToken" => $sessionToken]);
        if($token)
        return $sessionToken;
        else
        return ""; 
    }
    public function login($credential)
    {
        $email = $credential["email"];
        $password = $credential["password"];
        $user =  DB::table('ls_driver_master')->where('email', '=', $email)->first();
        //$check = Hash::check($password, $user->password);
        $check = true;
        if($check)
        return $user;
        else
        return "";
        
    }
    public function getDriverFromSession($session){
        return DB::table('ls_driver_master')->where('driverId', '=', $session)->first();
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
     
        
}
?>
