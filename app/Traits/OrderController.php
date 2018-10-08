<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Api\User;

use App\Api\IndvUserDetails;

use App\Api\CorpUser;

use App\Api\CorpUserDetails;

use App\Api\Address;

use App\Api\Socialauth;

use App\Services;

use App\Items;

use App\ItemsPreferences;

use App\Packagings;

use App\Category;

use App\Price;

use App\PickUp;

use App\Deliver;

use Validator;

use DB, Hash, Mail;

use Illuminate\Support\Facades\Password;

use Illuminate\Mail\Message;

use Illuminate\Mail\Mailer;

use Image;

use App\Orders;

use App\OrderDetails;

use App\Traits\GeneralApi;

class OrderController extends Controller
{
    use GeneralApi;
    public function __construct(
        User $user,
        IndvUserDetails $indvUser,
        Address $address,
        CorpUser $corp,
        CorpUserDetails $corpUser
    )
    {
        $this->user = $user;
        $this->indvUser = $indvUser;
        $this->corp = $corp;
        $this->corpUser = $corpUser;
        $this->address = $address;
        //parent::__construct();
    }

    public function itemsWithPrice(Request $request)
    {
        $respData = $this->_checkHeaders();
        if($respData["success"] == true){
            // $rules = [
            //     'email' => 'required|email'
            //    // 'password' => 'required|confirmed|min:6',
            // ];
            // $input = $request->only(
            //     'email'
            // );
            // $validator = Validator::make($input, $rules);

            // if($validator->fails()) {
            //     $error = $validator->messages()->toJson();
            //     return response()->json(['code'=>401,'success'=> false, 'error'=> $error]);
            // }
            if(isset($request->categoryId) && $request->categoryId != "")
            $items = Items::where('categoryId','=',$request->categoryId)->get();
            else
            $items = Items::all();

            $price = Price::all();
            foreach($price as $p)

            foreach($items as $item)
            {
                $item->category = $item->itemsCategory;
                $item->price = $item->price;
                $packaging = $item->packaging;
                $packDetail = array();
                foreach($packaging as $pack)
                $packDetail[] = Packagings::find($pack->packageId);
                $item->packageDetails = $packDetail;
            }

            $itemDetail = array();
            foreach($items as $item){
                if(count($item->price) > 0){
                    $itemVal = array();
                    $itemVal["itemId"] = $item->itemId;
                    $itemVal["itemCode"] = $item->itemCode;
                    $itemVal["itemDesc"] = $item->itemDesc;
                    $itemVal["isChargeable"] = $item->isChargeable;
                    $itemVal["itemStatus"] = $item->itemStatus;
                    $itemVal["itemListStatus"] = $item->itemListStatus;
                    $itemVal["category"] = $item->category;
                    $itemVal["price"] = $item->price;
                    $itemVal["packageDetails"] = $item->packageDetails;
                    $itemDetail[] = $itemVal;
                }
            }

            if(count($itemDetail) > 0)
            return response()->json(['code'=>200,'success'=> true, 'message'=> 'Data Found','items' =>$itemDetail]);
            else
            return response()->json(['code'=>500,'success'=> true, 'message'=> 'No Data found']);
        } else {
            return response()->json(['code'=>$respData["code"],'success'=> $respData["success"], 'message'=> $respData["message"]]);
        }
        
    }

