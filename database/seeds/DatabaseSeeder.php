<?php

use Illuminate\Database\Seeder;
use App\EndUser;
use App\IndvUserDetails;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
            $this->call('IndvUserSeeder');
            $this->command->info('Bear app seeds finished.');
    }
}
class IndvUserSeeder extends Seeder {

    public function run() {

        DB::table('individual_user_master')->delete();
        DB::table('indv_user_details')->delete();

        $user1 = EndUser::create(array(
            //'indvLsCustId', 'indvCustName', 'indvCustEmail','indvCustMobile','indvCustPassword','gender','indvCustStatus'
            'indvLsCustId' => 'D1001252',
            'indvCustName' => 'Shoeb Alam',
            'indvCustEmail' => 'ashoeb20@gmail.com',
            'indvCustMobile' => '8447764785',
            'indvCustStatus' => '1',
            'gender' => 'Male',
        ));

        $user2 = EndUser::create(array(
            //'indvLsCustId', 'indvCustName', 'indvCustEmail','indvCustMobile','indvCustPassword','gender','indvCustStatus'
            'indvLsCustId' => 'D1001256',
            'indvCustName' => 'Anupam Kumar',
            'indvCustEmail' => 'anupam513@gmail.com',
            'indvCustMobile' => '9896598698',
            'indvCustStatus' => '1',
            'gender' => 'Male',
        ));

        $this->command->info('User details saved');

         // seed our trees table ---------------------
         //'indvCustId','rating','appVersion','remarks'
         IndvUserDetails::create(array(
            
            'indvCustId' => $user1->indvCustId,
            'remarks'    => 'Hello World11',
            'appVersion'    => '1.011',
            'rating'     => 4.80
        ));
        IndvUserDetails::create(array(
            
            'indvCustId' => $user1->indvCustId,
            'remarks'    => 'Hello World12',
            'appVersion'    => '1.012',
            'rating'     => 4.70
        ));
        IndvUserDetails::create(array(
            
            'indvCustId' => $user2->indvCustId,
            'remarks'    => 'Hello World21',
            'appVersion'    => '1.021',
            'rating'     => 4.90
        ));
        IndvUserDetails::create(array(
            
            'indvCustId' => $user2->indvCustId,
            'remarks'    => 'Hello World22',
            'appVersion'    => '1.022',
            'rating'     => 4.85
        ));
        

        $this->command->info('User desc details saved successfully!!!');
        
    }
}
