<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB, Hash, Mail;

class Notification extends Authenticatable
{
    use Notifiable;

    protected $table = 'notification_master';
    protected $primaryKey = 'uniqueId';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'message', 'image', 'cmd', 'createdOn', 'scheduleFor'
    ];
       

}
