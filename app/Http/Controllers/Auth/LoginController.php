<?php



namespace App\Http\Controllers\Auth;



use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Socialite;

use Illuminate\Http\Request;

use App\CorpUser;

use App\User;

use Session;

use Illuminate\Support\Facades\Redirect;

use View;

use Auth;

use Hash;

use App\Orders;
use App\OrderDetails;








class LoginController extends Controller

{

    /*

    |--------------------------------------------------------------------------

    | Login Controller

    |--------------------------------------------------------------------------

    |

    | This controller handles authenticating users for the application and

    | redirecting them to your home screen. The controller uses a trait

    | to conveniently provide its functionality to your applications.

    |

    */



    use AuthenticatesUsers {

    logout as performLogout;

}



    /**
     * Where to redirect users after login.
     *
     * @var string
     */



    public function redirectToProvider()

    {

        return Socialite::driver('facebook')->redirect();

    }



    public function handleProviderCallback()

    {

        try {

            $user = Socialite::driver('facebook')->user();

        } catch (Exception $e) {

            return redirect('auth/facebook');

        }

        $authUser = $this->findOrCreateUser($user);



        if(!empty($authUser))

        {
              
              $url=Session::get('url');
              
              if($url!='')
              {
                $url1=$url['intended'];
                $url=substr($url1, strrpos($url1, '/') + 1);
              }

            if($authUser->indvCustId)

             {
              
              if($url=='')
              {

                return redirect()->route('user.dashboard'); 
              }
              elseif($url=='booking')
              {
                return redirect()->route('user.booking');

              }
              elseif($url=='price_calculator')
              {
                return redirect()->route('user.price_calculator');

              }
              elseif($url=='schedule')
                  {

                   if(($orderStr=Session::get('orderstr')!=''))
                    {


                          $orderStr=Session::get('orderstr');
                          $orders = json_decode($orderStr,true);
                          
                          $orderId = time();
                          $subId = substr($orderId,'-3');
                          $digits = 4;
                          $rand = rand(10000, 999999);
                          $orderLsId = 'ls'.$subId.$rand;
                          
                          $userSave = Orders::create(['orderLsId' => $orderLsId,'itemCount' => $orders["itemCount"],
                          'status' => 1,'orderValue'=>$orders["subTotal"],'netAmount' => $orders["netAmount"],'serviceId' => $orders["serviceId"],'createdOn' => time()]);
                         
                          if(count($userSave) > 0)
                          {
                             $items = $orders["item"];
                             foreach($items as $item)
                             {
                               $userItem = OrderDetails::create(['orderId' => $userSave->orderId,'itemId' =>  $item['itemId'],'itemName' => $item['itemName'],'quantity' => $item['quantity'],'subTotal' => $item['indvSubTotal'],
                               'subTotal' => $item['indvSubTotal'],'rate' => $item['rate'],'createdOn' => time()]);
                             }
                          }
                          $save=Orders::where('orderId',$userSave->orderId)->update(['userId'=>$authUser->indvCustId,'userType'=>'user']);

                          return redirect()->route('user.schedule');
                      } 
                  }
              else
              {
                return redirect()->route('user.dashboard');

              }

             }

             elseif($authUser->corpCustId) 

             {

              if($url=='booking')
              {
                return redirect()->route('corpuser.booking');

              }
              elseif($url=='')
              {
                return redirect()->route('corpuser.dashboard'); 
              }
              elseif($url=='price_calculator')
              {
                return redirect()->route('corpuser.price_calculator');

              }
              elseif($url=='schedule')
                  {
                   if(($orderStr=Session::get('orderStr')!=''))
                    {
                          $orderStr=Session::get('orderStr');
                          $orders = json_decode($orderStr,true);
                          
                          $orderId = time();
                          $subId = substr($orderId,'-3');
                          $digits = 4;
                          $rand = rand(10000, 999999);
                          $orderLsId = 'ls'.$subId.$rand;
                          
                          $userSave = Orders::create(['orderLsId' => $orderLsId,'itemCount' => $orders["itemCount"],
                          'status' => 1,'orderValue'=>$orders["subTotal"],'netAmount' => $orders["netAmount"],'serviceId' => $orders["serviceId"],'createdOn' => time()]);
                         
                          if(count($userSave) > 0)
                          {
                             $items = $orders["item"];
                             foreach($items as $item)
                             {
                               $userItem = OrderDetails::create(['orderId' => $userSave->orderId,'itemId' =>  $item['itemId'],'itemName' => $item['itemName'],'quantity' => $item['quantity'],'subTotal' => $item['indvSubTotal'],
                               'subTotal' => $item['indvSubTotal'],'rate' => $item['rate'],'createdOn' => time()]);
                             }
                          }
                          $save=Orders::where('orderId',$userSave->orderId)->update(['userId'=>$authUser->corpCustId,'userType'=>'corp']);

                          return redirect()->route('corpuser.schedule');
                      }  
                  }
              else
              {

                return redirect()->route('corpuser.dashboard');
              }

             }

        }

        else

        {



           return redirect()->route('/')->with('error_code', 5);

        }

        

    }



