<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Address;
use Session;
use Auth;
use Redirect;
use View;

class AddressController extends Controller
{
	public function view_useraddress()
    {
    	$data=Address::where('objectType','user')->get();
        foreach($data as $username)
        {
            $username->name=$username->indvAddress->indvCustName;
            $username->email=$username->indvAddress->indvCustEmail;
        }
        return view::make('admin.view_useraddress',compact('data'));
    }

    public function view_corpuseraddress()
    {
        $data=Address::where('objectType','corp')->get();
        foreach($data as $username)
        {
            $username->name=$username->corpAddress->concernPerson;
            $username->email=$username->corpAddress->concernPersonEmail;
        } 
        return view::make('admin.view_corpuseraddress',compact('data'));
    }
    

}