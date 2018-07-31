<?php
session_start();
include("../conn/dataconnection.php");
@$mess=$_POST['mess'];
@$b=$_POST['b'];
if($mess=='订单号'){
	$sql=mysql_query("select * from book where book_id='$b'");
	@$sql_num=mysql_num_rows($sql);
	if($sql_num>0){
		$response=array(
		"errno"=>0,
		"msg"=>"success",
		"data"=>true
		);
	}else{
		$response=array(
		"errno"=>1,
		"msg"=>"fail",
		"data"=>false
		);
	}
}else if($mess=='手机号'){
	$sql=mysql_query("select * from user where user_tel='$b'");
	@$sql_num=mysql_num_rows($sql);
	if($sql_num>0){
		$response=array(
		"errno"=>2,
		"msg"=>"success",
		"data"=>true
		);
	}else{
		$response=array(
		"errno"=>3,
		"msg"=>"fail",
		"data"=>false
		);
	}
}else if($mess=='验证码'){
	$code=$_SESSION['Login_code'];
	if($b==$code){
		$response=array(
		"errno"=>4,
		"msg"=>"success",
		"data"=>true
		);
	}else{
		$response=array(
		"errno"=>5,
		"msg"=>"fail",
		"data"=>false
		);
	}
}
echo json_encode($response);
?>