    private function findOrCreateUser($facebookUser)

    {

        Session::put('name', $facebookUser->name);

        Session::put('email', $facebookUser->email);

        Session::put('facebook_id', $facebookUser->id);

        Session::put('avatar', $facebookUser->avatar);

        Session::put('avatar_original',$facebookUser->avatar_original);



        // dd($facebookUser);

        $authUser = User::where('authId', $facebookUser->id)->first();



        $authUser1 = CorpUser::where('authId', $facebookUser->id)->first();





        if ($authUser)

        {

          
          $web_player_id=session('player_id');

          $authUser->web_player_id=$web_player_id;

        	$authUser->save();

          Auth::guard('user')->loginUsingId($authUser->indvCustId);

          return $authUser;

        }

        elseif ($authUser1)

        {

          $web_player_id=session('player_id');

          $authUser1->web_player_id=$web_player_id;

          $authUser1->save();

        	// dd($authUser1);

        	Auth::guard('corpuser')->loginUsingId($authUser1->corpCustId);

            // dd(Auth::guard('corpuser')->user());



             return $authUser1;

        }



    }





    public function redirectToGoogle()

    {

        return Socialite::driver('google')->redirect();

    }



    public function handleGoogleCallback()

    {

        try {

            $user = Socialite::driver('google')->user();

        } catch (Exception $e) {

            return redirect('auth/google');

        }

        $authUser = $this->CreateUser($user);





        if(!empty($authUser))

        {
              $url=Session::get('url');
              if($url!='')
              {
                $url1=$url['intended'];
                $url=substr($url1, strrpos($url1, '/') + 1);
              }

            if($authUser->indvCustId)

             {

                  if($url=='booking')
                  {
                    return redirect()->route('user.booking');

                  }
                  elseif($url=='')
                  {
                    return redirect()->route('user.dashboard'); 
                  }
                  elseif($url=='price_calculator')
                  {
                    return redirect()->route('user.price_calculator');

                  }
                  elseif($url=='schedule')
                  {
                   if(($orderStr=Session::get('orderstr')!=''))
                    {
                          $orderStr=Session::get('orderstr');
                          $orders = json_decode($orderStr,true);
                          
                          $orderId = time();
                          $subId = substr($orderId,'-3');
                          $digits = 4;
                          $rand = rand(10000, 999999);
                          $orderLsId = 'ls'.$subId.$rand;
                          
                          $userSave = Orders::create(['orderLsId' => $orderLsId,'itemCount' => $orders["itemCount"],
                          'status' => 1,'orderValue'=>$orders["subTotal"],'netAmount' => $orders["netAmount"],'serviceId' => $orders["serviceId"],'createdOn' => time()]);
                         
                          if(count($userSave) > 0)
                          {
                             $items = $orders["item"];
                             foreach($items as $item)
                             {
                               $userItem = OrderDetails::create(['orderId' => $userSave->orderId,'itemId' =>  $item['itemId'],'itemName' => $item['itemName'],'quantity' => $item['quantity'],'subTotal' => $item['indvSubTotal'],
                               'subTotal' => $item['indvSubTotal'],'rate' => $item['rate'],'createdOn' => time()]);
                             }
                          }
                          $save=Orders::where('orderId',$userSave->orderId)->update(['userId'=>$user->indvCustId,'userType'=>'user']);

                          return redirect()->route('user.schedule');
                      } 
                  }
                  else
                  {
                    return redirect()->route('user.dashboard');

                  }
              }
       

             elseif($authUser->corpCustId) 

             {

                if($url=='booking')
                {
                  return redirect()->route('corpuser.booking');

                }
                  elseif($url=='')
                {
                  return redirect()->route('corpuser.dashboard'); 
                }
                elseif($url=='price_calculator')
                {
                  return redirect()->route('corpuser.price_calculator');

                }
                elseif($url=='schedule')
                  {
                        if(($orderStr=Session::get('orderstr')!=''))
                        {
                          $orderStr=Session::get('orderstr');
                          $orders = json_decode($orderStr,true);
                          
                          $orderId = time();
                          $subId = substr($orderId,'-3');
                          $digits = 4;
                          $rand = rand(10000, 999999);
                          $orderLsId = 'ls'.$subId.$rand;
                          
                          $userSave = Orders::create(['orderLsId' => $orderLsId,'itemCount' => $orders["itemCount"],
                          'status' => 1,'orderValue'=>$orders["subTotal"],'netAmount' => $orders["netAmount"],'serviceId' => $orders["serviceId"],'createdOn' => time()]);
                         
                          if(count($userSave) > 0)
                          {
                             $items = $orders["item"];
                             foreach($items as $item)
                             {
                               $userItem = OrderDetails::create(['orderId' => $userSave->orderId,'itemId' =>  $item['itemId'],'itemName' => $item['itemName'],'quantity' => $item['quantity'],'subTotal' => $item['indvSubTotal'],
                               'subTotal' => $item['indvSubTotal'],'rate' => $item['rate'],'createdOn' => time()]);
                             }
                          }
                          $save=Orders::where('orderId',$userSave->orderId)->update(['userId'=>$authUser->corpCustId,'userType'=>'corp']);

                          return redirect()->route('corpuser.schedule');
                      } 
                  }
                else
                {

                  return redirect()->route('corpuser.dashboard');
                }

             }
        }


        else

        {

           return redirect()->route('/')->with('error_code', 5);

        }



        // return redirect()->route('/')->with('error_code', 5);

    }

    

