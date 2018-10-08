<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drivers extends Model
{
    //
    protected $table = 'ls_driver_master';
    protected $primaryKey = 'driverId';
    //protected $hidden = array('password');
    public $timestamps = false;

    public function allDriver(){
        return $this->all();
    }

    public function countAllDriver(){
        return $this->allDriver()->count();
    }

        
}
?>
