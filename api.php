<?php

require "vendor/autoload.php";
use  Kamran\Api\fun;
header('Content-Type: application/json; charset=utf-8');

//---------apicode-start-------
$metod=$_SERVER['REQUEST_METHOD'];
$api=explode('/', trim($_SERVER['PATH_INFO']));

$name=$api[1];
$email=$api[2];
$role=$api[3];

$funapi= new fun();
$funapi->DBconect();

switch($role){
case '1':
if(!empty($name)&&!empty($email)){
    
    $Insert= $funapi->Insert($name,$email);
    if($Insert){
    $response["result"] = "success";
    $response["message"] = "User Registered Successfully !";
    }
    else{
    $response["result"] = "failure";
    $response["message"] = "We can't find a user with that email address!";
    }
    }

    case '2':
        if(!empty($name)&&!empty($email)){
            
            $Show= $funapi->Show($name,$email);
            if($Show){
            $response["result"] = "success";
            $response["message"] = "User Registered Successfully !";
            }
            else{
            $response["result"] = "failure";
            $response["message"] = "We can't find a user with that email address!";
            }
            }

            case '3':
                if(!empty($name)&&!empty($email)){
                    
                    $Update= $funapi->Update($name,$email);
                    if($Update){
                    $response["result"] = "success";
                    $response["message"] = "User Registered Successfully !";
                    }
                    else{
                    $response["result"] = "failure";
                    $response["message"] = "We can't find a user with that email address!";
                    }
                    }

                    
                    case '4':
                        if(!empty($name)&&!empty($email)){
                            
                            $Delete= $funapi->Delete($name,$email);
                            if($Delete){
                            $response["result"] = "success";
                            $response["message"] = "User Registered Successfully !";
                            }
                            else{
                            $response["result"] = "failure";
                            $response["message"] = "We can't find a user with that email address!";
                            }
                            }
                
}
echo json_encode($response);




//---------apicode-end-------


?>