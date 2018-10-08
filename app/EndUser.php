<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\IndvUserDetails;
class EndUser extends Model
{
    //
    protected $table = 'individual_user_master';
    protected $primaryKey = 'indvCustId';
    protected $hidden = array('indvCustPassword');
    public $timestamps = false;
    protected $fillable = [
        'indvCustId','indvLsCustId', 'indvCustName', 'indvCustEmail','indvCustMobile','indvCustPassword','gender','indvCustStatus','createdOn','updatedOn'
    ];

    public function countIndvUser()
    {
        return $this->indvUser()->count();
    }
    public function indvUser()
    {
    
        return $this->all();
    }
    public function indvUserById($id)
    {
    
        return $this->where("indvCustIdPrimary",'=',$id);
    }
    public function userDescDetails() {
        return $this->hasMany('App\IndvUserDetails','indvCustId');
    }
    
}
