<meta charset="utf-8" />
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
body a{
text-decoration: none;
color: gray;
}
body a:hover{
	color: orange;
	text-decoration: none;
}
body a:link{
	color: orange;
	text-decoration: none;
}
body a:visited{
	color: orange;
	text-decoration: none;
}
    /*
     三个div进行层叠，最下面的div有链接，中间的没有，起隔绝作用，最上面的是弹出框
     * */
</style>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    	<span style="font-size: 20px;">
							<span><a id="s1" style="color: orange;" href="#" onclick="shift('登录')">登录</a></span>
							<span><a id="s2" href="#" style="color: black;" onclick="shift('注册')">注册</a></span>
						</span>
                </h4>
            </div>
            <div class="modal-body">
                	<div class="container" style="width: 100%;">
                		<div class="row" style="width: 100%;">
                		<div class="col-xs-6 col-md-12">
                			<div id="login">
                				<span id="tel_pass" style="display: none;"><a onclick="check_code()" href="#">使用帐号密码登录</a></span>
			    				<span id="tel_code"><a onclick="check_pass()" href="#">使用手机验证码登录</a></span>
                				<form id="form_pass" class="form-horizontal" role="form" method="post" name="aa">
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
										<a  href="find_pass.php">忘记密码</a>
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
											<a  href="find_pass.php">忘记密码</a>
											</div>
										</div>
										<div class="form-group">
										<div class="col-sm-offset-2 col-sm-10" style="background-color: white;">
											<button style="width: 140px;" type="button" onclick="login('登录')" name="tj" class="btn btn-danger btn-lg">登录</button>
										</div>
									</div>
							        </form>
                				<div class="form-group" id="str" style="display: none;">
										<div class="col-sm-offset-1 col-sm-10" style="margin-left: 40px;display: block;">
											<button name="fu1" id="fu1" style="" type="submit" class="btn btn-danger btn-lg">非注册用户，直接购买</button>
										</div>
									</div>
								<div class="form-group" id="addcart" style="display: none;">
										<div class="col-sm-offset-1 col-sm-10" style="margin-left: 5px;display: block;">
											<button name="add" id="add" style="" type="submit" class="btn btn-danger btn-lg">非注册用户，直接加入购物车</button>
										</div>
									</div>
                			</div>
                			
                			<div id="reg" style="display: none;height: auto;width: 100%;">
                				<form style="width: 800px;" class="form-horizontal" role="form" name="bb" method="post" action="javascript:pppn('注册')" >
                					  <div class="form-group">
										<label for="firstname" class="col-sm-2 control-label">手机号码</label>
										<div class="col-sm-10 input-group">
											<span class="input-group-addon"><span style="font-size: 20px;" class="glyphicon glyphicon-calendar"></span></span>
											<input onchange="check_tel(this.value)" style="width: 300px;height: 50px;" type="text"  name="reg_tel" id="reg_tel" class="form-control" placeholder="请输入你的手机号码" required="required" value="<?php echo @$_POST['tel'] ?>">
										</div>
										<div id="show_tel"></div>
									</div>
									 <div class="form-group">
										<label for="firstname" class="col-sm-2 control-label">请输入密码</label>
										<div class="col-sm-10 input-group">
											<span class="input-group-addon"><span style="font-size: 20px;" class="glyphicon glyphicon-lock"></span></span>
											<input style="width: 300px;height: 50px;" type="password" name="reg_pass" id="reg_pass" class="form-control" value="<?php echo @$_POST['pass'] ?>" placeholder="请输入密码" required="required">
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
							            <input name="reg_code" id="reg_code" required="required" disabled="disabled" style="width: 210px;height: 50px;" type="text" class="form-control" placeholder="短信验证码">
											<span class="input-group-btn" style="height: 50px;">
						                      <button id="btnSend_Reg_Code" name="tj" value="tj" onclick="send_Reg_Message()" class="btn btn-default" type="button" style="width: 150px;height: 50px;background-color: orange;color: white;border: 1px solid #e43a3d;">发送手机验证码</button>
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
            </div>
            <div class="modal-footer">
                <button type="button" onclick="a()" class="btn btn-default" data-dismiss="modal">关闭
                </button>
            </div>
           </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<script type="text/javascript" src="../easyui/jquery.min.js"></script>
