<?php
session_start();
@$admin_tel=$_POST['admin_tel'];
@$code=$_POST['code'];
include("../conn/dataconnection.php");
@$old_code=$_SESSION['Login_code'];
if($code!=$old_code){
	$response=array(
	"errno"=>0,
	"msg"=>'fail',
	"data"=>false
	);
}else{
	$sql=mysql_query("select * from admin where admin_tel='$admin_tel'");
	@$sql_num=mysql_num_rows($sql);
	if($sql_num>0){
		@$a=mysql_fetch_array($sql);
		$_SESSION['admin_id']=$a['admin_id'];
		$_SESSION['admin_name']=$a['admin_name'];
		$_SESSION['type']=$a['admin_type'];
		$response=array(
		"errno"=>1,
		"msg"=>'success',
		"data"=>true
		);
	}else{
		$response=array(
		"errno"=>2,
		"msg"=>'fail',
		"data"=>false
		);
	}
}
echo json_encode($response);
?>