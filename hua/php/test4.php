<meta charset="utf-8" />
<style type="text/css">
body a{
text-decoration: none;
color: gray;
}
body a:hover{
	color: orange;
}
	#win{
		box-shadow: 2px 2px 10px 10px;
	}
	 .bg
    {
        background-color: #666;
        width: 100%;
        height: 100%;
        left: 0;
        top: 0;
        filter: alpha(opacity=50);
        opacity: 0.5;/*透明度*/
        z-index: 1;
        position: fixed !important; /*FF IE7*/
        position: absolute;
      	 _top: expression(eval(document.compatMode && document.compatMode=='CSS1Compat') ? 
         documentElement.scrollTop + (document.documentElement.clientHeight-this.offsetHeight)/2 :/*IE6*/ 
         document.body.scrollTop + (document.body.clientHeight - this.clientHeight)/2); /*IE5 IE5.5*/
    }
    /*
     三个div进行层叠，最下面的div有链接，中间的没有，起隔绝作用，最上面的是弹出框
     * */
</style>
<div id="win" style="z-index:101;display:none; POSITION:fixed; left:55%; top:35%; width:500px; height:auto; margin-left:-300px; margin-top:-200px; border:5px solid darkgray; background-color:white; text-align:center">
	<div id="too" style="width: 100%;height: 35px;background-color: peachpuff;margin-top: 1px;">
		<table width="100%">
			<tr>
				<td align="left">登录/注册</td>
				<td align="right"><a href="javascript:closeLogin();"><img width="20" src="../img/red.png"></a></td>
			</tr>
		</table>
	</div>
	<div id="to1" style="width: 100%;height: 30px;margin-top: 16px;color: gray;">
		<span style="margin-right: 400px;font-size: 20px;">
			<span><a id="s1" style="color: orange;" href="#" onclick="shift('登录')">登录</a></span>
			<span><a id="s2" href="#" onclick="shift('注册')">注册</a></span>
		</span>
		<hr size="2" color="gray" />
	</div>
	<div id="hg" style="width: 100%;">
		<div id="login" style="width: 100%;height: auto;">
			<form method="post" name="aa" action="javascript:pppn('登录')" onsubmit="return checkform()">
				<table align="center" style="font-size: 20px; border-collapse: separate; border-spacing: 30px; ">
					<tr>
						<td>用户号：</td>
						<td><input type="text" name="mo" size="35" placeholder="请输入用户号" style="height: 40px;"></td>
					</tr>
					<tr style="line-height: 35px;">
						<td>密&nbsp;&nbsp;&nbsp;码：</td>
						<td><input type="password" name="pass" size="35" placeholder="请输入密码" style="height: 40px;"></td>
					</tr>
					<tr>
						<td>验证码:</td>
						<td><input type="text" name="code" id="code" size="23"  style="height: 40px;" placeholder="请输入验证码" value="<?php echo @$_POST['code'] ?>"><img src="cap.php" border="1" onClick="this.src='cap.php'"><br>验证码</td>
					</tr>
					<tr>
						<td colspan="2" align="center" style="margin-left: 100px;"><input type="submit" name="tj" value="登&nbsp;&nbsp;录" style="margin-top: 15px;background-color: red;border: 0px;width: 280px;height: 40px;color: white;font-size: 20px;border-radius: 5px;">
							<br>
								<a href="">忘记密码</a>
						</td>
					</tr>
				</table>
			</form>
			<div id="str" style="margin:  0 auto;text-align: center;margin-bottom: 30px;"><input name="fu1" id="fu1" style="width: 280px;height: 40px;background-color: red;border: 0;font-size: 20px;border-radius: 10px;color: white;" type="button" value="非注册用户，直接购买"></div>
	</div>
	<div id="reg" style="width: 100%;height: auto;display: none;">
		<form style="margin-top: 30px;" name="bb" method="post" action="javascript:pppn('注册')" onsubmit="return Checksumbit()">
			<table align="center" style="font-size: 20px; border-collapse: separate; border-spacing: 5px; ">
				<tr>
					<td>用户编号：</td>
					<td><input type="text" size="50" name="id" style="height: 50px;" value="<?php echo @$_POST['id'] ?>"></td>
				</tr>
				<tr>
					<td>用户名：</td>
					<td><input type="text" size="50" name="names" style="height: 50px;" value="<?php echo @$_POST['names'] ?>"></td>
				</tr>
				<tr>
					<td>密码：</td>
					<td><input type="text" size="50" name="passs" style="height: 50px;" value="<?php echo @$_POST['passs'] ?>"></td>
				</tr>
				<tr>
					<td>真实姓名：</td>
					<td><input type="text" size="50" name="realname" style="height: 50px;" value="<?php echo @$_POST['realname'] ?>"></td>
				</tr>
				<tr>
					<td>性别：</td>
					<td><input type="radio" name="sex" checked="checked" value="男">男<input type="radio" name="sex"  value="女">女</td>
				</tr>
				<tr>
					<td>电话：</td>
					<td><input type="text" size="50" name="tel" style="height: 50px;"  value="<?php echo @$_POST['tel'] ?>"></td>
				</tr>
				<tr>
						<td colspan="2" style="margin-left: 100px;"><input name="tj" type="submit" value="完&nbsp;成&nbsp;注&nbsp;册&nbsp;" style="border-radius: 5px;margin-top: 15px;background-color: red;border: 0px;width: 470px;height: 55px;color: white;font-size: 20px;">
						</td>
				</tr>
			</table>
		</form>
	</div>
  </div>
