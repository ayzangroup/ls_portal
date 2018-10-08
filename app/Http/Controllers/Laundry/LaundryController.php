<?php

namespace App\Http\Controllers\Laundry;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Validator;
use Redirect;
use Auth;
use Input;
use Session;
use View;

class LaundryController extends Controller
{

		public function dashboard(Request $request)
	  {
         return view('laundry.dashboard');
  	}
  


}