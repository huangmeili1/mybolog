<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>个人中心-我的积分</title>
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
				    <li class="active">我的积分</li>
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
						      <b>我的积分</b>
						    </div>
						    <div class="panel-body">
						      <?php
						      	$sql=mysql_query("select * from user where user_id='$user_id'");
						      	@$sql_user=mysql_fetch_array($sql);
						      	
						      	?>
						      	<div style="margin-top: 30px;">
						      		<span>你当前的积分为:<span style="color: red;"><b><?php echo $sql_user['jifen']; ?></b></span></span>
						      		<hr size="10" color="gray" />
						      	</div>
						      	<div>
						      		<span><b>积分规则：</b></span>
						      		<ul style="line-height: 30px;">
						      			<li>1积分相当于人民币10分(0.1元)，积分不可兑换现金，可用于兑换优惠券</li>
						      			<li>送货完毕后可获取积分数为：订单金额 * 10%</li>
						      			<li>评价订单可获30积分（限送货完毕后30天内可评价）</li>
						      		</ul>
						      	</div>
						      	<div>
						      		<span><b>积分交易记录</b></span>
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