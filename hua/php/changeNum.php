<?php
session_start();
$user_id=$_SESSION['user_id'];
$good_id=$_POST['good_id'];
$num=$_POST['num'];
include_once("../conn/dataconnection.php");
$sql=mysql_query("update cart set good_num=$num where good_id=$good_id and user_id=$user_id");
$n=mysql_affected_rows();
if($n>0){
	$response = array(
    "errno"=> 0,
    "errmsg"=> "success",
    "data"=> true
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