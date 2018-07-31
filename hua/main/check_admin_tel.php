<?php
@$tel=$_POST['tel'];
include("../conn/dataconnection.php");
@$sql=mysql_query("select * from admin where admin_tel='$tel'");
@$sql_num=mysql_num_rows($sql);
if($sql_num>0){
	$response=array(
	"errno"=>0,
	"msg"=>"fail",
	"data"=>false,
	);
}else{
	$response=array(
	"errno"=>1,
	"msg"=>"success",
	"data"=>true
	);
}
echo json_encode($response);
?>