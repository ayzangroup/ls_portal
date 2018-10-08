<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Driver extends Authenticatable
{
    //
    protected $table = 'ls_driver_master';
    protected $primaryKey = 'driverId';
    protected $fillable = [
        'driverName', 'email', 'phone', 'addressId', 'status', 'isMobileVerified', 'sEmailVerified', 'profileImage', 'licenseNumber', 'licenseExpiryDate', 'licenseImage', 'nationalIdNumber', 'nationalExpiryDate', 'UIDImage', 'password', 'isAuthorized', 'panNumber', 'createdOn', 'updatedOn', 'platform'
    ];
    public $timestamps = false;

    public function allDriver(){
        return $this->all();
    }

    public function countAllDriver(){
        return $this->allDriver()->count();
    }

    public function driverNotification()

    {

        return $this->hasMany('App\DriverNotification','driverid');

    }

        
}
?>