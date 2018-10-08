<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\EndUser;
class IndvUserDetails extends Model
{
    //
    protected $table = 'indv_user_details';
    protected $primaryKey = 'uniqueId';
    //protected $hidden = array('password');
    public $timestamps = false;

    protected $fillable = array('indvCustId','rating','appVersion','remarks');

    // DEFINE RELATIONSHIPS --------------------------------------------------
    public function userDesc() {
        return $this->belongsTo('App\EndUser','indvCustId');
    }
}
