<meta charset="utf-8" />
<?php
	session_start();
	include("../conn/dataconnection.php");
	if(@$_SESSION['admin_id']!=''&&@$_SESSION['type']!=''&&@$_SESSION['admin_name']!=''){
		?>
<?php include("../conn/dataconnection.php"); ?>
<?php
$hua_id=$_GET['hua_id'];
$sql=mysql_query("delete from know where hua_id='$hua_id'");
@$num=mysql_affected_rows();
if($num>=0){
	echo "<script>alert('删除成功');history.go(-1);</script>";
}else{
	echo "<script>alert('对不起，删除失败，请联系系统维护员');history.go(-1);</script>";
}
?>
<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>