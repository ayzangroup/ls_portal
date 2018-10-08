<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Coupoan;
use App\User;
use App\CorpUser;
use Session;
use Auth;
use Redirect;
use DateTime;
use View;
use DB;

class CoupoanController extends Controller
{
	public function view_coupoan()
    {
    	$coupoan=Coupoan::all();
        return view::make('admin.view_coupoan',compact('coupoan'));
    }

    public function add_coupoan()
    {
        return view::make('admin.add_coupoan');
    
    }

    public function submit_coupoan(Request $request)
    {
        
        $fdate = $request->validFrom;
        $tdate = $request->validUpto;
        $datetime1 = new DateTime($fdate);
        $datetime2 = new DateTime($tdate);
        $interval = $datetime1->diff($datetime2);
        $couponDays = $interval->format('%a');//now do whatever you like with $days
        
        $insert=new Coupoan($request->all());
        $insert->couponDays=$couponDays;        
        $save=$insert->save();
        if($save)
            {
                return redirect()->route('admin.view_coupoan')->with('success','Coupoan Add Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }
    }

    public function edit_coupoan($id)
    {

        $uniqueId=decrypt($id);
        $coupoan=Coupoan::find($uniqueId);
        
        if(!empty($coupoan))
            {
                return view::make('admin.edit_coupoan',compact('coupoan'));
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }

    }

    public function delete_coupoan(Request $request)
    {

    	$data=Coupoan::Destroy($request->uniqueId);
        if($data)
            {
                return redirect()->route('admin.view_coupoan')->with('success','Coupoan delete Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }

    }


    public function update_coupoan(Request $request)
    {
    
        $fdate = $request->validFrom;
        $tdate = $request->validUpto;
        $datetime1 = new DateTime($fdate);
        $datetime2 = new DateTime($tdate);
        $interval = $datetime1->diff($datetime2);
        $couponDays = $interval->format('%a');//now do whatever you like with $days
        
        
        $update=Coupoan::find($request->uniqueId);
        $update->couponCode=$request->couponCode;
        $update->codeType=$request->codeType;
        $update->validFrom=$request->validFrom;
        $update->validUpto=$request->validUpto;
        $update->couponCategory=$request->couponCategory;
        $update->couponDays=$couponDays;
        $update->useLimit=$request->useLimit;
        $update->minOrderValue=$request->minOrderValue;
        $update->discVal=$request->discVal;
        $update->status=$request->status;
        $save=$update->save();

        if($save)
            {
                return redirect()->route('admin.view_coupoan')->with('success','Offers Edited Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }

    }

    public function unpublish_coupoan(Request $request)
    {

        $update=Coupoan::find($request->id);
        $update->status='0';
        $save=$update->save();

        if($save)
            {
                return redirect()->route('admin.view_coupoan')->with('success','Coupoan unpublish Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }

    }

    public function publish_coupoan(Request $request)
    {

        $update=Coupoan::find($request->id);
        $update->status='1';
        $save=$update->save();

        if($save)
            {
                return redirect()->route('admin.view_coupoan')->with('success','Coupoan publish Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }

    }

}