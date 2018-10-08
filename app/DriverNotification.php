<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;


class DriverNotification extends Authenticatable

{

     protected $table = 'driver_notification';

    protected $primaryKey = 'id';

    protected $fillable = [

        'driverid', 'orderid', 'status', 'pickup_later',

    ];

     public function orderdetail()

    {

        return $this->belongsTo('App\Orders','orderid');

    }
        

}

?>