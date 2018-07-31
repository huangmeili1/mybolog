<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>个人中心</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
	session_start();
	if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
		?>
		<div class="container" style="width: 100%;">
			<?php include("top.php"); ?>
		<?php
		include("../conn/dataconnection.php");
		@$book_id=$_GET['book_id'];
		@$sql=mysql_query("select * from order_detail where book_id='$book_id'");
		$book=mysql_query("select * from book where book_id='$book_id'");
		$book_num=mysql_fetch_array($book);
		@$num=mysql_num_rows($sql);
		
		if(@$num<=0){
			echo "<script>alert('对不起，系统出错了，请稍后再试');history.go(-1);</script>";
		}else{
			?>
					<div class="row" style="width: 90%;margin: 0 auto;">
							<div class="col-md-12" style="padding: 0;margin: 0;background-color: white;">
								<ol class="breadcrumb" style="background-color: white;">
								    <li><a href="index.php">首页</a></li>
								    <li><a href="personcenter.php">个人中心</a></li>
								    <li class="active">查看订单</li>
								</ol>
							</div>
					</div>
					<div class="row" style="width: 90%;margin: 0 auto;margin-bottom: 100px;">
						<div class="col-md-12">
							<div class="row">
							 <div class="col-md-3" style="height: auto;border: 1px;background: white;margin-bottom: 100px;">
									<?php include("personleft.php"); ?>
							</div>
							<div class="col-md-9">
								<div class="panel panel-default">
								    <div class="panel-heading">
								        订单详情
								    </div>
								    <div class="panel-body">
										<div class="panel panel-default">
										    <div class="panel-heading">
										        订单处理信息
										    </div>
										    <div class="panel-body">
												<table class="table table-hover">
													<tbody>
														<tr>
															<td width="150">订单号：</td>
															<td style="color: red;"><?php echo $book_num['book_id']; ?></td>
														</tr>
														<tr>
															<td>订单处理状态：</td>
															<td style="color: red;"><?php echo $book_num['state']; ?></td>
														</tr>
													</tbody>
												</table>
										    </div>
										</div>
										<div class="panel panel-default">
										    <div class="panel-heading">
										        订单基本信息
										    </div>
										    <div class="panel-body">
										        <table class="table table-hover">
										        	<caption style="color: red;">订货人信息</caption>
										        	<?php
										        		$user_id=$_SESSION['user_id'];
										        		@$user=mysql_query("select * from user where user_id='$user_id'");
										        		@$user_n=mysql_fetch_array($user);
										        		?>
										        	<tr>
										        		<td width="120">姓名：</td>
										        		<td><?php echo $user_n['realname']; ?></td>
										        	</tr>
										        	<tr>
										        		<td>手机：</td>
										        		<td><?php echo $user_n['user_tel']; ?></td>
										        	</tr>
										        	<tr>
										        		<td>E-mail：</td>
										        		<td><?php echo $user_n['email']; ?></td>
										        	</tr>
										        </table>
										        <table class="table table-hover">
										        	<?php
										        		$get_id=$book_num['get_id'];
										        		$get=mysql_query("select * from getinfo where get_id='$get_id' and user_id='$user_id'");
										        		$get_n=mysql_fetch_array($get);
										        		?>
										        	<caption style="color: red;">收货人信息</caption>
										        	<tr>
										        		<td width="150">收货人姓名：</td>
										        		<td><?php echo $get_n['get_name']; ?></td>
										        	</tr>
										        	<tr>
										        		<td>收货人手机：</td>
										        		<td><?php echo $get_n['get_tel']; ?></td>
										        	</tr>
										        	<tr>
										        		<td>收货人地址：</td>
										        		<td><?php echo $get_n['get_add']; ?></td>
										        	</tr>
										        	<tr>
										        		<td>收货邮编：</td>
										        		<td><?php echo $get_n['get_post']; ?></td>
										        	</tr>
										        </table>
										        <table class="table table-hover">
										        	<caption style="color: red;">其他信息</caption>
										        	<tr>
										        		<td width="150">配送时间：</td>
										        		<td><?php echo $book_num['send_time']; ?></td>
										        	</tr>
										        	<tr>
										        		<td>订购时间:</td>
										        		<td><?php echo $book_num['book_time']; ?></td>
										        	</tr>
										        	<tr>
										        		<td>留言：</td>
										        		<td><?php echo $book_num['get_hua']; ?></td>
										        	</tr>
										        </table>
										    </div>
										</div>
										<table class="table table-hover">
											<caption style="color: red;">商品信息</caption>
											<thead>
												<tr>
													<th>商品名称</th>
													<th>价格</th>
													<th>购买数量</th>
													<th>小计</th>
												</tr>
											</thead>
										
								        <?php
								        	while($bk=mysql_fetch_array($sql)){
								        		$good_id=$bk['good_id'];
								        		@$good=mysql_query("select * from goods where good_id='$good_id'");
								        		@$b=mysql_fetch_array($good);
								        		?>
													<tr>
														<td width="180" height="180">
															<div class="thumbnail" style="width: 150px;text-align: center;height: 150px;padding: 0;margin: 0;border: 0;">
																<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $good_id; ?>"><img src="<?php echo $b['main_img']; ?>" />
																<?php echo $b['good_name'] ?>
																</a>
															</div>
														</td>
														<td style="line-height: 180px;">
															￥<?php echo $bk['price']; ?>
														</td>
														<td style="line-height: 180px;"><?php echo $bk['num']; ?></td>
														<td style="line-height: 180px;">￥
															<?php
																echo $bk['num']*$bk['price'];
																
																?>
														</td>
													</tr>
								        		<?php
								        	}
								        	?>
								        	<tr>
								        		<td colspan="4" style="line-height: 50px;">
								        			本订单产生的积分为:<span style="color: red;"><?php echo $book_num['sum_price']*0.1 ?></span>
								        			<!--产生的经验值为:<span style="color: red;"><?php echo $book_num['sum_price']/50; ?></span>-->
								        			<span style="float: right;">订单合计金额为:<span style="color: red;">￥<?php echo $book_num['sum_price']; ?></span></span>
								        		</td>
								        	</tr>
								        	<?php
								        		if($book_num['state']=='待评价'){
								        			?>
									        	<tr>
									        		<td colspan="4" style="text-align: center;">如果你不想在订单记录中出现此订单，可点击<a href="del_order.php?book_id=<?php echo $book_num['book_id']; ?>">删除订单</a></td>
									        	</tr>
								        			<?php
								        		}
								        		?>
								        	</table>
								    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php
		}
		
?>
</div>
<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='login.php';</script>";}  ?>
	
<script type="text/javascript" src="../js/index.js"></script>