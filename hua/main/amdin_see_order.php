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
	include_once("../conn/dataconnection.php");
	if(@$_SESSION['admin_id']!=''&&@$_SESSION['type']!=''&&@$_SESSION['admin_name']!=''){
		@$book_id=$_POST['book_id'];
		$sql=mysql_query("select * from book where book_id='$book_id'");
		$sql_num=mysql_num_rows($sql);
		if(@$sql_num<=0){
			?>
			<span>此订单信息已经删除</span>
			<?php
		}else{
		$order=mysql_fetch_array($sql);
		?>
		<table class="table table-hover">
			<caption style="color: red;">查看订单详情</caption>
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
		<?php
			@$user_id=$order['user_id'];
			@$user=mysql_query("select * from user where user_id='$user_id'");
			@$user_num=mysql_num_rows($user);
			if($user_num<=0){
				?>
				<span>此订货人信息已经被删除</span>
				<?php
			}else{
				$user_name=mysql_fetch_array($user);
				?>
				<table class="table table-hover">
					<caption style="color: red;">订货人详情</caption>
					<tr>
						<td>订货人姓名:</td>
						<td><?php echo $user_name['realname']; ?></td>
					</tr>
					<tr>
						<td>订货人手机:</td>
						<td><?php echo $user_name['user_tel']; ?></td>
					</tr>
					<tr>
						<td>订货人邮箱:</td>
						<td>
							<?php
								echo $user_name['email'];  
								?>
						</td>
					</tr>
				</table>
				<?php
					@$get_id=$order['get_id'];
					@$info=mysql_query("select * from getinfo where get_id='$get_id'");
					@$info_num=mysql_num_rows($info);
					if($info_num<=0){
						?>
						<span>此收货人信息已经被删除</span>
						<?php
					}else{
						$get=mysql_fetch_array($info);
						?>
						<table class="table table-hover">
							<caption style="color: red;">收货人信息详情</caption>
							<tr>
								<td>收货人姓名：</td>
								<td><?php
									echo $get['get_name'];
									?></td>
							</tr>
							<tr>
								<td>收货人手机号码：</td>
								<td><?php
									echo $get['get_tel'];									
									?></td>
							</tr>
							<tr>
								<td>收货地址：</td>
								<td>
									<?php
										echo $get['get_add'];
										?>
								</td>
							</tr>
							<tr>
								<td>收货人邮政编码：</td>
								<td>
									<?php
										echo $get['get_post'];
										?>
								</td>
							</tr>
						</table>
						<table class="table table-hover">
							<caption style="color: red;">其他订单详情</caption>
							<tr>
								<td>订单产生时间:</td>
								<td>
									<?php echo $order['book_time']; ?>
								</td>
							</tr>
							<tr>
								<td>
									订单发货时间:
								</td>
								<td>
									<?php echo $order['send_time']; ?>
								</td>
							</tr>
							<tr>
							<td>确认收货时间:</td>
							<td>
								<?php echo $order['get_time']; ?>
							</td>
							</tr>
						</table>
						<table class="table table-hover">
							<caption style="color: red;">商品详情</caption>
							<thead>
								<th>商品名称</th>
								<th>商品单价</th>
								<th>购买数量</th>
								<th>小计</th>
							</thead>
							<?php
								@$gg=mysql_query("select * from order_detail where book_id='$book_id'");
								@$gg_num=mysql_num_rows($gg);
								if(@$gg<=0){
									?>
									<span>暂时无法查看些订单的商品详情</span>
									<?php
								}else{
									while($book=mysql_fetch_array($gg)){
										@$good_id=$book['good_id'];
										@$good=mysql_query("select * from goods where good_id='$good_id'");
										@$good_num=mysql_num_rows($good);
										if($good_num<=0){
											?>
											<span>此商品已经下架，暂时无法查看</span>
											<?php
										}else{
											@$goos=mysql_fetch_array($good);
											?>
											<tr>
												<td>
													<div class="thumbnail" style="width: 150px;">
														<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $goos['good_id']; ?>">
														<img src="<?php echo $goos['main_img']; ?>" />
														<div class="caption" style="text-align: center;">
															<?php echo $goos['good_name']; ?>
														</div>
														</a>
													</div>
												</td>
												<td style="line-height: 180px;">
													￥<?php echo $book['price']; ?>
												</td>
												<td style="line-height: 180px;">
													<?php echo $book['num']; ?>
												</td>
												<td style="line-height: 180px;">
													￥<?php echo $book['num']*$book['price']; ?>
												</td>
											</tr>
											<?php
										}
										
										?>
										<?php
									}
									?>
									<tr>
										<td colspan="4" align="center">
											<span>此订单产生的总金额为:<span style="color: red;">￥<?php echo $order['sum_price']; ?></span></span>
										</td>
									</tr>
								<?php
								}
								?>
						</table>
						<?php
							$state=$order['state'];
							if($state=='已评价'){
								$content=mysql_query("select * from comments where book_id='$book_id'");
								@$content_num=mysql_num_rows($content);
								if($content_num<=0){
									?>
									<span>此商品的评价已经被删除</span>
									<?php
								}else{
									?>
									<table class="table table-hover">
										<caption style="color: red;">评价详情</caption>
									<?php
									while($co=mysql_fetch_array($content)){
										$con_good_id=$co['good_id'];
										@$s=mysql_query("select * from goods where good_id='$con_good_id'");
										@$s_num=mysql_num_rows($s);
										if($s_num<=0){
											?>
											<span>此商品已经下架了</span>
											<?php
										}else{
											$ggg=mysql_fetch_array($s);
											?>
											
												<tr>
													<td>
														<div class="thumbnail" style="width: 150px;">
															<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $ggg['good_id']; ?>">
															<img src="<?php echo $ggg['main_img']; ?>" />
															<div class="caption" style="text-align: center;">
																<?php echo $ggg['good_name']; ?>
															</div>
															</a>
														</div>
													</td>
													<td>
														<div class="thumbnail" style="width: 150px;height: 200px;">
															<img style="height: 160px;" src="<?php echo $co['content_img']; ?>" />
															<div class="caption" style="text-align: center;">评价图片</div>
														</div>
													</td>
													<td>
														<table>
															<tr>
																<td>
																	<b>评价星级：</b><?php 
																		$xinxin=$co['xinxin']; 
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
																		<?php
																		?>
																</td>
															</tr>
															<tr>
																<td>
																	<b>评价内容：</b><br>
																	<?php
																		echo $co['content'];
																		?>
																</td>
															</tr>
														</table>
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
								}
							}
							?>
						
						<?php
					}
					?>
				<?php
			}
			?>
		<?php
		
		}
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>