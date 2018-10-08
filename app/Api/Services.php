<?php

namespace App\Api;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Services extends Authenticatable
{
    use Notifiable;
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
    
    
    protected $table = 'service_master';
    protected $primaryKey = 'serviceId';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'serviceName', 'serviceDescription', 'serviceStartTime', 'serviceEndTime','createdOn'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function getAllServices()
    {
    
        return $this->all();
    }
}
