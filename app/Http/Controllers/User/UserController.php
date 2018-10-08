<?php



namespace App\Http\Controllers\User;



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

use App\PickUp;

use App\Deliver;

use App\Coupoan;

use DB;

use App\OrderDetails;

use Carbon\Carbon;



class UserController extends Controller

{



	public function index(Request $request)

	{

         $services=Services::all();

         return view::make('user.index',compact('services'));

  	}

  public function myprofile(Request $request)

  {

         return view('user.myprofile');

    }

  	public function dashboard(Request $request)

	{

        $date=date('Y-m-d');
        $user=Auth::guard('user')->user();
        $order=Orders::where('userId',$user->indvCustId)->where('userType','user')->get();
        $order = DB::table('order_master')
            ->join('pickup_master', 'order_master.pickupId', '=', 'pickup_master.pickupId')
            ->join('delivery_master', 'order_master.deliveryId', '=', 'delivery_master.deliveryId')
            ->join('service_master', 'service_master.serviceId','=', 'order_master.serviceId')
            ->where('order_master.status', '>=' , 4)
            ->where('order_master.status', '!=' , 8)
            ->where('order_master.userId', $user->indvCustId)
            ->where('order_master.userType',$user->userType)
            ->where('pickup_master.actPickUpDate', '>=', $date)
            ->where('delivery_master.actDeliveryDate','>=', $date)
            ->select('order_master.*','pickup_master.*','delivery_master.*','service_master.*')
            ->get();
        $save_order= Orders::where('status','<','4')->where('userId', $user->indvCustId)
            ->where('userType',$user->userType)->get();
        foreach ($save_order as $saved_orders) 
        {
          $saved_orders->order_items=$saved_orders->itemDetails;
        }
        $fav_order=Orders::where('isFavorite','1')->where('userId', $user->indvCustId)
            ->where('userType',$user->userType)->get();
        foreach ($fav_order as $fav_orders) 
        {
          $fav_orders->order_items=$fav_orders->itemDetails;
        }
        

         return view('user.dashboard',compact('order','save_order','fav_order'));

  	}

  	public function price_calculator(Request $request)

	{

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

        return view::make('user.price_calculator',compact('services','categories','price','categoryid'));


  	}

  	public function order_history(Request $request)

	{
      $date=date('Y-m-d');
        $user=Auth::guard('user')->user();
        $order=Orders::where('userId',$user->indvCustId)->where('userType','user')->get();
        $order = DB::table('order_master')
            ->join('pickup_master', 'order_master.pickupId', '=', 'pickup_master.pickupId')
            ->join('delivery_master', 'order_master.deliveryId', '=', 'delivery_master.deliveryId')
            ->join('service_master', 'service_master.serviceId','=', 'order_master.serviceId')
            ->where('order_master.status', '>=' , 4)
            ->where('order_master.status', '!=' , 8)
            ->where('order_master.userId', $user->indvCustId)
            ->where('order_master.userType',$user->userType)
            ->where('pickup_master.actPickUpDate', '>=', $date)
            ->where('delivery_master.actDeliveryDate','>=', $date)
            ->select('order_master.*','pickup_master.*','delivery_master.*','service_master.*')
            ->orderBy('orderId','desc')
            ->get();
        $past_order= DB::table('order_master')
            ->join('pickup_master', 'order_master.pickupId', '=', 'pickup_master.pickupId')
            ->join('delivery_master', 'order_master.deliveryId', '=', 'delivery_master.deliveryId')
            ->join('service_master', 'service_master.serviceId','=', 'order_master.serviceId')
            ->where('order_master.status', '!=' , 8)
            ->where('order_master.status', '>=' , 4)
            ->where('order_master.userId', $user->indvCustId)
            ->where('order_master.userType',$user->userType)
            ->where('pickup_master.actPickUpDate', '<', $date)
            ->where('delivery_master.actDeliveryDate','<', $date)
            ->select('order_master.*','pickup_master.*','delivery_master.*','service_master.*')
            ->orderBy('orderId','desc')
            ->get();
        $cancel_order= Orders::where('status',8)->where('userId', $user->indvCustId)
            ->where('userType',$user->userType)->orderBy('orderId','desc')->get();

        $save_order= Orders::where('status','<',4)->where('userId', $user->indvCustId)
            ->where('userType',$user->userType)->orderBy('orderId','desc')->get();
    
         return view('user.order_history',compact('order','past_order','cancel_order','save_order'));

  	}

