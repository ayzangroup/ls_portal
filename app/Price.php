<?php



namespace App;



use Illuminate\Database\Eloquent\Model;



class Price extends Model

{

	protected $table= 'ls_item_pricelist';

	protected $primaryKey = 'custPriceListId';

    protected $fillable = [

        'custPriceListId', 'itemId', 'customerType', 'listNumber', 'custPlReferenceNumber', 'startTime', 'endTime', 'unitPrice', 'costPrice', 'discount', 'discountPercent', 'discFixVale', 'margin', 'marginAmt', 'tax', 'taxOnMargin', 'taxAmt', 'vat', 'vatOnMargin', 'vatAmt', 'rate', 'status', 'createdOn', 'createdBy', 'updatedOn', 'updatedBy', 'remarks'

    ];



    public function itemsName() 
    {
        return $this->belongsTo('App\Items','itemId');
    }



}