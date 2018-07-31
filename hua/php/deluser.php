<meta charset="utf-8" />
<?php
include_once("../conn/dataconnection.php");
$user_id=$_GET['user_id'];
$sql=mysql_query("delete from user where user_id='$user_id'");
@$num=mysql_affected_rows();
if($num<=0){
	echo "<script>alert('对不起，系统出错了，请重新操作');history.go(-1);</script>";
}else{
	  echo"<script>history.go(-1);</script>";
}
?>