  	public function track(Request $request)

	{

         $order=Orders::where('orderId',$request->orderid)->first();

        $order->pickaddress=$order->pickId->pickaddress->companyAddress1;
        $order->pickcity=$order->pickId->pickaddress->city;
        $order->pickstate=$order->pickId->pickaddress->state;
        $order->pickpincode=$order->pickId->pickaddress->pincode;

        $order->deliveraddress=$order->deliverId->deliveraddress->companyAddress1;
        $order->delivercity=$order->deliverId->deliveraddress->city;
        $order->deliverstate=$order->deliverId->deliveraddress->state;
        $order->deliverpincode=$order->deliverId->deliveraddress->pincode;

         return view('user.track',compact('order'));

  	}

    public function getlocation(Request $request)
    {
      $lat = 28.577077;
      $lng = 77.265937;
      return view('user.location',compact('lat','lng'));      
    }

  	public function calender(Request $request)

	{

        $date=date('Y-m-d');
        $user=Auth::guard('user')->user();
        $order=Orders::where('userId',$user->indvCustId)->where('userType','user')->get();
        $order = DB::table('order_master')
            ->join('pickup_master', 'order_master.pickupId', '=', 'pickup_master.pickupId')
            ->join('delivery_master', 'order_master.deliveryId', '=', 'delivery_master.deliveryId')
            ->join('service_master', 'service_master.serviceId','=', 'order_master.serviceId')
            ->where('order_master.status', '>=' , 4)
            ->where('order_master.status', '!=' , 8)
            ->where('order_master.userId', $user->indvCustId)
            ->where('order_master.userType',$user->userType)
            ->where('pickup_master.actPickUpDate', '>=', $date)
            ->where('delivery_master.actDeliveryDate','>=', $date)
            ->select('order_master.*','pickup_master.*','delivery_master.*','service_master.*')
            ->orderBy('orderId','desc')
            ->get();
        $past_order= DB::table('order_master')
            ->join('pickup_master', 'order_master.pickupId', '=', 'pickup_master.pickupId')
            ->join('delivery_master', 'order_master.deliveryId', '=', 'delivery_master.deliveryId')
            ->join('service_master', 'service_master.serviceId','=', 'order_master.serviceId')
            ->where('order_master.status', '!=' , 8)
            ->where('order_master.status', '>=' , 4)
            ->where('order_master.userId', $user->indvCustId)
            ->where('order_master.userType',$user->userType)
            ->where('pickup_master.actPickUpDate', '<', $date)
            ->where('delivery_master.actDeliveryDate','<', $date)
            ->select('order_master.*','pickup_master.*','delivery_master.*','service_master.*')
            ->orderBy('orderId','desc')
            ->get();

        $services=Services::all();
        
        
        if(!empty($order) || !empty($past_order))
        {

            foreach($order as $row)
            {
              $data['title']=$row->serviceName;

              $data['start']=$row->actPickUpDate;
              
              if($row->serviceId == '1')
              {
                $data['backgroundColor']= '#dd4b39';
              }
              elseif($row->serviceId == '2')
              {
                $data['backgroundColor']= '#f39c12';
              }
              elseif($row->serviceId == '3')
              {
                $data['backgroundColor']= '#20c882';
              }

              $data['borderColor']= '#0073b7';
              $data1[]=$data;
            }
            foreach($past_order as $row1)
            {
              $data['title']=$row1->serviceName;
              $data['start']=$row1->actPickUpDate;
              $data['backgroundColor'] = '#9cc8e5'; 
              $data['borderColor'] = '#9cc8e5';
              $data1[]=$data;
            }
        }
        else
        {
          $data1=[];
        }

        $events=json_encode($data1);
       
        
        return view('user.calender',compact('events','services'));

  	}