    public function createOrder(Request $request)
    {
        $respData = $this->_checkHeaders();
        if($respData["success"] == true){
            $rules = [
                'orderStr' => 'required'
            // 'password' => 'required|confirmed|min:6',
            ];
            $input = $request->only(
                'orderStr','pickup','delivery'
            );
            $validator = Validator::make($input, $rules);

            if($validator->fails()) {
                $error = $validator->messages()->toJson();
                return response()->json(['code'=>401,'success'=> false, 'error'=> $error]);
            }

            $pickupId = 0;
            if(isset($request->pickup)){
                if(count($request->pickup) > 0){
                    //$pickup = json_decode($request->pickup,true);
                    $pickup = $request->pickup;
                    $pickupId = $pickup["pickupId"];
                    if($pickupId == 0){
                        $pickupSave = PickUp::create(['userId' => $pickup["userId"],'userType' => $pickup["userType"],'pickupAddressId' => $pickup["pickupAddressId"],'actPickUpDate' => $pickup["actPickUpDate"],
                        'pickupStartTimestamp' => $pickup["pickupStartTimestamp"],'pickupEndTimestamp' => $pickup["pickupEndTimestamp"],'createdOn' => time()]);
                        if(count($pickupSave) > 0)
                        $pickupId = $pickupSave->pickupId;  
                    } else {
                        $pickupSave = PickUp::where(["pickupId" => $pickupId])->update(['userId' => $pickup["userId"],'userType' => $pickup["userType"],'pickupAddressId' => $pickup["pickupAddressId"],'actPickUpDate' => $pickup["actPickUpDate"],
                        'pickupStartTimestamp' => $pickup["pickupStartTimestamp"],'pickupEndTimestamp' => $pickup["pickupEndTimestamp"],'updatedOn' => time()]);
                    }
                    
                }
            }
            $deliveryId = 0;
            if(isset($request->delivery)){
                if(count($request->delivery) > 0){
                    //$delivery = json_decode($request->delivery,true);
                    $delivery = $request->delivery;
                    $deliveryId = $delivery["deliveryId"];
                    if($deliveryId == 0){
                        $deliverySave = Deliver::create(['customerId' => $delivery["userId"],'customerType' => $delivery["userType"],'deliveryLocation' => $delivery["deliveryAddressId"],'actDeliveryDate' => $delivery["actDeliveryDate"],
                        'deliveryStartTime' => $delivery["deliveryStartTime"],'deliveryEndTime' => $delivery["deliveryEndTime"],'ifNotAvailable' => $delivery["ifNotAvailable"],'prefNeighbourName' => $delivery["prefNeighbourName"],
                        'prefNeighbourAddr' => $delivery["prefNeighbourAddr"],'safePlaceDelivery' => $delivery["safePlaceDelivery"],'createdOn' => time()]);
                        if(count($deliverySave) > 0)
                        $deliveryId = $deliverySave->deliveryId;  
                    } else {
                        $deliverySave = Deliver::where(["deliveryId" => $deliveryId]) ->update(['customerId' => $delivery["userId"],'customerType' => $delivery["userType"],'deliveryLocation' => $delivery["deliveryAddressId"],'actDeliveryDate' => $delivery["actDeliveryDate"],
                        'deliveryStartTime' => $delivery["deliveryStartTime"],'deliveryEndTime' => $delivery["deliveryEndTime"],'ifNotAvailable' => $delivery["ifNotAvailable"],'prefNeighbourName' => $delivery["prefNeighbourName"],
                        'prefNeighbourAddr' => $delivery["prefNeighbourAddr"],'safePlaceDelivery' => $delivery["safePlaceDelivery"],'updatedOn' => time()]);
                    }
                    
                }
            }
            
            $orders=$request->orderStr;
            $orderId = $orders["orderId"];
            //$orders = json_decode($orderStr,true);
            $chk = $chkupdate = 0;
            if($orderId == 0){
                $orderGenId = time();
                $subId = substr($orderGenId,'-3');
                $digits = 4;
                $rand = rand(10000, 999999);
                $orderLsId = 'ls'.$subId.$rand;
            
                $orderSave = Orders::create(['userId' => $orders["userId"],'userType' => $orders["userType"],'orderLsId' => $orderLsId,'itemCount' => $orders["itemCount"],'status' => 1,'orderValue'=>$orders["subTotal"],
                'netAmount' => $orders["netAmount"],'pickupId' => $pickupId,'deliveryId' => $deliveryId,'taxAmount' => $orders["taxAmount"],'serviceId' => $orders["serviceId"],'createdOn' => time()]);
                if(count($orderSave) > 0)
                {
                    $items = $orders["item"];
                    foreach($items as $item)
                    {
                        $saveItems = OrderDetails::create(['orderId' => $orderSave->orderId,'itemId' =>  $item['itemId'],'itemName' => $item['itemName'],'quantity' => $item['quantity'],'subTotal' => $item['indvSubTotal'],
                        'rate' => $item['rate'],'isFavorite' => $item['isFavorite'],'packageId' => $item['packageId'],'createdOn' => time()]);
                        if(count($saveItems) > 0)
                        {
                            $chk++;
                        }
                    }
                }
            } else {
                $orderSave = Orders::where(["orderId" => $orderId])->update(['userId' => $orders["userId"],'userType' => $orders["userType"],'itemCount' => $orders["itemCount"],'status' => 1,'orderValue'=>$orders["subTotal"],
                'netAmount' => $orders["netAmount"],'pickupId' => $pickupId,'deliveryId' => $deliveryId,'taxAmount' => $orders["taxAmount"],'serviceId' => $orders["serviceId"],'updatedOn' => time()]);
                
                if($orderSave)
                {
                    $delItem = OrderDetails::where(["orderId" => $orderId])->delete();
                    
                    //if($delItem){
                        $items = $orders["item"];
                        foreach($items as $item)
                        {
                            $saveItems = OrderDetails::create(['orderId' => $orderId,'itemId' =>  $item['itemId'],'itemName' => $item['itemName'],'quantity' => $item['quantity'],'subTotal' => $item['indvSubTotal'],
                            'rate' => $item['rate'],'isFavorite' => $item['isFavorite'],'packageId' => $item['packageId'],'createdOn' => time()]);
                            if(count($saveItems) > 0)
                            {
                                $chkupdate++;
                            }
                        }
                    //}
                }
            }
            
            if($chk > 0)
            return response()->json(['code'=>200,'success'=> true, 'message'=> 'Orders saved successfully','orders' =>$orderSave]);
            else if($chkupdate > 0)
            return response()->json(['code'=>200,'success'=> true, 'message'=> 'Orders updated successfully','orders' =>$orderSave]);
            else
            return response()->json(['code'=>500,'success'=> true, 'message'=> 'some issue in order created']);
        } else {
            return response()->json(['code'=>$respData["code"],'success'=> $respData["success"], 'message'=> $respData["message"]]);
        }
    }

    public function viewOrder(Request $request)
    {

    }

	

}