<?php



namespace App\Http\Controllers;



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

use App\Traits\SendNotification;



class NotificationController extends Controller

{

    use SendNotification;//trait for send notifications



    public function onesignal_id(Request $request)

    {

        $user=User::find($request->user_id);

        $user->web_player_id=$request->player_id;

        $save=$user->save();

        return response()->json(['id'=>$request->player_id]);

    }



    public function set_player_id(Request $r)

    {
        session(['player_id'=>$r->id]);
        Session::forget('url');
        $url=$r->url;
        Session::push('url[intended]',$url);
        return $r->id;

    } 

    

}

