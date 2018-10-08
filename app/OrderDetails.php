<?php



namespace App;



use Illuminate\Database\Eloquent\Model;



class OrderDetails extends Model

{

    protected $table = 'order_details';
    protected $primaryKey = 'orderDetailId';

    protected $fillable = [
        'orderId', 'itemId', 'itemName','quantity','unitPrice','costPrice','subTotal','isRemoved','removedOn','tax','taxAmount','rate','createdOn','updatedOn','remarks'
    ];

    public $timestamps = false;

    public function orderDetails(){

        return $this->all();

    }

    public function countOrderDetails(){

        return $this->orderDetails()->count();

    }
    
}

