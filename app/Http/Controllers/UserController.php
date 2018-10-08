<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;

use Validator;
use Redirect;
use Auth;
use Input;
use Session;

class UserController extends Controller
{
    
    protected $guard = 'admin';
    public function __construct(){
        $this->middleware('admin.guest')->except('logout');
    }
    public function showLogin(){
        
        return \View::make('admin.login');
    }
    public function doLogin(){
        

        $rules = array(
            'email'    => 'required|email', 
            'password' => 'required|min:3'
        );

        $validator = Validator::make(Input::all(), $rules);

        
        if ($validator->fails()) {
            return Redirect::to('login')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {

            // create our user data for the authentication
            $userdata = array(
                'userName'     => Input::get('email'),
                'password'  => Input::get('password')
            );
            //dd(Auth::guard('admin')->attempt($userdata));
            if (Auth::guard('admin')->attempt($userdata)) {
                //dd(Auth::guard('admin')->user());
                
                 return Redirect::to('admin/dashboard');

            } else {        
                //return Redirect::to('login');
                echo 'Fail!';
            }
        }
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return Redirect::to('admin');
    }
    protected function guard()
    {
        return Auth::guard('admin');
    }
    // public function dashboard(){
        
    //     print_r(Session::get('test'));
    //     //return \View::make('admin.dashboard');
    // }

    public function forgotPassword(){
        return \View::make('admin.forgot');
    }
    // public function logout(Request $request) {
    //     Auth::logout();
    //     return redirect('login');
    // }
}
