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
				<div style="width: 100%;height: auto;">
			<table width="100%">
				<tr bgcolor="gainsboro">
					<td>订单编号</td>
					<td>商品名称</td>
					<td>收货人</td>
					<td>数量</td>
					<td><select>
						<option>全部状态</option>
						<option>待付款</option>
						<option>待发货</option>
						<option>侍收货</option>
						<option>待评价</option>
					</select>
					</td>
					<td>订单金额</td>
					<td>付款方式</td>
					<td>操作</td>
				</tr>
			
	<?php
	include("../conn/dataconnection.php");
	$user_id=$_SESSION['user_id'];
	$sql=mysql_query("select book_id,get_name,sum_price,state,money_id from book,getinfo where book.get_id=getinfo.get_id  and book.user_id='$user_id'");
	@$num=mysql_num_rows($sql);
//	echo $num;
	?>
	<tr>
	<?php
	if($num<=0){
		?>
		<td colspan="7" align="center"><b>你暂时没有订单,快去为自己喜欢的商品下单吧</b></td>
		<?php
	}else{
		while($u=mysql_fetch_array($sql)){
			$book_id=$u['book_id'];
			$bnn=mysql_query("select order_detail.good_id,name,num,price,main_img from order_detail,goods where order_detail.good_id=goods.good_id and book_id='$book_id'");
			while($book=mysql_fetch_array($bnn)){
				?>
				<tr>
				<td><?php echo $u['book_id'] ?></td>
				<td>
					<table>
						<tr>
							<td><a href="see_good.php?good_id=<?php echo $book['good_id'] ?>"><img width="50" src="<?php echo $book['main_img'] ?>" /></a></td>
							<td><a href="see_good.php?good_id=<?php echo $book['good_id'] ?>"><?php echo $book['name'] ?></a></td>
						</tr>
					</table>
				</td>
				<td><?php echo $u['get_name'] ?></td>
				<td><?php echo $book['num'] ?></td>
				<td><?php echo $u['state'] ?></td>
				<td>￥<?php echo $book['num']*$book['price'] ?></td>
				<td>
					<?php 
						$get_id=$u['money_id'];
						$h=mysql_query("select * from getmoney where money_id='$get_id'");
						@$y=mysql_fetch_array($h);
						echo $y['get_money'];
						?>
					
				</td>
				<td>
					<a href="see_order.php?book_id=<?php echo $u['book_id'] ?>">查看</a>｜
					<?php
						if($u['state']=='待发货'){
							?>
							<a href=""><input style="border: 0;background-color: orange;border-radius: 5px;" type="button" value="提醒发货"></a>
							<?php
						}else if($u['state']=='待收货'){
							?>
							<a href=""><input style="border: 0;background-color: orange;border-radius: 5px;" type="button" value="确认收货"></a>
							<?php
						}else if($u['state']=='待付款'){
							?>
							<a href="">取消订单</a>｜<a href=""><input style="border: 0;background-color: orange;border-radius: 5px;" type="button" value="付款"></a>
							<?php
						}else if($u['state']=='待评价'){
							?>
							<a href="">删除订单</a>｜<a href=""><input style="border: 0;background-color: orange;border-radius: 5px;" type="button" value="评价"></a>
							<?php
						}
						?>
					
				</td>
			</tr>
				
				<?php
			}
			?>
			
			<?php
		}
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