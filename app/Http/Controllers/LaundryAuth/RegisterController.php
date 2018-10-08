<?php



namespace App\Http\Controllers\LaundryAuth;



use App\Laundry;

use Validator;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Support\Facades\Auth;

use Hash;

use Mail;

use App\Address;





class RegisterController extends Controller

{

    /*

    |--------------------------------------------------------------------------

    | Register Controller

    |--------------------------------------------------------------------------

    |

    | This controller handles the registration of new users as well as their

    | validation and creation. By default this controller uses a trait to

    | provide this functionality without requiring any additional code.

    |

    */



    use RegistersUsers;



    /**

     * Where to redirect users after login / registration.

     *

     * @var string

     */

    protected $redirectTo = '/laundry/home';



    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        $this->middleware('laundry.guest');

    }



    /**

     * Get a validator for an incoming registration request.

     *

     * @param  array  $data

     * @return \Illuminate\Contracts\Validation\Validator

     */

    protected function validator(array $data)

    {

        return Validator::make($data, [

            'name' => 'required|max:255',

            'email' => 'required|email|max:255|unique:laundries',

            'password' => 'required|min:6|confirmed',

        ]);

    }



    /**

     * Create a new user instance after a valid registration.

     *

     * @param  array  $data

     * @return Laundry

     */

    protected function create(array $data)

    {

        return Laundry::create([

            'name' => $data['name'],

            'email' => $data['email'],

            'password' => bcrypt($data['password']),

        ]);

    }



    /**

     * Show the application registration form.

     *

     * @return \Illuminate\Http\Response

     */

    public function showRegistrationForm()

    {

        return view('laundry.auth.register');

    }



    /**

     * Get the guard to be used during registration.

     *

     * @return \Illuminate\Contracts\Auth\StatefulGuard

     */

    protected function guard()

    {

        return Auth::guard('laundry');

    }





    public function register(Request $request)

    {

        

        $user_exists=Laundry::where('email',$request->emailId)->first();

        if(count($user_exists)==0) 

        {       

                if ($request->licenseImage!='') 

                 {

                        $rand=rand(1,1000000);

                        // Set the destination path

                        $destinationPath = public_path().'/images/laundrydocument_images/';

                        // Get the orginal filname or create the filename of your choice

                        $filename2 = str_replace(' ', '_', $request->licenseImage->getClientOriginalName());

                        $filename2=$rand.''.$filename2;

                        $request->licenseImage->move($destinationPath, $filename2);

                }   

                else

                {

                    $filename2="";

                }



                if ($request->UIDImage!='') 

                 {

                        $rand=rand(1,1000000);

                        // Set the destination path

                        $destinationPath = public_path().'/images/laundrydocument_images/';

                        // Get the orginal filname or create the filename of your choice

                        $filename = str_replace(' ', '_', $request->UIDImage->getClientOriginalName());

                        $filename=$rand.''.$filename;

                        $request->UIDImage->move($destinationPath, $filename);

                }   

                else

                {

                    $filename="";

                }

        



                if($request->password != $request->password_confirmation )

                {

                    return redirect()->route('laundry.register')->with('error', 'Error Password is not match');

                }

                else

                {

                    $platform='adminPanel';

                    $insert=new Laundry($request->all());

                    $insert->email=$request->emailId;

                    $insert->licenseImage=$filename2;

                    $insert->licenseImage=$filename2;

                    $insert->UIDImage=$filename;

                    $insert->platform=$platform;

                    $save=$insert->save();

                    if($save)

                        {

                            $objectId=$insert->laundryId;

                            $objectType='laundry';

                            $countryName='India';

                            $companyAddress1=$request->address;

                            $insert_address=new Address($request->all());

                            $insert_address->objectId=$objectId;

                            $insert_address->companyAddress1=$companyAddress1;

                            $insert_address->countryName=$countryName;

                            $insert_address->objectType=$objectType;

                            $insert_address->addressType=$objectType;

                            $save1=$insert_address->save();



                            $update=Laundry::find($objectId);

                            $update->addressId=$insert_address->uniqueId;

                            $update=$update->save();



                            if($update)

                            {

                                $data = array('name'=>$request->driverName,'emialid'=>$objectId,"email" => $request->emailId);

                                Mail::send('email.laundryverifyemail', $data, function($message) use ($data) {

                                    $message->to($data['email'])

                                            ->subject('Password reset Link');

                                    $message->from('info@launderservices.com','Launder Services');

                                });

                                return redirect()->route('admin.view_laundry')->with('success','Laundry user Add Successfully!');

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

        }

         else

        {

            return redirect()->back()->with('error','User Exists in Database!');

        }



    }

}

