<?php
      $file        = $_FILES['file']['tmp_name'];
      $name    = $_FILES['file']['name'];
      $dir  = '/';
      $response1 = $_POST['link'];
      
      $file_name = $_FILES['file']['name'];
      $file_size =$_FILES['file']['size'];
      $file_tmp =$_FILES['file']['tmp_name'];
      $file_type=$_FILES['file']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));
      $rand=rand(0,4);
      $file_name=str_replace(' ', '', $file_name);
      $file_name=$rand.$file_name;
      move_uploaded_file($file_tmp,"upload/".$file_name);
      
      
$cFile = new CURLFile('upload/'.$file_name,'image/jpg',$file_name);

$files=array('file' =>$cFile,
        'filename' =>$name,
        'parent_dir'=>$dir);


    // Get cURL resource
    $curl = curl_init();
    // Set some options - we are passing in a useragent too here
       curl_setopt($curl, CURLOPT_HTTPHEADER, array(
          'Authorization: Token 4808c08a4589581e53f06688ded3d9d44467c628',
          'content-type: multipart/form-data',
       ));
       curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false);
       $args['file'] = '@/img/app.png';
       curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $args);
    curl_setopt_array($curl, array(
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_ENCODING => "",
         CURLOPT_MAXREDIRS => 10,
         CURLOPT_TIMEOUT => 30,
         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
         CURLOPT_CUSTOMREQUEST => "POST",
         CURLOPT_RETURNTRANSFER => 1,
         CURLOPT_URL => $response1,
         CURLOPT_USERAGENT => 'Codular Sample cURL Request',
         CURLOPT_POST => 1,
         CURLOPT_POSTFIELDS =>$files
    ));
    // Send the request & save response to $resp
    $response = curl_exec($curl);
    
    // Close request to clear up some resources
    curl_close($curl);
    print_r("your file now uploades on cloud");
    


  
?>