<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>毕业鲜花</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php

?>
<div class="container" style="width: 100%;">
	<?php include("top.php"); ?>
	<div class="row">
		<div class="col-md-12" style="border: 0;padding: 0;margin: 0;">
			<div class="thumbnail" style="border: 0;padding: 0;margin: 0;">
				<img src="../img/gr_banner.jpg" />
			</div>
		</div>
	</div>
	<div class="row" style="padding: 0;">
		<div class="col-md-12" style="margin: 0;padding: 0;background: url(../img/17bg.jpg);">
			<?php
				$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') order by sales desc limit 0,3");
				@$sql_num=mysql_num_rows($sql);
				if($sql_num<=0){
					
				}else{
					?>
					<div class="row" style="margin-top: 50px;">
						   <div class="col-md-12" style="text-align: center;">
						   		<h2 style="letter-spacing: 12px;">热销鲜花，看看众人所爱</h2>
						   		<span style="letter-spacing: 5px;">又看又心水的价格，告别你的青春</span>
						   </div>
						</div>
						<div class="row" style="width: 85%;margin: 0 auto;margin-top: 30px;">
					<?php
						while(@$f=mysql_fetch_array($sql)){
							?>
							<div class="col-md-4">
								<div onmouseleave="change_type2(<?php echo $f['good_id']; ?>)" onmouseover="change_type(<?php echo $f['good_id']; ?>)" id="div<?php echo $f['good_id']; ?>" class="thumbnail" style="height: 505px;padding: 0;border: 0;">
									<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $f['good_id']; ?>">
									<img style="height: 400px;width: 100%;" src="<?php echo $f['main_img']; ?>" />
									<div class="caption" style="text-align: center;">
													<p>
														<?php echo $f['good_name']; ?>
													</p>
													<p class="text-muted">
														<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
															<?php echo $f['material']; ?>
														</div>  
													</p>
													<p style="font-size: 20px;color: #E03636;">
														￥<?php echo $f['good_price']; ?>
													</p>
									</div>
									</a>
								</div>
							</div>
							<?php
						}
						?>
						</div>
						<?php
				}
				?>
				<?php
					@$t_f=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (material like '%向日葵%' or festival like '毕业' or good_use like '%送朋友%') order by sales desc limit 0,8");
					@$t_num=mysql_num_rows($t_f);
					if($t_num<=0){
						
					}else{
						?>
						<div class="row" style="width: 85%;margin: 0 auto;margin-top: 120px;">
							<div class="col-md-4" style="margin: 0 auto;padding: 0;">
								<div style="width: 100%;height: 4px;background-color: white;"></div>
							</div>
							<div class="col-md-4" style="margin-bottom: 100px;margin: 0 auto;padding: 0;text-align: center;">
								<span style="font-size: 28px;color: white;">毕业鲜花——祝福彼此</span>
							</div>
							<div class="col-md-4" style="margin: 0 auto;padding: 0;">
								<div style="width: 100%;height: 4px;background-color: white;"></div>
							</div>
						</div>
						<div class="row" style="margin-top: 40px;width: 85%;margin: 0 auto;">
							<?php
								while($f_t=mysql_fetch_array($t_f)){
									?>
									<div class="col-md-3" style="margin-top: 30px;">
										<div onmouseleave="change_type2(<?php echo $f_t['good_id']; ?>)" onmouseover="change_type(<?php echo $f_t['good_id']; ?>)" id="div<?php echo $f_t['good_id']; ?>" class="thumbnail" style="height: 420px;padding: 0;border: 0;">
											<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $f_t['good_id']; ?>">
											<img style="height: 310px;width: 100%;" src="<?php echo $f_t['main_img']; ?>" />
											<div class="caption" style="text-align: center;">
													<p>
														<?php echo $f_t['good_name']; ?>
													</p>
													<p class="text-muted">
														<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
															<?php echo $f_t['material']; ?>
														</div>  
													</p>
													<p style="font-size: 20px;color: #E03636;">
														￥<?php echo $f_t['good_price']; ?>
													</p>
											</div>
											</a>
										</div>
									</div>
									<?php
								}
								?>
						</div>
						<?php 
					}
					?>
					<?php
						@$s_t=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%送长辈%' or festival like '%感恩节%' or object like '%长辈%') order by sales desc limit 0,8");
						@$s_num=mysql_num_rows($s_t);
						if(@$s_num<=0){
							
						}else{
							?>
							<div class="row" style="width: 85%;margin: 0 auto;margin-top: 120px;">
								<div class="col-md-4" style="margin: 0 auto;padding: 0;">
									<div style="width: 100%;height: 4px;background-color: white;"></div>
								</div>
								<div class="col-md-4" style="margin-bottom: 100px;margin: 0 auto;padding: 0;text-align: center;">
									<span style="font-size: 28px;color: white;">毕业鲜花——感谢恩师</span>
								</div>
								<div class="col-md-4" style="margin: 0 auto;padding: 0;">
									<div style="width: 100%;height: 4px;background-color: white;"></div>
								</div>
							</div>
							<div class="row" style="margin-top: 40px;width: 85%;margin: 0 auto;">
								<?php
								while($s_ff=mysql_fetch_array($s_t)){
									?>
										<div class="col-md-3" style="margin-top: 30px;">
											<div onmouseleave="change_type3(<?php echo $s_ff['good_id']; ?>)" onmouseover="change_type4(<?php echo $s_ff['good_id']; ?>)" id="div_div<?php echo $s_ff['good_id']; ?>" class="thumbnail" style="height: 420px;padding: 0;border: 0;">
												<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $s_ff['good_id']; ?>">
												<img style="height: 310px;width: 100%;" src="<?php echo $s_ff['main_img']; ?>" />
												<div class="caption" style="text-align: center;">
														<p>
															<?php echo $s_ff['good_name']; ?>
														</p>
														<p class="text-muted">
															<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
																<?php echo $s_ff['material']; ?>
															</div>  
														</p>
														<p style="font-size: 20px;color: #E03636;">
															￥<?php echo $s_ff['good_price']; ?>
														</p>
												</div>
												</a>
											</div>
										</div>
									<?php
								}
								?>
							</div>
							<?php
						}
						?>
						
						<?php
							@$fever=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='永生花') order by sales desc limit 0,8");
							@$fever_num=mysql_num_rows($fever);
							if($fever_num<=0){
								
							}else{
								?>
								<div class="row" style="width: 85%;margin: 0 auto;margin-top: 120px;">
									<div class="col-md-4" style="margin: 0 auto;padding: 0;">
										<div style="width: 100%;height: 4px;background-color: white;"></div>
									</div>
									<div class="col-md-4" style="margin-bottom: 100px;margin: 0 auto;padding: 0;text-align: center;">
										<span style="font-size: 28px;color: white;">唯美永生花推荐</span>
									</div>
									<div class="col-md-4" style="margin: 0 auto;padding: 0;">
										<div style="width: 100%;height: 4px;background-color: white;"></div>
									</div>
								</div>
								<div class="row" style="margin-top: 40px;width: 85%;margin: 0 auto;">
								<?php
									while($fel=mysql_fetch_array($fever)){
										?>
										<div class="col-md-3" style="margin-top: 30px;">
											<div onmouseleave="change_type3(<?php echo $fel['good_id']; ?>)" onmouseover="change_type4(<?php echo $fel['good_id']; ?>)" id="div_div<?php echo $fel['good_id']; ?>" class="thumbnail" style="height: 420px;padding: 0;border: 0;">
												<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $fel['good_id']; ?>">
												<img style="height: 310px;width: 100%;" src="<?php echo $fel['main_img']; ?>" />
												<div class="caption" style="text-align: center;">
														<p>
															<?php echo $fel['good_name']; ?>
														</p>
														<p class="text-muted">
															<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
																<?php echo $fel['material']; ?>
															</div>  
														</p>
														<p style="font-size: 20px;color: #E03636;">
															￥<?php echo $fel['good_price']; ?>
														</p>
												</div>
												</a>
											</div>
										</div>
										<?php
									}
									?>
									</div>
									<?php
										@$gi=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='礼品') order by sales desc limit 0,8");
										@$gi_num=mysql_num_rows($gi);
										if(@$gi_num<=0){
											
										}else{
											?>
											<div class="row" style="width: 85%;margin: 0 auto;margin-top: 120px;">
												<div class="col-md-4" style="margin: 0 auto;padding: 0;">
													<div style="width: 100%;height: 4px;background-color: white;"></div>
												</div>
												<div class="col-md-4" style="margin-bottom: 100px;margin: 0 auto;padding: 0;text-align: center;">
													<span style="font-size: 28px;color: white;">精美礼品推荐</span>
												</div>
												<div class="col-md-4" style="margin: 0 auto;padding: 0;">
													<div style="width: 100%;height: 4px;background-color: white;"></div>
												</div>
											</div>
											<div class="row" style="width: 85%;margin: 0 auto;">
												<?php
													while(@$gift=mysql_fetch_array($gi)){
														?>
														<div class="col-md-3" style="margin-top: 30px;">
															<div onmouseleave="change_type3(<?php echo $gift['good_id']; ?>)" onmouseover="change_type4(<?php echo $gift['good_id']; ?>)" id="div_div<?php echo $gift['good_id']; ?>" class="thumbnail" style="height: 420px;padding: 0;border: 0;">
																<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $gift['good_id']; ?>">
																<img style="height: 310px;width: 100%;" src="<?php echo $gift['main_img']; ?>" />
																<div class="caption" style="text-align: center;">
																		<p>
																			<?php echo $gift['good_name']; ?>
																		</p>
																		<p class="text-muted">
																			<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
																				<?php echo $gift['material']; ?>
																			</div>  
																		</p>
																		<p style="font-size: 20px;color: #E03636;">
																			￥<?php echo $gift['good_price']; ?>
																		</p>
																</div>
																</a>
															</div>
														</div>
														<?php
													}
													?>
											</div>
											<?php
										}
										?>
								<?php
							}
							?>
							<?php include("footer.php"); ?>
		</div>
	</div>
</div>
<script type="text/javascript">
function change_type4(good_id){
	var div=document.getElementById("div_div"+good_id);
	div.style.boxShadow='5px 5px 5px 5px #888888';
}
function change_type3(good_id){
	var div=document.getElementById("div_div"+good_id);
	div.style.boxShadow='none';
}
	function change_type(good_id){
		var div=document.getElementById("div"+good_id);
		div.style.boxShadow='5px 5px 5px 5px #888888';
	}
	function change_type2(good_id){
		var div=document.getElementById("div"+good_id);
		div.style.boxShadow='none';
	}
</script>
<script type="text/javascript" src="../js/index.js"></script>