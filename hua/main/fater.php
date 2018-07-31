<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>父亲节鲜花</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php

?>
<div class="container" style="width: 100%;">
	<?php
		include("top.php");
		?>
	<div class="row">
		<div class="col-md-12" style="padding: 0;margin: 0;">
			<div class="thumbnail" style="border: 0;padding: 0;margin: 0;">
				<img style="height: 400px;" src="../img/pc_banner.jpg" />
			</div>
		</div>
	</div>
	<div class="row" style="padding: 0;">
		<div class="col-md-12" style="height: auto;width: 100%;padding: 0;margin: 0 auto;background: url(../img/18bg.jpg);">
	<?php
					@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%父亲%' or festival like '%父亲节%' or object like '%父亲%') order by good_price asc limit 0,7");
					@$sql_num=mysql_num_rows($sql);
					if(@$sql_num<=0){
						
					}else{
					  $i=0;
						?>
						<div class="row" style="margin-top: 100px;">
						   <div class="col-md-12" style="text-align: center;">
						   		<h2 style="letter-spacing: 12px;">父亲节超值特惠</h2>
						   		<span style="letter-spacing: 5px;">又看又心水的价格，谢谢家里的顶梁柱</span>
						   </div>
						</div>
						<div class="row" style="width: 80%;margin: 0 auto;margin-top: 50px;">
							<?php
								while($f=mysql_fetch_array($sql)){
									$i++;
									if($i>=4){
										?>
										<div onmouseleave="change_type2(<?php echo $f['good_id']; ?>)" onmouseover="change_type(<?php echo $f['good_id']; ?>)" id="div<?php echo $f['good_id']; ?>" class="col-md-3" style="margin-top: 40px;">
											<div class="thumbnail" style="padding: 0;margin: 0;border: 0;background-color: transparent;">
												<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $f['good_id']; ?>">
												<img style="height: 250px;width: 100%;" src="<?php echo $f['main_img']; ?>" />
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
									}else{
										?>
										<div onmouseleave="change_type2(<?php echo $f['good_id']; ?>)" onmouseover="change_type(<?php echo $f['good_id']; ?>)" id="div<?php echo $f['good_id']; ?>" class="col-md-4" style="margin-top: 10px;">
											<div class="thumbnail" style="padding: 0;margin: 0;border: 0;background-color: transparent;">
												<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $f['good_id']; ?>">
												<img style="height: 300px;width: 100%;" src="<?php echo $f['main_img']; ?>" />
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
									
									<?php
								}
								?>
						</div>
						<?php
					}
					?>
					<?php
						@$f_sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='永生花') order by sales desc limit 0,8");
						@$f_sql_num=mysql_num_rows($f_sql);
						if($f_sql_num<=0){
							
						}else{
							?>
							<div class="row" style="margin-top: 100px;">
							   <div class="col-md-12" style="text-align: center;">
							   		<h2 style="letter-spacing: 12px;">父亲节甄选永生花</h2>
							   		<span style="letter-spacing: 5px;">让这份永生花留住和你相处的时光，定格永恒的亲情！</span>
							   </div>
							</div>
							<div class="row" style="width: 90%;margin: 0 auto;margin-top: 50px;">
								<?php
									while($foever=mysql_fetch_array($f_sql)){
										?>
										<div class="col-md-3">
											<div onmouseleave="change_type2(<?php echo $foever['good_id']; ?>)" onmouseover="change_type(<?php echo $foever['good_id']; ?>)" id="div<?php echo $foever['good_id']; ?>" class="thumbnail" style="background: transparent;border: 0;padding: 0;">
												<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $foever['good_id'] ?>">
												<img style="height: 300px;width: 100%;" src="<?php echo $foever['main_img']; ?>" />
												<div class="caption" style="text-align: center;">
													<p>
														<?php echo $foever['good_name']; ?>
													</p>
													<p class="text-muted">
														<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
															<?php echo $foever['material']; ?>
														</div>  
													</p>
													<p style="font-size: 20px;color: #E03636;">
														￥<?php echo $foever['good_price']; ?>
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
						@$gift=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='礼品') and (festival not like '%中秋%') and(festival like '%父亲节%' or good_use like '%长辈%') order by sales desc limit 0,8");
						@$gift_num=mysql_num_rows($gift);
						if($gift_num<=0){
							?>
							
							
							<?php
						}else{
							?>
							<div class="row" style="margin-top: 100px;">
								<div class="col-md-12" style="text-align: center;">
									<h2 style="letter-spacing: 12px;">父亲节甄选礼品</h2>
									<span style="letter-spacing: 5px;">专属父亲的礼品，不能言说的爱这样表示！</span>
								</div>
							</div>
							<div class="row" style="width: 90%;margin: 0 auto;margin-top: 40px;margin-bottom: 180px;padding: 0;">
								<?php
									while(@$gift_f=mysql_fetch_array($gift)){
										?>
										<div class="col-md-3" style="margin-top: 30px;">
											<div onmouseleave="change_type2(<?php echo $gift_f['good_id']; ?>)" onmouseover="change_type(<?php echo $gift_f['good_id']; ?>)" id="div<?php echo $gift_f['good_id']; ?>" class="thumbnail" style="border: 0;padding: 0;background: transparent;">
												<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $gift_f['good_id'] ?>">
												<img style="height: 330px;width: 100%;" src="<?php echo $gift_f['main_img']; ?>" />
												<div class="caption" style="text-align: center;">
													<p>
														<?php echo $gift_f['good_name']; ?>
													</p>
													<p class="text-muted">
														<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
															<?php echo $gift_f['material']; ?>
														</div>  
													</p>
													<p style="font-size: 20px;color: #E03636;">
														￥<?php echo $gift_f['good_price']; ?>
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
						<?php include("footer.php"); ?>
		</div>
		
	</div>
</div>
<script type="text/javascript" src="../js/index.js"></script>
<script type="text/javascript">
	function change_type(good_id){
		var div=document.getElementById("div"+good_id);
		div.style.boxShadow='5px 5px 5px 5px #888888';
	}
	function change_type2(good_id){
		var div=document.getElementById("div"+good_id);
		div.style.boxShadow='none';
	}
</script>