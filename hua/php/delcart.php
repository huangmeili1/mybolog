<?php
$user_id=$_POST['user_id'];
include("../conn/dataconnection.php");
$sql=mysql_query("delete from cart where user_id='$user_id'");
@$row=mysql_affected_rows();
if($row>0){
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
?>