  	public function offer(Request $request)

	{

         $offers=Offer::where('status','1')->where('userType','user')->get();

         return view::make('user.offer',compact('offers'));

  	}

  	public function faq(Request $request)

	 {



          $faq_data=Faq::all();

          $title_name=FaqTitle::orderBy('id','asc')->get();

             

             if(count($faq_data)!='0')       

              {      

                  $data=$faq_data;

              }

              else

              {

                $data=[];

              }



              return view::make('user.faq',compact('data','title_name'));

  	}

  	public function setting(Request $request)

	  {

        $user=Auth::guard('user')->user();

        $update=NotificationUser::where('objectId',$user->indvCustId)->update(['isViewed'=>'1']);   

        $address=Address::where('objectId',$user->indvCustId)->where('objectType',$user->userType)->get();

         return view::make('user.setting',compact('address'));

  	}

  	public function refer(Request $request)

	{

         return view('user.refer');

  	}

  	public function help(Request $request)

	 {

         $data=ContactUs::first();

         return view::make('user.help',compact('data'));

  	}

    public function add_item(Request $request)

  {
              Session::forget('additem_id');
              Session::push('additem_id',$request->segment(3));
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

        return view::make('user.add_item',compact('categories','price','categoryid'));


    }

    public function schedule(Request $request)

    {
        $user=Auth::guard('user')->user();
        $orderId=Session::get('orderId');
        $order=Orders::where('orderId',$orderId)->first();
        $order->status='2';
        $order->save();

        if(!empty($order->pickupId))
        {
            $order->deliverstarttime=$order->deliverId->deliveryStartTime;
            $order->deliverendtime=$order->deliverId->deliveryEndTime;
            $order->deliver_date=$order->deliverId->actDeliveryDate;
            $order->pickupstarttime=$order->pickId->pickupStartTimestamp;
            $order->pickupendtime=$order->pickId->pickupEndTimestamp;
            $order->pickup_date=$order->pickId->actPickUpDate;
            $order->pickid=$order->pickId->pickaddress->uniqueId;
            $order->deliverid=$order->deliverId->deliveraddress->uniqueId;
        }
        else
        {
          $time=date('H:i');
          $picktime=strtotime("+30 minutes",strtotime($time));
          $picktime=date('H:i', $picktime);

          $delivertime=strtotime("+150 minutes",strtotime($time));
          $delivertime=date('H:i', $delivertime);

          
          if($picktime > '07:00' && $picktime < '19:00')
          {
            $order->pickup_date= date('m/d/Y');
          }
          else
          {
            $tomorrow = Carbon::tomorrow();
            $pickup_date=date('m/d/Y',strtotime($tomorrow));
            $order->pickup_date= $pickup_date; 
          }
         
          if($delivertime > '07:00' && $delivertime < '19:00')
          {
              $order->deliver_date=date('m/d/Y');
          }
          else
          {
              $tomorrow = Carbon::tomorrow();
              $delivertime=date('m/d/Y',strtotime($tomorrow));
              $order->deliver_date=$delivertime;
          }
                          
        }
       

        $address=Address::where('objectId',$user->indvCustId)->where('objectType','user')->get();
         return view('user.schedule',compact('address','order'));

    }

