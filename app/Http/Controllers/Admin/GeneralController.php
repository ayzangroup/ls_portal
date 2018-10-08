<?php



namespace App\Http\Controllers\Admin;



use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use Session;

use Auth;

use Redirect;

use DB, Hash, Mail;

use View;

use App\User;

use App\CorpUser;

use App\Feedback;

use App\Traits\SendNotification;

use App\Notification;

use App\NotificationUser;

use App\Sms;

use App\SmsUser;

use App\Jobs\QueuedSms;

use App\ReferCode;



class GeneralController extends Controller

{

    use SendNotification;//trait for send notifications



    public function send_notification(Request $request)

    {

        $users=User::where('web_player_id','!=','')->get();

        $corpusers=CorpUser::where('web_player_id','!=','')->get();

        return view::make('admin.send_notification',compact('users','corpusers'));

    }

    public function send_sms(Request $request)

    {

        $users=User::where('indvCustMobile','!=','')->get();

        $corpusers=CorpUser::where('concerPersonMobile','!=','')->get();

        return view::make('admin.send_sms',compact('users','corpusers'));

    }

    public function view_feedback(Request $request)

    {

        $feedback1=Feedback::where('message_type', 'feedback')->get();
        
        foreach($feedback1 as $feedbacks)
        {

           if($feedbacks->user_type == 'user')
           { 
            $feedbacks->username=$feedbacks->user_details->indvCustName;
            $feedbacks->email=$feedbacks->user_details->indvCustEmail;
           }
           elseif($feedbacks->user_type == 'corp')
           {
              $feedbacks->username=$feedbacks->corp_details->concernPerson;
              $feedbacks->email=$feedbacks->corp_details->corpoarateEmail;

           }
        }

        return view::make('admin.view_feedback',compact('feedback1'));

    }

    public function view_complaint(Request $request)

    {

        $complaints=Feedback::where('message_type','complaint')->get();

            
        foreach($complaints as $complaint)
        {
          
           if($complaint->user_type == 'user')
           { 
              $complaint->username=$complaint->user_details->indvCustName;
              $complaint->email=$complaint->user_details->indvCustEmail;
           }
           elseif($complaint->user_type == 'corp')
           {
              $complaint->username=$complaint->corp_details->concernPerson;
              $complaint->email=$complaint->corp_details->corpoarateEmail;

           }
        }

        return view::make('admin.view_complaint',compact('complaints'));

    } 



    public function send_notification_user_submit(Request $request)

    {
     
        $url1="";

       $content1 = array(

           "en" => "".$request->message.""

           );

       $title = array(

           "en" => "".$request->title.""

           );



       if ($request->image!='') 

         {

                $rand=rand(1,1000000);

                // Set the destination path

                $destinationPath = public_path().'/images/notification_images/';

                // Get the orginal filname or create the filename of your choice

                $filename2 = str_replace(' ', '_', $request->image->getClientOriginalName());

                $filename2=$rand.''.$filename2;

                $request->image->move($destinationPath, $filename2);

                $image=url('/').'/images/notification_images/'.$filename2;  

        }

        else

        {

            $image="";

        }


        $insert=new Notification($request->all());

        $insert->image=$image;

        $insert->save();

      

       foreach($request->users as $user)

       {

            $user_detail=User::where('indvCustId',$user)->first();

            if($user_detail->web_player_id!="")

            {

                $web_player_id[]=$user_detail->web_player_id;

            }



            $insert1=new NotificationUser($request->all());

            $insert1->objectId=$user;

            $insert1->objectType="user";

            $insert1->notificationId=$insert->uniqueId;

            $insert1->save();

       }



       if($web_player_id!="")

       {

            $web_player_id=implode(',',$web_player_id);

            $result1=$this->one_to_one($web_player_id,$content1,$url1,$title,$image);

       }



       return redirect()->back()->with('success','Notfications sent successfully.');

            

    }





    public function send_notification_corpuser_submit(Request $request)

