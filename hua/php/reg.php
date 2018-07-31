<meta charset="utf-8" />
<title>注册商城</title>
<link rel="shortcut icon" type="image/x-icon" href="../img/reg.ico" />
<style type="text/css">
body{
	background-color: gainsboro;
}
	#a1 li{
		 list-style: none outside none;
		float: left;
		font-size: 18px;
		color: black;
		margin-left: 60px;
		line-height: 40px;
	}
	#a1 a{
		color: black;
		text-decoration: none;
	}
	#add1{
		margin: 0 auto;
		text-align: center;
		width: 100%;
		height: auto;
		
	}
	#add1:after{
		content:"";
		height: 0;
		line-height: 0;
		display: block;
		visibility: hidden;
		clear: both;
			}
</style>
<?php

?>
<div id="add" style="width: 100%;height: auto;">
	<div id="add1">
		<div id="add11" style="width: 20%;height: auto;float: left;">
			<a href="index.php"><img src="../img/logo1.png" /></a>
		</div>
		<div id="add12" style="width: 80%;height: auto;float: right;">
		<ul id="a1">
		<li><a href="index.php">首页</a></li>
				<li><a href="">鲜花</a></li>
		    	<li><a href="">永生花</a></li>
		    	<li><a href="">商务花篮</a></li>
		    	<li><a href="">绿色植物</a></li>
		    	<li><a href="">蛋糕</a></li>
		    	<li><a href="">礼品</a></li>
		    	<li><a href="">花语大全</a></li>
		</ul>
		</div>
	</div>
	<div id="add2" style="-moz-box-shadow:-4px 2px 15px #333333; -webkit-box-shadow:-4px 2px 15px #333333; box-shadow:-4px 2px 15px #333333;border-radius: 10px;width: 70%;height: 550px;background-color: white;margin: 0 auto;text-align: center;margin-top: 50px;">
		<form name="aa" method="post" action="" onsubmit="return checkform()" onsubmit="return Checksumbit()">
			<table align="center" style="font-size: 20px; border-collapse: separate; border-spacing: 5px; ">
				<tr>
					<td colspan="2" align="center"><h2 style="text-shadow:2px 2px 5px #333333;-webkit-text-stroke: 1.3px #000000;">用户注册</h2></td>
				</tr>
				<tr>
					<td>用户编号：</td>
					<td><input type="text" size="50" name="id" style="height: 50px;" value="<?php echo @$_POST['id'] ?>"></td>
				    <!--<td id="box" style="color: red;font-size: 15px;"></td>-->
				</tr>
				<tr>
					<td>用户名：</td>
					<td><input type="text" size="50" name="name" style="height: 50px;" value="<?php echo @$_POST['name'] ?>"></td>
				</tr>
				<tr>
					<td>密码：</td>
					<td><input type="text" size="50" name="pass" style="height: 50px;" value="<?php echo @$_POST['pass'] ?>"></td>
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
					<!--<td id="bo" style="color: red;font-size: 15px;"></td>-->
				</tr>
				<tr>
						<td colspan="2" style="margin-left: 100px;"><input name="tj" type="submit" value="完&nbsp;成&nbsp;注&nbsp;册&nbsp;" style="margin-top: 15px;background-color: red;border: 0px;width: 470px;height: 55px;color: white;font-size: 20px;">
						</td>
				</tr>
				<tr>
					<td colspan="2" align="center"><span>已有帐号，请<a href="login.php"><input type="button" value="登录" style="background-color: red;border: 0;color: white;width: 60px;height: 30px;border-radius: 13px;"></a></span></td>
				</tr>
			</table>
		</form>
	</div>
</div>

<script type="text/javascript">
	function checkform(){
		if(aa.id.value==''){
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
			if(aa.realname.value==''){
			alert('真实姓名不能为空');
			return false;
		}
			if(aa.tel.value==''){
			alert('电话不能为空');
			return false;
		}
	}
</script>
<script type="text/javascript">
</script>
<?php
	if(isset($_POST['tj'])){
		include("../conn/dataconnection.php");
		$id=$_POST['id'];
		$name=$_POST['name'];
		$pass=$_POST['pass'];
		$realname=$_POST['realname'];
		$sex=$_POST['sex'];
		$tel=$_POST['tel'];
		$d=date("Y-m-d");
		$search ='/^(1(([35][0-9])|(47)|[8][0126789]))\d{8}$/';
	   if(!preg_match($search,$tel)){
		echo "<script>alert('你的手机号码格式不正确，请检查');history.go(-1);</script>";
	}else{
		$aa=mysql_query("select * from user where user_id='$id'");
		@$r=mysql_num_rows($aa);
		if($r>0){
			echo "<script>alert('你注册的编号已经存在，请重新输入！');</script>";
		}else{
		$sql=mysql_query("insert into user(user_id,user_name,user_pass,realname,sex,user_tel,user_time) values('$id','$name','$pass','$realname','$sex','$tel','$d')");
	    @$num=mysql_affected_rows();
	    if($num>0){
	    	echo "<script>alert('注册成功');window.location.href='login.php';</script>";
	    }else{
	    	echo "<script>alert('注册失败，请稍后再试');</script>";
	    }
		}
	    
	}
	}
	
	
	
	
	?>