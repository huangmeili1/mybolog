<?php
include("../conn/dataconnection.php");
@$admin_id=$_POST['admin_id'];
@$admin_name=$_POST['admin_name'];
@$admin_pass=$_POST['admin_pass'];
@$admin_tel=$_POST['admin_tel'];
@$admin_add=$_POST['admin_add'];
@$admin_type=$_POST['admin_type'];
@$admin_sex=$_POST['admin_sex'];
@$sql=mysql_query("insert into admin(admin_id,admin_name,admin_pass,admin_tel,admin_addr,admin_type,admin_sex) values('$admin_id','$admin_name','$admin_pass','$admin_tel','$admin_add','$admin_type','$admin_sex')");
@$sql_num=mysql_affected_rows();
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