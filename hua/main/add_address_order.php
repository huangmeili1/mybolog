<?php
include("../conn/dataconnection.php");
@session_start();
@$user_id=$_SESSION['user_id'];
@$get_name=$_POST['get_name'];
@$get_tel=$_POST['get_tel'];
@$get_add=$_POST['get_add'];
@$get_post=$_POST['get_post'];
@$sql=mysql_query("insert into getinfo(user_id,get_name,get_tel,get_add,get_post) values('$user_id','$get_name','$get_tel','$get_add','$get_post')");
$sql_num=mysql_affected_rows();
if($sql_num<=0){
	$response=array(
	"errno"=>0,
	"msg"=>"fail",
	"data"=>false
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