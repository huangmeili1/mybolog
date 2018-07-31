<meta charset="utf-8" />
<?php
session_start();
if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
include("../conn/dataconnection.php");
$user_id=$_SESSION['user_id'];
$get_id=$_GET['get_id'];
$f=mysql_query("select * from book where get_id='$get_id' and state='待收货'");
@$fnum=mysql_num_rows($f);
if($fnum>0){
	echo "<script>alert('此收货人还有订单未确认收货，不能进行删除');history.go(-1);</script>";
}else{
$se=mysql_query("select * from book where get_id='$get_id'");
@$senum=mysql_num_rows($se);
if($senum>0){
$sql=mysql_query("delete from order_detail where book_id=(select book_id from book where get_id='$get_id')");
@$num=mysql_num_rows();
if(@$num>0){
$bokk=mysql_query("delete from book where get_id='$get_id' and user_id='$user_id'");
@$bnum=mysql_num_rows($bokk);
if(@$bnum>0){
	$get=mysql_query("delete from getinfo where get_id='$get_id'");
	@$get_num=mysql_num_rows($get);
	if(@$get_num>0){
		header('location:member_address.php');
	}else{
		mysql_query("ROLLBACK");//事务回滚
		echo "<script>alert('更新失败1，请稍后再试');history.go(-1);</script>";
	}
}
}else{
	mysql_query("ROLLBACK");//事务回滚
	echo "<script>alert('更新失败2，请稍后再试');history.go(-1);</script>";
}
}else{
	$get_get=mysql_query("delete from getinfo where get_id='$get_id' and user_id='$user_id'");
	@$t_num=mysql_affected_rows();
	if($t_num>0){
		header('location:member_address.php');
	}else{
		echo "<script>alert('删除失败3，请稍后再试');history.go(-1);</script>";
	}
}
}
?>

<?php
}else{echo "<script>alert('请登录');window.location.href='login.php';</script>";}  ?>