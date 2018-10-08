<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\TermsAndCondition;
use Auth;
use Redirect;
use DB, Hash, Mail;
use View;
use App\Banner;
use App\Privacy;
use App\FaqTitle;
use App\Faq;
use App\Serve;
use App\Process;
use App\WhyUs;
use App\ContactUs;
use App\Blog;

class CMSController extends Controller
{   

//Term Condition methond Function
    public function term_and_condition()
    {

    	$data=TermsAndCondition::first(); 
        return view::make('admin.view_terms_and_condition',compact('data'));
    
    }
    
    public function add_term_and_condition()
    {
    
    	$data=TermsAndCondition::first();
        return view::make('admin.add_terms_and_condition',compact('data'));
    
    }
    
    public function submit_term_and_condition(Request $request)
    {
    
    	if(isset($request->id))
    	{
    		$id=decrypt($request->id);
        	$update=TermsAndCondition::find($id);
        	$update->description=$request->description;
        	$save=$update->save();
        }
        else
        {
        	$insert=new TermsAndCondition($request->all());
        	$save=$insert->save();
        }
        if($save)
            {
                return redirect('/admin/term_and_condition')->with('success','Term and Condition Add Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }
        
    }

  
//Privacy Page methond Function
    
    public function view_privacy()
    {
    
    	$data=Privacy::first();
        return view::make('admin.view_privacy',compact('data'));
    
    }
    
    public function add_privacy()
    {
    
    	$data=Privacy::first();
        return view::make('admin.add_privacy',compact('data'));
    
    }

    public function submit_privacy(Request $request)
    {

    	if(isset($request->id))
    	{
    		$id=decrypt($request->id);
        	$update=Privacy::find($id);
        	$update->description=$request->description;
        	$save=$update->save();
        }
        else
        {
        	$insert=new Privacy($request->all());
        	$save=$insert->save();
        }
        if($save)
            {
                return redirect('/admin/view_privacy')->with('success','Privacy Add Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }
        
    }


//Banner methond Function
    
    public function view_banner()
    {
    	
        $data=Banner::all();
        return view::make('admin.view_banner',compact('data'));
    
    }

    public function add_banner()
    {
    
    	$data=Banner::all();
        return view::make('admin.add_banner',compact('data'));
    
    }

    public function submit_banner(Request $request)
    {
        
        if ($request->image!='') 
         {
                $rand=rand(1,1000000);
                // Set the destination path
                $destinationPath = public_path().'/images/banner_images/';
                // Get the orginal filname or create the filename of your choice
                $filename2 = str_replace(' ', '_', $request->image->getClientOriginalName());
                $filename2=$rand.''.$filename2;
                $request->image->move($destinationPath, $filename2);
        }   
        else
        {
            $filename2="";
        }


        $insert=new Banner($request->all());
        $insert->image=$filename2;
        $save=$insert->save();
        if($save)
            {
                return redirect()->route('admin.view_banner')->with('success','Banner Add Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }
    }

    public function edit_banner($id)
    {

        $id=decrypt($id);
        $banner=banner::find($id);
        
        if(!empty($banner))
            {
                return view::make('admin.edit_banner',compact('banner'));
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }

    }

    public function delete_banner(Request $request)
    {
    	$data=Banner::Destroy($request->id);
        if($data)
            {
                return redirect()->route('admin.view_banner')->with('success','Banner delete Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }

    }


    public function update_banner(Request $request)
    {
       
        if ($request->image!='') 
         {
                $rand=rand(1,1000000);
                // Set the destination path
                $destinationPath = public_path().'/images/banner_images';
                // Get the orginal filname or create the filename of your choice
                $filename2 = str_replace(' ', '_', $request->image->getClientOriginalName());
                $filename2=$rand.''.$filename2;
                $request->image->move($destinationPath, $filename2);
        }   
        else
        {
            $filename2=$request->image_old;
        }

        $update=Banner::find($request->id);
        $update->image=$filename2;
         $update->title=$request->title;
        $update->description=$request->description;
        $save=$update->save();

        if($save)
            {
                return redirect()->route('admin.view_banner')->with('success','Banners Edited Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }

    }


//Faq Title methond Function
    public function faqtitle()
    {

       $data=FaqTitle::all();
        return view::make('admin.faq_title',compact('data'));
    
    }

    public function submit_faqtitle (Request $request)
    {
       
       if(isset($request->id))
    	{
    		$id=decrypt($request->id);
        	$update=FaqTitle::find($id);
        	$update->title=$request->title;
        	$save=$update->save();
        }
        else
        {
        	$insert=new FaqTitle($request->all());
        	$save=$insert->save();
        }
        if($save)
            {
                return redirect('/admin/faqtitle')->with('success','Faq Title Add Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }
    
    }


    public function delete_faqtitle(Request $request)
    {
    
    	$data=FaqTitle::Destroy($request->id);
    
        if($data)
            {
                return redirect()->route('admin.faqtitle')->with('success','Faq Title delete Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }
    }


    public function edit_faqtitle(Request $request)
    {
       
        $update=FaqTitle::find($request->id);
        $update->title=$request->title;
        $save=$update->save();

        if($save)
            {
                return redirect()->route('admin.faqtitle')->with('success','Faq Edited Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }

    }

//FAQ methond Function
    public function view_faq()
    {
        
        $data=Faq::all();
        foreach($data as $d)
        {
        	 
        	$d->title_name=$d->faq_title->title;
        }
        return view::make('admin.view_faq',compact('data'));
    
    }

    public function add_faq()
    { 
        $data=FaqTitle::orderBy('id','asc')->get();
        return view::make('admin.add_faq',compact('data'));
    
    }

    public function submit_faq (Request $request)
    {
    
        	$insert=new Faq($request->all());
        	$save=$insert->save();
        
        if($save)
            {
                return redirect('/admin/view_faq')->with('success','Faq Data Add Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }
    
    }

    public function delete_faq(Request $request)
    {
    
        $data=Faq::Destroy($request->id);
    
        if($data)
            {
                return redirect()->route('admin.view_faq')->with('success','Faq Data delete Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }
    }


     public function edit_faq($id)
    {

        $id=decrypt($id);
        $data=Faq::find($id);
        $title=FaqTitle::orderBy('id','asc')->get();
        if(!empty($data))
            {
                return view::make('admin.edit_faq',compact('data','title'));
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }

    }


    public function update_faq(Request $request)
    {
       
        $update=Faq::find($request->id);
        $update->sub_title=$request->sub_title;
        $update->title=$request->title;
        $update->description=$request->description;
        $save=$update->save();

        if($save)
            {
                return redirect()->route('admin.view_faq')->with('success', 'Faq Data Edited Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }
    }

//Services methond Function

    public function view_serve()
    {
        
        $data=Serve::all();
        
        return view::make('admin.view_serve',compact('data'));
    
    }


    public function add_serve()
    {
    
        return view::make('admin.add_serve');
    
    }

    public function submit_serve (Request $request)
    {
    
            if ($request->image!='') 
         {
                $rand=rand(1,1000000);
                // Set the destination path
                $destinationPath = public_path().'/images/serve_images/';
                // Get the orginal filname or create the filename of your choice
                $filename2 = str_replace(' ', '_', $request->image->getClientOriginalName());
                $filename2=$rand.''.$filename2;
                $request->image->move($destinationPath, $filename2);
        }   
        else
        {
            $filename2="";
        }


        $insert=new Serve($request->all());
        $insert->logo=$filename2;
        $save=$insert->save();
        
        if($save)
            {
                return redirect('/admin/view_serve')->with('success','serve Title Add Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }
    
    }


    public function delete_serve(Request $request)
    {
       
        $data=Serve::Destroy($request->id);
        if($data)
            {
                return redirect()->route('admin.view_serve')->with('success','Serve delete Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }

    }

     public function edit_serve($id)
    {

        $id=decrypt($id);
        $data=Serve::find($id);
        
        if(!empty($data))
            {
                return view::make('admin.edit_serve',compact('data'));
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }

    }


    public function update_serve(Request $request)
    {
       
        if ($request->image!='') 
         {
                $rand=rand(1,1000000);
                // Set the destination path
                $destinationPath = public_path().'/images/serve_images';
                // Get the orginal filname or create the filename of your choice
                $filename2 = str_replace(' ', '_', $request->image->getClientOriginalName());
                $filename2=$rand.''.$filename2;
                $request->image->move($destinationPath, $filename2);
        }   
        else
        {
            $filename2=$request->image_old;
        }

        $update=Serve::find($request->id);
        $update->logo=$filename2;
        $update->heading=$request->heading;
        $update->title=$request->title;
        $update->description=$request->description;
        $save=$update->save();

        if($save)
            {
                return redirect()->route('admin.view_serve')->with('success','Serve Edited Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }

    }


//Process Function Method


    public function view_process()
    {
        
        $data=Process::all();
        
        return view::make('admin.view_process',compact('data'));
    
    }


    public function add_process()
    {
    
        return view::make('admin.add_process');
    
    }

    public function submit_process (Request $request)
    {
    
            if ($request->image!='') 
         {
                $rand=rand(1,1000000);
                // Set the destination path
                $destinationPath = public_path().'/images/process_images/';
                // Get the orginal filname or create the filename of your choice
                $filename2 = str_replace(' ', '_', $request->image->getClientOriginalName());
                $filename2=$rand.''.$filename2;
                $request->image->move($destinationPath, $filename2);
        }   
        else
        {
            $filename2="";
        }


        $insert=new Process($request->all());
        $insert->logo=$filename2;
        $save=$insert->save();
        
        if($save)
            {
                return redirect('/admin/view_process')->with('success','process Title Add Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }
    
    }


    public function delete_process(Request $request)
    {
       
        $data=Process::Destroy($request->id);
        if($data)
            {
                return redirect()->route('admin.view_process')->with('success','Process delete Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }

    }

     public function edit_process($id)
    {

        $id=decrypt($id);
        $data=Process::find($id);
        
        if(!empty($data))
            {
                return view::make('admin.edit_process',compact('data'));
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }

    }


    public function update_process(Request $request)
    {
       
        if ($request->image!='') 
         {
                $rand=rand(1,1000000);
                // Set the destination path
                $destinationPath = public_path().'/images/process_images';
                // Get the orginal filname or create the filename of your choice
                $filename2 = str_replace(' ', '_', $request->image->getClientOriginalName());
                $filename2=$rand.''.$filename2;
                $request->image->move($destinationPath, $filename2);
        }   
        else
        {
            $filename2=$request->image_old;
        }

        $update=Process::find($request->id);
        $update->logo=$filename2;
        $update->title=$request->title;
        $update->description=$request->description;
        $save=$update->save();

        if($save)
            {
                return redirect()->route('admin.view_process')->with('success','Process Edited Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }

    }


//whyus Function Method


    public function view_whyus()
    {
        
        $data=WhyUs::all();
        
        return view::make('admin.view_whyus',compact('data'));
    
    }


    public function add_whyus()
    {
    
        return view::make('admin.add_whyus');
    
    }

    public function submit_whyus (Request $request)
    {
    
            if ($request->image!='') 
         {
                $rand=rand(1,1000000);
                // Set the destination path
                $destinationPath = public_path().'/images/whyus_images/';
                // Get the orginal filname or create the filename of your choice
                $filename2 = str_replace(' ', '_', $request->image->getClientOriginalName());
                $filename2=$rand.''.$filename2;
                $request->image->move($destinationPath, $filename2);
        }   
        else
        {
            $filename2="";
        }


        $insert=new WhyUs($request->all());
        $insert->image=$filename2;
        $save=$insert->save();
        
        if($save)
            {
                return redirect('/admin/view_whyus')->with('success','WhyUs Data Add Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }
    
    }


    public function delete_whyus(Request $request)
    {
       
        $data=WhyUs::Destroy($request->id);
        if($data)
            {
                return redirect()->route('admin.view_whyus')->with('success','WhyUs Data delete Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }

    }

     public function edit_whyus($id)
    {

        $id=decrypt($id);
        $data=WhyUs::find($id);
        
        if(!empty($data))
            {
                return view::make('admin.edit_whyus',compact('data'));
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }

    }


    public function update_whyus(Request $request)
    {
       
        if ($request->image!='') 
         {
                $rand=rand(1,1000000);
                // Set the destination path
                $destinationPath = public_path().'/images/whyus_images';
                // Get the orginal filname or create the filename of your choice
                $filename2 = str_replace(' ', '_', $request->image->getClientOriginalName());
                $filename2=$rand.''.$filename2;
                $request->image->move($destinationPath, $filename2);
        }   
        else
        {
            $filename2=$request->image_old;
        }

        $update=WhyUs::find($request->id);
        $update->image=$filename2;
        $update->heading=$request->heading;
        $update->description=$request->description;
        $save=$update->save();

        if($save)
            {
                return redirect()->route('admin.view_whyus')->with('success','WhyUs Data Edited Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }

    }


//Conact Us Data methond Function
    
    public function view_contactus()
    {
    
        $data=ContactUs::first();
        return view::make('admin.view_contactus',compact('data'));
    
    }
    
    public function add_contactus()
    {
    
        $data=ContactUs::first();
        if(count($data)=='0')
        {
            $data[]='';
        }
        return view::make('admin.add_contactus',compact('data'));
    
    }

    public function submit_contactus(Request $request)
    {

        if(!empty($request->language) && !empty($request->phone))
        {
            $data=array_combine($request->language, $request->phone);
        }
        else
        {
            $data=[];
        }
        
            $data=json_encode($data);

            $insert=new ContactUs($request->all());
            $insert->data=$data;
            $save=$insert->save();
        if($save)
            {
                return redirect('/admin/view_contactus')->with('success','Contact Us  Data Add Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }
        
    }

    public function edit_contactus($id)
    {

        $id=decrypt($id);
        $data=ContactUs::find($id);
        
        if(!empty($data))
            {
                return view::make('admin.edit_contactus',compact('data'));
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }

    }


     public function update_contactus(Request $request)
    {
       
         if(!empty($request->language) && !empty($request->phone))
        {
            $data=array_combine($request->language, $request->phone);
        }
        else
        {
            $data=[];
        }
        
            $data=json_encode($data);

        $update=ContactUs::find($request->id);
        $update->data=$data;
        $update->email=$request->email;
        $update->iframe=$request->iframe;
        $save=$update->save();

        if($save)
            {
                return redirect()->route('admin.view_contactus')->with('success','Conact Us Data Edited Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }

    }

//Privacy Page methond Function
    
    public function view_blog()
    {
    
        $data=Blog::first();
        return view::make('admin.view_blog',compact('data'));
    
    }
    
    public function add_blog()
    {
    
        $data=Blog::first();
        return view::make('admin.add_blog',compact('data'));
    
    }

    public function submit_blog(Request $request)
    {
       
        if ($request->image!='') 
             {
                    $rand=rand(1,1000000);
                    // Set the destination path
                    $destinationPath = public_path().'/images/blog_images';
                    // Get the orginal filname or create the filename of your choice
                    $filename2 = str_replace(' ', '_', $request->image->getClientOriginalName());
                    $filename2=$rand.''.$filename2;
                    $request->image->move($destinationPath, $filename2);
            }   
            else
            {
                $filename2=$request->old_image;
            }

        if(isset($request->id))
        {

            $id=decrypt($request->id);
            $update=Blog::find($id);
            $update->description=$request->description;
            $update->image=$filename2;
            $update->heading=$request->heading;
            $save=$update->save();
        }
        else
        {
            $insert=new Blog($request->all());
            $insert->image=$filename2;
            $save=$insert->save();
        }
        if($save)
            {
                return redirect('/admin/view_blog')->with('success','Blog Add Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }
        
    }



}
