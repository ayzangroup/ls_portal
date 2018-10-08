<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\EndUser;
use App\CorpUser;
use App\IndvUserDetails;
use App\Orders;
use App\Drivers;
use App\Services;
use App\Category;
use App\Items;
use App\ItemsPreferences;
use App\Laundryman;
use App\Packagings;
use Session;
use Auth;
use Redirect;
use DB, Hash, Mail;

class GeneralController extends Controller
{   
    public function __construct(Orders $order,Services $services,Category $category,Packagings $packagings,Items $items,ItemsPreferences $itemPrefer){
        // $this->endUser = $endUser;
        // $this->indvUserDetails = $indvUserDetails;
        $this->order = $order;
        // $this->drivers = $drivers;
        // $this->laundryman = $laundryman;
        // $this->corpUser = $corpUser;
        $this->services = $services;
        $this->categories = $category;
        $this->packagings = $packagings;
        $this->items = $items;
        $this->itemPrefer = $itemPrefer;
        //$this->middleware('admin.auth');
    }
   
    
    public function getServices(Request $request){    
        if($request->ajax()){
            $request->session()->put('searchsr', $request
                ->has('searchsr') ? $request->get('searchsr') : ($request->session()
                ->has('searchsr') ? $request->session()->get('searchsr') : ''));
            
            $request->session()->put('pgsr', $request
                ->has('pgsr') ? $request->get('pgsr') : ($request->session()
                ->has('pgsr') ? $request->session()->get('pgsr') : 5));
            
            //print_r($request->session()->get('pg'));
            // $request->session()->put('filtersr', $request
            //     ->has('filtersr') ? $request->get('filtersr') : ($request->session()
            //     ->has('filtersr') ? $request->session()->get('filtersr') : ''));

            $request->session()->put('fieldsr', $request
                ->has('fieldsr') ? $request->get('fieldsr') : ($request->session()
                ->has('fieldsr') ? $request->session()->get('fieldsr') : 'serviceName'));

            $request->session()->put('sortsr', $request
                ->has('sortsr') ? $request->get('sortsr') : ($request->session()
                ->has('sortsr') ? $request->session()->get('sortsr') : 'asc'));
                
        
            //if($request->session()->get('filtersr') == '' || $request->session()->get('filtersr') == -1){
                $userList = $this->services
                        //->indvUser();
                        ->where('serviceName','like','%'. $request->session()->get('searchsr').'%')
                        ->orderBy($request->session()->get('fieldsr'), $request->session()->get('sortsr'))
                        ->paginate($request->session()->get('pgsr'));
            // } else {
            //     $userList = $this->corpUser
            //         //->indvUser();
            //         ->where('corporationName','like','%'. $request->session()->get('searchsr').'%')
            //         ->where('corpCustStatus','=',$request->session()->get('filtersr'))
            //         ->orderBy($request->session()->get('fieldsr'), $request->session()->get('sortsr'))
            //         ->paginate($request->session()->get('pgsr'));
            // }
            
            return \View::make('admin.ajax.ajaxServices')->with('serviceDetails',$userList);
         } else {
            
            if($request->session()->has('searchsr'))
            $request->session()->forget('searchsr');
            
            // if($request->session()->has('filtersr'))
            // $request->session()->forget('filtersr');

            // $dataSession = session()->all();
            // dd($dataSession);
            $request->session()->put('searchsr', $request
            ->has('searchsr') ? $request->get('searchsr') : ($request->session()
            ->has('searchsr') ? $request->session()->get('searchsr') : ''));
        
            $request->session()->put('pgsr', $request
                ->has('pgsr') ? $request->get('pgsr') : ($request->session()
                ->has('pgsr') ? $request->session()->get('pgsr') : 5));
            
            //print_r($request->session()->get('pg'));
            // $request->session()->put('filtersr', $request
            //     ->has('filtersr') ? $request->get('filtersr') : ($request->session()
            //     ->has('filtersr') ? $request->session()->get('filtersr') : ''));

            $request->session()->put('fieldsr', $request
                ->has('fieldsr') ? $request->get('fieldsr') : ($request->session()
                ->has('fieldsr') ? $request->session()->get('fieldsr') : 'serviceName'));

            $request->session()->put('sortsr', $request
                ->has('sortsr') ? $request->get('sortsr') : ($request->session()
                ->has('sortsr') ? $request->session()->get('sortsr') : 'asc'));
                
        
            //if($request->session()->get('filtersr') == '' || $request->session()->get('filtersr') == -1){
                $userList = $this->services
                        //->indvUser();
                        ->where('serviceName','like','%'. $request->session()->get('searchsr').'%')
                        ->orderBy($request->session()->get('fieldsr'), $request->session()->get('sortsr'))
                        ->paginate($request->session()->get('pgsr'));
            // } else {
            //     $userList = $this->corpUser
            //         //->indvUser();
            //         ->where('corporationName','like','%'. $request->session()->get('searchsr').'%')
            //         ->where('corpCustStatus','=',$request->session()->get('filtersr'))
            //         ->orderBy($request->session()->get('fieldsr'), $request->session()->get('sortsr'))
            //         ->paginate($request->session()->get('pgsr'));
            // }

            //Session::flush();
            return \View::make('admin.services')->with('serviceDetails',$userList);
        }
    }
     
    
    public function saveServices(Request $request){
        
        if(isset($request->hdServiceId) && $request->hdServiceId != ""){
            $serviceName = $serviceSlug = "";
            if(!empty($request->serviceName))
            $serviceName = $request->serviceName;

            $serviceSlug = $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $serviceName);
            
            $serviceCreate =$this->services->where('serviceId',$request->hdServiceId)->update(['serviceName' =>  $serviceName,'serviceSlug' => $serviceSlug]);
            if($serviceCreate){
                return Redirect::to('admin/services')->with(array('respMessage', 'Service updated successfully!'));
            } else {
                return Redirect::to('admin/services')->with(array('respMessage'=>'Some issue while updating services'));
            }
        } else {
            $serviceName = $serviceSlug = "";
            if(!empty($request->serviceName))
            $serviceName = $request->serviceName;

            $serviceSlug = $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $serviceName);
                
