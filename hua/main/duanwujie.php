<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>端午节鲜花</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php

?>
<div class="container" style="width: 100%;">
	<?php include("top.php"); ?>
		<div class="row">
			<div class="col-md-12" style="padding: 0;margin: 0;">
				<div class="thumbnail" style="border: 0;margin: 0;border: 0;padding: 0;">
				<img src="../img/17banner.jpg" />
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="margin: 0;padding: 0;background: url(../img/d_17bg.jpg);">
				<?php
					$sql=mysql_query("select * from goods where (festival like '%端午节%') order by sales desc limit 0,2");
					@$sql_num=mysql_num_rows($sql);
					if($sql_num<=0){
					}else{
						?>
						<div class="row" style="width: 80%;margin: 0 auto;margin-top: 50px;">
							<?php
								$a=0;
								while($d=mysql_fetch_array($sql)){
									$a++;
									if($a==2){
										?>
										<div class="col-md-4">
											<?php
												@$new=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='永生花') order by good_time desc limit 0,1");
												@$f=mysql_fetch_array($new);
												?>
												<div class="thumbnail" style="background-color: white;">
													<a style="text-decoration: none;color: black;" href="see_good.php?good_id=<?php echo $f['good_id'] ?>">
													<div class="row">
													<div class="col-md-6">
														<span style="font-size: 24px;margin-left: 20px;">RMB<br><b style="margin-left: 20px;font-size: 28px;"><?php echo $d['good_price']; ?></b></span>
													</div>
													<div class="col-md-6">
														<div style="background:url(../img/d_hot.png);height: 49.5px;width: 29.5%;float: right;margin-right: 20px;margin-top: 15px;background-position-y: -50px;"></div>
													</div>
												</div>
													<img style="height: 400px;" src="<?php echo $f['main_img']; ?>" />
														<div class="caption" style="text-align: left;">
														<p style="font-size: 20px;">
														<?php echo $f['good_name']; ?>
														</p>
														<p class="text-muted">
														<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
																<?php echo $f['material']; ?>
														</div>  
														</p>
														</div>
													</a>
												</div>
										</div>
										<div class="col-md-4">
											<div class="thumbnail" style="background-color: white;">
												<a style="text-decoration: none;color: black;" href="see_good.php?good_id=<?php echo $d['good_id'] ?>">
												<div class="row">
													<div class="col-md-6">
														<span style="font-size: 24px;margin-left: 20px;">RMB<br><b style="margin-left: 20px;font-size: 28px;"><?php echo $d['good_price']; ?></b></span>
													</div>
													<div class="col-md-6">
														<div style="background:url(../img/d_hot.png);height: 49.5px;width: 29.5%;float: right;margin-right: 20px;margin-top: 15px;background-position-y: -100px;"></div>
													</div>
												</div>
												<img style="height: 400px;" src="<?php echo $d['main_img']; ?>" />
												<div class="caption" style="text-align: left;">
														<p style="font-size: 20px;"> 
														<?php echo $d['good_name']; ?>
														</p>
														<p class="text-muted">
														<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
																<?php echo $d['material']; ?>
														</div>  
														</p>
														</div>
												</a>
											</div>
										</div>
										<?php
									}else{
										?>
										<div class="col-md-4">
											<div class="thumbnail" style="background-color: white;">
												<a style="text-decoration: none;color: black;" href="see_good.php?good_id=<?php echo $d['good_id'] ?>">
												<div class="row">
													<div class="col-md-6">
														<span style="font-size: 24px;margin-left: 20px;">RMB<br><b style="margin-left: 20px;font-size: 28px;"><?php echo $d['good_price']; ?></b></span>
													</div>
													<div class="col-md-6">
														<div style="background:url(../img/d_hot.png);height: 49.5px;width: 29.5%;float: right;margin-right: 20px;margin-top: 15px;"></div>
													</div>
											</div>
												<img style="height: 400px;" src="<?php echo $d['main_img']; ?>" />
												<div class="caption" style="text-align: left;">
														<p style="font-size: 20px;">
														<?php echo $d['good_name']; ?>
														</p>
														<p class="text-muted">
														<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
																<?php echo $d['material']; ?>
														</div>  
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
						<?php
					}
					?>
					
					<div class="row" style="width: 80%;margin: 0 auto;margin-top: 40px;">
						<div class="col-md-12" style="background: url(../img/d_line.png);width: 100%;height: 100px;text-align: center;">
							<span style="color: white;font-size: 28px;line-height: 80px;">端午节礼盒推荐</span>
						</div>
					</div>
					<div class="row" style="width: 80%;margin: 0 auto;">
						<?php
							@$s_p=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and packing like '%礼盒%' order by sales desc limit 0,8");
							@$s_num=mysql_num_rows($s_p);
							if($s_num<=0){
								
							}else{
								while($s_s=mysql_fetch_array($s_p)){
									?>
									<div class="col-md-3">
										<div class="thumbnail" style="height: 400px;border: 0;padding: 0;">
											<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $s_s['good_id']; ?>">
											<img style="height: 300px;width: 100%;" src="<?php echo $s_s['main_img']; ?>">
												<div class="caption" style="text-align: center;">
											<p>
											<?php echo $s_s['good_name']; ?>
											</p>
											<p class="text-muted">
											<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
													<?php echo $s_s['material']; ?>
											</div>  
											</p>
											<p style="font-size: 20px;color: #E03636;">
												￥<?php echo $s_s['good_price']; ?>
											</p>
											</div>
											</a>
										</div>
									</div>
									<?php
								}
								?>
								
								<?php
							}
							?>
					</div>
					<div class="row" style="width: 80%;margin: 0 auto;margin-top: 40px;">
						<div class="col-md-12" style="background: url(../img/d_line.png);width: 100%;height: 100px;text-align: center;">
							<span style="color: white;font-size: 28px;line-height: 80px;">端午节花束推荐</span>
						</div>
					</div>
					<div class="row" style="width: 80%;margin: 0 auto;">
						<?php
							@$s_pp=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and packing not like '%礼盒%' order by sales desc limit 0,8");
							@$ss_num=mysql_num_rows($s_pp);
							if($ss_num<=0){
								
							}else{
								while($s_ss=mysql_fetch_array($s_pp)){
									?>
									<div class="col-md-3">
										<div class="thumbnail" style="height: 400px;border: 0;padding: 0;">
											<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $s_ss['good_id']; ?>">
											<img style="height: 300px;width: 100%;" src="<?php echo $s_ss['main_img']; ?>">
												<div class="caption" style="text-align: center;">
											<p>
											<?php echo $s_ss['good_name']; ?>
											</p>
											<p class="text-muted">
											<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
													<?php echo $s_ss['material']; ?>
											</div>  
											</p>
											<p style="font-size: 20px;color: #E03636;">
												￥<?php echo $s_ss['good_price']; ?>
											</p>
											</div>
											</a>
										</div>
									</div>
									<?php
								}
								?>
								
								<?php
							}
							?>
					</div>
					<div class="row" style="width: 80%;margin: 0 auto;margin-top: 40px;">
						<div class="col-md-12" style="background: url(../img/d_line.png);width: 100%;height: 100px;text-align: center;">
							<span style="color: white;font-size: 28px;line-height: 80px;">端午节礼品推荐</span>
						</div>
					</div>
					<div class="row" style="width: 80%;margin: 0 auto;">
						<?php
							@$ss_p=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='礼品') order by sales desc limit 0,8");
							@$s_snum=mysql_num_rows($ss_p);
							if($s_snum<=0){
								
							}else{
								while($ss_s=mysql_fetch_array($ss_p)){
									?>
									<div class="col-md-3">
										<div class="thumbnail" style="height: 400px;border: 0;padding: 0;">
											<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $ss_s['good_id']; ?>">
											<img style="height: 300px;width: 100%;" src="<?php echo $ss_s['main_img']; ?>">
												<div class="caption" style="text-align: center;">
											<p>
											<?php echo $ss_s['good_name']; ?>
											</p>
											<p class="text-muted">
											<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
													<?php echo $ss_s['material']; ?>
											</div>  
											</p>
											<p style="font-size: 20px;color: #E03636;">
												￥<?php echo $ss_s['good_price']; ?>
											</p>
											</div>
											</a>
										</div>
									</div>
									<?php
								}
								?>
								
								<?php
							}
							?>
					</div>
					<?php include("footer.php"); ?>
			</div>
		</div>
</div>
<script type="text/javascript" src="../js/index.js"></script>