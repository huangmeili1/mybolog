<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/reg.ico" />
<title>注册中心</title>
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
	include("../conn/dataconnection.php");
?>
<div class="container" style="width: 100%;">
	<div class="row" style="margin-top: 50px;">
		<div class="col-md-12" style="background-color: transparent;">
			<div class="thumbnail" style="background: transparent;padding: 0;margin: 0;border: 0;">
				<img src="../img/title.png" />
			</div>
		</div>
	</div>
	<div class="row" style="width: 100%;margin: 0 auto;padding: 0;">
		<div class="col-md-12" style="height: auto;padding: 0;margin: 0;">
			<div class="panel panel-default" style="width: 40%;margin: 0 auto;margin-top: 25px;padding: 0;background-color: white;">
			    <div class="panel-heading" style="background-color: white;">
			        <h3 class="panel-title" style="text-align: center;">
			           用户注册
			        </h3>
			    </div>
			    <div class="panel-body">
			        			<form class="form-horizontal" style="margin-left: 80px;width: 100%;" role="form" name="bb" method="post">
                					 <div class="form-group">
										<label for="firstname" class="col-sm-2 control-label">手机号码</label>
										<div class="col-sm-10 input-group">
											<span class="input-group-addon"><span style="font-size: 20px;" class="glyphicon glyphicon-calendar"></span></span>
											<input onchange="check_tel(this.value)" style="width: 300px;height: 50px;" type="text"  name="tel" id="tel" class="form-control" placeholder="请输入你的手机号码" required="required" value="<?php echo @$_POST['tel'] ?>">
										</div>
										<div id="show_tel"></div>
									</div>
									 <div class="form-group">
										<label for="firstname" class="col-sm-2 control-label">请输入密码</label>
										<div class="col-sm-10 input-group">
											<span class="input-group-addon"><span style="font-size: 20px;" class="glyphicon glyphicon-lock"></span></span>
											<input style="width: 300px;height: 50px;" type="password" name="pass" id="pass" class="form-control" value="<?php echo @$_POST['pass'] ?>" placeholder="请输入密码" required="required">
										</div>
									</div>
									<div class="form-group">
										<label for="firstname" class="col-sm-2 control-label">确认密码</label>
										<div class="col-sm-10 input-group">
											<span class="input-group-addon"><span style="font-size: 20px;" class="glyphicon glyphicon-lock"></span></span>
											<input style="width: 300px;height: 50px;" type="password" name="repass" id="repass" class="form-control" value="<?php echo @$_POST['repass'] ?>" placeholder="请输入确认密码" required="required">
										</div>
									</div>
									 <div class="form-group">
										<label for="firstname" class="col-sm-2 control-label">短信验证码</label>
										<div class="input-group" style="width: 320px;">
							            <input name="code" id="code" required="required" disabled="disabled" style="width: 210px;height: 50px;" type="text" class="form-control" placeholder="短信验证码">
											<span class="input-group-btn" style="height: 50px;">
						                      <button id="btnSendCode" name="tj" value="tj" onclick="sendMessage()" class="btn btn-default" type="button" style="width: 150px;height: 50px;background-color: orange;color: white;border: 1px solid #e43a3d;">发送手机验证码</button>
						                   </span>
							        </div>
									</div>
									<div class="form-group">
										<a class="btn btn-default" style="margin-left: 100px;" href="login.php">去登录</a>
									</div>
									<div class="form-group">
										<div class="col-sm-offset-2 col-sm-10">
											<button onclick="check_form()" style="width: 140px;" type="button" name="tj" class="btn btn-danger btn-lg">注册</button>
										</div>
									</div>
                </form>
			    </div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12" style="text-align: center;">
			<span style="font-size: 18px;"><a style="text-decoration: underline;color: white;" href="index.php">不注册了，继续购物<span class="glyphicon glyphicon-chevron-right"></span></a></span>
		</div>
	</div>
	
			<?php 
				?>
</div>
<script type="text/javascript">
function check_tel(tel){
	var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
	if(tel==''){
    	document.getElementById("tel").focus();
    }else if(!myreg.test(tel)){
    		$("#show_tel").html("<span class='glyphicon glyphicon-exclamation-sign' style='color:red;margin-left:130px'></span><span style='color:red;'>手机号码格式不正确</span>");
    	}else{
    		var url="check_tel.php";
    		var data={"tel":tel};
    		var success=function(resposne){
    			if(resposne.errno==1){
    				alert("该手机号码已经被注册");
    				$("#show_tel").html("<span class='glyphicon glyphicon-exclamation-sign' style='color:red;margin-left:130px'></span><span style='color:red;'>手机号码已经被注册</span>");
    				document.getElementById("btnSendCode").setAttribute("disabled","disabled");
    			}else{
    				document.getElementById("btnSendCode").removeAttribute("disabled");
    				$("#show_tel").html("<span class='glyphicon glyphicon-exclamation-sign' style='color:blue;margin-left:130px'></span><span style='color:blue;'>手机号码格式正确</span>");
    			}
    		}
    		
    	    $.post(url,data,success,"json");
    	}
}
function check_form(){
	var code=document.getElementById("code").value;
	var tel=document.getElementById("tel").value;
	var pass=document.getElementById("pass").value;
	var repass=document.getElementById("repass").value;
	var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
	if(!myreg.test(tel)){
		alert("你的手机号码格式不正确");
		document.getElementById("tel").focus();
		
	}else if(pass!=repass){
		alert("你的密码和确认密码不相同，请重新输入");
		
	}else if(code==''){
		alert("请输入你的手机验证码");
	}else{
		var url="red_success.php";
		var data={"tel":tel,"pass":pass,"code":code};
		var success=function(response){
			if(response.errno==0){//验证码不正确
				alert("验证码不正确,请重新输入");
				document.getElementById("code").removeAttribute("disabled");
				document.getElementById("code").focus();
			}else if(response.errno==1){//手机号码已经注册
				alert("手机号码已经注册了，请重新输入");
			}else if(response.errno==2){//注册成功
				alert("注册成功");
				window.location.href="personcenter.php";
			}else if(response.errno==3){//注册失败
				alert("注册失败，请稍后再试");
			}else{
				alert("系统出现问题了，请反馈");
			}
		}
		$.post(url,data,success,"json");
		
	}
}


var InterValObj; //timer变量，控制时间  
var count =90; //间隔函数，1秒执行  
var curCount;//当前剩余秒数  
function sendMessage() {  
	var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
	var tel=document.getElementById("tel");
     var phone=tel.value;
     var pass=document.getElementById("pass").value;
	var repass=document.getElementById("repass").value;
     if(!myreg.test(phone)){
     	alert("请正确输入你的手机号码");
     	document.getElementById("tel").focus();
     }else if((pass!=repass)||pass==''||repass==''){
     	alert("请正确输入你的密码和确认密码");
     }else{
	     curCount = count;  
	　　//设置button效果，开始计时  
	     document.getElementById("btnSendCode").setAttribute("disabled","disabled");
	     document.getElementById("btnSendCode").innerText="请在" + curCount + "秒内输入验证码";
	     InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次  
	　　  //向后台发送处理数据  
	    	var url="Reg_code.php";
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