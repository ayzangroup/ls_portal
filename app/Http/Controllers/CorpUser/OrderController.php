<?php


namespace App\Http\Controllers\CorpUser;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

use Validator;

use Redirect;

use Auth;

use Input;

use Session;

use App\FaqTitle;

use App\Faq;

use App\ContactUs;

use App\Services;

use App\Category;

use App\Price;

use App\Offer;

use View;

use App\Address;

use App\User;

use App\CorpUser;

use Hash;

use App\NotificationUser;

use Share;

use App\Orders;

use App\OrderDetails;

use App\PickUp;

use App\Deliver;

use DB;

use App\Feedback;



class OrderController extends Controller

{
		public function order_history_detail(Request $request)
		{
			$order=Orders::where('orderId',$request->id)->first();
			$order->service_name=$order->service->serviceName;
	        $order->deliverstarttime=$order->deliverId->deliveryStartTime;
	        $order->deliverendtime=$order->deliverId->deliveryEndTime;
	        $order->deliver_date=$order->deliverId->actDeliveryDate;
	        $order->pickupstarttime=$order->pickId->pickupStartTimestamp;
	        $order->pickupendtime=$order->pickId->pickupEndTimestamp;
	        $order->pickup_date=$order->pickId->actPickUpDate;
	        $order->service_name=$order->service->serviceName;
	        $order->service_image=$order->service->serviceImage;

	        $order->pickaddress=$order->pickId->pickaddress->companyAddress1;
	        $order->pickcity=$order->pickId->pickaddress->city;
	        $order->pickstate=$order->pickId->pickaddress->state;
	        $order->pickpincode=$order->pickId->pickaddress->pincode;

	        $order->deliveraddress=$order->deliverId->deliveraddress->companyAddress1;
	        $order->delivercity=$order->deliverId->deliveraddress->city;
	        $order->deliverstate=$order->deliverId->deliveraddress->state;
	        $order->deliverpincode=$order->deliverId->deliveraddress->pincode;

	        $order->orderDetail=$order->itemDetails;
			return view::make('corpuser.order_history_detail',compact('order'));
		}
		public function cancel_order(Request $request)
		{
			$cancel_order=Orders::find($request->orderId);
			$cancel_order->status='8';
			$cancel=$cancel_order->save();

			if($cancel)
			{
				return redirect::route('corpuser.order_history')->with('error_code','3')->with('message','Your Order Cancel successfully!')->with('status','Cancel Status');
			}
			else
			{
				return redirect::route('corpuser.order_history')->with('error_code','3')->with('message','Your Order Cancel Failed!')->with('status','Cancel Status');
			}
		}

		public function update_repeatorder(Request $request)
		{
			$repeat_order=Orders::find($request->orderId);
			$repeat_order->status='3';
			$repeat=$repeat_order->save();

			if($repeat)
			{
				return redirect::route('corpuser.order_history')->with('error_code','3')->with('message','Your Order repeat successfully!')->with('status','Repeat Status');
			}
			else
			{
				return redirect::route('user.order_history')->with('error_code','3')->with('message','Your Order failed!')->with('status','Repeat Status');
			}
		}

		public function repeat_order(Request $request)
		{
			  $order = DB::table('order_master')
            	->join('service_master', 'service_master.serviceId','=', 'order_master.serviceId')
            	->where('order_master.orderId', $request->id)
            	->select('order_master.*','service_master.*')
            	->first();
            	
			 $order_items=OrderDetails::where('orderId',$request->id)->get();
			 $itemsArr = array();
			 foreach($order_items as $items)
			 {
				$itemsArr[] = $items["itemId"];
			 }
			  
			 //dd($itemsArr);
			  $services=Services::all();
              $categories=Category::all();
              $price=Price::all();
              foreach ($price as $category_id)
              {
                $categoryid[]=$category_id->itemsName->categoryId;
              }
              foreach ($price as $items)
              {
                $items->item_name=$items->itemsName->itemCode;
                $items->category_id=$items->itemsName->categoryId;
              }
              
			  

			  return view::make('corpuser.repeat_order',compact('services','categories','price','categoryid','order','order_items','itemsArr'));
			
		}

