<meta charset="utf-8" />
<script type="text/javascript" src="../easyui/jquery.min.js"></script>
<meta charset="utf-8" />
<?php
	session_start();
	include_once("../conn/dataconnection.php");
	if(@$_SESSION['admin_id']!=''&&@$_SESSION['type']!=''&&@$_SESSION['admin_name']!=''){
		?>
<div style="margin: 0 auto;text-align: center;width: 100%;height: 100%;">
	<?php
		include("top1.php");
		?>
	<div id="aa" style="margin: 0 auto;text-align: center;width: 100%;height: 80%;">
	<div style="margin: 0 auto;text-align: center;float: left;width: 15%;height: 100%;">
		<?php  
			include("left.php");
			?>
	</div>
	<div id="aa" style="margin: 0 auto;text-align: center;height: 100%;width: 85%;float: right;">
		<?php
	$admin_id=$_GET['admin_id'];
	$sql=mysql_query("select * from admin where admin_id='$admin_id'");
	@$num=mysql_num_rows($sql);
	if($num<=0){
		echo "系统出错了";
	}else{
		@$a=mysql_fetch_array($sql);
		?>
		<div id="aa" style="margin-left: 200px;margin-top:100px;">
			<form action="" method="post">
		<table border="1" style="width: 50%;" align="center">
			<tr style="width: 50px;">
				<td colspan="2" align="center">个人资料修改</td>
			</tr>
			<tr>
				<td>编号</td>
				<td><?php echo $a['admin_id']; ?></td>
			</tr>
			<tr>
				<td>姓名</td>
				<td><?php echo $a['admin_name']; ?></td>
			</tr>
			<tr>
				<td>地址</td>
				<td><input style="height: 50px;color: blue;font-size: 20px;" size="30" type="text" name="addr" value="<?php echo $a['admin_addr']; ?>" /></td>
			</tr>
			<tr>
				<td>手机号码</td>
				<td><input type="text" style="height: 50px;color: blue;font-size: 20px;" size="30" name="tel" value="<?php echo $a['admin_tel']; ?>"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input name="tj" type="submit" value="修改" style="border: 0;color: white;width: 100px;height: 30px;background-color: blue;font-size: 20px;"></td>
			</tr>
		</table>
		</form>
		</div>
		<?php
	}
		?>
	</div>	
	</div>
	<div style="width: 100%;height: 10%;padding-top: 20px;"><h2>版权所有</h2></div>
	
</div>
<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>
	<?php
		if(isset($_POST['tj'])){
			$addr=$_POST['addr'];
			$tel=$_POST['tel'];
			$p=mysql_query("update admin set admin_tel='$tel',admin_addr='$addr' where admin_id='$admin_id'");
			@$num=mysql_affected_rows();
			if($num<=0){
				echo "<script>alert('你没有做任何修改');</script>";
			}else{
				echo "<script>alert('修改成功');window.location.href='adminmess.php';</script>";
			}
		}
		?>
