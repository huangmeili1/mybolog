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
	 				<div style="width: 100%;height: 40px;background-color: gainsboro;"><span style="float: left;line-height: 40px;color: gray;"><b>我的收藏</b></span></div>
	 				<div style="width: 100%;height:auto;">
	 					<div style="width: 100%;height: 80px;background-color: floralwhite;">
	 						<span style="float: left;line-height: 80px;"><input type="checkbox">全选<span style="margin-left: 20px;"><a href="#">取消收藏</a></span></span>
	 					</div>
	 					<div style="width: 100%;height: auto;">
	 						<hr size="1" color="gainsboro" />
	 						<table width="100%">
	 							
	 								<?php
	 								include_once("../conn/dataconnection.php");
	 								$s=mysql_query("select storegood.good_id,good_name,good_price,main_img,store_time from goods,storegood where storegood.good_id=goods.good_id and user_id='$user_id'");
	 								@$n=mysql_num_rows($s);
	 								if($n<=0){
	 									?>
	 									<tr>
	 									<td align="center">你还没有收藏任何商品，快去收藏你喜欢的吧</td>
	 									</tr>
	 									<?php
	 								}else{
	 									while($f=mysql_fetch_array($s)){
	 										?>
	 										<tr>
	 										<td><input type="checkbox"></td>
	 										<td style="border: 1px solid black;width: 50px;"><img width="50" src="<?php echo $f['main_img'] ?>"></td>
	 										<td width="400" style="margin-left: 50px;">
	 											<?php echo $f['good_name'] ?><br>
	 											<span>加收藏时间:<?php echo $f['store_time']; ?></span>
	 										</td>
	 										<td><span style="color: orange;">￥<?php echo $f['good_price']; ?></span></td>
	 										<td>
	 											<div style="width: 90px;height: 20px;background-color: lightsalmon;line-height: 20px;"><a href="addcart.php?good_id=<?php echo $f['good_id'] ?>">加入购物车</a></div>
	 											<span><a href="#">取消收藏</a></span>
	 										</td>
	 										</tr>
	 										<?php
	 									}
	 								}
	 									?>
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


<script type="text/javascript" src="../easyui/jquery.min.js"></script>

<script type="text/javascript">/*异步加载*/
  function order(){
  htmlobj=$.ajax({url:"order.php",async:false});
  $("#f12").html(htmlobj.responseText);
  }


</script>
</head>