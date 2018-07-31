<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>查看评价</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	#rating li{
	float: left;
	list-style: none;
	padding: 17px;
	background: url(../img/star.png);
	width: 21px;
	height: 21px;
	}
</style>
<?php
	session_start();
	if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
		include("../conn/dataconnection.php");
		@$content_id=$_GET['content_id'];
		$user_id=$_SESSION['user_id'];
?>
<div class="container" style="width: 100%;">
	<?php
		include("top.php");
		
		?>
		<?php
		@$sql=mysql_query("select * from comments where commet_id='$content_id'");
		@$sqll_numm=mysql_num_rows($sql);
		if($sqll_numm<=0){
			echo "<script>alert('对不起，系统出错了，请稍后再试');history.go(-1);</script>";
		}else{
			?>
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
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-3" style="height: auto;border: 1px;background: white;margin-bottom: 100px;">
								
								<?php include("personleft.php"); ?>
								
							</div>
							<div class="col-md-9">
								<div class="panel panel-default">
									<div class="panel-heading">
										<b>查看评价</b>
									</div>
									<div class="panel-body">
										<table class="table table-hover">
											<?php
												$g=mysql_fetch_array($sql);
												$bood_id=$g['book_id'];
												$cont=mysql_query("select * from book where book_id='$bood_id'");
												@$con_num=mysql_num_rows($cont);
												if($con_num<=0){
													echo "你的关于本评价的订单已经删除";
													?>
													<div class="row">
														<div class="cl-md-6">
															<div class="thumbnail" style="float: left;text-align: center;">
																<h4 style="text-align: center;">
																	评价照片
																</h4>
																<?php
																	if($g['content_img']==''){
																		?>
																		<h4 style="height:200px ;">无评价图片</h4>
																	    <?php
																	}else{
																		?>
																		<img style="width: 200px;height: 200px;" src="<?php echo $g['content_img']; ?>" />
																		<?php
																	}
																	?>
																
																<div class="caption">
																	<ul id="rating" class="rating">
																		<h4>星级：</h4>
																					<?php 
																						$say=array("很不好","不好","一般","好","很好");
																						$xinxin=$g['xinxin']; 
																						for($i=0;$i<$xinxin;$i++){
																							?>
																							<li style="background-position-y: -38px;"  class="rating-item" title="<?php echo $say[$i]; ?>"></li>
																							<?php
																						}
																						$saylength=count($say);
																						for($i=$xinxin;$i<$saylength;$i++){
																							?>
																							<li  class="rating-item" title="<?php echo $say[$i]; ?>"></li>
																							<?php
																						}
																						
																						?>
																						</ul>
																						
																</div>
															</div>
															<?php
																@$good_id=$g['good_id'];
																@$goos=mysql_query("select * from goods where good_id='$good_id'");
																@$goos_num=mysql_num_rows($goos);
																@$gs=mysql_fetch_array($goos);
																?>
															<div class="thumbnail" style="float: left;">
																<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $gs['good_id']; ?>">
																<h4>评价商品</h4>
																<img style="width: 230px;height: 290px;" src="<?php echo $gs['main_img']; ?>" />
																</a>
															</div>
														</div>
														<div class="col-md-6">
															<p style="line-height: 25px;">
																<b>评价内容:</b><br><?php echo $g['content']; ?>
															</p>
														</div>
													</div>
													<?php
//													echo "<script>alert('对不起，系统出错了，请稍后再试1');history.go(-1);</script>";
												}else{
													$book=mysql_fetch_array($cont);
													@$get_id=$book['get_id'];
													$get=mysql_query("select * from getinfo where get_id='$get_id'");
													@$get_n=mysql_fetch_array($get);
													
													?>
													<tr>
														<td><b style="color: red;">收货人信息</b></td>
													</tr>
													<tr>
														<td>订单编号：<?php echo $book['book_id']; ?></td>
													</tr>
													<tr>
														<td>收货人姓名:<?php echo $get_n['get_name']; ?></td>
													</tr>
													<tr>
														<td>收货人地址：<?php echo $get_n['get_add']; ?></td>
													</tr>
													<tr>
														<td>收货人电话：<?php echo $get_n['get_tel']; ?></td>
													</tr>
													<tr>
														<td>订货时间：<?php echo $book['book_time']; ?></td>
													</tr>
													<tr>
														<td>送货时间：<?php echo $book['send_time']; ?></td>
													</tr>
													<tr>
														<td>确认收货时间：<?php echo $book['get_time']; ?></td>
													</tr>
													<?php
												
												?>
										</table>
										<table class="table table-hover">
											<caption style="text-align: center;">订单商品详情</caption>
											<thead>
												<th>商品名称</th>
												<th>商品数量</th>
												<th>商品单价</th>
												<th>小计</th>
											</thead>
											<tbody>
												<?php
													$de=mysql_query("select * from order_detail where book_id='$bood_id'");
													@$de_num=mysql_num_rows($de);
													if($de_num<=0){
														
//														echo "<script>alert('对不起，系统出错了，请稍后再试2');history.go(-1);</script>";
													}else{
														while(@$de_n=mysql_fetch_array($de)){
															$good_id=$de_n['good_id'];
															@$good=mysql_query("select * from goods where good_id='$good_id'");
															@$good_num=mysql_num_rows($good);
															if(@$good_num<=0){
																echo "<script>alert('对不起，系统出错了，请稍后再试3');history.go(-1);</script>";
															}else{
																$g=mysql_fetch_array($good);
																$cc=mysql_query("select * from comments where book_id='$bood_id' and good_id='$good_id'");
																@$cc_num=mysql_num_rows($cc);
																@$cc_n=mysql_fetch_array($cc);
																?>
																<tr>
																	<td>
																		<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $good_id; ?>">
																		<div class="thumbnail" style="width: 150px;">
																			<img src="<?php echo $g['main_img']; ?>" />
																			<div class="caption" style="text-align: center;">
																				<?php echo $g['good_name']; ?>
																			</div>
																		</div>
																		</a>
																	</td>
																	<td style="line-height: 180px;"><?php echo $de_n['num']; ?></td>
																	<td style="line-height: 180px;">￥<?php echo $de_n['price']; ?></td>
																	<td style="line-height: 180px;">￥<?php echo $de_n['num']*$de_n['price']; ?></td>
																</tr>
																<?php
																	if(@$cc_num<=0){
																		
																	}else{
																		?>
																		<tr>
																	<td colspan="4">
																		<table>
																			<tr>
																				<td>
																					评价图片：
																				</td>
																				<td width="250">
																						<ul id="rating" class="rating">
																					<?php 
																						$say=array("很不好","不好","一般","好","很好");
																						$xinxin=$cc_n['xinxin']; 
																						for($i=0;$i<$xinxin;$i++){
																							?>
																							<li style="background-position-y: -38px;"  class="rating-item" title="<?php echo $say[$i]; ?>"></li>
																							<?php
																						}
																						$saylength=count($say);
																						for($i=$xinxin;$i<$saylength;$i++){
																							?>
																							<li  class="rating-item" title="<?php echo $say[$i]; ?>"></li>
																							<?php
																						}
																						
																						?>
																						</ul>
																				</td>
																			</tr>
																			<tr>
																				<td>
																					<?php
																				$img=$cc_n['content_img'];
																				if($img!=''){
																					?>
																					<div class="thumbnail" style="width: 150px;">
																						<img src="<?php echo $cc_n['content_img']; ?>" />
																					</div>
																					<?php
																				}
																				?>
																				</td>
																				<td>
																					<?php
																						$old_conten_id=$cc_n['commet_id'];
																						if($old_conten_id==$content_id){
																							?>
																							评价内容:<br>
																							<p style="color: blue;"><?php echo $cc_n['content']; ?></p>
																							<?php
																						}else{
																							?>
																							评价内容:<br>
																							<?php echo $cc_n['content']; ?>
																							<?php
																						}
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
															<?php
														}
													}
													}
													?>
											</tbody>
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