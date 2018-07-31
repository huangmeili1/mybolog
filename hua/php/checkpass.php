<?php
$tel=$_POST['tel'];
$search ='/^(1(([35][0-9])|(47)|[8][0126789]))\d{8}$/';
if(!preg_match($search,$tel)){
	$response=array(
	 "errno" => 0,
    "errmsg"=> "success",
    "data"  => true
	);
}else{
$response = array(
    "errno" => -1,
    "errmsg"=> "fail",
    "data"  => false
  );
}
	
  echo json_encode($response);
?>