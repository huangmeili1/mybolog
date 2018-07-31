<?php
include("../conn/dataconnection.php");
$user_id=$_POST['user_id'];
$aa=mysql_query("select * from user where user_id='$user_id'");
@$r=mysql_num_rows($aa);
if($r){
	$response=array(
	 "errno" => 0,
    "errmsg"=> "success",
    "data"  => true
	);
}else{
	$response = array(
    "errno" => -1,
    "errmsg"=> "fail",
    "data"  => false
  );
}
echo json_encode($response);
//echo $user_id;
?>