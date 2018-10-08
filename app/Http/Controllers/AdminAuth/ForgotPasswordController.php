<?php



namespace App\Http\Controllers\AdminAuth;



use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

use Illuminate\Support\Facades\Password;

use Illuminate\Http\Request;

use View;

use Redirect;

use App\Admin;

use Hash;



class ForgotPasswordController extends Controller

{

    /*

    |--------------------------------------------------------------------------

    | Password Reset Controller

    |--------------------------------------------------------------------------

    |

    | This controller is responsible for handling password reset emails and

    | includes a trait which assists in sending these notifications from

    | your application to your users. Feel free to explore this trait.

    |

    */



    use SendsPasswordResetEmails;



    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        $this->middleware('admin.guest');

    }



    /**

     * Display the form to request a password reset link.

     *

     * @return \Illuminate\Http\Response

     */

    public function showLinkRequestForm()

    {

        return view('admin.auth.passwords.email');

    }



    /**

     * Get the broker to be used during password reset.

     *

     * @return \Illuminate\Contracts\Auth\PasswordBroker

     */

    public function broker()

    {

        return Password::broker('admins');

    }

    public function forgot_form(Request $request)
    {

      return view::make('admin.auth.forgotpassword');

    }


     public function forgot(Request $request)
    {

        $admin=Admin::where('email',$request->email)->first();   
        if(!empty($admin))
        {
            $password=Hash::make($request->password);
            $update=$admin->password=$password;
            $update=$admin->save();
            if($update)
            {
                return view::make('admin.auth.login');
            }
            else
            {
                return view::make('admin.auth.forgotpassword');                
            }
        }        
    }

}

