<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/reg.ico" />
<title>管理员登录中心</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
	
	body a{text-decoration: none;}
	body a:link{color: blue;}
	body a:visited {color: blue;}
	body a:hover {color: orange;} 
</style>
<style>
	[class *= col-]{
  background-color: transparent;
}
body{
	background: url(../img/login.jpg);
	background-size: cover;
}
</style>
<?php

?>
<div class="container" style="width: 100%;">
	<div class="row" style="margin-top: 120px;">
		<div class="col-md-12" style="background-color: transparent;">
			<div class="thumbnail" style="background: transparent;padding: 0;margin: 0;border: 0;">
				<img src="../img/title.png" />
			</div>
		</div>
	</div>
	<div class="row" style="width: 100%;margin: 0 auto;padding: 0;">
		<div class="col-md-12" style="height: 420px;padding: 0;margin: 0;">
			<div class="panel panel-default" style="width: 35%;margin: 0 auto;margin-top: 25px;padding: 0;background-color: white;">
			    <div class="panel-heading" style="background-color: white;">
			        <h3 class="panel-title" style="text-align: center;">
			          	 管理员登录
			        </h3>
			    </div>
			    <div class="panel-body">
			    <div>
			    	<span id="tel_pass" style="display: none;"><a onclick="check_code()" href="#">使用帐号密码登录</a></span>
			    	<span id="tel_code"><a onclick="check_pass()" href="#">使用手机验证码登录</a></span>
			    </div>
			    <div id="user_code_login" style="display: none;">
				    <form class="form-horizontal" method="post" role="form">
					  <div class="form-group">
					    <label for="firstname" class="col-sm-2 control-label">手机号码</label>
					    <div class="col-sm-10">
					      <input type="text" required="required" style="height: 50px;" class="form-control" name="tel" id="tel" value="<?php echo @$_POST['tel'] ?>" placeholder="请输入管理员手机号码">
					    </div>
					  </div>
					 <div class="form-group">
						<label for="firstname" class="col-sm-2 control-label">验证码</label>
						<div class="input-group" style="width: 320px;">
						<input name="code" required="required" id="code" required="required" disabled="disabled" style="width: 210px;height: 50px;" type="text" class="form-control" placeholder="短信验证码">
						<span class="input-group-btn" style="height: 50px;">
						    <button id="btnSendCode" name="tj" value="tj" onclick="sendMessage()" class="btn btn-default" type="button" style="width: 150px;height: 50px;background-color: orange;color: white;border: 1px solid #e43a3d;">发送手机验证码</button>
						</span>
					    </div>
					 </div>
					</form>
					 <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="button" onclick="login_admin()" name="tj" class="btn btn-default">登录</button>
					    </div>
					  </div>
			    </div>
			    <div id="user_pass" style="display: block;">
				<form class="form-horizontal" method="post" role="form">
				  <div class="form-group">
				    <label for="firstname" class="col-sm-2 control-label">管理员号</label>
				    <div class="col-sm-10">
				      <input type="text" required="required" style="height: 50px;" class="form-control" name="mo" value="<?php echo @$_POST['mo'] ?>" placeholder="请输入管理员编号">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="lastname" class="col-sm-2 control-label">密&nbsp;&nbsp;&nbsp;码</label>
				    <div class="col-sm-10">
				      <input type="password" required="required" style="height: 50px;" class="form-control" name="pass" value="<?php echo @$_POST['pass'] ?>" placeholder="请输入密码">
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" name="tj" class="btn btn-default">登录</button>
				    </div>
				  </div>
				</form>
					</div>
					
					<a href="admin_find_pass.php" style="margin-left: 200px;" class="btn btn-danger">找回密码</a>
			    </div>
			</div>
		</div>
	</div>
</div>

</div>
<?php 
	if(isset($_POST['tj'])){
		@session_start();
		@$mo=$_POST['mo'];
		@$pass=$_POST['pass'];
				include("../conn/dataconnection.php");
				$sql=mysql_query("select * from admin where admin_id='$mo'");
				@$mu=mysql_num_rows($sql);
				if($mu>0){
					$a=mysql_fetch_array($sql);
					@$old_pass=$a['admin_pass'];
					if(@$old_pass!=$pass){
						echo "<script>alert('请检查密码是否正确！');</script>";
					}else{
						$_SESSION['admin_id']=$mo;
						$_SESSION['admin_name']=$a['admin_name'];
						$_SESSION['type']=$a['admin_type'];
						echo "<script>alert('登录成功');window.location.href='managecenter.php';</script>";
					}
				}else{
					echo "<script>alert('请检查管理员编号是否正确！');</script>";
				}
	}
	
	
	
	
	
	?>

