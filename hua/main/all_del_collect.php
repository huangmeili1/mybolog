<?php 
@session_start();
if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
	include("../conn/dataconnection.php");
	$goods=$_POST['goods'];
	$user_id=$_SESSION['user_id'];
	$a=0;
	for($i=0;$i<count($goods);$i++){
		$good_id=$goods[$i];
		$sql=mysql_query("delete from storegood where good_id='$good_id' and user_id='$user_id'");
   		@$num=mysql_affected_rows();
   		if(@$num>=0){
   			$a++;
   		}
	}
	if($a=count($goods)){
		$response=array(
		'errno'=>1,
		'errmsg'=>'success',
		'data'=>true,
		);
	}else{
		$response=array(
		'errno'=>0,
		'errmsg'=>'fail',
		'data'=>true,
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
}
