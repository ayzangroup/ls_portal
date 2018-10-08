<?php



namespace App;



use Illuminate\Database\Eloquent\Model;



class Coupoan extends Model

{

	protected $table= 'coupon_master';

	protected $primaryKey = 'uniqueId';

    protected $fillable = [

        'couponCode', 'codeType', 'validFrom', 'validUpto', 'couponDays', 'couponCategory', 'minOrderValue', 'useLimit', 'discVal', 'discountPercent', 'status',

    ];



}