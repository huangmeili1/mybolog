<meta charset="utf-8" />
<?php
include("../conn/dataconnection.php");
@$realname=$_POST['realname'];
@$tel=$_POST['tel'];
@$hua=$_POST['content'];
@$title=$_POST['title'];
@$data=date("Y-m-d");
@$user_id=$_POST['user_id'];
@$sql=mysql_query("insert into ly(title,content,ly_time,user_id) values('$title','$hua','$data','$user_id')");
@$sql_num=mysql_affected_rows();
if($sql_num>0){
	echo "<script>alert('添加成功');history.go(-1);</script>";
}else{
	echo "<script>alert('添加失败，请稍后再试');history.go(-1);</script>";
}
?>