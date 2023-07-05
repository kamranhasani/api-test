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

public function Insert($name,$email){
	
	$insert=$this->connect->prepare("INSERT INTO `api` (`id`, `name`, `email`) VALUES(NULL,?,?)");
	$insert->bindvalue(1,$name);
	$insert->bindvalue(2,$email);
	$insert->execute();
	return $insert;
}


public function Show($name,$email){
	$Show=$this->connect->prepare("SELECT * FROM `api` WHERE name =? AND email=? ");
	$Show->bindvalue(1,$name);
	$Show->bindvalue(2,$email);
	$Show->execute();
	if ($Show->rowcount()>=1) {
	return $Show;
}
return false;
}

public function Update($name,$email){
	$update=$this->connect->prepare("UPDATE `api` SET `name`=? WHERE email =? LIMIT 1");
	$update->bindvalue(1,$name);
	$update->bindvalue(2,$email);
	$update->execute();
	if ($update) {
	return $update;
}
return false;
}

function Delete ($name,$email){
	$delete=$this->connect->prepare("DELETE FROM `api` WHERE name =? AND email=? LIMIT 1");
    $delete->bindvalue(1,$name);
	$delete->bindvalue(2,$email);
	$delete->execute();
	if ($delete) {
        return $delete;
    }
    return false;
    }
}







?>