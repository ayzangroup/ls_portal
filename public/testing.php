<?php
// Get cURL resource
$curl = curl_init();
// Set some options - we are passing in a useragent too here
   curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'Authorization: Token 4808c08a4589581e53f06688ded3d9d44467c628',
   ));
curl_setopt_array($curl, array(
     CURLOPT_RETURNTRANSFER => true,
     CURLOPT_ENCODING => "",
     CURLOPT_MAXREDIRS => 10,
     CURLOPT_TIMEOUT => 30,
     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
     CURLOPT_CUSTOMREQUEST => "Get",
     CURLOPT_RETURNTRANSFER => 1,
     CURLOPT_URL => 'https://cloud.encryptfortress.com/api2/repos/4f77c38c-87a0-4e40-99a7-a0056812108a/upload-link/',
     CURLOPT_USERAGENT => 'Codular Sample cURL Request',
));
// Send the request & save response to $resp
$response1 = curl_exec($curl);

// Close request to clear up some resources
curl_close($curl);
?>
<form action="query.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file" />
    <input type="hidden" name="link" value=<?php print_r($response1); ?> />
    <input type="submit"/>
    </form>