		public function save_order(Request $request)
		{
			  $order = DB::table('order_master')
            	->join('service_master', 'service_master.serviceId','=', 'order_master.serviceId')
            	->where('order_master.orderId', $request->id)
            	->select('order_master.*','service_master.*')
            	->first();
            	
			 $order_items=OrderDetails::where('orderId',$request->id)->get();
			 $itemsArr = array();
			 foreach($order_items as $items)
			 {
				$itemsArr[] = $items["itemId"];
			 }
			  
			 //dd($itemsArr);
			  $services=Services::all();
              $categories=Category::all();
              $price=Price::all();
              foreach ($price as $category_id)
              {
                $categoryid[]=$category_id->itemsName->categoryId;
              }
              foreach ($price as $items)
              {
                $items->item_name=$items->itemsName->itemCode;
                $items->category_id=$items->itemsName->categoryId;
              }
              Session::forget('orderId');
              Session::push('orderId',$request->id);
              
			  

			  return view::make('corpuser.save_order',compact('services','categories','price','categoryid','order','order_items','itemsArr'));
			
		}

		public function edit_item(Request $request)
		{
			
			  $order = DB::table('order_master')
            	->join('service_master', 'service_master.serviceId','=', 'order_master.serviceId')
            	->where('order_master.orderId', $request->id)
            	->select('order_master.*','service_master.*')
            	->first();
            	
			 $order_items=OrderDetails::where('orderId',$request->id)->get();
			 $itemsArr = array();
			 foreach($order_items as $items)
			 {
				$itemsArr[] = $items["itemId"];
			 }
			  
			 //dd($itemsArr);
			  $services=Services::all();
              $categories=Category::all();
              $price=Price::all();
              foreach ($price as $category_id)
              {
                $categoryid[]=$category_id->itemsName->categoryId;
              }
              foreach ($price as $items)
              {
                $items->item_name=$items->itemsName->itemCode;
                $items->category_id=$items->itemsName->categoryId;
              }

              Session::push('orderId',$request->id);
              
			  

			  return view::make('corpuser.edit_item',compact('services','categories','price','categoryid','order','order_items','itemsArr'));
			
		}




		public function feedback()
		{
			return view::make('corpuser.feedback');
		}
		public function update_feedback(Request $request)
		{
			$feedback=new Feedback($request->all());
			$insert=$feedback->save();
			if($insert)
			{
				return redirect::route('corpuser.order_history')->with('error_code','3')->with('message','Your Order Feedback Submit Successfully!')->with('status','Feedback Status');
			}
			else
			{
				return redirect::route('corpuser.order_history')->with('error_code','3')->with('message','Your Order Feedback failed!')->with('status','Feedback Status');	
			}
		}
		public function complaint()
		{
			return view::make('corpuser.complaint');
		}
		public function update_complaint(Request $request)
		{
			$feedback=new Feedback($request->all());
			$insert=$feedback->save();
			if($insert)
			{
				return redirect::route('corpuser.order_history')->with('error_code','3')->with('message','Your Order Complaint Successfully!')->with('status','Complaint Status');
			}
			else
			{
				return redirect::route('corpuser.order_history')->with('error_code','3')->with('message','Your Order Complaint failed!')->with('status','Complaint Failed');	
			}
		}
		public function update_service(Request $request)
		{
			$update=Orders::where('orderId',$request->id)->update(['serviceId'=>$request->service]);
			return redirect::route('corpuser.review_order');
		}

				public function favorite(Request $request)
		{
			$fav_order=Orders::find($request->id);
			$fav_order->isFavorite='1';
			$fav=$fav_order->save();

			if($fav)
			{
				return redirect::route('corpuser.order_history')->with('error_code','3')->with('message','Your Order favorite successfully!')->with('status','Order Favorite');
			}
			else
			{
				return redirect::route('corpuser.order_history')->with('error_code','3')->with('message','Your Order favorite failed!')->with('status','Order Favorite');
			}
		}

		public function unfavorite(Request $request)
		{
			$fav_order=Orders::find($request->id);
			$fav_order->isFavorite='0';
			$fav=$fav_order->save();

			if($fav)
			{
				return redirect::route('corpuser.order_history')->with('error_code','3')->with('message','Your Order unfavorite successfully!')->with('status','Order UnFavorite');
			}
			else
			{
				return redirect::route('corpuser.order_history')->with('error_code','3')->with('message','Your Order unfavorite failed!')->with('status','Order UnFavorite');
			}
		}		




}