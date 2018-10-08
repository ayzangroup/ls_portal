<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WhyUs extends Model
{
	protected $table = 'why_us';
    protected $fillable = [
        'heading','description','image'
    ];

}