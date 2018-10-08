<?php 
namespace App\Api;

use Illuminate\Database\Eloquent\Model;
use DB, Hash, Mail;

class APIToken extends Model
{
	protected $table = 'api_users';
	public $timestamps = false;

	protected $fillable = [ 'apiToken', 'userId', 'userType','secretKey','deviceId','active','isDeleted','refreshToken', 'expiresIn' ];
	
}
