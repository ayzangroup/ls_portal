<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services;
use App\Category;
use App\Items;
use App\ItemsPreferences;
use Session;
use Auth;
use Redirect;
use DB, Hash, Mail;
use App\Banner;
use App\User;
use App\CorpUser;
use App\Help;
use View;
use App\Privacy;
use App\TermsAndCondition;
use App\Faq;
use App\FaqTitle;
use App\Serve;
use App\ContactUs;
use App\WhyUs;
use App\Process;
use App\Blog;
use App\Price;
use App\RequestService;
use App\Orders;
use App\OrderDetails;

class WebsiteController extends Controller
{

        //Front page
          public function index(Request $request)
          {

              $data=Banner::all();
              $serve=Serve::all();
              $whyus=WhyUs::all();
              $process=Process::all();
              $blog=Blog::first();
              return view::make('index',compact('data','serve','whyus','process','blog'));

          }
          public function refer_register(Request $request)
          {
            $refer_code=$request->segment(2);
            Session::forget('refer_code');
            Session::put('refer_code',$refer_code);
            return redirect()->route('/')->with('error_code', 8);
          }

        //ContactUs Page

        	public function contact(Request $request)
        	{
              $data=ContactUs::first();
              return view::make('contact_us',compact('data'));
          }

        // Faq Page
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

                  return view::make('faq',compact('data','title_name'));
            
            }


          //Price Calculator
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
             
                //dd($price[0]);
              return view::make('price-calculator',compact('services','categories','price','categoryid'));
          
         }


         //Serve Page
          public function serve(Request $request)
      	  {

               $data=Serve::all(); 
              return view::make('serve',compact('data'));
          
          }


         //Term And condition Page 
          public function terms_and_condition(Request $request)
      	  {

                $data=TermsAndCondition::first();
                return view::make('terms_and_condition',compact('data'));
          }

          //Privacy Policy Page
          public function privacy_policy(Request $request)
        	 {

                  $data=Privacy::first();
                  return view::make('privacy_policy',compact('data'));
            }

            //Request submit Page

          public function request(Request $request)
          {
              
              $insert=new RequestService($request->all());
              $save=$insert->save();
              if($save)
              {
               
                return redirect()->route('list_your_business_now')->with('error_code', 3)->with('message','Your Request send to admin panel')->with('status','Request Success');
              
              }
              else
              {

                 return redirect()->route('list_your_business_now')->with('error_code', 3)->with('message','Something went wrong, please try again.')->with('status','Request Failed'); 
              
              }
          
          }


          //Contact Us submit
          public function help(Request $request)
          {

            $insert=new Help($request->all());
            $save=$insert->save();
            if($save)
            {
            
              return redirect()->back()->with('error_code', 3)->with('message','Your Request send to admin panel')->with('status','Request Success');
            
            }
            else
            {
             
             return redirect()->back()->with('error_code', 3)->with('message','Something went wrong, please try again.')->with('status','Request Failed'); 
            
            }
          }


          //List you Buiness now page

          public function list_your_business_now(Request $request)
          {

            return view('list_your_business_now');
    
          }


         public function add_item(Request $request)
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
              if($request->repeat_url!='')
              {
                $url = $request->repeat_url;
              }
              else
              {
                $url='';
              }
              
              //dd($data1);
               return view::make('add_item',compact('data','data1','url','url1'));   
                
          }
          //orderId', 'orderLsId', 'userId','userType','driverId','laundryId','itemCount','status','orderValue','netAmount','serviceId','pickupId','deliveryId','taxAmount','paymentStatus','transactionId','paymentDate','createdOn','updatedOn','remarks','paymentMode'
          //'orderId', 'itemId', 'itemName','quantity','unitPrice','costPrice','subTotal','isRemoved','removedOn','tax','taxAmount','rate','createdOn','updatedOn','remarks'
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
                  if($request->url1=='user')
                  {
                    $user=Auth::guard('user')->user();
                    $save=Orders::where('orderId',$userSave->orderId)->update(['userId'=>$user->indvCustId,'userType'=>'user']);
                    $url=url('user/schedule');
                    return $url;
                  }
                  elseif($request->url1=='corpuser')
                  {
                    $user=Auth::guard('corpuser')->user();
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
                  return view::make('add_item',compact('data','data1')); 
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



          public function saveorder(Request $request)
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
                  if($request->url1=='user')
                  {
                    $user=Auth::guard('user')->user();
                    $save=Orders::where('orderId',$userSave->orderId)->update(['userId'=>$user->indvCustId,'userType'=>'user']);
                    $url=url('user/order_history#saved-orders');
                    return $url;
                  }
                  elseif($request->url1=='corpuser')
                  {
                    $user=Auth::guard('corpuser')->user();
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
                  return view::make('add_item',compact('data','data1')); 
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

          //register a normal user or individual user
          public function submit_user(Request $request)
          {

            $social_id=Session::get('facebook_id');
            $userType=$request->userType;
            $email=Session::get('email');
            $name=Session::get('name');
            $avatar_original=Session::get('avatar_original');
            $web_player_id=session('player_id');
            $refer_code=Session::get('refer_code');


            if(substr($avatar_original, 0, 33)=='https://lh5.googleusercontent.com')
            {
                $auth="google";
                
            }
            else
            {
                $auth="facebook";
                
            }

            $data1 = [
              
                        'authType' => 'social', 
                        'auth' => $auth, 
                        'authId' => $social_id,
                        'userType' => $userType,
                        'email' => $email,
                        'userName' => $name,
                        'web_player_id' => $web_player_id,
                        'socialImage' => $avatar_original,
                        'userId' => '',
                        'refer_by'=>$refer_code
                      
                      ];

              
                  $curl = curl_init();
                  $headers = ['Content-Type: application/json'];
                  $url =    url('/api/register');


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
                  CURLOPT_POSTFIELDS => json_encode($data1),
                  ));
                 
                  $response = curl_exec($curl);
                 
                  $err = curl_error($curl);
                  $response_get = json_decode($response);
                  $token=$response_get->data->token;

                  $authUser = User::where('sessionToken', $token)->first();

                  $authUser1 = CorpUser::where('sessionToken', $token)->first();

                  if ($authUser)
                  {
                          Auth::guard('user')->loginUsingId($authUser->indvCustId);
                  }

                  elseif ($authUser1)
                  {
                         Auth::guard('corpuser')->loginUsingId($authUser1->corpCustId);
                            
                  }

                  curl_close($curl);

                  if ($err)
                  {

                    echo "cURL Error #:" . $err;
                  
                  }
                  else
                  {

                    return redirect()->route('/')->with('error_code','3')->with('message','Thanku for subscribe the launder services')->with('status','User Successfully Registred');
                    
                  }


          }

}