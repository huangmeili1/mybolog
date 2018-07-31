<?php 
@session_start();
if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
//加入购物车操作
//1.接收传递过来的购物车数据
include_once("../conn/dataconnection.php");
$good_id=intval($_POST['good_id']);
$good_num=intval($_POST['num']);
$user_id=$_SESSION['user_id'];
$cart_time=date("Y-m-d");
$sq=mysql_query("select * from cart where good_id='$good_id' and user_id='$user_id'");
$n=mysql_num_rows($sq);
if($n>0){
	$p=mysql_query("update cart set good_num=good_num+$good_num where user_id=$user_id and good_id=$good_id");
}else{
	$p=mysql_query("insert into cart(good_id,user_id,good_num,cart_time) value('$good_id','$user_id','$good_num','$cart_time')");
	
}
$rows=mysql_affected_rows();
//4.返回最终添加结果
if($rows){
	$response=array(
	'errno'=>0,
	'errmsg'=>'success',
	'data'=>true,
	);
}else{
	$response=array(
	'errno'=>-1,
	'errmsg'=>'fail',
	'data'=>false,
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
//	echo "<script>alert('请登录');window.location.href='login.php';</script>";
	} 

		?>