<meta charset="utf-8" />
<?php
include("../conn/dataconnection.php");
@$money_id=$_GET['money_id'];
@$sql=mysql_query("delete from getmoney where money_id='$money_id'");
@$sql_num=mysql_affected_rows();
if($sql_num>0){
	echo "<script>alert('删除成功');history.go(-1);</script>";
}else{
	echo "<script>alert('删除失败，请稍后再试');history.go(-1);</script>";
}
?>