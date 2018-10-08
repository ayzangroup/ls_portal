<?php



namespace App;



use Illuminate\Database\Eloquent\Model;



class ReferCode extends Model

{

	protected $table= 'refercode_detail';

    protected $fillable = [

        'pointearned', 'pointspent', 'rateperpoint', 'pointsUsed','introducepointstatus','introducepointearned'

    ];



}