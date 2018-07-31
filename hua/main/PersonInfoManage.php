<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>个人信息</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
	session_start();
	if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
		include("../conn/dataconnection.php");
		@$user_id=$_SESSION['user_id'];
		@$sql=mysql_query("select * from user where user_id='$user_id'");
		@$sql_n=mysql_fetch_array($sql);
?>
<div class="container" style="width: 100%;">
	<?php include("top.php") ?>
	<div class="row" style="width: 90%;margin: 0 auto;">
		<div class="col-md-12" style="padding: 0;margin: 0;background-color: white;">
			<ol class="breadcrumb" style="background-color: white;">
			    <li><a href="index.php">首页</a></li>
			    <li><a href="flower.php">鲜花</a></li>
			    <li class="active">个人中心</li>
			</ol>
		</div>
	</div>
	<div class="row" style="width: 90%;margin: 0 auto;margin-bottom: 100px;">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3" style="height: auto;border: 1px;background: white;margin-bottom: 100px;">
					
					<?php include("personleft.php"); ?>
					
				</div>
				<div class="col-md-9">
					<div class="panel panel-default">
					    <div class="panel-heading">
					        个人信息
					    </div>
					    <div class="panel-body">
							<form id="ajaxFrm" class="form-horizontal" role="form" method="post">
							  <div class="form-group">
							    <label for="firstname" class="col-sm-2 control-label">真实姓名</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" id="realname" name="realname" value="<?php echo $sql_n['realname'] ?>" placeholder="请输入真实姓名">
							    </div>
							  </div>
							  <div class="form-group">
							    <label for="lastname" class="col-sm-2 control-label">性别</label>
							    <div class="col-sm-10">
							    	<?php
							    		if($sql_n['sex']=='女'){
							    			?>
							    			<input type="radio" checked="checked" name="sex" value="女" />女
							    			<input style="margin-left: 20px;" type="radio" name="sex" value="男" />男
							    			<?php
							    		}else if($sql_n['sex']=='男'){
							    			?>
							    			<input style="margin-left: 20px;" checked="checked" type="radio" name="sex" value="男" />男
							    			<input style="margin-left: 20px;" type="radio" name="sex" value="女" />女
							    			<?php
							    		}else{
							    			?>
							    			<input style="margin-left: 20px;" type="radio" name="sex" value="女" />女
							    			<input style="margin-left: 20px;" type="radio" name="sex" value="男" />男
							    			<?php
							    		}
							    		?>
							      
							      
							    </div>
							  </div>
							  <div class="form-group">
							    <label for="firstname" class="col-sm-2 control-label">邮箱</label>
							    <div class="col-sm-10">
							      <input type="email" class="form-control" id="email" name="email" value="<?php echo $sql_n['email'] ?>" placeholder="请输入邮箱">
							    </div>
							  </div>
							  <input type="hidden" id="old_user_tel" value="<?php echo $sql_n['user_tel'] ?>" />
							  <div class="form-group">
							    <label for="firstname" class="col-sm-2 control-label">手机号码</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" id="user_tel" name="user_tel" value="<?php echo $sql_n['user_tel'] ?>" placeholder="请输入手机号码">
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
							   
							  <div class="form-group">
							    <div class="col-sm-offset-2 col-sm-10">
							      <button name="tj" onclick="check_tel()" type="button" class="btn btn-default">提交</button>
							    </div>
							  </div>
							</form>
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
	<script type="text/javascript">
		function check_tel(){
			var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
			var old_user_tel=document.getElementById("old_user_tel").value;
			var user_tel=document.getElementById("user_tel").value;
			if(!myreg.test(user_tel)){
				alert("请正确输入手机号码");
				document.getElementById("user_tel").focus();
				return false;
			}else{
				
			if(old_user_tel!=user_tel){
			var code=document.getElementById("code").value;
			if(code==''){
					alert("你的手机号码已经改变，请获取手机验证码，然后输入验证码");
				}else{
					$.ajax({
					
					cache: false,
					
					type: "POST",
					
					url:"upate_person_message.php",	//把表单数据发送到ajax.jsp
					
					data:$('#ajaxFrm').serialize(),	//要发送的是ajaxFrm表单中的数据
					
					async: false,
					dataType: "json",
					
					error: function(request) {
					
					alert("发送请求失败！");
					
					},
					
					success: function(response) {

					    if(response.errno==2){
					    	alert("验证码不正确，请重新输入");
					    	document.getElementById("code").focus();
					    }else if(response.errno==3){
					    	alert("手机号码已经存在,请重新输入");
					    	document.getElementById("user_tel").removeAttribute('readonly');
					    	document.getElementById("user_tel").focus();
					    	document.getElementById("code").value='';
					    	document.getElementById("code").setAttribute('disabled','disabled');
					    }else if(response.errno==4){
					    	alert("更新成功");
					    	location.reload();
					    }else{
					    	alert("你没有做任何更新11");
					    }
						//将返回的结果显示到ajaxDiv中
					
					}
					
					});
				}
			}else{
					$.ajax({
					
					cache: false,
					
					type: "POST",
					
					url:"upate_person_message.php",	//把表单数据发送到ajax.jsp
					
					data:$('#ajaxFrm').serialize(),	//要发送的是ajaxFrm表单中的数据
					
					async: false,
					dataType: "json",
					
					error: function(request) {
					
					alert("发送请求失败！");
					
					},
					
					success: function(response) {
					if(response.errno==0){
						alert("更新成功");
						location.reload();
					}else{
						alert("你没有做任何更新");
						location.reload();
					}
//					$("#ajaxDiv").html(data);	//将返回的结果显示到ajaxDiv中
					
					}
					
					});
			}
				
				
			}
			
		}
		
		
var InterValObj; //timer变量，控制时间  
var count =90; //间隔函数，1秒执行  
var curCount;//当前剩余秒数  
function sendMessage(){  
	var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
	var tel=document.getElementById("user_tel");
     var phone=tel.value;
     if(!myreg.test(phone)){
     	alert("请正确输入你的手机号码");
     	document.getElementById("user_tel").focus();
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
	    			document.getElementById("user_tel").setAttribute('readonly','readonly');
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