<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/reg.ico" />
<title>登录中心</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta charset="utf-8" />
<div class="row" style="background: rgba(0,0,0,0.8);position: fixed;width: 100%;height: 100%;top: 0;left: 0;margin: 0 auto;padding: 0;">
			<div class="col-md-12">
				<div class="row" style="margin-top: 150px;">
					<div class="col-md-12" style="height: 420px;padding: 0;margin: 0;">
						<div class="panel panel-default" style="width: 35%;margin: 0 auto;margin-top: 25px;padding: 0;background-color: white;">
						    <div class="panel-heading" style="background-color: white;">
						        <h3 class="panel-title" style="text-align: center;">
						          	 管理员找回密码
						        </h3>
						    </div>
						    <div class="panel-body">
							    <form class="form-horizontal" method="post" role="form">
							     <div class="form-group">
								    <label for="firstname" class="col-sm-2 control-label">管理员号</label>
								    <div class="col-sm-10">
								      <input type="text" required="required" style="height: 50px;" class="form-control" name="find_mo" id="find_mo" value="<?php echo @$_POST['find_mo'] ?>" placeholder="请输入管理员号">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="firstname" class="col-sm-2 control-label">手机号码</label>
								    <div class="col-sm-10">
								      <input type="text" required="required" style="height: 50px;" class="form-control" name="find_tel" id="find_tel" value="<?php echo @$_POST['find_tel'] ?>" placeholder="请输入管理员手机号码">
								    </div>
								  </div>
								 <div class="form-group">
									<label for="firstname" class="col-sm-2 control-label">验证码</label>
									<div class="input-group" style="width: 320px;">
									<input name="find_code" required="required" id="find_code" required="required" disabled="disabled" style="width: 210px;height: 50px;" type="text" class="form-control" placeholder="短信验证码">
									<span class="input-group-btn" style="height: 50px;">
									    <button id="btnSendCode" name="tj" value="tj" onclick="sendMessage()" class="btn btn-default" type="button" style="width: 150px;height: 50px;background-color: orange;color: white;border: 1px solid #e43a3d;">发送手机验证码</button>
									</span>
								    </div>
								 </div>
								</form>
								 <div class="form-group">
								    <div class="col-sm-offset-2 col-sm-10">
								      <button type="button" onclick="find_admin()" name="tj" class="btn btn-default">找回</button>
								    </div>
								 </div>
								 <div class="form-group" >
								    <div class="col-sm-offset-2 col-sm-10">
								      <a href="managelogin.php" style="margin-top: 40px;" type="button" name="tj">返回登录</a>
								    </div>
								 </div>
						    </div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		

<script type="text/javascript">
function find_admin(){
	var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
	var tel=document.getElementById("find_tel").value;
	var find_mo=document.getElementById("find_mo").value;
	var find_code=document.getElementById("find_code").value;
	if(find_mo==''){
		alert("请填写你的管理员编号");
		document.getElementById("find_mo").focus();
	}else if(!myreg.test(tel)){
		alert("请正确填写你的手机号码");
		document.getElementById("find_tel").focus();
	}else if(find_code==''){
		alert("请填写手机验证码");
		document.getElementById("find_code").focus();
	}else{
		var url="find_admin_pass_ok.php";
		var data={"mo":find_mo,"tel":tel,"code":find_code};
		var success=function(response){
			if(response.errno==0){
				alert("验证码不正确");
				ocument.getElementById("find_code").focus();
			}else if(response.errno==1){
				alert("管理员编号不正确");
				document.getElementById("find_mo").focus();
			}else if(response.errno==2){
				alert("找回密码成功，你的密码是："+response.pass);
				window.location.href='managelogin.php';
			}else if(response.errno==3){
				alert("你的手机号码不正确");
				document.getElementById("find_code").value='';
				document.getElementById("find_code").setAttribute("disabled",'disabled');
				document.getElementById("find_tel").removeAttribute('readonly');
				document.getElementById("find_tel").focus();
			}
		}
		$.post(url,data,success,"json");
	}
}

var InterValObj; //timer变量，控制时间  
var count =90; //间隔函数，1秒执行  
var curCount;//当前剩余秒数  
function sendMessage(){  
	var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
	var tel=document.getElementById("find_tel");
     var phone=tel.value;
     if(!myreg.test(phone)){
     	alert("请正确输入你的手机号码");
     	document.getElementById("find_tel").focus();
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
	    			document.getElementById("find_code").removeAttribute("disabled");
	    			document.getElementById("find_tel").setAttribute('readonly','readonly');
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