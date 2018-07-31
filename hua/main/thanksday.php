<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>感恩节鲜花</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php

?>
<div class="container" style="width: 100%;">
	<?php include("top.php"); ?>
		<div class="row" style="background-color: red;">
			<div class="col-md-12">
				<div class="row" style="width: 80%;margin: 0 auto;">
					<div class="col-md-12" style="background: url(../img/atmosphere.png);background-color: transparent;padding: 0;margin: 0;background-size: cover;background-position-x: 70px;background-position-y: -25px;">
						<div class="row" style="">
							<div class="col-md-12" style="">
								<div class="thumbnail" style="background-color: transparent;border: 0;padding: 0;">
									<img src="../img/gr_banner1.png" />
								</div>
							</div>
						</div>
						<?php
							$sql=mysql_query("select * from goods where (good_use like '%女朋友%' or festival like '%情人节%' or object like '%女朋友%') order by sales desc limit 0,8");
							@$sql_num=mysql_num_rows($sql);
							if(@$sql_num<=0){
								
							}else{
							
								?>
								<div class="row" style="width: 100%;margin: 0 auto;">
									<div class="col-md-12" style="background:url(../img/bg-box.png) 200px repeat;height: auto;width: 100%;padding: 0;margin: 0;background-color: transparent;">
										<div class="row">
											<?php
												$i=0;
												while($f=mysql_fetch_array($sql)){
													$i++;
													if($i==2){
														?>
														<div class="col-md-4" style="height: 600px;">
															<div class="thumbnail" style="background: transparent;padding: 0;border: 0;">
																<img src="../img/th_title.png" />
															</div>
														</div>
														<div class="col-md-4" style="height: 600px;">
														<div onmouseleave="change_type2(<?php echo $f['good_id']; ?>)" onmouseover="change_type(<?php echo $f['good_id']; ?>)" id="div<?php echo $f['good_id']; ?>" class="thumbnail" style="width: 80%;height: 350px;margin: 0 auto;margin-top: 30px;padding: 0;border: 0;background: transparent;">
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
														</div>
													</div>
														<?php
													}else{
														?>
													<div class="col-md-4" style="height: 400px;">
														<div onmouseleave="change_type2(<?php echo $f['good_id']; ?>)" onmouseover="change_type(<?php echo $f['good_id']; ?>)" id="div<?php echo $f['good_id']; ?>" class="thumbnail" style="width: 80%;height: 350px;margin: 0 auto;margin-top: 30px;padding: 0;border: 0;background: transparent;">
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
														</div>
													</div>
													<?php
													}
												}
												?>
										</div>
										
									<?php
										@$p=mysql_query("select * from goods where (good_use like '%长辈%' or festival like '%长辈%' or object like '%长辈%') order by sales desc limit 0,8");
										@$p_num=mysql_num_rows($p);
										if($p_num<=0){
											
										}else{
											?>
											<div class="row">
											<?php
											$a=0;
											while($p_f=mysql_fetch_array($p)){
												$a++;
												if($a==1){
													?>
													<div class="col-md-3">
														 <div class="thumbnail" style="border: 0;padding: 0;background: transparent;">
														 	<img src="../img/title2.png" />
														 </div>
													</div>
													<div class="col-md-3">
														 <div onmouseleave="change_type2(<?php echo $p_f['good_id']; ?>)" onmouseover="change_type(<?php echo $p_f['good_id']; ?>)" id="div<?php echo $p_f['good_id']; ?>" class="thumbnail" style="border: 0;padding: 0;background: transparent;">
														 	<img src="<?php  echo $p_f['main_img']; ?>" />
														 	<div class="caption" style="text-align: center;">
																		<p>
																			<?php echo $p_f['good_name']; ?>
																		</p>
																		<p class="text-muted">
																			<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
																				<?php echo $p_f['material']; ?>
																			</div>  
																		</p>
																		<p style="font-size: 20px;color: #E03636;">
																			￥<?php echo $p_f['good_price']; ?>
																		</p>
																	</div>
														 </div>
													</div>
													<?php
												}else if($a==2||$a==6||$a==8||$a==4){
													?>
													<div class="col-md-4">
														 <div onmouseleave="change_type2(<?php echo $p_f['good_id']; ?>)" onmouseover="change_type(<?php echo $p_f['good_id']; ?>)" id="div<?php echo $p_f['good_id']; ?>" class="thumbnail" style="border: 0;padding: 0;background: transparent;">
														 	<img src="<?php  echo $p_f['main_img']; ?>" />
														 	<div class="caption" style="text-align: center;">
																		<p>
																			<?php echo $p_f['good_name']; ?>
																		</p>
																		<p class="text-muted">
																			<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
																				<?php echo $p_f['material']; ?>
																			</div>  
																		</p>
																		<p style="font-size: 20px;color: #E03636;">
																			￥<?php echo $p_f['good_price']; ?>
																		</p>
																	</div>
														 </div>
													</div>
													<?php
												}else{
													?>
													<div class="col-md-3">
														 <div onmouseleave="change_type2(<?php echo $p_f['good_id']; ?>)" onmouseover="change_type(<?php echo $p_f['good_id']; ?>)" id="div<?php echo $p_f['good_id']; ?>" class="thumbnail" style="border: 0;padding: 0;background: transparent;">
														 	<img src="<?php  echo $p_f['main_img']; ?>" />
														 	<div class="caption" style="text-align: center;">
																		<p>
																			<?php echo $p_f['good_name']; ?>
																		</p>
																		<p class="text-muted">
																			<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
																				<?php echo $p_f['material']; ?>
																			</div>  
																		</p>
																		<p style="font-size: 20px;color: #E03636;">
																			￥<?php echo $p_f['good_price']; ?>
																		</p>
																	</div>
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
												
												<?php
													@$f_f=mysql_query("select * from goods where (good_use like '%送朋友%' or festival like '%朋友%' or object like '%朋友%') order by sales desc limit 0,8");
													@$f_num=mysql_num_rows($f_f);
													if($f_num<=0){
														echo "你好好";
													}else{
														$c=0;
														while($f_fo=mysql_fetch_array($f_f)){
															$c++;
															if($c==2){
																?>
																<div class="col-md-4" style="border: 0;padding: 0;background-color: transparent;">
																	<div class="thumbnail">
																		<img src="../img/title3.png" />
																	</div>
																</div>
																<div class="col-md-4">
																	<div onmouseleave="change_type2(<?php echo $f_fo['good_id']; ?>)" onmouseover="change_type(<?php echo $f_fo['good_id']; ?>)" id="div<?php echo $f_fo['good_id']; ?>" class="thumbnail" style="border: 0;padding: 0;background-color: transparent;">
																		<img src="<?php echo $f_fo['main_img']; ?>" />
																		<div class="caption" style="text-align: center;">
																		<p>
																			<?php echo $f_fo['good_name']; ?>
																		</p>
																		<p class="text-muted">
																			<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
																				<?php echo $f_fo['material']; ?>
																			</div>  
																		</p>
																		<p style="font-size: 20px;color: #E03636;">
																			￥<?php echo $f_fo['good_price']; ?>
																		</p>
																	</div>
																	</div>
																</div>
																<?php
															}else if($c==1){
																?>
																<div class="col-md-4">
																	<div onmouseleave="change_type2(<?php echo $f_fo['good_id']; ?>)" onmouseover="change_type(<?php echo $f_fo['good_id']; ?>)" id="div<?php echo $f_fo['good_id']; ?>" class="thumbnail" style="border: 0;padding: 0;background-color: transparent;">
																		<img src="<?php echo $f_fo['main_img']; ?>" />
																		<div class="caption" style="text-align: center;">
																		<p>
																			<?php echo $f_fo['good_name']; ?>
																		</p>
																		<p class="text-muted">
																			<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
																				<?php echo $f_fo['material']; ?>
																			</div>  
																		</p>
																		<p style="font-size: 20px;color: #E03636;">
																			￥<?php echo $f_fo['good_price']; ?>
																		</p>
																	</div>
																	</div>
																</div>
																<?php
															}else{
																?>
																<div class="col-md-3">
																	<div onmouseleave="change_type2(<?php echo $f_fo['good_id']; ?>)" onmouseover="change_type(<?php echo $f_fo['good_id']; ?>)" id="div<?php echo $f_fo['good_id']; ?>" class="thumbnail" style="border: 0;padding: 0;background-color: transparent;margin: 0;">
																		<img src="<?php echo $f_fo['main_img']; ?>" />
																		<div class="caption" style="text-align: center;">
																		<p>
																			<?php echo $f_fo['good_name']; ?>
																		</p>
																		<p class="text-muted">
																			<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
																				<?php echo $f_fo['material']; ?>
																			</div>  
																		</p>
																		<p style="font-size: 20px;color: #E03636;">
																			￥<?php echo $f_fo['good_price']; ?>
																		</p>
																	</div>
																	</div>
																</div>
																<?php
															}
														}
														?>
														<?php
													}
													?>
												
											</div>
								</div>
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

