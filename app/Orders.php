<?php



namespace App;



use Illuminate\Database\Eloquent\Model;



class Orders extends Model

{

    //

    protected $table = 'order_master';
    protected $primaryKey = 'orderId';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'orderId', 'orderLsId', 'userId','userType','driverId','laundryId','itemCount','status','orderValue','netAmount','serviceId','pickupId','deliveryId','taxAmount','paymentStatus','transactionId','paymentDate','createdOn','updatedOn','remarks','paymentMode'
    ];

    //protected $hidden = array('password');

    public $timestamps = false;



    public function orders(){

        return $this->all();

    }



    public function countOrder(){

        return $this->orders()->count();

    }



    public function countOrderWithStatus($status)

    {

        return $this->orderWithStatus($status)->count();

    }



    public function orderWithStatus($status)

    {
        return $this->orders()->where('status','>=', $status);

    }

    public function itemDetails() 
    {

        return $this->hasMany('App\OrderDetails','orderId');

    }
    public function service() 
    {

        return $this->belongsTo('App\Services','serviceId');

    }

    public function pickId() 
    {

        return $this->belongsTo('App\PickUp','pickupId');

    }
    public function deliverId() 
    {
        return $this->belongsTo('App\Deliver','deliveryId');
    }
    public function user_details()
    {
        return $this->belongsTo('App\User','userId');
    }
    public function corp_details()
    {
        return $this->belongsTo('App\CorpUser','userId');
    }



}

