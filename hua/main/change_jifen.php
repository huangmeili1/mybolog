<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>个人中心-积分兑换</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
	session_start();
	if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
		@$user_id=$_SESSION['user_id'];
?>
<div class="container" style="width: 100%;">
	<?php 
		include("top.php");
		 ?>
		 <div class="row" style="width: 90%;margin: 0 auto;">
		 	<div class="col-md-12" style="padding: 0;margin: 0;background-color: white;">
		 		<ol class="breadcrumb" style="background-color: white;">
				    <li><a href="index.php">首页</a></li>
				    <li><a href="personcenter.php">个人中心</a></li>
				    <li class="active">积分兑换</li>
				</ol>
		 	</div>
		 </div>
		 <div class="row" style="width: 90%;margin: 0 auto;">
		 	<div class="col-md-12">
		 		<div class="row">
		 			<div class="col-md-3" style="background-color: transparent;">
						<?php include("personleft.php"); ?>
					</div>
					<div class="col-md-9">
						<div class="panel panel-default">
						    <div class="panel-heading">
						      <b>积分兑换</b>
						    </div>
						    <div class="panel-body">
						     	<div>
						     		<span><b>虚拟商品</b></span>
						     		<hr size="10" color="gray" />
						     	</div>
						     	<div class="row">
						     		<div class="col-md-3" style="">
						     			<div class="thumbnail" style="background: url(../img/coupon_20.jpg);width: 100%;height: 280px;border: 0;padding: 0;text-align: center;">
						     				<div style="color: white;">
						     				<div style="font-size: 40px;color: white;padding-top: 20px;">￥<b style="font-size: 65px;">20</b></div>
						     				通用券
						     				</div>
						     				<div class="caption" style="text-align: center;margin-top: 20px;">
						     					<span style="color: white;">所需积分:200</span><br>
						     					<button onclick="change_jifen(200,20)" style="margin-top: 20px;background: transparent;color: white;font-size: 20px;border: 2px solid white;" class="btn btn-default">立即兑换</button>
						     				</div>
						     			</div>
						     		</div>
						     		<div class="col-md-3">
						     			<div class="thumbnail" style="background: url(../img/coupon_15.jpg);width: 100%;height: 280px;border: 0;padding: 0;text-align: center;">
						     				<div style="color: white;">
						     				<div style="font-size: 40px;color: white;padding-top: 20px;">￥<b style="font-size: 65px;">15</b></div>
						     				通用券
						     				</div>
						     				<div class="caption" style="text-align: center;margin-top: 20px;">
						     					<span style="color: white;">所需积分:150</span><br>
						     					<button onclick="change_jifen(150,15)" style="margin-top: 20px;background: transparent;color: white;font-size: 20px;border: 2px solid white;" class="btn btn-default">立即兑换</button>
						     				</div>
						     			</div>
						     		</div>
						     		<div class="col-md-3">
						     			<div class="thumbnail" style="background: url(../img/coupon_10.jpg);width: 100%;height: 280px;border: 0;padding: 0;text-align: center;">
						     				<div style="color: white;">
						     				<div style="font-size: 40px;color: white;padding-top: 20px;">￥<b style="font-size: 65px;">10</b></div>
						     				通用券
						     				</div>
						     				<div class="caption" style="text-align: center;margin-top: 20px;">
						     					<span style="color: white;">所需积分:100</span><br>
						     					<button onclick="change_jifen(100,10)" style="margin-top: 20px;background: transparent;color: white;font-size: 20px;border: 2px solid white;" class="btn btn-default">立即兑换</button>
						     				</div>
						     			</div>
						     		</div>
						     		<div class="col-md-3">
						     			<div class="thumbnail" style="background: url(../img/coupon_5.jpg);width: 100%;height: 280px;border: 0;padding: 0;text-align: center;">
						     				<div style="color: white;">
						     				<div style="font-size: 40px;color: white;padding-top: 20px;">￥<b style="font-size: 65px;">5</b></div>
						     				通用券
						     				</div>
						     				<div class="caption" style="text-align: center;margin-top: 20px;">
						     					<span style="color: white;">所需积分:50</span><br>
						     					<button onclick="change_jifen(50,5)" style="margin-top: 20px;background: transparent;color: white;font-size: 20px;border: 2px solid white;" class="btn btn-default">立即兑换</button>
						     				</div>
						     			</div>
						     		</div>
						     	</div>
						     	
						     	<div class="row">
						     		<div id="show_change_result" class="col-md-12" style="text-align: center;">
						     			
						     		</div>
						     	</div>
						     	
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
	<script type="text/javascript" src="../js/index.js"></script>
	<script type="text/javascript">
		function change_jifen(jifen,money){
			var con=confirm('确认兑换当前商品,将消费您'+jifen+'积分？');
			if(con){
				var url="change_jifen2.php";
				var data={"jifen":jifen,"money":money};
				var success=function(response){
					$("#show_change_result").html(response);
				}
				$.post(url,data,success,"html");
			}
			
		}
	</script>