<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB, Hash, Mail;

class GeneralStatic extends Model
{
    //
    // protected $table = 'ls_driver_master';
    // protected $primaryKey = 'driverId';
    //protected $hidden = array('password');
    //public $timestamps = false;

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
