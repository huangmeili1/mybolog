<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/reg.ico" />
<title>用户登录中心</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
	@session_start();
	include("../conn/dataconnection.php");
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
			           用户登录
			        </h3>
			    </div>
			    <div class="panel-body">
			    	<span id="tel_pass" style="display: none;"><a onclick="check_code()" href="#">使用帐号密码登录</a></span>
			    	<span id="tel_code"><a onclick="check_pass()" href="#">使用手机验证码登录</a></span>
			        <form style="margin-top: 30px;" id="form_pass" class="form-horizontal" role="form" action="" method="post">
			        	<div class="form-group">
						<label for="firstname" class="col-sm-2 control-label" style="background-color: white;">手机号</label>
						<div class="col-sm-10 input-group" style="background-color: white;">
						<span class="input-group-addon"><span style="font-size: 20px;" class="glyphicon glyphicon-user"></span></span>
						<input style="width: 300px;height: 50px;" type="text" name="pass_tel" class="form-control" id="pass_tel" value="<?php echo @$_POST['mo']; ?>" placeholder="请输入手机号码" required="required">
						</div>
						</div>
			        	<div class="form-group">
							<label for="firstname" class="col-sm-2 control-label" style="background-color: white;">密码</label>
							<div class="col-sm-10 input-group" style="background-color: white;">
							<span class="input-group-addon"><span style="font-size: 20px;" class="glyphicon glyphicon-lock"></span></span>
							<input style="width: 300px;height: 50px;" type="password" name="pass" value="<?php echo @$_POST['pass']; ?>" class="form-control" id="pass" placeholder="请输入密码" required="required">
							</div>
							</div>
					<div class="form-group" >
						<div class="col-sm-offset-2 col-sm-10" style="background-color: white;">
						<a  href="#">忘记密码</a>&nbsp;&nbsp;&nbsp;<a href="Reg.php">去注册</a>
						</div>
						</div>
						<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10" style="background-color: white;">
							<button onclick="login('密码')" style="width: 140px;" type="button" name="tj" class="btn btn-danger btn-lg">登录</button>
						</div>
					</div>
			        </form>
			        
			        
			        
			        
			        <form style="margin-top: 30px;display: none;" id="from_code" class="form-horizontal" role="form" method="post">
			        	<div class="form-group">
						<label for="firstname" class="col-sm-2 control-label" style="background-color: white;">手机号</label>
						<div class="col-sm-10 input-group" style="background-color: white;">
						<span class="input-group-addon"><span style="font-size: 20px;" class="glyphicon glyphicon-user"></span></span>
						<input style="width: 300px;height: 50px;" type="text" name="tel" class="form-control" id="tel" value="<?php echo @$_POST['mo']; ?>" placeholder="请输入手机号码" required="required">
						</div>
						</div>
			        				<div class="form-group">
										<label for="firstname" class="col-sm-2 control-label">验证码</label>
										<div class="input-group" style="width: 320px;">
							            <input name="code" id="code" required="required" disabled="disabled" style="width: 210px;height: 50px;" type="text" class="form-control" placeholder="短信验证码">
											<span class="input-group-btn" style="height: 50px;">
						                      <button id="btnSendCode" name="tj" value="tj" onclick="sendMessage()" class="btn btn-default" type="button" style="width: 150px;height: 50px;background-color: orange;color: white;border: 1px solid #e43a3d;">发送手机验证码</button>
						                   </span>
							        	</div>
									</div>
					<div class="form-group" >
						<div class="col-sm-offset-2 col-sm-10" style="background-color: white;">
						<a  href="#">忘记密码</a>&nbsp;&nbsp;&nbsp;<a href="Reg.php">去注册</a>
						</div>
						</div>
						<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10" style="background-color: white;">
							<button style="width: 140px;" type="button" onclick="login('登录')" name="tj" class="btn btn-danger btn-lg">登录</button>
						</div>
					</div>
			        </form>
			    </div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12" style="text-align: center;">
			<span style="font-size: 18px;"><a style="text-decoration: underline;color: white;" href="index.php">不登了，继续购物<span class="glyphicon glyphicon-chevron-right"></span></a></span>
		</div>
	</div>
</div>
<script type="text/javascript">
	function check_pass(){
		var form_pass=document.getElementById("form_pass");
		var from_code=document.getElementById("from_code");
		var tel_pass=document.getElementById("tel_pass");
		var tel_code=document.getElementById("tel_code");
		form_pass.style.display='none';
		tel_code.style.display='none';
		tel_pass.style.display='block';
		from_code.style.display='block';
	}
	function check_code(){
		var form_pass=document.getElementById("form_pass");
		var from_code=document.getElementById("from_code");
		var tel_pass=document.getElementById("tel_pass");
		var tel_code=document.getElementById("tel_code");
		form_pass.style.display='block';
		tel_code.style.display='block';
		tel_pass.style.display='none';
		from_code.style.display='none';
	}
	
	function login(mess){
		var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
		if(mess=='密码'){
		var pass_tel=document.getElementById("pass_tel").value;
		var pass=document.getElementById("pass").value;
		if(!myreg.test(pass_tel)){
			alert("请正确填写手机号码");
			document.getElementById("pass_tel").focus();
		}else if(pass==''){
			alert("请正确填写密码");
			document.getElementById("pass").focus();
		}else{
			var url="login_success_ok.php";
			var data={"pass_tel":pass_tel,"pass":pass,"mess":mess};
			var success=function(response){
				if(response.errno==1){
					alert("登录成功");
					window.location.href="personcenter.php";
				}else if(response.errno==2){
					alert("密码不正确，请重新输入");
				}else if(response.errno==3){
					alert("此手机号码没有注册");
				}else{
					alert("系统出错了，请反馈");
				}
			}
			$.post(url,data,success,"json");
		}
		}else{
			var tel=document.getElementById("tel").value;
			var code=document.getElementById("code").value;
			if(!myreg.test(tel)){
				alert("请正确填写你的手机号码");
				document.getElementById("tel").focus();
			}else if(code==''){
				alert("请填写你的手机验证码");
				document.getElementById("code").focus();
			}else{
				var url="login_success_ok.php";
			var data={"tel":tel,"code":code,"mess":mess};
			var success=function(response){
				if(response.errno==2){
					alert("登录成功");
					window.location.href="personcenter.php";
				}else if(response.errno==1){
					alert("验证码不正确，请重新输入");
				}else if(response.errno==3){
					alert("此手机号码没有注册");
				}else{
					alert("系统出错了，请反馈");
				}
			}
			$.post(url,data,success,"json");
			}
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