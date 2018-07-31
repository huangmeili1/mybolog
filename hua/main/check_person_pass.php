<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>密码找回</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
@$pass_user_id=$_GET['user_id'];
include("../conn/dataconnection.php");
@$sql=mysql_query("select * from user where user_id='$pass_user_id'");
@$sql_user=mysql_fetch_array($sql);
@$old_pass=$sql_user['user_pass'];
?>
<div class="container" style="width: 100%;">
	<?php
		include("top.php");
		?>
		<div class="row" style="width: 80%;margin: 0 auto;">
			<div class="col-md-12">
				<form class="form-horizontal" role="form" style="margin-top: 80px;margin-left: 150px;" onsubmit="return check()" method="post">
					<input type="hidden" name="old_pass" id="old_pass" value="<?php echo @$old_pass; ?>" />
					<h3>修改密码</h3>
					<span style="margin-left: 200px;font-size: 20px;">你的用户号为:<b><?php echo $pass_user_id; ?></b></span>
					<hr size="10" color="gray" />
				  <div class="form-group">
				    <label for="firstname" class="col-sm-2 control-label">新密码</label>
				    <div class="col-sm-10">
				      <input style="width: 400px;height: 50px;" type="password" class="form-control" id="pass" name="pass" value="<?php echo @$_POST['pass']; ?>"  required="required" placeholder="请输入新密码">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="lastname" class="col-sm-2 control-label">重新输入新密码</label>
				    <div class="col-sm-10">
				      <input style="width: 400px;height: 50px;" type="password" class="form-control" required="required" id="repass" name="repass" value="<?php echo @$_POST['repass']; ?>" placeholder="请输入确认密码">
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" value="tj" name="tj" class="btn btn-default">修改</button>
				    </div>
				  </div>
				</form>
			</div>
		</div>
</div>

<?php
	if(isset($_POST['tj'])){
		@$old_pass=$_POST['old_pass'];
		@$pass=$_POST['pass'];
		@$update=mysql_query("update user set user_pass='$pass' where user_id='$pass_user_id'");
		@$update_num=mysql_affected_rows();
		if(@$update_num>0){
			echo "<script>alert('修改成功，请登录');window.location.href='login.php';</script>";
		}else{
			echo "<script>alert('修改失败');</script>";
			echo "你可以使用原密码"+$old_pass+"登录";
		}
	}
	?>
<script type="text/javascript" src="../js/index.js"></script>
<script type="text/javascript">
	function check(){
		var pass=document.getElementById("pass").value;
		var repass=document.getElementById("repass").value;
		var old_pass=document.getElementById("old_pass").value;
		if(pass==''){
			alert("请填写新密码");
			document.getElementById("pass").focus();
			return false;
		}else if(repass==''){
			alert("请填写确认密码");
			document.getElementById("repass").focus();
			return false;
		}else if(pass!=repass){
			alert("新密码和确认密码不相同，请重新确认");
			return false;
		}else if(pass==old_pass){
			alert("新密码与原密码相同，请重新输入");
			return false;
		}else{
			return true;
		}
	}
</script>