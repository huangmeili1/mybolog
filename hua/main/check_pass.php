<?php
include("../conn/dataconnection.php");
$tel=$_POST['tel'];
$all_sql=mysql_query("select * from user where user_tel='$tel'");
@$all_sql_num=mysql_num_rows($all_sql);
if($all_sql_num<=0){
	$response=array(//手机不存在
	"errno"=>3,
	"success"=>'fail',
	"data"=>false
	);	
}else{
	$user=mysql_fetch_array($all_sql);
	$user_id=$user['user_id'];
	$response=array(
	"errno"=>2,
	"success"=>'success',
	"user_id"=>$user_id,
	"data"=>true
	);
}
echo json_encode($response);
?>