            $serviceCreate =$this->services->create([ 'serviceName' =>  $serviceName,'serviceSlug' => $serviceSlug, 'createdOn' => time()]);
            if($serviceCreate){
                return Redirect::to('admin/services')->with(array('respMessage', 'Service saved successfully!'));
            } else {
                return Redirect::to('admin/services')->with(array('respMessage'=>'Some issue while save the services'));
            }
        }
    }
    
    public function getCategories(Request $request){    
        if($request->ajax()){
            $request->session()->put('searchca', $request
                ->has('searchca') ? $request->get('searchca') : ($request->session()
                ->has('searchca') ? $request->session()->get('searchca') : ''));
            
            $request->session()->put('pgca', $request
                ->has('pgca') ? $request->get('pgca') : ($request->session()
                ->has('pgca') ? $request->session()->get('pgca') : 5));
            
            //print_r($request->session()->get('pg'));
            // $request->session()->put('filterc', $request
            //     ->has('filterc') ? $request->get('filterc') : ($request->session()
            //     ->has('filterc') ? $request->session()->get('filterc') : ''));

            $request->session()->put('fieldca', $request
                ->has('fieldca') ? $request->get('fieldca') : ($request->session()
                ->has('fieldca') ? $request->session()->get('fieldca') : 'serviceName'));

            $request->session()->put('sortca', $request
                ->has('sortca') ? $request->get('sortca') : ($request->session()
                ->has('sortca') ? $request->session()->get('sortca') : 'asc'));
                
        
            //if($request->session()->get('filterc') == '' || $request->session()->get('filterc') == -1){
                $userList = $this->categories
                        //->indvUser();
                        ->where('categoryName','like','%'. $request->session()->get('searchca').'%')
                        ->orderBy($request->session()->get('fieldca'), $request->session()->get('sortca'))
                        ->paginate($request->session()->get('pgca'));
            // } else {
            //     $userList = $this->corpUser
            //         //->indvUser();
            //         ->where('corporationName','like','%'. $request->session()->get('searchca').'%')
            //         ->where('corpCustStatus','=',$request->session()->get('filterc'))
            //         ->orderBy($request->session()->get('fieldca'), $request->session()->get('sortca'))
            //         ->paginate($request->session()->get('pgca'));
            // }
            
            return \View::make('admin.ajax.ajaxCategory')->with('categoryDetails',$userList);
         } else {
            
            if($request->session()->has('searchca'))
            $request->session()->forget('searchca');
            
            // if($request->session()->has('filterc'))
            // $request->session()->forget('filterc');

            // $dataSession = session()->all();
            // dd($dataSession);
            $request->session()->put('searchca', $request
            ->has('searchca') ? $request->get('searchca') : ($request->session()
            ->has('searchca') ? $request->session()->get('searchca') : ''));
        
            $request->session()->put('pgca', $request
                ->has('pgca') ? $request->get('pgca') : ($request->session()
                ->has('pgca') ? $request->session()->get('pgca') : 5));
            
            //print_r($request->session()->get('pg'));
            // $request->session()->put('filterc', $request
            //     ->has('filterc') ? $request->get('filterc') : ($request->session()
            //     ->has('filterc') ? $request->session()->get('filterc') : ''));

            $request->session()->put('fieldca', $request
                ->has('fieldca') ? $request->get('fieldca') : ($request->session()
                ->has('fieldca') ? $request->session()->get('fieldca') : 'categoryName'));

            $request->session()->put('sortca', $request
                ->has('sortca') ? $request->get('sortca') : ($request->session()
                ->has('sortca') ? $request->session()->get('sortca') : 'asc'));
                
        
            //if($request->session()->get('filterc') == '' || $request->session()->get('filterc') == -1){
                $userList = $this->categories
                        ->where('categoryName','like','%'. $request->session()->get('searchca').'%')
                        ->orderBy($request->session()->get('fieldca'), $request->session()->get('sortca'))
                        ->paginate($request->session()->get('pgca'));
            // } else {
            //     $userList = $this->corpUser
            //         //->indvUser();
            //         ->where('corporationName','like','%'. $request->session()->get('searchca').'%')
            //         ->where('corpCustStatus','=',$request->session()->get('filterc'))
            //         ->orderBy($request->session()->get('fieldca'), $request->session()->get('sortca'))
            //         ->paginate($request->session()->get('pgca'));
            // }

            //Session::flush();
            return \View::make('admin.categories')->with('categoryDetails',$userList);
        }
         
    }
    public function saveCategory(Request $request){
        
        if(isset($request->hdCategoryId) && $request->hdCategoryId != ""){
            $categoryName = $categorySlug = "";
            $parentCategory = 0;
            if(!empty($request->categoryName))
            $categoryName = $request->categoryName;

            $categorySlug = $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $categoryName);

            if(!empty($request->ddlParent))
            $parentCategory = $request->ddlParent;
            
            $categoryCreate =$this->categories->where('categoryId',$request->hdCategoryId)->update(['categoryName' =>  $categoryName,'categorySlug' => $categorySlug,'parentCategoryId' => $parentCategory]);
            if($categoryCreate){
                return Redirect::to('admin/services')->with(array('respMessage', 'Category updated successfully!'));
            } else {
                return Redirect::to('admin/services')->with(array('respMessage'=>'Some issue while updating categories'));
            }
        } else {
            $categoryName = $categorySlug = "";
            $parentCategory = 0;
            if(!empty($request->categoryName))
            $categoryName = $request->categoryName;

            $categorySlug = $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $categoryName);

            if(!empty($request->ddlParent))
            $parentCategory = $request->ddlParent;
                
            $categoryCreate =$this->categories->create(['categoryName' =>  $categoryName,'categorySlug' => $categorySlug,'parentCategoryId' => $parentCategory]);
            if($categoryCreate){
                return Redirect::to('admin/categories')->with(array('respMessage', 'Category updated successfully!'));
            } else {
                return Redirect::to('admin/categories')->with(array('respMessage'=>'Some issue while updating categories'));
            }
        }
    }
    public function getPackagings(Request $request){    
        if($request->ajax()){
            $request->session()->put('searchp', $request
                ->has('searchp') ? $request->get('searchp') : ($request->session()
                ->has('searchp') ? $request->session()->get('searchp') : ''));
            
            $request->session()->put('pgcp', $request
                ->has('pgcp') ? $request->get('pgcp') : ($request->session()
                ->has('pgcp') ? $request->session()->get('pgcp') : 5));
            
            //print_r($request->session()->get('pg'));
            // $request->session()->put('filterc', $request
            //     ->has('filterc') ? $request->get('filterc') : ($request->session()
            //     ->has('filterc') ? $request->session()->get('filterc') : ''));

            $request->session()->put('fieldp', $request
                ->has('fieldp') ? $request->get('fieldp') : ($request->session()
                ->has('fieldp') ? $request->session()->get('fieldp') : 'packagingName'));

            $request->session()->put('sortp', $request
                ->has('sortp') ? $request->get('sortp') : ($request->session()
                ->has('sortp') ? $request->session()->get('sortp') : 'asc'));
                
        
            //if($request->session()->get('filterc') == '' || $request->session()->get('filterc') == -1){
                $userList = $this->packagings
                        //->indvUser();
                        ->where('packagingName','like','%'. $request->session()->get('searchp').'%')
                        ->orderBy($request->session()->get('fieldp'), $request->session()->get('sortp'))
                        ->paginate($request->session()->get('pgcp'));
            // } else {
            //     $userList = $this->corpUser
            //         //->indvUser();
            //         ->where('corporationName','like','%'. $request->session()->get('searchp').'%')
            //         ->where('corpCustStatus','=',$request->session()->get('filterc'))
            //         ->orderBy($request->session()->get('fieldp'), $request->session()->get('sortp'))
            //         ->paginate($request->session()->get('pgcp'));
            // }
            
            return \View::make('admin.ajax.ajaxPackaging')->with('packagingDetails',$userList);
         } else {
            
            if($request->session()->has('searchp'))
            $request->session()->forget('searchp');
            
            // if($request->session()->has('filterc'))
            // $request->session()->forget('filterc');

            // $dataSession = session()->all();
            // dd($dataSession);
            $request->session()->put('searchp', $request
            ->has('searchp') ? $request->get('searchp') : ($request->session()
            ->has('searchp') ? $request->session()->get('searchp') : ''));
        
            $request->session()->put('pgcp', $request
                ->has('pgcp') ? $request->get('pgcp') : ($request->session()
                ->has('pgcp') ? $request->session()->get('pgcp') : 5));
            
            //print_r($request->session()->get('pg'));
            // $request->session()->put('filterc', $request
            //     ->has('filterc') ? $request->get('filterc') : ($request->session()
            //     ->has('filterc') ? $request->session()->get('filterc') : ''));

            $request->session()->put('fieldp', $request
                ->has('fieldp') ? $request->get('fieldp') : ($request->session()
                ->has('fieldp') ? $request->session()->get('fieldp') : 'packagingName'));

            $request->session()->put('sortp', $request
                ->has('sortp') ? $request->get('sortp') : ($request->session()
                ->has('sortp') ? $request->session()->get('sortp') : 'asc'));
                
        
            //if($request->session()->get('filterc') == '' || $request->session()->get('filterc') == -1){
                $userList = $this->packagings
                        ->where('packagingName','like','%'. $request->session()->get('searchp').'%')
                        ->orderBy($request->session()->get('fieldp'), $request->session()->get('sortp'))
                        ->paginate($request->session()->get('pgcp'));
            // } else {
            //     $userList = $this->corpUser
            //         //->indvUser();
            //         ->where('corporationName','like','%'. $request->session()->get('searchp').'%')
            //         ->where('corpCustStatus','=',$request->session()->get('filterc'))
            //         ->orderBy($request->session()->get('fieldp'), $request->session()->get('sortp'))
            //         ->paginate($request->session()->get('pgcp'));
            // }

            //Session::flush();
            return \View::make('admin.packagings')->with('packagingDetails',$userList);
        }
         
    }
    public function savePackaging(Request $request){
        
        if(isset($request->hdPackagingId) && $request->hdPackagingId != ""){
            $packagingName = $packagingType = "";
            
            if(!empty($request->packagingName))
            $packagingName = $request->packagingName;

            if(!empty($request->packagingType))
            $packagingType = $request->packagingType;
            
            $packagingCreate =$this->packagings->where('packagingId',$request->hdPackagingId)->update(['packagingName' =>  $packagingName,'packagingType' => $packagingType,'createdOn' => time()]);
            if($packagingCreate){
                return Redirect::to('admin/packagings')->with(array('respMessage', 'Category updated successfully!'));
            } else {
                return Redirect::to('admin/packagings')->with(array('respMessage'=>'Some issue while updating categories'));
            }
        } else {
            $packagingName = $packagingType = "";
            
            if(!empty($request->packagingName))
            $packagingName = $request->packagingName;

            if(!empty($request->packagingType))
            $packagingType = $request->packagingType;
                
            $packagingCreate =$this->packagings->create(['packagingName' =>  $packagingName,'packagingType' => $packagingType,'createdOn' => time()]);
            if($packagingCreate){
                return Redirect::to('admin/packagings')->with(array('respMessage', 'Packaging created successfully!'));
            } else {
                return Redirect::to('admin/packagings')->with(array('respMessage'=>'Some issue while created packagings'));
            }
        }
    }
    public function getItems(Request $request){
            
        if($request->ajax()){
            $request->session()->put('searchit', $request
            ->has('searchit') ? $request->get('searchit') : ($request->session()
            ->has('searchit') ? $request->session()->get('searchit') : ''));
    
            $request->session()->put('pgit', $request
                ->has('pgit') ? $request->get('pgit') : ($request->session()
                ->has('pgit') ? $request->session()->get('pgit') : 5));
            
            //print_r($request->session()->get('pgit'));
            $request->session()->put('filterit', $request
                ->has('filterit') ? $request->get('filterit') : ($request->session()
                ->has('filterit') ? $request->session()->get('filterit') : ''));

            $request->session()->put('fieldit', $request
                ->has('fieldit') ? $request->get('fieldit') : ($request->session()
                ->has('fieldit') ? $request->session()->get('fieldit') : 'itemCode'));

            $request->session()->put('sortit', $request
                ->has('sortit') ? $request->get('sortit') : ($request->session()
                ->has('sortit') ? $request->session()->get('sortit') : 'asc'));
                $itemData = $itemPackage = $itemCategory = array();
                $categoryList = $this->categories->getCategories();
                $packageList = $this->packagings->getPackagings();
                if($request->session()->get('filterit') == '' || $request->session()->get('filterit') == -1){
                    $userList = $this->items->with('itemsPreferences')       
                        ->where('itemCode','like','%'. $request->session()->get('searchit').'%')
                        ->orderBy($request->session()->get('fieldit'), $request->session()->get('sortit'))
                        ->paginate($request->session()->get('pgit'));
                    $itemData["data"] = $userList;
                    for($i = 0;$i < count($userList);$i++){
                        $itemId = $userList[$i]->itemId;
                        $package = $this->items
                            ->join('ls_item_packaging', 'ls_gen_items.itemId','=','ls_item_packaging.itemId')
                            ->join('packaging_master','ls_item_packaging.packageId','=','packaging_master.packagingId')
                            ->select('packaging_master.packagingId','packaging_master.packagingName')
                            ->where('ls_gen_items.itemId','=', $itemId)->get();
                        $pckgStr = $pckgIdStr = "";
                        for($j = 0;$j < count($package);$j++){
                            $pckgStr .= $pckgStr == "" ? $package[$j]->packagingName : ",". $package[$j]->packagingName;
                            $pckgIdStr .= $pckgIdStr == "" ? $package[$j]->packagingId : ",". $package[$j]->packagingId;
                        }
                        $itemPackage[$i]["itemId"] = $itemId;
                        $itemPackage[$i]["package"] = $pckgStr;
                        $itemPackage[$i]["pckgId"] = $pckgIdStr;

                        $category = $this->items
                            ->join('category_master', 'ls_gen_items.categoryId','=','category_master.categoryId')
                            ->select('category_master.categoryId','category_master.categoryName')
                            ->where('ls_gen_items.itemId','=', $itemId)->get();

                        $itemCategory[$i]["itemId"] = $itemId;;
                        $itemCategory[$i]["categoryName"] = $category[0]->categoryName;
                        $itemCategory[$i]["categoryId"] = $category[0]->categoryId;
                    }
                } else {
                    $userList = $this->items->with('itemsPreferences')
                        ->where('itemCode','like','%'. $request->session()->get('searchit').'%')
                        ->where('itemStatus','=',$request->session()->get('filterit'))
                        ->orderBy($request->session()->get('fieldit'), $request->session()->get('sortit'))
                        ->paginate($request->session()->get('pgit'));
                    $itemData["data"] = $userList;
                    for($i = 0;$i < count($userList);$i++){
                        $itemId = $userList[$i]->itemId;
                        $package = $this->items
                            ->join('ls_item_packaging', 'ls_gen_items.itemId','=','ls_item_packaging.itemId')
                            ->join('packaging_master','ls_item_packaging.packageId','=','packaging_master.packagingId')
                            ->select('packaging_master.packagingId','packaging_master.packagingName')
                            ->where('ls_gen_items.itemId','=', $itemId)->get();
                        $pckgStr = $pckgIdStr = "";
                        for($j = 0;$j < count($package);$j++){
                            $pckgStr .= $pckgStr == "" ? $package[$j]->packagingName : ",". $package[$j]->packagingName;
                            $pckgIdStr .= $pckgIdStr == "" ? $package[$j]->packagingId : ",". $package[$j]->packagingId;
                        }
                        $itemPackage[$i]["itemId"] = $itemId;
                        $itemPackage[$i]["package"] = $pckgStr;
                        $itemPackage[$i]["pckgId"] = $pckgIdStr;

                        $category = $this->items
                            ->join('category_master', 'ls_gen_items.categoryId','=','category_master.categoryId')
                            ->select('category_master.categoryId','category_master.categoryName')
                            ->where('ls_gen_items.itemId','=', $itemId)->get();

                        $itemCategory[$i]["itemId"] = $itemId;;
                        $itemCategory[$i]["categoryName"] = $category[0]->categoryName;
                        $itemCategory[$i]["categoryId"] = $category[0]->categoryId;
                    }
                }
            return \View::make('admin.ajax.ajaxItems')->with(['itemDetails'=> $userList,'itemsPreference'=> $itemData,'itemPackage' => $itemPackage,'categoryList' => $categoryList,'packageList' => $packageList,'itemCategory'=>$itemCategory]);
        } else {
            if($request->session()->has('searchit'))
            $request->session()->forget('searchit');
            
            if($request->session()->has('filterit'))
            $request->session()->forget('filterit');

             $request->session()->put('searchit', $request
            ->has('searchit') ? $request->get('searchit') : ($request->session()
            ->has('searchit') ? $request->session()->get('searchit') : ''));
    
            $request->session()->put('pgit', $request
                ->has('pgit') ? $request->get('pgit') : ($request->session()
                ->has('pgit') ? $request->session()->get('pgit') : 5));
            
            //print_r($request->session()->get('pgit'));
            $request->session()->put('filterit', $request
                ->has('filterit') ? $request->get('filterit') : ($request->session()
                ->has('filterit') ? $request->session()->get('filterit') : ''));

            $request->session()->put('fieldit', $request
                ->has('fieldit') ? $request->get('fieldit') : ($request->session()
                ->has('fieldit') ? $request->session()->get('fieldit') : 'itemCode'));

            $request->session()->put('sortit', $request
                ->has('sortit') ? $request->get('sortit') : ($request->session()
                ->has('sortit') ? $request->session()->get('sortit') : 'asc'));
            $itemData = $itemPackage = $itemCategory = array();
            $categoryList = $this->categories->getCategories();
            $packageList = $this->packagings->getPackagings();
            if($request->session()->get('filterit') == '' || $request->session()->get('filterit') == -1){
                $userList = $this->items->with('itemsPreferences')     
                ->where('itemCode','like','%'. $request->session()->get('searchit').'%')
                ->orderBy($request->session()->get('fieldit'), $request->session()->get('sortit'))
                ->paginate($request->session()->get('pgit'));
                
                $itemData["data"] = $userList;
                for($i = 0;$i < count($userList);$i++){
                    $itemId = $userList[$i]->itemId;
                    $package = $this->items
                        ->join('ls_item_packaging', 'ls_gen_items.itemId','=','ls_item_packaging.itemId')
                        ->join('packaging_master','ls_item_packaging.packageId','=','packaging_master.packagingId')
                        ->select('packaging_master.packagingId','packaging_master.packagingName')
                        ->where('ls_gen_items.itemId','=', $itemId)->get();
                    $pckgStr = $pckgIdStr = "";
                    for($j = 0;$j < count($package);$j++){
                        $pckgStr .= $pckgStr == "" ? $package[$j]->packagingName : ",". $package[$j]->packagingName;
                        $pckgIdStr .= $pckgIdStr == "" ? $package[$j]->packagingId : ",". $package[$j]->packagingId;
                    }
                    $itemPackage[$i]["itemId"] = $itemId;
                    $itemPackage[$i]["package"] = $pckgStr;
                    $itemPackage[$i]["pckgId"] = $pckgIdStr;

                    $category = $this->items
                        ->join('category_master', 'ls_gen_items.categoryId','=','category_master.categoryId')
                        ->select('category_master.categoryId','category_master.categoryName')
                        ->where('ls_gen_items.itemId','=', $itemId)->get();

                    $itemCategory[$i]["itemId"] = $itemId;;
                    $itemCategory[$i]["categoryName"] = $category[0]->categoryName;
                    $itemCategory[$i]["categoryId"] = $category[0]->categoryId;
                } 
                //dd($itemData["data"][0]->itemsPreferences[0]->price);     
            } else {
                $userList = $this->items->with('itemsPreferences')
                    ->where('itemCode','like','%'. $request->session()->get('searchit').'%')
                    ->where('itemStatus','=',$request->session()->get('filterit'))
                    ->orderBy($request->session()->get('fieldit'), $request->session()->get('sortit'))
                    ->paginate($request->session()->get('pgit'));
                $itemData["data"] = $userList;
                for($i = 0;$i < count($userList);$i++){
                    $itemId = $userList[$i]->itemId;
                    $package = $this->items
                        ->join('ls_item_packaging', 'ls_gen_items.itemId','=','ls_item_packaging.itemId')
                        ->join('packaging_master','ls_item_packaging.packageId','=','packaging_master.packagingId')
                        ->select('packaging_master.packagingId','packaging_master.packagingName')
                        ->where('ls_gen_items.itemId','=', $itemId)->get();
                    $pckgStr = $pckgIdStr = "";
                    for($j = 0;$j < count($package);$j++){
                        $pckgStr .= $pckgStr == "" ? $package[$j]->packagingName : ",". $package[$j]->packagingName;
                        $pckgIdStr .= $pckgIdStr == "" ? $package[$j]->packagingId : ",". $package[$j]->packagingId;
                    }
                    $itemPackage[$i]["itemId"] = $itemId;
                    $itemPackage[$i]["package"] = $pckgStr;
                    $itemPackage[$i]["pckgId"] = $pckgIdStr;

                    $category = $this->items
                        ->join('category_master', 'ls_gen_items.categoryId','=','category_master.categoryId')
                        ->select('category_master.categoryId','category_master.categoryName')
                        ->where('ls_gen_items.itemId','=', $itemId)->get();

                    $itemCategory[$i]["itemId"] = $itemId;;
                    $itemCategory[$i]["categoryName"] = $category[0]->categoryName;
                    $itemCategory[$i]["categoryId"] = $category[0]->categoryId;
                } 
                //dd($itemData["data"][0]->itemsPreferences[0]->price);
            }    
            return \View::make('admin.items')->with(['itemDetails'=> $userList,'itemsPreference'=> $itemData,'itemPackage' => $itemPackage,'categoryList' => $categoryList,'packageList' => $packageList,'itemCategory'=>$itemCategory]);
         }
         
    }
    public function saveItems(Request $request){
        
        if(isset($request->hdItemId) && $request->hdItemId != ""){
            $itemName = $itemDesc = "";
            $category = 0;
            $price = 0.00;
            $status = -1;
            $quantity = 1;
            $chkPackage = array();
            if(!empty($request->itemName))
            $itemName = $request->itemName;

            if(!empty($request->itemDesc))
            $itemDesc = $request->itemDesc;

            if(!empty($request->ddlCategory))
            $category = $request->ddlCategory;

            if(!empty($request->ddlStatus))
            $status = $request->ddlStatus;

            if(!empty($request->ddlQuantity))
            $quantity = $request->ddlQuantity;

            if(!empty($request->itemPrice))
            $price = $request->itemPrice;

            if(!empty($request->pckgCheck))
            $chkPackage = $request->pckgCheck;
                
            $itemUpdate =$this->items->where('itemId',$request->hdItemId)->update(['itemCode' =>  $itemName,'itemDesc' => $itemDesc,'categoryId'=>$category,'itemStatus'=>$status,'updatedOn' => time()]);
            if($itemUpdate){
                $availPackage = $this->itemPrefer->getPackageById($request->hdItemId);
                if(!empty($availPackage)){
                    $availPackage->delete();
                }
                for($i = 0;$i< count($chkPackage);$i++){
                    $packageItem = $this->itemPrefer->create(['itemId'=> $request->hdItemId,'packageId'=>$chkPackage[$i],'price'=>$price,'quantity'=>$quantity,'createdOn'=>time()]);
                }
                return Redirect::to('admin/items-management')->with(array('respMessage', 'Items updated successfully!'));
            } else {
                return Redirect::to('admin/items-management')->with(array('respMessage'=>'Some issue while updating items'));
            }
            
            $packagingCreate =$this->packagings->where('packagingId',$request->hdPackagingId)->update(['packagingName' =>  $packagingName,'packagingType' => $packagingType,'createdOn' => time()]);
            if($packagingCreate){
                return Redirect::to('admin/packagings')->with(array('respMessage', 'Category updated successfully!'));
            } else {
                return Redirect::to('admin/packagings')->with(array('respMessage'=>'Some issue while updating categories'));
            }
        } else {
            $itemName = $itemDesc = "";
            $category =  0;
            $price = 0.00;
            $status = -1;
            $quantity = 1;
            $chkPackage = array();
            if(!empty($request->itemName))
            $itemName = $request->itemName;

            if(!empty($request->itemDesc))
            $itemDesc = $request->itemDesc;

            if(!empty($request->ddlCategory))
            $category = $request->ddlCategory;

            if(!empty($request->ddlStatus))
            $status = $request->ddlStatus;

            if(!empty($request->ddlQuantity))
            $quantity = $request->ddlQuantity;

            if(!empty($request->itemPrice))
            $price = $request->itemPrice;

            if(!empty($request->pckgCheck))
            $chkPackage = $request->pckgCheck;
                
            $itemCreate =$this->items->create(['itemCode' =>  $itemName,'itemDesc' => $itemDesc,'categoryId'=>$category,'itemStatus'=>$status,'createdOn' => time()]);
            if($itemCreate){
                for($i = 0;$i< count($chkPackage);$i++){
                    $packageItem = $this->itemPrefer->create(['itemId'=> $itemCreate->itemId,'packageId'=>$chkPackage[$i],'price'=>$price,'quantity'=>$quantity,'createdOn'=>time()]);
                }
                return Redirect::to('admin/items-management')->with(array('respMessage', 'Items created successfully!'));
            } else {
                return Redirect::to('admin/items-management')->with(array('respMessage'=>'Some issue while created packagings'));
            }
        }
    }
}
