<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\IndvUserDetails;
use App\CorpUser;
use App\CorpUserDetails;
use App\Address;
use App\Services;
use App\Category;
use App\Socialauth;

use Validator;
use DB, Hash, Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Mail\Message;
use Illuminate\Mail\Mailer;
use Image;


class GeneralController extends Controller
{
    public function __construct(
        Socialauth $socialauth,
        User $user,
        IndvUserDetails $indvUser,
        Address $address,
        CorpUser $corp,
        CorpUserDetails $corpUser,
        Services $services,
        Category $category
    )
    {
        $this->socialauth = $socialauth;
        $this->user = $user;
        $this->indvUser = $indvUser;
        $this->corp = $corp;
        $this->corpUser = $corpUser;
        $this->address = $address;
        $this->services = $services;
        $this->category = $category;
        //parent::__construct();
    }
    /**
     * API Register
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
	
	public function getAllServices(Request $request)
    {	
        //$lsService = $this->services->getAllServices->get();
        $lsService = $this->services->all();
        if(!$lsService) {
            return response()->json(['code'=>500,'success' => false, 'message' => "No Data found"]);
        } else {
            return response()->json(['code'=>200,'success' => true, 'data' => $lsService]);
        }
	  
    }

    public function getAllCategory(Request $request)
    {	
        //$lsService = $this->services->getAllServices->get();
        $lsCategory = $this->category->all();
        if(!$lsCategory) {
            return response()->json(['code'=>500,'success' => false, 'message' => "No Data found"]);
        } else {
            return response()->json(['code'=>200,'success' => true, 'data' => $lsCategory]);
        }
	  
    }
    
}