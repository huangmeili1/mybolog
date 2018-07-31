<?php
	session_start();
	include_once("../conn/dataconnection.php");
	if(@$_SESSION['admin_id']!=''&&@$_SESSION['type']!=''&&@$_SESSION['admin_name']!=''){
//		$user_id=$_SESSION['user_id'];
		$book_id=$_POST['book_id'];
		$sql=mysql_query("select * from book where book_id='$book_id'");
		@$sql_num=mysql_fetch_array($sql);
		if($sql_num['state']=='待收货'){
			$response=array(
			"errno"=>1,
			"success"=>"fail",
			"data"=>false
			);
		}else{
			$date=date("Y-m-d H:s:i");
			$update=mysql_query("update book set state='待收货',send_time='$date' where book_id='$book_id'");
			@$update_num=mysql_affected_rows();
			if($update_num>0){
			$response=array(
			"errno"=>2,
			"success"=>"success",
			"data"=>true
			);
			}else{
			$response=array(
			"errno"=>3,
			"success"=>"fail",
			"data"=>false
			);
		}
		}
		?>
		<?php
	 }else{
	$response=array(
	"errno"=>0,
	"success"=>"fail",
	"data"=>false
	);
	}  
	echo json_encode($response);
	?>