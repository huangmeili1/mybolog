<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>三八妇女节鲜花</title>
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
					<img src="../img/w_banner.jpg" />
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="padding: 0;margin: 0;background-color: #ffe3db;">
				<div class="row" style="width: 30%;margin: 0 auto;margin-top: 50px;">
					<div class="col-md-12">
						<img style="margin-bottom: 40px;margin-right: 0px;" src="../img/title-left.png" />
						<span style="font-size: 30px;color: #b1659e;margin-left: 30px;">3.8女人节明星产品</span>
						<img style="margin-top: 20px;margin-left: 20px;" src="../img/title-right.png" />
					</div>
				</div>
				<div class="row" style="width: 80%;margin: 0 auto;">
					<div class="col-md-4">
						<img style="width: 100%;" style="" src="../img/title-bg.png" />
					</div>
					<div class="col-md-4">
						<span style="font-size: 24px;color: #b1659e;margin-left: 50px;">剪一缕春光.献一生芳华</span>
					</div>
					<div class="col-md-4">
						<img   style="width: 100%;" src="../img/title-bg.png" />
					</div>
				</div>
				<div class="row" style="width: 80%;margin: 0 auto;margin-top: 50px;">
					<?php
						@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') order by sales desc limit 0,3");
						@$sql_num=mysql_num_rows($sql);
						if($sql_num<=0){
							?>
							<span>暂无商品推荐</span>
							<?php
						}else{
							while($f=mysql_fetch_array($sql)){
								?>
								<div class="col-md-4">
									<div class="thumbnail" style="border: 0;padding: 0;">
										<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $f['good_id'] ?>">
										<img style="height: 380px;width: 100%;" src="<?php echo $f['main_img'] ?>" />
										<div class="caption" style="text-align: left;">
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
				<div class="row" style="width: 30%;margin: 0 auto;margin-top: 50px;">
					<div class="col-md-12">
						<img style="margin-bottom: 40px;margin-right: 0px;" src="../img/title-left.png" />
						<span style="font-size: 30px;color: #b1659e;">长辈的温柔糅进成长的时光里</span>
						<img style="margin-top: 20px;margin-left: 0px;" src="../img/title-right.png" />
					</div>
				</div>
				<div class="row" style="width: 80%;margin: 0 auto;">
					<div class="col-md-4">
						<img style="width: 100%;" style="" src="../img/title-bg.png" />
					</div>
					<div class="col-md-4">
						<span style="font-size: 24px;color: #b1659e;margin-left: 50px;">以感恩的心.报珍贵的情</span>
					</div>
					<div class="col-md-4">
						<img   style="width: 100%;" src="../img/title-bg.png" />
					</div>
				</div>
				<div class="row" style="width: 80%;margin: 0 auto;margin-top: 50px;">
					<?php
						@$p_f=mysql_query("select * from goods where (good_use like '%长辈%' or festival like '%母亲节%' or festival like '%父亲节%' or object like '%长辈%') order by sales desc limit 0,13");
						@$p=mysql_num_rows($p_f);
						if($p<=0){
							
						}else{
							$a=0;
							while($f_p=mysql_fetch_array($p_f)){
								$a++;
								if($a==1||$a==8){
									?>
									<div class="col-md-6">
										<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $f_p['good_id']; ?>">
										<div class="thumbnail" style="height: 480px;border: 0;padding: 0;">
											<img style="height: 370px;width: 100%;" src="<?php echo $f_p['main_img']; ?>" />
											<div class="caption" style="text-align: left;">
											<p>
											<?php echo $f_p['good_name']; ?>
											</p>
											<p class="text-muted">
											<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
													<?php echo $f_p['material']; ?>
											</div>  
											</p>
											<p style="font-size: 20px;color: #E03636;">
												￥<?php echo $f_p['good_price']; ?>
											</p>
											</div>
											</a>
										</div>
									</div>
									<?php
								}else{
									?>
									<div class="col-md-3">
										<div class="thumbnail" style="height: 480px;border: 0;padding: 0;">
											<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $f_p['good_id']; ?>">
											<img style="height: 370px;width: 100%;" src="<?php echo $f_p['main_img']; ?>" />
											<div class="caption" style="text-align: left;">
											<p>
											<?php echo $f_p['good_name']; ?>
											</p>
											<p class="text-muted">
											<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
													<?php echo $f_p['material']; ?>
											</div>  
											</p>
											<p style="font-size: 20px;color: #E03636;">
												￥<?php echo $f_p['good_price']; ?>
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
							<div class="col-md-3">
								<a style="text-align: center;text-decoration: none;color: white;" href="elder.php">
								<div class="thumbnail" style="background-color: #e1a793;height: 480px;width: 100%;text-align: center;">
									
									<img style="margin-top: 210px;" src="../img/addmore.png" />
									<h4>更多亲情鲜花</h4>
									
								</div>
								</a>
							</div>
							<?php
						}
						?>
				</div>
				<div class="row" style="width: 50%;margin: 0 auto;margin-top: 50px;">
					<div class="col-md-12">
						<img style="margin-bottom: 40px;margin-left: 80px;" src="../img/title-left.png" />
						<span style="font-size: 30px;color: #b1659e;margin-left: 30px;">因为爱你，所有的节日将变成“情人节”</span>
						<img style="margin-top: 20px;margin-left: 0px;" src="../img/title-right.png" />
					</div>
				</div>
				<div class="row" style="width: 80%;margin: 0 auto;">
					<div class="col-md-4">
						<img style="width: 100%;" style="" src="../img/title-bg.png" />
					</div>
					<div class="col-md-4">
						<span style="font-size: 24px;color: #b1659e;margin-left: 50px;">甄选一份心意.给她一世宠爱</span>
					</div>
					<div class="col-md-4">
						<img   style="width: 100%;" src="../img/title-bg.png" />
					</div>
				</div>
				<div class="row" style="width: 80%;margin: 0 auto;margin-top: 50px;">
					<?php
						@$L_f=mysql_query("select * from goods where (good_use like '%女朋友%' or festival like '%情人节%' or object like '%女朋友%') order by sales desc limit 0,13");
						@$L=mysql_num_rows($L_f);
						if($L<=0){
							
						}else{
							$c=0;
							while($f_L=mysql_fetch_array($L_f)){
								$c++;
								if($c==1||$c==8){
									?>
									<div class="col-md-6">
										<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $f_L['good_id']; ?>">
										<div class="thumbnail" style="height: 480px;border: 0;padding: 0;">
											<img style="height: 370px;width: 100%;" src="<?php echo $f_L['main_img']; ?>" />
											<div class="caption" style="text-align: left;">
											<p>
											<?php echo $f_L['good_name']; ?>
											</p>
											<p class="text-muted">
											<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
													<?php echo $f_L['material']; ?>
											</div>  
											</p>
											<p style="font-size: 20px;color: #E03636;">
												￥<?php echo $f_L['good_price']; ?>
											</p>
											</div>
											</a>
										</div>
									</div>
									<?php
								}else{
									?>
									<div class="col-md-3">
										<div class="thumbnail" style="height: 480px;border: 0;padding: 0;">
											<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $f_L['good_id']; ?>">
											<img style="height: 370px;width: 100%;" src="<?php echo $f_L['main_img']; ?>" />
											<div class="caption" style="text-align: left;">
											<p>
											<?php echo $f_L['good_name']; ?>
											</p>
											<p class="text-muted">
											<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
													<?php echo $f_L['material']; ?>
											</div>  
											</p>
											<p style="font-size: 20px;color: #E03636;">
												￥<?php echo $f_L['good_price']; ?>
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
							<div class="col-md-3">
								<a style="text-align: center;text-decoration: none;color: white;" href="Love.php">
								<div class="thumbnail" style="background-color: #e1a793;height: 480px;width: 100%;text-align: center;">
									
									<img style="margin-top: 210px;" src="../img/addmore.png" />
									<h4>更多爱情鲜花</h4>
									
								</div>
								</a>
							</div>
							<?php
						}
						?>
				</div>
				<div class="row" style="width: 50%;margin: 0 auto;margin-top: 50px;">
					<div class="col-md-12">
						<img style="margin-bottom: 40px;margin-left: 80px;" src="../img/title-left.png" />
						<span style="font-size: 30px;color: #b1659e;margin-left: 30px;">别在需要帮忙的时候才想起她</span>
						<img style="margin-top: 20px;margin-left: 0px;" src="../img/title-right.png" />
					</div>
				</div>
				<div class="row" style="width: 80%;margin: 0 auto;">
					<div class="col-md-4">
						<img style="width: 100%;" style="" src="../img/title-bg.png" />
					</div>
					<div class="col-md-4">
						<span style="font-size: 24px;color: #b1659e;margin-left: 50px;">赋一生真心.交一世朋友</span>
					</div>
					<div class="col-md-4">
						<img   style="width: 100%;" src="../img/title-bg.png" />
					</div>
				</div>
				<div class="row" style="width: 80%;margin: 0 auto;margin-top: 50px;">
					<?php
						@$L_P=mysql_query("select * from goods where (good_use like '%送朋友%' or festival like '%朋友节%' or object like '%朋友%') order by sales desc limit 0,13");
						@$P=mysql_num_rows($L_P);
						if($P<=0){
							
						}else{
							$d=0;
							while($P_L=mysql_fetch_array($L_P)){
								$d++;
								if($d==1||$d==8){
									?>
									<div class="col-md-6">
										<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo$P_L['good_id']; ?>">
										<div class="thumbnail" style="height: 480px;border: 0;padding: 0;">
											<img style="height: 370px;width: 100%;" src="<?php echo $P_L['main_img']; ?>" />
											<div class="caption" style="text-align: left;">
											<p>
											<?php echo $P_L['good_name']; ?>
											</p>
											<p class="text-muted">
											<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
													<?php echo $P_L['material']; ?>
											</div>  
											</p>
											<p style="font-size: 20px;color: #E03636;">
												￥<?php echo $P_L['good_price']; ?>
											</p>
											</div>
											</a>
										</div>
									</div>
									<?php
								}else{
									?>
									<div class="col-md-3">
										<div class="thumbnail" style="height: 480px;border: 0;padding: 0;">
											<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $P_L['good_id']; ?>">
											<img style="height: 370px;width: 100%;" src="<?php echo $P_L['main_img']; ?>" />
											<div class="caption" style="text-align: left;">
											<p>
											<?php echo $P_L['good_name']; ?>
											</p>
											<p class="text-muted">
											<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
													<?php echo $P_L['material']; ?>
											</div>  
											</p>
											<p style="font-size: 20px;color: #E03636;">
												￥<?php echo $P_L['good_price']; ?>
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
							<div class="col-md-3">
								<a style="text-align: center;text-decoration: none;color: white;" href="friend.php">
								<div class="thumbnail" style="background-color: #e1a793;height: 480px;width: 100%;text-align: center;">
									
									<img style="margin-top: 210px;" src="../img/addmore.png" />
									<h4>更多友情鲜花</h4>
									
								</div>
								</a>
							</div>
							<?php
						}
						?>
				</div>
				<?php
			include("footer.php");
			?>
			</div>
			
		</div>
		
</div>
<script type="text/javascript" src="../js/index.js"></script>