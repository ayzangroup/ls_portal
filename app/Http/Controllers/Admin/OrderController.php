<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Offer;
use Session;
use Auth;
use Redirect;
use View;
use App\Orders;
use App\OrderDetails;
use DB;
use App\CorpUser;
use App\User;

class OrderController extends Controller
{
	public function order_history()
    {
         $date=date('Y-m-d');
    	$order_history=DB::table('order_master')
            ->join('pickup_master', 'order_master.pickupId', '=', 'pickup_master.pickupId')
            ->join('delivery_master', 'order_master.deliveryId', '=', 'delivery_master.deliveryId')
            ->join('service_master', 'service_master.serviceId','=', 'order_master.serviceId')
            ->where('order_master.status', '>=' , 2)
            ->where('order_master.status', '!=' , 8)
            ->where('pickup_master.actPickUpDate', '<', $date)
            ->where('delivery_master.actDeliveryDate','<', $date)
            ->select('order_master.*','pickup_master.*','delivery_master.*','service_master.*')
            ->get();
        foreach($order_history as $user)
        {
            if($user->userType == 'corp')
            {
                $corpdetails=CorpUser::where('corpCustId',$user->userId)->first();
                $user->username=$corpdetails->concernPerson;
                $user->email=$corpdetails->corpoarateEmail;
                $user->mobile=$corpdetails->concerPersonMobile;
            }
            elseif($user->userType == 'user')
            {
                $indvdetails=User::where('indvCustId',$user->userId)->first();
                if($indvdetails != '')
                {
                $user->username=$indvdetails->indvCustName;
                $user->email=$indvdetails->indvCustEmail;
                $user->mobile=$indvdetails->indvCustMobile;
            	}
            	else
            	{
            		$user->username='';
            		$user->email='';
            		$user->mobile='';
            	}
            }
        }
        return view::make('admin.view_orderhistory',compact('order_history'));
        
    }

    public function place_order()
    {
    
    	$date=date('Y-m-d');
        $place_order=DB::table('order_master')
            ->join('pickup_master', 'order_master.pickupId', '=', 'pickup_master.pickupId')
            ->join('delivery_master', 'order_master.deliveryId', '=', 'delivery_master.deliveryId')
            ->join('service_master', 'service_master.serviceId','=', 'order_master.serviceId')
            ->where('order_master.status', '>=' , 2)
            ->where('order_master.status', '!=' , 8)
            ->where('pickup_master.actPickUpDate', '>=', $date)
            ->where('delivery_master.actDeliveryDate','>=', $date)
            ->select('order_master.*','pickup_master.*','delivery_master.*','service_master.*')
            ->get();
        foreach($place_order as $user)
        {
            if($user->userType == 'corp')
            {
                $corpdetails=CorpUser::where('corpCustId',$user->userId)->first();
                $user->username=$corpdetails->concernPerson;
                $user->email=$corpdetails->corpoarateEmail;
                $user->mobile=$corpdetails->concerPersonMobile;
            }
            elseif($user->userType == 'user')
            {
                $indvdetails=User::where('indvCustId',$user->userId)->first();
                $user->username=$indvdetails->indvCustName;
                $user->email=$indvdetails->indvCustEmail;
                $user->mobile=$indvdetails->indvCustMobile;
            }
        }
        return view::make('admin.view_placeorder',compact('place_order'));
    
    }

    public function cancel_order(Request $request)
    {
        
        $cancel_order=DB::table('order_master')
            ->join('pickup_master', 'order_master.pickupId', '=', 'pickup_master.pickupId')
            ->join('delivery_master', 'order_master.deliveryId', '=', 'delivery_master.deliveryId')
            ->join('service_master', 'service_master.serviceId','=', 'order_master.serviceId')
            ->where('order_master.status', 8)
            ->select('order_master.*','pickup_master.*','delivery_master.*','service_master.*')
            ->get();
        foreach($cancel_order as $user)
        {
            if($user->userType == 'corp')
            {
                $corpdetails=CorpUser::where('corpCustId',$user->userId)->first();
                $user->username=$corpdetails->concernPerson;
                $user->email=$corpdetails->corpoarateEmail;
                $user->mobile=$corpdetails->concerPersonMobile;
            }
            elseif($user->userType == 'user')
            {
                $indvdetails=User::where('indvCustId',$user->userId)->first();
                $user->username=$indvdetails->indvCustName;
                $user->email=$indvdetails->indvCustEmail;
                $user->mobile=$indvdetails->indvCustMobile;
            }
        }
       
        return view::make('admin.view_cancelorder',compact('cancel_order'));
    
    }

    public function order_details(Request $request)
    {
        $id=decrypt($request->id);
        $order=Orders::where('orderId',$id)->first();

        return view::make('admin.order_details',compact('order'));

    }

}