<?php



namespace App;



use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;

use DB;



class Offer extends Authenticatable

{

    use Notifiable;



    // protected $table = 'panel_user';

    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */
    protected $table = 'introducing_customer_offers';

    protected $fillable = [

        'offerCode', 'offerDescription', 'offerImage', 'offerType', 'offerStartDate', 'offerEndDate', 'offerTotalDays', 'introducingCustomerId', 'userType', 'minOrderValue', 'discountPercent', 'maxdiscVal', 'status',

    ];



    /**

     * The attributes that should be hidden for arrays.

     *

     * @var array

     */

    public function noramluser()
    {
        return $this->belongsTo('App\User','indvCustId');
    }


    

}

