<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>用户列表</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	body{
		margin-top: 50px;
	}
	#rating li{
		background: url(../img/star.png);
	    list-style: none;
		float: left;
		width: 31px;
		height: 33px;
	}
</style>
<div class="container" style="width: 100%;">
	<?php  include("m_top.php"); ?>
<?php
	session_start();
	include("../conn/dataconnection.php");
	if(@$_SESSION['admin_id']!=''&&@$_SESSION['type']!=''&&@$_SESSION['admin_name']!=''){
		@$book_id=$_GET['book_id'];
		@$sql=mysql_query("select * from book where book_id='$book_id'");
		@$sql_num=mysql_num_rows($sql);
		if($sql_num<=0){
			?>
			<div class="row">
				<div class="col-md-12" style="text-align: center;font-size: 24px;">
					暂时无法查看此订单的信息，请联系网站维护员
				</div>
			</div>
			<?php
		}else{
			?>
			<div class="row">
				<div class="col-md-12" style="text-align: center;font-size: 24px;margin-top: 24px;">
					订单编号为：<?php echo @$book_id; ?>的详情
				</div>
			</div>
			<?php
			@$order=mysql_fetch_array($sql);
			?>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-hover">
						<caption style="text-align: left;color: red;font-size: 24px;">订单信息</caption>
						<tbody>
							<tr>
								<td>
									订单编号:
								</td>
								<td>
									<?php echo $order['book_id']; ?>
									
								</td>
							</tr>
							<tr>
								<td>订单状态：</td>
								<td>
									<?php
										echo $order['state'];
										?>
								</td>
							</tr>
							
						</tbody>
					</table>
					<table class="table table-hover">
						<caption style="text-align: left;color: red;">订单订货人信息</caption>
						<?php
							@$user_id=$order['user_id'];
							@$u=mysql_query("select * from user where user_id='$user_id'");
							@$u_num=mysql_num_rows($u);
							if(@$u_num<=0){
								?>
								<tr>
									<td colspan="2">此订货人已经被删除了</td>
								</tr>
								<?php
							}else{
								@$user=mysql_fetch_array($u);
								?>
								<tr>
									<td>订货人编号：</td>
									<td><?php echo $user['user_id']; ?></td>
								</tr>
								<tr>
									<td>订货人真实姓名:</td>
									<td><?php echo $user['realname']; ?></td>
								</tr>
								<tr>
									<td>订货人手机号码：</td>
									<td><?php echo $user['user_tel']; ?></td>
								</tr>
								<?php
							}
							?>
					</table>
					<table class="table table-hover">
						<caption style="text-align: left;color: red;font-size: 20px;">订单收货人信息</caption>
						<?php
							@$get_id=$order['get_id'];
							@$g=mysql_query("select * from getinfo where get_id='$get_id'");
							@$g_num=mysql_num_rows($g);
							if(@$g_num<=0){
								?>
								<tr>
									<td colspan="2" style="text-align: center;">此收货人已经被用户删除了</td>
								</tr>
								<?php
							}else{
								@$g_g=mysql_fetch_array($g);
								?>
								<tr>
								<td>收货人姓名：</td>
								<td><?php
									echo $g_g['get_name'];
									?></td>
							</tr>
							<tr>
								<td>收货人手机号码：</td>
								<td><?php
									echo $g_g['get_tel'];									
									?></td>
							</tr>
							<tr>
								<td>收货地址：</td>
								<td>
									<?php
										echo $g_g['get_add'];
										?>
								</td>
							</tr>
							<tr>
								<td>收货人邮政编码：</td>
								<td>
									<?php
										echo $g_g['get_post'];
										?>
								</td>
							</tr>
							<tr>
								<td>留言:</td>
								<td><?php echo $order['get_hua']; ?></td>
							</tr>
								<?php
							}
							?>
					</table>
					<table class="table table-hover">
						<caption style="text-align: left;color: red;font-size: 20px;">订单商品详情</caption>
						<?php
							@$good=mysql_query("select * from order_detail where book_id='$book_id'");
							@$good_num=mysql_num_rows($good);
							if(@$good_num<=0){
								?>
								<tr>
									<td colspan="2">此订单的商品已经被删除</td>
								</tr>
								<?php
							}else{
								?>
								<tr>
									<th>商品名称</th>
									<th>商品单价</th>
									<th>购买数量</th>
									<th>小计</th>
								</tr>
								<?php
								while(@$gg=mysql_fetch_array($good)){
									@$good_g=$gg['good_id'];
									@$g_s=mysql_query("select * from goods where good_id='$good_g'");
									@$g_s_num=mysql_num_rows($g_s);
									if(@$g_s_num<=0){
										?>
										<tr>
											<td colspan="4">此商品已经被删除</td>
										</tr>
										<?php
									}else{
										@$re_good=mysql_fetch_array($g_s);
										?>
										<tr>
											<td>
												<div class="thumbnail" style="height: 190px;width: 150px;">
													<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $re_good['good_id']; ?>">
													<img style="height: 150px;width: 150px;" src="<?php echo $re_good['main_img']; ?>" />
													<div class="caption" style="text-align: center;">
														<p><?php echo $re_good['good_name']; ?></p>
													</div>
													</a>
												</div>
											</td>
											<td style="line-height: 200px;">
												￥<?php echo $gg['price']; ?>
											</td>
											<td style="line-height: 200px;">
												<?php echo $gg['num']; ?>
											</td>
											<td style="line-height: 200px;">
												￥
												<?php
													echo $gg['num']*$gg['price'];
													?>
											</td>
										</tr>
										<?php
									}
									?>
									<?php
								}
							}
							?>
							<tr>
								<td colspan="4" style="text-align: center;">
								此订单的总金额为：￥<span style="color: red;"><?php echo $order['sum_price']; ?></span>
									<span>所用优惠为:<span style="color: red;"><?php echo $order['cheap']; ?></span></span>
								</td>
							</tr>
					</table>
					<table class="table table-hover">
						<caption style="text-align: left;color: red;font-size: 20px;">
							评价详情：
						</caption>
						<?php
							@$c=mysql_query("select * from comments where book_id='$book_id'");
							@$c_num=mysql_num_rows($c);
							if($c_num<=0){
								?>
								<tr>
									<td colspan="4" style="text-align: center;">此订单暂无评价</td>
								</tr>
								<?php
							}else{
								while($con=mysql_fetch_array($c)){
									@$go_id=$con['good_id'];
									@$go_g=mysql_query("select * from goods where good_id='$go_id'");
									@$go_g_num=mysql_num_rows($go_g);
									
									?>
									<tr>
										<td>
											<div class="row">
												<div class="col-md-3" style="margin: 0;padding: 0;">
													<div class="thumbnail" style="width: 250px;height: 280px;">
														<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $go_id; ?>">
														<h4 style="text-align: center;">评价商品</h4>
														<?php
															if(@$go_g_num<=0){
																echo "此订单商品已经删除了";
															}else{
																@$ggo=mysql_fetch_array($go_g);
																?>
																<img style="width: 250px;height: 200px;" src="<?php echo $ggo['main_img']; ?>" />
																<?php
															}
															?>
															<div class="caption" style="text-align: center;">
																<?php echo $ggo['good_name']; ?>
															</div>
														</a>
													</div>
												</div>
												<div class="col-md-3" style="margin: 0;padding: 0;">
													<div class="thumbnail" style="width: 250px;height: 300px;">
														<h4 style="text-align: center;">评价图片</h4>
														<?php
															if(@$con['content_img']==''){
																echo "无评价图片";
															}else{
																
																?>
																<img style="width: 250px;height: 200px;" src="<?php echo $con['content_img']; ?>" />
																<?php
															}
															?>
															<div class="caption" style="text-align: center;">
																<?php
											    				$xinxin=$con['xinxin'];
											    				$ar=array("很不好","不好","一般","好","很好");
											    				?>
											    				<ul class="rating" id="rating">
											    					<?php
											    						for($i=0;$i<$xinxin;$i++){
											    							?>
											    							<li style="background-position-y: -38px;" class="rating-item" title="<?php echo $ar[$i]; ?>"></li>
											    							<?php
											    						}
											    						@$l=count($ar);
											    						for($i=$xinxin;$i<$l;$i++){
											    							?>
											    							<li class="rating-item" title="<?php echo $ar[$i]; ?>"></li>
											    							<?php
											    						}
											    						?>
											    				</ul>
											    				
															</div>
													</div>
												</div>
												<div class="col-md-4" style="padding: 0;margin: 0;">
													<h4>评价内容：</h4>
													<?php echo $con['content']; ?>
												</div>
											</div>
											
										</td>
									</tr>
									<?php
								}
							}
							?>
					</table>
				</div>
			</div>
			<?php
		}
		?>
		</div>
<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>