<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Faq;
use App\FaqTitle;
use App\TermsAndCondition;
use App\Privacy;
use App\Banner;
use App\Serve;
use App\Blog;
use App\WhyUs;
use App\Process;
use Illuminate\Support\Facades\Password;
use Illuminate\Mail\Message;
use Illuminate\Mail\Mailer;
use Image;
use Twilio;




class CMSController extends Controller
{

	public function faqDetails(Request $request)
    {	
    	$faq=Faq::all();
    	$faqTitle=FaqTitle::all();
      	if(count($faqTitle)>0)
      	{
      		return response()->json(['code'=>200,'success' => true, 'data'=> [ 'faqTitle' => $faqTitle,'faq' => $faq]]);
    	}
    	else
    	{

            return response()->json(['code'=>500,'success'=> false, 'message'=> 'Data is not exists in database']);
                    
    	}
    }

    public function termDetails(Request $request)
    {	
    	$terms=TermsAndCondition::first();
    	if(count($terms)>0)
      	{
      		return response()->json(['code'=>200,'success' => true, 'data'=> [ 'terms' => $terms]]);
    	}
    	else
    	{

            return response()->json(['code'=>500,'success'=> false, 'message'=> 'Data is not exists in database']);
                    
    	}
    }

    public function privacyDetails(Request $request)
    {	
    	$privacy=Privacy::first();
    	if(count($privacy)>0)
      	{
      		return response()->json(['code'=>200,'success' => true, 'data'=> [ 'privacy' => $privacy]]);
    	}
    	else
    	{

            return response()->json(['code'=>500,'success'=> false, 'message'=> 'Data is not exists in database']);
                    
    	}
    }


    public function bannerDetails(Request $request)
    {	
    	$banner=Banner::all();
    	if(count($banner)>0)
      	{
      		return response()->json(['code'=>200,'success' => true, 'data'=> [ 'banner' => $banner]]);
    	}
    	else
    	{

            return response()->json(['code'=>500,'success'=> false, 'message'=> 'Data is not exists in database']);
                    
    	}
    }


    public function serveDetails(Request $request)
    {	
    	$serve=Serve::all();
    	if(count($serve)>0)
      	{
      		return response()->json(['code'=>200,'success' => true, 'data'=> [ 'serve' => $serve]]);
    	}
    	else
    	{

            return response()->json(['code'=>500,'success'=> false, 'message'=> 'Data is not exists in database']);
                    
    	}
    }

    public function processDetails(Request $request)
    {	
    	$process=Process::all();
    	if(count($process)>0)
      	{
      		return response()->json(['code'=>200,'success' => true, 'data'=> [ 'process' => $process]]);
    	}
    	else
    	{

            return response()->json(['code'=>500,'success'=> false, 'message'=> 'Data is not exists in database']);
                    
    	}
    }

	public function whyusDetails(Request $request)
    {	
    	$whyus=WhyUs::first();
    	if(count($whyus)>0)
      	{
      		return response()->json(['code'=>200,'success' => true, 'data'=> [ 'whyus' => $whyus]]);
    	}
    	else
    	{

            return response()->json(['code'=>500,'success'=> false, 'message'=> 'Data is not exists in database']);
                    
    	}
    }

    public function blogDetails(Request $request)
    {	
    	$blog=Blog::first();
    	if(count($blog)>0)
      	{
      		return response()->json(['code'=>200,'success' => true, 'data'=> [ 'blog' => $blog]]);
    	}
    	else
    	{

            return response()->json(['code'=>500,'success'=> false, 'message'=> 'Data is not exists in database']);
                    
    	}
    } 
    public function sms_api(Request $request)
    {
       $sms=Twilio::message('+91'.$request->mobile, $request->message);
       print_r($sms);   
    }   

}
   