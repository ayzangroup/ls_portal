<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaqTitle extends Model
{
	protected $table= 'faq_title';
    protected $fillable = [
        'title'
    ];

    public function title()
    {
        return $this->hasMany('App\Faq','title');
    }

}