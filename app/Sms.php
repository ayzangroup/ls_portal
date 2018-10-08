<?php

namespace App;

use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;

use DB, Hash, Mail;



class sms extends Authenticatable

{

    use Notifiable;

    protected $table = 'sms_master';

    protected $primaryKey = 'uniqueId';

    

    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    protected $fillable = [
            
            'message', 'createdOn', 'scheduleFor'

    ];

       



}

