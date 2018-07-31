<?php 
@session_start();
if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
	include("../conn/dataconnection.php");
	$good_id=$_POST['good_id'];
	$user_id=$_SESSION['user_id'];
	$sql=mysql_query("delete from storegood where user_id='$user_id' and good_id='$good_id'");
	@$num=mysql_affected_rows();
	if(@$num>=0){
		$response=array(
		'errno'=>0,
		'errmsg'=>'success',
		'data'=>true,
		);
	}else{
		$response=array(
		'errno'=>1,
		'errmsg'=>'fail',
		'data'=>true,
		);
	}
	echo json_encode($response);
}else{
	$response=array(
	'errno'=>2,
	'errmsg'=>'success',
	'data'=>true,
	);
	echo json_encode($response);
}
