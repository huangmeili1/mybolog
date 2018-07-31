<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>管理中心</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
		<form action="#" method="post" onsubmit="return checkform()">
		<table style="margin-left: 300px;margin-top: 100px;">
			<tr>
				<td>请输入原密码：</td>
				<td style="height: 60px;">
					<input required="required" value="<?php echo @$_POST['old_pass'] ?>" type="text" style="height: 40px;width: 400px;" id="old_pass" name="old_pass" />
				</td>
			</tr>
			<tr>
				<td>请输入新密码：</td>
				<td style="height: 60px;">
					<input required="required" style="height: 40px;width: 400px;" value="<?php echo @$_POST['new_pass']; ?>" type="password" id="new_pass" name="new_pass" />
				</td>
			</tr>
			<tr>
				<td>请输入确认密码：</td>
				<td style="height: 60px;">
					<input required="required" style="height: 40px;width: 400px;" value="<?php echo @$_POST['re_new_pass']; ?>" type="password" id="re_new_pass" name="re_new_pass" />
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input name="tj" style="height: 50px;width: 60px;color: black;border: 0;border-radius: 10px;" type="submit" value="修改"></td>
			</tr>
		</table>
		</form>
		<?php
			if(isset($_POST['tj'])){
				@$old_pass=$_POST['old_pass'];
				@$new_pass=$_POST['new_pass'];
				@$re_new_pass=$_POST['re_new_pass'];
				@$admin_id=$_SESSION['admin_id'];
				$sql=mysql_query("select * from admin where admin_id='$admin_id' and admin_pass='$old_pass'");
				@$sql_num=mysql_num_rows($sql);
				if($sql_num<=0){
					echo "<script>alert('你的原密码错误，请重新输入');</script>";
				}else{
					@$u=mysql_query("update admin set admin_pass='$new_pass' where admin_id='$admin_id'");
					@$u_admin=mysql_affected_rows();
					if($u_admin>0){
					unset($_SESSION['admin_id']);
					unset($_SESSION['type']);
					unset($_SESSION['admin_name']);
					session_destroy();
						echo "<script>alert('修改成功,请登录');window.location.href='managelogin.php';</script>";
					}else{
						echo "<script>alert('新密码和原密码不能相同，请重新输入');</script>";
					}
				}
			}
			?>
	</div>	
	</div>
	<div style="width: 100%;height: 10%;padding-top: 20px;"><h2>版权所有</h2></div>
	
</div>
<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>
	<script type="text/javascript">
		function checkform(){
			var oldpass=document.getElementById("old_pass").value;
			var new_pass=document.getElementById("new_pass").value;
			var re_new_pass=document.getElementById("re_new_pass").value;
			if(new_pass!=re_new_pass){
				alert("新密码和确认密码不相同，请重新输入");
				return false;
			}
		}
	</script>