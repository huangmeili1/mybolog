<meta charset="utf-8" />
<link type="text/css" rel="stylesheet" href="../css/person.css" />
<style type="text/css">
	body{
		margin: 0;
		padding: 0;
	}
</style>
<?php
@session_start();
if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
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
				<div style="width: 100%;height: 500px;margin: 0 auto;text-align: center;">
				<div style="width: 100%;height: 40px;background-color: gainsboro;"><span style="float: left;line-height: 40px;color: gray;font-size: 20px;"><b>我的订单</b></span></div>
				<div style="width: 95%;height: auto;margin: 0 auto;text-align: center;margin-top: 20px;">
				<div style="width: 100%;height: auto;background-color: gainsboro;">
			<table width="100%">
				<tr>
					<td>订单编号</td>
					<td>商品名称</td>
					<td>收货人</td>
					<td>数量</td>
					<td><select>
						<option>待付款</option>
						<option>已付钱</option>
						<option>全部状态</option>
						<option>确认收货</option>
						<option>侍评价</option>
					</select>
					</td>
					<td>订单金额</td>
					<td>操作</td>
				</tr>
			
	<?php
	include("../conn/dataconnection.php");
	$user_id=$_SESSION['user_id'];
	$sql=mysql_query("select * from order where user_id='$user_id'");
	@$num=mysql_num_rows($sql);
	?>
	<tr>
	<?php
	if($num<=0){
		?>
		<!--<td colspan="7" align="center"><b>你暂时没有订单,快去为自己喜欢的商品下单吧</b></td>-->
		<?php
	}else{
		?>
		
		<?php
	}
	?>
	</tr>
		</table>
		</div>	
		</div>
		</div>
	 	</div>
	 	</div>
	 </div>
	 
	</div>
	<?php
}else{echo "<script>alert('请登录');window.location.href='login.php';</script>";}
?>