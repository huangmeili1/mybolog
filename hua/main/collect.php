<meta charset="utf-8" />
<?php
@session_start();
if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
	$good_id=$_GET['good_id'];
	$user_id=$_SESSION['user_id'];
	include_once("../conn/dataconnection.php");
	$sql=mysql_query("select * from storegood where user_id='$user_id' and good_id='$good_id'");
	@$num=mysql_num_rows($sql);
	if($num>0){
		echo "<script>alert('你已经收藏过此商品,请到收藏夹进行查看');history.go(-1);</script>";
	}else{
		$store_time=date("Y-m-d");
		$ss=mysql_query("insert into storegood(good_id,user_id,store_time) values('$good_id','$user_id','$store_time')");
		@$n=mysql_affected_rows();
		if($n>0){
			echo "<script>alert('收藏成功，请到收藏夹进行查看');history.go(-1);</script>";
		}else{
			echo "<script>alert('收藏失败，请稍后再试');history.go(-1);</script>";
		}
	}
}else{
	echo "<script>alert('请登录');window.location.href='login.php';</script>";
}
?>