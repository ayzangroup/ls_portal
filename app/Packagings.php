<?php



namespace App;



use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;

use DB;



class Packagings extends Authenticatable

{

    use Notifiable;



    // protected $table = 'panel_user';

    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    protected $table = 'packaging_master';

    protected $primaryKey = 'packagingId';

    

    public $timestamps = false;

    protected $fillable = [

        'packagingName', 'packagingType', 'createdOn'

    ];



    /**

     * The attributes that should be hidden for arrays.

     *

     * @var array

     */

    public function countPackagings()

    {

        return $this->getPackagings()->count();

    }

    public function getPackagings()

    {

    

        return $this->all();

    }

    public function getPackagingsById($id)

    {

    

        return $this->where("packagingId",'=',$id);

    }

    public function getItemPackaging() {

        return $this->belongsTo('App\ItemsPreferences','packagingId');

    }

    

}

