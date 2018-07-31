<meta charset="utf-8" />
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	#rating li{
	background: url(../img/star.png);
	list-style: none;
	width: 31px;
	height: 33px;
	float: left;
	}
</style>
<?php
	session_start();
	include_once("../conn/dataconnection.php");
	if(@$_SESSION['admin_id']!=''&&@$_SESSION['type']!=''&&@$_SESSION['admin_name']!=''){
		$user_id=$_POST['user_id'];
		@$user=mysql_query("select * from user where user_id='$user_id'");
		@$user_num=mysql_num_rows($user);
		if($user_num<=0){
			?>
			<span>暂时无法查看此用户信息</span>
			<?php
		}else{
			@$user_de=mysql_fetch_array($user);
			?>
			<div style="color: red;"><button onclick="hide_how()" class="btn btn-danger">用户信息详情</button></div>
			<div id="how_to" style="margin-top: 20px;">
				<table class="table table-hover">
					
					<tr>
							<td>用户编号：</td>
							<td><?php echo $user_de['user_id']; ?></td>
								<td>用户昵称：</td>
								<td><?php echo $user_de['user_name']; ?></td>
					</tr>
					<tr>
								<td>用户性别：</td>
								<td><?php echo $user_de['sex']; ?></td>
									<td>用户真实姓名：</td>
									<td><?php echo $user_de['realname']; ?></td>
					</tr>
					<tr>
								<td>用户手机号码:</td>
								<td><?php echo $user_de['user_tel']; ?></td>
								<td>用户邮箱:</td>
								<td><?php echo $user_de['email']; ?></td>
						
					</tr>
					<tr>
						<td>用户最近使用ip地址：</td>
						<td>
							<?php echo $user_de['ip']; ?>
						</td>
						<td>
							用户积分：
						</td>
						<td>
							<?php echo $user_de['jifen']; ?>
						</td>
					</tr>
					<tr>
						<td>用户经验:</td>
						<td><?php echo $user_de['jingyan']; ?></td>
						<td>用户类型:</td>
						<td>
							<?php
								@$type_id=$user_de['type_id'];
								@$sql=mysql_query("select * from user_type where type_id='$type_id'");
								@$t=mysql_fetch_array($sql);
								echo $t['type_name'];
								?>
						</td>
					</tr>
					<tr>
						<td>注册时间：</td>
						<td><?php echo $user_de['user_time']; ?></td>
						<td></td>
						<td></td>
					</tr>
					
					
					
					
				</table>
			</div>
			
			<div style="color: red;margin-top: 20px;"><button onclick="hide_address()" class="btn btn-danger">用户收货地址详情</button></div>
			<?php
						@$get=mysql_query("select * from getinfo where user_id='$user_id'");
						@$get_num=mysql_num_rows($get);
						if($get_num<=0){
							?>
							<span style="margin-left: 400px;font-size: 24px;">此用户无收货地址</span>
							<?php
						}else{
							?>
							<div id="address2_1">
								<table class="table table-hover">
									<thead>
										<th>编号</th>
										<th>收货人姓名</th>
										<th>收货人手机号码</th>
										<th>收货人地址</th>
										<th>收货人邮政编码</th>
									</thead>
									<tbody>
										<?php
											$i=0;
											while($g=mysql_fetch_array($get)){
												$i++;
												?>
												<tr>
													<td><?php echo $i; ?></td>
													<td><?php echo $g['get_name']; ?></td>
													<td><?php echo $g['get_tel']; ?></td>
													<td><?php echo $g['get_add']; ?></td>
													<td><?php echo $g['get_post']; ?></td>
												</tr>
												<?php
											}
											?>
									</tbody>
								</table>
							</div>
							<?php
						}
						?>
						<div style="color: red;margin-top: 20px;"><button onclick="hide_order()" class="btn btn-danger">用户订单详情</button></div>
						<div id="hide_order" style="display: block;">
						<?php
							@$order=mysql_query("select * from book where user_id='$user_id'");
							@$order_num=mysql_num_rows($order);
							if(@$order_num<=0){
								?>
								<span style="margin-left: 400px;font-size: 24px;">此用户无订单</span>
								<?php
							}else{
								?>
								<table class="table table-hover">
									<thead>
										<th>订单编号</th>
										<th>收货人姓名</th>
										<!--<th>收货地址</th>-->
										<th>收货手机号码</th>
										<th>下单时间</th>
										<th>发货时间</th>
										<th>确认收货时间</th>
										<th>订单总金额</th>
										<th>订单状态</th>
										<th>付钱方式</th>
										<th>
											操作
										</th>
									</thead>
									<tbody>
										<?php
											while($book=mysql_fetch_array($order)){
												?>
												<tr>
													<td><?php echo $book['book_id']; ?></td>
													<td>
														<?php
															@$get_id=$book['get_id'];
															@$gg=mysql_query("select * from getinfo where get_id='$get_id'");
															@$gg_num=mysql_num_rows($gg);
															if(@$gg_num<=0){
																?>
																<span>此收货人已经被用户删除</span>
																<?php
															}else{
																$get_name=mysql_fetch_array($gg);
																echo $get_name['get_name'];
															?>
													</td>
													<td>
														<?php echo $get_name['get_tel']; ?>
													</td>
													<?php }
															?>
															<td>
																<?php echo $book['book_time']; ?>
															</td>
													<td>
														<?php echo $book['send_time']; ?>
													</td>
													<td><?php echo $book['get_time']; ?></td>
													<td>￥<?php echo $book['sum_price']; ?></td>
													<td><?php echo $book['state']; ?></td>
													<td>
														<?php
															@$money_id=$book['money_id'];
															@$m=mysql_query("select * from getmoney where money_id='$money_id'");
															@$m_num=mysql_num_rows($m);
															if($m_num<=0){
																?>
																<span>此付款方式已经被删除</span>
																<?php
															}else{
																$mo=mysql_fetch_array($m);
																echo $mo['get_money'];
															}
															?>
													</td>
													<td id="td<?php echo $book['book_id']; ?>">
														<button onclick="see_user_order(<?php echo $book['book_id']; ?>)" class="btn btn-default">更多详情</button>
													</td>
												</tr>
												<tr>
													<td colspan="10" align="center">
														<input class="goods" type="hidden" value="<?php echo $book['book_id'] ?>" />
														<div class="show_you" id="she<?php echo $book['book_id']; ?>" style="display: none;">
															<span>收货地址：<?php echo @$get_name['get_add']; ?></span>
															<span>收货邮编：<?php echo @$get_name['get_post']; ?></span>
														<span style="float: left;color: red;">商品详情</span>
														<div class="row" id="div<?php echo $book['book_id']; ?>" style="width: 100%;height: auto;">
															<div class="col-md-12">
																<div class="row">
																	<?php
																		@$book_id=$book['book_id'];
																		@$del_t=mysql_query("select * from order_detail where book_id='$book_id'");
																		@$del_t_nmu=mysql_num_rows($del_t);
																		if($del_t_nmu<=0){
																			?>
																			<span>此订单的所有商品都已经下架了</span>
																			<?php
																		}else{
																			while($good=mysql_fetch_array($del_t)){
																				@$good_id=$good['good_id'];
																				@$go=mysql_query("select * from goods where good_id='$good_id'");
																				@$go_num=mysql_num_rows($go);
																				if($go_num<=0){
																					?>
																					<span>此商品已经下架了</span>
																					<?php
																				}else{
																					$goo=mysql_fetch_array($go);
																					?>
																					<div class="col-md-3">
																						<div class="thumbnail" style="height: 250px;">
																							<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $goo['good_id']; ?>">
																							<img style="width: 100%;height: 200px;" src="<?php echo $goo['main_img']; ?>" />
																							<div class="caption" style="text-align: center;">
																								<?php echo $goo['good_name']; ?>
																									<span>数量：<?php echo $good['num']; ?></span>
																									<span>单价:￥<?php echo $good['price']; ?></span>
																							</div>
																							</a>
																						</div>
																					</div>
																					<?php
																				}
																			}
																		}
																		?>
																</div>
															</div>
														</div>
														<span style="float: left;color: red;">评价详情</span>
														<div class="row">
															<div class="col-md-12">
																<?php
																	@$content=mysql_query("select * from comments where book_id='$book_id'");
																	@$contet_num=mysql_num_rows($content);
																	if(@$contet_num<=0){
																		?>
																		<span>此订单无评价可查看</span>
																		<?php
																	}else{
																		while($co=mysql_fetch_array($content)){
																			?>
																			<div class="col-md-12">
																				<table align="left">
																				<?php
																					@$g_id=$co['good_id'];
																					@$g_content=mysql_query("select * from goods where good_id='$g_id'");
																					@$g_num=mysql_num_rows($g_content);
																					if($g_num<=0){
																						?>
																						<span>此商品已经下架了</span>
																						<?php
																					}else{
																						@$g_i=mysql_fetch_array($g_content);
																						?>
																						<tr>
																							<td>
																								<div class="thumbnail" style="width: 150px;">
																									<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $good_id; ?>">
																									<img src="<?php echo $g_i['main_img'] ?>" />
																									<div class="caption" style="text-align: center;">被评价商品</div>
																									</a>																									
																								</div>
																							</td>
																							<td>
																								<div class="thumbnail" style="width: 150px;">
																									<img style="height: 150px;width: 150px;" src="<?php echo $co['content_img']; ?>" />
																									<div class="caption" style="text-align: center;">
																										<span>评价图片</span>
																									</div>
																								</div>
																							</td>
																							<td>
																								<table>
																									<tr>
																										<td><b>评价星级：</b></td>
																										<td>
																											<ul class="rating" id="rating">
																											<?php
																												@$xinxin=$co['xinxin'];
																												@$ar=array("很不好","不好","一般","好","很好");
																												for($i=0;$i<$xinxin;$i++){
																													?>
																													<li class="rating-item" style="background-position-y: -38px;" title="<?php echo $ar[$i]; ?>"></li>
																													<?php
																												}
																												@$l=count($ar);
																												for($i=$xinxin;$i<$l;$i++){
																													?>
																													<li class="rating-item" title="<?php echo $ar[$i] ?>"></li>
																													<?php
																												}
																												?>
																												</ul>
																												
																												<span style="float: right;">
																													评价时间:
																													<?php echo $co['comment_time']; ?>
																												</span>
																										</td>
																									</tr>
																									<tr>
																										<td width="80"><b>评价内容：</b></td>
																										<td>
																											<p><?php echo $co['content']; ?></p>
																										</td>
																									</tr>
																								</table>
																							</td>
																						</tr>
																						<?php
																					}
																					?>
																				</table>
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
													</td>
												</tr>
												<?php
											}
											?>
									</tbody>
								</table>
								<?php
							}
							?>
							</div>
			<?php
		}
	}
		?>
		
<script type="text/javascript">
function hide_order(){
	var hide_order=document.getElementById("hide_order");
	if(hide_order.style.display=='none'){
		hide_order.style.display='block';
	}else{
		hide_order.style.display='none';
	}
}
	function hide_how(){
		var how_to=document.getElementById("how_to");
		if(how_to.style.display=='none'){
			how_to.style.display='block';
		}else{
			how_to.style.display='none';
		}
	}
	function hide_address(){
		var address=document.getElementById("address2_1");
		if(address.style.display=='none'){
			address.style.display='block';
		}else{
			address.style.display='none';
		}
	}
	
	function see_user_order(book_id){
		var she=document.getElementById("she"+book_id);
		var show_you=document.getElementsByClassName("show_you");
		var goods=document.getElementsByClassName("goods");
		var good_id=new Array();
		var a=-1;
		for(var i=0;i<goods.length;i++){
			a++;
			good_id[a]=goods[i].value;
		}
		if(she.style.display=='none'){
			she.style.display='block';
		}else{
			she.style.display='none';
		}
		for(var i=0;i<good_id.length;i++){
			if(book_id==good_id[i]){
				
			}else{
				var b=document.getElementById("she"+good_id[i]);
				b.style.display='none';
			}
		}
	}
</script>