<?php



namespace App;



use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;

use DB;



class Deliver extends Authenticatable

{

    use Notifiable;



    // protected $table = 'panel_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'delivery_master';

    protected $primaryKey = 'deliveryId';

    

    public $timestamps = false;

    protected $fillable = [

        'customerId', 'customerType', 'deliveryLocation', 'driverId', 'actDeliveryTime', 'deliveryStartTime', 'deliveryEndTime', 'ifNotAvailable', 'prefNeighbourName', 'prefNeighbourAddr', 'safePlaceDelivery', 'isDelivery', 'createdOn', 'updatedOn', 'remarks'

    ];

     public function deliveraddress() 
    {

        return $this->belongsTo('App\Address','deliveryLocation');

    }

}

