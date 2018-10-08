<?php



namespace App;



use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;

use DB;



class PickUp extends Authenticatable

{

    use Notifiable;



    // protected $table = 'panel_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'pickup_master';

    protected $primaryKey = 'pickupId';

    

    public $timestamps = false;

    protected $fillable = [

        'userId', 'userType', 'pickupAddressId', 'actPickUpDate', 'pickupStartTimestamp', 'pickupEndTimestamp', 'isReschedule', 'reScheduleTimestamp', 'driverId', 'pickupType', 'secondaryDriver', 'createdOn', 'updatedOn', 'remarks'

    ];

    public function pickaddress() 
    {

        return $this->belongsTo('App\Address','pickupAddressId');

    }

}

