<?php



namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\Items;

use App\Packagings;

use App\Category;

use App\ItemsPreferences;

use Session;

use Auth;

use Redirect;

use View;



class ItemController extends Controller

{

	public function view_items()

    {

    	$data=Items::all();

        foreach($data as $categories)

        {

            $categories->category_name=$categories->itemsCategory->categoryName;

        } 

        return view::make('admin.view_items',compact('data'));

    }



    public function add_items()

    {   

    	$packagings=Packagings::all();

        $categories=Category::all();



        return view::make('admin.add_items',compact('packagings','categories'));    

    }



    public function submit_items(Request $request)

    {



        $insert=new Items($request->all());

        $save=$insert->save();

        if($save)

            {

                $itemId=$insert->itemId;

                $insert1=new ItemsPreferences($request->all());

                $insert1->itemId=$itemId;

                $save1=$insert1->save();

                if($save1)

                {

                    return redirect()->route('admin.view_items')->with('success','Items Add Successfully!');

                }

                else

                {

                    return redirect()->back()->with('error','Something went wrong. Please try after some time!');

                }



            }

            else

            {

                return redirect()->back()->with('error','Something went wrong. Please try after some time!');

            }

    }



    public function edit_items($id)

    {

        $id=decrypt($id);

        $items=Items::find($id);

        $packagings=Packagings::all();

        $categories=Category::all();

        $items->price=$items->packaging->price;

        $items->quantity=$items->packaging->quantity;

        $items->packagingId=$items->packaging->getItemPackaging->packagingId;

        if(!empty($items))

            {

                return view::make('admin.edit_items',compact('items','packagings','categories'));

            }

            else

            {

                return redirect()->back()->with('error','Something went wrong. Please try after some time!');

            }



    }



    public function delete_items(Request $request)

    {



    	$data=Items::Destroy($request->id);

        if($data)

            {

                return redirect()->route('admin.view_items')->with('success','Items delete Successfully!');

            }

            else

            {

                return redirect()->back()->with('error','Something went wrong. Please try after some time!');

            }



    }





    public function update_items(Request $request)

    {

       
        $update=Items::find($request->id);

        $update->itemCode=$request->itemCode;

        $update->itemDesc=$request->itemDesc;

        $update->categoryId=$request->categoryId;

        $update->remarks=$request->remarks;

        $update1=$update->save();

        if($update1)

            {
                 $insert1=ItemsPreferences::where('itemId',$request->id)->update(['price'=>$request->price,'quantity'=>$request->quantity,
                'packageId'=>$request->packageId]);

                return redirect()->route('admin.view_items')->with('success','Items Edited Successfully!');

            }

            else

            {

                return redirect()->back()->with('error','Something went wrong. Please try after some time!');

            }



    }



}