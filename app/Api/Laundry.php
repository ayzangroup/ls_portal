<?php

namespace App\Api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB, Hash, Mail;
class Laundry extends Authenticatable
{
    //
    protected $table = 'ls_laundryman_master';
    protected $primaryKey = 'laundryId';
    //protected $hidden = array('password');
    public $timestamps = false;
    protected $fillable = [
        'laundryId', 'laundryName', 'emailId', 'phone', 'addressId', 'status', 'isMobileVerified', 'sEmailVerified', 'profileImage', 'licenseNumber', 'licenseVerify', 'licenseImage', 'nationalIdNumber', 'nationalVerify', 'UIDImage', 'isAuthorized', 'panNumber', 'createdOn', 'updatedOn', 'platform'
    ];

    public function allLaundryMan(){
        return $this->all();
    }

    public function countAllLaundryMan()
    {
        return $this->allLaundryMan()->count();
    }
    public function address() {
        return $this->belongsTo('App\Address','objectId');
    }
    public function emailExists($email)
    {
         return DB::table('ls_laundryman_master')->where('email', '=', $email)->first();
        //return $email;
    }

    public function setLaundrySessionToken($id){
        $sessionToken = $this->generateRandomString(40);
        $token = DB::table('ls_laundryman_master')->where('laundryId', '=', $id)->update(["sessionToken" => $sessionToken]);
        if($token)
        return $sessionToken;
        else
        return ""; 
    }
    public function getLaundryFromSession($session){
        return DB::table('ls_laundryman_master')->where('laundryId', '=', $session)->first();
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
