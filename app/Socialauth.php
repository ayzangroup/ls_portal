<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User;
use DB;

class Socialauth
{
    public function __construct(
        User $user
    )
    {
        $this->user = $user;
        //include our social libraries
        // require_once app_path().'/library/facebook/facebook.php';
        // require_once app_path().'/library/twitter/twitteroauth.php';
        // require_once app_path().'/library/vk/VK.php';
        // require_once app_path().'/library/vk/VKException.php';
    }
    use Notifiable;
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'startDay', 'endDay', 'appointmentTime', 'doctorId','createdOn'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
    /**
     * Get Facebook object
     *
     * @return Facebook
     */
    public function facebook()
    {
        /*
		return new \Facebook([
            'appId' => "121777501267237",
            'secret' => "491a4f3f97fbaeb69385b9cc40998b1a"
        ]);
		*/
		        return new \Facebook([
            'appId' => "188297114603175",
            'secret' => "6bc0991707fa2771a0332ec2bfbe5fb2"
        ]);
		
		
    }
    public function usernameExists($username)
    {
        return $this->user->findByUsername($username);
    }
    

    public function emailExists($email)
    {
        return $this->user->findByEmail($email);
        //return $email;
    }

    public function isAMember($auth, $authId,$userType)
    {
        if($userType == "user"){
            return DB::table('individual_user_master')
            ->where('auth', '=', $auth)
            ->where('authId', '=', $authId)
            ->first();
        } else if($userType == "corp"){
            return DB::table('corporate_user_master')
            ->where('auth', '=', $auth)
            ->where('authId', '=', $authId)
            ->first();
        }
        
        //return $authId;
    }
	
	public function isAMemberwidthemailid($email)
    {
        return $this->user->model
            ->where('email_address', '=', $email)
            ->first();
    }
}