    private function CreateUser($User)

    {



        Session::put('name', $User->name);

        Session::put('email', $User->email);

        Session::put('facebook_id', $User->id);

        Session::put('avatar', $User->avatar);

        Session::put('avatar_original',$User->avatar_original);





        // dd($facebookUser);

        $authUser = User::where('authId', $User->id)->first();



        $authUser1 = CorpUser::where('authId', $User->id)->first();





        if ($authUser)

        {

          $web_player_id=session('player_id');

          $authUser->web_player_id=$web_player_id;

          $authUser->save();

             Auth::guard('user')->loginUsingId($authUser->indvCustId);

             return $authUser;

        }

        elseif ($authUser1)

        {

          $web_player_id=session('player_id');

          $authUser1->web_player_id=$web_player_id;

          $authUser1->save();

        	Auth::guard('corpuser')->loginUsingId($authUser1->corpCustId);

             return $authUser1;

        }

       

    }







    public function login(Request $request)

    {

        if(!empty($request->email)&&!empty($request->password))

        {



                  $authUser = User::where('indvCustEmail', $request->email)->first();

                  

                  $authUser1 = CorpUser::where('corpoarateEmail', $request->email)->first();



                  if(count($authUser)>0)

                  {

                      if(Hash::check($request->password, $authUser->indvCustPassword))

                      {

                        $authUser->web_player_id=$request->web_player_id;

                        $authUser->save();

                        Auth::guard('user')->loginUsingId($authUser->indvCustId);

                          $url=Session::get('url');
                          $url1=$url['intended'];
                          $url=substr($url1, strrpos($url1, '/') + 1);


                          if($authUser->indvCustId)

                          {
              
                              if($url=='booking')
                              {
                                return redirect()->route('user.booking');

                              }
                              elseif($url=='price_calculator')
                              {
                                return redirect()->route('user.price_calculator');

                              }
                              elseif($url=='schedule')
                                  {

                                      if(($orderStr=Session::get('orderstr')!=''))
                                      {


                                          $orderStr=Session::get('orderstr');
                                          $orders = json_decode($orderStr,true);
                          
                                          $orderId = time();
                                          $subId = substr($orderId,'-3');
                                          $digits = 4;
                                          $rand = rand(10000, 999999);
                                          $orderLsId = 'ls'.$subId.$rand;
                          
                                          $userSave = Orders::create(['orderLsId' => $orderLsId,'itemCount' => $orders["itemCount"],
                                          'status' => 1,'orderValue'=>$orders["subTotal"],'netAmount' => $orders["netAmount"],'serviceId' => $orders["serviceId"],'createdOn' => time()]);
                         
                                            if(count($userSave) > 0)
                                            {
                                               $items = $orders["item"];
                                               foreach($items as $item)
                                               {
                                                 $userItem = OrderDetails::create(['orderId' => $userSave->orderId,'itemId' =>  $item['itemId'],'itemName' => $item['itemName'],'quantity' => $item['quantity'],'subTotal' => $item['indvSubTotal'],
                                                 'subTotal' => $item['indvSubTotal'],'rate' => $item['rate'],'createdOn' => time()]);
                                               }
                                            }
                                            $save=Orders::where('orderId',$userSave->orderId)->update(['userId'=>$authUser->indvCustId,'userType'=>'user']);

                                            return redirect()->route('user.schedule');
                                      } 
                                    }
                                else
                                {
                                  return redirect()->route('user.dashboard');

                                }

                          }

                        }
                    }

                  elseif(count($authUser1)>0)

                  {

                      if(Hash::check($request->password, $authUser1->corpPassword))

                      {

                         $authUser1->web_player_id=$request->web_player_id;

                         $authUser1->save();

                         Auth::guard('corpuser')->loginUsingId($authUser1->corpCustId);

                          $url=Session::get('url');
                          $url1=$url['intended'];
                          $url=substr($url1, strrpos($url1, '/') + 1);
                          dd($url);

                          if($authUser1->corpCustId)

                          {
              
                              if($url=='booking')
                              {
                                return redirect()->route('corpuser.booking');

                              }
                              elseif($url=='price_calculator')
                              {
                                return redirect()->route('corpuser.price_calculator');

                              }
                              elseif($url=='schedule')
                                  {

                                      if(($orderStr=Session::get('orderstr')!=''))
                                      {


                                          $orderStr=Session::get('orderstr');
                                          $orders = json_decode($orderStr,true);
                          
                                          $orderId = time();
                                          $subId = substr($orderId,'-3');
                                          $digits = 4;
                                          $rand = rand(10000, 999999);
                                          $orderLsId = 'ls'.$subId.$rand;
                          
                                          $userSave = Orders::create(['orderLsId' => $orderLsId,'itemCount' => $orders["itemCount"],
                                          'status' => 1,'orderValue'=>$orders["subTotal"],'netAmount' => $orders["netAmount"],'serviceId' => $orders["serviceId"],'createdOn' => time()]);
                         
                                            if(count($userSave) > 0)
                                            {
                                               $items = $orders["item"];
                                               foreach($items as $item)
                                               {
                                                 $userItem = OrderDetails::create(['orderId' => $userSave->orderId,'itemId' =>  $item['itemId'],'itemName' => $item['itemName'],'quantity' => $item['quantity'],'subTotal' => $item['indvSubTotal'],
                                                 'subTotal' => $item['indvSubTotal'],'rate' => $item['rate'],'createdOn' => time()]);
                                               }
                                            }
                                            $save=Orders::where('orderId',$userSave->orderId)->update(['userId'=>$authUser1->corpCustId,'userType'=>'corp']);

                                            return redirect()->route('corpuser.schedule');
                                      } 
                                    }
                                else
                                {
                                  return redirect()->route('corpuser.dashboard');

                                }

                          }

                      }

                  }

              

                return redirect()->route('/')->with('error_code', 3)->with('message', 'Please Fill Valid Email id or password','status', 'Login Failed');



        }

        else

        {

               return redirect()->route('/')->with('error_code', 5);

        }

    }



}

