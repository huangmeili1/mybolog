<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>中秋节鲜花</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php

?>
<div class="container" style="width: 100%;">
	<?php
		include("top.php");
		?>
		<div class="row" style="background: url(../img/z_bg-banner.jpg) no-repeat,url(../img/bg-left.png);background-size: cover;">
			<div class="col-md-12" style="padding: 0;margin: 0;background: url(../img/cloud1.png) no-repeat;">
				<div class="row">
					<div class="col-md-12" style="padding: 0;margin: 0;">
						<div class="thumbnail" style="border: 0;padding: 0;background: transparent;">
							<img src="../img/banner-main.png" />
						</div>
					</div>
				</div>
				<div class="row" style="width: 30%;margin: 0 auto;margin-top: 40px;">
					<div class="col-md-12" style="text-align: center;background: url(../img/z_title.png) no-repeat;width: 100%;height: 100px;">
						<span style="color: crimson;font-size: 30px;margin-right: 55px;margin-bottom: 10px;">中秋好礼感恩特惠</span>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12" style="background: url(../img/bg-left.png) no-repeat;background-position-y: -450px;height: auto;">
						<div class="row" style="width: 80%;margin: 0 auto;">
							<?php
								@$sql=mysql_query("select * from goods where festival like '%中秋节%' order by good_price asc limit 0,3");
								
								while(@$sql_l=mysql_fetch_array($sql)){
									?>
									<div class="col-md-4">
										<div class="thumbnail" style="background-color: #2f4753;color: white;padding: 10px;border: 0;">
											<a style="text-decoration: none;color: white;" href="see_good.php?good_id=<?php echo $sql_l['good_id']; ?>">
											<img style="height: 400px;width: 100%;" src="<?php echo $sql_l['main_img']; ?>" />
											<div class="caption" style="text-align: left;color: white;">
											<p>
											<?php echo $sql_l['good_name']; ?>
											</p>
											<p class="text-muted">
											<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
													<?php echo $sql_l['material']; ?>
											</div>  
											</p>
											<p style="font-size: 20px;color: white;">
												￥<?php echo $sql_l['good_price']; ?>
											</p>
											</div>
											</a>
										</div>
									</div>
									<?php
								}
								?>
						</div>
						<div class="row" style="width: 80%;margin: 0 auto;">
							<?php
								@$f=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and object like '%长辈%' order by good_price asc limit 0,2");
								while(@$f_f=mysql_fetch_array($f)){
									?>
									<div class="col-md-5" style="margin: 0;margin-left: 80px;padding: 0;">
										<a style="text-decoration: none;color: white;" href="see_good.php?good_id=<?php echo $f_f['good_id'] ?>">
											<div class="row" style="background-color: #2f4753;">
												<div class="col-md-7">
													<div class="thumbnail">
														<img style="height: 300px;width: 100%;" src="<?php echo $f_f['main_img']; ?>" />
													</div>
												</div>
												<div class="col-md-5" style="color: white;">
													<p style="margin-top: 120px;">
													<?php echo $f_f['good_name']; ?>
													</p>
													<p class="text-muted">
													<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
															<?php echo $f_f['material']; ?>
													</div>  
													</p>
													<p style="font-size: 20px;color: white;">
														￥<?php echo $f_f['good_price']; ?>
													</p>
												</div>
										</div>
										</a>
									</div>
									<?php
								}
								?>
						</div>
							<div class="row" style="width: 30%;margin: 0 auto;margin-top: 40px;">
								<div class="col-md-12" style="text-align: center;background: url(../img/z_title.png) no-repeat;width: 100%;height: 100px;">
									<span style="color: crimson;font-size: 30px;margin-right: 55px;">花好月圆中秋时</span>
								</div>
							</div>
							<div class="row" style="width: 80%;margin: 0 auto;">
								<?php
									@$h=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '长辈' or festival like '中秋节' or festival like '%父亲节%' or festival like '%母亲节%' or object like '%长辈%') order by sales desc limit 0,8");
									@$h_num=mysql_num_rows($h);
									if(@$h_num<=0){
										
									}else{
										$a=0;
										while($h_f=mysql_fetch_array($h)){
											$a++;
											if($a==4||$a==5){
												?>
												<div class="col-md-6">
													
													<div class="media" style="background-color: #2f4753;width: 100%;">
													    <a class="media-left" href="see_good.php?good_id=<?php echo $h_f['good_id'] ?>">
													        <img style="height: 300px;" class="media-object" src="<?php echo $h_f['main_img']; ?>"
													             alt="媒体对象">
													    </a>
													    <div class="media-body" style="color: white;width: 300px;">
													    	<a style="text-decoration: none;color: white;" href="see_good.php?good_id=<?php echo $h_f['good_id'] ?>">
															<p style="margin-top: 120px;">
															<?php echo $h_f['good_name']; ?>
															</p>
															<p class="text-muted">
															<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
																	<?php echo $h_f['material']; ?>
															</div>  
															</p>
															<p style="font-size: 20px;color: white;">
																￥<?php echo $h_f['good_price']; ?>
															</p>
													        </a>
													    </div>
													</div>
													
												</div>
												<?php
											}else{
												?>
												<div class="col-md-4" style="margin-top: 20px;">
													<div class="thumbnail" style="background-color: #2f4753;color: white;padding: 10px;border: 0;">
														<a style="text-decoration: none;color: white;" href="see_good.php?good_id=<?php echo $h_f['good_id']; ?>">
														<img style="height: 400px;width: 100%;" src="<?php echo $h_f['main_img']; ?>" />
														<div class="caption" style="text-align: left;color: white;">
														<p>
														<?php echo $h_f['good_name']; ?>
														</p>
														<p class="text-muted">
														<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
																<?php echo $h_f['material']; ?>
														</div>  
														</p>
														<p style="font-size: 20px;color: white;">
															￥<?php echo $h_f['good_price']; ?>
														</p>
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
							<div class="row" style="width: 30%;margin: 0 auto;margin-top: 40px;">
								<div class="col-md-12" style="text-align: center;background: url(../img/z_title.png) no-repeat;width: 100%;height: 100px;">
									<span style="color: crimson;font-size: 30px;margin-right: 55px;">天上月圆 人间月半</span>
								</div>
							</div>
							<div class="row" style="width: 80%;margin: 0 auto;">
								<?php
									@$y=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='礼品') and festival like '%中秋节%'");
									@$y_num=mysql_num_rows($y);
									if($y_num<=0){
										?>
										<?php
									}else{
										while($y_y=mysql_fetch_array($y)){
											?>
											<div class="col-md-4" style="margin-top: 20px;">
													<div class="thumbnail" style="background-color: #2f4753;color: white;padding: 10px;border: 0;">
														<a style="text-decoration: none;color: white;" href="see_good.php?good_id=<?php echo $y_y['good_id']; ?>">
														<img style="height: 400px;width: 100%;" src="<?php echo $y_y['main_img']; ?>" />
														<div class="caption" style="text-align: left;color: white;">
														<p>
														<?php echo $y_y['good_name']; ?>
														</p>
														<p class="text-muted">
														<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
																<?php echo $y_y['material']; ?>
														</div>  
														</p>
														<p style="font-size: 20px;color: white;">
															￥<?php echo $y_y['good_price']; ?>
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
							<div class="row" style="width: 30%;margin: 0 auto;margin-top: 40px;">
								<div class="col-md-12" style="text-align: center;background: url(../img/z_title.png) no-repeat;width: 100%;height: 100px;">
									<span style="color: crimson;font-size: 30px;margin-right: 55px;">中秋好礼添新意</span>
								</div>
							</div>
							<div style="width: 80%;margin: 0 auto;">
								<?php
									@$fe=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='永生花')");
									@$fe_num=mysql_num_rows($fe);
									if(@$fe_num<=0){
										
									}else{
										while($fee=mysql_fetch_array($fe)){
											?>
											<div class="col-md-4" style="margin-top: 20px;">
													<div class="thumbnail" style="background-color: #2f4753;color: white;padding: 10px;border: 0;">
														<a style="text-decoration: none;color: white;" href="see_good.php?good_id=<?php echo $fee['good_id']; ?>">
														<img style="height: 400px;width: 100%;" src="<?php echo $fee['main_img']; ?>" />
														<div class="caption" style="text-align: left;color: white;">
														<p>
														<?php echo $fee['good_name']; ?>
														</p>
														<p class="text-muted">
														<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
																<?php echo $fee['material']; ?>
														</div>  
														</p>
														<p style="font-size: 20px;color: white;">
															￥<?php echo $fee['good_price']; ?>
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
					</div>
				</div>
				<?php
					include("footer.php");
					?>
			</div>
		</div>
</div>
<script type="text/javascript" src="../js/index.js"></script>