<script type="text/javascript">
function login_admin(){
	var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
	var tel=document.getElementById("tel").value;
	var code=document.getElementById("code").value;
	if(!myreg.test(tel)){
		alert("请正确填写你的手机号码 ");
		document.getElementById("tel").focus();
	}else if(code==''){
		alert("请正确填写你的验证码");
		document.getElementById("code").focus();
	}else{
		var url="admin_login_code.php";
		var data={"admin_tel":tel,"code":code};
		var success=function(response){
			if(response.errno==0){
				alert("验证码不正确，请重新填写");
				document.getElementById("code").focus();
			}else if(response.errno==1){
				alert("登录成功");
				window.location.href='managecenter.php';
			}else if(response.errno==2){
				alert("手机号码不存在，请检查");
				document.getElementById("code").value='';
				document.getElementById("code").setAttribute("disabled",'disabled');
				document.getElementById("tel").removeAttribute('readonly');
				document.getElementById("tel").focus();
			}else{
				alert("登录失败，请稍后再试");
			}
		}
		$.post(url,data,success,"json");
	}
//	alert("我要登录了");
}
function check_pass(){//手机验证码
		var form_pass=document.getElementById("user_code_login");//验证码登录
		var from_code=document.getElementById("user_pass");//密码登录
		var tel_pass=document.getElementById("tel_pass");
		var tel_code=document.getElementById("tel_code");//手机验证码
		form_pass.style.display='block';
		tel_code.style.display='none';
		tel_pass.style.display='block';
		from_code.style.display='none';
	}
	function check_code(){//帐号密码
		var form_pass=document.getElementById("user_code_login");//验证码登录
		var from_code=document.getElementById("user_pass");//密码登录
		var tel_pass=document.getElementById("tel_pass");
		var tel_code=document.getElementById("tel_code");
		form_pass.style.display='none';
		tel_code.style.display='block';
		tel_pass.style.display='none';
		from_code.style.display='block';
	}
	function checkform(){
		if(aa.mo.value==''){
			alert('请输入管理员编号');
			return false;
		}
		if(aa.pass.value==''){
			alert('请输入密码');
			return false;
		}
	}
var InterValObj; //timer变量，控制时间  
var count =90; //间隔函数，1秒执行  
var curCount;//当前剩余秒数  
function sendMessage(){  
	var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
	var tel=document.getElementById("tel");
     var phone=tel.value;
     if(!myreg.test(phone)){
     	alert("请正确输入你的手机号码");
     	document.getElementById("tel").focus();
     }else{
	     curCount = count;  
	　　//设置button效果，开始计时  
	     document.getElementById("btnSendCode").setAttribute("disabled","disabled");
	     document.getElementById("btnSendCode").innerText="请在" + curCount + "秒内输入验证码";
	     InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次  
	　　  //向后台发送处理数据  
	    	var url="Login_code.php";
	    	var data={"phone":phone};
	    	var success=function(curl){
	    		if(curl.Code=='OK'){
	    			alert('发送成功');
	    			document.getElementById("code").removeAttribute("disabled");
	    			document.getElementById("tel").setAttribute('readonly','readonly');
	    		}else if(curl.Code=='101'){
	    			alert('手机号码错误');
	    		}else if(curl.Code=='102'){
	    			alert('验证码内容过长(超过20位)');
	    		}else if(curl.Code=='isv.BUSINESS_LIMIT_CONTROL'){
	    			alert('每分钟对同一手机号多次重复发送,请稍后再试');
	    		}
	    	}
	    	$.post(url,data,success,"json");
	     }
}  
//timer处理函数  
function SetRemainTime() {  
            if (curCount == 0) {                  
                window.clearInterval(InterValObj);//停止计时器  
                document.getElementById("btnSendCode").removeAttribute("disabled");//启用按钮  
               document.getElementById("btnSendCode").innerText="重新发送验证码";  
            }  
            else {  
                curCount--;  
                document.getElementById("btnSendCode").innerText="请在" + curCount + "秒内输入验证码";
            }  
       }  	
</script>
