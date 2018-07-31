<meta charset="utf-8" />
<?php
$good_id=$_GET['good_id'];
include_once("../conn/dataconnection.php");
$sql=mysql_query("select * from goods where good_id='$good_id'");
@$n=mysql_num_rows($sql);
if($n<=0){
	echo "<script>alert('对不起，系统出错了，请重新操作');history.go(-1);</script>";
}else{
	$hua=mysql_fetch_array($sql);
	include("top.php");
}
?>