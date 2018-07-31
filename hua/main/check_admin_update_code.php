<meta charset="utf-8" />
<?php
session_start();
@$code=$_POST['code'];
include("../conn/dataconnection.php");
@$admin_id=$_SESSION['admin_id'];
@$admin_add=$_POST['admin_add'];
@$admin_tel=$_POST['admin_tel'];
@$old_code=$_SESSION['Login_code'];
if($code!=$old_code){
	echo "<script>alert('手机验证码错误');history.go(-1);</script>";
}else{
	$sql=mysql_query("update admin set admin_tel='$admin_tel',admin_addr='$admin_add' where admin_id='$admin_id'");
	@$sql_num=mysql_affected_rows();
	if($sql_num>0){
		echo "<script>alert('修改成功');window.location.href='adminmess.php';</script>";
	}else{
		echo "<script>alert('你没有做任何修改');history.go(-1);</script>";
	}
}
?>