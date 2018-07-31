<?php
header('content-type:text/html charset:utf-8');
session_start();
if($_SESSION['user_id']!=''&&$_SESSION['user_name']!=''){
	include("../conn/dataconnection.php");
	$user_id=$_SESSION['user_id'];
	$book_id=$_POST['book_id'];
	$get_id=$_POST['get_id'];
	$update=mysql_query("update book set get_id='$get_id' where book_id='$book_id' and user_id='$user_id'");
	$sql_num=mysql_affected_rows();
	if($sql_num>0){
		$response=array(
			'errno'=>0,
			'errmsg'=>'success',
			'data'=>true,
		);
	}else{
		$response=array(
		'errno'=>1,
		'errmsg'=>'fail',
		'data'=>false,
		);
	}

}else{
	 $response=array(
		'errno'=>2,
		'errmsg'=>'fail',
		'data'=>false,
		);
}
echo json_encode($response);
?>