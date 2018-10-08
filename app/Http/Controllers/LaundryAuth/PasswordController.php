<?php

namespace App\Http\Controllers\LaundryAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use App\Laundry;
use Hash;

class PasswordController extends Controller
{


    public function showPasswordForm($emailId)
    {
        $id=decrypt($emailId);
        if($id!='')
        {
            $data=Laundry::where('laundryId',$id)->where('isEmailVerified','0')->first();
            if(!empty($data))
            {
               $data1=Laundry::where('laundryId',$id)->update(['isEmailVerified'=>'1']);
                
                if($data1==1)
                {
                  return view('laundry.auth.passwords.password_set')->with(['error'=>'Your email is verified now and enter the your password!', 'isShow' => true]);
                }
               else
               {

                  return view('laundry.auth.passwords.password_set')->with(['message'=>'Your email is already verified now!', 'isShow' => false]);
               }
            }
            else
            {
                return view('laundry.auth.passwords.password_set')->with(['message'=>'Your email is already verified now!', 'isShow' => false]);

            }
        }
        else
        {
            return view('laundry.auth.passwords.password_set')->with(['message'=>'Something went wrong. Please try after some time!', 'isShow' => false]);
        }


    }


    public function password_register(Request $request)
    {
        $data=Laundry::find($request->driverId);
        if($data)
        {
            $password=Hash::make($request->password);
            $data->password=$password;
            $data->status='1';
            $save=$data->save();
            if($save)
            {
               return redirect()->route('admin.dashboard')->with('success','Laundry Add Successfully!'); 
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }
        }
        else
        {
            return redirect()->back()->with('error','Laundry id is not exists!');
        }
    }

    
}