</div>
<div id="bg" class="bg" style="display: none;">
</div>
<script type="text/javascript" src="../easyui/jquery.min.js"></script>
<script>
function openLogin(){
	document.getElementById("win").style.display="";
   document.getElementById('bg').style.display = "";
   document.getElementById('str').style.display = "none";
}
function openL(good_id){
	var num=mrof.number.value;
   document.getElementById("win").style.display="";
   document.getElementById('bg').style.display = "";
   document.getElementById('str').style.display = "block";
   var oBtn = document.getElementById('fu1');
   oBtn.onclick = function(){
   		window.location.href="buy.php?good_id="+good_id+'&number='+num+'&tj=tj';
    };
}
function closeLogin(){
   document.getElementById("win").style.display="none";
    document.body.style.backgroundColor="white";
    document.getElementById('bg').style.display = "none";
    location.reload();
}
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
</script>
<script type="text/javascript" src="../easyui/jquery.min.js"></script>
<script type="text/javascript">
	function checkform(){
		if(aa.mo.value==''){
			alert('用户编号不能为空');
			return false;
		}
		if(aa.name.value==''){
			alert('用户名不能为空');
			return false;
		}
		
			if(aa.pass.value==''){
			alert('密码不能为空');
			return false;
		}
			if(aa.code.value==''){
			alert('验证码不能为空');
			return false;
		}
	}
	function Checksumbit(){
		if(bb.id.value==''){
			alert('用户编号不能为空');
			return false;
		}
		if(bb.names.value==''){
			alert('用户名不能为空');
			return false;
		}
		
			if(bb.passs.value==''){
			alert('密码不能为空');
			return false;
		}
			if(bb.realname.value==''){
			alert('真实姓名不能为空');
			return false;
		}
			if(bb.tel.value==''){
			alert('电话不能为空');
			return false;
		}
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
				$("#hg").html("<h3>登录成功,你可以对商品进行收藏或加入购物车<h3><a href='#'>查看收藏</a><h3><h3><a href='cart.php'>查看购物车</a><h3></h3>")
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
				$("#hg").html("<h3>注册成功，你可以对商品进行收藏或加入购物车</h3><h3><a href='#'>查看收藏</a><h3><h3><a href='cart.php'>查看购物车</a><h3>");
			}else if(response.errno==3){
				alert('注册失败，请稍后再试');
			}
	  	}
		}
		var url='checklogin.php';
		$.post(url,data,success,"json");
		
	}
</script>
