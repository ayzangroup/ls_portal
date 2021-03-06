<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB, Hash, Mail;

class NotificationUser extends Authenticatable
{
    use Notifiable;

    protected $table = 'notification_log';
    protected $primaryKey = 'uniqueId';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'objectId','objectType','notificationId', 'isViewed', 'sentOn', 'status', 'statusIOS', 'statusRemarks', 'statusIOSRemarks'
    ];

    public function notificationDetail()
    {
        return $this->belongsTo('App\Notification','notificationId');
    }
       

}
