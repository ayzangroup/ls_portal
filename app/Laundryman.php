<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laundryman extends Model
{
    //
    protected $table = 'ls_laundryman_master';
    protected $primaryKey = 'laundryId';
    //protected $hidden = array('password');
    public $timestamps = false;

    public function allLaundryMan(){
        return $this->all();
    }

    public function countAllLaundryMan(){
        return $this->allLaundryMan()->count();
    }
}
