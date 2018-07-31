<meta charset="utf-8" />
<style type="text/css">
	
	body a{text-decoration: none;}
	body a:link{color: blue;}
	body a:visited {color: blue;}
	body a:hover {color: orange;} 
</style>
<?php

?>
<div style="width: 9%;height: 31px;margin-top: 10px;margin-left: 100px;"><img src="../img/logo1.png"></div>
<div style="background-image: url(../img/12.jpg);width: 100%;height: 87%;margin: 0 auto;text-align: center;margin-top: 28px;">
		<div style="float: left;width: 60%;height: 100%;"></div>
		<div style="margin-right: 100px;background-color: white;float: right;width: 30%;height: 85%;margin-top: 55px;">
			<h1>用户登录</h1>
			<form method="post" name="aa" action="" onsubmit="return checkform()">
				<table align="center" style="font-size: 20px; border-collapse: separate; border-spacing: 30px; ">
					<tr>
						<td>用户号：</td>
						<td><input type="text" name="mo" size="35" placeholder="请输入用户号" style="height: 40px;"></td>
					</tr>
					<tr style="line-height: 35px;">
						<td>密&nbsp;&nbsp;&nbsp;码：</td>
						<td><input type="password" name="pass" size="35" placeholder="请输入密码" style="height: 40px;"></td>
					</tr>
					<tr>
						<td>验证码:</td>
						<td><input type="text" name="code" id="code" size="23"  style="height: 40px;" placeholder="请输入验证码" value="<?php echo @$_POST['code'] ?>"><img src="cap.php" border="1" onClick="this.src='cap.php'"><br><!--验证码--></td>
					</tr>
					<tr>
						<td></td>
						<td align="center" style="margin-left: 100px;"><input type="submit" name="tj" value="登&nbsp;&nbsp;录" style="margin-top: 15px;background-color: red;border: 0px;width: 250px;height: 40px;color: white;font-size: 20px;">
							<br>
								<a href="useradd.php">注册</a>&nbsp;&nbsp;&nbsp;<a href="">忘记密码</a>
						</td>
					</tr>
				</table>
			</form>
		</div>
</div>
<script type="text/javascript">
	function checkform(){
		if(aa.mo.value==''){
			alert('请输入用户编号');
			return false;
		}
		if(aa.pass.value==''){
			alert('请输入密码');
			return false;
		}
	}
</script>
<?php 
	if(isset($_POST['tj'])){
		@session_start();
		$mo=$_POST['mo'];
		$pass=$_POST['pass'];
		$code=$_POST['code'];
		if($_SESSION['code']!=$code){
			echo "<script>alert('验证码不正确，请重新输入');</script>";
		}else{
				include("../conn/dataconnection.php");
				$sql=mysql_query("select * from user where user_id='$mo' and user_pass='$pass'");
				@$mu=mysql_num_rows($sql);
				if($mu>0){
					$a=mysql_fetch_array($sql);
					$_SESSION['user_id']=$mo;
					$_SESSION['user_name']=$a['user_name'];
					echo "<script>alert('登录成功');history.go(-2);</script>";
				}else{
					echo "<script>alert('请检查编号或密码是否正确！');</script>";
				}
		}
	}
	?>