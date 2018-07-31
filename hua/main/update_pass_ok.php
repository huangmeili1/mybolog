<meta charset="utf-8" />
<?php
	session_start();
	if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
		include("../conn/dataconnection.php");
		$user_id=$_SESSION['user_id'];
		$newpass=$_POST['renewpass'];
		@$sql=mysql_query("update user set user_pass='$newpass' where user_id='$user_id'");
		$sql_num=mysql_affected_rows();
		if($sql_num<=0){
			echo "<script>alert('暂时不接受修改密码，请稍后再试');history.go(-1);</script>";
		}else{
			echo "<script>alert('修改成功');window.location.href='login.php';</script>";
		}
?>
<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='login.php';</script>";}  ?>