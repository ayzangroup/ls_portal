<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestService extends Model
{
    protected $fillable = [
        'name','email','phone','isViewed','service','address'
    ];

}