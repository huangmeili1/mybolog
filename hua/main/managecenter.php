<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>管理中心</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
	session_start();
	include_once("../conn/dataconnection.php");
	if(@$_SESSION['admin_id']!=''&&@$_SESSION['type']!=''&&@$_SESSION['admin_name']!=''){
		
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
		<h2 align="center">欢迎进入管理中心</h2>
		<h3>当前时间为：<span style="font-size: 16px;">&nbsp;</span><span id="timeShow"></span></h3>
		<?php
			
			?>
	</div>	
	</div>
	<div style="width: 100%;height: 10%;padding-top: 20px;"><h2>版权所有</h2></div>
	
</div>
<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>
	<script type="text/javascript">
$(function (){
	setInterval("getTime()",1000);
});
	function getTime(){
		var data=new Date();
		var mydate=data.toLocaleDateString();//2018/4/27
		var hours=data.getHours();
		var minutes=data.getMinutes();
		var seconds=data.getSeconds();
		$("#timeShow").html(mydate+" "+hours+":"+minutes+":"+seconds);
	}
</script>