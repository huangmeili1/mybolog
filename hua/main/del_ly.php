<meta charset="utf-8" />
<?php
include("../conn/dataconnection.php");
@$ly_id=$_GET['ly_id'];
@$sql=mysql_query("delete from ly where ly_id='$ly_id'");
@$sql_num=mysql_affected_rows();
if($sql_num>0){
	echo "<script>alert('删除成功');history.go(-1);</script>";
}else{
	echo "<script>alert('删除失败，请稍后再试');history.go(-1);</script>";
}
?>