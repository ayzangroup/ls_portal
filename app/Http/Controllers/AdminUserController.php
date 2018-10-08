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
use App\Laundryman;
use Session;
use Auth;
use Redirect;
use DB, Hash, Mail;

class AdminUserController extends Controller
{   
    public function __construct(EndUser $endUser,Orders $order,Drivers $drivers,Laundryman $laundryman,IndvUserDetails $indvUserDetails,CorpUser $corpUser){
        $this->endUser = $endUser;
        $this->indvUserDetails = $indvUserDetails;
        $this->order = $order;
        $this->drivers = $drivers;
        $this->laundryman = $laundryman;
        $this->corpUser = $corpUser;
        //$this->middleware('admin.auth');
    }
    public function dashboard(){
        // if (Auth::guard('admin')->check())
        //         {
        //             echo "hello";
        //         }
        //dd(Session::get('test'));
        //print_r(Session::get('test'));
        // $indvUser = new EndUser();
        
        // $userCount = 0;
        // $userCount = $indvUser->countIndvUser();
        $data = ["userCount" => $this->endUser->countIndvUser(),"userCorpCount" => $this->corpUser->countCorpUser(),"orderCount" => $this->order->countOrderWithStatus(1),"driverCount" => $this->drivers->countAllDriver(),"laundrymanCount" => $this->laundryman->countAllLaundryMan()];
       
        return \View::make('admin.dashboard')->with($data);
    }
    public function userManagement(Request $request){
        // $user = $this->endUser->indvUser();
        // $userList = array();
        // $i = 0;
        // foreach ($user as $users){
        //     $userVal = array();
        //     $userVal["indvCustId"] = $users->indvCustId;
        //     $userVal["indvLsCustId"] = $users->indvLsCustId;
        //     $userVal["indvCustName"] = $users->indvCustName;
        //     $userVal["indvCustEmail"] = $users->indvCustEmail;
        //     $userVal["indvCustMobile"] = $users->indvCustMobile;
        //     $userVal["gender"] = $users->gender;
        //     $userVal["indvCustStatus"] = $users->indvCustStatus;

        //     $userMore = array();
        //     foreach ($users->userDescDetails as $userDesc){
        //         $userEach = array();
        //         $userEach["indvCustId"] = $userDesc->indvCustId;
        //         $userEach["rating"] = $userDesc->rating;
        //         $userEach["appVersion"] = $userDesc->appVersion;
        //         $userEach["remarks"] = $userDesc->remarks;
        //         $userMore[] = $userEach;
        //     }
        //     $userList[$i]["basic"] = $userVal;
        //     $userList[$i]["details"] = $userMore;
        //     $i++;
        // }
        
        $request->session()->put('search', $request
            ->has('search') ? $request->get('search') : ($request->session()
            ->has('search') ? $request->session()->get('search') : ''));
        
        $request->session()->put('pg', $request
            ->has('pg') ? $request->get('pg') : ($request->session()
            ->has('pg') ? $request->session()->get('pg') : 5));
        
        //print_r($request->session()->get('pg'));
        $request->session()->put('filter', $request
            ->has('filter') ? $request->get('filter') : ($request->session()
            ->has('filter') ? $request->session()->get('filter') : ''));

        $request->session()->put('field', $request
            ->has('field') ? $request->get('field') : ($request->session()
            ->has('field') ? $request->session()->get('field') : 'indvCustName'));

        $request->session()->put('sort', $request
            ->has('sort') ? $request->get('sort') : ($request->session()
            ->has('sort') ? $request->session()->get('sort') : 'asc'));
       
        if($request->session()->get('filter') == '' || $request->session()->get('filter') == -1){
            $userList = $this->endUser
                    //->indvUser();
                    ->where('indvCustName','like','%'. $request->session()->get('search').'%')
                    ->orderBy($request->session()->get('field'), $request->session()->get('sort'))
                    ->paginate($request->session()->get('pg'));
        } else {
            $userList = $this->endUser
                    //->indvUser();
                    ->where('indvCustName','like','%'. $request->session()->get('search').'%')
                    ->where('indvCustStatus','=',$request->session()->get('filter'))
                    ->orderBy($request->session()->get('field'), $request->session()->get('sort'))
                    ->paginate($request->session()->get('pg'));
        }
            
       
        if($request->ajax()){
            $request->session()->put('search', $request
            ->has('search') ? $request->get('search') : ($request->session()
            ->has('search') ? $request->session()->get('search') : ''));
    
            $request->session()->put('pg', $request
                ->has('pg') ? $request->get('pg') : ($request->session()
                ->has('pg') ? $request->session()->get('pg') : 5));
            
            //print_r($request->session()->get('pg'));
            $request->session()->put('filter', $request
                ->has('filter') ? $request->get('filter') : ($request->session()
                ->has('filter') ? $request->session()->get('filter') : ''));

            $request->session()->put('field', $request
                ->has('field') ? $request->get('field') : ($request->session()
                ->has('field') ? $request->session()->get('field') : 'indvCustName'));

            $request->session()->put('sort', $request
                ->has('sort') ? $request->get('sort') : ($request->session()
                ->has('sort') ? $request->session()->get('sort') : 'asc'));
        
            if($request->session()->get('filter') == '' || $request->session()->get('filter') == -1){
                $userList = $this->endUser
                        //->indvUser();
                        ->where('indvCustName','like','%'. $request->session()->get('search').'%')
                        ->orderBy($request->session()->get('field'), $request->session()->get('sort'))
                        ->paginate($request->session()->get('pg'));
            } else {
                $userList = $this->endUser
                        //->indvUser();
                        ->where('indvCustName','like','%'. $request->session()->get('search').'%')
                        ->where('indvCustStatus','=',$request->session()->get('filter'))
                        ->orderBy($request->session()->get('field'), $request->session()->get('sort'))
                        ->paginate($request->session()->get('pg'));
            }
            return \View::make('admin.ajax.indvUser')->with('userDetails',$userList);
        } else {
            if($request->session()->has('search'))
            $request->session()->forget('search');
            
            if($request->session()->has('filter'))
            $request->session()->forget('filter');

            $request->session()->put('search', $request
            ->has('search') ? $request->get('search') : ($request->session()
            ->has('search') ? $request->session()->get('search') : ''));
    
            $request->session()->put('pg', $request
                ->has('pg') ? $request->get('pg') : ($request->session()
                ->has('pg') ? $request->session()->get('pg') : 5));
            
            //print_r($request->session()->get('pg'));
            $request->session()->put('filter', $request
                ->has('filter') ? $request->get('filter') : ($request->session()
                ->has('filter') ? $request->session()->get('filter') : ''));

            $request->session()->put('field', $request
                ->has('field') ? $request->get('field') : ($request->session()
                ->has('field') ? $request->session()->get('field') : 'indvCustName'));

            $request->session()->put('sort', $request
                ->has('sort') ? $request->get('sort') : ($request->session()
                ->has('sort') ? $request->session()->get('sort') : 'asc'));
        
            if($request->session()->get('filter') == '' || $request->session()->get('filter') == -1){
                $userList = $this->endUser
                        //->indvUser();
                        ->where('indvCustName','like','%'. $request->session()->get('search').'%')
                        ->orderBy($request->session()->get('field'), $request->session()->get('sort'))
                        ->paginate($request->session()->get('pg'));
            } else {
                $userList = $this->endUser
                        //->indvUser();
                        ->where('indvCustName','like','%'. $request->session()->get('search').'%')
                        ->where('indvCustStatus','=',$request->session()->get('filter'))
                        ->orderBy($request->session()->get('field'), $request->session()->get('sort'))
                        ->paginate($request->session()->get('pg'));
            }
            return \View::make(' admin.user-management')->with('userDetails',$userList);
         }
         
    }
    public function corpUser(Request $request){    
        if($request->ajax()){
            $request->session()->put('searchc', $request
                ->has('searchc') ? $request->get('searchc') : ($request->session()
                ->has('searchc') ? $request->session()->get('searchc') : ''));
            
            $request->session()->put('pgc', $request
                ->has('pgc') ? $request->get('pgc') : ($request->session()
                ->has('pgc') ? $request->session()->get('pgc') : 5));
            
            //print_r($request->session()->get('pg'));
            $request->session()->put('filterc', $request
                ->has('filterc') ? $request->get('filterc') : ($request->session()
                ->has('filterc') ? $request->session()->get('filterc') : ''));

            $request->session()->put('fieldc', $request
                ->has('fieldc') ? $request->get('fieldc') : ($request->session()
                ->has('fieldc') ? $request->session()->get('fieldc') : 'corporationName'));

            $request->session()->put('sortc', $request
                ->has('sortc') ? $request->get('sortc') : ($request->session()
                ->has('sortc') ? $request->session()->get('sortc') : 'asc'));
                
        
            if($request->session()->get('filterc') == '' || $request->session()->get('filterc') == -1){
                $userList = $this->corpUser
                        //->indvUser();
                        ->where('corporationName','like','%'. $request->session()->get('searchc').'%')
                        ->orderBy($request->session()->get('fieldc'), $request->session()->get('sortc'))
                        ->paginate($request->session()->get('pgc'));
            } else {
                $userList = $this->corpUser
                        //->indvUser();
                        ->where('corporationName','like','%'. $request->session()->get('searchc').'%')
                        ->where('corpCustStatus','=',$request->session()->get('filterc'))
                        ->orderBy($request->session()->get('fieldc'), $request->session()->get('sortc'))
                        ->paginate($request->session()->get('pgc'));
            }
            return \View::make('admin.ajax.corpUser')->with('userDetails',$userList);
         } else {
            
            if($request->session()->has('searchc'))
            $request->session()->forget('searchc');
            
            if($request->session()->has('filterc'))
            $request->session()->forget('filterc');

            // $dataSession = session()->all();
            // dd($dataSession);
            $request->session()->put('searchc', $request
            ->has('searchc') ? $request->get('searchc') : ($request->session()
            ->has('searchc') ? $request->session()->get('searchc') : ''));
        
            $request->session()->put('pgc', $request
                ->has('pgc') ? $request->get('pgc') : ($request->session()
                ->has('pgc') ? $request->session()->get('pgc') : 5));
            
            //print_r($request->session()->get('pg'));
            $request->session()->put('filterc', $request
                ->has('filterc') ? $request->get('filterc') : ($request->session()
                ->has('filterc') ? $request->session()->get('filterc') : ''));

            $request->session()->put('fieldc', $request
                ->has('fieldc') ? $request->get('fieldc') : ($request->session()
                ->has('fieldc') ? $request->session()->get('fieldc') : 'corporationName'));

            $request->session()->put('sortc', $request
                ->has('sortc') ? $request->get('sortc') : ($request->session()
                ->has('sortc') ? $request->session()->get('sortc') : 'asc'));
                
        
            if($request->session()->get('filterc') == '' || $request->session()->get('filterc') == -1){
                $userList = $this->corpUser
                        //->indvUser();
                        ->where('corporationName','like','%'. $request->session()->get('searchc').'%')
                        ->orderBy($request->session()->get('fieldc'), $request->session()->get('sortc'))
                        ->paginate($request->session()->get('pgc'));
            } else {
                $userList = $this->corpUser
                    //->indvUser();
                    ->where('corporationName','like','%'. $request->session()->get('searchc').'%')
                    ->where('corpCustStatus','=',$request->session()->get('filterc'))
                    ->orderBy($request->session()->get('fieldc'), $request->session()->get('sortc'))
                    ->paginate($request->session()->get('pgc'));
            }

            //Session::flush();
            return \View::make('admin.corp-user')->with('userDetails',$userList);
        }
         
    }
    public function saveIndvUser(Request $request){
        //print_r($request);
        // $rules = [
        //     'email' => 'required|email'
        //    // 'password' => 'required|confirmed|min:6',
        // ];
        // $input = $request->only(
		// 	'userName',
        //     'indvCustEmail',
        //     'indvCustMobile',
        //     'indvCustPassword',
		// 	'gender',
		// 	'indvCustStatus'
        // );
        // $validator = Validator::make($input, $rules);
        // if($validator->fails()) {
        //     $error = $validator->messages()->toJson();
        //     return response()->json(['code'=>401,'success'=> false, 'error'=> $error]);
        // }
        if(isset($request->hdUserId) && $request->hdUserId != ""){
            $mobile = $userName = $email = $rdGender = $ddlAddStatus = $indvLsId = "";
            if(!empty($request->userNameE))
            $userName = $request->userNameE;
            
            if(!empty($request->emailE))
            $email = $request->emailE;

            if(!empty($request->mobileE))
            $mobile = $request->mobileE;

            if(!empty($request->rdGenderE))
            $rdGender = $request->rdGenderE;

            //if(!empty($request->ddlAddStatus))
            $ddlAddStatus = $request->ddlAddStatusE;
            
            $userCreate =$this->endUser->where('indvCustId', $request->hdUserId)->update([ 'indvCustMobile' => $mobile, 'indvCustName' =>  $userName,  'gender' => $rdGender, 'indvCustStatus' => $ddlAddStatus, 'updatedOn' => time()]);
            if($userCreate){
                return Redirect::to('admin/user-management')->with(array('respMessage', 'User Saved successfully!'));
            } else {
                return Redirect::to('admin/user-management')->with(array('respMessage'=>'Some issue while adding users'));
            }
        } else {
                $mobile = $userName = $email = $rdGender = $ddlAddStatus = $indvLsId = "";
                if(!empty($request->userName))
                $userName = $request->userName;
                
                if(!empty($request->email))
                $email = $request->email;

                if(!empty($request->mobile))
                $mobile = $request->mobile;

                if(!empty($request->rdGender))
                $rdGender = $request->rdGender;

                //if(!empty($request->ddlAddStatus))
                $ddlAddStatus = $request->ddlAddStatus;

                $indvLsId = "D".time();

                $userCreate =$this->endUser->create(['indvLsCustId' => $indvLsId, 'indvCustMobile' => $mobile, 'indvCustEmail' => $email, 'indvCustPassword' => Hash::make('123456'),'indvCustName' =>  $userName,  'gender' => $rdGender, 'indvCustStatus' => $ddlAddStatus, 'createdOn' => time()]);
                if($userCreate){
                    return Redirect::to('admin/user-management')->with(array('respMessage', 'User Saved successfully!'));
                } else {
                    return Redirect::to('admin/user-management')->with(array('respMessage'=>'Some issue while adding users'));
                }

        }
    }
    public function saveCorpUser(Request $request){
        //print_r($request);
        // $rules = [
        //     'email' => 'required|email'
        //    // 'password' => 'required|confirmed|min:6',
        // ];
        // $input = $request->only(
		// 	'userName',
        //     'indvCustEmail',
        //     'indvCustMobile',
        //     'indvCustPassword',
		// 	'gender',
		// 	'indvCustStatus'
        // );
        // $validator = Validator::make($input, $rules);
        // if($validator->fails()) {
        //     $error = $validator->messages()->toJson();
        //     return response()->json(['code'=>401,'success'=> false, 'error'=> $error]);
        // }
        if(isset($request->hdUserId) && $request->hdUserId != ""){
            $concernMobile = $corpName = $concernName = $concernEmail = $corpEmail = $corpLsId = "";
            if(!empty($request->corpNameE))
            $corpName = $request->corpNameE;
            
            if(!empty($request->concernNameE))
            $concernName = $request->concernNameE;

            if(!empty($request->concernEmailE))
            $concernEmail = $request->concernEmailE;

            if(!empty($request->concernMobileE))
            $concernMobile = $request->concernMobileE;

            if(!empty($request->corpEmailE))
            $corpEmail = $request->corpEmailE;

            //if(!empty($request->ddlAddStatus))
            $ddlAddStatus = 0;
            if($request->ddlAddStatusE != -1)
            $ddlAddStatus = $request->ddlAddStatusE;
            
            $userCreate =$this->corpUser->where('corpCustId',$request->hdUserId)->update(['corporationName' =>  $corpName,'concernPerson' => $concernName, 'concernPersonEmail' => $concernEmail, 'concerPersonMobile' => $concernMobile, 'corpoarateEmail' => $corpEmail,  'corpCustStatus' => $ddlAddStatus, 'updatedOn' => time()]);
            if($userCreate){
                return Redirect::to('admin/corp-user')->with(array('respMessage', 'User updated successfully!'));
            } else {
                return Redirect::to('admin/corp-user')->with(array('respMessage'=>'Some issue while updating users'));
            }
        } else {
                $concernMobile = $corpName = $concernName = $concernEmail = $corpEmail = $corpLsId = "";
                if(!empty($request->corpName))
                $corpName = $request->corpName;
                
                if(!empty($request->concernName))
                $concernName = $request->concernName;

                if(!empty($request->concernEmail))
                $concernEmail = $request->concernEmail;

                if(!empty($request->concernMobile))
                $concernMobile = $request->concernMobile;

                if(!empty($request->corpEmail))
                $corpEmail = $request->corpEmail;

                //if(!empty($request->ddlAddStatus))
                $ddlAddStatus = 0;
                if($request->ddlAddStatus != -1)
                $ddlAddStatus = $request->ddlAddStatus;

                $corpLsId = "C".time();
                
                $userCreate =$this->corpUser->create(['corpLsCustId' => $corpLsId, 'corporationName' =>  $corpName,'concernPerson' => $concernName, 'concernPersonEmail' => $concernEmail,'concerPersonMobile' => $concernMobile, 'corpoarateEmail' => $corpEmail, 'corpPassword' => Hash::make('123456'), 'corpCustStatus' => $ddlAddStatus, 'createdOn' => time()]);
                if($userCreate){
                    return Redirect::to('admin/corp-user')->with(array('respMessage', 'User Saved successfully!'));
                } else {
                    return Redirect::to('admin/corp-user')->with(array('respMessage'=>'Some issue while adding users'));
                }

        }
    }
   
}
