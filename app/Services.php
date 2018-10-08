<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class Services extends Authenticatable
{
    use Notifiable;

    // protected $table = 'panel_user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'service_master';
    protected $primaryKey = 'serviceId';
    
    public $timestamps = false;
    protected $fillable = [
        'serviceName','serviceDescription','serviceSlug', '	serviceStartTime','serviceEndTime','createdOn'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function countServices()
    {
        return $this->getServices()->count();
    }
    public function getServices()
    {
    
        return $this->all();
    }
    public function getServicesById($id)
    {
    
        return $this->where("serviceId",'=',$id);
    }
    
}
