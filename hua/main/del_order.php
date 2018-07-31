<meta charset="utf-8" />
<?php
	session_start();
	if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
		@$user_id=$_SESSION['user_id'];
		include("../conn/dataconnection.php");
		@$book_id=$_GET['book_id'];
		$sql=mysql_query("delete from order_detail where book_id='$book_id'");
		@$num=mysql_affected_rows();
		if(@$num>=0){
			$s=mysql_query("delete from book where book_id='$book_id'");
			@$n=mysql_affected_rows();
			if(@$n>=0){
				echo "<script>alert('删除成功');window.location.href='person_order.php';</script>";
			}else{
				echo "<script>alert('删除失败，请稍后再试1');history.go(-1);</script>";
			}
		}else{
			echo "<script>alert('删除失败，请稍后再试');history.go(-1);</script>";
		}
?>
<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='login.php';</script>";}  ?>