<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use DB, Hash, Mail;
use App\CorpUser;
class Address extends Model
{
    //
    protected $table = 'address_master';
    protected $primaryKey = 'uniqueId';
    //protected $hidden = array('password');
    public $timestamps = false;

    protected $fillable = array('objectId','objectType','companyAddress1','companyAddress2','addressType','buildingType','buildingName','buildingFloor','buildingNumber','isLift','state','city','pincode','countryName','latitude','longitude','createdOn','updatedOn');

    // DEFINE RELATIONSHIPS --------------------------------------------------
    public function indvAddress() {
        return $this->belongsTo('App\User','objectId');
    }
    public function corpAddress() {
        return $this->belongsTo('App\CorpUser','objectId');
    }
    public function getAdresses($address){
        $objectId = $address["objectId"];
        $objectType = $address["objectType"];
        
        if(isset( $address["addressType"]) &&  $address["addressType"] != ""){
            $addressType = $address["addressType"];
            $addresses =  DB::table('address_master')
                        ->where('objectId', '=', $objectId)
                        ->where('objectType', '=', $objectType)
                        ->where('addressType', '=', $addressType);
        } else {
            $addresses =  DB::table('address_master')
                        ->where('objectId', '=', $objectId)
                        ->where('objectType', '=', $objectType);
        }
        
        if($addresses)
        return $addresses;
        else
        return "";
    }
}
