<?php
namespace  Kamran\Api;

class fun{

private $dbname="api";
private $hostname="localhost";
private $username="root";
private $password="";
private $connect;

public  function DBconect(){

try{
$this->connect= new \PDO("mysql:host=$this->hostname;dbname=$this->dbname",$this->username,$this->password);
$this->connect->exec("SET CHARACTER SET utf8");
$this->connect->exec('set names utf8');

return $this->connect;

}catch(PDOException $error){
	return 'error';
}
}

public function Insert($Iname,$Iemail){
	
	$insert=$this->connect->prepare("INSERT INTO `api` (`id`, `name`, `email`) VALUES(NULL,?,?)");
	$insert->bindvalue(1,$Iname);
	$insert->bindvalue(2,$Iemail);
	$insert->execute();
    return $insert;

}


public function Show($sname,$semail){
	$Show=$this->connect->prepare("SELECT * FROM `api` WHERE name =? AND email=?  ");
	$Show->bindvalue(1,$sname);
	$Show->bindvalue(2,$semail);
	$Show->execute();
	if ($Show->rowcount()>=1) {
	    return $Show;
}
return false;
}

public function Update($uname,$uemail){
	$update=$this->connect->prepare("UPDATE `api` SET `name`=? WHERE email =? LIMIT 1");
	$update->bindvalue(1,$uname);
	$update->bindvalue(2,$uemail);
	$update->execute();
	if ($update->rowcount()>=1) {
	    return $update;
}
return false;
}

function Delete ($dname,$demail){
	$delete=$this->connect->prepare("DELETE FROM `api` WHERE name =? AND email=? LIMIT 1");
    $delete->bindvalue(1,$dname);
	$delete->bindvalue(2,$demail);
	$delete->execute();
	if ($delete->rowcount()>=1) {
        return $delete;
    }
    return false;
    }
}







?>