<?php



namespace App\Http\Controllers\DriverAuth;



use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;

use Hesto\MultiAuth\Traits\LogsoutGuard;

use App\Driver;

use Illuminate\Http\Request;

use Hash;



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



    use AuthenticatesUsers, LogsoutGuard {

        LogsoutGuard::logout insteadof AuthenticatesUsers;

    }



    /**

     * Where to redirect users after login / registration.

     *

     * @var string

     */

    public $redirectTo = '/driver/dashboard';



    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        $this->middleware('driver.guest', ['except' => 'logout']);

    }



    /**

     * Show the application's login form.

     *

     * @return \Illuminate\Http\Response

     */

    public function showLoginForm()

    {

        return view('driver.auth.login');

    }



    /**

     * Get the guard to be used during authentication.

     *

     * @return \Illuminate\Contracts\Auth\StatefulGuard

     */

    protected function guard()

    {

        return Auth::guard('driver');

    }

    public function logoutToPath() 

    {

        return '/driver/login';

    }

    public function login(Request $request)
    {

        if(!empty($request->email)&&!empty($request->password))

        {

                  $authUser = Driver::where('email', $request->email)->first();


                  if(count($authUser)>0)

                  {

                      if(Hash::check($request->password, $authUser->password))

                      {


                        $authUser->web_player_id=$request->web_player_id;

                        $authUser->save();
                        

                        Auth::guard('driver')->loginUsingId($authUser->driverId);
                        
                        return redirect()->route('driver.dashboard');
                      }

                      else
                        {
                          return redirect()->route('driver.login')->with('errors1', 'Enter password may be wrong');  
                        }
            }
            else
            {
                return redirect()->route('driver.login')->with('errors1', 'Enter Email may be wrong');
            }
        }

        
    }



}

