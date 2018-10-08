<?php

namespace App\Api;

use Illuminate\Database\Eloquent\Model;
use App\EndUser;
class CorpUserDetails extends Model
{
    //
    protected $table = 'corp_user_details';
    protected $primaryKey = 'uniqueId';
    //protected $hidden = array('password');
    public $timestamps = false;

    protected $fillable = array('corpCustId','rating','appVersion','remarks');

    // DEFINE RELATIONSHIPS --------------------------------------------------
    public function userDesc() {
        return $this->belongsTo('App\CorpUser','corpCustId');
    }
}
