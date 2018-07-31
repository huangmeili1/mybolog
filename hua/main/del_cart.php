<?php
@session_start();
if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
	include_once("../conn/dataconnection.php");
	$good_id=$_GET['good_id'];
	@$user_id=$_SESSION['user_id'];
	$sql=mysql_query("delete from cart where user_id='$user_id' and good_id='$good_id'");
	@$num=mysql_affected_rows();
	if($num>=0){
		header("Location: cart.php");
	}else{
		echo "<script>alert('删除失败，请稍后再试');history.go(-1);</script>";
	}
}else{
	echo "<script>alert('请登录');window.location.href='login.php';</script>";
}
?>