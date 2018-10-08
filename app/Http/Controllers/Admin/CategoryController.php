<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use Session;
use Auth;
use Redirect;
use View;

class CategoryController extends Controller
{
	public function view_category()
    {
    	$data=Category::all(); 
        return view::make('admin.view_category',compact('data'));
    }

    public function submit_Category(Request $request)
    {
               
        $categorySlug = preg_replace('/[^A-Za-z0-9-]+/', '-', $request->categoryName);
        $insert=new Category($request->all());
        $insert->categorySlug=$categorySlug;
        $save=$insert->save();
        if($save)
            {
                return redirect()->route('admin.view_category')->with('success','Category Add Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }
    }


    public function delete_category(Request $request)
    {

    	$data=Category::Destroy($request->id);
        if($data)
            {
                return redirect()->route('admin.view_category')->with('success','Category delete Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }

    }


    public function update_category(Request $request)
    {
       
        $categorySlug = preg_replace('/[^A-Za-z0-9-]+/', '-', $request->categoryName);

        $update=Category::find($request->id);
        $update->categoryName=$request->categoryName;
        $update->categorySlug=$categorySlug;

        $save=$update->save();

        if($save)
            {
                return redirect()->route('admin.view_category')->with('success','Category Edited Successfully!');
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }

    }

}