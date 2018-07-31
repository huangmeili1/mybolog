<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>找回密码</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php

?>
<div class="container" style="width: 100%;">
	<?php include("top.php"); ?>
		<div class="row" style="width: 80%;margin: 0 auto;">
			<div class="col-md-12">
				<ol class="breadcrumb" style="background-color: white;">
				    <li><a href="index.php">首页</a></li>
				    <li><a href="login.php">登录</a></li>
				    <li class="active">找回密码</li>
				</ol>
			</div>
		</div>
		<div class="row" style="width: 80%;margin:0 auto;">
			<div class="col-md-12">
				<div style="height: 400px;width: 60%;margin: 0 auto;background-color:#F1AAA6;box-shadow:5px 5px #888888;border-radius: 10px;">
					<div class="row">
						<div class="col-md-12" style="text-align: center;">
							<h2 style="color: #eee;">找回密码</h2>
							<form class="form-horizontal" role="form">
								<div class="form-group">
								    <label for="firstname" class="col-sm-2 control-label">注册手机</label>
								    <div class="col-sm-10" style="width: 500px;">
								      <input onchange="check_tel()" style="height: 50px;" id="tel" type="text" required="required" class="form-control" placeholder="请输入注册时手机">
								    </div>
								</div>
								<div id="show_tel" style="text-align: left;">
									
								</div>
								<div class="form-group">
								    <div class="col-sm-10">
								      <button onclick="find_pass()" style="width: 100px;height: 40px;" type="button" class="btn btn-default">提交</button>
								    </div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="send" class="row" style="display: none;">
			<div class="col-md-12" style="width: 100%;margin: 0 auto;padding: 0;height: 100%;top: 0;left: 0;background:rgba(0,0,0,0.8);position: fixed;z-index: 2;">
				<div class="row" style="width: 50%;height: 500px;background-color: white;margin: 0 auto;margin-top: 130px;">
					<div style="text-align: center;">
						<h2>找回密码</h2>
						<form class="form-horizontal" role="form" style="margin-left: 120px;">
							<div class="form-group">
							    <label for="firstname" class="col-sm-2 control-label">验证码:</label>
									<div class="input-group" style="width: 380px;">
										<input type="hidden" name="phone" id="phone" />
										<input type="hidden" name="user_id" id="user_id" />
							            <input name="code" id="code" required="required" disabled="disabled" style="width: 300px;height: 50px;" type="text" class="form-control" placeholder="短信验证码">
											<span class="input-group-btn" style="height: 50px;">
						                      <button id="btnSendCode" name="tj" value="tj" onclick="sendMessage()" class="btn btn-default" type="button" style="width: 150px;height: 50px;background-color: orange;color: white;border: 1px solid #e43a3d;">发送手机验证码</button>
						                   </span>
							        </div>
							 </div>
							 <div id="show_erro"></div>
							 <button id="submit1" onclick="finall_check()" type="button" class="btn btn-danger" style="width: 100px;height: 50px;">提交</button>
						</form>
					</div>
				</div>
			</div>
		</div>
</div>
<script type="text/javascript" src="../js/index.js"></script>
<script type="text/javascript">
function finall_check(){
	var code=document.getElementById("code").value;
	var user=document.getElementById("user_id").value;
	if(code==''){
		alert("请输入验证码");
		document.getElementById("code").focus();
	}else{
	var url="check_pass_success.php";
	var data={"code":code};
	var success=function(response){
		if(response.errno==0){
			alert("验证码正确");
			window.location.href="check_person_pass.php?user_id="+user;
		}else if(response.errno==1){
			var show_erro=document.getElementById("show_erro");
			show_erro.innerText='验证码错误，请重新输入';
		}
	}
	$.post(url,data,success,"json");	
	}
}


var InterValObj; //timer变量，控制时间  
var count =90; //间隔函数，1秒执行  
var curCount;//当前剩余秒数  
function sendMessage() {  
  　curCount = count;  
　　//设置button效果，开始计时  
     document.getElementById("btnSendCode").setAttribute("disabled","disabled");
     document.getElementById("btnSendCode").innerText="请在" + curCount + "秒内输入验证码";
     InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次  
     var tel=document.getElementById("tel");
     var phone=tel.value;
　　  //向后台发送处理数据  
     var tel=document.getElementById("tel");
    	var phone=tel.value;
    	var url="check_send.php";
    	var data={"phone":phone};
    	var success=function(curl){
    		if(curl.Code=='OK'){
    			alert('发送成功');
    			document.getElementById("code").removeAttribute("disabled");
    			document.getElementById("submit1").style.display='block';
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
    function check_tel(){
    	var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
    	var tel=document.getElementById("tel");
    	var t=tel.value;
    	if(tel.value==''){
    		document.getElementById("tel").focus();
    	}else if(!myreg.test(t)){
    		$("#show_tel").html("<span class='glyphicon glyphicon-exclamation-sign' style='color:red;'></span><span style='color:red;'>手机号码格式不正确</span>");
    	}else{
    		$("#show_tel").html("<span class='glyphicon glyphicon-exclamation-sign' style='color:blue;'></span><span style='color:blue;'>手机号码格式正确</span>");
    	}
    }
	function find_pass(){
		var tel=document.getElementById("tel");
		if(tel.value==''){
			document.getElementById("tel").focus();
		}else{
			var myreg =/^[1][3,4,5,7,8][0-9]{9}$/;
			var t=tel.value;
			if(!myreg.test(t)){
				$("#show_tel").html("<span class='glyphicon glyphicon-exclamation-sign' style='color:red;'></span><span style='color:red;'>手机号码格式不正确</span>");
			}else{
				var url="check_pass.php";
				var data={"tel":t};
				var success=function(response){
					if(response.errno==3){
						$("#show_tel").html("<span class='glyphicon glyphicon-exclamation-sign' style='color:red;'></span><span style='color:red;'>手机不存在</span>");
					}else if(response.errno==2){
						var phone=document.getElementById("phone");
						phone.value=t;
						var user_id=document.getElementById("user_id");
						user_id.value=response.user_id;
						var send=document.getElementById("send");
						send.style.display='block';
					}
				}
			}
			$.post(url,data,success,"json");
			 
		}
	}
</script>