    public function add_schedule(Request $request)
    {

        $user=Auth::guard('user')->user();
        $pickup_date=date('Y-m-d', strtotime($request->pickup_date));
        $deliverdate=date('Y-m-d', strtotime($request->deliverdate));
        $count=Orders::where('orderId',$request->orderId)->where('pickupId','!=',Null)->where('deliveryId','!=',Null)->count();
        
        if($count=='0')
        {
            $insert=new PickUp($request->all());
            $insert->userId=$user->indvCustId;
            $insert->userType='user';
            $insert->pickupAddressId=$request->pickup_address;
            $insert->actPickUpDate=$pickup_date;
            $insert->pickupStartTimestamp=$request->starttime;
            $insert->pickupEndTimestamp=$request->endtime;
            $insert_data=$insert->save();
            if($insert_data)
            {
              $deliver=new Deliver($request->all());
              $deliver->customerId=$user->indvCustId;
              $deliver->customerType='user';
              $deliver->deliveryLocation=$request->deliver_address;
              $deliver->actDeliveryDate=$deliverdate;
              $deliver->deliveryStartTime=$request->deliverstarttime;
              $deliver->deliveryEndTime=$request->deliverendtime;
              $deliver_insert=$deliver->save();

              if($deliver_insert)
              {
                 $data=Orders::where('orderId',$request->orderId)->where('userId',$user->indvCustId)->where('userType','user')->update([
                 'deliveryId'=>$deliver->deliveryId,'pickupId'=>$insert->pickupId,'status'=>2]);

                  return redirect::route('user.review_order');
              }
              else
              {
                 return redirect::route('user.review_order');
              }
            }
            else
            {
              return redirect::route('user.review_order');
            }
      }
      else
      {
            $Orders=Orders::where('orderId',$request->orderId)->first();
            $update=PickUp::find($Orders->pickupId);
            $update->userId=$user->indvCustId;
            $update->userType='user';
            $update->pickupAddressId=$request->pickup_address;
            $update->actPickUpDate=$pickup_date;
            $update->pickupStartTimestamp=$request->starttime;
            $update->pickupEndTimestamp=$request->endtime;
            $update_data=$update->save();
            if($update_data)
            {
              $deliver_update=Deliver::find($Orders->deliveryId);
              $deliver_update->customerId=$user->indvCustId;
              $deliver_update->customerType='user';
              $deliver_update->deliveryLocation=$request->deliver_address;
              $deliver_update->actDeliveryDate=$deliverdate;
              $deliver_update->deliveryStartTime=$request->deliverstarttime;
              $deliver_update->deliveryEndTime=$request->deliverendtime;
              $delivered=$deliver_update->save();

              if($delivered)
              {
                  return redirect::route('user.review_order');
              }
              else
              {
                 return redirect::route('user.review_order');
              }
            }
            else
            {
              return redirect::route('user.review_order');
            }
      }

    }


    public function review_order(Request $request)
    {
        $orderId=Session::get('orderId');
        $order=Orders::where('orderId',$orderId)->first();
        $order->service_name=$order->service->serviceName;
        $order->deliverstarttime=$order->deliverId->deliveryStartTime;
        $order->deliverendtime=$order->deliverId->deliveryEndTime;
        $order->deliver_date=$order->deliverId->actDeliveryDate;
        $order->pickupstarttime=$order->pickId->pickupStartTimestamp;
        $order->pickupendtime=$order->pickId->pickupEndTimestamp;
        $order->pickup_date=$order->pickId->actPickUpDate;
        
        $order->pickaddress=$order->pickId->pickaddress->companyAddress1;
        $order->pickcity=$order->pickId->pickaddress->city;
        $order->pickstate=$order->pickId->pickaddress->state;
        $order->pickpincode=$order->pickId->pickaddress->pincode;

        $order->deliveraddress=$order->deliverId->deliveraddress->companyAddress1;
        $order->delivercity=$order->deliverId->deliveraddress->city;
        $order->deliverstate=$order->deliverId->deliveraddress->state;
        $order->deliverpincode=$order->deliverId->deliveraddress->pincode;

        $order->orderDetail=$order->itemDetails;
        $services=Services::all();
        return view('user.review_order',compact('order','services'));

    }

    public function payment(Request $request)

