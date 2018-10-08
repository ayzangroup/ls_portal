<?php 



namespace App\Traits;



trait SendNotification
{

    public function one_to_one($player_id,$content,$url,$title,$image)

    {

        $player_id=explode(',',$player_id);
        $data['orderid'] = '111112';

      
          $fields = array(

           'app_id' => "95fac06d-591c-4cab-afd6-5cdf6387a235",

           // 'included_segments' => $pp,

           'include_player_ids' => $player_id,

           'data' => array("key" => "value"),

           'headings' =>  $title,

           'contents' => $content,

           'chrome_web_image' => $image,

           'url'=>$url,

           'data'=>$data,

          );



          $fields = json_encode($fields);

          $ch = curl_init();

          curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");

          curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Basic MDQyY2E5MTEtMzdhZS00N2EwLWI4N2UtZTM3NGFlMjcxYWUw','Content-Type: application/json; charset=utf-8'));

          curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

          curl_setopt($ch, CURLOPT_HEADER, FALSE);

          curl_setopt($ch, CURLOPT_POST, TRUE);

          curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

          $response = curl_exec($ch);

          curl_close($ch);

          $result=json_decode($response,true);

          return $result;

    }







}