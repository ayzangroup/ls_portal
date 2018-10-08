<?php



namespace App;



use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;



class Laundry extends Authenticatable

{

    //

    protected $table = 'ls_laundryman_master';

    protected $primaryKey = 'laundryId';

    //protected $hidden = array('password');

    public $timestamps = false;

    protected $fillable = [

        'laundryId', 'laundryName', 'email', 'phone', 'addressId', 'status', 'isMobileVerified', 'sEmailVerified', 'profileImage', 'licenseNumber', 'licenseVerify', 'licenseImage', 'nationalIdNumber', 'nationalVerify', 'UIDImage', 'isAuthorized', 'panNumber', 'createdOn', 'updatedOn', 'platform'

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



}