  {
        $orderId=Session::get('orderId');
        $order=Orders::where('orderId',$orderId)->first();
        $order->status='3';
        $order->save();
        Session::forget('cart');
        Session::push('cart',$order);
         return view('user.payment',compact('order'));

    }

     public function voucher_payment(Request $request)
    {
        $match=Coupoan::where('couponCode',$request->code)->first();
        $user=Auth::guard('user')->user();
        if($match!='')
        {
          $coupoanLimit=Orders::where('userId',$user->indvCustId)->where('userType','user')->where('coupoanid',$match->uniqueId)->count();
        }

        Session::put('code', $request->code);
        if($match)
        {          
            return view::make('user.voucher_payment',compact('match','coupoanLimit'));

        }
        else
        {
            $match='';
           return view::make('user.voucher_payment',compact('match','coupoanLimit'));
        }
        
    }
    public function remove_voucher(Request $request)
    {
            $match='remove';
            return view::make('user.voucher_payment',compact('match'));
        
    }

    public function address(Request $request)

  {

         return view('user.address');

    }



  public function save_address(Request $request)

  {

    $data[] = [              

                'line1' => $request->line1, 

                'line2' => $request->line2, 

                'state' => $request->state,

                'city' => $request->city,

                'pincode' => $request->pincode,

                'countyName' => $request->countyName,

                'addressType' => $request->addressType,

                'buildingName' => $request->buildingName,

                'buildingNumber' => $request->buildingNumber,

                'buildingType' => $request->buildingType,

                'buildingFloor' => $request->buildingFloor,

                'isLift' => $request->isLift                      

            ];

            

           //$address=json_encode($data);

           $data1=json_encode(['userType'=> 'user','address'=>$data,'userId' =>  $request->id]);

                



                  $curl = curl_init();

                  $headers = ['Content-Type: application/json'];

                  $url =    url('/api/saveAddress');





                  curl_setopt_array($curl, array(

                  CURLOPT_URL => $url,

                  CURLOPT_RETURNTRANSFER => true,

                  CURLOPT_ENCODING => "",

                  CURLOPT_MAXREDIRS => 10,

                  CURLOPT_TIMEOUT => 30,

                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

                   CURLOPT_HTTPHEADER => array(

                      // Set Here Your Requesred Headers

                        'Content-Type: application/json',

                    ),

                  CURLOPT_CUSTOMREQUEST => "POST",

                  CURLOPT_POSTFIELDS => $data1,

                  ));



                  $response = curl_exec($curl);

                  $err = curl_error($curl);

                  curl_close($curl);



                  if ($err)

                  {



                    echo "cURL Error #:" . $err;

                  

                  }

                  else

                  {

                    $url=$request->url;
                    
                    if($url=='schedule')
                    {
                      return redirect()->route('user.schedule');
                    }
                    else
                    {
                      return redirect()->route('user.setting');
                    }
                  }



    }

    public function delete_address(Request $request)

    {



      $delete=Address::destroy($request->uniqueId);

      if($delete)

      {

        return redirect()->route('user.setting');

      }

      else

      {

        return redirect()->route('user.setting');

      }

    }

    public function edit_address(Request $request)

    {



      $address=Address::find($request->uniqueId);

      if($address)

      {

        return view::make('user.edit_address',compact('address'));

      }

      else

      {

        return redirect()->route('user.setting');

      }



    }





    public function update_phone(Request $request)

    {

      if(isset($request->id))

      {

          $update=User::find($request->id);

          $update->indvCustMobile=$request->phone;

          $save=$update->save();

          return redirect()->route('user.myprofile')->with('error_code','6')->with('message','Phone number update successfully!')->with('status','Profile Update');

      }

      else

      {

          return redirect()->route('user.myprofile')->with('error_code','6')->with('message','Phone number update successfully!')->with('status','Profile Update Failed');

      }

    }



    public function update_password(Request $request)