    {

       

       $url1="";

       $content1 = array(

           "en" => "".$request->message.""

           );

       $title = array(

           "en" => "".$request->title.""

           );



       if ($request->image!='') 

         {

                $rand=rand(1,1000000);

                // Set the destination path

                $destinationPath = public_path().'/images/notification_images/';

                // Get the orginal filname or create the filename of your choice

                $filename2 = str_replace(' ', '_', $request->image->getClientOriginalName());

                $filename2=$rand.''.$filename2;

                $request->image->move($destinationPath, $filename2);

                $image=url('/').'/images/notification_images/'.$filename2;  

        }

        else

        {

            $image="";

        }



      

        $insert=new Notification($request->all());

        $insert->image=$image;

        $insert->save();

      

       foreach($request->users as $user)

       {

            $user_detail=CorpUser::where('corpCustId',$user)->first();

            if($user_detail->web_player_id!="")

            {

                $web_player_id[]=$user_detail->web_player_id;

            }



            $insert1=new NotificationUser($request->all());

            $insert1->objectId=$user;

            $insert1->objectType="corp";

            $insert1->notificationId=$insert->uniqueId;

            $insert1->save();

       }



       if($web_player_id!="")

       {

            $web_player_id=implode(',',$web_player_id);

            $result1=$this->one_to_one($web_player_id,$content1,$url1,$title,$image);

       }



       return redirect()->back()->with('success','Notfications sent successfully.');

            

    }

    public function send_sms_user_submit(Request $request)

    {

        $insert=new Sms($request->all());

        $insert->save();

    
       foreach($request->users as $user)

       {

            $user_detail=User::where('indvCustId',$user)->first();

            if($user_detail->indvCustMobile!="")

            {

                $indvCustMobile[]=$user_detail->indvCustMobile;

            }

            $insert1=new SmsUser($request->all());

            $insert1->objectId=$user;

            $insert1->objectType="user";

            $insert1->smsId=$insert->uniqueId;

            $insert1->save();

       }

       $user_message=$request->message;

       if($indvCustMobile!="")

       {

            $indvCustMobile=implode(',',$indvCustMobile);
            QueuedSms::dispatch($indvCustMobile,$user_message);
       }

       return redirect()->back()->with('success','Sms sent successfully.');

    }

    public function send_sms_corpuser_submit(Request $request)

    {

       $insert=new Sms($request->all());

        $insert->save();

      
       foreach($request->users as $user)

       {

            $user_detail=CorpUser::where('corpCustId',$user)->first();

           if($user_detail->concerPersonMobile!="")

            {

                $concerPersonMobile[]=$user_detail->concerPersonMobile;

            }

            $insert1=new SmsUser($request->all());

            $insert1->objectId=$user;

            $insert1->objectType="corp";

            $insert1->smsId=$insert->uniqueId;

            $insert1->save();

       }

         $user_message=$request->message;


       if($concerPersonMobile!="")

       {

            $concerPersonMobile=implode(",",$concerPersonMobile);;

            QueuedSms::dispatch($concerPersonMobile,$user_message);

       }


       return redirect()->back()->with('success','Sms sent successfully.');

            

    }

    public function refercode_detail()
    {
      $refer=ReferCode::first();
      return view::make('admin.view_refercode_detail',compact('refer'));
    }
    public function edit_refercodedetail(Request $request)
    {
      $refer=ReferCode::find(decrypt($request->id));

      return view::make('admin.edit_refercodedetail',compact('refer'));
    }

    public function unpublish_refercodedetail(Request $request)
    {

        $update=ReferCode::find($request->id);
        $update->pointsUsed='0';
        $save=$update->save();

        if($save)
            {
                return redirect()->route('admin.refercode_detail')->with('success','Refer Code Point unpublish Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }

    }

    public function publish_refercodedetail(Request $request)
    {

        $update=ReferCode::find($request->id);
        $update->pointsUsed='1';
        $save=$update->save();

        if($save)
            {
                return redirect()->route('admin.refercode_detail')->with('success','Refer Code Point publish Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }

    }

    public function update_refercode_detail(Request $request)
    {

        $update=ReferCode::find($request->id);
        $update->pointearned=$request->pointearned;
        $update->introducepointearned=$request->introducepointearned;
        $update->introducepointstatus=$request->introducepointstatus;
        $update->pointspent=$request->pointspent;
        $update->rateperpoint=$request->rateperpoint;
        $update->pointsUsed=$request->pointsUsed;

        $save=$update->save();

        if($save)
            {
                return redirect()->route('admin.refercode_detail')->with('success','Refer Code Point Edited Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }

    }



    

}

