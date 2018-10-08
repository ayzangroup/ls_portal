<?php 
namespace App\Traits;

use Auth;
use Cookie;
use Ixudra\Curl\Facades\Curl;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Promise;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;

trait Common
{


    public function send_sms($mobile,$message)
    {
      $username="Dear";

      $api_key="3fa897b5-608f-11e8-a895-0200cd936042";
       
       $curl = curl_init();

  curl_setopt_array($curl, array(
  CURLOPT_URL => "http://2factor.in/API/V1/$api_key/ADDON_SERVICES/SEND/PSMS",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"From\": \"laundr\",\"To\": \"$mobile\", \"TemplateName\": \"smsnotification\", \"Msg\": \"$message\"}",
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) 
{
  echo "cURL Error #:" . $err;

} 
else 
{
  echo $response;
}


    }

}