<?php
@$user_id=$_POST['user_id'];
include("../conn/dataconnection.php");
@$sql=mysql_query("select * from book where user_id='$user_id'");
$sql_num=mysql_num_rows($sql);
if($sql_num<=0){
		@$c=mysql_query("delete from cart where user_id='$user_id'");
		@$s=mysql_query("delete from storegood where user_id='$user_id'");
		@$l=mysql_query("delete from getinfo where user_id='$user_id'");
		@$u=mysql_query("delete from user where user_id='$user_id'");
		$response=array(
		"errno"=>1,
		"msg"=>"success",
		"data"=>true
		);
}else{
	$a=0;
	while($book=mysql_fetch_array($sql)){
		if($book['state']=='未发货'||$book['state']=='待收货'){
			$a++;
		}
	}
	if($a>0){
		$response=array(
		"errno"=>0,
		"msg"=>"success",
		"data"=>false
		);
	}else{
		while($b=mysql_fetch_array($sql)){
			@$book_id=$b['book_id'];
			@$d_sql=mysql_query("delete from order_detail where book_id='$book_id'");
			@$c_sql=mysql_query("delete from comments where book_id='$book_id'");
			@$bb=mysql_query("delete from book where book_id='$book_id'");
		}
		
		@$c=mysql_query("delete from cart where user_id='$user_id'");
		@$s=mysql_query("delete from storegood where user_id='$user_id'");
		@$l=mysql_query("delete from getinfo where user_id='$user_id'");
		@$u=mysql_query("delete from user where user_id='$user_id'");
		$response=array(
		"errno"=>2,
		"msg"=>"success",
		"data"=>true
		);
	}
}
echo json_encode($response);
?>