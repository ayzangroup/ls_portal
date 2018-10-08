<?php



namespace App\Http\Controllers\Admin;



use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\CorpUser;

use App\User;

use App\Driver;

use App\Laundry;

use App\Admin;

use App\Address;

use App\Help;

use App\RequestService;

use Session;

use Auth;

use Redirect;

use DB, Hash, Mail;

use View;

use App\Traits\Validation;



class UserController extends Controller

{

    use Validation;



	public function view_user()

	{

        

        $data=User::all(); 

        return view::make('admin.view_user',compact('data'));

    }

    public function view_corpuser()

	{

        

        $data=CorpUser::all(); 

        return view::make('admin.view_corpuser',compact('data'));

    }

    public function view_adminuser()

	{

        

        $data=Admin::all(); 

        return view::make('admin.view_adminuser',compact('data'));

    }

    public function view_driver()

    {

        

        $data=Driver::all(); 

        return view::make('admin.view_driver',compact('data'));

    }

     public function approve_driver(Request $request)

    {

        if($request->index=='1')

        {

            $update=Driver::where('driverId',$request->user_id)->update(['status'=>1]);

        }

        elseif($request->index=='3')

        {

            $update=Driver::where('driverId',$request->user_id)->update(['status'=>0]);

        }

        

    }

    public function driver_profile($id)

    {

        $id=decrypt($id);

        $data=Driver::find($id);

        $address=Address::where('objectId',$id)->where('objectType','driver')->first(); 

        return view::make('admin.driver_profile',compact('data','address'));

    }



    public function approve_driverdocument(Request $request)

    {

        if($request->index=='2')

        {

            $update=Driver::where('driverId',$request->user_id)->update(['licenseVerify'=>1]);

            $data=Driver::where('driverId',$request->user_id)->where('nationalVerify','1')->update(['isAuthorized'=>1]);

        }

        elseif($request->index=='3')

        {

            $update=Driver::where('driverId',$request->user_id)->update(['nationalVerify'=>1]);

            $data=Driver::where('driverId',$request->user_id)->where('licenseVerify','1')->update(['isAuthorized'=>1]);

        }

    }



    public function view_laundry()

    {

        

        $data=Laundry::all(); 

        return view::make('admin.view_laundry',compact('data'));

    }

    public function laundry_profile($id)

    {

        $id=decrypt($id);

        $data=Laundry::find($id);

        $address=Address::where('objectId',$id)->where('objectType','laundry')->first(); 

        return view::make('admin.laundry_profile',compact('data','address'));

    }



    public function approve_document(Request $request)

    {

        if($request->index=='2')

        {

            $update=Laundry::where('laundryId',$request->user_id)->update(['licenseVerify'=>1]);

            $data=Laundry::where('laundryId',$request->user_id)->where('nationalVerify','1')->update(['isAuthorized'=>1]);

        }

        elseif($request->index=='3')

        {

            $update=Laundry::where('laundryId',$request->user_id)->update(['nationalVerify'=>1]);

            $data=Laundry::where('laundryId',$request->user_id)->where('licenseVerify','1')->update(['isAuthorized'=>1]);

        }

    }



    public function approve_laundry(Request $request)

    {

        if($request->index=='1')

        {

            $update=Laundry::where('laundryId',$request->user_id)->update(['status'=>1]);

        }

        elseif($request->index=='3')

        {

            $update=Laundry::where('laundryId',$request->user_id)->update(['status'=>0]);

        }

        

    }





    public function register_form()

    {

        return view::make('admin.register_form',compact('data'));

    }

    public function register(Request $request)

    {

        if($request->password != $request->confirmed )

        {

            return redirect()->route('admin.view_adminuser')->with('error', 'Error Password is not match');

        }

        else

        {

            $password=Hash::make($request->password);

            $insert=new Admin($request->all());

            $insert->password=$password;

            $save=$insert->save();

            if($save)

                {

                    return redirect()->route('admin.view_adminuser')->with('success','Admin user Add Successfully!');

                }

                else

                {

                    return redirect()->back()->with('error','Something went wrong. Please try after some time!');

                }

        }

    }

     public function delete_admin(Request $request)

    {

            $delete=Admin::Destroy($request->id);

            if($delete)

                {

                    return redirect()->route('admin.view_adminuser')->with('success','Admin user Delete Successfully!');

                }

                else

                {

                    return redirect()->back()->with('error','Something went wrong. Please try after some time!');

                }

       

    }

    public function edit_admin(Request $request)

    {

            if($request->email)

            {

                $admin = Admin::find($request->id);

                 if (Hash::check($request->password, $admin->password)) 

                    {

                        $update=Admin::find($request->id);

                        $update->name=$request->name;

                        $update->email=$request->email;

                        $save=$update->save();



                        if($save)

                            {

                                return redirect()->route('admin.view_adminuser')->with('success','Admin User Edited Successfully!');

                            }

                            else

                            {

                                return redirect()->back()->with('error','Something went wrong. Please try after some time!');

                            }

                    }

                    else

                    {

                        $password=Hash::make($request->password);

                        $update=Admin::find($request->id);

                        $update->name=$request->name;

                        $update->email=$request->email;

                        $update->password=$password;

                        $save=$update->save();



                        if($save)

                            {

                                return redirect()->route('admin.view_adminuser')->with('success','Admin User Edited Successfully!');

                            }

                            else

                            {

                                return redirect()->back()->with('error','Something went wrong. Please try after some time!');

                            }



                    }

   

            }

            else

            {

                return redirect()->back()->with('error','Something went wrong. Please try after some time!');

            }

        

    }





    public function view_request()

    {



        $data=RequestService::all();

        foreach($data as $d)

        {

            $d->isViewed='1';

            $d->save();

        }

        return view::make('admin.view_request',compact('data'));

    }

    public function view_messages()

    {

        $data=Help::all();

        return view::make('admin.view_messages',compact('data'));

    }



}   