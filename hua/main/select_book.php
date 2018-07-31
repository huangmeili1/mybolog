<meta charset="utf-8" />
<style>
	#rating li{
		background: url(../img/star.png);
		list-style: none;
		float: left;
		width: 31px;
		height: 31px;
	}
</style>
<?php
session_start();
include("../conn/dataconnection.php");
@$tel=$_POST['tel'];
@$book_id=$_POST['book_id'];
@$code=$_POST['code'];
$old_code=$_SESSION['Login_code'];
	if($old_code==$code){
		$sql=mysql_query("select * from user where user_tel='$tel'");
		@$sql_num=mysql_num_rows($sql);
		if($sql_num>0){
			@$s=mysql_fetch_array($sql);
			@$u_id=$s['user_id'];
			$b=mysql_query("select * from book where book_id='$book_id' and user_id='$u_id'");
			@$b_num=mysql_num_rows($b);
			if($b_num>0){
				?>
				<?php
						@$book=mysql_fetch_array($b);
						?>
				<table class="table table-hover">
					<caption><b>订单详情</b>
						<?php
							if($book['state']=='已评价'||$book['state']=='待评价'){
								?>
								<a class="btn btn-success" style="text-align: center;text-decoration: none;" href="del_order.php?book_id=<?php echo $book['book_id']; ?>">删除订单</a>
								<?php
							}
							?>
					</caption>
						<tr>
							<td>订单编号</td>
							<td><?php echo $book['book_id']; ?></td>
						</tr>
						<tr>
							<td>订单状态</td>
							<td>
								<?php echo $book['state']; ?>
							</td>
						</tr>
						<tr>
							<td colspan="2"><b>订货人信息</b></td>
						</tr>
						<tr>
							<?php
								@$user_id=$book['user_id'];
								@$user=mysql_query("select * from user where user_id='$user_id'");
								@$u=mysql_fetch_array($user);
								?>
							<td>订货人手机</td>
							<td><?php echo $u['user_tel']; ?></td>
						</tr>
						<tr>
							<td>订货人真实姓名</td>
							<td>
								<?php echo $u['realname']; ?>
							</td>
						</tr>
				</table>
				<table class="table table-hover">
					<caption><b>收货人详情</b></caption>
					<?php
						@$get_id=$book['get_id'];
						@$get=mysql_query("select * from getinfo where get_id='$get_id'");
						@$get_num=mysql_num_rows($get);
						if($get_num<=0){
							?>
							<tr>
								<td colspan="2">此收货人已经被删除了</td>
							</tr>
							<?php
						}else{
							@$g=mysql_fetch_array($get);
							?>
							<tr>
								<td>收货人姓名</td>
								<td><?php echo $g['get_name'] ?></td>
							</tr>
							<tr>
								<td>收货人手机</td>
								<td><?php echo $g['get_tel'] ?></td>
							</tr>
							<tr>
								<td>收货人地址</td>
								<td><?php echo $g['get_add'] ?></td>
							</tr>
							<tr>
								<td>收货人邮编</td>
								<td><?php echo $g['get_post'] ?></td>
							</tr>
							<?php
						}
						?>
				</table>
				<table class="table table-hover">
					<caption><b>订单其他详情</b></caption>
					<tr>
						<td>下单时间</td>
						<td><?php echo $book['book_time']; ?></td>
					</tr>
					<tr>
						<td>发货时间</td>
						<td><?php echo $book['send_time']; ?></td>
					</tr>
					<tr>
						<td>收货时间</td>
						<td><?php echo $book['get_time']; ?></td>
					</tr>
				</table>
				<table class="table">
					<caption><b>商品详情</b></caption>
					<?php
							@$de=mysql_query("select * from order_detail where book_id='$book_id'");
							@$de_num=mysql_num_rows($de);
							if($de_num<=0){
								?>
								<tr>
									<td colspan="2">
										此订单的商品已经全部下架了
									</td>
								</tr>
								<?php
							}else{
								?>
									<thead>
										<th>商品名称</th>
										<th>商品购买价格</th>
										<th>购买数量</th>
										<th>小计</th>
									</thead>
								<?php
								while($good=mysql_fetch_array($de)){
									@$good_id=$good['good_id'];
									@$go=mysql_query("select * from goods where good_id='$good_id'");
									@$go_num=mysql_num_rows($go);
									if($go_num<=0){
										?>
										<tr>
											<td>此商品已经下架了</td>
											<td><?php echo $good['price'] ?></td>
											<td><?php echo $good['num']; ?></td>
											<td>￥<?php echo $good['price']*$good['num']; ?></td>
										</tr>
										<?php
									}else{
										@$gg=mysql_fetch_array($go);
										?>
										<tr>
											<td>
												<div class="thumbnail" style="width: 150px;height: 200px;">
													<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $gg['good_id']; ?>">
													<img style="width: 150px;height: 150px;" src="<?php echo $gg['main_img']; ?>" />
													<div class="caption" style="text-align: center;">
														<?php echo $gg['good_name']; ?>
													</div>
													</a>
												</div>
											</td>
											<td style="line-height: 200px;">￥<?php echo $good['price']; ?></td>
											<td style="line-height: 200px;"><?php echo $good['num']; ?></td>
											<td style="line-height: 200px;">￥<?php echo $good['price']*$good['num']; ?></td>
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
									此订单总金额为:<span style="color: red;">
										￥<?php echo $book['sum_price']; ?>
									</span>
									优惠:<span style="color: red;">
										￥<?php echo $book['cheap']; ?>
									</span>
								</td>
							</tr>
				</table>
				<table class="table table-hover">
					<caption>
						<b>订单评价</b>
					</caption>
					<?php
						@$comments=mysql_query("select * from comments where book_id='$book_id'");
						@$comments_num=mysql_num_rows($comments);
						if(@$comments_num<=0){
							?>
							<tr>
								<td colspan="4"><b style="font-size: 24px;">此订单暂时没有评价</b></td>
							</tr>
							<?php
						}else{
							while($con=mysql_fetch_array($comments)){
								@$g_id=$con['good_id'];
								@$g_i=mysql_query("select * from goods where good_id='$g_id'");
								@$gg_n=mysql_fetch_array($g_i);
								?>
								<tr>
									<td>
										<div class="thumbnail" style="width: 150px;height: 230px;">
											<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $g_id; ?>">
											<h4 style="text-align: center;">评价商品</h4>
											<img src="<?php echo $gg_n['main_img']; ?>" />
											<div class="caption" style="text-align: center;">
												<h4><?php echo $gg_n['good_name'] ?></h4>
											</div>
											</a>
										</div>
									</td>
									<td>
										<div class="thumbnail" style="height: 240px;width: 270px;">
											<h4 style="text-align: center;">评价图片</h4>
											<?php
												if($con['content_img']==''){
													echo "没有评价图片";
												}else{
													?>
													<img style="width: 170px;height: 150px;" src="<?php echo $con['content_img']; ?>" />
													<?php
												}
												?>
											<div class="caption">
												<ul id="rating" class="rating">
												<?php
														$xinxin=$con['xinxin']; 
																		$rewo=array("很不好","不好","一般","好","很好");
																		?>
																		<ul class="rating" id="rating">
																			<?php  
																				for($i=0;$i<$xinxin;$i++){
																					?>
																					<li style="background-position-y: -38px;" class="rating-item" title="<?php echo $rewo[$i] ?>"></li>
																					<?php
																				}
																				@$l=count($rewo);
																				for($i=$xinxin;$i<$l;$i++){
																					?>
																					<li class="rating-item" title="<?php echo $rewo[$i] ?>"></li>
																					<?php
																				}
																				?>
																				
																		</ul>
											</div>
										</div>
									</td>
									<td>
										<h4>评价内容：
											<?php 
												@$con_id=$con['commet_id'];
												 ?>
										<a href="del_content.php?commet_id=<?php echo $con_id; ?>" style="text-decoration: none;">删除评价</a>
										</h4>
										<p>
											<?php echo $con['content']; ?>
										</p>
									</td>
								</tr>
								<?php
							}
							?>
							
							<?php
						}
						?>
				</table>
				<?php
			}else{
				?>
				<div class="row" style="text-align: center;color: red;">订单号错误,手机号码与订单号不匹配</div>
				<?php
			}
		}else{
		?>
		<div class="row" style="text-align: center;color: red;">手机号码错误</div>
		<?php
		}
	}else{
		?>
		<div class="row" style="text-align: center;color: red;">验证码错误</div>
		<?php
	}
?>