<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use App\User;
// use App\Socialauth;
use Validator;
use DB, Hash, Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Mail\Message;
use Illuminate\Mail\Mailer;


class loginController extends Controller
{
    public function __construct(){}
    
    public function showLogin(){
        echo "hello";
        //return \View::make('reset-password')->with(array('isShow' =>false,'message' => 'Validation Key is expired.'));
    

    }
    
	
}