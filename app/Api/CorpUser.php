<?php



namespace App\Api;



use Illuminate\Database\Eloquent\Model;

//use App\IndvUserDetails;

use DB, Hash, Mail;

use App\Api\User;

use App\Api\Address;

class CorpUser extends Model

{

    //

    protected $table = 'corporate_user_master';

    protected $primaryKey = 'corpCustId';

    protected $hidden = array('corpPassword');

    public $timestamps = false;

    protected $fillable = [

        'corpCustId','corpLsCustId', 'corporationName','corpPassword', 'concernPerson','concernPersonEmail','concerPersonMobile','corpoarateEmail','corpCustStatus','authUserId','auth','authId','socialImage',
        'taxRegNumber','businessCategory','url','createdOn','updatedOn','sessionToken','web_player_id','referralCode','referredBy','points'

    ];



    public function countCorpUser()

    {

        return $this->indvUser()->count();

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