    {

      if(($request->password) == ($request->Cnfpassword) )

      {

          $update=User::find($request->id);

          $update->indvCustPassword=Hash::make($request->password);

          $save=$update->save();

          return redirect()->route('user.myprofile')->with('error_code','6')->with('message','Password update successfully!')->with('status','Profile Update');

      }

      else

      {

          return redirect()->route('user.myprofile')->with('error_code','6')->with('message','Password is not match!')->with('status','Profile Update Failed');

      }

    }

    
    // public function twitter(Request $request)

    // {
    //     $refer_code=$request->refer_code;
    //     $url=url('/refer_register/'.$refer_code);
    //     $twitter=Share::load($url)->twitter();

    //     return Redirect::away($twitter);

    // }

    public function gplus(Request $request)

    {
        $refer_code=$request->refer_code;
        $url=url('/refer_register/'.$refer_code.'media');
        $gplus=Share::load($url)->gplus();

        return Redirect::away($gplus);

    }

    // public function linkedin(Request $request)

    // {
    //     $refer_code=$request->refer_code;
    //     $url=url('/refer_register/'.$refer_code.'media');
    //     $linkedin=Share::load($url)->linkedin();

    //     return Redirect::away($linkedin);

    // }

     public function update_item(Request $request)
          {
              $codeValue=$request->codeValue;
              $url1=$request->url1;
              $data = array();
              if($codeValue != ""){
                $itemDet = explode('#',$codeValue);
                $i = 0;
                foreach($itemDet as $item){
                  $indvItem = explode(",",$item);
                  $itemVal = array();
                  $itemVal['qunatity'] =  $indvItem[0];
                  $itemVal['product'] =  $indvItem[1];
                  $itemVal['rate'] =  $indvItem[2];
                  $itemVal['itemId'] =  $indvItem[3];
                  $itemVal['categoryId'] =  $indvItem[4];
                  $data[$i] = $itemVal;
                  $i++;
                }
              }
              
              $data1 = json_encode($data);
              //dd($data1);
               return view::make('user.update_item',compact('data','data1','url1'));   
                
          }
          //orderId', 'orderLsId', 'userId','userType','driverId','laundryId','itemCount','status','orderValue','netAmount','serviceId','pickupId','deliveryId','taxAmount','paymentStatus','transactionId','paymentDate','createdOn','updatedOn','remarks','paymentMode'
          //'orderId', 'itemId', 'itemName','quantity','unitPrice','costPrice','subTotal','isRemoved','removedOn','tax','taxAmount','rate','createdOn','updatedOn','remarks'
          public function updateItem(Request $request)
          {
                
              if(Auth::guard('user')->user() || Auth::guard('corpuser')->user() )
              {
                if(isset($request->orderStr) && $request->orderStr != "")
                {
                  $orderStr=$request->orderStr;
                  $orders = json_decode($orderStr,true);

                  $orderId = time();
                  $subId = substr($orderId,'-3');
                  $digits = 4;
                  $rand = rand(10000, 999999);
                  $orderLsId = 'ls'.$subId.$rand;
                  
                  $orderId=Session::get('orderId');
                  $address=Orders::where('orderId',$orderId)->first();
                  Orders::destroy($orderId);
                  OrderDetails::where('orderId',$orderId)->delete();
                  
                  $userSave = Orders::create(['orderLsId' => $orderLsId,'itemCount' => $orders["itemCount"],'pickupId' => $address->pickupId,'deliveryId' => $address->deliveryId,
                  'status' => 1,'orderValue'=>$orders["subTotal"],'netAmount' => $orders["netAmount"],'serviceId' => $orders["serviceId"],'createdOn' => time()]);
                  Session::forget('orderId');
                  Session::push('orderId',$userSave->orderId);

                  if(count($userSave) > 0)
                  {
                     $items = $orders["item"];
                     foreach($items as $item)
                     {
                       $userItem = OrderDetails::create(['orderId' => $userSave->orderId,'itemId' =>  $item['itemId'],'itemName' => $item['itemName'],'quantity' => $item['quantity'],'subTotal' => $item['indvSubTotal'],
                       'subTotal' => $item['indvSubTotal'],'rate' => $item['rate'],'createdOn' => time()]);
                     }
                  }
                  if($user=Auth::guard('user')->user())
                  {
                
                    $save=Orders::where('orderId',$userSave->orderId)->update(['userId'=>$user->indvCustId,'userType'=>'user']);
                    
                    
                      $url=url('user/schedule');
     
                    return $url;
                  }
                  elseif($user=Auth::guard('corpuser')->user())
                  {
                    $save=Orders::where('orderId',$userSave->orderId)->update(['userId'=>$user->corpCustId,'userType'=>'corp']);
                    $url=url('corpuser/schedule');
                    return $url;
                  }
                  else
                  {
                    $url=url('user/schedule');
                    return $url;
                  }
                  
                } 
                else
                {
                  return view::make('user.update_item',compact('data','data1')); 
                }
            }
            else
                  {
                    $orderStr=$request->orderStr;
                    Session::forget('orderstr');
                    Session::put('orderstr',$orderStr);
                    $url=url('user/schedule');
                    return $url;
                  }

          }

