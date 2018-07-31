<meta charset="utf-8" />
<?php
if(isset($_POST['tj'])){
	include_once("../conn/dataconnection.php");
	session_start();
	$user_id=$_SESSION['user_id'];
	@$good_id=$_POST['items'];
	if($good_id==''){
		echo "<script>alert('你没有选择商品');history.go(-1);</script>";
	}else{
		foreach($good_id as $good){
			$sql=mysql_query("delete from cart where user_id='$user_id' and good_id='$good'");
		}
		header('Location: cart.php');
	}
}

?>