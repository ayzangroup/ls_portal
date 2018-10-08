<?php



namespace App;



use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

//use App\IndvUserDetails;

class CorpUser extends Authenticatable

{

    protected $table = 'corporate_user_master';

    protected $primaryKey = 'corpCustId';

    protected $hidden = array('corpPassword');

    public $timestamps = false;

    protected $fillable = [

        'corpCustId','corpLsCustId', 'corporationName','corpPassword', 'concernPerson','concernPersonEmail','concerPersonMobile','corpoarateEmail','corpCustStatus','authUserId','auth','authId','socialImage','taxRegNumber','businessCategory','url','createdOn','updatedOn'

    ];



    public function countCorpUser()

    {

        return $this->corpUser()->count();

    }

    public function corpUser()

    {

    

        return $this->all();

    }

    public function corpUserById($id)

    {

    

        return $this->where("corpCustId",'=',$id);

    }

    public function userDescDetails() {

        return $this->hasMany('App\CorpUserDetails','corpCustId');

    }

    public function showAddress() {

        return $this->hasMany('App\Address','objectId');

    }

    public function emailExists($email)

    {

        return $this->findByEmail($email);

        //return $email;

    }

    public function findByEmail($email)

    {

        return DB::table('corporate_user_master')->where('corpoarateEmail', '=', $email)->first();

        //return User::where('email', '=', $email)->first();

    }

    public function corpuserNotification()

    {

        return $this->hasMany('App\NotificationUser','objectId')->where('objectType','=','corp' )->where('isViewed','=','0');

    }

     public function corpuserSms()

    {

        return $this->hasMany('App\SmsUser','objectId')->where('objectType','=','corp' )->where('isViewed','=','0')->orderBy('created_at','desc');

    }

    public function corpuserNotification_old()

    {

        return $this->hasMany('App\NotificationUser','objectId')->where('objectType','=','corp' )->where('isViewed','=','1');

    }

    public function setIndvSessionToken($id){

        $user = new User;

        $sessionToken = $user->generateRandomString(40);

        $token = DB::table('corporate_user_master')->where('corpCustId', '=', $id)->update(["sessionToken" => $sessionToken]);

        if($token)

        return $sessionToken;

        else

        return ""; 

    }

    public function getIndvFromSession($session){

        return DB::table('corporate_user_master')->where('corpCustId', '=', $session)->first();

    }

    public function login($credential)

    {

        $user = array();

        $email = $credential["email"];

        $password = $credential["password"];

        $user =  DB::table('corporate_user_master')->where('corpoarateEmail', '=', $email)->first();

        $check = Hash::check($password, $user->corpPassword);

        if($check)

        return $user;

        else

        return "";



    }

}