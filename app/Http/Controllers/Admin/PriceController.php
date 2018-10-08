<?php



namespace App\Http\Controllers\Admin;



use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\Items;

use App\Price;

use Session;

use Auth;

use Redirect;

use View;



class PriceController extends Controller

{

	public function view_price()

    {

    	$data=Price::all();

        foreach($data as $item)

        {

           $item->item_name=$item->itemsName->itemCode;

        }

        return view::make('admin.view_price',compact('data'));

    }



    public function add_price()

    {   

        $items=Items::all();

        return view::make('admin.add_price',compact('items'));    

    }



    public function submit_price(Request $request)

    {

        $costPrice=$request->costPrice;

        $discountPercent=(($request->discount)/100);

        $discount= $costPrice*$discountPercent;

        $unitPrice=$costPrice-$discount;

        $margin=(($request->margin)/100);

        $vat=$tax=(($request->tax)/100);

        // $vat=(($request->vat)/100);

        

        $marginAmt=$unitPrice*$margin;



        $vatAmt=$taxAmt=$unitPrice*$tax;

        $vatOnMargin=$taxOnMargin=$marginAmt*$tax;



        // $vatAmt=$unitPrice*$vat;

        // $vatOnMargin=$marginAmt*$vat;



        $rate=$unitPrice+$marginAmt+$taxAmt+$taxOnMargin;

        

        $insert=new Price($request->all());

        $insert->costPrice=$costPrice;

        $insert->discountPercent=$discountPercent;

        $insert->discount=$discount;

        $insert->unitPrice=$unitPrice;

        $insert->margin=$margin;

        $insert->tax=$tax;

        $insert->vat=$vat;

        $insert->marginAmt=$marginAmt;

        $insert->taxAmt=$taxAmt;

        $insert->taxOnMargin=$taxOnMargin;

        $insert->vatAmt=$vatAmt;

        $insert->vatOnMargin=$vatOnMargin;

        $insert->rate=$rate;



        $save=$insert->save();

        if($save)

            {

                return redirect()->route('admin.view_price')->with('success','Price Add Successfully!');

            }

            else

            {

                return redirect()->back()->with('error','Something went wrong. Please try after some time!');

            }

    }



    public function edit_Price($id)

    {

        $id=decrypt($id);

        $items=Items::all();

        $price=Price::find($id);


        if(!empty($price))

            {

                return view::make('admin.edit_price',compact('price','items'));

            }

            else

            {

                return redirect()->back()->with('error','Something went wrong. Please try after some time!');

            }



    }



    public function delete_price(Request $request)

    {



    	$data=Price::Destroy($request->id);

        if($data)

            {

                return redirect()->route('admin.view_price')->with('success','Price delete Successfully!');

            }

            else

            {

                return redirect()->back()->with('error','Something went wrong. Please try after some time!');

            }



    }





    public function update_Price(Request $request)

    {

        $costPrice=$request->costPrice;

        $discountPercent=(($request->discount)/100);

        $discount= $costPrice*$discountPercent;

        $unitPrice=$costPrice-$discount;

        $margin=(($request->margin)/100);

        $vat=$tax=(($request->tax)/100);

        $marginAmt=$unitPrice*$margin;

        $vatAmt=$taxAmt=$unitPrice*$tax;

        $vatOnMargin=$taxOnMargin=$marginAmt*$tax;

        $rate=$unitPrice+$marginAmt+$taxAmt+$taxOnMargin;

        

        $update=Price::find($request->id);

        $update->itemId=$request->itemId;

        $update->customerType=$request->customerType;

        $update->listNumber=$request->listNumber;

        $update->discFixVale=$request->discFixVale;
        
        $update->costPrice=$costPrice;

        $update->discountPercent=$discountPercent;

        $update->discount=$discount;

        $update->unitPrice=$unitPrice;

        $update->margin=$margin;

        $update->tax=$tax;

        $update->vat=$vat;

        $update->marginAmt=$marginAmt;

        $update->taxAmt=$taxAmt;

        $update->taxOnMargin=$taxOnMargin;

        $update->vatAmt=$vatAmt;

        $update->vatOnMargin=$vatOnMargin;

        $update->rate=$rate;

        $update->status=$request->status;

        $update->remarks=$request->remarks;

        $save=$update->save();



        if($save)

            {

                return redirect()->route('admin.view_price')->with('success','Price Edited Successfully!');

            }

            else

            {

                return redirect()->back()->with('error','Something went wrong. Please try after some time!');

            }



    }



}