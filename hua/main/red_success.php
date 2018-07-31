<?php
	include("../conn/dataconnection.php");
	session_start();
	@$code=$_SESSION['Reg_code'];
//	echo $code;
	@$tle=$_POST['tel'];
	@$pass=$_POST['pass'];
	@$new_code=$_POST['code'];
	if($code!=$new_code){
		$response=array(
		"errno"=>0,
		"success"=>"fail",
		"data"=>false
		);
	}else{
		$sql=mysql_query("select * from user where user_tel='$tle'");
		@$sql_num=mysql_num_rows($sql);
		if($sql_num>0){
			$response=array(
			"errno"=>1,
			"success"=>"fail",
			"data"=>false
			);
		}else{
			$user_type=mysql_query("select * from user_type order by jingyan asc");
			@$type_num=mysql_num_rows($user_type);
			if($type_num<=0){
				$type_id=0;
			}else{
				$type_n=mysql_fetch_array($user_type);
				$type_id=$type_n['type_id'];
			}
			$d=date("Y-m-d");
			@$ip=$_SERVER["REMOTE_ADDR"];
			$u=mysql_query("insert into user(user_pass,user_tel,user_time,ip,type_id) values('$pass','$tle','$d','$ip','$type_id')");
			@$u_num=mysql_affected_rows();
			if($u_num>0){
				
				@$user=mysql_query("select * from user where user_tel='$tle' and user_pass='$pass'");
				@$u_user=mysql_fetch_array($user);
				@$user_id=$u_user['user_id'];
				$_SESSION['user_id']=$user_id;
				if($user['user_name']==''){
					$_SESSION['user_name']=$user_id;
				}else{
					$_SESSION['user_name']=$u_user['user_name'];
				}
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
	}
	echo json_encode($response);
?>