<script>
function shift(mess){
//	alert(mess);
	if(mess=='登录'){
		 document.getElementById("login").style.display="";
		 document.getElementById("reg").style.display="none";
		 document.getElementById("s1").style.color="orange";
		 document.getElementById("s2").style.color="gray";
	}else{
		document.getElementById("reg").style.display="";
		document.getElementById("login").style.display="none";
		document.getElementById("s2").style.color="orange";
		document.getElementById("s1").style.color="gray";
	}
}
function check_tel(tel){
	var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
	if(tel==''){
    	document.getElementById("reg_tel").focus();
    }else if(!myreg.test(tel)){
	$("#show_tel").html("<span class='glyphicon glyphicon-exclamation-sign' style='color:red;margin-left:130px'></span><span style='color:red;'>手机号码格式不正确</span>");
    	}else{
    		var url="check_tel.php";
    		var data={"tel":tel};
    		var success=function(resposne){
    			if(resposne.errno==1){
    				alert("该手机号码已经被注册");
    				$("#show_tel").html("<span class='glyphicon glyphicon-exclamation-sign' style='color:red;margin-left:130px'></span><span style='color:red;'>手机号码已经被注册</span>");
    				document.getElementById("btnSend_Reg_Code").setAttribute("disabled","disabled");
    			}else{
    				document.getElementById("btnSend_Reg_Code").removeAttribute("disabled");
    				$("#show_tel").html("<span class='glyphicon glyphicon-exclamation-sign' style='color:blue;margin-left:130px'></span><span style='color:blue;'>手机号码格式正确</span>");
    			}
    		}
    		
    	    $.post(url,data,success,"json");
    	}
}
var reg_InterValObj; //timer变量，控制时间  
var reg_count =90; //间隔函数，1秒执行  
var reg_curCount;//当前剩余秒数  
function send_Reg_Message(){  
	var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
	var tel=document.getElementById("reg_tel");
     var phone=tel.value;
     var pass=document.getElementById("reg_pass").value;
	var repass=document.getElementById("repass").value;
     if(!myreg.test(phone)){
     	alert("请正确输入你的手机号码");
     	document.getElementById("reg_tel").focus();
     }else if((pass!=repass)||pass==''||repass==''){
     	alert("请正确输入你的密码和确认密码");
     }else{
	     reg_curCount = reg_count;  
	　　//设置button效果，开始计时  
	     document.getElementById("btnSend_Reg_Code").setAttribute("disabled","disabled");
	     document.getElementById("btnSend_Reg_Code").innerText="请在" + reg_curCount + "秒内输入验证码";
	     reg_InterValObj=window.setInterval(SetRemainTime2, 1000); //启动计时器，1秒执行一次  
	　　  //向后台发送处理数据  
	    	var url="Reg_code.php";
	    	var data={"phone":phone};
	    	var success=function(curl){
	    		if(curl.Code=='OK'){
	    			alert('验证码发送成功');
	    			document.getElementById("reg_code").removeAttribute("disabled");
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
function SetRemainTime2() {  
//	        alert(reg_curCount);
            if (reg_curCount == 0) {                  
                window.clearInterval(reg_InterValObj);//停止计时器  
                document.getElementById("btnSend_Reg_Code").removeAttribute("disabled");//启用按钮  
               document.getElementById("btnSend_Reg_Code").innerText="重新发送验证码";  
            }  
            else {  
                reg_curCount--;  
                document.getElementById("btnSend_Reg_Code").innerText="请在" + reg_curCount + "秒内输入验证码";
            }  
       }    
function check_form(){
	var code=document.getElementById("reg_code").value;
	var tel=document.getElementById("reg_tel").value;
	var pass=document.getElementById("reg_pass").value;
	var repass=document.getElementById("repass").value;
	var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
	if(!myreg.test(tel)){
		alert("你的手机号码格式不正确");
		document.getElementById("reg_tel").focus();
		
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
				document.getElementById("reg_code").removeAttribute("disabled");
				document.getElementById("reg_code").focus();
			}else if(response.errno==1){//手机号码已经注册
				alert("手机号码已经注册了，请重新输入");
			}else if(response.errno==2){//注册成功
				alert("注册成功");
				location.reload();
			}else if(response.errno==3){//注册失败
				alert("注册失败，请稍后再试");
			}else{
				alert("系统出现问题了，请反馈");
			}
		}
		$.post(url,data,success,"json");
		
	}
}
function openL(good_id){//非注册用户，直接购买
	var num=mrof.nums.value;
	var str=document.getElementById("str");
	str.style.display='block';
	var oBtn = document.getElementById('fu1');
   oBtn.onclick = function(){
   		window.location.href="Order.php?goods="+good_id+'&nums='+num+'&tj=tj';
    };
	
}
</script>

<script type="text/javascript">
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
					window.location.reload();
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
					window.location.reload();
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
//			alert(curCount); 
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
	
	
	function pppn(mess){
		if(mess=='登录'){
		var mo=aa.mo.value;
	    var pass=aa.pass.value;
	    var code=aa.code.value;
	  	var data ={"mo":mo,"pass":pass,"code":code,"mess":mess};
	  	var success=function(response){
	  		 if(response.errno==1){
				alert('验证码错误');
			}else if(response.errno==2){
				alert('登录失败，请检查密码和编号是否正确');
			}else if(response.errno==0){
				alert('登录成功');
				window.location.reload();
//				alert('登录成功');
//			$("#login").html("<h3>登录成功,你可以对商品进行收藏或加入购物车<h3><a href='#'>查看收藏</a><h3><h3><a href='cart.php'>查看购物车</a><h3></h3>");
			
				
			}
	  	}
		}else{
		var id=bb.id.value;
		var names=bb.names.value;
		var pass=bb.passs.value;
		var realname=bb.realname.value;
		var tel=bb.tel.value;
		var sex=bb.sex.value;
		var data ={"id":id,"names":names,"pass":pass,"realname":realname,"tel":tel,"sex":sex,"mess":mess};
	  	var success=function(response){
	  		 if(response.errno==1){
				alert('手机号码格式不正确');
			}else if(response.errno==2){
				alert('用户编号已经存在');
			}else if(response.errno==0){
				alert('注册成功');
				window.location.reload();
//				$("#login").html("<h3>注册成功,你可以对商品进行收藏或加入购物车<h3><a href='#'>查看收藏</a><h3><h3><a href='cart.php'>查看购物车</a><h3></h3>")
			}else if(response.errno==3){
				alert('注册失败，请稍后再试');
			}
	  	}
		}
		var url='checklogin.php';
		$.post(url,data,success,"json");
		
	}
	function a(){
	var str=document.getElementById("str");
	str.style.display='none';
	window.location.reload();
}
</script>
