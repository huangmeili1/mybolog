<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>订单查询</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php

?>
<div class="container" style="width: 100%;">
	<?php
		include("top.php");
		?>
			<div class="row" style="width: 90%;margin: 0 auto;">
				<div class="col-md-12" style="padding: 0;margin: 0;background-color: white;">
					<ol class="breadcrumb" style="background-color: white;">
					    <li><a href="index.php">首页</a></li>
					    <li><a href="flower.php">鲜花</a></li>
					    <li class="active">订单查询</li>
					</ol>
				</div>
			</div>
			<div class="row" style="width: 80%;margin: 0 auto;">
				<div class="col-md-12">
					<div class="panel panel-default">
					    <div class="panel-heading">
					        订单查询
					    </div>
					    <div class="panel-body" style="padding: 0;margin: 0;">
					        <h3 style="text-align: center;">
					        	<b style="color: gray;">ORDER QUERY</b>
					        </h3>
					        <table class="table table-hover" style="width: 80%;margin: 0 auto;">
					        	<caption style="text-align: center;">查询订单处理状态、详细内容</caption>
					        	<tbody>
					        		<tr>
					        			<td></td>
					        			<td>
					        				提示：如果您是注册会员，请点击
					        				<?php
												if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
													?>
													<a href="personcenter.php">个人中心</a>
													<?php
											?>
											<?php
											 }else{
											 	?>
											 	<a href="login.php">
											 		个人中心
											 	</a>
											 	<?php
											 }
											 ?>
					        				
					        				查询订单信息。
					        			</td>
					        		</tr>
					        		<tr>
						        		<td>
						        			订单号：
						        		</td>
						        		<td>
						        			<input class="form-control" onchange="check('订单号',this.value)" style="width: 360px;height: 50px;" type="text" name="book_id" id="book_id" placeholder="订单号" />
						        			<div id="show_book"></div>
						        		</td>
					        		</tr>
					        		<tr>
					        			<td>订购人手机</td>
					        			<td>
							        		<div class="form-group">
												<div class="input-group" style="width: 320px;">
									            <input name="user_tel" id="user_tel" onchange="check('手机号',this.value)" required="required" style="width: 360px;height: 50px;" type="text" class="form-control" placeholder="手机号码">
									        	</div>
											</div>
											<div id="show_tel"></div>
					        			</td>
					        		</tr>
					        		<tr>
					        			<td>手机验证码</td>
					        			<td>
					        				<div class="input-group" style="width: 320px;">
									           		<input class="form-control" style="width: 210px;height: 50px;" type="text" disabled="disabled" required="required" name="code" id="code">
													<span class="input-group-btn" style="height: 50px;">
								                      <button id="btnSendCode" name="tj" value="tj" onclick="sendMessage()" class="btn btn-default" type="button" style="width: 150px;height: 50px;background-color: orange;color: white;border: 1px solid #e43a3d;">发送手机验证码</button>
								                   </span>
									        </div>
					        				</td>
					        				<div id="show_code"></div>
					        		</tr>
					        		<tr>
					        			<td colspan="2">
					        				<button onclick="select_book()" id="code_code" style="margin-left: 200px;" class="btn btn-danger btn-lg" type="submit">发送查询</button>
					        			</td>
					        		</tr>
					        	</tbody>
					        </table>
					    </div>
					</div>
				</div>
				
			</div>
			<div class="row" style="width: 80%;margin: 0 auto;margin-bottom: 300px;">
				<div class="col-md-12" id="show_book_message">
					
				</div>
			</div>
			
			<?php
				include("footer.php");
				?>
</div>
<script type="text/javascript" src="../js/index.js"></script>
<script type="text/javascript">
	function select_book(){
		var tel=document.getElementById("user_tel").value;
		var book_id=document.getElementById("book_id").value;
		var code=document.getElementById("code").value;
		var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
		if(book_id==''){
			alert("请填写订单号");
			document.getElementById("book_id").focus();
		}else if(!myreg.test(tel)){
			alert("请正确填写手机号码");
			document.getElementById("user_tel").focus();
		}else if(code==''){
			alert("请正确填写验证码");
			document.getElementById("code").focus();
		}else{
			document.getElementById("user_tel").setAttribute('disabled','disabled');
			var url="select_book.php";
			var data={"tel":tel,"book_id":book_id,"code":code};
			var success=function(response){
				$("#show_book_message").html(response);
			}
			$.post(url,data,success,"html");
		}
	}
	function check(mess,b){
		if(mess!=''){
			var url="check_book.php";
			var data={"b":b,'mess':mess};
			var success=function(response){
				if(response.errno==0){
					$("#show_book").html("<span style='color: green;'>订单号正确</span>");
				}else if(response.errno==1){
					$("#show_book").html("<span style='color: red;'>订单号错误，没有此订单号</span>");
				}else if(response.errno==2){
					$("#show_tel").html("<span style='color: green;'>手机号正确</span>");
				}else if(response.errno==3){
					$("#show_tel").html("<span style='color: red;'>手机号错误，没有此手机号</span>");
				}else{
					alert("对不起，系统出错了，请稍后再试");
				}
			}
			$.post(url,data,success,"json");
		}
	}
</script>
<script type="text/javascript">
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