<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>母亲节鲜花</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php

?>
<div id="up" style="position: fixed;height: 160px;width: 110px;left: 94%;z-index: 8;top: 30%;display: none;">
	<a onclick="go_to_up()" onmouseover="cha()" onmouseleave="cha2()" id="folwer_top" style="width: 100%;height: 100%;">
		<div id="flower_top2" style="height: 110px;width: 80px;background:url(../img/rocket_button_up.png);margin: 0 auto;margin-right: 30px;background-position-x: -30px;background-position-y: -10px;">
			
		</div>
	</a>
</div>
<div class="container" style="width: 100%;">
	<?php
		include("top.php");
		?>
		<div class="row">
			<div class="col-md-12" style="margin: 0 auto;padding: 0;">
				<div class="thumbnail" style="padding: 0;margin: 0;border: 0;">
					<img style="width: 100%;margin-right: 300px;transform: scale(1.264,1);" src="../img/pc_banner_01.jpg" />
				</div>
				
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="margin: 0 auto;padding: 0;">
				<div class="thumbnail" style="padding: 0;margin: 0;border: 0;">
					<img style="width: 100%;margin-right: 300px;transform: scale(1.264,1);" src="../img/pc_banner_02.jpg" />
				</div>
				
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="background-image:url(../img/pc_bg_01.jpg),url(../img/pc_bg_02.jpg);padding: 0;margin: 0;background-position-x: -201px;height: auto;background-repeat: no-repeat;height: auto;">
				<h4 style="text-align: center;font-size: 30px;color: deeppink;"><span><img src="../img/all_title_bg.png"></span>畅销新品推荐-美得万众宠爱<span><img src="../img/all_title_bg.png"></span></h4>
					<p style="text-align: center;width: 530px;margin: 0 auto;letter-spacing: 2px;color: gray;font-size: 15px;">
						这里给大家推荐了最畅销的产品与颜值非常高的母亲节定制新品，方便大家能在一眼当中就明白这个礼物与你妈妈有缘
					</p>
					<div class="row" style="width: 74%;margin: 0 auto;">
						<?php
								
								@$mo=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%母亲%' or festival like '%母亲节%' or object like '%母亲%') order by sales desc limit 0,3");
								@$mo_num=mysql_num_rows($mo);
								if($mo_num<=0){
									
								}else{
									$i=0;
									while(@$f=mysql_fetch_array($mo)){
										$i++;
										?>
										<div class="col-md-4" style="padding: 0;margin: 0 auto;">
											
												<div class="thumbnail" style="padding: 0;margin: 0;border: 0;width: 310px;">
													<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $f['good_id']; ?>">
													<img style="height: 290px;padding: 0;width: 100%;" src="<?php echo $f['main_img'] ?>" />
													<div class="caption" style="margin: 0;padding: 0;">
														<p class="text-muted">
															<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;color: gray;">
																<?php echo $f['good_name'] ?>-<?php echo $f['material']; ?>
															</div>  
														</p>
														<p style="font-size: 20px;color: #E03636;text-align: center;padding: 0;margin: 0 auto;">
															￥<?php echo $f['good_price']; ?>
														</p>
														<div style="width: 100%;height: 1px;background-color: gainsboro;"></div>
														<p class="text-muted">
															<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;text-align: center;color: gray;">
																<?php echo $f['good_hua']; ?>
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
			</div>
		</div>
		<div class="row" style="">
			<div class="col-md-12" style="width: 100%;background:url(../img/pc_bg_02.jpg) no-repeat;padding: 0;margin: 0 auto;background-position-x: -201px;height: 490px;">
				<div class="row" style="width: 74%;margin: 0 auto;">
				
				<?php
					@$mo1=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%母亲%' or festival like '%母亲节%' or object like '%母亲%') order by sales desc limit 3,4");
					@$mo1_num=mysql_num_rows($mo1);
					if($mo1_num<=0){
						
					}else{
						while($f1=mysql_fetch_array($mo1)){
							?>
							<div class="col-md-3" style="padding: 0;margin: 0 auto;margin-top: 60px;">
											
												<div class="thumbnail" style="padding: 0;margin: 0;border: 0;width: 250px;">
													<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $f1['good_id']; ?>">
													<img style="padding: 0;" src="<?php echo $f1['main_img'] ?>" />
													<div class="caption" style="margin: 0;padding: 0;">
														<p class="text-muted">
															<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;color: gray;">
																<?php echo $f1['good_name'] ?>-<?php echo $f1['material']; ?>
															</div>  
														</p>
														<p style="font-size: 20px;color: #E03636;text-align: center;padding: 0;margin: 0 auto;">
															￥<?php echo $f1['good_price']; ?>
														</p>
														<div style="width: 100%;height: 1px;background-color: gainsboro;"></div>
														<p class="text-muted" style="padding: 0;margin: 0 auto;height:auto;height: 30px;">
															<div style=";width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;text-align: center;color: gray;">
																<?php echo $f1['good_hua']; ?>
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
			</div>	
		</div>
		<div class="row" id="show_you">
			<div class="col-md-12" style="background: url(../img/pc_bg_03.jpg);width: 100%;height: auto;background-position-x: -201px;">
				<div class="row" style="width: 74%;margin: 0 auto;margin-top: 300px;height: 200px;">
					<div class="col-md-12">
					<h4 style="text-align: center;font-size: 30px;color: deeppink;"><span><img src="../img/all_title_bg.png"></span>鲜花送给年长的妈妈-你的成长她的白发<span><img src="../img/all_title_bg.png"></span></h4>
					<p style="text-align: center;width: 600px;margin: 0 auto;letter-spacing: 2px;color: gray;font-size: 15px;">
						温暖、善良、坚强的妈妈，值得我们任何人的温柔相待。岁月偷走了她的能力，她却甘之如饴。因为她愿用一生的能力来换你无所不能
					</p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="background: url(../img/pc_bg_04.jpg);width: 100%;background-position-x: -201px;">
				<div class="row" style="width: 74%;margin: 0 auto;">
					<?php
						@$mo2=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%母亲%' or festival like '%母亲节%' or object like '%长辈%') order by sales desc limit 7,3");
						@$mo2_num=mysql_num_rows($mo2);
						if($mo2_num<=0){
							
						}else{
							while($f2=mysql_fetch_array($mo2)){
								?>
								<div class="col-md-4" style="padding: 0;margin: 0 auto;">
											
												<div class="thumbnail" style="padding: 0;margin: 0;border: 0;width: 310px;">
													<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $f2['good_id']; ?>">
													<img style="height: 290px;padding: 0;width: 100%;" src="<?php echo $f2['main_img'] ?>" />
													<div class="caption" style="margin: 0;padding: 0;">
														<p class="text-muted">
															<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;color: gray;">
																<?php echo $f2['good_name'] ?>-<?php echo $f2['material']; ?>
															</div>  
														</p>
														<p style="font-size: 20px;color: #E03636;text-align: center;padding: 0;margin: 0 auto;">
															￥<?php echo $f2['good_price']; ?>
														</p>
														<div style="width: 100%;height: 1px;background-color: gainsboro;"></div>
														<p class="text-muted">
															<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;text-align: center;color: gray;">
																<?php echo $f2['good_hua']; ?>
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
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="background: url(../img/pc_bg_05.jpg);width: 100%;background-position-x: -201px;">
				<div class="row" style="width: 74%;margin: 0 auto;height: 500px;">
					<?php
						@$mo3=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%母亲%' or festival like '%母亲节%' or object like '%长辈%') order by sales desc limit 11,4");
						@$mo3_num=mysql_num_rows($mo3);
						if($mo3_num<=0){
							
						}else{
							while(@$f3=mysql_fetch_array($mo3)){
								?>
								<div class="col-md-3" style="padding: 0;margin: 0 auto;margin-top: 30px;">
											
												<div class="thumbnail" style="padding: 0;margin: 0;border: 0;width: 250px;">
													<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $f3['good_id']; ?>">
													<img style="padding: 0;" src="<?php echo $f3['main_img'] ?>" />
													<div class="caption" style="margin: 0;padding: 0;">
														<p class="text-muted">
															<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;color: gray;">
																<?php echo $f3['good_name'] ?>-<?php echo $f3['material']; ?>
															</div>  
														</p>
														<p style="font-size: 20px;color: #E03636;text-align: center;padding: 0;margin: 0 auto;">
															￥<?php echo $f3['good_price']; ?>
														</p>
														<div style="width: 100%;height: 1px;background-color: gainsboro;"></div>
														<p class="text-muted" style="padding: 0;margin: 0 auto;height:auto;height: 20px;text-align: center;line-height: 20px;">
															<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;text-align: center;color: gray;padding: 5px;">
																<?php echo $f3['good_hua']; ?>
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
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="background: url(../img/pc_bg_06.jpg);width: 100%;height: 500px;background-position-x: -201px;">
				<div class="row" style="width: 74%;margin: 0 auto;margin-top: 0px;height: 100px;">
					<div class="col-md-12">
					<h4 style="text-align: center;font-size: 30px;color: deeppink;"><span><img src="../img/all_title_bg.png"></span>鲜花送给年轻的妈妈-初为人母感恩有她<span><img src="../img/all_title_bg.png"></span></h4>
					<p style="text-align: center;width: 600px;margin: 0 auto;letter-spacing: 2px;color: gray;font-size: 15px;">
						也许她初为人母，正在平衡投入在[工作]和[带孩子]之间的能力，赠她一束鲜花，对她说一声"辛苦了~"
					</p>
					</div>
				</div>
				<div class="row" style="width: 74%;margin: 0 auto;margin-top: 0px;height: auto;">
					<?php
						@$mo4=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%女朋友%' or festival like '%母亲节%' or object like '%长辈%') order by sales desc limit 16,3");
						@$mo4_num=mysql_num_rows($mo4);
						if($mo4_num<=0){
							
						}else{
							while(@$f4=mysql_fetch_array($mo4)){
								?>
								<div class="col-md-4" style="padding: 0;margin: 0 auto;">
											
												<div class="thumbnail" style="padding: 0;margin: 0;border: 0;width: 310px;">
													<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $f4['good_id']; ?>">
													<img style="height: 290px;padding: 0;width: 100%;" src="<?php echo $f4['main_img'] ?>" />
													<div class="caption" style="margin: 0;padding: 0;">
														<p class="text-muted">
															<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;color: gray;">
																<?php echo $f4['good_name'] ?>-<?php echo $f4['material']; ?>
															</div>  
														</p>
														<p style="font-size: 20px;color: #E03636;text-align: center;padding: 0;margin: 0 auto;">
															￥<?php echo $f4['good_price']; ?>
														</p>
														<div style="width: 100%;height: 1px;background-color: gainsboro;"></div>
														<p class="text-muted">
															<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;text-align: center;color: gray;">
																<?php echo $f4['good_hua']; ?>
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
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="background: url(../img/pc_bg_07.jpg);width: 100%;height: 450px;background-position-x: -201px;">
				<div class="row" style="width: 74%;margin: 0 auto;">
				<?php
					@$mo5=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%女朋友%' or festival like '%母亲节%' or object like '%长辈%') order by sales desc limit 19,4");
					@$mo5_num=mysql_num_rows($mo5);
					if($mo5_num<=0){
						
					}else{
						while(@$f5=mysql_fetch_array($mo5)){
							?>
							<div class="col-md-3" style="padding: 0;margin: 0 auto;margin-top: 60px;">
											
												<div class="thumbnail" style="padding: 0;margin: 0;border: 0;width: 250px;">
													<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $f5['good_id']; ?>">
													<img style="padding: 0;" src="<?php echo $f5['main_img'] ?>" />
													<div class="caption" style="margin: 0;padding: 0;">
														<p class="text-muted">
															<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;color: gray;">
																<?php echo $f5['good_name'] ?>-<?php echo $f5['material']; ?>
															</div>  
														</p>
														<p style="font-size: 20px;color: #E03636;text-align: center;padding: 0;margin: 0 auto;">
															￥<?php echo $f5['good_price']; ?>
														</p>
														<div style="width: 100%;height: 1px;background-color: gainsboro;"></div>
														<p class="text-muted" style="padding: 0;margin: 0 auto;height:auto;height: 20px;text-align: center;">
															<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;text-align: center;color: gray;">
																<?php echo $f5['good_hua']; ?>
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
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="background: url(../img/pc_bg_08.jpg);background-position-x: -201px;width: 100%;height: 500px;">
				<div class="row" style="width: 74%;margin: 0 auto;margin-top: 300px;height: 100px;">
					<div class="col-md-12">
					<h4 style="text-align: center;font-size: 30px;color: deeppink;"><span><img src="../img/all_title_bg.png"></span>永生花专辑-定格最美瞬间<span><img src="../img/all_title_bg.png"></span></h4>
					<p style="text-align: center;width: 600px;margin: 0 auto;letter-spacing: 2px;color: gray;font-size: 15px;">
						永生花的花语是守护的爱
					</p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="background: url(../img/pc_bg_09.jpg);background-position-x: -201px;width: 100%;height: 500px;">
				<div class="row" style="width: 74%;margin: 0 auto;">
					<?php
						@$mo6=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='永生花') and (good_use like '%女朋友%' or festival like '%母亲节%' or object like '%长辈%') order by sales desc limit 0,3");
						@$mo6_num=mysql_num_rows($mo6);
						if(@$mo6_num<=0){
							
						}else{
							while(@$f6=mysql_fetch_array($mo6)){
								?>
								<div class="col-md-4" style="padding: 0;margin: 0 auto;">
											
												<div class="thumbnail" style="padding: 0;margin: 0;border: 0;width: 310px;">
													<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $f6['good_id']; ?>">
													<img style="height: 290px;padding: 0;width: 100%;" src="<?php echo $f6['main_img'] ?>" />
													<div class="caption" style="margin: 0;padding: 0;">
														<p class="text-muted">
															<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;color: gray;">
																<?php echo $f6['good_name'] ?>-<?php echo $f6['material']; ?>
															</div>  
														</p>
														<p style="font-size: 20px;color: #E03636;text-align: center;padding: 0;margin: 0 auto;">
															￥<?php echo $f6['good_price']; ?>
														</p>
														<div style="width: 100%;height: 1px;background-color: gainsboro;"></div>
														<p class="text-muted">
															<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;text-align: center;color: gray;">
																<?php echo $f6['good_hua']; ?>
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
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="background: url(../img/pc_bg_10.jpg);background-position-x: -201px;width: 100%;height: 500px;">
				<div class="row" style="width: 74%;margin: 0 auto;">
					<?php
						@$mo7=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='永生花') and (good_use like '%女朋友%' or festival like '%母亲节%' or object like '%长辈%') order by sales desc limit 3,4");
						@$mo7_num=mysql_num_rows($mo7);
						if($mo7_num<=0){
							
						}else{
							while(@$f7=mysql_fetch_array($mo7)){
								?>
								<div class="col-md-3" style="padding: 0;margin: 0 auto;">
											
												<div class="thumbnail" style="padding: 0;margin: 0;border: 0;width: 250px;">
													<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $f7['good_id']; ?>">
													<img style="padding: 0;height: 280px;" src="<?php echo $f7['main_img'] ?>" />
													<div class="caption" style="margin: 0;padding: 0;">
														<p class="text-muted">
															<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;color: gray;">
																<?php echo $f7['good_name'] ?>-<?php echo $f7['material']; ?>
															</div>  
														</p>
														<p style="font-size: 20px;color: #E03636;text-align: center;padding: 0;margin: 0 auto;">
															￥<?php echo $f7['good_price']; ?>
														</p>
														<div style="width: 100%;height: 1px;background-color: gainsboro;"></div>
														<p class="text-muted" style="padding: 0;margin: 0 auto;height:auto;height: 20px;text-align: center;line-height: 20px;">
															<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;text-align: center;color: gray;">
																<?php echo $f7['good_hua']; ?>
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
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="background: url(../img/pc_bg_11.jpg);background-position-x: -201px;width: 100%;height: auto;">
				<div class="row" style="width: 74%;margin: 0 auto;margin-top: 10px;height: 100px;">
					<div class="col-md-12">
					<h4 style="text-align: center;font-size: 30px;color: deeppink;"><span><img src="../img/all_title_bg.png"></span>好物专辑-最有"娘"心的礼物<span><img src="../img/all_title_bg.png"></span></h4>
					<p style="text-align: center;width: 600px;margin: 0 auto;letter-spacing: 2px;color: gray;font-size: 15px;">
						礼物，承载着一份美好的祝福，这里有送妈妈最贴心的礼物，有送妈妈最窝心的礼物，有送妈妈最有心的礼物...等你来挑~
					</p>
					</div>
				</div>
				<div class="row" style="width: 74%;margin: 0 auto;margin-top: 10px;height: auto;">
					<?php
						@$mo8=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='礼品') and (festival not like '%中秋%') order by sales desc limit 0,3");
						@$mo8_num=mysql_num_rows($mo8);
						if(@$mo8<=0){
							
						}else{
							while($f8=mysql_fetch_array($mo8)){
								?>
								<div class="col-md-4" style="padding: 0;margin: 0 auto;">
											
												<div class="thumbnail" style="padding: 0;margin: 0;border: 0;width: 310px;">
													<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $f8['good_id']; ?>">
													<img style="height: 270px;padding: 0;width: 100%;" src="<?php echo $f8['main_img'] ?>" />
													<div class="caption" style="margin: 0;padding: 0;">
														<p class="text-muted">
															<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;color: gray;">
																<?php echo $f8['good_name'] ?>-<?php echo $f8['material']; ?>
															</div>  
														</p>
														<p style="font-size: 20px;color: #E03636;text-align: center;padding: 0;margin: 0 auto;">
															￥<?php echo $f8['good_price']; ?>
														</p>
														<div style="width: 100%;height: 1px;background-color: gainsboro;"></div>
														<p class="text-muted">
															<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;text-align: center;color: gray;">
																<?php echo $f8['good_hua']; ?>
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
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="background: url(../img/pc_bg_12.jpg);background-position-x: -201px;width: 100%;height: auto;">
				<div class="row" style="width: 74%;margin: 0 auto;">
					<?php
						@$mo9=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='礼品') and (festival not like '%中秋%') order by sales desc limit 3,4");
						@$mo9_num=mysql_num_rows($mo9);
						if($mo9_num<=0){
							
						}else{
							while($f9=mysql_fetch_array($mo9)){
								?>
								<div class="col-md-3" style="padding: 0;margin: 0 auto;margin-top: 30px;">
											
												<div class="thumbnail" style="padding: 0;margin: 0;border: 0;width: 250px;">
													<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $f9['good_id']; ?>">
													<img style="padding: 0;height: 280px;" src="<?php echo $f9['main_img'] ?>" />
													<div class="caption" style="margin: 0;padding: 0;">
														<p class="text-muted">
															<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;color: gray;">
																<?php echo $f9['good_name'] ?>-<?php echo $f9['material']; ?>
															</div>  
														</p>
														<p style="font-size: 20px;color: #E03636;text-align: center;padding: 0;margin: 0 auto;">
															￥<?php echo $f9['good_price']; ?>
														</p>
														<div style="width: 100%;height: 1px;background-color: gainsboro;"></div>
														<p class="text-muted" style="padding: 0;margin: 0 auto;height:auto;height: 20px;text-align: center;line-height: 20px;">
															<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;text-align: center;color: gray;">
																<?php echo $f9['good_hua']; ?>
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
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="background: url(../img/pc_bg_13_1.jpg);background-position-x: -201px;width: 100%;height: 200px;">
				<?php
			include("footer.php");
			?>
			</div>
		</div>
</div>
<script type="text/javascript" src="../js/index.js"></script>
<script type="text/javascript">
function go_to_up(){
	var flower_top2=document.getElementById("flower_top2");
	var flower_top=document.getElementById("flower_top");
	flower_top2.style.height='500px';
	flower_top2.style.backgroundPositionX='-340px';
	 $('html,body').animate({  
        scrollTop: 0  
    }, 800); 
}
function cha(){
	var flower_top2=document.getElementById("flower_top2");
	var flower_top=document.getElementById("flower_top");
	flower_top2.style.backgroundPositionX='-180px';
}
function cha2(){
	var flower_top2=document.getElementById("flower_top2");
	var flower_top=document.getElementById("flower_top");
	flower_top2.style.height='110px';
	flower_top2.style.backgroundPositionX='-30px';
}
		window.onscroll=function(){
		var this_top=$(this).scrollTop();
		var show_you=$("#show_you").offset().top;
		var top=document.getElementById("up");
		$(window).scroll(function(){
        if(this_top>show_you+400){
            top.style.display='block';
        }else{
        	top.style.display='none';
        }
    });
	}
</script>
