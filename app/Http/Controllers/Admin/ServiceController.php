<?php



namespace App\Http\Controllers\Admin;



use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\Services;

use Session;

use Auth;

use Redirect;

use View;



class ServiceController extends Controller

{

	public function view_services()

    {

    	$data=Services::all(); 

        return view::make('admin.view_services',compact('data'));

    }



    public function add_services()

    {

    

    	$data=Services::all();

        return view::make('admin.add_services',compact('data'));

    

    }



    public function submit_services(Request $request)

    {

        

        if ($request->image!='') 

         {

                $rand=rand(1,1000000);

                // Set the destination path

                $destinationPath = public_path().'/images/services_images/';

                // Get the orginal filname or create the filename of your choice

                $filename2 = str_replace(' ', '_', $request->image->getClientOriginalName());

                $filename2=$rand.''.$filename2;

                $request->image->move($destinationPath, $filename2);

        }   

        else

        {

            $filename2="";

        }



        $serviceSlug = preg_replace('/[^A-Za-z0-9-]+/', '-', $request->serviceName);



        $insert=new Services($request->all());

        $insert->serviceImage=$filename2;

        $insert->serviceSlug=$serviceSlug;

        $save=$insert->save();

        if($save)

            {

                return redirect()->route('admin.view_services')->with('success','Services Add Successfully!');

            }

            else

            {

                return redirect()->back()->with('error','Something went wrong. Please try after some time!');

            }

    }



    public function edit_services($id)

    {



        $id=decrypt($id);

        $services=Services::find($id);

        

        if(!empty($services))

            {

                return view::make('admin.edit_services',compact('services'));

            }

            else

            {

                return redirect()->back()->with('error','Something went wrong. Please try after some time!');

            }



    }



    public function delete_services(Request $request)

    {



    	$data=Services::Destroy($request->id);

        if($data)

            {

                return redirect()->route('admin.view_services')->with('success','Services delete Successfully!');

            }

            else

            {

                return redirect()->back()->with('error','Something went wrong. Please try after some time!');

            }



    }





    public function update_services(Request $request)

    {

       

        if ($request->image!='') 

         {

                $rand=rand(1,1000000);

                // Set the destination path

                $destinationPath = public_path().'/images/services_images';

                // Get the orginal filname or create the filename of your choice

                $filename2 = str_replace(' ', '_', $request->image->getClientOriginalName());

                $filename2=$rand.''.$filename2;

                $request->image->move($destinationPath, $filename2);

        }   

        else

        {

            $filename2=$request->image_old;

        }



        $serviceSlug = preg_replace('/[^A-Za-z0-9-]+/', '-', $request->serviceName);



        $update=Services::find($request->id);

        $update->serviceImage=$filename2;

        $update->serviceName=$request->serviceName;

        $update->serviceSlug=$serviceSlug;

        $update->serviceDescription=$request->serviceDescription;

        $save=$update->save();



        if($save)

            {

                return redirect()->route('admin.view_services')->with('success','Services Edited Successfully!');

            }

            else

            {

                return redirect()->back()->with('error','Something went wrong. Please try after some time!');

            }



    }



}