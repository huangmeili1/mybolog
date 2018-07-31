<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>个人中心</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	body{
		margin-top: 50px;
	}
	[class *= col-]{
  background-color: #eee;
}
.book li{
	width: 100%;
	text-align: center;
	list-style: none;
}
.book li a{
	font-size: 16px;
	width: 100%;
	display: inherit;
}
.book li a:hover{
	color: white;
	background-color: black;
	text-decoration: none;
}
#send li a{
	width: 70px;
	height: 70px;
	text-align: center;
	line-height: 70px;
	background-color: black;
	display: inherit;
	border-radius: 35px;
	color: white;
}
#send li a:hover{
	background-color: palevioletred;
	text-decoration: none;
}
.carousel-control.left {  
    
  background-image:none;  
  background-repeat: repeat-x;  
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#80000000', endColorstr='#00000000', GradientType=1);  
}  
.carousel-control.right {  
  left: auto;  
  right: 0;  
   
  background-image:none;  
  background-repeat: repeat-x;  
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#80000000', GradientType=1);  
}
</style>
<?php
	session_start();
	if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
?>
<div class="container" style="width: 100%;">
	<?php include("top.php"); ?>
	<div class="row" style="width: 90%;margin: 0 auto;">
		<div class="col-md-12" style="padding: 0;margin: 0;background-color: white;">
			<ol class="breadcrumb" style="background-color: white;">
			    <li><a href="index.php">首页</a></li>
			    <li><a href="flower.php">鲜花</a></li>
			    <li class="active">个人中心</li>
			</ol>
		</div>
	</div>
	<div class="row" style="width: 90%;margin: 0 auto;margin-bottom: 100px;">
		<div class="col-md-12" style="background-color: white;">
			<div class="row">
				<div class="col-md-3" style="height: auto;border: 1px;background: white;margin-bottom: 100px;">
					
					<?php include("personleft.php"); ?>
					
				</div>
				<div class="col-md-9" style="background-color: white;">
					<div class="panel panel-default">
					    <div class="panel-heading">
					      欢迎<span style="font-size: 20px;"><?php echo $_SESSION['user_name']; ?></span>进入个人中心
					    </div>
					    <div class="panel-body">
					       <?php
					       	$user_id=$_SESSION['user_id'];
					       	$sql=mysql_query("select * from user where user_id='$user_id'");
					       	@$num=mysql_num_rows($sql);
					       	if($num<=0){
					       		?>
					       		<span>对不起，系统出错了，请联系客服</span>
					       		<?php
					       	}else{
					       		$user=mysql_fetch_array($sql);
					       		?>
					       		<div class="row">
					       			<div class="col-md-4" style="background-color: white;">
					       				<img style="border-radius: 70px;" src="../img/default_user_portrait.gif"/><span>用户号：<?php echo $user['user_id']; ?></span>
					       			</div>
					       			<div class="col-md-8" style="background-color: white;">
						       			<ul id="send" style="margin-left: 100px;margin-top: 50px;" class="list-inline">
							       				<li style="">
							       					<?php
							       						@$get_money=mysql_query("select * from book where user_id='$user_id' and state='待付款'");
							       						@$get_moneynum=mysql_num_rows($get_money);
							       						if(@$get_moneynum<=0){
							       							?>
							       							<a>
							       								待付款
							       								<span class="badge">
							       							<?php
							       							echo @$get_moneynum;
							       								?>
							       								</span>
							       							</a>
							       							<?php
							       						}else{
							       							?>
									       					<a href="#">待付款
									       						<span class="badge">
									       							<?php
									       							echo @$get_moneynum;
									       								?>
									       						</span>
									       					</a>
							       							<?php
							       						}
							       						?>
							       				</li>
							       				<li>
							       					<?php
							       						@$fa=mysql_query("select * from book where user_id='$user_id' and state='未发货'");
							       						@$fa_num=mysql_num_rows($fa);
							       						if(@$fa_num<=0){
							       							?>
							       							<a>
							       								待发货
							       								<span class="badge">
							       							<?php
							       							echo @$fa_num;
							       								?>
							       								</span>
							       							</a>
							       							<?php
							       						}else{
							       							?>
									       					<a href="see_order.php?type=未发货">待发货
									       					<span class="badge">
									       						<?php
									       							@$fa=mysql_query("select * from book where user_id='$user_id' and state='未发货'");
									       							@$fa_num=mysql_num_rows($fa);
									       							echo $fa_num;
									       							?>
									       					</span>
									       					</a>
							       							<?php
							       						}
							       						?>
							       				</li>
							       				<li>
							       					<?php
							       						@$get_thing=mysql_query("select * from book where user_id='$user_id' and state='待收货'");
							       						@$get_thingnum=mysql_num_rows($get_thing);
							       						if(@$get_thingnum<=0){
							       							?>
							       							<a>
							       								待收货
							       								<span class="badge">
							       							     0
							       								</span>
							       							</a>
							       							<?php
							       						}else{
							       							?>
									       					<a href="see_order.php?type=待收货">待收货
									       						<span class="badge">
									       							
									       							<?php
									       							
									       							echo @$get_thingnum;
									       								?>
									       						</span>
									       					</a>
							       							<?php
							       						}
							       						?>
							       				</li>
							       				<li>
							       					<?php
							       						@$get_content=mysql_query("select * from book where user_id='$user_id' and state='待评价'");
							       						@$get_contentnum=mysql_num_rows($get_content);
							       						if(@$get_contentnum<=0){
							       							?>
							       							<a>
							       								待评价
							       								<span class="badge">
							       							<?php
							       							echo @$get_contentnum;
							       								?>
							       								</span>
							       							</a>
							       							<?php
							       						}else{
							       							?>
									       					<a href="see_order.php?type=待评价">待评价
									       						<span class="badge">
									       							<?php
									       							echo @$get_contentnum;
									       								?>
									       						</span>
									       					</a>
							       							<?php
							       						}
							       						?>
							       				</li>
							       				<li>
							       					<?php
							       						@$get_con=mysql_query("select * from book where user_id='$user_id' and state='已评价'");
							       						@$get_connum=mysql_num_rows($get_con);
							       						if(@$get_connum<=0){
							       							?>
							       							<a>
							       								已完成
							       								<span class="badge">
							       							<?php
							       							echo @$get_connum;
							       								?>
							       								</span>
							       							</a>
							       							<?php
							       						}else{
							       							?>
							       							<a href="see_order.php?type=已评价">已完成<span class="badge">
							       					<?php
							       							echo @$get_connum;
							       								?>
							       						</span></a>
							       							<?php
							       						}
							       						?>
							       					</li>
							       		</ul>
					       			</div>
					       		</div>
					       		<div class="row" style="margin-top: 20px;">
					       			<div class="col-md-12" style="background-color: white;">
					       				<ul class="list-inline">
					       					<li>帐户余额:￥<?php echo $user['money']; ?></li>
					       					<li>
					       						累计消费:
					       						<?php
					       							$menoy=mysql_query("select * from book where user_id='$user_id'");
					       							@$m=mysql_num_rows($menoy);
					       							if(@$m<=0){
					       								?>
					       								<span>￥0</span>
					       								<?php
					       							}else{
					       								$total=0;
					       								while($mm=mysql_fetch_array($menoy)){
					       									$total=$total+$mm['sum_price'];
					       								}
					       								?>
					       								<span>￥<?php echo $total; ?></span>
					       								<?php
					       							}
					       							?>
					       					</li>
					       					<li>
					       						消费次数:<?php echo $m; ?>
					       					</li>
					       					<li>
					       						积分:<?php echo $user['jifen']; ?>
					       					</li>
					       				</ul>
					       			</div>
					       		</div>
					       		
					       		<div class="row" style="margin-top: 20px;">
					       			<div class="col-md-12" style="background-color: white;">
					       				<ul class="list-inline">
					       					<li><img src="../img/like_bg_n.png" /><span style="font-size: 20px;">花心思</span></li>
					       					<li style="margin-left: 100px;">
					       						<ul class="list-inline">
					       							<?php
					       								$know_type=mysql_query("select * from know_type limit 0,6");
					       								@$knownum=mysql_num_rows($know_type);
					       								if($knownum<=0){
					       									?>
					       									<span>暂无花知识</span>
					       									<?php
					       								}else{
					       									while($know=mysql_fetch_array($know_type)){
					       										?>
					       										<li><a class="btn btn-default" href="article_cat.php?type=<?php echo $know['know_id']; ?>"><?php echo $know['know_name'] ?></a></li>
					       										<?php
					       									}
					       								}
					       								?>
					       						</ul>
					       					</li>
					       				</ul>
					       			</div>
					       		</div>
					       		
					       				<?php  
					       					$f=mysql_query("select * from book where get_hua!='' order by book_time desc");
					       					@$fnum=mysql_num_rows($f);
					       					if($fnum<=0){
					       						
					       					}else{
					       						?>
									       		<div class="row">
									       			<div class="col-md-12" style="background-color: white;">
									       				<h4><img src="../img/like_bg_n.png" />送花感动<small>送出的每一束鲜花，都有无限的感动！</small></h4>
									       			</div>
									       		</div>
									       		<div class="row" style="margin-top: 30px;">
									       			<div class="col-md-12" style="background-color: white;">
												    	<div id="myCarousel" class="carousel slide">
														<!-- 轮播（Carousel）指标 -->
														<ol class="carousel-indicators">
															<?php
																for($i=0;$i<$fnum;$i++){
																	?>
																	<li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" class="active"></li>
																	<?php
																}
																?>
														</ol>   
														<!-- 轮播（Carousel）项目 -->
														<div class="carousel-inner">
															<?php
																$b=-1;
																while($flower=mysql_fetch_array($f)){
																	$b++;
																	$book_id=$flower['book_id'];
																	$de=mysql_query("select  order_detail.good_id, goods.main_img,goods.good_hua from order_detail,goods where order_detail.good_id=goods.good_id and book_id='$book_id' limit 0,1");
																	@$denum=mysql_fetch_array($de);
																	if($b==0){
																		?>
																	<div class="item active">
																		<div class="row">
																			<div class="col-md-5" style="margin: 0;padding: 0;background-color: white;">
																				<div class="thumbnail" style="margin: 0;padding: 0;">
																					<a href="see_good.php?good_id=<?php echo $denum['good_id']; ?>"><img src="<?php echo $denum['main_img']; ?>" alt="First slide"></a>
																				</div>
																			</div>
																			<div class="col-md-7" style="text-align: center;margin-top: 30px;background-color: transparent;">
																				<h3>花语:</h3>
																				<p>
																					<?php echo $denum['good_hua']; ?>
																				</p>
																				<h3>贺卡内容:</h3>
																				<p style="text-align: center;">
																					<?php
																					echo $flower['get_hua'];
																					?>
																				</p>
																					<a class="btn btn-danger btn-lg" href="see_good.php?good_id=<?php echo $denum['good_id']; ?>">我也要购买</a>
																			</div>
																		</div>
																	</div>
																		<?php
																	}else{
																		?>
																		<div class="item">
																			<div class="row">
																				<div class="col-md-5" style="margin: 0;padding: 0;background-color: white;">
																					<div class="thumbnail" style="margin: 0;padding: 0;">
																						<a href="see_good.php?good_id=<?php echo $denum['good_id']; ?>"><img src="<?php echo $denum['main_img']; ?>" alt="First slide"></a>
																					</div>
																				</div>
																				<div class="col-md-7" style="text-align: center;margin-top: 30px;background-color: transparent;">
																					<h3>花语:</h3>
																					<p>
																						<?php echo $denum['good_hua']; ?>
																					</p>
																					<h3>贺卡内容:</h3>
																					<p style="text-align: center;">
																						<?php
																						echo $flower['get_hua'];
																						?>
																					</p>
																						<a class="btn btn-danger btn-lg" href="see_good.php?good_id=<?php echo $denum['good_id']; ?>">我也要购买</a>
																				</div>
																			</div>
																		</div>
																		<?php
																	}
																	?>
																	<?php
																}
																?>
														</div>
														<!-- 轮播（Carousel）导航 -->
														<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
															<span style="background-color: gray;" class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
															<span class="sr-only">Previous</span>
														</a>
														<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
															<span style="background-color: gray;" class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
															<span class="sr-only">Next</span>
														</a>
													</div>
								       			</div>
								       		</div>
					       						<?php
					       					}
					       					?>
					      
					       		<?php
					       	}
					       	?>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include("footer.php"); ?>
</div>
<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='login.php';</script>";}  ?>
	
<script type="text/javascript" src="../js/index.js"></script>
<script>
	$(function () { $("[data-toggle='tooltip']").tooltip(); });
</script>