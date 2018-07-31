<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>修改密码</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
	session_start();
	if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
		include("../conn/dataconnection.php");
		@$user_id=$_SESSION['user_id'];
		@$sql=mysql_query("select * from user where user_id='$user_id'");
		@$user=mysql_fetch_array($sql);
		@$old=$user['user_pass'];
?>
<div class="container" style="width: 100%;">
	<?php
		include("top.php");
		?>
		<div class="row" style="width: 90%;margin: 0 auto;">
		<div class="col-md-12" style="padding: 0;margin: 0;background-color: white;">
			<ol class="breadcrumb" style="background-color: white;">
			    <li><a href="index.php">首页</a></li>
			    <li><a href="personcenter.php">个人中心</a></li>
			    <li class="active">修改密码</li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="row" style="width: 90%;margin: 0 auto;margin-bottom: 100px;">
			<div class="col-md-12" style="background-color: white;">
				<div class="row">
					<div class="col-md-3" style="height: auto;border: 1px;background: white;margin-bottom: 100px;">
						
						<?php include("personleft.php"); ?>
						
					</div>
					<div class="col-md-9">
						<div class="panel panel-default">
						    <div class="panel-heading">
						        <b>修改密码</b>
						    </div>
						    <div class="panel-body">
						        <div style="width: 90%;margin: 0 auto;height: auto;">
						        	<form id="old_pass" class="form-horizontal" role="form">
										<div class="input-group" style="width: 680px;">
											 <label for="firstname" class="col-sm-2 control-label">输入原密码</label>
								           <input required="required" style="height: 50px;width: 450px;" type="password" class="form-control" id="pass" name="pass" placeholder="输入原密码">
								            <button type="button" onclick="check_pass(<?php echo $user_id; ?>,<?php echo $old; ?>)" style="height: 50px;width: 50px;" class="input-group-addon">确认</button>
								        </div>
								        <span id="showmessage"></span>
						        	</form>
						        	<form id="new_pass_show" style="display: none;" method="post" onsubmit="return check_old_new(<?php echo $old; ?>)" class="form-horizontal" role="form" action="update_pass_ok.php">
						        		<fieldset>
						        		<legend>修改密码</legend>
						        		<div class="form-group">
										    <label for="firstname" class="col-sm-2 control-label">请输入新密码</label>
										    <div class="col-sm-10">
										      <input style="height: 50px;width: 450px;" required="required" type="password" class="form-control" id="newpass" name="newpass" placeholder="输入新密码">
										    </div>
										</div>
										<div class="form-group">
										    <label for="firstname" class="col-sm-2 control-label">确认新密码</label>
										    <div class="col-sm-10">
										      <input style="height: 50px;width: 450px;" required="required" type="password" class="form-control" id="renewpass" name="renewpass" placeholder="输入确认密码">
										      <span id="showmess"></span>
										    </div>
										</div>
										<div class="form-group">
										    <div class="col-sm-10">
										      <button style="margin-left: 200px;" type="submit"  class="btn btn-default">确认修改</button>
										    </div>
										</div>
										</fieldset>
						        	</form>
						        </div>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='login.php';</script>";}  ?>
	<script type="text/javascript" src="../js/index.js"></script>
	<script type="text/javascript">
		 function check_pass(user_id,oldpass){
		 	var new_pass_show=document.getElementById("new_pass_show");
		 	var old_pass=document.getElementById("old_pass");
		 	var pass=document.getElementById("pass");
		 	var newpass=pass.value;
		 	var show=document.getElementById("showmessage");
		 	if(newpass!=oldpass){
		 		show.innerHTML="<span style='color: red;'>原密码输入错误，请重新输入</span>";
		 	}else{
		 		show.innerHTML="";
		 		old_pass.style.display='none';
		 		new_pass_show.style.display='block';
		 	}
		 }
		 
		 function check_old_new(old){
		 	var renewpass=document.getElementById("renewpass").value;
		 	var newpass=document.getElementById("newpass");
		 	var showmess=document.getElementById("showmess");
		 	var pass=newpass.value;
		 	if(pass==''){
		 		document.getElementById("newpass").focus();
		 		return false;
		 	}else if(renewpass==''){
		 		document.getElementById("renewpass").focus();
		 		return false;
		 	}else if(pass!=renewpass){
		 		
		 		showmess.innerHTML="<span style='color: red;'>两次输入密码不一样，请输入</span>";
		 		return false;
		 		
		 	}else if(old==renewpass){
		 		showmess.innerHTML="<span style='color: red;'>输入密码与原密码相同，请重新输入</span>";
		 		return false;
		 	}else{
		 		showmess.innerHTML="<span style='color: green;'>输入密码正确，请确认修改</span>";
		 		return true;
		 	}
		 }
	</script>
