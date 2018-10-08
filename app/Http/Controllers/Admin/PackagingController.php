<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Packagings;
use Session;
use Auth;
use Redirect;
use View;

class PackagingController extends Controller
{
	public function view_packaging()
    {
    	$data=Packagings::all(); 
        return view::make('admin.view_packaging',compact('data'));
    }

    public function submit_Packaging(Request $request)
    {
               
        $insert=new Packagings($request->all());
        $save=$insert->save();
        if($save)
            {
                return redirect()->route('admin.view_packaging')->with('success','Packaging Add Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }
    }


    public function delete_packaging(Request $request)
    {

    	$data=Packagings::Destroy($request->id);
        if($data)
            {
                return redirect()->route('admin.view_packaging')->with('success','Packaging delete Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }

    }


    public function update_packaging(Request $request)
    {
       

        $update=Packagings::find($request->id);
        $update->packagingName=$request->packagingName;
        $update->packagingType=$request->packagingType;

        $save=$update->save();

        if($save)
            {
                return redirect()->route('admin.view_packaging')->with('success','Packaging Edited Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }

    }

}