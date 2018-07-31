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
	 		
	 		
	 		
	 		<div id="f12" style="width: 75%;height:auto;float: right;border: 1px solid gainsboro;margin-bottom: 100px;">
	 			<div style="width: 100%;height: 40px;background-color: gainsboro;"><span style="float: left;line-height: 40px;color: gray;font-size: 20px;"><b>订单详情</b></span></div>
	 			<?php 
	 				$book_id=$_GET['book_id'];
	 				$sy=mysql_query("select * from book where book_id='$book_id'");
	 				@$num=mysql_num_rows($sy);
	 				if(@$num<=0){
	 					echo "对不起，系统出错了，请稍后再试";
	 				}else{
	 					$book=mysql_fetch_array($sy);
	 					?>
	 			<div style="width: 93%;height: auto;border: 1px solid gainsboro;margin: 0 auto;text-align: center;margin-top: 30px;">
	 				<table width="100%">
	 					<tr bgcolor="darkgray" height="30">
	 						<td align="center">订单处理信息</td>
	 					</tr>
	 					<tr>
	 						<td><b>订单号：</b><span style="color: red;"><?php echo $_GET['book_id'] ?></span></td>
	 					</tr>
	 					<tr>
	 						<td><hr size="1" color="gainsboro"></td>
	 					</tr>
	 					<tr>
	 						<td><b>订单处理状态:</b><span style="color: red;"><?php echo $book['state']; ?></span></td>
	 					</tr>
	 				</table>
	 			</div>
	 			<div style="width: 93%;height: auto;border: 1px solid gainsboro;margin: 0 auto;text-align: center;margin-top: 20px;">
	 				<table width="100%" style="line-height: 28px;">
	 					<tr bgcolor="darkgray" height="30">
	 						<td align="center">订单基本信息</td>
	 					</tr>
	 					<tr>
	 						<td><span style="color: red;"><b>订货人信息:</b></span></td>
	 					</tr>
	 					<tr>
	 						<?php
	 							$u=$book['user_id'];
	 							$pn=mysql_query("select * from user where user_id='$u'");
	 							@$f=mysql_fetch_array($pn);
	 							?>
	 						<td>姓名：<?php echo $f['realname']; ?></td>
	 					</tr>
	 					<tr>
	 						<td>手机：<?php echo $f['user_tel'] ?></td>
	 					</tr>
	 					<tr>
	 						<td>E-mail:<?php echo $f['email'] ?></td>
	 					</tr>
	 					<tr>
	 						<td><hr size="2" color="gainsboro"></td>
	 					</tr>
	 					<tr>
	 						<td><span style="color: red;"><b>收货人信息：</b></span></td>
	 					</tr>
	 					<tr>
	 						<?php
	 							$get_id=$book['get_id'];
	 							$get=mysql_query("select * from getinfo where get_id='$get_id'");
	 							@$gett=mysql_fetch_array($get);
	 							?>
	 						<td>姓名：<?php echo $gett['get_name']; ?></td>
	 					</tr>
	 					<tr>
	 						<td>收货地址：<?php echo $gett['get_add'] ?></td>
	 					</tr>
	 					<tr>
	 						<td>收货邮编：<?php echo $gett['get_post'] ?></td>
	 					</tr>
	 					<tr>
	 						<td>手机：<?php echo $gett['get_tel'] ?></td>
	 					</tr>
	 					<tr>
	 						<td><hr size="2" color="gainsboro"></td>
	 					</tr>
	 					<tr>
	 						<td><span style="color: red;"><b>其他信息：</b></span></td>
	 					</tr>
	 					<tr>
	 						<td>配送时间:<?php echo $book['send_time'] ?></td>
	 					</tr>
	 					<tr>
	 						<td>订购时间:<?php echo $book['book_time'] ?></td>
	 					</tr>
	 					<tr>
	 						<?php
	 							$money_id=$book['money_id'];
	 							$money=mysql_query("select * from getmoney where money_id='$money_id'");
	 							@$d=mysql_fetch_array($money);
	 							?>
	 						<td>付款方式：<?php echo $d['get_money'] ?></td>
	 					</tr>
	 					<tr>
	 						<td>给收货人留言:<?php echo $book['get_hua'] ?></td>
	 					</tr>
	 				</table>
	 			</div>
	 			<div style="width: 93%;height: auto;border: 1px solid gainsboro;margin: 0 auto;text-align: center;margin-top: 30px;">
	 				<table width="100%">
	 					<tr bgcolor="darkgray" height="30">
	 						<td align="center">商品信息</td>
	 					</tr>
	 					<tr>
	 						<td>
	 							<table width="100%" border="1" bordercolor="darkgray" style="border-collapse:collapse;">
	 								<tr align="center">
	 									<td>商品名称</td>
	 									<td>价格</td>
	 									<td>数量</td>
	 									<td>小计</td>
	 								</tr>
	 			<?php
	 				$bb=mysql_query("select order_detail.good_id,name,num,price,main_img from order_detail,goods where order_detail.good_id=goods.good_id and book_id='$book_id'");
	 				@$rt=mysql_num_rows($bb);
	 				if($rt<=0){
	 					echo "对不起，系统出错了，请稍后再试";
	 				}else{
	 					$tatol=0;
	 					while($bu=mysql_fetch_array($bb)){
	 						$tatol=$tatol+$bu['num']*$bu['price'];
	 						?>
	 						<tr align="center">
	 									<td>
	 										<table>
	 											<tr>
	 												<td><a href="see_good.php?good_id=<?php echo $bu['good_id']; ?>"><img width="80" src="<?php echo $bu['main_img'] ?>"></a></td>
	 												<td><a href="see_good.php?good_id=<?php echo $bu['good_id']; ?>"><?php echo $bu['name'] ?></a></td>
	 											</tr>
	 										</table>
	 									</td>
	 									<td>￥<?php echo $bu['price'] ?></td>
	 									<td><?php echo $bu['num'] ?></td>
	 									<td>￥<?php echo $bu['num']*$bu['price']; ?></td>
	 								</tr>
	 							</table>
	 						</td>
	 					</tr>
	 						
	 						<?php
	 					}
	 				}
	 				?>
	 					<tr align="right">
	 						<td>订单合计金额：<span style="color: red;"><?php echo $tatol; ?></span>RMB</td>
	 					</tr>
	 				</table>
	 			</div>
	 			<div style="width: 100%;height: auto;">
	 				<span>如果你不想在订单记录中出现此订单，可点击<a  onclick="if(confirm('确定删除?')==false)return false;" href="del_order.php?book_id=<?php echo $book['book_id'] ?>">删除订单</a></span>
	 			</div>
	 					<?php
	 				}
	 				?>
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