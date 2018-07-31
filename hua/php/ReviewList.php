<meta charset="utf-8" />
<link type="text/css" rel="stylesheet" href="../css/person.css" />
<?php
@session_start();
if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
	$user_id=$_SESSION['user_id'];
	include("top.php");
	?>
	<div id="center" style="width: 100%;height: auto;">
		<?php include("persontop2.php"); ?>
	 <div id="main" style="width: 100%;height: auto;">
	 	<div id="ta" style="width: 100%;height: 30px;background-color: white;">
	 		<span style="margin-left: 150px;"><a href="index.php">首页</a>><a href="#">会员中心</a></span>
	 	</div>
	 	<div id="f1" style="width: 80%;height: auto;margin: 0 auto;text-align: center;">
	 		<?php
	 			include("personleft.php");
	 			?>
	 		<div id="f12" style="width: 75%;height:auto;float: right;border: 1px solid gainsboro;">
	 			<div id="er" style="width: 100%;height: auto;">
	 				<div style="width: 100%;height: 40px;background-color: gainsboro;"><span style="float: left;line-height: 40px;color: gray;"><b>我的评价</b></span></div>
	 			</div>
	 		</div>
	 	</div>
	 </div>
	 
	</div>
	<?php
	
	
	
}else{echo "<script>alert('请登录');window.location.href='login.php';</script>";}
?>


<script type="text/javascript" src="../easyui/jquery.min.js"></script>

<script type="text/javascript">/*异步加载*/
  function order(){
  htmlobj=$.ajax({url:"order.php",async:false});
  $("#f12").html(htmlobj.responseText);
  }


</script>
</head>