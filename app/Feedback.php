<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model

{

	protected $table = 'feedback';

    protected $fillable = [

        'user_id', 'user_type', 'subject', 'message', 'message_type'

    ];

    public function user_details()
    {
    	return $this->belongsTo('App\User','user_id');
    }
    public function corp_details()
    {
    	return $this->belongsTo('App\CorpUser','user_id');
    }

}