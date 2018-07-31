<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>管理中心</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
	session_start();
//	echo $_SESSION['Login_code'];
	include_once("../conn/dataconnection.php");
	if(@$_SESSION['admin_id']!=''&&@$_SESSION['type']!=''&&@$_SESSION['admin_name']!=''){
		@$admin_id=$_SESSION['admin_id'];
		@$sql=mysql_query("select * from admin where admin_id='$admin_id'");
		@$sql_num=mysql_num_rows($sql);
		?>
<div style="margin: 0 auto;text-align: center;width: 100%;height: 100%;">
	<?php
		include("top1.php");
		?>
	<div id="aa" style="margin: 0 auto;text-align: center;width: 100%;height: 80%;">
	<div style="margin: 0 auto;text-align: center;float: left;width: 15%;height: 100%;">
		<?php  
			include("left.php");
			?>
	</div>
	<div id="aa" style="margin: 0 auto;text-align: center;height: 100%;width: 85%;float: right;">
		<?php
			if($sql_num<=0){
			?>
			<h4 style="text-align: center;">暂时无法查看，请稍后再试</h4>
			<?php
		}else{
			@$admin=mysql_fetch_array($sql);
			?>
		<div class="row" id="update" onsubmit="return updates()" style="display: block;">
				<div class="col-md-12">
					<form method="post" action="#">
					<table class="table" style="width: 50%;margin: 0 auto;">
						<caption style="text-align: center;font-size: 24px;">修改信息</caption>
						<input type="hidden" name="old_admin" id="old_admin" value="<?php echo $admin['admin_tel']; ?>" />
						<tr>
							<td>我的编号</td>
							<td><?php echo $admin['admin_id'] ?></td>
						</tr>
						<tr>
							<td>我的姓名</td>
							<td><?php echo $admin['admin_name'] ?></td>
						</tr>
						<tr>
							<td>我的电话号码</td>
							<td><input class="form-control" id="admin_tel" required="required" name="admin_tel" onchange="check_tel(this.value)" type="text" value="<?php echo $admin['admin_tel'] ?>" />
								<input type="hidden" name="rel_tel" id="rel_tel" />
								<div id="show_code" style="margin-top: 30px;">
										<div class="input-group" style="width: 320px;">
							            <input name="code" id="code" required="required" style="width: 210px;height: 50px;" type="text" value="<?php echo @$_POST['code']; ?>" class="form-control" placeholder="短信验证码">
											<span class="input-group-btn" style="height: 50px;">
						                      <button id="btnSendCode" name="tj" value="tj" onclick="sendMessage()" class="btn btn-default" type="button" style="width: 150px;height: 50px;background-color: orange;color: white;border: 1px solid #e43a3d;">发送手机验证码</button>
						                   </span>
							        	</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>我的地址</td>
							<td><input type="text" id="admin_add" name="admin_add" required="required" class="form-control" value="<?php echo $admin['admin_addr'] ?>" /></td>
						</tr>
						<tr>
							<td>我的地位</td>
							<td><?php echo $admin['admin_type']; ?></td>
						</tr>
						<tr>
							<td colspan="2" style="text-align: center;">
								<button name="tj" class="btn btn-danger btn-lg"  type="submit">修改</button>
							</td>
						</tr>
						<input type="hidden" id="bo" />
					</table>
					</form>
				</div>
			</div>
			<?php } ?>
				
				<?php
					if(isset($_POST['tj'])){
						@$code=$_POST['code'];
						include("../conn/dataconnection.php");
						@$admin_id=$_SESSION['admin_id'];
						@$admin_add=$_POST['admin_add'];
						@$admin_tel=$_POST['admin_tel'];
						@$old_code=$_SESSION['Login_code'];
						@$se=mysql_query("select * from admin where admin_id='$admin_id'");
						@$see=mysql_fetch_array($se);
						@$old_tel=$see['admin_tel'];
						if($code!=$old_code){
							echo "<script>alert('手机验证码错误');</script>";
						}else if($old_tel==$admin_tel){
							$sql=mysql_query("update admin set admin_tel='$admin_tel',admin_addr='$admin_add' where admin_id='$admin_id'");
							@$sql_num=mysql_affected_rows();
							if($sql_num>0){
								echo "<script>alert('修改成功');window.location.href='adminmess.php';</script>";
							}else{
								echo "<script>alert('你没有做任何修改');</script>";
							}
						}else{
							@$sqll=mysql_query("select * from admin where admin_tel='$admin_tel'");
							@$sqll_num=mysql_num_rows($sqll);
							if(@$sqll_num>0){
								echo "<script>alert('你所要修改的手机号码已经存在了，请重新填写');</script>";
							}else{
							$sql=mysql_query("update admin set admin_tel='$admin_tel',admin_addr='$admin_add' where admin_id='$admin_id'");
							@$sql_num=mysql_affected_rows();
							if($sql_num>0){
								echo "<script>alert('修改成功');window.location.href='adminmess.php';</script>";
							}else{
								echo "<script>alert('你没有做任何修改');</script>";
							}
							}
						}
					}
					?>
	</div>	
	</div>
	<div style="width: 100%;height: 10%;padding-top: 20px;"><h2>版权所有</h2></div>
	
</div>
<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>
	<script type="text/javascript">
		function updates(){
		var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
		var code=document.getElementById("code").value;
		var admin_add=document.getElementById("admin_add").value;
		var tel=document.getElementById("admin_tel").value;
		var old_admin=document.getElementById("old_admin").value;
		if(!myreg.test(tel)){
			alert("请正确填写你的手机号码");
			document.getElementById("admin_tel").focus();
			return false;
		}else if(code==''){
			alert("请填写验证码");
			document.getElementById("code").focus();
			return false;
		}else if(admin_add==''){
			alert("请正确填写你的地址");
			document.getElementById("admin_add").focus();
			return false;
		}else{
			return true;
		}
	}
	</script>
	<script type="text/javascript">	
	

	function check_tel(tel){
		var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
		if(!myreg.test(tel)){
			alert("请正确填写你的手机号码");
			document.getElementById("admin_tel").focus();
		}else{
			var url="check_admin_tel.php";
			var data={"tel":tel};
			var success=function(response){
				if(response.errno==0){
					alert("你要修改的手机号码已经存在了,请重新填写");
					document.getElementById("admin_tel").focus();
				}else if(response.errno==1){
//					document.getElementById("show_code").style.display='block';
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
	var tel=document.getElementById("admin_tel");
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
//	    			document.getElementById("admin_tel").setAttribute('disabled','disabled');
//	    			document.getElementById("rel_tel").setAttribute('value',phone);
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