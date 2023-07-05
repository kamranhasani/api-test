<?php
session_start();
require "vendor/autoload.php";
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

  //-------api-start-----------

if(isset($_POST['api'])){
  if (isset($_POST['token'])){
    if(!empty($_POST['user']) && !empty($_POST['email']) && !empty($_POST['role'])){

      $name=test_input($_POST['user']);
      $email=test_input($_POST['email']);
      $role=test_input($_POST['role']);

     $url="http://127.0.0.1/API/api.php/".$name."/".$email."/".$role;
     $urll = filter_var($url, FILTER_SANITIZE_URL);
     echo  curl($urll);
    }
    else
    {
      $response=["result"=> "failure-form",
  			"message" => "We can't find a user with that email address!"];
        
      echo  json_encode( $response);
    }
  }
}



  //-------api-end-----------
?>