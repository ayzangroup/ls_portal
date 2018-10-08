<?php



namespace App;



use Illuminate\Database\Eloquent\Model;

use App\Items;

class ItemsPreferences extends Model

{

    //

    protected $table = 'ls_item_packaging';

    protected $primaryKey = 'uniqueId';

    //protected $hidden = array('password');

    public $timestamps = false;



    protected $fillable = array('itemId','packageId','price','quantity','createdOn');



    public function getPackageById($id)

    {

        return $this->where("itemId",'=',$id);

    }



    // DEFINE RELATIONSHIPS --------------------------------------------------

    public function preferencesItems() {

        return $this->belongsTo('App\Items','itemId');

    }

    public function getItemPackaging() {

        return $this->belongsTo('App\Packagings','packageId');

    }

}

