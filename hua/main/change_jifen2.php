<meta charset="utf-8" />
<?php
	session_start();
	if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
		@$user_id=$_SESSION['user_id'];
		include("../conn/dataconnection.php");
		@$jifen=$_POST['jifen'];
		@$money=$_POST['money'];
		@$sql=mysql_query("select * from user where user_id='$user_id'");
		@$sql_user=mysql_fetch_array($sql);
		@$user_jifen=$sql_user['jifen'];
		if($user_jifen<$jifen){
			?>
			<span style="color: red;"><b>您的积分不够，兑换所需积分 <?php echo $jifen; ?>,您当前积分为 <?php echo $sql_user['jifen']; ?></b></span>
			<?php
		}else{
			$n=$sql_user['money'];
			$new_money=$money+$n;
			$new_jifen=$user_jifen-$jifen;
			$update=mysql_query("update user set jifen='$new_jifen',money='$new_money' where user_id='$user_id'");
			@$update_num=mysql_affected_rows();
			if(@$update_num<=0){
				?>
				<span style="color: red;"><b>暂时不支持兑换，请稍后再试</b></span>
				<?php
			}else{
				?>
				<span style="color: blue;">兑换成功</span>
				<?php
			}
		}
?>
<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='login.php';</script>";}  ?>