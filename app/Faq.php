<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
	protected $table= 'faq';
    protected $fillable = [
        'title','sub_title','description'
    ];

   public function faq_title()
    {
        return $this->belongsTo('App\FaqTitle','title');
    }

}