          public function saveItem(Request $request)
          {
                
              if(Auth::guard('user')->user() || Auth::guard('corpuser')->user() )
              {
                if(isset($request->orderStr) && $request->orderStr != "")
                {
                  $orderStr=$request->orderStr;
                  $orders = json_decode($orderStr,true);

                  
                  $orderId = time();
                  $subId = substr($orderId,'-3');
                  $digits = 4;
                  $rand = rand(10000, 999999);
                  $orderLsId = 'ls'.$subId.$rand;
                  

                  $orderId=Session::get('orderId');
                  Orders::destroy($orderId);
                  OrderDetails::where('orderId',$orderId)->delete();
                  
                  $userSave = Orders::create(['orderLsId' => $orderLsId,'itemCount' => $orders["itemCount"],
                  'status' => 1,'orderValue'=>$orders["subTotal"],'netAmount' => $orders["netAmount"],'serviceId' => $orders["serviceId"],'createdOn' => time()]);
                  Session::forget('orderId');
                  Session::push('orderId',$userSave->orderId);

                  if(count($userSave) > 0)
                  {
                     $items = $orders["item"];
                     foreach($items as $item)
                     {
                       $userItem = OrderDetails::create(['orderId' => $userSave->orderId,'itemId' =>  $item['itemId'],'itemName' => $item['itemName'],'quantity' => $item['quantity'],'subTotal' => $item['indvSubTotal'],
                       'subTotal' => $item['indvSubTotal'],'rate' => $item['rate'],'createdOn' => time()]);
                     }
                  }
                  if($user=Auth::guard('user')->user())
                  {
                    $url=Session::get('url');
                    $url1=$url['intended'];
                    $url=substr($url1, strrpos($url1, '/') + 1);
                    
                    $save=Orders::where('orderId',$userSave->orderId)->update(['userId'=>$user->indvCustId,'userType'=>'user']);
                    
                    
                      $url=url('user/order_history#saved-orders');
     
                    return $url;
                  }
                  elseif($user=Auth::guard('corpuser')->user())
                  {
                    $save=Orders::where('orderId',$userSave->orderId)->update(['userId'=>$user->corpCustId,'userType'=>'corp']);
                    $url=url('corpuser/order_history#saved-orders');
                    return $url;
                  }
                  else
                  {
                    $url=url('user/order_history#saved-orders');
                    return $url;
                  }
                  
                } 
                else
                {
                  return view::make('user.update_item',compact('data','data1')); 
                }
            }
            else
                  {
                    $orderStr=$request->orderStr;
                    Session::forget('orderstr');
                    Session::put('orderstr',$orderStr);
                    $url=url('user/order_history');
                    return $url;
                  }

          }


    public function coupoan(Request $request)
    {
         $coupoan=Coupoan::where('status','1')->get();

         return view::make('user.coupoan',compact('coupoan'));

    }






}