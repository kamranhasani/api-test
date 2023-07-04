<?php
header('Content-Type: application/json; charset=utf-8');

//------function-start------

function test_input($data) {
    $data = trim($data);
    $data = strip_tags($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  function chektoken($value){
    if(isset($_SESSION['token']) && $_SESSION['token']==$value)
     unset($_SESSION['token']);
      return true;
  }

  function curl($url){
    $client = curl_init(); 
    curl_setopt($client, CURLOPT_URL, $url);
    curl_setopt($client,CURLOPT_RETURNTRANSFER,true); 
    $response = curl_exec($client); 
    curl_close($client);
     return    $response;
  
  }
  
  //-------function-ded--------





  $url="http://127.0.0.1/api/api.php/".$gemail."/".$gname;
?>