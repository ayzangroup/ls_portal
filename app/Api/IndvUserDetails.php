<?php

namespace App\Api;

use Illuminate\Database\Eloquent\Model;
use App\Api\User;
class IndvUserDetails extends Model
{
    //
    protected $table = 'indv_user_details';
    protected $primaryKey = 'uniqueId';
    //protected $hidden = array('password');
    public $timestamps = false;

    protected $fillable = array('indvCustId','rating','appVersion','remarks','gcmId','gcmUpdatedAt','platform','createdOn');

    // DEFINE RELATIONSHIPS --------------------------------------------------
    public function userDesc() {
        return $this->belongsTo('App\EndUser','indvCustId');
    }
}
