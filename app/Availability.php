<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Availability extends Authenticatable
{
    use Notifiable;
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'doctor_availabiliy';
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
}
