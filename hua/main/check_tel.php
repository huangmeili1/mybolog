<?php
@$tel=$_POST['tel'];
include("../conn/dataconnection.php");
@$sql=mysql_query("select * from user where user_tel='$tel'");
@$sql_num=mysql_num_rows($sql);
if(@$sql_num>0){
	$response=array(
	"errno"=>1,
	"msg"=>"success",
	"data"=>true
	);
}else{
	$response=array(
	"errno"=>2,
	"msg"=>"fail",
	"data"=>false
	);
}
echo json_encode($response);
?>