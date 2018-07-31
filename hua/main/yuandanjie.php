<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>元旦鲜花</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
include("top.php");
include("../conn/dataconnection.php");
?>
<div class="container" style="width: 100%;">
	<div class="row">
		<div class="col-md-12" style="padding: 0;margin: 0;">
			<div class="thumbnail" style="padding: 0;margin: 0;border: 0;">
				<img style="width: 100%;height: 600px;" src="../img/NewYear.jpg"/>
			</div>
		</div>
	</div>
	
	<div class="row" style="">
		<div class="col-md-12" style="background-color: #ffc773;padding: 0;margin: 0;">
			<div class="row" style="margin: 0 auto;margin-top: 20px;">
				<div class="col-md-12" style="background-color:transparent;width: 80%;margin: 0 auto;text-align: center;margin-left: 150px;">
					<div class="thumbnail" style="padding: 0;border: 0;">
						<img src="../img/new2.png" />
					</div>
				</div>
			</div>
			
				<div class="row" style="margin-top: 20px;">
					<div class="col-xs-6 col-md-12" style="width: 80%;margin: 0 auto;margin-left: 150px;">
						<?php
							$sql=mysql_query("select * from goods where object like '%长辈%' and festival not like '%中秋节%' order by good_price asc limit 0,6");
							@$num=mysql_num_rows($sql);
							if(@$num<=0){
								?>
								<div class="row">
									<div class="col-xs-6 col-md-12" style="margin: 0 auto;">
										<span style="margin: 0 auto;text-align: center;margin-left: 400px;">暂无元旦节礼品、鲜花推荐，<a class="btn btn-danger" href="index.php">查看更多</a></span>
									</div>
								</div>
								<?php
							}else{
								$i=0;
								?>
								
								<div class="row">
									<?php
										while($ff=mysql_fetch_array($sql)){					
											$i++;
											?>
											<div class="col-xs-6 col-md-4" style="background-color: #ffc773;">
												<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $ff['good_id'] ?>">
												<div class="thumbnail" id="thumbnail<?php echo $i; ?>" style="width: 100%;margin-top: 25px;padding: 0;border: 0;height: 520px;" onmouseover="check(<?php echo $i ?>)" onmouseout="check1(<?php echo $i ?>)">
													<img style="width: 100%;height: 400px;" src="<?php echo $ff['main_img'] ?>" />
														<div class="caption" id="bb<?php echo $i; ?>" style="text-align: center;">
															<p class="text-muted" style="text-align: center;border: 0;padding: 0;">
																<div style="text-align: center;width:100%;color: #f13a3a; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
																	<b><?php echo $ff['material']; ?></b>
																</div>  
															</p>
															<p class="text-muted">
																<b style="font-size: 18px;"><?php echo $ff['good_name'] ?></b>
															</p>
															<p>
																<b style="font-size: 18px;color: #f13a3a;">￥<?php echo $ff['good_price'] ?></b>
															</p>
														</div>
														<div class="caption" id="caption<?php echo $i; ?>" style="text-align: center;height: 120px;display: none;">
															<a style="height: 50px;font-size: 22px;margin-top: 30px;" class="btn btn-danger" href="see_good.php?good_id=<?php echo $ff['good_id']; ?>">让它回家陪伴你过节</a>
														</div>
												</div>
												</a>
											</div>
											<?php
											
											}
										?>
								</div>
								<?php						
							}
							?>
					</div>
				</div>
			
		</div>
	</div>
	
	<div class="row">
		<div class="col-xs-6 col-md-12" style="background-color: white;">
			<div class="row">
				<div class="col-xs-6 col-md-12" style="width: 80%;margin-left: 150px;padding: 0;background-color: white;">
					<div class="thumbnail" style="padding: 0;margin: 0;border: 0;">
						<img style="width: 100%;" src="../img/new3.png" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6 col-md-12" style="width: 80%;margin-left: 150px;">
					<?php
						@$fe=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') order by sales desc limit 0,8");
						@$fe_num=mysql_num_rows($fe);
						if(@$fe_num<=0){
							?>
							<div class="row">
									<div class="col-xs-6 col-md-12" style="margin: 0 auto;">
										<span style="margin: 0 auto;text-align: center;margin-left: 400px;">暂无元旦节礼品、鲜花推荐，<a class="btn btn-danger" href="index.php">查看更多</a></span>
									</div>
								</div>
							<?php
						}else{
							?>
							<div class="row">
								<?php
								while($fe_fe=mysql_fetch_array($fe)){
									?>
									<div class="col-md-3">
										<div class="thumbnail" style="height: 410px;">
											<a style="text-decoration: none;color: black;" href="see_good.php?good_id=<?php echo $fe_fe['good_id']; ?>">
											<img style="height: 300px;" src="<?php echo $fe_fe['main_img']; ?>" />
											<div class="caption" style="text-align: center;">
											<p>
											<?php echo $fe_fe['good_name']; ?>
											</p>
											<p class="text-muted">
											<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
													<?php echo $fe_fe['material']; ?>
											</div>  
											</p>
											<p style="font-size: 20px;color: #E03636;">
												￥<?php echo $fe_fe['good_price']; ?>
											</p>
											</div>
											</a>
										</div>
									</div>
									<?php
								}
								?>
								<div class="row">
									<div class="col-md-12">
										<a href="flower.php" style="margin-left: 560px;" class="btn btn-danger btn-lg">更多鲜花</a>
									</div>
								</div>
							</div>
							<?php
						}
						?>
				</div>
			</div>
		</div>
	</div>
					<div class="row" style="margin-top: 40px;background-color: #ffc773;">
						<div class="col-md-12" style="padding: 0;margin: 0;">
							<div class="row" style="width: 80%;margin: 0 auto;margin-top: 40px;">
									<div class="col-md-12" style="background: url(../img/d_line.png);width: 100%;height: 100px;text-align: center;padding: 0;margin: 0;">
										<span style="color: white;font-size: 28px;line-height: 80px;background-color: transparent;">唯美永生花推荐</span>
									</div>
							</div>
							<div class="row" style="width: 80%;margin: 0 auto;">
								<?php
									@$fel=mysql_query("select  * from goods where kind_id=(select kind_id from kind where kind_name='永生花') order by sales desc limit 0,8");
									@$fel_num=mysql_num_rows($fel);
									if($fel_num<=0){
										
									}else{
										while($fee=mysql_fetch_array($fel)){
											?>
											<div class="col-md-3">
										<div class="thumbnail" style="height: 410px;">
											<a style="text-decoration: none;color: black;" href="see_good.php?good_id=<?php echo $fee['good_id']; ?>">
											<img style="height: 300px;" src="<?php echo $fee['main_img']; ?>" />
											<div class="caption" style="text-align: center;">
											<p>
											<?php echo $fee['good_name']; ?>
											</p>
											<p class="text-muted">
											<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
													<?php echo $fee['material']; ?>
											</div>  
											</p>
											<p style="font-size: 20px;color: #E03636;">
												￥<?php echo $fee['good_price']; ?>
											</p>
											</div>
											</a>
										</div>
									</div>
											<?php
										}
									}
									?>
							</div>
						</div>
						<div class="row">
									<div class="col-md-12">
										<a href="forever_flower.php" style="margin-left: 680px;" class="btn btn-danger btn-lg">更多永生花</a>
									</div>
								</div>
					</div>
					<div class="row" style="margin-top: 40px;background-color: white;">
						<div class="col-md-12" style="padding: 0;margin: 0;">
							<div class="row" style="width: 80%;margin: 0 auto;margin-top: 40px;">
									<div class="col-md-12" style="background: url(../img/d_line.png);width: 100%;height: 100px;text-align: center;padding: 0;margin: 0;">
										<span style="color: black;font-size: 28px;line-height: 80px;background-color: transparent;">精美礼品推荐</span>
									</div>
							</div>
							<div class="row" style="width: 80%;margin: 0 auto;">
								<?php
									@$fel=mysql_query("select  * from goods where kind_id=(select kind_id from kind where kind_name='礼品') order by sales desc limit 0,8");
									@$fel_num=mysql_num_rows($fel);
									if($fel_num<=0){
										
									}else{
										while($fee=mysql_fetch_array($fel)){
											?>
											<div class="col-md-3">
										<div class="thumbnail" style="height: 410px;">
											<a style="text-decoration: none;color: black;" href="see_good.php?good_id=<?php echo $fee['good_id']; ?>">
											<img style="height: 300px;" src="<?php echo $fee['main_img']; ?>" />
											<div class="caption" style="text-align: center;">
											<p>
											<?php echo $fee['good_name']; ?>
											</p>
											<p class="text-muted">
											<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
													<?php echo $fee['material']; ?>
											</div>  
											</p>
											<p style="font-size: 20px;color: #E03636;">
												￥<?php echo $fee['good_price']; ?>
											</p>
											</div>
											</a>
										</div>
									</div>
											<?php
										}
									}
									?>
									<div class="row">
										<div class="col-md-12">
											<a href="gift.php" style="margin-left: 560px;" class="btn btn-danger btn-lg">更多礼品</a>
										</div>
									</div>
							</div>
						</div>
					</div>
					<?php
						include("footer.php");
						?>
</div>

<script type="text/javascript" src="../js/index.js"></script>
<script type="text/javascript">
	function check(i){
		var bb=document.getElementById("bb"+i);
		bb.style.display='none';
		var caption=document.getElementById("caption"+i);
		caption.style.display='block';
		var thumbnail=document.getElementById("thumbnail"+i);
		thumbnail.style.border='1px solid  gainsboro';
		thumbnail.style.padding='5px';
	}
	function check1(i){
		var bb=document.getElementById("bb"+i);
		bb.style.display='block';
		var caption=document.getElementById("caption"+i);
		caption.style.display='none';
		var thumbnail=document.getElementById("thumbnail"+i);
		thumbnail.style.border='0';
		thumbnail.style.padding='0px';
	}
</script>