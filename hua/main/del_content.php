<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>删除评价</title>
<?php
	session_start();
	if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
		include("../conn/dataconnection.php");
		$user_id=$_SESSION['user_id'];
		$commet_id=$_GET['content_id'];
		@$select=mysql_query("select * from comments where commet_id='$commet_id'");
		@$c=mysql_fetch_array($select);
		$sql=mysql_query("delete from comments where commet_id='$commet_id'");
		@$sql_num=mysql_affected_rows();
		if($sql_num<=0){
			echo "<script>alert('对不起，系统出错了，暂时无法删除评价');history.go(-1);</script>";
		}else{
			@$book_id=$c['book_id'];
//			@$bood=mysql_query("update book set state='待评价' where book_id='$book_id'");
			echo "<script>alert('删除成功');history.go(-1);</script>";
		}
?>
<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='login.php';</script>";}  ?>