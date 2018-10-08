<?php



namespace App;



use Illuminate\Database\Eloquent\Model;

//use App\IndvUserDetails;

class Items extends Model

{

    //

    protected $table = 'ls_gen_items';

    protected $primaryKey = 'itemId';

    //protected $hidden = array('indvCustPassword');

    public $timestamps = false;

    protected $fillable = [

        'itemCode','itemDesc', 'categoryId', 'isChargeable','itemStatus','isServiceAvailable','itemListStatus','createdOn','createdBy','updatedOn','updatedBy','remarks'

    ];



    public function countIndvUser()

    {

        return $this->indvUser()->count();

    }

    public function getItems()

    {

    

        return $this->all();

    }

    public function getItemsById($id)

    {

    

        return $this->where("itemId",'=',$id);

    }

    public function itemsPreferences() {

        return $this->hasMany('App\ItemsPreferences','itemId');

    }

    public function itemsCategory() {
        return $this->belongsTo('App\Category','categoryId');
    }

    public function price() {

        return $this->hasMany('App\Price','itemId');

    }

    public function packaging() {

        return $this->hasOne('App\ItemsPreferences','itemId');

    }
    

}

