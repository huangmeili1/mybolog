<?php
@$admin_id=$_POST['admin_id'];
include("../conn/dataconnection.php");
@$sql=mysql_query("select * from admin where admin_id='$admin_id'");
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
echo json_encode($response);
?>