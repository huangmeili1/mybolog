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
	 				<div style="width: 100%;height: 40px;background-color: gainsboro;"><span style="float: left;line-height: 40px;color: gray;"><b>你好<?php echo $_SESSION['user_name']; ?>，欢迎进入个人中心</b></span></div>
	 				<div id="pp" style="width: 100%;height: auto;">
	 					<div id="p1" style="width: 30%;height: auto;float: left;">
	 						<span style="float: left;"><img style="border-radius: 100%;" src="../img/img.jpg"></span>
	 						<h3 style="margin-top: 60px;"><?php echo @$_SESSION['user_id']; ?></h3>
	 						<h3>普通用户</h3>
	 					</div>
	 					<div id="p2" style="width: 70%;height: auto;float: right;">
	 						<div style="width: 2px;height: 140px;background-color: gainsboro;float: left;margin: 0 auto;text-align: center;"></div>
	 						<div style="float: right;margin-right: 450px;">
	 						<table style="line-height: 120px;">
	 							<tr>
	 								<td><a href="#">待付款</a></td>
	 								<td><a href="#">待配送</a></td>
	 								<td><a href="#">待评价</a></td>
	 							</tr>
	 						</table>	
	 						</div>
	 					</div>
	 					
	 				</div>
	 				<div id="st" style="width: 100%;height: auto;margin-top: 20px;">
	 					<div style="width: 95%;height: 100px;margin: 0 auto;text-align: center;border: 1px solid gainsboro;">
	 						<span style="float: left;margin-left: 20px;"><b>如何成为VIP</b></span><br>
	 						<hr size="1" color="gainsboro" width="95%"><br>
	 						<span style="float: left;margin-left: 20px;">您在hua.com成功购物一次，送货完毕后系统将自动将您的会员级别升至VIP，享受鲜花最高9折优惠。</span><br>
	 						<span style="float: left;margin-left: 20px;">会员级别将在送货完毕后一个工作日内完成升级，重大节日（即情人节、母亲节、七夕节、圣诞节和春节）需二个工作日左右。</span>
	 					</div>
	 				</div>
	 				
	 				<div id="stt" style="width: 100%;height: auto;margin-top: 30px;">
	 					<div style="width: 95%;height: auto;margin: 0 auto;text-align: center;border: 1px solid gainsboro;margin-bottom: 30px;">
	 						<div style="width: 100%;height: 30px;background-color: darkgray;">
	 							<span style="float: left;font-size: 20px;line-height: 30px;margin-left: 10px;"><b>我的收藏</b></span>
	 							<span style="float: right;line-height: 30px;">查看更多收藏》</span>
	 						</div>
	 						<div style="width: 100%;height: 300px;margin-top: 30px;margin-bottom: 20px;">
	 							<?php
	 								include_once("../conn/dataconnection.php");
	 								$s=mysql_query("select good_id,good_name,good_price,main_img from goods where good_id in(select good_id from storegood where user_id='$user_id') limit 0,4");
	 								@$n=mysql_num_rows($s);
	 								if($n<=0){
	 									echo "你还没有收藏的商品，赶快去收藏你喜欢的吧";
	 								}else{
	 									?>
	 									<div id="box" style="">
											<ul>
	 									<?php
	 									while($f=mysql_fetch_array($s)){
	 										?>
	 										<li>
	 											<span style="padding: 25px;">
	 												<a href="see_good.php?good_id=<?php echo $f['good_id'] ?>"><img width="180" src="<?php echo $f['main_img'] ?>"></a><br>
	 												<span><a href="see_good.php?good_id=<?php echo $f['good_id'] ?>"><?php echo $f['good_name'] ?></a></span><br>
	 												<span style="color: orange;"><b>￥<?php echo $f['good_price'] ?></b></span>
	 												<div style="width: 80px;height: 30px;border: 1px solid gray;line-height: 30px;margin: 0 auto;text-align: center;"><a style="color: black;" href="addcart.php?good_id=<?php echo $f['good_id'] ?>">加入购物车</a></div>
	 											</span>
	 										</li>
	 										<?php
	 									}
	 									?>
	 									</ul>
									</div>
	 									<?php
	 								}
	 								?>
	 						</div>
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