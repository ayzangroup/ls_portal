<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Offer;
use App\User;
use App\CorpUser;
use Session;
use Auth;
use Redirect;
use DateTime;
use View;
use DB;

class OfferController extends Controller
{
	public function view_offers()
    {
    	$data=Offer::all();
        foreach($data as $d)
        {
            $userdata=$d->introducingCustomerId;
            $user=explode(', ',$userdata);
            foreach($user as $userData)
            {
                if($d->usertype=='user')
                {
                    $username[]=DB::table('individual_user_master')->where('indvCustId','=',$userData)->first();
                }
                else
                {
                   $username[]=DB::table('corporate_user_master')->where('corpCustId','=',$userData)->first();   
                }
            }
            $d->username=$username;
        }
        
        

        
        return view::make('admin.view_offers',compact('data'));
    }

    public function add_offers()
    {
    
    	$data=Offer::all();
        $user=User::all();
        $corp=CorpUser::all();
        return view::make('admin.add_offers',compact('data','user','corp'));
    
    }

    public function submit_offers(Request $request)
    {
        
        if ($request->image!='') 
         {
                $rand=rand(1,1000000);
                // Set the destination path
                $destinationPath = public_path().'/images/offers_images/';
                // Get the orginal filname or create the filename of your choice
                $filename2 = str_replace(' ', '_', $request->image->getClientOriginalName());
                $filename2=$rand.''.$filename2;
                $request->image->move($destinationPath, $filename2);
        }   
        else
        {
            $filename2="";
        }
        $userCustomer=$request->introducingCustomerId;
        $userType=$request->userType;
        $user = implode(', ', $userCustomer);
        
        
        $fdate = $request->offerStartDate;
        $tdate = $request->offerEndDate;
        $datetime1 = new DateTime($fdate);
        $datetime2 = new DateTime($tdate);
        $interval = $datetime1->diff($datetime2);
        $offerTotalDays = $interval->format('%a');//now do whatever you like with $days
        
        $insert=new Offer($request->all());
        $insert->offerImage=$filename2;
        if($userType=='user')
        {
            $insert->introducingCustomerId=$user;
        }
        $insert->offerTotalDays=$offerTotalDays;
        $insert->userType=$userType;        
        $save=$insert->save();
        if($save)
            {
                return redirect()->route('admin.view_offers')->with('success','Offers Add Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }
    }

    public function edit_offers($id)
    {

        $id=decrypt($id);
        $offers=Offer::find($id);
        $user=User::all();
        $corp=CorpUser::all();

        if(!empty($offers))
            {
                return view::make('admin.edit_offers',compact('offers','user','corp'));
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }

    }

    public function delete_offers(Request $request)
    {

    	$data=Offer::Destroy($request->id);
        if($data)
            {
                return redirect()->route('admin.view_offers')->with('success','Offers delete Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }

    }

    public function unpublish_offers(Request $request)
    {

        $update=Offer::find($request->id);
        $update->status='0';
        $save=$update->save();

        if($save)
            {
                return redirect()->route('admin.view_offers')->with('success','Offers unpublish Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }

    }

    public function publish_offers(Request $request)
    {

        $update=Offer::find($request->id);
        $update->status='1';
        $save=$update->save();

        if($save)
            {
                return redirect()->route('admin.view_offers')->with('success','Offers publish Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }

    }


    public function update_offers(Request $request)
    {
       
        if ($request->image!='') 
         {
                $rand=rand(1,1000000);
                // Set the destination path
                $destinationPath = public_path().'/images/offers_images';
                // Get the orginal filname or create the filename of your choice
                $filename2 = str_replace(' ', '_', $request->image->getClientOriginalName());
                $filename2=$rand.''.$filename2;
                $request->image->move($destinationPath, $filename2);
        }   
        else
        {
            $filename2=$request->old_image;
        }

        $fdate = $request->offerStartDate;
        $tdate = $request->offerEndDate;
        $datetime1 = new DateTime($fdate);
        $datetime2 = new DateTime($tdate);
        $interval = $datetime1->diff($datetime2);
        $offerTotalDays = $interval->format('%a');//now do whatever you like with $days

        
        $update=Offer::find($request->id);
        $update->offerImage=$filename2;
        $update->offerCode=$request->offerCode;
        $update->offerDescription=$request->offerDescription;
        $update->offerType=$request->offerType;
        $update->offerStartDate=$request->offerStartDate;
        $update->offerEndDate=$request->offerEndDate;
        $update->offerTotalDays=$offerTotalDays;
        $update->minOrderValue=$request->minOrderValue;
        $update->discountPercent=$request->discountPercent;
        $update->maxdiscVal=$request->maxdiscVal;
        $save=$update->save();

        if($save)
            {
                return redirect()->route('admin.view_offers')->with('success','Offers Edited Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }

    }

}