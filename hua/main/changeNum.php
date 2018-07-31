<?php
@session_start();
include_once("../conn/dataconnection.php");
$good_id=$_POST['good_id'];
$num=$_POST['num'];
$user_id=$_SESSION['user_id'];
$sql=mysql_query("update cart set good_num='$num' where user_id='$user_id' and good_id='$good_id'");
@$n=mysql_affected_rows();
if(@$n>0){
	$response=array(
		"errno"=>0,
		"errmsg"=>"success",
		"data"=>true,
	);
}else{
	$response=array(
		"errno"=>1,
		"errmsg"=>"fail",
		"data"=>false,
	);
}
echo json_encode($response);
?>