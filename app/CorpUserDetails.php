<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CorpUser;
class CorpUserDetails extends Model
{
    //
    protected $table = 'corp_user_details';
    protected $primaryKey = 'uniqueId';
    //protected $hidden = array('password');
    public $timestamps = false;

    protected $fillable = array('corpCustId','rating','appVersion','remarks','gcmId','gcmUpdatedAt','platform','createdOn');

    // DEFINE RELATIONSHIPS --------------------------------------------------
    public function userDesc() {
        return $this->belongsTo('App\CorpUser','corpCustId');
    }
}
